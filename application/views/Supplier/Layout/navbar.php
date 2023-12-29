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
						<a class="nav-link" href="<?= base_url('Supplier/cDashboard') ?>">
							<i class="icon-grid menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Supplier/cPengadaan') ?>">
							<i class="icon-tag menu-icon"></i>
							<span class="menu-title">Pangadaan</span>
						</a>
					</li>


					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('cLogin/logout') ?>">
							<i class="icon-paper menu-icon"></i>
							<span class="menu-title">Logout</span>
						</a>
					</li>
				</ul>
			</nav>