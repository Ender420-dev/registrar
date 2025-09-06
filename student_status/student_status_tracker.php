<?php
include '../db.php';

// Handle filters
$student_id = $_GET['studentID'] ?? '';
$student_name = $_GET['student_name'] ?? '';
$course = $_GET['course'] ?? '';
$status = $_GET['status'] ?? '';

$sql = "SELECT ss.*, 
               p.FirstName, p.MiddleName, p.LastName, p.studentID, p.CurrentCourse as Course, p.CurrentYearLevel as YearLevel
        FROM studentstatustracker ss
        LEFT JOIN personalinfo p ON ss.PersonalID = p.PersonalID
        WHERE 1=1";

if (!empty($student_id)) {
  $sql .= " AND p.studentID LIKE '%" . $conn->real_escape_string($student_id) . "%'";
}
if (!empty($student_name)) {
  $sql .= " AND CONCAT(p.FirstName, ' ', p.MiddleName, ' ', p.LastName) LIKE '%" . $conn->real_escape_string($student_name) . "%'";
}
if (!empty($course)) {
  $sql .= " AND p.Course = '" . $conn->real_escape_string($course) . "'";
}
if (!empty($status)) {
  $sql .= " AND ss.CurrentStatus = '" . $conn->real_escape_string($status) . "'";
}

$sql .= " ORDER BY ss.DateUpdated DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar - Student Status Tracker</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css?v=1.3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .status-badge {
      font-size: 0.85rem;
      padding: 0.4em 0.8em;
      border-radius: 12px;
    }

    .table thead {
      background-color: #0d6efd;
      color: #fff;
    }

    .search-bar {
      background: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <?php include '../sidenav.php'; ?>

  <div class="main-content flex-grow-1 p-3">
    <div class="container-fluid">
      <div class="card shadow-lg">
        <div class="card-header text-center bg-primary text-white">
          <h3 class="mb-0"><i class="bi bi-people-fill"></i> Student Status Tracker</h3>
        </div>
        <div class="card-body">

          <!-- Search / Filter Bar -->
          <form method="GET" class="search-bar mb-4">
            <div class="row g-2 align-items-center">
              <div class="col-md-3">
                <input type="text" name="student_id" class="form-control" placeholder="Search by Student ID"
                  value="<?= htmlspecialchars($student_id) ?>">
              </div>
              <div class="col-md-3">
                <input type="text" name="student_name" class="form-control" placeholder="Search by Name"
                  value="<?= htmlspecialchars($student_name) ?>">
              </div>
              <div class="col-md-2">
                <select name="course" class="form-select">
                  <option value="">All Courses</option>
                  <option value="BSCS" <?= $course == "BSCS" ? "selected" : "" ?>>BSCS</option>
                  <option value="BSIT" <?= $course == "BSIT" ? "selected" : "" ?>>BSIT</option>
                  <option value="BSBA" <?= $course == "BSBA" ? "selected" : "" ?>>BSBA</option>
                </select>
              </div>
              <div class="col-md-2">
                <select name="status" class="form-select">
                  <option value="">All Status</option>
                  <option value="Active" <?= $status == "Active" ? "selected" : "" ?>>Active</option>
                  <option value="Inactive" <?= $status == "Inactive" ? "selected" : "" ?>>Inactive</option>
                  <option value="Graduated" <?= $status == "Graduated" ? "selected" : "" ?>>Graduated</option>
                  <option value="Dropped" <?= $status == "Dropped" ? "selected" : "" ?>>Dropped</option>
                  <option value="Transferee" <?= $status == "Transferee" ? "selected" : "" ?>>Transferee</option>
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                  <i class="bi bi-search"></i> Filter
                </button>
              </div>
            </div>
          </form>

          <!-- Student Table -->
          <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Year Level</th>
                  <th>Status</th>
                  <th>Last Update</th>
                  <th>Updated By</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $fullname = $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'];
                    $badge = "bg-secondary";
                    switch ($row['CurrentStatus']) {
                      case 'Active':
                        $badge = "bg-success";
                        break;
                      case 'Inactive':
                        $badge = "bg-dark";
                        break;
                      case 'Graduated':
                        $badge = "bg-primary";
                        break;
                      case 'Dropped':
                        $badge = "bg-danger";
                        break;
                      case 'Transferee':
                        $badge = "bg-warning text-dark";
                        break;
                    }

                    echo "<tr>
                            <td>{$row['StudentNumber']}</td>
                            <td>{$fullname}</td>
                            <td>{$row['Course']}</td>
                            <td>{$row['YearLevel']}</td>
                            <td><span class='status-badge {$badge}'>{$row['CurrentStatus']}</span></td>
                            <td>{$row['DateUpdated']}</td>
                            <td>{$row['UpdatedBy']}</td>
                            <td>
                              <a href='view_status.php?id={$row['StatusID']}' class='btn btn-info btn-sm'><i class='bi bi-eye'></i></a>
                              <a href='edit_status.php?id={$row['StatusID']}' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i></a>
                              <a href='status_history.php?personalid={$row['PersonalID']}' class='btn btn-secondary btn-sm'><i class='bi bi-clock-history'></i></a>
                            </td>
                          </tr>";
                  }
                } else {
                  echo "<tr><td colspan='8' class='text-muted'>No student status records found.</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

  <footer class="mt-auto bg-light py-3">
    <div class="container text-center">
      <p class="text-muted mb-0">© 2025 Registrar SIS. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>