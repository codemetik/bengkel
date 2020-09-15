<div class="card">
	<div class="header bg-blue">
		<h2>History Penjualan</h2>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-lg-12">
				<form action="" method="POST">
                    <div class="input-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="search" placeholder="Search product berdasarkan id-penjualan / id-barang / id-user / nama-barang / tgl-bulan-tahun / waktu-penjualan ">
                    </div>
                    <span class="input-group-addon">
                        <button type="submit" name="search_button" class="btn bg-blue"><i class="material-icons">search</i></button>
                        <a href="" class="btn bg-blue"><i class="material-icons">refresh</i></a>
                    </span>
                </div>        
                </form>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-hover font-11">
						<thead class="bg-green">
							<tr>
								<th>ID TRANSAKSI</th>
								<th>ID BARANG</th>
								<th>ID USER</th>
								<th>NAMA BARANG</th>
								<th>JUMLAH</th>
								<th>HARGA</th>
								<th>SUBHARGA</th>
								<th>SUBTOTAL</th>
								<th>BAYAR</th>
								<th>KEMBALI</th>
								<th>TANGGAL PENJUALAN</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
						$tgl_saat_ini = date('d-F-Y');//Menampilkan Jam Sekarang
						if (isset($_POST['search_button'])) {
							$search = $_POST['search'];
							$sqltrx = mysqli_query($koneksi, "SELECT id_penjualan, id_transaksi, id_barang, id_user, nama_barang, jumlah_barang, CONCAT('Rp. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(subharga,0)) AS subharga, CONCAT('Rp. ',FORMAT(subtotal,0)) AS subtotal, CONCAT('Rp. ',FORMAT(bayar,0)) AS bayar, CONCAT('Rp. ',FORMAT(kembali,0)) AS kembali, tgl_penjualan FROM tb_penjualan WHERE id_penjualan = '".$search."' OR id_transaksi LIKE '%".$search."%' OR id_barang LIKE '%".$search."%' OR id_user LIKE '%".$search."%' OR nama_barang LIKE '%".$search."%' OR tgl_penjualan LIKE '%".$search."%' ORDER BY id_penjualan DESC");
						}else{
							$sqltrx = mysqli_query($koneksi, "SELECT id_penjualan, id_transaksi, id_barang, id_user, nama_barang, jumlah_barang, CONCAT('Rp. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(subharga,0)) AS subharga, CONCAT('Rp. ',FORMAT(subtotal,0)) AS subtotal, CONCAT('Rp. ',FORMAT(bayar,0)) AS bayar, CONCAT('Rp. ',FORMAT(kembali,0)) AS kembali, tgl_penjualan FROM tb_penjualan ORDER BY id_penjualan DESC");
						}
						while ($trx = mysqli_fetch_array($sqltrx)) { 
							$tgl = date("d-F-Y", strtotime($trx['tgl_penjualan']));
							if ($tgl_saat_ini == $tgl) { ?>
								<tr class="bg-light-blue">
									<td class="col-black"><?= $trx['id_transaksi']; ?></td>
									<td class="col-black"><?= $trx['id_barang']; ?></td>
									<td class="col-black"><?= $trx['id_user']; ?></td>
									<td class="col-black"><?= $trx['nama_barang']; ?></td>
									<td class="col-black"><?= $trx['jumlah_barang']; ?></td>
									<td class="col-black"><?= $trx['harga']; ?></td>
									<td class="col-black"><?= $trx['subharga']; ?></td>
									<td class="col-black"><?= $trx['subtotal']; ?></td>
									<td class="col-black"><?= $trx['bayar']; ?></td>
									<td class="col-black"><?= $trx['kembali']; ?></td>
									<td class="col-black"><?= $trx['tgl_penjualan']; ?></td>
								</tr>
							<?php }else if($tgl_saat_ini != $tgl){ ?>
								<tr class="bg-red">
									<td><?= $trx['id_transaksi']; ?></td>
									<td><?= $trx['id_barang']; ?></td>
									<td><?= $trx['id_user']; ?></td>
									<td><?= $trx['nama_barang']; ?></td>
									<td><?= $trx['jumlah_barang']; ?></td>
									<td><?= $trx['harga']; ?></td>
									<td><?= $trx['subharga']; ?></td>
									<td><?= $trx['subtotal']; ?></td>
									<td><?= $trx['bayar']; ?></td>
									<td><?= $trx['kembali']; ?></td>
									<td><?= $trx['tgl_penjualan']; ?></td>
								</tr>
							<?php }
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>