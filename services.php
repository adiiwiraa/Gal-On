<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Services</title>
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
  <div class="services_section layout_padding">
    <div class="container">
      <h1 class="services_taital"><span>Our</span> <img src="images/water_smol.png"> <span
          style="color: #1f1f1f">Services</span></h1>
      <p class="services_text">Jasa dan Layanan yang ada di Gal-On</p>
      <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="services_section_2 layout_padding">
              <div class="row">
                <div class="col-md-6">
                  <div class="box_section">

                    <a href="<?php echo isset($_SESSION['email']) ? 'services_BeliGalon.php' : 'login.php' ?>"
                      onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda harus login terlebih dahulu\')'; ?>">
                      <div class="tiles_img"></div>
                      <h3 class="tile_text">Beli Galon</h3>
                      <p class="lorem_text">Beli Galon siap di antar ke rumah mu </p>
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box_section">
                    <a href="<?php echo isset($_SESSION['email']) ? 'services_RefillGalon.php' : 'login.php' ?>"
                      onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda harus login terlebih dahulu\')'; ?>">
                      <div class="tiles_img_1"></div>
                      <h3 class="tile_text">Refill Water</h3>
                      <p class="lorem_text">Refill Galon sesuai dengan yang kamu mau</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="services_section_2 layout_padding">
              <div class="row">
                <div class="col-md-12">
                  <div class="box_section">
                    <a href=" <?php echo isset($_SESSION['email']) ? 'services_History.php' : 'login.php' ?>"
                      onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda harus login terlebih dahulu\')'; ?>">
                      <div class="tiles_img_1"></div>
                      <h3 class="tile_text">History Transaksi</h3>
                      <p class="lorem_text">Dapat Melihat History Transaksi</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
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