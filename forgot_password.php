<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <!--header section start -->
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
  <!-- header section end -->

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <br> <br>
        <h1 class="text-center mb-4">Forgot Password</h1>
        <form id="resetForm" action="forgot_password.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
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
  // Check if the email exists in the user table in the database
  $query = "SELECT * FROM user WHERE Email_User = '$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // Redirect the user to a success page or display a success message
    header('Location: reset_password.php');
    ;
  } else {
    // Email does not exist in the user table
    echo "Email not found.";
  }
}
?>

</html>