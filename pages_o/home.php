<?php include "query_home.php"; ?>
<div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-blue">
                    <li><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="active"><?= $_SESSION['nama_jabatan']; ?> : <?= $_SESSION['nama_user']; ?></li>
                </ol>
            </div>
<!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">add_shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Keranjang</div>
                            <div class="number count-to" data-from="0" data-to="<?= $dtrans['trx']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Transaksi</div>
                            <div class="number count-to" data-from="0" data-to="<?= $dtr['penjualan']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_return</i>
                        </div>
                        <div class="content">
                            <div class="text">Return</div>
                            <div class="number count-to" data-from="0" data-to="<?= $dreturn['retur']; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Data User</div>
                            <div class="number count-to" data-from="0" data-to="<?= $duse['us']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
<div class="card">
	<div class="header bg-deep-orange">
		<h5>Home <?= $_SESSION['nama_jabatan']; ?></h5>
	</div>
	<div class="body">
		<div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-blue">
                        <th>ID Transaksi</th>
                        <th>ID Barang</th>
                        <th>ID User</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sqltrx = mysqli_query($koneksi, "SELECT id_penjualan, id_barang, id_user, nama_barang, jumlah_barang, harga, jumlah_barang * harga AS sub FROM tb_transaksi_penjualan");
                while ($dtsql = mysqli_fetch_array($sqltrx)) { ?>
                    <tr>
                        <td><?= $dtsql['id_penjualan']; ?></td>
                        <td><?= $dtsql['id_barang']; ?></td>
                        <td><?= $dtsql['id_user']; ?></td>
                        <td><?= $dtsql['nama_barang']; ?></td>
                        <td><?= $dtsql['jumlah_barang']; ?></td>
                        <td><?= rupiah($dtsql['harga']); ?></td>
                        <td><?= rupiah($dtsql['sub']); ?></td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
	</div>
</div>