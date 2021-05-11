<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIPerpus - MAN 01 Pekalongan</title>
	<link rel="shortcut icon"href="<?php echo base_url('global_assets/images/signature.png'); ?>">
	<!-- Global stylesheets -->
	<script src="<?php echo base_url('global_assets/js/core/libraries/jquery.min.js') ?>"></script>

	<link href="<?php echo base_url('global_assets/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/core.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/components.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/colors.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/less/toastr/toastr.min.css') ?>" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url('assets/less/toastr/toastr.min.js') ?>"></script>
	<script src="<?php echo base_url('global_assets/js/plugins/loaders/pace.min.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/core/libraries/bootstrap.min.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/plugins/loaders/blockui.min.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/plugins/ui/nicescroll.min.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/plugins/ui/drilldown.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/plugins/ui/fab.min.js') ?>" defer></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url('assets/less/sweetalert/sweetalert2.all.js') ?>" defer></script>
	<script src="<?php echo base_url('assets/less/sweetalert/sweetalert2.all.min.js') ?>" defer></script>
	<script src="<?php echo base_url('assets/js/bootstrap-maxlength.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/plugins/forms/styling/uniform.min.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/core/libraries/jquery_ui/interactions.min.js') ?>" defer></script>
	<script src="<?php echo base_url('assets/js/app.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/demo_pages/login.js') ?>" defer></script>
	<script src="<?php echo base_url('global_assets/js/plugins/ui/ripple.min.js') ?>" defer></script>
	<!-- /theme JS files -->
	<script type="text/javascript">
		<?php
		$gagal = $this->session->userdata('gagal');
		if ($gagal) {
			?>
			$(document).ready(function() {
				toastr["error"]("Username / Password Invalid!", "Error")
				toastr.options = {
					"closeButton": true,
					"debug": true,
					"newestOnTop": true,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": true,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			})
			<?php
			$this->session->unset_userdata('gagal');
		}
		?>
	</script>
	<script type="text/javascript">
		<?php
		$reg = $this->session->flashdata('success');
		if ($reg) { ?>
			$(document).ready(function() {
				toastr["success"]("Username / Password Berhasil Dibuat!", "Success")
				toastr.options = {
					"closeButton": true,
					"debug": true,
					"newestOnTop": true,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": true,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			})
		<?php } ?>
	</script>

</head>

<body class="login-container login-cover">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
				<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click">
					<li>
						<a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon">
							<i class="fab-icon-open icon-cog"></i>
							<i class="fab-icon-close icon-cogs"></i>
						</a>
						<ul class="fab-menu-inner">
							<li>
								<div data-fab-label="Absensi Kunjungan">
									<a href="<?= base_url('Auth/Qr') ?>" class="btn btn-default btn-rounded btn-icon btn-float">
										<i class="icon-qrcode"></i>
									</a>
								</div>
							</li>
							<li>
								<div data-fab-label="Login User">
									<a href="<?= base_url('Auth') ?>" class="btn btn-default btn-rounded btn-icon btn-float">
										<i class="icon-user-lock"></i>
									</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>

				<?= $contents ?>
				
			</div>

			<!-- /page content -->

		</div>
		<!-- /page container -->

		<div class="navbar navbar-default navbar-fixed-bottom footer">
			<ul class="nav navbar-nav visible-xs-block">
				<li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
			</ul>

			<div class="navbar-collapse collapse" id="footer">
				<div class="navbar-text">
					&copy; <?= date('Y') ?>. <a href="#" class="navbar-link">SIPerpus Web App Kit</a> by <a href="#" class="navbar-link" target="_blank">Developer</a>
				</div>

				<div class="navbar-right">
					<ul class="nav navbar-nav">
						<li><a href=""><i class="icon-watch"></i> <span id="clock"></span></a></li>
						<li><a href=""><i class="icon-git"></i></a></li>

					</ul>
				</div>
			</div>
		</div>
	</body>

	</html>
	<script src="<?php echo base_url('assets/js/main.js') ?>" defer></script>
