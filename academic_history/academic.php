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
          <h3 class="card-header text-center">Academic History</h3>
        </div>
        <div class="card-body">
          <div class="row">
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
      <tr>
        <td>2023-0001</td>
        <td>John Doe</td>
        <td>BS Computer Science</td>
        <td>1st Year</td>
        <td>
          <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
          <button class="btn btn-sm btn-danger">Delete</button>
        </td>
      </tr>
      <tr>
        <td>2023-0002</td>
        <td>Jane Smith</td>
        <td>BS Information Technology</td>
        <td>2nd Year</td>
        <td>
          <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
          <button class="btn btn-sm btn-danger">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<!-- View Modal -->
<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="row g-3">

          <!-- Student Photo -->
          <div class="col-md-3 text-center">
            <img src="https://via.placeholder.com/150" alt="Student Photo" class="img-thumbnail mb-2">
            <p class="fw-bold">John Doe</p>
            <small class="text-muted">Student ID: 2023-0001</small>
          </div>

          <!-- Student Info and Grades -->
          <div class="col-md-9">
            <div class="row">

              <!-- Info Card -->
              <div class="col-12 mb-3">
                <div class="card border-primary">
                  <div class="card-header bg-primary text-white">Student Information</div>
                  <div class="card-body">
                    <p><strong>Course:</strong> BS Computer Science</p>
                    <p><strong>Year Level:</strong> 1st Year</p>
                    <p><strong>Email:</strong> johndoe@email.com</p>
                    <p><strong>Contact:</strong> 09123456789</p>
                  </div>
                </div>
              </div>

              <!-- Grades Card -->
              <!-- Grades Card with Semester Selection -->
<div class="col-12">
  <div class="card border-success">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <span>Grades</span>
      <select class="form-select form-select-sm w-auto" id="semesterSelect" onchange="switchSemesterGrades()">
        <option value="sem1">1st Semester</option>
        <option value="sem2">2nd Semester</option>
      </select>
    </div>
    <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
      
      <!-- Semester 1 Grades -->
      <div id="grades-sem1" class="grades-table">
        <table class="table table-bordered mb-0 text-center">
          <thead class="table-light">
            <tr>
              <th>Subject</th>
              <th>Midterm</th>
              <th>Final</th>
              <th>Remarks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Programming 1</td>
              <td>89</td>
              <td>92</td>
              <td>Passed</td>
            </tr>
            <tr>
              <td>Math 1</td>
              <td>85</td>
              <td>88</td>
              <td>Passed</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Semester 2 Grades (initially hidden) -->
      <div id="grades-sem2" class="grades-table d-none">
        <table class="table table-bordered mb-0 text-center">
          <thead class="table-light">
            <tr>
              <th>Subject</th>
              <th>Midterm</th>
              <th>Final</th>
              <th>Remarks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Programming 2</td>
              <td>90</td>
              <td>91</td>
              <td>Passed</td>
            </tr>
            <tr>
              <td>Math 2</td>
              <td>87</td>
              <td>89</td>
              <td>Passed</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>


            </div> <!-- row -->
          </div> <!-- col-md-9 -->

        </div> <!-- row -->
      </div> <!-- modal-body -->

    </div>
  </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-2">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" value="John Doe">
          </div>
          <div class="mb-2">
            <label class="form-label">Course</label>
            <input type="text" class="form-control" value="BS Computer Science">
          </div>
          <div class="mb-2">
            <label class="form-label">Year Level</label>
            <select class="form-select">
              <option selected>1st Year</option>
              <option>2nd Year</option>
              <option>3rd Year</option>
              <option>4th Year</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success w-100">Save Changes</button>
        </form>
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