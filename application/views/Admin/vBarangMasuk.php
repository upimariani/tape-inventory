<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">

			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Informasi Barang Masuk</h4>
						<?php
						if ($this->session->userdata('success')) {
						?>
							<div class="alert alert-success alert-dismissible" role="alert">
								<div class="alert-message">
									<strong>Sukses!</strong> <?= $this->session->userdata('success') ?>
								</div>
							</div>
						<?php
						}
						?>
						<p class="card-description">
							<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								Tambah Data Barang Masuk
							</button> -->
							<button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">
								<i class="fas fa-plus"></i> Tambah Pengadaan
							</button>
						</p>
						<div class="table-responsive">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>Nama Supplier</th>
										<th>Tanggal Pengajuan</th>
										<th>Total Pengajuan</th>
										<th>Status</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($barang_masuk as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_user ?></td>
											<td><?= $value->tgl_pengajuan ?></td>
											<td>Rp. <?= number_format($value->total_pengajuan)  ?></td>
											<td><?php
												if ($value->status_pengajuan == '0') {
												?>
													<span class="badge bg-danger">Belum Bayar</span>
												<?php
												} else if ($value->status_pengajuan == '1') {
												?>
													<span class="badge bg-warning">Menunggu Konfirmasi</span>
												<?php
												} else if ($value->status_pengajuan == '2') {
												?>
													<span class="badge bg-info">Pesanan Dikirim</span>
												<?php
												} else if ($value->status_pengajuan == '3') {
												?>
													<span class="badge bg-success">Pesanan Selesai</span>
												<?php
												}
												?>

											</td>
											<td class="text-center">
												<a href="<?= base_url('Admin/cMasuk/detail/' . $value->id_pengajuan) ?>" class="btn btn-info btn-rounded">Detail</a>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<form action="<?= base_url('Admin/cMasuk/create') ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pilih Supplier</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Supplier</label>
								<select class="form-control" name="supplier" required>
									<option value="">---Pilih Supplier---</option>
									<?php
									foreach ($supplier as $key => $value) {
										if ($value->role == '3') {
									?>
											<option value="<?= $value->id_user ?>"><?= $value->nama_user ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<!-- Modal -->
	<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Barang Masuk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Admin/cMasuk/create') ?>" method="POST" class="forms-sample">
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputUsername1">Nama Barang</label>
							<select class="form-control" name="barang" required>
								<option value="">---Pilih Barang Masuk---</option>
								<?php
								foreach ($barang as $key => $value) {
								?>
									<option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
								<?php
								}
								?>

							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Tanggal Masuk</label>
							<input type="date" name="tgl" class="form-control" id="exampleInputEmail1" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Quantity Masuk</label>
							<input type="number" name="qty" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Quantity Masuk" required>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->

	<?php
	// foreach ($barang_masuk as $key => $value) {
	?>
	<!-- Modal -->
	<!-- <div class="modal fade" id="edit<?= $value->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Barang Masuk</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('Admin/cMasuk/update/' . $value->id_bar_masuk) ?>" method="POST" class="forms-sample">
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputUsername1">Nama Barang</label>
								<select class="form-control" name="barang" required>
									<option value="">---Pilih Barang Masuk---</option>
									<?php
									foreach ($barang as $key => $item) {
									?>
										<option value="<?= $item->id_barang ?>" <?php if ($value->id_barang == $item->id_barang) {
																					echo 'selected';
																				} ?>><?= $item->nama_barang ?></option>
									<?php
									}
									?>

								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tanggal Masuk</label>
								<input type="date" name="tgl" value="<?= $value->tgl_masuk ?>" class="form-control" id="exampleInputEmail1" required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Quantity Masuk</label>
								<input type="number" name="qty" value="<?= $value->stok_masuk ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Quantity Masuk" required>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div> -->
	<?php
	// }
	?>