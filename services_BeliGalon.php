<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_SESSION['email'];
  $idBarang = $_POST['id_barang'];
  $tipe = $_POST['tipe'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $quantity = $_POST['quantity'];
  $timestamp = date('Y-m-d');
  $empty = true;

  $sql = " SELECT MAX(Index_Transaksi) AS Index_Transaksi FROM transaksi_barang WHERE Tgl_Pemesanan = '$timestamp' AND Email_User = '$user_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Index = (int) $row['Index_Transaksi']; 
    $Index++;
    for ($i = 0; $i < count($idBarang); $i++) {
      $idBarang[$i] = $conn->real_escape_string($idBarang[$i]);
      $tipe[$i] = $conn->real_escape_string($tipe[$i]);
      $harga[$i] = $conn->real_escape_string($harga[$i]);
      $stok[$i] = $conn->real_escape_string($stok[$i]);
      $quantity[$i] = $conn->real_escape_string($quantity[$i]);
      if ($quantity[$i] > 0) {
        $sql = "INSERT INTO `transaksi_barang`(`ID_Barang`, `Harga_Barang`,`Email_User`, `Jml_Barang`, `Tgl_Pemesanan`, `Index_Transaksi`) 
        VALUES ('$idBarang[$i]','$harga[$i]','$user_id','$quantity[$i]','$timestamp','$Index')";
        $result = $conn->query($sql);
        echo "<script>alert('" . $Index . "waktu = " . $timestamp . "user = " . $user_id . "index () pemesanan id= " . $idBarang[$i] . " tipe= " . $tipe[$i] . " harga = " . $harga[$i] . " stock= " . $stok[$i] . "quantitiy = " . $quantity[$i] . "');</script>";
        $empty = false;
      }
    }
  } else {
    echo "Tabel Transaksi kosong.";
  }


  if ($empty == true)
    echo "<script>alert('Silahkan isi pesanan!');</script>";


  $conn->close();

  header("Location: services_Transaksi.php");
}
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
      <h1 class="services_taital"><span>Our</span> <img src="images/icon-1.png"> <span
          style="color: #1f1f1f">Services</span></h1>
      <p class="services_text">Jasa Galon yang tersedia</p>
      <form method="POST">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Tipe</th>
              <th scope="col">Price</th>
              <th scope="col">Stok</th>
              <th scope="col">Quantity</th>
            </tr>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'db_connection.php';
            $sql = "SELECT supplier.Nama_Supplier,barang.ID_Barang, barang.Tipe_Barang, barang.Harga_Barang , barang.Stok FROM supplier JOIN barang ON supplier.ID_Supplier = barang.ID_Supplier";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $data = array();

              while ($row = $result->fetch_assoc()) {
                $id_barang = $row["ID_Barang"];
                $supplier = $row["Nama_Supplier"];
                $tipe = $row["Tipe_Barang"];
                $price = $row["Harga_Barang"];
                $stok = $row["Stok"];

                $data[$supplier][] = array(
                  "id_barang" => $id_barang,
                  "tipe" => $tipe,
                  "price" => $price,
                  "stok" => $stok
                );
              }
              foreach ($data as $supplier => $rows) {
                echo "<tr>";
                echo "<td rowspan='" . count($rows) . "' id='supplier'>" . $supplier . "</td>";

                foreach ($rows as $index => $row) {
                  if ($index > 0) {
                    echo "<tr>";
                  }
                  echo "<td id='tipe'>" . $row['tipe'] . "</td>";
                  echo "<td><a>Rp. " . $row['price'] . "</a></td>";
                  echo "<td><p id='stock'>" . $row['stok'] . "</p></td>";
                  echo "<td>";
                  echo "<div class='quantity'>";
                  echo "<div class='row'>";
                  echo "<div class='minus'><i class='fa fa-minus'></i></div>";
                  echo "<input type='text'  class='quantity-input'name='quantity[]' value='0' oninput='calculateTotal()'>";
                  echo "<div class='plus'><i class='fa fa-plus'></i></div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</td>";
                  echo "<input type='hidden' name='id_barang[]' value='" . $row['id_barang'] . "'>";
                  echo "<input type='hidden' name='tipe[]' value='" . $row['tipe'] . "'>";
                  echo "<input type='hidden' name='harga[]' value='" . $row['price'] . "'>";
                  echo "<input type='hidden' name='stok[]' value='" . $row['stok'] . "'>";
                  echo "<td><input  type='hidden' name='total_harga[]' value='0' readonly></td>";
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
              <td colspan="4">
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
            <button class="btn btn-primary type = " submit">Beli</button>
          </a>
      </form>
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
        var input = $(this).siblings("input[name='quantity[]']");
        var value = parseInt(input.val());
        if (value > 0) {
          input.val(value - 1);
          calculateTotal();
        }
      });

      $(".plus").click(function () {
        var input = $(this).siblings("input[name='quantity[]']");
        var value = parseInt(input.val());
        var stock = parseInt($(this).closest("tr").find("p#stock").text());
        var tipe = $(this).closest("tr").find("td#tipe").text();
        var supplier = $(this).closest("tr").find("td#supplier").text();
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
        var quantity = parseInt($(this).find("input[name='quantity[]']").val());
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