<div class="card">
	<div class="header">
		<h2>Laporan Stok Barang</h2>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-lg-6">
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
            </div>
			<div class="col-lg-6">
				<div class="alert bg-red">
					<h5>Notification : </h5>
					<small>Pada baris kolom stok barang akan muncul warna merah jika stok <= 3</small>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-12">
						<thead>
							<tr class="bg-blue">
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Stok Barang</th>
								<th>Harga</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if (isset($_POST['search_button'])) {
								$search = $_POST['search'];
								$sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '".$search."' OR nama_barang LIKE '%".$search."%'");
							}else{
								$sql = mysqli_query($koneksi, "SELECT * FROM tb_barang");
							}
							while ($dt = mysqli_fetch_array($sql)) { ?>
								<tr>
									<td><?= $dt['id_barang']; ?></td>
									<td><?= $dt['nama_barang']; ?></td>
									<?php 
									if ($dt['jumlah_barang'] <= 3) { ?>
										<td class="bg-red col-black font-14"><b><?= $dt['jumlah_barang'] ?></b></td>
									<?php }else if($dt['jumlah_barang'] >= 3){ ?>
										<td class="bg-green col-black font-14"><b><?= $dt['jumlah_barang'] ?></b></td>
									<?php }
									?>
									<td><?= $dt['harga_jual']; ?></td>
									<td><?= $dt['keterangan']; ?></td>
								</tr>
							<?php }
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>