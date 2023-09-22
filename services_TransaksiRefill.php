<?php
session_start();
include 'db_connection.php';

$user_id = $_SESSION['email'];

$sql = " SELECT ID_Barang, MAX(Index_Transaksi) AS Index_Transaksi , tgl_Pemesanan FROM transaksi_refill WHERE Email_User = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $Index = (int) $row['Index_Transaksi'];
  $Tgl_Pemesanan = (string) $row['tgl_Pemesanan'];
  $ID_Barang_sementara = (int) $row['ID_Barang'];

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

include 'db_connection.php';
$index_transaksi = $_POST['Index_Transaksi'];

// Contoh query INSERT untuk menyimpan data ke dalam tabel yang sesuai
$query = "DELETE FROM transaksi_refill WHERE Index_Transaksi = $index_transaksi";

// Jalankan query
if ($conn->query($query) === TRUE) {

  header("Location: Admin_Galon.php");
  exit();

} else {
  // Jika terjadi kesalahan, tangani secara sesuai
  echo "Error: " . $query . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
}

echo "<script>alert('" . $Index . "dan " . $Tgl_Pemesanan . " ');</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Services</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
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
        <div class="col-md-9">
          <div class="menu_text">
          </div>
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
      <p class="services_text">Konfirmasi Pesanan</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Tipe</th>
            <th scope="col">Stok</th>
            <th scope="col">Price</th>

          </tr>
        </thead>
        <tbody>
          <?php
          include 'db_connection.php';

          $sql1 = "SELECT ID_Barang, MAX(Index_Transaksi) AS Index_Transaksi, tgl_Pemesanan FROM transaksi_refill WHERE Email_User = '$user_id'";
          $result1 = $conn->query($sql1);

          $data = array();
          $ID_Barang_sementara = null;
          $total = 0;
          while ($row1 = $result1->fetch_assoc()) {
            $ID_Barang_sementara = $row1["ID_Barang"];
            $Index = $row1["Index_Transaksi"];

            $sql = "SELECT jasa.ID_Barang, jasa.Harga_Jasa, jasa.Stok, transaksi_refill.Jml_Jasa
            FROM supplier JOIN jasa ON supplier.ID_Supplier = jasa.ID_Supplier
            JOIN transaksi_refill ON jasa.ID_Barang = transaksi_refill.ID_Barang
            WHERE transaksi_refill.Index_Transaksi = $Index";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $ID_Barang = $row["ID_Barang"];
                $jumlah_pesan = $row["Jml_Jasa"];
                $price = $row["Harga_Jasa"];
                $stok = $row["Stok"];

                $total = $total + ($price * $jumlah_pesan);
              }
            }
          }
          //$Harga_perJasa = $stok * $price;
          

          echo "<script>alert('" . $Index . "');</script>";

          foreach ($data as $supplier => $rows) {
            echo "<tr>";
            echo "<td rowspan='" . count($rows) . "' id='supplier'>" . $supplier . "</td>";

            foreach ($rows as $index => $row) {
              if ($index > 0) {
                echo "<tr>";
              }
              echo "<td id='tipe'>" . $row['tipe'] . "</td>";
              echo "<td><p id='stock'>" . $row['jumlah_pesan'] . "</p></td>";
              echo "<td><a>Rp. " . $row['price'] . "</a></td>";
              echo "<td>";
              echo "<div class='quantity'>";
              echo "<div class='row'>";
              echo "</div>";
              echo "</div>";
              echo "</td>";
              // echo "<input type='hidden' name='quantity[]' value='0' oninput='calculateTotal()'>";
          



              echo "</tr>";

            }
          }

          // $sql = "SELECT `ID_Transaksi_Brg`, `ID_Barang`, `Email_User`, `Jml_Jasa`, `Tgl_Pemesanan`, MAX(Index_Transaksi) AS Index_Transaksi FROM `transaksi_refill` WHERE 1";
          

          // $result = $conn->query($sql);
          
          // if ($result->num_rows > 0) {
          //   $data = array();
          
          //   while ($row = $result->fetch_assoc()) {
          //     $ID_Transaksi_Brg = $row["ID_Transaksi_Brg"];
          //     $ID_Barang = $row["ID_Barang"];
          //     $Jml_Jasa = $row["Jml_Jasa"];
          //     $Tgl_Pemesanan = $row["Tgl_Pemesanan"];
          //     $Index_Transaksi = $row["Index_Transaksi"];
          
          //     $data[$ID_Transaksi_Brg][] = array(
          //       "ID_Barang" => $ID_Barang,
          //       "Jml_Jasa" => $Jml_Jasa,
          //       "Tgl_Pemesanan" => $Tgl_Pemesanan,
          //       "Index_Transaksi" => $Index_Transaksi
          //     );
          //   }
          
          //   foreach ($data as $ID_Transaksi_Brg => $rows) {
          //     echo "<tr>";
          //     echo "<td rowspan='" . count($rows) . "' id='ID_Transaksi_Brg'>" . $ID_Transaksi_Brg . "</td>";
          
          //     foreach ($rows as $index => $row) {
          //       // if ($index > 0) {
          //       //     echo "<tr>";
          //       // }
          //       echo "<td id='suplier'>" . $row['ID_Barang'] . "</td>";
          //       echo "<td id='Jml_Jasa'>" . $row['Jml_Jasa'] . "</td>";
          //       echo "<td><a>Rp. " . $row['Tgl_Pemesanan'] . "</a></td>";
          //       echo "<td><p id='stock'>" . $row['Index_Transaksi'] . "</p></td>";
          //       echo "</tr>";
          
          //     }
          //   }
          // } else {
          echo "<tr>";
          // echo "<td colspan='5'>Tidak ada data jasa yang ditemukan.</td>";
          echo "</tr>";

          ?>
        <tfoot>
          <tr>
            <td colspan="3">
              Total
            </td>
            <td id="total_harga">
              Rp.
              <?php echo "$total" ?>
            </td>
          </tr>
        </tfoot>
        </tbody>
      </table>
      <p>*Gelas dan botol di jual dengan satuan dus</p>

      <div class="button_container">
        <a href="services.php" onclick="<?php 'alert(\'Anda harus login terlebih dahulu\')'; ?>>
                <form method= " POST" action="input_delete_transaksi.php">
          <?php echo "<input type='hidden' name='Index_Transaksi' value='" . $Index . "'>"; ?>
          </form>
          <button class=" btn btn-primary">Batal</button>
        </a>
        <a>
          <button class="btn btn-primary" onclick="showConfirmation()">Beli</button>
        </a>
      </div>
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

    function showConfirmation() {
      var result = confirm("Apakah Anda sudah yakin dengan pesanan Anda?");
      if (result) {
        // Jika pengguna mengklik "OK", redirect ke halaman "services.php"
        window.location.href = "services_Bayar.php";
      } else {
        // Jika pengguna mengklik "Batal", tidak terjadi apa-apa
      }
    }
  </script>
</body>

</html>

