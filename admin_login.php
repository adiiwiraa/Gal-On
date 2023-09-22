<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email_input = $_POST['email'];
  $password_input = $_POST['password'];
  $sql = "SELECT * FROM `admin` WHERE Email_Admin = '$email_input' AND Password_Admin = '$password_input'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    header('Location: Admin_Home.php');
    exit;
  } else {
    $error = "Invalid email or password. Please try again.";
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <style>
    body {
      background-color: #f4f4f4;
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 150px;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="login-container">
          <div class="Logo" align=center><img src="images/Logo_admin.png"></div>
          <br>
          <h2 style="font-size: x-large;">Admin</h2>
          <form id="loginForm" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name='email' required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
              <br><button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>