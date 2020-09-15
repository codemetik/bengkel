<div class="card">
	<div class="header bg-blue">
		<h2>Return Penjualan</h2>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-lg-6">
				<form action="" method="POST">
                    <div class="input-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="search" placeholder="Search id transaksi">
                    </div>
                    <span class="input-group-addon">
                        <button type="submit" name="search_button" class="btn bg-blue"><i class="material-icons">search</i></button>
                        <a href="" class="btn bg-blue"><i class="material-icons">refresh</i></a>
                    </span>
                </div>        
                </form>
			</div>
			<div class="col-lg-6">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead class="bg-blue">
							<tr>
								<th>ID Transaksi</th>
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Jumlah Barang</th>
								<th>Return</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sqlretn = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
							while ($dt =  mysqli_fetch_array($sqlretn)) { ?>
								<tr>
									<td><?= $dt['id_transaksi']; ?></td>
									<td><?= $dt['id_barang']; ?></td>
									<td><?= $dt['nama_barang']; ?></td>
									<td><?= $dt['jumlah_barang']; ?></td>
									<td><a href="" class="btn bg-red">Return</a></td>
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