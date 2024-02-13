<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">

			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Informasi Barang</h4>
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
								Tambah Data Barang
							</button>
						</p>
						<div class="table-responsive">
							<table id="myTable" class="table table-striped col-12">
								<thead>
									<tr>
										<th>Gambar</th>
										<th>Nama Barang</th>
										<th>Keterangan</th>
										<th>Deskripsi</th>
										<th>Harga</th>
										<th>Stok</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($barang as $key => $value) {
									?>
										<tr>
											<td class="py-1"><img style="width: 50px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"></td>
											<td><?= $value->nama_barang ?></td>
											<td><?= $value->keterangan ?></td>
											<td><?= $value->deskripsi ?></td>
											<td>Rp. <?= number_format($value->harga)  ?></td>
											<td><?= $value->stok ?></td>
											<td class="text-center">
												<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_barang ?>" class="btn btn-warning btn-rounded">Update</button>
												<a href="<?= base_url('Admin/cBarang/delete/' . $value->id_barang) ?>" class="btn btn-danger btn-rounded">Delete</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php echo form_open_multipart('admin/cBarang/create'); ?>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputUsername1">Supplier</label>
						<select class="form-control" name="supplier" required>
							<option value="">---Pilih Supplier---</option>
							<?php
							foreach ($supplier as $key => $a) {
								if ($a->role == '3') {
							?>
									<option value="<?= $a->id_user ?>"><?= $a->nama_user ?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Kategori</label>
						<select class="form-control" name="kategori" required>
							<option value="">---Pilih Kategori---</option>
							<?php
							foreach ($kategori as $key => $value) {
							?>
								<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
							<?php
							}
							?>

						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Nama Barang</label>
						<input type="text" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama Barang" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Deskripsi</label>
						<input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Deskripsi" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Keterangan</label>
						<input type="text" name="keterangan" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Keterangan" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Harga</label>
						<input type="text" name="harga" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Stok</label>
						<input type="text" name="stok" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Stok" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Gambar</label>
						<input type="file" name="gambar" class="form-control" id="exampleInputPassword1" required>
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
	foreach ($barang as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Data Barang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php echo form_open_multipart('admin/cBarang/update/' . $value->id_barang); ?>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputUsername1">Supplier</label>
							<select class="form-control" name="supplier" required>
								<option value="">---Pilih Supplier---</option>
								<?php
								foreach ($supplier as $key => $a) {
								?>
									<option value="<?= $a->id_user ?>" <?php if ($value->id_user == $a->id_user) {
																			echo 'selected';
																		} ?>><?= $a->nama_user ?></option>
								<?php
								}
								?>

							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputUsername1">Kategori</label>
							<select class="form-control" name="kategori" required>
								<option value="">---Pilih Kategori---</option>
								<?php
								foreach ($kategori as $key => $item) {
								?>
									<option value="<?= $item->id_kategori ?>" <?php if ($value->id_kategori == $item->id_kategori) {
																					echo 'selected';
																				} ?>><?= $item->nama_kategori ?></option>
								<?php
								}
								?>

							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputUsername1">Nama Barang</label>
							<input type="text" name="nama" value="<?= $value->nama_barang ?>" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama Barang" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Deskripsi</label>
							<input type="text" name="deskripsi" value="<?= $value->deskripsi ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Deskripsi" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Keterangan</label>
							<input type="text" name="keterangan" value="<?= $value->keterangan ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Keterangan" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Harga</label>
							<input type="text" name="harga" value="<?= $value->harga ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Stok</label>
							<input type="text" name="stok" value="<?= $value->stok ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Stok" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Gambar</label><br>
							<img style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>">
							<input type="file" name="gambar" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Stok">
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
