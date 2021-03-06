<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>E-POS Bengkel Motor</title>
    <!-- Favicon-->
    <link rel="icon" href="images/logo_em.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <script
src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>
</head>

<body class="theme-black">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="?page=home">E-POS Bengkel Motor</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar bg-blue-grey">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="?page=home">
                            <i class="material-icons col-deep-orange">store</i>
                            <span id="timestamp" class="col-deep-orange"><?= $_SESSION['nama_jabatan']; ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle col-white">
                            <i class="material-icons"></i>
                            <span class="col-white">Data Barang</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?page=detail_barang" class="col-white">Detail barang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle col-white">
                            <i class="material-icons"></i>
                            <span class="col-white">Data Terkait</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?page=supplier_kategori" class="col-white">Supplier & kategori</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle col-white">
                            <i class="material-icons"></i>
                            <span class="col-white">Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?page=stok_barang" class="col-white">Stok Barang</a>
                            </li>
                            <li>
                                <a href="?page=penjualan" class="col-white">Penjualan</a>
                            </li>
                            <li>
                                <a href="?page=return" class="col-white">Return Barang</a>
                            </li>
                            <li>
                                <a href="?page=penjualan_harian" class="col-white">Penjualan Hariah</a>
                            </li>
                            <li>
                                <a href="?page=penjualan_bulanan" class="col-white">Penjualan Bulanan</a>
                            </li>
                            <li>
                                <a href="?page=penjualan_tahunan" class="col-white">Penjualan Tahunan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle col-white">
                            <i class="material-icons"></i>
                            <span class="col-white">Menu User</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?page=data_user" class="col-white">Data User</a>
                            </li>
                            <!-- <li>
                                <a href="?page=detail_data_user" class="col-white">Detail Data User</a>
                            </li> -->
                            <li>
                                <a href="?page=tambah_user" class="col-white">Tambah User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php"><span class="col-white">Logout</span></a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <a href="javascript:void(0);"></a>.
                </div>
                <div class="version">
                    <b></b>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">Lap. Keranjang</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <?php 
                        $sqlb = mysqli_query($koneksi, "SELECT * FROM tb_transaksi_penjualan GROUP BY id_penjualan DESC");
                        while ($dbr = mysqli_fetch_array($sqlb)) { ?>
                            <li data-theme="red" class="">
                                <div class="red"></div>
                                <a href=""><span><?= $dbr['id_barang'].", ".$dbr['nama_barang'].", ".$dbr['jumlah_barang']; ?></span></a>
                            </li>
                        <?php }
                        ?>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>PROFILE</p>
                        <ul class="setting-list">
                        <?php 
                        $sqluser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '".$_SESSION['id_user']."'");
                        $user = mysqli_fetch_array($sqluser); ?>
                    <form action="proses_update_user.php" method="POST">
                        <li hidden>
                            <span>ID User</span>
                            <input type="text" name="id_user" class="form-control" value="<?= $user['id_user']; ?>" readonly>
                        </li>
                        <li>
                            <span>Username</span>
                            <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" readonly>
                        </li>
                        <li>
                            <span>Password</span>
                            <input type="text" name="password" class="form-control" value="<?= $user['password']; ?>" readonly>
                        </li>
                        <li>
                            <span>Confirm Password</span>
                            <input type="text" name="confirm_password" class="form-control" value="<?= $user['confirm_password']; ?>" readonly>
                        </li>
                        <li><span>Nama User</span>
                            <input type="text" name="nama_user" class="form-control" value="<?= $user['nama_user']; ?>">
                        </li>
                        <li><span>Tempat Lahir</span>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $user['tempat_lahir']; ?>">
                        </li>
                        <li><span>Tanggal Lahir</span>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $user['tanggal_lahir']; ?>">
                        </li>
                        <li>
                            <button type="submit" name="simpan" class="btn bg-blue"><i class="material-icons">save</i> Simpan Perubahan</button>
                        </li>
                    </form>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Disini -->
        <?php 
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'home':
                    include "pages_o/home.php";
                    break;
                case 'detail_barang':
                    include "pages_o/owner/data_barang/detail_barang.php";
                    break;
                case 'supplier_kategori':
                    include "pages_o/owner/data_terkait/supplier_kategori.php";
                    break;
                case 'laporan':
                    include "pages_o/owner/laporan/laporan.php";
                    break;
                case 'penjualan':
                    include "pages_o/owner/laporan/penjualan.php";
                    break;
                case 'penjualan_harian':
                    include "pages_o/owner/laporan/penjualan_harian.php";
                    break;
                case 'penjualan_bulanan':
                    include "pages_o/owner/laporan/penjualan_bulanan.php";
                    break;
                case 'penjualan_tahunan':
                    include "pages_o/owner/laporan/penjualan_tahunan.php";
                    break;
                case 'stok_barang':
                    include "pages_o/owner/laporan/stok_barang.php";
                    break;
                case 'data_user':
                    include "pages_o/owner/menu_user/data_user.php";
                    break;
                case 'detail_data_user':
                    include "pages_o/owner/menu_user/detail_data_user.php";
                    break;
                case 'tambah_user':
                    include "pages_o/owner/menu_user/tambah_user.php";
                    break;
                case 'return':
                    include "laporan_return_.php";
                    break;
                
                default:
                    include "404.php";
                    break;
            }
        }else{
            include "pages_o/home.php";
        }
        ?>

        </div>
    </section>

<script>
// Function ini dijalankan ketika Halaman ini dibuka pada browser
$(function(){
setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});
 
//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
$.ajax({
url: 'ajax_timestamp.php',
success: function(data) {
$('#timestamp').html(data);
},
});
}
</script>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
