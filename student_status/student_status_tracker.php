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
    @import url("../style.css");

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
  <!-- sidenav -->
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
                <input type="text" name="student_id" class="form-control" placeholder="Search by Student ID">
              </div>
              <div class="col-md-3">
                <input type="text" name="student_name" class="form-control" placeholder="Search by Name">
              </div>
              <div class="col-md-2">
                <select name="course" class="form-select">
                  <option value="">All Courses</option>
                  <option value="BSCS">BSCS</option>
                  <option value="BSIT">BSIT</option>
                  <option value="BSBA">BSBA</option>
                </select>
              </div>
              <div class="col-md-2">
                <select name="status" class="form-select">
                  <option value="">All Status</option>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                  <option value="Graduated">Graduated</option>
                  <option value="Dropped">Dropped</option>
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
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Sample rows (replace with PHP fetch loop) -->
      <tr>
        <td>2025001</td>
        <td>Juan Dela Cruz</td>
        <td>BSCS</td>
        <td>3rd Year</td>
        <td><span class="status-badge bg-success text-white">Active</span></td>
        <td>2025-08-15</td>
        <td>
          <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
          <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
          <button class="btn btn-secondary btn-sm"><i class="bi bi-clock-history"></i></button>
        </td>
      </tr>
      <tr>
        <td>2025002</td>
        <td>Maria Santos</td>
        <td>BSIT</td>
        <td>4th Year</td>
        <td><span class="status-badge bg-danger text-white">Dropped</span></td>
        <td>2025-07-30</td>
        <td>
          <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
          <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
          <button class="btn btn-secondary btn-sm"><i class="bi bi-clock-history"></i></button>
        </td>
      </tr>
      <tr>
        <td>2025003</td>
        <td>Carlos Reyes</td>
        <td>BSBA</td>
        <td>2nd Year</td>
        <td><span class="status-badge bg-primary text-white">Graduated</span></td>
        <td>2025-05-22</td>
        <td>
          <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
          <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
          <button class="btn btn-secondary btn-sm"><i class="bi bi-clock-history"></i></button>
        </td>
      </tr>
      <tr>
        <td>2025004</td>
        <td>Ana Lopez</td>
        <td>BSHM</td>
        <td>1st Year</td>
        <td><span class="status-badge bg-warning text-dark">Transferee</span></td>
        <td>2025-08-20</td>
        <td>
          <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
          <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
          <button class="btn btn-secondary btn-sm"><i class="bi bi-clock-history"></i></button>
        </td>
      </tr>
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
