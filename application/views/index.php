<!doctype html>
<html lang="en">

<head>
	<title>SISURAT | <?php echo $this->session->userdata('nama_jabatan') ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/favicon.png">

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<!-- <a href="index.html"><img src="<?php echo base_url() ?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a> -->
				<center><span class="glyphicon glyphicon-envelope" style="font-size: 25px;color: #0081c2;"></span></center>
				<strong><p>SISURAT | <?php echo $this->session->userdata('nama_jabatan'); ?></p></strong>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url() ?>uploads/img/<?php echo $this->session->userdata('profil')?>" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata('nama_pegawai'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url() ?>index.php/login/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
									
						<?php 
							if ($this->session->userdata('level') == 1) {
								echo '
									<li><a href="'.base_url().'index.php/dashboard"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
									<li><a href="'.base_url().'index.php/surat_masuk" class=""><i class="fa fa-download"></i> <span>Surat Masuk</span></a></li>
									<li><a href="'.base_url().'index.php/surat_keluar" class=""><i class="fa fa-upload"></i> <span>Surat Keluar</span></a></li>
									<li>
										<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-user"></i> <span>User Pegawai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPages" class="collapse ">
											<ul class="nav">
												<li><a href="'.base_url().'index.php/pegawai" class="">Data User Pegawai</a></li>
												<li><a href="'.base_url().'index.php/account_setting/setting/'.$this->session->userdata('id_pegawai').'" class="">Account Setting</a></li>
											</ul>
										</div>
									</li>
								';
							} else {
								echo '
									<li><a href="'.base_url().'index.php/disposisi_masuk" class=""><i class="fa fa-download"></i> <span>Disposisi Masuk</span></a></li>
									<li><a href="'.base_url().'index.php/account_setting/setting/'.$this->session->userdata('id_pegawai').'" class=""><i class="fa fa-user"></i> <span>Account Setting</span></a></li>
								';
							}
							
						?>
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->

					

		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<?php 
						$success = $this->session->flashdata('success');
						$failed = $this->session->flashdata('failed');

						if (!empty($failed)) {
							echo '
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<i class="fa fa-times-circle"></i> '.$failed.'
								</div>
							';
						}

						if (!empty($success)) {
							echo '
								<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<i class="fa fa-check-circle"></i> '.$success.'
								</div>
							';
						}
					?>
					<?php 
						$this->load->view($main_view);
					?>
				</div>
			</div>
		</div>

		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="http://smktelkom-mlg.sch.id" target="_blank">SMK TELKOM MALANG</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo base_url() ?>assets/scripts/klorofil-common.js"></script>
</body>

</html>
