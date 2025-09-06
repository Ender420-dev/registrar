<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar - QR Code Integration</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css?v=1.3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <style>
    @import url("../style.css");

    @media (max-width: 768px) and (orientation: landscape) {
      .sidebar {
        max-height: 100vh;
        overflow-y: auto;
      }
    }
  </style>
</head>

<body>
  <?php include '../sidenav.php'; ?>
  <?php include '../db.php'; ?>

  <div class="main-content flex-grow-1">
    <div class="container">
      <div class="card" style="height:700px; overflow-x:auto;">
        <div class="card-content">
          <h3 class="card-header text-center">QR Code Integration</h3>
        </div>
        <div class="card-body">

          <!-- Students Table -->
          <table class="table table-hover">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT studentID, CONCAT_WS(' ', FirstName, MiddleName, LastName) AS full_name, CurrentCourse 
                      FROM personalinfo 
                      ORDER BY studentID ASC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "
                  <tr>
                    <td>{$row['studentID']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['CurrentCourse']}</td>
                    <td>
                      <button class='btn btn-sm btn-primary generateQRBtn'
                              data-id='{$row['studentID']}'
                              data-name='{$row['full_name']}'>
                        <i class='bi bi-qr-code'></i> Generate QR
                      </button>
                    </td>
                  </tr>";
                }
              } else {
                echo "<tr><td colspan='4' class='text-muted'>No students found.</td></tr>";
              }
              ?>
            </tbody>
          </table>

          <!-- QR Modal -->
          <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="qrModalLabel">Student QR Code</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                  <p id="studentName" class="fw-bold"></p>
                  <div id="qrcode"></div>
                  <a id="downloadBtn" class="btn btn-sm btn-success mt-3" download="qrcode.png">
                    <i class="bi bi-download"></i> Download QR
                  </a>
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
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>

  <script>
    const qrModal = new bootstrap.Modal(document.getElementById('qrModal'));

    document.querySelectorAll('.generateQRBtn').forEach(button => {
      button.addEventListener('click', function () {
        const studentId = this.dataset.id;
        const studentName = this.dataset.name;

        document.getElementById("studentName").textContent = studentName;
        const qrDiv = document.getElementById("qrcode");
        qrDiv.innerHTML = "";

        // Change this to your actual hosted student info page
        const profileURL = `https://yourdomain.com/student_info.php?id=${studentId}`;

        const qrCode = new QRCode(qrDiv, {
          text: profileURL,
          width: 200,
          height: 200
        });

        setTimeout(() => {
          const img = qrDiv.querySelector('img') || qrDiv.querySelector('canvas');
          if (img) {
            const downloadLink = document.getElementById("downloadBtn");
            if (img.tagName.toLowerCase() === 'canvas') {
              downloadLink.href = img.toDataURL("image/png");
            } else {
              downloadLink.href = img.src;
            }
          }
        }, 500);

        qrModal.show();
      });
    });
  </script>
</body>
</html>
