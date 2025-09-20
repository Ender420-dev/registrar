<?php
// Start session
session_start();
include 'db.php';

// Handle login
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $sql = "SELECT * FROM users WHERE username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    // Use password_hash() in real system
    if (password_verify($password, $row['password'])) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      header("Location: dashboard.php");
      exit;
    } else {
      $error = "Invalid password!";
    }
  } else {
    $error = "User not found!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Information System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #1d3557, #457b9d);
      color: #f8f9fa;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-card {
      background: #ffffff;
      color: #212529;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      max-width: 420px;
      width: 100%;
      padding: 30px;
    }
    .login-card h3 {
      color: #1d3557;
      font-weight: bold;
    }
    .btn-custom {
      background-color: #1d3557;
      color: #fff;
    }
    .btn-custom:hover {
      background-color: #16324f;
    }
    .form-control:focus {
      border-color: #457b9d;
      box-shadow: 0 0 0 0.2rem rgba(69,123,157,.25);
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="text-center mb-4">
      <i class="bi bi-mortarboard-fill fs-1 text-primary"></i>
      <h3>Registrar Login</h3>
      <p class="text-muted">Secure access to the Registrar Information System</p>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-custom w-100">
        <i class="bi bi-box-arrow-in-right"></i> Login
      </button>
    </form>

    <div class="text-center mt-4">
      <p class="small text-muted">&copy; <?= date("Y") ?> Registrar SIS. All rights reserved.</p>
    </div>
  </div>
</body>
</html>
