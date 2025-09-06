<?php
include '../db.php'; // your DB connection

// Fetch students from DB
$sql = "SELECT * FROM personalinfo ORDER BY studentID ASC";
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
    <div class="container" style="height:300px;">
      <div class="card" style="height:700px; overflow-x:scroll;">
        <div class="card-content">
          <h3 class="card-header text-center">Personal Info Dashboard</h3>
        </div>
        <div class="card-body">

          <!-- Search Filters -->
          <div class="row mb-3">
            <div class="col-md-3"><input type="text" class="form-control" id="searchID" placeholder="Search Student ID"></div>
            <div class="col-md-3"><input type="text" class="form-control" id="searchName" placeholder="Search Full Name"></div>
            <div class="col-md-3">
              <select class="form-select" id="searchCourse">
                <option value="">All Departments</option>
                <option value="BS Computer Science">BS Computer Science</option>
                <option value="BS Information Technology">BS Information Technology</option>
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-select" id="searchYear">
                <option value="">All Year Levels</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
              </select>
            </div>
          </div>

          <!-- Table -->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Full Name</th>
                  <th>Current Course</th>
                  <th>Year Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($result->num_rows > 0): ?>
                  <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                      <td><?= $row['student_id'] ?></td>
                      <td><?= $row['full_name'] ?></td>
                      <td><?= $row['course'] ?></td>
                      <td><?= $row['year_level'] ?></td>
                      <td>
                        <!-- Pass student ID to modals -->
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['student_id'] ?>">View</button>
                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['student_id'] ?>">Edit</button>
                        <a href="delete_student.php?id=<?= $row['student_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>

                    <!-- View Modal -->
                    <div class="modal fade" id="viewModal<?= $row['student_id'] ?>" tabindex="-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5">Student Info</h1>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-xl-6">
                                <h5>Name: <?= $row['full_name'] ?></h5>
                                <p>Student ID: <?= $row['student_id'] ?></p>
                                <p>Course: <?= $row['course'] ?></p>
                                <p>Year Level: <?= $row['year_level'] ?></p>
                                <p>Email: <?= $row['email'] ?></p>
                                <p>Contact: <?= $row['contact'] ?></p>
                                <p>Address: <?= $row['address'] ?></p>
                              </div>
                              <div class="col-xl-6">
                                <p>Gender: <?= $row['gender'] ?></p>
                                <p>Primary Education: <?= $row['primary_education'] ?></p>
                                <p>Primary Year: <?= $row['primary_year'] ?></p>
                                <p>Secondary Education: <?= $row['secondary_education'] ?></p>
                                <p>Secondary Year: <?= $row['secondary_year'] ?></p>
                                <p>Higher Education: <?= $row['higher_education'] ?></p>
                                <p>Higher Year: <?= $row['higher_year'] ?></p>
                                <p>Achievements: <?= $row['achievements'] ?></p>
                                <p>Hobbies: <?= $row['hobbies'] ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?= $row['student_id'] ?>" tabindex="-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5">Edit Student Info</h1>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                            <form action="update_student.php" method="POST">
                              <input type="hidden" name="student_id" value="<?= $row['student_id'] ?>">
                              <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control" value="<?= $row['full_name'] ?>">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Course</label>
                                <input type="text" name="course" class="form-control" value="<?= $row['course'] ?>">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Year Level</label>
                                <input type="text" name="year_level" class="form-control" value="<?= $row['year_level'] ?>">
                              </div>
                              <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php else: ?>
                  <tr><td colspan="5" class="text-muted">No student records found.</td></tr>
                <?php endif; ?>
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
