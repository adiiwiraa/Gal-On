<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- mobile metas -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1"> -->
    <!-- site metas -->
    <title>Services</title>
    <!-- <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content=""> -->
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

</head>

<body>
    <!--header section start -->
    <div class="header_section background_bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
                </div>

            </div>
        </div>
    </div>
    <!-- header section end -->
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital"><span>Our</span> <img src="images/water_smol.png"> <span
                    style="color: #1f1f1f">Services</span></h1>
            <p class="services_text">Jasa dan Layanan yang ada di Gal-On</p>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="services_section_2 layout_padding">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box_section">
                                    <a href="Admin_Stok.php">
                                        <div class="tiles_img"></div>
                                        <h3 class="tile_text">Stok Barang</h3>
                                        <p class="lorem_text">Melihat stok barang yang tersedia </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box_section">
                                    <a href="admin_status_home.php">
                                        <div class="tiles_img_1"></div>
                                        <h3 class="tile_text">Transaksi User</h3>
                                        <p class="lorem_text">Melihat Transkasi user</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="row">
        <div class="col-md-6">
          <div class="box_section">
            <a href="services_BeliGalon.php">
              <div class="tiles_img"></div>
              <h3 class="tile_text">Beli Galon</h3>
              <p class="lorem_text">Beli Galon siap di antar dan bla3 </p>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box_section">
            <a href="services_RefillGalon.php">
              <div class="tiles_img_1"></div>
              <h3 class="tile_text">Refill Water</h3>
              <p class="lorem_text">Refill Galon datang ke rumah mu bla3</p>
            </a>
          </div>
        </div>
      </div> -->

        </div>
    </div>
    <!-- services section start -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">Copyright 2023 All Right Reserved By Gal-On Company</p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
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