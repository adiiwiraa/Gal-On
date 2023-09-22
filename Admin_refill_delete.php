<?php
include 'db_connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_Jasa = $_POST['id_Jasa'];

    // $stok = $_POST['Stok'];
// $total = $quantity + $stok;
// Lakukan validasi dan pemrosesan data lain yang diperlukan sebelum menyimpan ke dalam database

    // Contoh query INSERT untuk menyimpan data ke dalam tabel yang sesuai
    $query = "DELETE FROM `jasa` WHERE ID_Jasa = $id_Jasa";
    echo "alert('Data Sudah Terhapus, Silahkan cek data yang diperbarui')";

    // Jalankan query
    if ($conn->query($query) === TRUE) {

        header("Location: Admin_refill.php");
        exit();

    } else {
        // Jika terjadi kesalahan, tangani secara sesuai
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
// Tutup koneksi database
$conn->close();
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
                <h1 class="text-center mb-4"><br>Hapus Data Jasa</h1>
                <form  method="POST">

                    <div class="mb-3">
                        <label for="id_Jasa">Nama Jasa</label>
                        <select name="id_Jasa" class="form-control" onchange="updateData(this)">
                            <option value="">Pilih nama Jasa yang ingin dihapus</option>
                            <?php
                            // Mengambil data ID_Jasa dari database
                            include 'db_connection.php';
                            $sql = "SELECT * FROM Jasa";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id_Jasa = $row["ID_Jasa"];
                                    $nama_Jasa = $row["Nama_Jasa"];
                                    $Harga_Jasa = $row["Harga_Jasa"];
                                    $Stok = $row["Stok"];
                                    echo "<option value=\"$id_Jasa\" data-nama=\"$nama_Jasa\" data-Harga=\"$Harga_Jasa\" data-Stok=\"$Stok\">$id_Jasa - $nama_Jasa</option>";
                                }
                            } else {
                                echo "<option value=\"\">Tidak ada data Jasa</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="nama_Jasa">Nama Jasa</label>
                        <input type="text" class="form-control" name="nama_Jasa" id="nama_Jasa" readonly>

                    </div>
                    <div class="mb-3">
                        <label for="Harga_Jasa">Harga Jasa</label>
                        <input type="text" class="form-control" name="Harga_Jasa" id="Harga_Jasa" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="Stok">Stok Jasa</label>
                        <input type="text" class="form-control" name="Stok" id="Stok" readonly>
                    </div>

                    <div class="button_container">
                        <a href="Admin_refill.php" class="btn btn-primary">Kembali</a>
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
            var Harga = selectedOption.getAttribute("data-Harga");
            var Stok = selectedOption.getAttribute("data-Stok");
            var nama = selectedOption.getAttribute("data-nama");

            document.getElementById("Harga_Jasa").value = Harga;
            document.getElementById("Stok").value = Stok;
            document.getElementById("nama_Jasa").value = nama;
        }
    </script>

</body>

</html>