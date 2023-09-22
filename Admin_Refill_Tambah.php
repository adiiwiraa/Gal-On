<?php
// File conn ke database
include 'db_connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mendapatkan data dari form input
// $id = $_POST['id'];
  $Nama = $_POST['Nama_Jasa'];
  $Harga = $_POST['Harga_Jasa'];
  $Stok = $_POST['Stok_Jasa'];

  // Query untuk memasukkan data ke dalam tabel
  $query = "INSERT INTO Jasa (Nama_Jasa, Harga_Jasa, Stok) VALUES ('$Nama', '$Harga', '$Stok')";

  // Eksekusi query
  if (mysqli_query($conn, $query)) {
    header("Location: Admin_refill.php");
    exit();
  } else {
    echo "ERROR: Tidak dapat mengeksekusi query. " . mysqli_error($conn);
  }

  // Menutup conn database
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
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
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <!-- <div class="image_login"><img src="images/login.png"><br></div> -->
        <h1 class="text-center mb-4"><br>Tambah Data Refill</h1>
        <form method="POST" onsubmit="return alert('Data Sudah ditambahkan!! Silahkan Cek list refill')">
          <!-- <div class="mb-3">
            <label for = "id">Id_Jasa</label>
            <input type="text" class="form-control" name="id" required>
          </div> -->
          <div class="mb-3">
            <label for="Nama_Jasa">Nama Jasa</label>
            <input type="text" class="form-control" name="Nama_Jasa" required>
          </div>
          <div class="mb-3">
            <label for="Harga_Jasa">Harga Jasa</label>
            <input type="number" class="form-control" name="Harga_Jasa" required>
          </div>
          <div class="mb-3">
            <label for="Stok_Jasa">Stok</label>
            <input type="text" class="form-control" name="Stok_Jasa" required>
          </div>
          <div class="button_container">
            <a href="Admin_refill.php" class="btn btn-primary">Kembali</a>
            </a>
            <a href="#">
              <button type="submit" class="btn btn-primary">Submit</button>
            </a>
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

  <!-- <h1>Form Input Data</h1>
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="pesan">Pesan:</label>
        <textarea name="pesan" id="pesan" required></textarea>
        <br><br>
        <input type="submit" value="Simpan">
    </form> -->
</body>

</html>