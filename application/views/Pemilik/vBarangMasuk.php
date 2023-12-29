<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card mb-5">
			<div class="card-body">
				<h3 class="mb-3">Laporan Barang Masuk</h3>
				<form action="<?= base_url('Pemilik/cLBMasuk/cetak') ?>" method="POST">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<select class="form-control" name="bulan">
									<option>---Pilih Bulan Ke- ---</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<select class="form-control" name="tahun">
									<option>---Pilih Tahun Ke- ---</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<button type="submit" class="btn btn-primary">Cetak Laporan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
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

						<div class="table-responsive">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>Nama Barang</th>
										<th>Tanggal Masuk</th>
										<th>Quantity Masuk</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($barang_masuk as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_barang ?></td>
											<td><?= $value->tgl_pengajuan ?></td>
											<td><?= $value->stok_masuk ?></td>

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