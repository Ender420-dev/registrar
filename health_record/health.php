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
          <h3 class="card-header text-center">Health Record</h3>
        </div>
        <div class="card-body">
          <div class="row">
          <div class="row mb-3">
  <div class="col-md-6">
    <input type="text" class="form-control" placeholder="Search by Student ID or Name">
  </div>
  <div class="col-md-4">
    <select class="form-select">
      <option selected>Filter by Health Condition</option>
      <option value="1">With Allergy</option>
      <option value="2">Asthmatic</option>
      <option value="3">Has Maintenance Medication</option>
    </select>
  </div>
  <div class="col-md-2 text-end">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#healthRecordModal">
  <i class="bi bi-plus-circle"></i> Add Health Record
</button>

  </div>
</div>
<!-- Add/Edit Health Record Modal -->
<div class="modal fade" id="healthRecordModal" tabindex="-1" aria-labelledby="healthRecordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="healthRecordModalLabel">Add Health Record</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label for="studentID" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="studentID" required>
          </div>
          <div class="col-md-6">
            <label for="visitDate" class="form-label">Date of Visit</label>
            <input type="date" class="form-control" id="visitDate" required>
          </div>

          <div class="col-md-6">
            <label for="visitPurpose" class="form-label">Visit Purpose</label>
            <input type="text" class="form-control" id="visitPurpose" required>
          </div>
          <div class="col-md-6">
            <label for="diagnosis" class="form-label">Diagnosis / Symptoms</label>
            <input type="text" class="form-control" id="diagnosis" required>
          </div>

          <div class="col-md-6">
            <label for="medicineGiven" class="form-label">Medicine Given</label>
            <input type="text" class="form-control" id="medicineGiven">
          </div>
          <div class="col-md-6">
            <label for="attendingNurse" class="form-label">Attending Nurse</label>
            <input type="text" class="form-control" id="attendingNurse">
          </div>

          <div class="col-12">
            <label for="additionalNotes" class="form-label">Additional Notes</label>
            <textarea class="form-control" id="additionalNotes" rows="3"></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Record</button>
      </div>
    </form>
  </div>
</div>

<div class="card mb-4">
  <div class="card-body d-flex align-items-center">
    <img src="https://via.placeholder.com/80" alt="Student Photo" class="rounded-circle me-3">
    <div>
      <h5 class="mb-1">John Doe</h5>
      <p class="mb-0">Student ID: 2023-0001 | BS Computer Science | 1st Year</p>
      <p class="mb-0">Blood Type: O+ | Allergies: Pollen | Maintenance: None</p>
    </div>
  </div>
</div>

<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th>Date</th>
        <th>Visit Purpose</th>
        <th>Diagnosis</th>
        <th>Medicine Given</th>
        <th>Attending Nurse</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2025-07-25</td>
        <td>Headache</td>
        <td>Minor Migraine</td>
        <td>Paracetamol</td>
        <td>Nurse Ana</td>
        <td>
          <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
          <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
        </td>
      </tr>
      <!-- Repeat as needed -->
    </tbody>
  </table>
</div>

      <div class="row">

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