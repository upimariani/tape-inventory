<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="row">
					<div class="col-12 col-xl-8 mb-4 mb-xl-0">
						<h3 class="font-weight-bold">Welcome Supplier!</h3>
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card tale-bg">
					<div class="card-people mt-auto">
						<img src="<?= base_url('asset/skydash/') ?>images/dashboard/people.svg" alt="people">
						<div class="weather-info">
							<div class="d-flex">
								<div>
									<h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>28<sup>C</sup></h2>
								</div>
								<div class="ml-2">
									<h4 class="location font-weight-normal">Kuningan</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 grid-margin transparent">
				<?php
				$user = $this->db->query("SELECT COUNT(id_user) as jml_user FROM `user`")->row();
				$barang = $this->db->query("SELECT COUNT(id_barang) as jml_barang FROM `barang`")->row();
				$barang_masuk = $this->db->query("SELECT COUNT(id_bar_masuk) as jml_masuk FROM `barang_masuk`")->row();
				$barang_keluar = $this->db->query("SELECT COUNT(id_bar_keluar) as jml_keluar FROM `barang_keluar`")->row();
				?>
				<div class="row">
					<div class="col-md-6 mb-4 stretch-card transparent">
						<div class="card card-tale">
							<div class="card-body">
								<p class="mb-4">User</p>
								<p class="fs-30 mb-2"><?= $user->jml_user ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-4 stretch-card transparent">
						<div class="card card-dark-blue">
							<div class="card-body">
								<p class="mb-4">Barang</p>
								<p class="fs-30 mb-2"><?= $barang->jml_barang ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
						<div class="card card-light-blue">
							<div class="card-body">
								<p class="mb-4">Barang Masuk</p>
								<p class="fs-30 mb-2"><?= $barang_masuk->jml_masuk ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-6 stretch-card transparent">
						<div class="card card-light-danger">
							<div class="card-body">
								<p class="mb-4">Barang Keluar</p>
								<p class="fs-30 mb-2"><?= $barang_keluar->jml_keluar ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$stok_barang = $this->db->query("SELECT * FROM `barang`")->result();
			?>
			<div class="col-md-7 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<p class="card-title mb-0">Stok Produk</p>
						<div class="table-responsive">
							<table class="table table-striped table-borderless">
								<thead>
									<tr>
										<th>Nama Barang</th>
										<th>Keterangan</th>
										<th>Stok Barang</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($stok_barang as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_barang ?></td>
											<td class="font-weight-bold"><?= $value->keterangan ?></td>
											<td><?= $value->stok ?></td>
											<td class="font-weight-medium">
												<?php
												if ($value->stok <= 10) {
												?>
													<div class="badge badge-danger">Segera Produksi Kembali!</div>
												<?php
												} else {
												?>
													<div class="badge badge-success">Stok Aman</div>
												<?php
												}
												?>

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