<?php 
include "../koneksi.php";
if($_POST['rowid']) {
        $id = $_POST['rowid'];

        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover font-12">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>ID Barang</th>
                        <th>ID User</th>
                        <th>Nama barang</th>
                        <th>Jumlah barang</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                // mengambil data berdasarkan id
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_penjualan WHERE id_transaksi = '".$id."'");
                while($baris = mysqli_fetch_array($sql)) { ?>
                    <tr>
                        <td><input type="text" name="id_transaksi[]" class="form-control" value="<?= $baris['id_transaksi']; ?>"></td>
                        <td><input type="text" name="id_barang[]" class="form-control" value="<?= $baris['id_barang']; ?>"></td>
                        <td><input type="text" name="id_user[]" class="form-control" value="<?= $baris['id_user']; ?>"></td>
                        <td><input type="text" name="nama_barang[]" class="form-control" value="<?= $baris['nama_barang']; ?>"></td>
                        <td><input type="text" name="jumlah_barang[]" class="form-control" value="<?= $baris['jumlah_barang']; ?>"></td>
                    </tr>
                <?php
                }
                ?>            
                </tbody>
            </table>
        </div>
        <?php
    }
    ?>