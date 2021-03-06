<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php
		if (isset($titulo)) {
			echo '<title>' . $titulo . '</title>';
		} else {
			echo '<title>Laços da Cris | Dashboard</title>';
		}
	?>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url('public/plugins/jqvmap/jqvmap.min.css') ?>">

	<link rel="stylesheet" href="<?php echo base_url('public/css/uploadfile.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('public/css/adminlte.min.css') ?>">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url('public/plugins/daterangepicker/daterangepicker.css') ?>">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url('public/plugins/summernote/summernote-bs4.css') ?>">
	<!-- datatables -->
	<link rel="stylesheet" href="<?php echo base_url('public/plugins/datatables-bs4/css/dataTables4.bootstrap4.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/datatables/datatables.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/css/main.css') ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="#" class="nav-link">Home</a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="#" class="nav-link">Contato</a>
			</li>
		</ul>

		<!-- SEARCH FORM -->
		<form class="form-inline ml-3">
			<div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" type="search" placeholder="Pesquisar" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-navbar" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</form>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Messages Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-comments"></i>
					<span class="badge badge-danger navbar-badge">3</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<a href="#" class="dropdown-item">
						<!-- Message Start -->
						<div class="media">
							<img src="<?php echo base_url('public/img/user1-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
							<div class="media-body">
								<h3 class="dropdown-item-title">
									Brad Diesel
									<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
								</h3>
								<p class="text-sm">Call me whenever you can...</p>
								<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
							</div>
						</div>
						<!-- Message End -->
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<!-- Message Start -->
						<div class="media">
							<img src="<?php echo base_url('public/img/user8-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
							<div class="media-body">
								<h3 class="dropdown-item-title">
									John Pierce
									<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
								</h3>
								<p class="text-sm">I got your message bro</p>
								<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
							</div>
						</div>
						<!-- Message End -->
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<!-- Message Start -->
						<div class="media">
							<img src="<?php echo base_url('public/img/user3-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
							<div class="media-body">
								<h3 class="dropdown-item-title">
									Nora Silvester
									<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
								</h3>
								<p class="text-sm">The subject goes here</p>
								<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
							</div>
						</div>
						<!-- Message End -->
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
				</div>
			</li>
			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-bell"></i>
					<span class="badge badge-warning navbar-badge">15</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<span class="dropdown-item dropdown-header">15 Notifications</span>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-envelope mr-2"></i> 4 new messages
						<span class="float-right text-muted text-sm">3 mins</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-users mr-2"></i> 8 friend requests
						<span class="float-right text-muted text-sm">12 hours</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-file mr-2"></i> 3 new reports
						<span class="float-right text-muted text-sm">2 days</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('admin/login/logout') ?>" role="button">
					Sair<i class="fas fa-th-large"></i>
				</a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="#" class="brand-link">
			<img src="<?php echo base_url('public/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				 style="opacity: .8">
			<span class="brand-text font-weight-light">Laços da Cris</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?php echo base_url('public/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">Herval Mata</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="nav-header">Páginas</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/config') ?>" class="nav-link">
							<i class="nav-icon far fa-building"></i>
							<p>
								Configuração
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/config/pagseguro') ?>" class="nav-link">
							<i class="nav-icon fas fa-money-bill-wave"></i>
							<p>
								PagSeguro
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/config/correios') ?>" class="nav-link">
							<i class="nav-icon fab fa-fedex"></i>
							<p>
								Correios
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/usuarios') ?>" class="nav-link">
							<i class="nav-icon fas fa-user-tie"></i>
							<p>
								Administradores
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/clientes') ?>" class="nav-link">
							<i class="nav-icon far fa-user"></i>
							<p>
								Clientes
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/pedidos') ?>" class="nav-link">
							<i class="nav-icon fas fa-cash-register"></i>
							<p>
								Ordens
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/marcas') ?>" class="nav-link">
							<i class="nav-icon fas fa-tags"></i>
							<p>
								Marcas
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/categorias') ?>" class="nav-link">
							<i class="nav-icon fas fa-indent"></i>
							<p>
								Categorias
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('admin/produtos') ?>" class="nav-link">
							<i class="nav-icon fas fa-socks"></i>
							<p>
								Produtos
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-chart-area"></i>
							<p>
								Relatórios
							</p>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">

		<?php
			if (isset($view)) {
				$this->load->view($view);
			}
		?>


	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<strong>Copyright &copy; 2020 <a href="http://localhost:8080">Laços da Cris</a>.</strong>
		Todos os direitos reservados.
		<div class="float-right d-none d-sm-inline-block">
			<b>Versão</b> 1.0.0
		</div>
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('public/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('public/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('public/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('public/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?php echo base_url('public/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('public/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url('public/plugins/datatables/js/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('public/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script src="<?php echo base_url('public/datatables/datatables.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('public/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('public/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('public/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<script src="<?php echo base_url('public/plugins/jQuery-Mask-Plugin/dist/jquery.mask.js') ?>"></script>
<script src="<?php echo base_url('public/js/jquery.uploadfile.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('public/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('public/js/demo.js') ?>"></script>
<!-- Main js -->
<script src="<?php echo base_url('public/js/main.js') ?>"></script>
</body>
