<?php
include '../db.php';

// Query students from personalinfo
$sql = "SELECT 
          s.studentID AS student_number,
          CONCAT_WS(' ', s.FirstName, s.MiddleName, s.LastName) AS full_name,
          s.CurrentCourse as Course,
          s.CurrentYearLevel as YearLevel
        FROM personalinfo s
        ORDER BY s.studentID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css?v=1.3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<?php include '../sidenav.php'; ?>

<div class="main-content flex-grow-1">
  <div class="container">
    <div class="card" style="height:700px; overflow-x:scroll;">
      <div class="card-content">
        <h3 class="card-header text-center">Academic History</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover text-center">
            <thead class="table-light">
              <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['student_number']}</td>
                          <td>{$row['full_name']}</td>
                          <td>{$row['Course']}</td>
                          <td>{$row['YearLevel']}</td>
                          <td>
                            <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#viewModal'>View</button>
                            <button class='btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button>
                            <button class='btn btn-sm btn-danger'>Delete</button>
                          </td>
                        </tr>";
                }
              } else {
                echo "<tr><td colspan='5' class='text-muted'>No students found.</td></tr>";
              }
              ?>
            </tbody>
          </table>
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
