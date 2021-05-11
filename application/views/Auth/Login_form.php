<!-- Simple login form -->
<form action="<?= base_url($this->uri->segment(1)) ?>" class="login-form" method="POST">
	<div style="margin-top: 5px" class="panel panel-body border-top-success border-bottom-success">
		<div class="text-center">
			<div class="text-indigo"><img src="<?php echo base_url('global_assets/images/signature.png') ?>" alt="logo_man2" style="height: 150px; width: 150px;"></div>
			<h5 class="content-group">SI - Perpus Web Application<small class="display-block">Sistem Informasi Perpustakaan Berbasis Web</small></h5>
		</div>
		<div class="form-group has-feedback <?= form_error('userLog') ? 'has-error' : '' ?>">
			<label class="control-label text-semibold">User NIS</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon-user-lock"></i></span>
				<input type="text" class="form-control" id="nis" name="userLog" placeholder="Masukan Username....">
			</div>
			<div class="form-control-feedback">
				<?= form_error('userLog') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
			</div>
			<span class="help-block text-center">
				<?= form_error('userLog') ?>
			</span>
		</div>

		<div class="form-group has-feedback <?= form_error('passLog') ? 'has-error' : '' ?>">
			<label class="control-label text-semibold">Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon-lock2"></i></span>
				<input type="password" class="form-control" id="passLog" name="passLog" placeholder="Password....">
			</div>
			<div class="form-control-feedback">
				<?= form_error('passLog') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
			</div>
			<span class="help-block text-center">
				<?= form_error('passLog') ?>
			</span>
		</div>
		<div class="content-divider text-success form-group"><span><i class="icon-feed"></i></span></div>
		<div class="form-group">
			<button type="submit" class="btn bg-success btn-block btn-rounded">Login <i class="icon-circle-right2"></i></button>
		</div>
	</div>
</form>
<!-- /simple login form -->