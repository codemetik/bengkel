<?php 
include "../koneksi.php";
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '".$id."'");
        while($baris = mysqli_fetch_array($sql)) { ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td>ID Barang</td>
                    <td>
                        <input type="text" name="id_barang" class="form-control" readonly value="<?= $baris['id_barang']; ?>">    
                    </td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td>
                        <textarea type="text" cols="30" rows="3" name="nama_barang" readonly class="form-control"><?= $baris['nama_barang']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td>
                        <input type="text" name="stok" class="form-control" readonly value="<?= $baris['jumlah_barang']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="text" name="harga" class="form-control" readonly value="<?= $baris['harga_jual']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>
                    	<input type="text" name="jumlah_barang" class="form-control">
                    </td>
                </tr>
            </table>
        <?php
        }
    }
?>