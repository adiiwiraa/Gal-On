<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // File conn ke database
    include 'db_connection.php';

    // Mendapatkan data dari form input
// $id = $_POST['id'];
    $tipe_barang = $_POST["Tipe_Barang"];
    //$supplier = $_POST["supplier"];
    $id_supplier = $_POST["id_Supplier"];
    $price = $_POST["Harga_Barang"];
    $stok = $_POST["Stok_Barang"];

    // Query untuk memasukkan data ke dalam tabel
    $query = "INSERT INTO Barang (Tipe_Barang, ID_supplier, Harga_Barang, Stok)
VALUES ('$tipe_barang', (SELECT ID_supplier FROM Supplier WHERE ID_supplier = '$id_supplier'), '$price', '$stok')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        header("Location: Admin_Galon.php");
        exit();
    } else {
        echo "data:\ntes$tipe_barang\ntes1$id_supplier\ntes\ntes3$price\ntes4$stok \n\n\nERROR: Tidak dapat mengeksekusi query. " . mysqli_error($conn);
    }
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

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <h1 class="text-center mb-4"><br>Tambah Data Barang</h1>
                <form method="POST">

                    <div class="mb-3">
                        <label for="id_Supplier">Nama Supplier</label>
                        <select name="id_Supplier" class="form-control" onchange="updateData(this)">
                            <option value="">Pilih nama Supplier yang ingin diubah</option>
                            <?php
                            // Mengambil data ID_Supplier dari database
                            include 'db_connection.php';
                            $sql = "SELECT * FROM Supplier";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id_Supplier = $row["ID_Supplier"];
                                    $nama_Supplier = $row["Nama_Supplier"];
                                    $Alamat_Supplier = $row["Alamat_Supplier"];
                                    $Kontak_Supplier = $row["Kontak_Supplier"];
                                    echo "<option value=\"$id_Supplier\" data-nama=\"$nama_Supplier\" data-alamat=\"$Alamat_Supplier\" data-kontak=\"$Kontak_Supplier\">$id_Supplier - $nama_Supplier</option>";
                                }
                            } else {
                                echo "<option value=\"\">Tidak ada data Supplier</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="Tipe_Barang">Tipe barang</label>
                        <input type="text" class="form-control" name="Tipe_Barang" id="Tipe_Barang">

                    </div>
                    <div class="mb-3">
                        <label for="Harga_Barang">Harga_Barang</label>
                        <input type="text" class="form-control" name="Harga_Barang" id="Harga_Barang">
                    </div>

                    <div class="mb-3">
                        <label for="Stok_Barang">Stok_Barang</label>
                        <input type="text" class="form-control" name="Stok_Barang" id="Stok_Barang">
                    </div>

                    <div class="button_container">
                        <a href="Admin_Galon.php" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">Copyright 2023 All Right Reserved By Gal-On
                Company</p>
        </div>
    </div>

    <script>
        function updateData(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var Alamat = selectedOption.getAttribute("data-alamat");
            var Kontak = selectedOption.getAttribute("data-kontak");
            var nama = selectedOption.getAttribute("data-nama");

            document.getElementById("Alamat_Supplier").value = Alamat;
            document.getElementById("Kontak_Supplier").value = Kontak;
            document.getElementById("nama_Supplier").value = nama;
        }
    </script>

</body>

</html>