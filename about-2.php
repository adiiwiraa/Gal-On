<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>About</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
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
              <div class="togle_3">
                <div class="menu_main">
                <?php
                  if (isset($_SESSION['email'])) {
                    echo " <div class='padding_left0'><a href='logout.php'>Logout</a>
                  </div>";

                  }
                  if (!isset($_SESSION['email'])) {
                    echo " <div class='padding_left00'><a href='register.php'>Register</a>
                    <span class='padding_left00'><a href='login.php'>Login</a></span>
                  </div>";
                  } ?>
                </div>
              </div>
              <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                  <a href="index.php">Home</a>
                  <a href="services.php">Services</a>
                  <a href="about.php">About</a>
                                                    </div>
              </div>
              <span class="navbar-toggler-icon"></span>
              <span onclick="openNav()"><img src="images/toggle-icon.png" class="toggle_menu"></span>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="about_section layout_padding">
    <div class="container">
      <h1 class="services_taital"><span>About </span> <img src="images/water_smol.png">
        <span style="color: #1f1f1f">Us</span></h1>
      <div class="row">
        <div class="col-md-6">
          <p align=justify class="ipsum_text">Gal-On adalah perusahaan yang bergerak dalam penyediaan galon dan air
            minum kemasan berkualitas tinggi.
            Kami mengerti betapa pentingnya akses mudah dan aman terhadap air minum yang segar dan terjaga
            kebersihannya.
            Selain itu, kami juga menyediakan air minum kemasan dalam botol yang praktis dan mudah dibawa.
            Botol-botol kami diproduksi dengan standar tertinggi, memastikan air minum tetap segar dan bebas dari
            kontaminan selama jangka waktu yang lama.
          </p>
        </div>
        <div class="col-md-6">
          <p align=justify class="ipsum_text">Kualitas air minum kami sangat dijaga melalui proses filtrasi dan
            pengujian yang ketat.
            Kami menggunakan teknologi modern untuk menghilangkan kontaminan dan memastikan bahwa air yang kami sediakan
            aman untuk dikonsumsi.
            Kami menempatkan kepuasan pelanggan sebagai prioritas utama kami.
            Dengan tim pengiriman yang handal, kami menjamin pengantaran tepat waktu dan efisien ke tempat tinggal atau
            kantor pelanggan kami.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright_section">
    <div class="container">
      <p class="copyright_text">Copyright 2023 All Right Reserved By Gal-On Company</p>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/owl.carousel.js"></script>
  <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
      });

      $(".zoom").hover(function () {

        $(this).addClass('transition');
      }, function () {

        $(this).removeClass('transition');
      });
    });
  </script>
  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>

</html>