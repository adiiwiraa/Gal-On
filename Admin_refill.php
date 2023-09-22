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
            <h1 class="services_taital"><span>Our</span> <img src="images/icon-1.png"> <span
                    style="color: #1f1f1f">Services</span></h1>
            <p class="services_text">Jasa Galon yang tersedia</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stok</th>

                    </tr>
                    </tr>
                </thead>
                <tbody id="barang-table">
                    <?php
                    include 'db_connection.php';

                    $sql = "SELECT * FROM jasa";


                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $data = array();

                        while ($row = $result->fetch_assoc()) {
                            $id_jasa = $row["ID_Jasa"];
                            $Nama = $row["Nama_Jasa"];
                            $price = $row["Harga_Jasa"];
                            $stok = $row["Stok"];

                            $data[$id_jasa][] = array(
                                "Nama" => $Nama,
                                "price" => $price,
                                "stok" => $stok
                            );
                        }
                        foreach ($data as $id_Jasa => $rows) {
                            echo "<tr>";
                            echo "<td rowspan='" . count($rows) . "'>" . $id_Jasa . "</td>";

                            foreach ($rows as $index => $row) {
                                if ($index > 0) {
                                    echo "<tr>";
                                }
                                echo "<td>" . $row['Nama'] . "</td>";
                                echo "<td><a>Rp. " . $row['price'] . "</a></td>";
                                echo "<td><p id='stock'>" . $row['stok'] . "</p></td>";

                                echo "</tr>";
                            }
                        }
                        // echo "<td id='barang-table'></td>";
                    
                    } else {
                        echo "<tr>";
                        echo "<td colspan='5'>Tidak ada data barang yang ditemukan.</td>";
                        echo "</tr>";
                    }
                    ?>

                    <!-- <tr>
            <td><input id="Input_id"></input></td>
            <td><input id="Input_Product"></input></td>
            <td><input id="Input_Price"></input></td>
            <td><input id="Input_Stok"></input></td>
            <td><button class="btn btn-primary">Submit </button></td>
            </tr> -->
                <tfoot>
                    <!-- <tr id='barang-table'></tr> -->
                    <tr>
                        <td>
                            <a href="Admin_refill_delete.php">
                                <button class="btn btn-primary" type="submit">Hapus Data</button>
                            </a>
                        </td>
                        <td colspan="2">
                            <a href=" Admin_Refill_Tambah.php">
                                <button class="btn btn-primary">Tambah Data</button>
                            </a>
                        </td>
                        <!-- <td id="total_harga"> -->
                        <td>
                            <a href="Admin_Refill_Edit.php">
                                <button class="btn btn-primary" type="submit">Edit Data</button>
                            </a>
                        </td>
                    </tr>
                </tfoot>

                </tbody>
            </table>
            <div class="button_container">
                <a href="Admin_Stok.php">
                    <button class="btn btn-primary">Kembali</button>
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
                var tipe = $(this).closest("tr").find("td#tipe").text();
                var supplier = $(this).closest("tr").find("td#supplier").text();

                // $id = "SELECT id_barang FROM barang where Nama_Barang = $tipe"
                // alert(tipe);
                // alert(supplier);

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

                    $("#id_Jasa").val(idJasa);
                    $("#quantity").val(quantity);
                }
            });

            $("#total_harga").text("Rp. " + total.toLocaleString());


        }

        // Memanggil fungsi calculateTotal saat halaman dimuat
        $(document).ready(function () {
            calculateTotal();
        });

        //dibawah ini semua fungsi buat tambah barang




    </script>
</body>

</html>