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
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								Tambah Data Barang Masuk
							</button>
						</p>
						<div class="table-responsive">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>Nama Barang</th>
										<th>Tanggal Masuk</th>
										<th>Quantity Masuk</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($barang_masuk as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_barang ?></td>
											<td><?= $value->tgl_masuk ?></td>
											<td><?= $value->stok_masuk ?></td>
											<td class="text-center">
												<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_bar_masuk ?>" class="btn btn-warning btn-rounded">Update</button>
												<a href="<?= base_url('Admin/cMasuk/delete/' . $value->id_bar_masuk) ?>" class="btn btn-danger btn-rounded">Delete</a>
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
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	</div>

	<?php
	foreach ($barang_masuk as $key => $value) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="edit<?= $value->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		</div>
	<?php
	}
	?>