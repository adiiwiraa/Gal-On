<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include 'db_connection.php';
    $id_Barang = $_POST["id_Barang"];
    $nama_Supplier = $_POST["nama_Supplier"];
    $tipe_barang = $_POST["tipe_barang"];
    $Harga_Barang = $_POST["harga_barang"];
    $Stok = $_POST["stok"];
    // Contoh query INSERT untuk menyimpan data ke dalam tabel yang sesuai
    $query = "DELETE FROM `Barang` WHERE ID_Barang = $id_Barang";

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
                <h1 class="text-center mb-4"><br>Hapus Data Barang</h1>
                <form method="POST">

                    <div class="mb-3">
                        <label for="id_Barang">Nama Barang</label>
                        <select name="id_Barang" class="form-control" onchange="updateData(this)">
                            <option value="">Pilih nama Supplier yang ingin dihapus</option>
                            <?php
                            // Mengambil data ID_Barang dari database
                            include 'db_connection.php';
                            $sql = "SELECT supplier.ID_Supplier ,supplier.Nama_Supplier,barang.ID_Barang, barang.Tipe_Barang, barang.Harga_Barang , barang.Stok FROM supplier JOIN barang ON supplier.ID_Supplier = barang.ID_Supplier";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id_Barang = $row["ID_Barang"];
                                    $nama_Supplier = $row["Nama_Supplier"];
                                    $tipe_barang = $row["Tipe_Barang"];
                                    $Harga_Barang = $row["Harga_Barang"];
                                    $Stok = $row["Stok"];
                                    echo "<option value=\"$id_Barang\" data-nama=\"$nama_Supplier\" data-tipe=\"$tipe_barang\" data-alamat=\"$Harga_Barang\" data-kontak=\"$Stok\">$id_Barang - $nama_Supplier - $tipe_barang</option>";
                                }
                            } else {
                                echo "<option value=\"\">Tidak ada data Supplier</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="nama_Supplier">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama_Supplier" id="nama_Supplier" readonly>

                    </div>
                    <div class="mb-3">
                        <label for="tipe_barang">Tipe Barang</label>
                        <input type="text" class="form-control" name="tipe_barang" id="tipe_barang" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Harga_Barang">Harga Barang</label>
                        <input type="text" class="form-control" name="harga_barang" id="Harga_Barang" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Stok">Stok</label>
                        <input type="text" class="form-control" name="stok" id="Stok" readonly>
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
            var tipe = selectedOption.getAttribute("data-tipe");

            document.getElementById("Harga_Barang").value = Alamat;
            document.getElementById("Stok").value = Kontak;
            document.getElementById("nama_Supplier").value = nama;
            document.getElementById("tipe_barang").value = tipe;
        }
    </script>

</body>

</html>