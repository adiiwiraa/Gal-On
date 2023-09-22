<?php
session_start();
$user_id = $_SESSION['email'];
?>
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
      <p class="services_text">History Pesanan Transaksi Barang</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id_Transaksi</th>
            <th scope="col">Tanggal Pemesanan</th>
            <th scope="col"> Nama Barang</th>
            <th scope="col">Tipe Barang </th>
            <th scope="col">Harga</th>
        </thead>
        <tbody>
          <?php
          include 'db_connection.php';

          $sql = "SELECT supplier.Nama_Supplier, barang.ID_Barang, barang.Tipe_Barang, barang.Harga_Barang, barang.Stok, transaksi_barang.Jml_barang,transaksi_barang.Tgl_Pemesanan, transaksi_barang.Index_Transaksi
          FROM supplier JOIN barang ON supplier.ID_Supplier = barang.ID_Supplier
          JOIN transaksi_barang ON barang.ID_Barang = transaksi_barang.id_barang
          WHERE transaksi_barang.Email_User = '$user_id';";


          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
              $id_barang = $row["ID_Barang"];
              $Nama_Supplier = $row["Nama_Supplier"];
              $Index_Transaksi = $row["Index_Transaksi"];
              $Tgl_Pemesanan = $row["Tgl_Pemesanan"];

              $tipe = $row["Tipe_Barang"];
              $price = $row["Harga_Barang"];
              $stok = $row["Stok"];

              $data[$Index_Transaksi][] = array(
                "id_barang" => $id_barang,
                "Tgl_Pemesanan" => $Tgl_Pemesanan,
                "Nama_Supplier" => $Nama_Supplier,
                "tipe" => $tipe,
                "price" => $price,
                "stok" => $stok
              );
            }
            $jumlah = 0;
            foreach ($data as $Index_Transaksi => $rows) {

              echo "<tr>";
              echo "<td rowspan='" . count($rows) . "' id='Index_Transaksi'>" . $Index_Transaksi . "</td>";
              echo "<td rowspan='" . count($rows) . "' id='Tgl_Pemesanan'>" . $Tgl_Pemesanan . "</td>";

              $jumlah = 0;
              foreach ($rows as $index => $row) {
                if ($index > 0) {
                  echo "<tr>";
                }
                echo "<td id='tipe'>" . $row['Nama_Supplier'] . "</td>";

                echo "<td id='tipe'>" . $row['tipe'] . "</td>";
                echo "<td><a>Rp. " . $row['price'] . "</a></td>";

                echo "<td>";

                echo "</tr>";

              }
              echo "<tr>";
              echo "</tr>";

            }
          } else {
            echo "<tr>";
            echo "<td colspan='5'>Tidak ada data barang yang ditemukan.</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5">Hubungi nomor 081234031234 jika ada kendala </td>
          </tr>
        </tfoot>
      </table>
      <table class="table">
        <p class="services_text">History Pesanan Transaksi Jasa</p>
        <thead>
          <tr>
            <th scope="col">Id_Transaksi</th>
            <th scope="col">Tanggal Pemesanan</th>
            <th scope="col"> Nama Refill</th>
            <th scope="col">Harga</th>
        </thead>
        <tbody>
          <?php
          include 'db_connection.php';

          $sql = "SELECT jasa.Nama_Jasa, Jasa.Nama_Jasa, jasa.Harga_Jasa, jasa.Stok, transaksi_refill.Jml_Barang,transaksi_refill.Tgl_Pemesanan, transaksi_refill.Index_Transaksi
          FROM jasa JOIN transaksi_refill ON jasa.ID_Jasa = transaksi_refill.ID_Jasa
          WHERE transaksi_refill.Email_User = '$user_id';
";


          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {

              $Nama_Jasa = $row["Nama_Jasa"];
              $Index_Transaksi = $row["Index_Transaksi"];
              $Tgl_Pemesanan = $row["Tgl_Pemesanan"];

              $price = $row["Harga_Jasa"];
              $Jml_Barang = $row["Jml_Barang"];

              $data[$Index_Transaksi][] = array(
                "id_barang" => $id_barang,
                "Tgl_Pemesanan" => $Tgl_Pemesanan,
                "Nama_Jasa" => $Nama_Jasa,
                "tipe" => $tipe,
                "price" => $price,
                "Jml_Barang" => $Jml_Barang
              );
            }
            $jumlah = 0;
            foreach ($data as $Index_Transaksi => $rows) {

              echo "<tr>";
              echo "<td rowspan='" . count($rows) . "' id='Index_Transaksi'>" . $Index_Transaksi . "</td>";
              echo "<td rowspan='" . count($rows) . "' id='Tgl_Pemesanan'>" . $Tgl_Pemesanan . "</td>";

              $jumlah = 0;
              foreach ($rows as $index => $row) {
                if ($index > 0) {
                  echo "<tr>";
                }
                echo "<td id='tipe'>" . $row['Nama_Jasa'] . "</td>";

                echo "<td><a>Rp. " . $row['price'] . "</a></td>";

                echo "<td>";

                echo "</tr>";

              }
              echo "<tr>";
              echo "</tr>";

            }
          } else {
            echo "<tr>";
            echo "<td colspan='4'>Tidak ada data barang yang ditemukan.</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4">Hubungi nomor 081234031234 jika ada kendala </td>

          </tr>
        </tfoot>
      </table>
      <p></p>

      <div class="button_container">
        <a href="services.php">
          <button class="btn btn-primary">Kembali</button>
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

      $('[data-toggle="popover"]').popover({
        placement: 'top',
        html: true
      });
    });
  </script>
</body>

</html>