<footer class="footer">
	<div class="d-sm-flex justify-content-center justify-content-sm-between">
		<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">TAPE KETAN IBU MURNAH</span>
	</div>
	<div class="d-sm-flex justify-content-center justify-content-sm-between">
		<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">KECAMATAN CIGUGUR KABUPATEN KUNINGAN</span>
	</div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?= base_url('asset/skydash/') ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url('asset/skydash/') ?>vendors/chart.js/Chart.min.js"></script>
<script src="<?= base_url('asset/skydash/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= base_url('asset/skydash/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('asset/skydash/') ?>js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('asset/skydash/') ?>js/off-canvas.js"></script>
<script src="<?= base_url('asset/skydash/') ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('asset/skydash/') ?>js/template.js"></script>
<script src="<?= base_url('asset/skydash/') ?>js/settings.js"></script>
<script src="<?= base_url('asset/skydash/') ?>js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url('asset/skydash/') ?>js/dashboard.js"></script>
<script src="<?= base_url('asset/skydash/') ?>js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
<link href="<?= base_url('asset/') ?>DataTables/datatables.min.css" rel="stylesheet">

<script src="<?= base_url('asset/') ?>DataTables/datatables.min.js"></script>
<script>
	$('#myTable').DataTable({
		select: true
	});
</script>
<script>
	console.log = function() {}
	$(".barang").on('change', function() {
		$(".stok").html($(this).find(':selected').attr('data-stok'));
		$(".stok").val($(this).find(':selected').attr('data-stok'));

	});
</script>
</body>

</html>