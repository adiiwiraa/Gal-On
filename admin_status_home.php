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

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <section id="pembelian">
                    <br><br>
                    <h2 class="services_taital"><span>Daftar </span> <img src="images/water_smol.png"> <span
                            style="color: #1f1f1f"> Pesanan</span></h2>
                    <!-- Konten Lihat Pembelian Pengguna -->
                    <a href="#galon" class="btn btn-primary" onclick="showUserList()">Galon pesanan aktif</a><br><br>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <section id="user-list" style="display: none;">
                    <h2>Daftar Pengguna yang Sudah Melakukan Pemesanan</h2>
                    <table class="table">
                        <table class="table">
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Email</th>
                            <th scope="col">Id_Transaksi</th>
                            <th scope="col"> Nama Barang</th>
                            <th scope="col"> Tipe Barang</th>
                            <th scope="col">Harga</th>
                            <?php
                            include 'db_connection.php';

                            $sql = "SELECT  transaksi_barang.Email_User, transaksi_barang.ID_Transaksi_Brg, supplier.Nama_Supplier, barang.ID_Barang, barang.Tipe_Barang, barang.Harga_Barang, barang.Stok, transaksi_barang.Jml_barang,transaksi_barang.Tgl_Pemesanan, transaksi_barang.Index_Transaksi
          FROM supplier JOIN barang ON supplier.ID_Supplier = barang.ID_Supplier
          JOIN transaksi_barang ON barang.ID_Barang = transaksi_barang.id_barang
         ;";


                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $data = array();

                                while ($row = $result->fetch_assoc()) {
                                    $email = $row["Email_User"];
                                    $Id_transaksi = $row["ID_Transaksi_Brg"];
                                    $id_barang = $row["ID_Barang"];
                                    $Nama_Supplier = $row["Nama_Supplier"];
                                    $Index_Transaksi = $row["Index_Transaksi"];
                                    $Tgl_Pemesanan = $row["Tgl_Pemesanan"];

                                    $tipe = $row["Tipe_Barang"];
                                    $price = $row["Harga_Barang"];
                                    $stok = $row["Stok"];

                                    $data[$Index_Transaksi][] = array(
                                        "email" => $email,
                                        "id_trans" => $Id_transaksi,
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
                                    echo "<td rowspan='" . count($rows) . "' id='Tgl_Pemesanan'>" . $Tgl_Pemesanan . "</td>";

                                    $jumlah = 0;
                                    foreach ($rows as $index => $row) {
                                        if ($index > 0) {
                                            echo "<tr>";
                                        }
                                        echo "<td id='tipe'>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['id_trans'] . "</td>";
                                        echo "<td id='tipe'>" . $row['Nama_Supplier'] . "</td>";

                                        echo "<td id='tipe'>" . $row['tipe'] . "</td>";
                                        echo "<td><a>Rp. " . $row['price'] . "</a></td>";

                                        //echo "<td  id='price'>" . $jumlah . "</td>";
                            

                                        echo "<td>";
                                        // echo "<input type='hidden' name='quantity[]' value='0' oninput='calculateTotal()'>";
                            


                                        echo "</tr>";

                                    }
                                    echo "<tr>";
                                    //echo "<td rowspan='" . count($rows) . "' id='Iprice'>" . $jumlah . "</td>";
                                    echo "</tr>";

                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='6'>Tidak ada data barang yang ditemukan.</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">Hubungi nomor 081234031234 jika ada kendala </td>

                                </tr>
                            </tfoot>
                            </tbody>

                        </table>
                        <div class="center">
                            <button class="btn btn-primary" onclick="hideUserList()">Kembali</button><br><br>
                        </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <section id="refill">
                    <br><br>
                    <h2 class="services_taital"><span>Daftar </span> <img src="images/water_smol.png"> <span
                            style="color: #1f1f1f"> Refill</span></h2>
                    <a href="#pembelian" class="btn btn-primary" onclick="showRefillList()"> lihat list dari refill
                        pesanan aktif</a><br><br>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <section id="refill-list" style="display: none;">
                    <h2>Daftar Pesanan Refill Aktif</h2>
                    <table class="table">
                        <thead>

                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Email </th>
                            <th scope="col">Id_Transaksi</th>
                            <th scope="col"> Nama Refill</th>
                            <th scope="col">Harga</th>
                        </thead>
                        <?php
                        include 'db_connection.php';

                        $sql = "SELECT transaksi_refill.Email_User, transaksi_refill.ID_Transaksi_Refill, jasa.Nama_Jasa, Jasa.Nama_Jasa, jasa.Harga_Jasa, jasa.Stok, transaksi_refill.Jml_Barang,transaksi_refill.Tgl_Pemesanan, transaksi_refill.Index_Transaksi
          FROM jasa JOIN transaksi_refill ON jasa.ID_Jasa = transaksi_refill.ID_Jasa";


                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $data = array();

                            while ($row = $result->fetch_assoc()) {

                                $Nama_Jasa = $row["Nama_Jasa"];
                                $email = $row["Email_User"];
                                $Index_Transaksi = $row["ID_Transaksi_Refill"];
                                $Tgl_Pemesanan = $row["Tgl_Pemesanan"];

                                $price = $row["Harga_Jasa"];
                                $Jml_Barang = $row["Jml_Barang"];

                                $data[$Index_Transaksi][] = array(
                                    "id_barang" => $id_barang,
                                    "Tgl_Pemesanan" => $Tgl_Pemesanan,
                                    "Nama_Jasa" => $Nama_Jasa,
                                    "email" => $email,
                                    "tipe" => $tipe,
                                    "price" => $price,
                                    "Jml_Barang" => $Jml_Barang
                                );
                            }
                            $jumlah = 0;
                            foreach ($data as $Index_Transaksi => $rows) {

                                echo "<tr>";
                                echo "<td rowspan='" . count($rows) . "' id='Tgl_Pemesanan'>" . $Tgl_Pemesanan . "</td>";

                                $jumlah = 0;
                                foreach ($rows as $index => $row) {
                                    if ($index > 0) {
                                        echo "<tr>";
                                    }
                                    echo "<td id='tipe'>" . $row['email'] . "</td>";
                                    echo "<td rowspan='" . count($rows) . "' id='Index_Transaksi'>" . $Index_Transaksi . "</td>";
                                    echo "<td id='tipe'>" . $row['Nama_Jasa'] . "</td>";

                                    echo "<td><a>Rp. " . $row['price'] . "</a></td>";

                                    //echo "<td  id='price'>" . $jumlah . "</td>";
                        

                                    echo "<td>";
                                    // echo "<input type='hidden' name='quantity[]' value='0' oninput='calculateTotal()'>";
                        


                                    echo "</tr>";

                                }
                                echo "<tr>";
                                //echo "<td rowspan='" . count($rows) . "' id='Iprice'>" . $jumlah . "</td>";
                                echo "</tr>";

                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan='4'>Tidak ada data barang yang ditemukan.</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">Hubungi nomor 081234031234 jika ada kendala </td>

                            </tr>
                        </tfoot>
                    </table>
                    <div class="center">
                        <button class="btn btn-primary" onclick="hideRefillList()">Kembali</button><br><br>
                    </div>
                </section>
            </div>
        </div>
    </div>

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
        function showUserList() {
            document.getElementById("user-list").style.display = "block";
        }

        function hideUserList() {
            document.getElementById("user-list").style.display = "none";
        }

        function konfirmasiPesanan(button) {
            var row = button.parentNode.parentNode;
            var keteranganCell = row.cells[3];
            var konfirmasiCell = row.cells[4];

            keteranganCell.textContent = "Sudah dikonfirmasi";
            konfirmasiCell.innerHTML = "";

            // Tambahkan kode lain yang diperlukan untuk mengkonfirmasi pesanan
        }

        function showRefillList() {
            document.getElementById("refill-list").style.display = "block";
        }

        function hideRefillList() {
            document.getElementById("refill-list").style.display = "none";
        }

        function konfirmasiRefill(button) {
            var row = button.parentNode.parentNode;
            var keteranganCell = row.cells[3];
            var konfirmasiCell = row.cells[4];

            keteranganCell.textContent = "Sudah dikonfirmasi";
            konfirmasiCell.innerHTML = "";


        }
    </script>
</body>

</html>