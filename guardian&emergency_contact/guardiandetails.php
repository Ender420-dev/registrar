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
                    <h3 class="card-header text-center">Guardian & Emergency Contact</h3>
                </div>
                <div class="card-body">
                <?php
include '../db.php';


$sql = "SELECT g.*, 
               CONCAT_WS(' ', s.FirstName, s.MiddleName, s.LastName) AS full_name, 
               s.studentID
        FROM guardianemergencycontact g
        LEFT JOIN personalinfo s 
          ON g.PersonalID = s.studentID
        ORDER BY s.studentID ASC";
$result = $conn->query($sql);
?>


      <!-- Search bar -->
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="🔍 Search student, ID or guardian..." id="searchGuardian">
      </div>

      <!-- Data table -->
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>Student ID</th>
              <th>Student Name</th>
              <th>Guardian Name</th>
              <th>Relationship</th>
              <th>Contact Number</th>
              <th>Emergency Contact</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $statusBadge = ($row['status'] == 'Verified') ? "bg-success" : "bg-danger";

        echo "<tr>
                <td>{$row['student_number']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['guardian_name']}</td>
                <td>{$row['relationship']}</td>
                <td>{$row['contact_number']}</td>
                <td>{$row['emergency_contact']}</td>
                <td><span class='badge {$statusBadge}'>{$row['status']}</span></td>
                <td>
                    <a href='view_guardian.php?id={$row['id']}' class='btn btn-sm btn-info'>View</a>
                    <a href='edit_guardian.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8' class='text-muted'>No guardian records found.</td></tr>";
}
?>
</tbody>

        </table>
      </div>
            </div>
        </div>
    </div>

    <footer class="mt-auto bg-light">
        <div class="container text-center">
            <p class="text-muted">© 2025 Registrar SIS. All rights reserved.</p>
        </div>
    </footer>


    </style>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK"
    crossorigin="anonymous"></script>

</html>
<script>

document.getElementById('searchGuardian').addEventListener('keyup', function () {
    let input = this.value.toLowerCase();
    let rows = document.querySelectorAll('tbody tr');

    rows.forEach(function (row) {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(input) ? '' : 'none';
    });
});

</script>