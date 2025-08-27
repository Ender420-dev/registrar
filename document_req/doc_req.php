<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar - Document Requests</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css?v=1.3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
  <!-- navbar / sidebar -->
  <?php include '../sidenav.php'; ?>

  <div class="main-content flex-grow-1">
    <div class="container py-3">
      <div class="card shadow-lg">
        <div class="card-header text-center bg-primary text-white">
          <h3>Document Requests (Admin)</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Student No.</th>
                <th>Document Type</th>
                <th>Purpose</th>
                <th>Status</th>
                <th>Requested At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../db.php';
              $sql = "SELECT dr.*, s.full_name 
                      FROM document_requests dr
                      LEFT JOIN students s ON dr.student_number = s.student_number
                      ORDER BY dr.requested_at DESC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                  $badge = '';
                  switch ($row['status']) {
                    case 'Pending': $badge = 'bg-warning text-dark'; break;
                    case 'Approved': $badge = 'bg-success'; break;
                    case 'Released': $badge = 'bg-info text-dark'; break;
                    case 'Rejected': $badge = 'bg-danger'; break;
                  }

                  echo "<tr>
                          <td>{$count}</td>
                          <td>{$row['student_number']}<br><small>{$row['full_name']}</small></td>
                          <td>{$row['document_type']}</td>
                          <td>{$row['purpose']}</td>
                          <td><span class='badge {$badge}'>{$row['status']}</span></td>
                          <td>{$row['requested_at']}</td>
                          <td>
                            <a href='update_request.php?id={$row['id']}&status=Approved' class='btn btn-success btn-sm'><i class='bi bi-check2-circle'></i></a>
                            <a href='update_request.php?id={$row['id']}&status=Rejected' class='btn btn-danger btn-sm'><i class='bi bi-x-circle'></i></a>
                            <a href='update_request.php?id={$row['id']}&status=Released' class='btn btn-info btn-sm'><i class='bi bi-box-arrow-up'></i></a>
                          </td>
                        </tr>";
                  $count++;
                }
              } else {
                echo "<tr><td colspan='7' class='text-muted'>No document requests found.</td></tr>";
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
</body>
</html>
