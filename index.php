<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
include "koneksi.php";
if (!isset($_SESSION['id_user'])) {
    header("location:sign_in.php");
}
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
                <a class="navbar-brand" href="index.php">E-POS Bengkel Motor</a>
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
                        <a href="index.php">
                            <i class="material-icons col-deep-orange">store</i>
                            <span id="timestamp" class="col-deep-orange"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="bg-blue">
                            <i class="material-icons"></i>
                            <span class="col-white">Transaksi</span>
                        </a>
                        <ul type="disc">
                            <li>
                                <a href="?page=home" class="col-white">Transaksi Penjualan</a>
                            </li>
                            <li>
                                <a href="?page=history_penjualan" class="col-white">History Penjualan</a>
                            </li>
                            <li>
                                <a href="?page=return_penjualan" class="col-white">Return Penjualan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="bg-blue">
                            <i class="material-icons"></i>
                            <span class="col-white">Laporan</span>
                        </a>
                        <ul type="disc">
                            <li>
                                <a href="?page=lap_penjualan" class="col-white">Lap. Penjualan</a>
                            </li>
                            <li>
                                <a href="?page=return" class="col-white">Lap. Return Barang</a>
                            </li>
                            <li>
                                <a href="?page=lap_stok_barang" class="col-white">Lap. Stok Barang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" class="btn bg-deep-orange"><span class="col-white">Logout</span></a>
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
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-blue">
                    <li><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="active">Kasir : <?= $_SESSION['nama_user']; ?></li>
                </ol>
            </div>
            
            <!-- disini -->
        <?php 
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'home':
                    include "pages_kasir/home.php";
                    break;
                case 'history_penjualan':
                    include "pages_kasir/history_penjualan.php";
                    break;
                case 'return_penjualan':
                    include "pages_kasir/return_penjualan.php";
                    break;
                case 'lap_pembelian':
                    include "pages_kasir/lap_pembelian.php";
                    break;
                case 'lap_penjualan':
                    include "pages_kasir/lap_penjualan.php";
                    break;
                case 'lap_stok_barang':
                    include "pages_kasir/lap_stok_barang.php";
                    break;
                case 'return':
                    include "laporan_return_.php";
                    break;
                
                default:
                    include "404.php";
                    break;
            }
        }else{
            include "pages_kasir/visimis.php";
        }
        ?>
        </div>
    </section>

<script type="text/javascript">
    /*Membuat fungsion onkeyup untuk total bayar*/
    // function bayar(){

    //     const subtotal = document.getElementById('subtotal').value;
    //     const bayar = document.getElementById('bayar').value;

    //     const hasil = parseInt(bayar) - parseInt(subtotal);

    //     document.getElementById('kembali').value = parseInt(hasil);
    // }

    function keyjum(){
        var subtotal = document.getElementById('subtotal').value;
        var bayar = document.getElementById('bayar').value;
        var hasl = parseInt(bayar) - parseInt(subtotal);

        document.getElementById('kembali').value = hasl;
    }
</script>

<!-- <script type="text/javascript">
    function keydown() {
        const tull = document.getElementById('bayar').value;

        document.getElementById('keydown').value = tull;

        const subtotal = document.getElementById('subtotal').value;
        const bayar = document.getElementById('bayar').value;

        const hasil = parseInt(bayar) - parseInt(subtotal);

        document.getElementById('kembali').value = parseInt(hasil);
    }
</script> -->

<script>
// Function ini dijalankan ketika Halaman ini dibuka pada browser
$(function(){
setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});
 
//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
$.ajax({
url: 'modal_ajax/ajax_timestamp.php',
success: function(data) {
$('#timestamp').html(data);
},
});
}
</script>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="proses/proses_penjualan.php" method="POST">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Barang
                        <p hidden><input type="text" name="id_user" value="<?= $_SESSION['id_user'] ?>"></p>
                    </h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn bg-blue" name="simpan" value="Ambil">
                        <button class="btn bg-red" data-dismiss="modal">Cancel</button>
                    </div>        
                </form>
            </div>
        </div>
    </div>


<!-- Large Size -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <form action="proses/proses_return.php" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Return Barang</h4>
                        </div>
                        <div class="modal-body">
                            <div class="fetch-data"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="simpan" onclick="return confirm('Apakah Anda yakin ingin mereturn barang ini?')" class="btn bg-blue">Simpan</button>
                            <button type="button" class="btn bg-red" data-dismiss="modal">Cencel</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modal_ajax/detail.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#largeModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modal_ajax/return.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetch-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
