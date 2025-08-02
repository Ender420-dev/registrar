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
    <div class="container" style="height:300px;">
      <div class="card" style="height:700px; overflow-x:scroll;">
        <div class="card-content">
          <h3 class="card-header text-center">Personal Info Dashboard</h3>
        </div>
        <div class="card-body">
          <div class="container">
          <div class="row">
          <div class="row text-white mb-4">
    <div class="col-md-3 mb-3">
      <div class="card bg-primary">
        <div class="card-body">
          <h5>Total Enrolled</h5>
          <h3>3,542</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card bg-success">
        <div class="card-body">
          <h5>Pending Documents</h5>
          <h3>214</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card bg-warning">
        <div class="card-body">
          <h5>Scholarship Students</h5>
          <h3>512</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card bg-danger">
        <div class="card-body">
          <h5>Dropouts</h5>
          <h3>37</h3>
        </div>
      </div>
    </div>
  </div>
           

  
</div>


              


            </div>
            <div class="col">
            <div class="row mb-3">
  <div class="col-md-3">
    <input type="text" class="form-control" id="searchID" placeholder="Search Student ID">
  </div>
  <div class="col-md-3">
    <input type="text" class="form-control" id="searchName" placeholder="Search Full Name">
  </div>
  <div class="col-md-3">
    <select class="form-select" id="searchCourse">
      <option value="">All Departments</option>
      <option value="BS Computer Science">BS Computer Science</option>
      <option value="BS Information Technology">BS Information Technology</option>
      <option value="BS Course 3">BS Course 3</option>
      <!-- Add more as needed -->
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

              <div class="table-responsive">
                <table class="table table-hover ">
                  <thead>
                    <tr>
                      <th>Student ID</th>
                      <th>FullName</th>
                      <th>Current Course</th>
                      <th>Current Year Level</th>
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
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                          data-bs-target="#viewModalStudentID1">View</button>
                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                          data-bs-target="#editModalStudentID1">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                      </td>
                    </tr>
                  </tbody>
                  <?php for ($i = 2; $i <= 20; $i++): ?>
                    <tr>
                      <td>2023-<?php echo str_pad($i, 4, '0', STR_PAD_LEFT); ?></td>
                      <td>Student <?php echo $i; ?></td>
                      <td>BS Course <?php echo $i; ?></td>
                      <td>
                        <?php echo ($i % 4 == 1 ? '1st Year' : ($i % 4 == 2 ? '2nd Year' : ($i % 4 == 3 ? '3rd Year' : '4th Year'))); ?>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                          data-bs-target="#viewModalStudentID<?php echo $i; ?>">View</button>
                        <button class="btn btn-secondary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                      </td>
                    </tr>



                  <?php endfor; ?>
                  <div class="modal fade" id="editModalStudentID1" tab-index="-1" aria-labelledby="viewModalStudentID1" aria-hidden="true">

                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalStudentID1">Edit Student Info</h1>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
  <form>
    <div class="row">
      <!-- Left Column -->
      <div class="col-6">
        <div class="mb-3 text-center">
          <img src="" alt="Student Photo" class="rounded mb-3"
            style="width:70px; height:70px;">
          <!-- Optional: Add file input for photo upload -->
          <input type="file" class="form-control form-control-sm">
        </div>

        <div class="mb-3">
          <label for="studentName" class="form-label">Name</label>
          <input type="text" class="form-control" id="studentName" value="John Doe">
        </div>

        <div class="mb-3">
          <label for="studentID" class="form-label">Student ID</label>
          <input type="text" class="form-control" id="studentID" value="2023-0001">
        </div>

        <div class="mb-3">
          <label for="course" class="form-label">Course</label>
          <input type="text" class="form-control" id="course" value="BS Computer Science">
        </div>

        <div class="mb-3">
          <label for="yearLevel" class="form-label">Year Level</label>
          <input type="text" class="form-control" id="yearLevel" value="1st Year">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" value="johndoe@example.com">
        </div>

        <div class="mb-3">
          <label for="contact" class="form-label">Contact</label>
          <input type="text" class="form-control" id="contact" value="+1234567890">
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" rows="2">123 Main Street, City, Country</textarea>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-6">
        <div class="mb-3">
          <label for="gender" class="form-label">Gender</label>
          <select class="form-select" id="gender">
            <option selected>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="primaryEdu" class="form-label">Primary Education</label>
          <input type="text" class="form-control" id="primaryEdu" value="Toro Hills Elementary School">
        </div>

        <div class="mb-3">
          <label for="primaryYear" class="form-label">Primary Year</label>
          <input type="text" class="form-control" id="primaryYear" value="2007-2012">
        </div>

        <div class="mb-3">
          <label for="secondaryEdu" class="form-label">Secondary Education</label>
          <input type="text" class="form-control" id="secondaryEdu" value="San Francisco High School">
        </div>

        <div class="mb-3">
          <label for="secondaryYear" class="form-label">Secondary Year</label>
          <input type="text" class="form-control" id="secondaryYear" value="2012-2016">
        </div>

        <div class="mb-3">
          <label for="higherEdu" class="form-label">Higher Education</label>
          <input type="text" class="form-control" id="higherEdu" value="City University">
        </div>

        <div class="mb-3">
          <label for="higherYear" class="form-label">Higher Year</label>
          <input type="text" class="form-control" id="higherYear" value="2016-2020">
        </div>

        <div class="mb-3">
          <label for="achievements" class="form-label">Achievements</label>
          <textarea class="form-control" id="achievements" rows="2">Dean's Lister, Best in Programming</textarea>
        </div>

        <div class="mb-3">
          <label for="hobbies" class="form-label">Hobbies</label>
          <textarea class="form-control" id="hobbies" rows="2">Reading, Coding, Playing Chess</textarea>
        </div>
      </div>
    </div>

    <!-- Submit or Save button -->
    <div class="text-end">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

                    </div>
                  </div>

                  </div>
                  <div class="modal fade" id="viewModalStudentID1" tabindex="-1" aria-labelledby="viewModalStudentID1"
                    aria-hidden="true">

                    <div class="modal-dialog modal-xl">
                      <div class="modal-content ">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="viewModalStudentID1">Student Info</h1>
                          <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-xl-6 text-start">
                              <img src="../pic.jpeg" alt="Student Photo" class="rounded mb-3"
                                style="width:70px; height:70px;">
                              <h5>Name: <span>John Doe</span></h5>
                              <p>Student ID: <span>2023-0001</span></p>
                              <p>Course: <span>BS Computer Science</span></p>
                              <p>Year Level: <span>1st Year</span></p>
                              <p>Email: <span>johndoe@example.com</span></p>
                              <p>Contact: <span>+1234567890</span></p>
                              <p>Address: <span>123 Main Street, City, Country</span></p>
                            </div>
                            <div class="col-xl-6 text-start">
                              <p>Gender: <span>Male</span></p>
                              <p>Primary Education: <span>Toro Hills Elementary School</span></p>
                              <p>Primary Year: <span>2007-2012</span></p>
                              <p>Secondary Education: <span>San Francisco High School</span></p>
                              <p>Secondary Year: <span>2012-2016</span></p>
                              <p>Higher Education: <span>City University</span></p>
                              <p>Higher Year: <span>2016-2020</span></p>
                              <p>Achievements: <span>Dean's Lister, Best in Programming</span></p>
                              <p>Hobbies: <span>Reading, Coding, Playing Chess</span></p>
                            </div>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>



            </div>

            </table>
          </div>
        </div>
      </div>

      <div class="row">

      </div>
    </div>
  </div></div>

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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>
<script>

const enrollmentCtx = document.getElementById('enrollmentChart').getContext('2d');
  const genderCtx = document.getElementById('genderChart').getContext('2d');

  new Chart(enrollmentCtx, {
    type: 'line',
    data: {
      labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
      datasets: [{
        label: 'Enrollment',
        data: [2000, 2500, 2700, 3000, 3300, 3542],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: '#007bff',
        borderWidth: 2,
        fill: true
      }]
    }
  });

  new Chart(genderCtx, {
    type: 'pie',
    data: {
      labels: ['Male', 'Female', 'Other'],
      datasets: [{
        data: [1800, 1700, 42],
        backgroundColor: ['#0d6efd', '#dc3545', '#ffc107']
      }]
    }
  });
</script>