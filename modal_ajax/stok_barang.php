<?php 
include "../koneksi.php";
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '".$id."'");
        $baris = mysqli_fetch_array($sql);
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover font-12">
                <tr>
                    <th>ID Barang</th>
                    <td><input type="text" name="id_barang" class="form-control" value="<?= $baris['id_barang']; ?>" readonly></td>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <td><?= $baris['nama_barang']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Stok</th>
                    <td><?= $baris['jumlah_barang']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Tambah Stok</th>
                    <td><input type="text" name="jml_tambah_stok" class="form-control"></td>
                </tr>
            </table>
        </div>
        <?php
    }
    ?>