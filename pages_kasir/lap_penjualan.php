<div class="card">
	<div class="header bg-blue">
		<h2>Laporan Penjualan</h2>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-lg-4">
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
			<div class="col-lg-8">
                	<div class="alert bg-red">
                		<h5>Notification : <small>Pilih berdasarkan id transaksi / id user lalu print</small></h5>
                	</div>
                </div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID TRANSAKSI</th>
								<th>ID USER</th>
								<th>PRINT</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_POST['search_button'])) {
								$search = $_POST['search'];

								$sqllap = mysqli_query($koneksi,"SELECT * FROM tb_penjualan WHERE id_transaksi = '".$search."' OR id_user LIKE '%".$search."%' GROUP BY id_transaksi DESC");
							}else{
								$sqllap = mysqli_query($koneksi,"SELECT * FROM tb_penjualan GROUP BY id_transaksi DESC");
							}
							while ($dt = mysqli_fetch_array($sqllap)) { ?>
								<tr>
									<td><?= $dt['id_transaksi']; ?></td>
									<td><?= $dt['id_user']; ?></td>
									<td><a href="pages_kasir/print/lap.php?idtrx=<?= $dt['id_transaksi']; ?>" class="btn bg-red" target="_blank"><i class="material-icons">print</i></a></td>
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