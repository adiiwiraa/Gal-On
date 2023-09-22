<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $telp = $_POST['telp'];
  $address = $_POST['address'];

  $checkQuery = "SELECT * FROM `user` WHERE `email_user` = '$email'";
  $checkResult = $conn->query($checkQuery);

  if ($checkResult->num_rows > 0) {
    $error = "Email already taken. Try again with another email.";
  } else {
    $input = mysqli_query($conn, "INSERT INTO user (Nama_User, Password_User, Telp_User, Email_User, Alamat_User) 
                                  VALUES ('$fullname', '$password', '$telp', '$email', '$address')");

    if ($input) {
      header('location:login.php');
    } else {
      echo "Failed <a href ='formpelanggan.php'>Back</a>";
    }
  }
}
$conn->close();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
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
      <div class="col-lg-6">
        <div class="image_login"><img src="images/register.png"><br></div>
        <h1 class="text-center mb-4"><br> Register</h1>
        <form id="registerForm" action="register.php" method="POST">
          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="telp" class="form-label">Nomor Telepon</label>
            <input type="telp" class="form-control" id="telp" name="telp" required>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" rows="4" name="address" required></textarea>
          </div>
          <div class="text-center mb-4">
            <br><button type="submit" class="btn btn-primary">Register</button><br><br>
            <a>Already have an account?<a href="login.php"> Login now.</a></a>
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

</html>