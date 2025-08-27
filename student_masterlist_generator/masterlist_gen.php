<?php
// include '../db.php'; // make sure this path is correct

// // Handle filters if form is submitted
// $school_year = $_GET['school_year'] ?? '';
// $semester = $_GET['semester'] ?? '';

// // Query to fetch masterlist
// $sql = "SELECT s.student_number, s.first_name, s.last_name, s.gender,
//                e.school_year, e.semester,
//                c.course_code, c.course_name,
//                sec.section_name
//         FROM students s
//         INNER JOIN enrollment e ON s.student_number = e.student_number
//         INNER JOIN courses c ON e.course_id = c.course_id
//         INNER JOIN sections sec ON e.section_id = sec.section_id";

// // Apply filters
// $conditions = [];
// if ($school_year != '') $conditions[] = "e.school_year = '$school_year'";
// if ($semester != '') $conditions[] = "e.semester = '$semester'";
// if (count($conditions) > 0) {
//     $sql .= " WHERE " . implode(" AND ", $conditions);
// }

// $sql .= " ORDER BY c.course_code, sec.section_name, s.last_name";

// $result = $conn->query($sql);
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
          <h3 class="card-header text-center">Masterlist Generator</h3>
        </div>
        <div class="card-body">
          <div class="row">
           
      <div class="row">
      <form method="GET" class="row g-3 mb-3">
  <div class="col-md-4">
    <input type="text" name="school_year" class="form-control" placeholder="School Year (e.g. 2025-2026)" value="<?= $school_year ?>">
  </div>
  <div class="col-md-3">
    <input type="text" name="semester" class="form-control" placeholder="Semester (e.g. 1st)" value="<?= $semester ?>">
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary w-100">Generate</button>
  </div>
</form>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Student No.</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Course</th>
      <th>Section</th>
      <th>School Year</th>
      <th>Semester</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result && $result->num_rows > 0) { ?>
      <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?= $row['student_number'] ?></td>
          <td><?= $row['last_name'] . ', ' . $row['first_name'] ?></td>
          <td><?= $row['gender'] ?></td>
          <td><?= $row['course_code'] ?></td>
          <td><?= $row['section_name'] ?></td>
          <td><?= $row['school_year'] ?></td>
          <td><?= $row['semester'] ?></td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr><td colspan="7" class="text-center text-muted">No records found.</td></tr>
    <?php } ?>
  </tbody>
</table>

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