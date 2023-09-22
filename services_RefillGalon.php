<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>Services</title>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="services_section layout_padding">
    <div class="container">
      <h1 class="services_taital"><span>Our</span> <img src="images/water_smol.png"> <span
          style="color: #1f1f1f">Services</span></h1>
      <p class="services_text">Jasa Galon yang tersedia</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Price</th>
            <th scope="col">Stok</th>
            <th scope="col">Quantity</th>
          </tr>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'db_connection.php';

          $sql = "SELECT * FROM jasa";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
              $Nama = $row["Nama_Jasa"];
              $price = $row["Harga_Jasa"];
              $stok = $row["Stok"];

              $data[$Nama][] = array(
                "price" => $price,
                "stok" => $stok
              );
            }

            foreach ($data as $Nama => $rows) {
              echo "<tr>";
              echo "<td rowspan='" . count($rows) . "'>" . $Nama . "</td>";

              foreach ($rows as $index => $row) {
                if ($index > 0) {
                  echo "<tr>";
                }

                echo "<td><a>Rp. " . $row['price'] . "</a></td>";
                echo "<td><p id='stock'>" . $row['stok'] . "</p></td>";
                echo "<td>";
                echo "<div class='quantity'>";
                echo "<div class='row'>";
                echo "<div class='minus'><i class='fa fa-minus'></i></div>";
                echo "<input type='text' name='quantity' value='0' oninput='calculateTotal()'>";
                echo "<div class='plus'><i class='fa fa-plus'></i></div>";
                echo "</div>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";

              }
            }
          } else {
            echo "<tr>";
            echo "<td colspan='5'>Tidak ada data barang yang ditemukan.</td>";
            echo "</tr>";
          }
          ?>

        <tfoot>
          <tr>
            <td colspan="3">
              Total
            </td>
            <td id="total_harga">
              0
            </td>
          </tr>
        </tfoot>
        </tbody>
      </table>
      <p>*Gelas dan botol di jual dengan satuan dus</p>

      <div class="button_container">
        <a href="services.php">
          <button class="btn btn-primary">Batal</button>
        </a>
        <a href="services_Transaksi.php">
          <button class="btn btn-primary">Beli</button>
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
      $(".minus").click(function () {
        var input = $(this).siblings("input[name='quantity']");
        var value = parseInt(input.val());
        if (value > 0) {
          input.val(value - 1);
          calculateTotal();
        }
      });

      $(".plus").click(function () {
        var input = $(this).siblings("input[name='quantity']");
        var value = parseInt(input.val());
        var stock = parseInt($(this).closest("tr").find("p#stock").text());

        if (value < stock) {
          input.val(value + 1);
          calculateTotal();
        } else {
          alert("Kuantitas yang dipilih melebihi stok yang tersedia.");
        }
      });

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

    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
    function calculateTotal() {
      var total = 0;

      $("tbody tr").each(function () {
        var price = parseFloat($(this).find("a:nth-child(1)").text().replace("Rp. ", "").replace(",", ""));
        var quantity = parseInt($(this).find("input[name='quantity']").val());
        var stock = parseInt($(this).find("p:nth-child(1)").text());

        if (!isNaN(price) && !isNaN(quantity)) {
          total += price * quantity;

        }
      });

      $("#total_harga").text("Rp. " + total.toLocaleString());

    }

    $(document).ready(function () {
      calculateTotal();
    });

  </script>
</body>
</html>