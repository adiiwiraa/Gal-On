<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
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
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <br> <br>
        <h1 class="text-center mb-4">Reset Password</h1>
        <form id="resetForm" action="reset_password.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
          </div>
          <div class="mb-3">
            <label for="confirm_new_password" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
          </div>
          <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $new_password = $_POST['new_password'];
  $confirm_new_Password = $_POST['confirm_new_password'];

  $query = "SELECT * FROM user WHERE Email_User = '$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $updateQuery = "UPDATE user SET Password_User = '$new_password' WHERE email_user = '$email'";
    mysqli_query($conn, $updateQuery);
    header('Location: login.php');
    ;
  } else {
    echo "Email not found.";
  }
}
?>

</html>