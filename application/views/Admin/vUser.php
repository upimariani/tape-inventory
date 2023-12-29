<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">

			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Informasi User</h4>
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
								Tambah Data User
							</button>
						</p>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>
											Nama User
										</th>
										<th>
											Username
										</th>
										<th>
											Password
										</th>
										<th>
											Role
										</th>
										<th class="text-center">
											Action
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($user as $key => $value) {
									?>
										<tr>
											<td class="py-1">
												<?= $value->nama_user ?>
											</td>

											<td>
												<?= $value->username ?>
											</td>
											<td>
												<?= $value->password ?>
											</td>
											<td>
												<?php
												if ($value->role == '1') {
												?>
													<span class="badge badge-success">Admin</span>
												<?php
												} else if ($value->role == '2') {
												?>
													<span class="badge badge-danger">Pemilik</span>
												<?php
												} else {
												?>
													<span class="badge badge-warning">Supplier</span>
												<?php
												}
												?>
											</td>
											<td class="text-center">
												<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_user ?>" class="btn btn-warning btn-rounded">Update</button>
												<a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>" class="btn btn-danger btn-rounded">Delete</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Masukkan Data User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Admin/cUser/create') ?>" method="POST" class="forms-sample">
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputUsername1">Nama User</label>
							<input type="text" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama User" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Role</label>
							<select class="form-control" name="level" required>
								<option value="">---Pilih Role User---</option>
								<option value="1">Admin</option>
								<option value="2">Pemilik</option>
								<option value="3">Supplier</option>
							</select>
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
	foreach ($user as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Data User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>" method="POST" class="forms-sample">
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputUsername1">Nama User</label>
								<input type="text" name="nama" value="<?= $value->nama_user ?>" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Nama User" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label>
								<input type="text" name="username" class="form-control" value="<?= $value->username ?>" id="exampleInputEmail1" placeholder="Masukkan Username" required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="text" name="password" class="form-control" value="<?= $value->password ?>" id="exampleInputPassword1" placeholder="Masukkan Password" required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Role</label>
								<select class="form-control" name="level" required>
									<option value="">---Pilih Role User---</option>
									<option value="1" <?php if ($value->role == '1') {
															echo 'selected';
														} ?>>Admin</option>
									<option value="2" <?php if ($value->role == '2') {
															echo 'selected';
														} ?>>Pemilik</option>
									<option value="3" <?php if ($value->role == '3') {
															echo 'selected';
														} ?>>Supplier</option>
								</select>
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