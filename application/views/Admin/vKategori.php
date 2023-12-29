<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">

			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Informasi Kategori</h4>
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
								Tambah Data Kategori
							</button>
						</p>
						<div class="table-responsive">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>
											Nama Kategori
										</th>
										<th class="text-center">
											Action
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($kategori as $key => $value) {
									?>
										<tr>
											<td class="py-1">
												<?= $value->nama_kategori ?>
											</td>
											<td class="text-center">
												<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>" class="btn btn-warning btn-rounded">Update</button>
												<a href="<?= base_url('Admin/cKategori/delete/' . $value->id_kategori) ?>" class="btn btn-danger btn-rounded">Delete</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Admin/cKategori/create') ?>" method="POST" class="forms-sample">
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputUsername1">Nama Kategori</label>
							<input type="text" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama Kategori" required>
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
	foreach ($kategori as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Data Kategori</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('Admin/cKategori/update/' . $value->id_kategori) ?>" method="POST" class="forms-sample">
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputUsername1">Nama Kategori</label>
								<input type="text" name="nama" value="<?= $value->nama_kategori ?>" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama Kategori" required>
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