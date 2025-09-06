<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar - Health Record</title>

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
      <div class="card" style="height:700px; overflow-x:auto;">
        <div class="card-content">
          <h3 class="card-header text-center">Health Record</h3>
        </div>
        <div class="card-body">

          <!-- Search bar -->
          <div class="row mb-3">
            <div class="col-md-6">
              <input type="text" id="searchStudent" class="form-control" placeholder="Search by Student ID">
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" id="searchBtn"><i class="bi bi-search"></i> Search</button>
            </div>
          </div>

          <!-- Student Details Modal -->
          <div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="studentDetailsLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title" id="studentDetailsLabel">Student Details</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="studentDetailsBody">
                  <p class="text-muted">Search a student ID to see details.</p>
                </div>
              </div>
            </div>
          </div>

        </div> <!-- card-body -->
      </div> <!-- card -->
    </div>
  </div>

  <footer class="mt-auto bg-light">
    <div class="container text-center">
      <p class="text-muted">© 2025 Registrar SIS. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  document.getElementById("searchBtn").addEventListener("click", function() {
    let studentID = document.getElementById("searchStudent").value;

    if (studentID.trim() === "") {
      alert("Please enter a Student ID.");
      return;
    }

    fetch("search_student.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: "studentID=" + encodeURIComponent(studentID)
    })
    .then(response => response.text())
    .then(data => {
      document.getElementById("studentDetailsBody").innerHTML = data;
      let modal = new bootstrap.Modal(document.getElementById("studentDetailsModal"));
      modal.show();
    })
    .catch(error => console.error("Error:", error));
  });
  </script>
</body>
</html>
