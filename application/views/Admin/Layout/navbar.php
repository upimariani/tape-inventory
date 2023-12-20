<body>
	<div class="container-scroller">
		<!-- partial:partials/_navbar.html -->
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
				<a class="navbar-brand brand-logo mr-5" href="index.html"><img src="<?= base_url('asset/skydash/') ?>images/logo.svg" class="mr-2" alt="logo" /></a>
				<a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('asset/skydash/') ?>images/logo-mini.svg" alt="logo" /></a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<span class="icon-menu"></span>
				</button>


				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
					<span class="icon-menu"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_settings-panel.html -->

			<!-- partial -->
			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Admin/cDashboard') ?>">
							<i class="icon-grid menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
							<i class="icon-layout menu-icon"></i>
							<span class="menu-title">Data Master</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="collapse" id="ui-basic">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"> <a class="nav-link" href="<?= base_url('Admin/cUser') ?>">User</a></li>
								<li class="nav-item"> <a class="nav-link" href="<?= base_url('Admin/cKategori') ?>">Kategori</a></li>
								<li class="nav-item"> <a class="nav-link" href="<?= base_url('Admin/cBarang') ?>">Barang</a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
							<i class="icon-columns menu-icon"></i>
							<span class="menu-title">Barang</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="collapse" id="form-elements">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"><a class="nav-link" href="<?= base_url('Admin/cMasuk') ?>">Barang Masuk</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= base_url('Admin/cKeluar') ?>">Barang Keluar</a></li>
							</ul>
						</div>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('cLogin/logout') ?>">
							<i class="icon-paper menu-icon"></i>
							<span class="menu-title">Logout</span>
						</a>
					</li>
				</ul>
			</nav>