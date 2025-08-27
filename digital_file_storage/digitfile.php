<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css?v=1.3">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    @import url("../style.css");

    /* Make sidebar scrollable in landscape mode on mobile devices */
    @media (max-width: 768px) and (orientation: landscape) {
      .sidebar {
        max-height: 100vh;
        overflow-y: auto;
      }
    }
  </style>
</head>

<body>
  <!-- navbar -->

  <?php include '../sidenav.php'; ?>





  <div class="main-content flex-grow-1">
    <div class="container">
      <div class="card" style="height:700px; overflow-x:scroll;">
        <div class="card-content">
          <h3 class="card-header text-center">Digital File Storage</h3>
        </div>
        <div class="card-body">
          <div class="row">
           
      <div class="row">
      <div class="row mb-3">
  <!-- Upload Section -->
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <i class="bi bi-upload"></i> Upload Document
      </div>
      <div class="card-body">
        <form id="uploadForm" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="docTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="docTitle" name="docTitle" placeholder="e.g. Transcript">
          </div>
          <div class="mb-3">
            <label for="docFile" class="form-label">Choose File</label>
            <input type="file" class="form-control" id="docFile" name="docFile" required>
          </div>
          <div class="mb-3">
            <label for="docCategory" class="form-label">Category</label>
            <select class="form-select" id="docCategory" name="docCategory">
              <option selected disabled>Select Category</option>
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
                <th>Title</th>
                <th>Category</th>
                <th>Uploaded By</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row -->
              <tr>
                <td>1</td>
                <td>Juan Dela Cruz TOR</td>
                <td>Transcript</td>
                <td>Admin</td>
                <td>2025-08-27</td>
                <td>
                  <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                  <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                  <button class="btn btn-success btn-sm"><i class="bi bi-download"></i></button>
                </td>
              </tr>
              <!-- More rows fetched from DB -->
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
  </div></div>

  <footer class="mt-auto bg-light">
    <div class="container text-center">
      <p class="text-muted">© 2025 Registrar SIS. All rights reserved.</p>
    </div>
  </footer>


  </style>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
<script></script>