<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>SISURAT | <?php echo $this->session->userdata('nama_jabatan'); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<div class="user text-center">
							<strong><p style="font-size: 60px;">OOoopss...</p></strong>
							<h4>Data Yang Anda Cari Tidak Ditemukan :(</h4>
							<h6>Klik Disini Untuk Kembali ke Halaman Awal</h6>
							<?php 
								if ($this->uri->segment(1) == 'surat_masuk') {
									echo '
										<a href="'.base_url().'index.php/surat_masuk" data-toggle="modal" data-target="#tambah" class="col-md-4 col-md-offset-4 btn btn-success btn-lg"><span class="fa fa-arrow-left"></span> Kembali</a>
									';
								} elseif ($this->uri->segment(1) == 'surat_keluar') {
									echo '
										<a href="'.base_url().'index.php/surat_keluar" data-toggle="modal" data-target="#tambah" class="col-md-4 col-md-offset-4 btn btn-success btn-lg"><span class="fa fa-arrow-left"></span> Kembali</a>
									';
								}
							 ?>
										
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
