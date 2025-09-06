<?php
include '../db.php';

// Handle File Upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $personalID = $_POST['personalID'] ?? null;
  $requestID  = $_POST['requestID'] ?? null;
  $category   = $_POST['docCategory'];

  // File upload handling
  if (!empty($_FILES['docFile']['name'])) {
    $targetDir = "../uploads/";
    if (!file_exists($targetDir)) {
      mkdir($targetDir, 0777, true);
    }

    $fileName = time() . "_" . basename($_FILES['docFile']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES['docFile']['tmp_name'], $targetFilePath)) {
      $sql = "INSERT INTO digitalfilestorage (PersonalID, RequestID, FileName, FileType, Category, Date) 
              VALUES (?, ?, ?, ?, ?, NOW())";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("iisss", $personalID, $requestID, $fileName, $fileType, $category);
      $stmt->execute();
    }
  }
}

// Fetch stored documents
$sql = "SELECT * FROM digitalfilestorage ORDER BY Date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar - Digital File Storage</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css?v=1.3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <style>
    @import url("../style.css");
    @media (max-width: 768px) and (orientation: landscape) {
      .sidebar { max-height: 100vh; overflow-y: auto; }
    }
  </style>
</head>
<body>
  <?php include '../sidenav.php'; ?>

  <div class="main-content flex-grow-1">
    <div class="container">
      <div class="card" style="height:700px; overflow-x:auto;">
        <div class="card-content">
          <h3 class="card-header text-center">Digital File Storage</h3>
        </div>
        <div class="card-body">
          <div class="row">
            
            <!-- Upload Section -->
            <div class="col-md-4">
              <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                  <i class="bi bi-upload"></i> Upload Document
                </div>
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="personalID" class="form-label">Personal ID</label>
                      <input type="number" class="form-control" id="personalID" name="personalID" required>
                    </div>
                    <div class="mb-3">
                      <label for="requestID" class="form-label">Request ID (optional)</label>
                      <input type="number" class="form-control" id="requestID" name="requestID">
                    </div>
                    <div class="mb-3">
                      <label for="docFile" class="form-label">Choose File</label>
                      <input type="file" class="form-control" id="docFile" name="docFile" required>
                    </div>
                    <div class="mb-3">
                      <label for="docCategory" class="form-label">Category</label>
                      <select class="form-select" id="docCategory" name="docCategory" required>
                        <option value="">Select Category</option>
                        <option>Transcript</option>
                        <option>Diploma</option>
                        <option>TOR</option>
                        <option>Certificate</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                      <i class="bi bi-cloud-upload"></i> Save Document
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <!-- File Storage Table -->
            <div class="col-md-8">
              <div class="card shadow-sm">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                  <span><i class="bi bi-archive"></i> Stored Documents</span>
                  <input type="text" id="searchOCR" class="form-control w-50" placeholder="Search files...">
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center mb-0">
                      <thead class="table-light">
                        <tr>
                          <th>ID</th>
                          <th>Personal ID</th>
                          <th>Request ID</th>
                          <th>File Name</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if ($result->num_rows > 0): ?>
                          <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                              <td><?= $row['FileID'] ?></td>
                              <td><?= $row['PersonalID'] ?></td>
                              <td><?= $row['RequestID'] ?></td>
                              <td><?= htmlspecialchars($row['FileName']) ?></td>
                              <td><?= htmlspecialchars($row['Category']) ?></td>
                              <td><?= $row['Date'] ?></td>
                              <td>
                                <a href="../uploads/<?= $row['FileName'] ?>" target="_blank" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                <a href="edit_file.php?id=<?= $row['FileID'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="delete_file.php?id=<?= $row['FileID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></a>
                                <a href="../uploads/<?= $row['FileName'] ?>" download class="btn btn-success btn-sm"><i class="bi bi-download"></i></a>
                              </td>
                            </tr>
                          <?php endwhile; ?>
                        <?php else: ?>
                          <tr><td colspan="7" class="text-muted">No documents found.</td></tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="mt-auto bg-light">
    <div class="container text-center">
      <p class="text-muted">© 2025 Registrar SIS. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
