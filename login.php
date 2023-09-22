<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">

</head>

<body>
  <div class="header_section background_bg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
        </div>
        <div class="col-md-9">
          <div class="menu_text">
            <ul>
          </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6"> <br>
        <div class="image_login"><img src="images/login.png"><br></div>
        <h1 class="text-center mb-4"><br>Login</h1>
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
            <a href="forgot_password.php">Forgot Password?</a><br><br>
            <button type="submit" class="btn btn-primary">Login</button><br><br>
            <a>Don't have an account?<a href="register.php"> Register now.</a></a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="copyright_section">
    <div class="container">
      <p class="copyright_text">Copyright 2023 All Right Reserved By Gal-On Company</p>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email_input = $_POST['email'];
  $password_input = $_POST['password'];

  $query = "SELECT * FROM user WHERE email_user = '$email_input' AND password_user = '$password_input'";
  $result = $conn->query($query);
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['nama_user'];
    $email = $row['email_user'];
    $password = $row['password_user'];

    session_start();
    $_SESSION['email'] = $email_input;
    $_SESSION['username'] = $username;
    // atau informasi lain yang relevan
    header('Location: index.php');
    exit();
  } else {
    echo "<script>alert('Invalid email or password. Please try again.');</script>";
  }
}
$conn->close();
?>



</html>