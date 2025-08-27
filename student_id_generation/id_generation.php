<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar - ID Generation</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css?v=1.3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
  <?php include '../sidenav.php'; ?>

  <div class="main-content flex-grow-1">
    <div class="container py-3">

      <!-- Card -->
      <div class="card shadow-lg">
        <div class="card-header text-center bg-primary text-white">
          <h3>ID Generation</h3>
        </div>

        <div class="card-body">
          <!-- ID Generation Form -->
          <form action="save_id.php" method="POST" enctype="multipart/form-data" class="row g-3">

            <div class="col-md-6">
              <label class="form-label">Student Number</label>
              <input type="text" id="student_number" name="student_number" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <input type="text" id="full_name" name="full_name" class="form-control" readonly>
            </div>

            <div class="col-md-6">
              <label class="form-label">Course / Program</label>
              <input type="text" id="course" name="course" class="form-control" readonly>
            </div>

            <div class="col-md-6">
              <label class="form-label">Year & Section</label>
              <input type="text" id="year_section" name="year_section" class="form-control" readonly>
            </div>

            <div class="col-md-6">
              <label class="form-label">Upload Photo</label>
              <input type="file" name="photo" class="form-control" accept="image/*" required>
            </div>

            <div class="col-12 text-end">
              <button type="submit" class="btn btn-success">
                <i class="bi bi-person-badge"></i> Generate ID
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- List of Generated IDs -->
      <div class="card shadow-lg mt-4">
        <div class="card-header bg-secondary text-white">
          <h4 class="mb-0">Generated Student IDs</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
              <tr>
                <th>Photo</th>
                <th>Student Number</th>
                <th>Name</th>
                <th>Course</th>
                <th>Year & Section</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../db.php';
              $result = $conn->query("SELECT * FROM student_id_cards ORDER BY created_at DESC");
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td><img src='../uploads/{$row['photo']}' width='50' class='rounded-circle'></td>
                        <td>{$row['student_number']}</td>
                        <td>{$row['full_name']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['year_section']}</td>
                        <td>
                          <a href='view_id.php?id={$row['id']}' class='btn btn-primary btn-sm'><i class='bi bi-eye'></i></a>
                          <a href='edit_id.php?id={$row['id']}' class='btn btn-warning btn-sm'><i class='bi bi-pencil'></i></a>
                          <a href='delete_id.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Delete this ID?\");'><i class='bi bi-trash'></i></a>
                        </td>
                      </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <footer class="mt-auto bg-light py-2">
    <div class="container text-center">
      <p class="text-muted mb-0">© 2025 Registrar SIS. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AJAX Script -->
  <script>
    document.getElementById("student_number").addEventListener("blur", function() {
      let studentNumber = this.value;
      if (studentNumber.trim() !== "") {
        fetch("get_student.php?student_number=" + studentNumber)
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              document.getElementById("full_name").value = data.full_name;
              document.getElementById("course").value = data.course;
              document.getElementById("year_section").value = data.year_section;
            } else {
              alert("Student not found!");
              document.getElementById("full_name").value = "";
              document.getElementById("course").value = "";
              document.getElementById("year_section").value = "";
            }
          });
      }
    });
  </script>
</body>
</html>
