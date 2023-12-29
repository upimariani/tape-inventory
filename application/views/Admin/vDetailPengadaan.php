<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-8 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Detail Pengajuan Bahan Baku Supplier</h4>
						<p class="card-description">
							Informasi Invoice
						</p>
						<div class="row">
							<div class="col-md-6">
								<address>
									<p class="font-weight-bold"><?= $pengajuan['pengajuan']->nama_user ?></p>
									<p>
										<?= $pengajuan['pengajuan']->tgl_pengajuan ?>
									</p>
									<strong>
										Rp. <?= number_format($pengajuan['pengajuan']->total_pengajuan)  ?>
									</strong>
								</address>
							</div>

						</div>
					</div>
					<div class="card-body">
						<h4 class="card-title">Informasi Detail Bahan Baku</h4>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										Quantity
									</th>
									<th>
										Nama Barang
									</th>
									<th>
										Harga
									</th>
									<th>
										Subtotal
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($pengajuan['barang'] as $key => $value) {
								?>
									<tr>
										<td><?= $value->stok_masuk ?></td>
										<td><?= $value->nama_barang ?></td>
										<td>Rp. <?= number_format($value->harga) ?></td>
										<td>Rp. <?= number_format($value->harga * $value->stok_masuk)  ?></td>
									</tr>
								<?php
								}
								?>


							</tbody>
						</table>
						<hr>
						<div class="row">
							<div class="col-6">
								<?php
								if ($pengajuan['pengajuan']->status_pengajuan == '0') {
								?>
									<?php echo form_open_multipart('Admin/cMasuk/bayar/' . $pengajuan['pengajuan']->id_pengajuan); ?>
									<label>Pembayaran</label>
									<input type="file" name="bayar" class="form-control">
									<button type="submit" class="btn btn-success mt-3"><i class="far fa-credit-card"></i> Submit
										Payment
									</button>
									</form>
								<?php
								} else {
								?>
									<img class="mb-5" style="width: 150px;" src="<?= base_url('asset/pembayaran/' . $pengajuan['pengajuan']->bukti_pembayaran)  ?>">
								<?php
								}
								?>

							</div>
							<div class="col-lg-6">
								<?php
								if ($pengajuan['pengajuan']->status_pengajuan == '2') {
								?>
									<a class="btn btn-info" href="<?= base_url('Admin/cMasuk/diterima/' . $pengajuan['pengajuan']->id_pengajuan) ?>">Konfirmasi Pengadaan Diterima</a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	</div>