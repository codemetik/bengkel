<div class="card">
    <div class="header bg-blue">
        <h2>Transaksi Penjualan</h2>
    </div>
    <div class="body">
        <div class="row">
            <div class="col-lg-6">
                <ol class="breadcrumb breadcrumb-bg-yellow">
                    <li class="active"><b class="col-black">Data Barang</b></li>
                </ol>
                <form action="" method="POST">
                    <div class="input-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="search" placeholder="Search ...">
                    </div>
                    <span class="input-group-addon">
                        <button type="submit" name="search_button" class="btn bg-blue"><i class="material-icons">search</i></button>
                        <a href="" class="btn bg-blue"><i class="material-icons">refresh</i></a>
                    </span>
                </div>        
                </form>
                <div class="table-responsive">
                    <table class="table table-hove table-sm table-bordered">
                        <thead class="bg-yellow">
                            <tr class="col-black">
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>ADD</th>
                            </tr>
                        </thead>
                        <tbody class="font-11">
                            <?php 
                            if (isset($_POST['search_button'])) {
                                $search = $_POST['search'];
                                $sqlsearch = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '".$search."' OR nama_barang LIKE '%".$search."%'");
                            
                            while ($brg = mysqli_fetch_array($sqlsearch)) { ?>
                                <tr>
                                    <td><?= $brg['id_barang']; ?></td>
                                    <td><?= $brg['nama_barang']; ?></td>
                                    <td><?= $brg['harga_jual']; ?></td>
                                    <td><a href='#myModal' class='btn bg-red btn-small' id='custId' data-toggle='modal' data-id="<?= $brg['id_barang'] ?>"><i class="material-icons">add_shopping_cart</i> ADD</a>
                                    </td>
                                </tr>
                            <?php }
                            }else{
                                    
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb breadcrumb-bg-blue">
                    <li class="active"><i class="material-icons">shopping_cart</i> <b class="col-black">Keranjang Belanja</b></li>
                </ol>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-blue">
                            <tr class="col-black">
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>jumlah</th>
                                <th>harga/Pcs</th>
                                <th>Subharga</th>
                                <th>Cencel</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form action="proses/proses_simpan_penjualan.php" method="POST">
                            <?php 
                            date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
                            $timestamp = date('H:i:s');//Menampilkan Jam Sekarang

                            $tot = mysqli_query($koneksi, "SELECT SUM(jumlah_barang) AS jml,SUM(jumlah_barang * harga) AS subtotal FROM tb_transaksi_penjualan WHERE id_user = '".$_SESSION['id_user']."'");
                            $t = mysqli_fetch_array($tot);

                            $no=1;
                            $sql_trx = mysqli_query($koneksi, "SELECT id_penjualan,id_barang,id_user,nama_barang, jumlah_barang, harga, SUM(jumlah_barang) * SUM(harga) AS subharga FROM tb_transaksi_penjualan WHERE id_user = '".$_SESSION['id_user']."' GROUP BY id_penjualan ASC");

                            /*mencari id transaksi*/
                            $trxpsql = mysqli_query($koneksi, "SELECT max(id_transaksi) AS maxCode FROM tb_penjualan");
                            $idtrxp = mysqli_fetch_array($trxpsql);
                            $idp = $idtrxp['maxCode'];
                            $nO = (int) substr($idp, 3, 7);
                            $nO++; 
                            $idtrx = "TRX";
                            $id_trxp = $idtrx . sprintf("%07s", $nO);

                            $idpen = mysqli_query($koneksi, "SELECT max(id_penjualan) AS maxCode FROM tb_penjualan");
                            $sqlpen = mysqli_fetch_array($idpen);
                            $pen = $sqlpen['maxCode'];
                            $nopen = (int) substr($pen, 3, 7);
                            $nopen++; 
                            $id_pen = "PNJ";

                            while ($dt = mysqli_fetch_array($sql_trx)) { 
                                $id_penjualan = $id_pen . sprintf("%07s", $nopen++);
                                ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td hidden>
                                    <input type="text" name="id_penjualan[]" value="<?= $id_penjualan; ?>">
                                    <input type="text" name="id_transaksi[]" value="<?= $id_trxp; ?>">
                                    <input type="text" name="id_barang[]" value="<?= $dt['id_barang']; ?>">
                                    <input type="text" name="id_user[]" value="<?= $_SESSION['id_user']; ?>">
                                </td>
                                <td><input type="text" name="nama_barang[]" class="form-control font-11" value="<?= $dt['nama_barang']; ?>" readonly></td>
                                <td><input type="text" name="jumlah_barang[]" class="form-control font-11" value="<?= $dt['jumlah_barang']; ?>" readonly></td>
                                <td><input type="text" name="harga[]" class="form-control font-11" value="<?= $dt['harga']; ?>" readonly></td>
                                <td><input type="text" name="subharga[]" class="form-control font-11" value="<?= $dt['subharga']; ?>" readonly></td>
                                <td><a href="proses/proses_delete_trx.php?id=<?= $dt['id_penjualan']; ?>&idus=<?= $_SESSION['id_user']; ?>" class="btn bg-red"><i class="material-icons">delete_forever</i></a></td>
                            </tr>
                        <?php }
                            ?>
                            <tr>
                                <td colspan="6"><a class="btn btn-default"data-toggle="modal" data-target="#largeModal">SHOW DETAIL</a></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right bg-blue"><b class="col-black">Total : </b></td>
                                <td class="bg-blue">
                                    <input type="text" name="total" id="total" class="form-control col-black bg-white" value="<?= $t['jml']; ?>" readonly>
                                </td>
                                <td colspan="3" class="bg-blue">
                                    <input type="text" name="subtotal" id="subtotal" class="form-control col-black bg-white" readonly value="<?= $t['subtotal']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right bg-blue"><b class="col-black">Bayar : </b></td>
                                <td colspan="4" class="bg-blue"><input type="text" onkeyup="keyjum();" name="bayar" id="bayar" class="form-control col-black" placeholder="Rp."></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right bg-blue"><b class="col-black">Kembali : </b></td>
                                <td colspan="4" class="bg-blue"><input type="text" name="kembali" id="kembali" class="form-control bg-white col-black" readonly placeholder="Rp. ... ... ..."></td>
                            </tr>
                        <!-- </form> -->
                            <tr>
                                <td colspan="6" class="bg-blue"><button type="submit" class="form-control btn bg-green" name="simpan_trx" onclick="return confirm('Apakah item barang sudah sesuai?')"><i class="material-icons">save</i> Simpan</button></td>
                                </form>
                                <!-- <td><button type="submit" name="hasil" id="hasil" class="btn bg-blue"><i class="material-icons" onclick="bayar();">drag_handle</i></button></td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">DETAIL BARANG</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-blue">
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga</th>
                                <th>Sub Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sqlshow = mysqli_query($koneksi, "SELECT id_penjualan,id_barang,id_user,nama_barang, jumlah_barang, CONCAT('Rp. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(SUM(jumlah_barang) * SUM(harga),0)) AS subharga FROM tb_transaksi_penjualan WHERE id_user = '".$_SESSION['id_user']."' GROUP BY id_penjualan ASC");
                            $nos=1;
                            while ($show = mysqli_fetch_array($sqlshow)) { ?>
                                <tr>
                                    <td><?= $nos++; ?></td>
                                    <td><?= $show['nama_barang']; ?></td>
                                    <td><?= $show['jumlah_barang']; ?></td>
                                    <td><?= $show['harga']; ?></td>
                                    <td><?= $show['subharga']; ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>