<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click">
	<li>
		<a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon">
			<i class="fab-icon-open icon-cog"></i>
			<i class="fab-icon-close icon-cogs"></i>
		</a>
		<ul class="fab-menu-inner">
			<li>
				<div data-fab-label="Kembali">
					<a onclick="window.history.back()" class="btn btn-default btn-rounded btn-icon btn-float">
						<i class="icon-undo2"></i>
					</a>
				</div>
			</li>
		</ul>
	</li>
</ul>

<!-- Profile info -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-folder-open text-success"></i> &nbsp;Data Informasi Pengguna</h6>
		<div class="heading-elements">
			<ul class="icons-list">
				<li><a data-action="collapse"></a></li>
				<li><a data-action="reload"></a></li>
				<li><a data-action="close"></a></li>
			</ul>
		</div>
	</div>

	<div class="panel-body">
		<form action="<?= isset($data->nis) ? '#' : base_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) ) ?>" method="post" enctype="multipart/form-data">

			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-vcard"></i> &nbsp;Data Diri Pengguna</h6>
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="collapse"></a></li>
						</ul>
					</div>
				</div>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('nis') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">NIS</label>
								<input type="number" class="validate-nis form-control" 
								<?= set_value('nis') != null ? ' value="' . set_value('nis') . '"' : ''; echo isset($data->nis) ? ' value="' . $data->nis . '" readonly' : '' ?>
								id="nis" name="nis" min="0" placeholder="Masukan NIS...."> 
								<div class="form-control-feedback">
									<?= form_error('nis') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('nis') ?>
								</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('kelas') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Kelas</label>
								<?php if (isset($data->kelas)) { ?>
									<select class="select" name="kelas" data-placeholder="Jenis Kelas..." disabled="disabled">
										<option></option> <option value='<?= $data->kelas ?>' selected><?= $data->kelas ?></option>
									</select>
								<?php } else { ?>
									<div class="row">
										<div class="col-xs-10">
											<select class="select" name="kelas" id="kelas" data-placeholder="Jenis Kelas...">
												<option></option> <option value="IX-IPA">IX-IPA</option> <option value="XI-IPA">XI-IPA</option> <option value="XII-IPA">XII-IPA</option> <option value="IX-IPS">IX-IPS</option> <option value="XI-IPS">XI-IPS</option> <option value="XII-IPS">XII-IPS</option> <option value="PETUGAS">PETUGAS</option>
											</select>
										</div>
										<div class="col-xs-2">
											<div id="nomor">
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="form-group has-feedback <?= form_error('nama_lengkap') ? 'has-error' : '' ?>">
						<label class="control-label text-semibold">Nama Lengkap</label>
						<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();"
						<?= set_value('nama_lengkap') != null ? ' value="' . set_value('nama_lengkap') . '"' : ''; echo isset($data->nama_lengkap) ? ' value="' . $data->nama_lengkap . '" readonly' : '' ?>
						name="nama_lengkap" placeholder="Masukan Nama Lengkap....">
						<div class="form-control-feedback">
							<?= form_error('nama_lengkap') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
						</div>
						<span class="help-block">
							<?= form_error('nama_lengkap') ?>
						</span>
					</div>

					<div class="form-group has-feedback <?= form_error('tgl_lahir') ? 'has-error' : '' ?>">
						<label class="control-label text-semibold">Tanggal Lahir</label>
						<input type="date" class="form-control" 
						<?= set_value('tgl_lahir') != null ? ' value="' . set_value('tgl_lahir') . '"' : ''; echo isset($data->tgl_lahir) ? ' value="' . $data->tgl_lahir . '" readonly' : '' ?>
						name="tgl_lahir" placeholder="Masukan Tanggal Lahir....">
						<div class="form-control-feedback">
							<?= form_error('tgl_lahir') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
						</div>
						<span class="help-block">
							<?= form_error('tgl_lahir') ?>
						</span>
					</div>

					<div class="form-group has-feedback <?= form_error('alamat') ? 'has-error' : '' ?>">
						<label class="control-label text-semibold">Alamat Lengkap</label>
						<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();"
						<?= set_value('alamat') != null ? ' value="' . set_value('alamat') . '"' : ''; echo isset($data->alamat) ? ' value="' . $data->alamat . '" readonly' : '' ?>
						name="alamat" placeholder="Masukan Alamat Lengkap....">
						<div class="form-control-feedback">
							<?= form_error('alamat') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
						</div>
						<span class="help-block">
							<?= form_error('alamat') ?>
						</span>
					</div>


				</div>
			</div>
			<div class="content-divider text-success form-group"><span><i class="icon-feed"></i></span></div>
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-wrench"></i>&nbsp; Konfigurasi Pengguna</h6>
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="collapse"></a></li>
						</ul>
					</div>
				</div>

				<div class="panel-body">

					<div class="form-group has-feedback <?= form_error('foto') ? 'has-error' : '' ?>">
						<?php if (isset($data->foto)) {?>
							<label class="control-label text-semibold">Foto</label>
							<span class="help-block">
								<?= form_error('foto') ?>
							</span>
							<div class="thumbnail" data-popup="tooltip" title="Foto tidak boleh dihapus!">
								<div class="thumb thumb-rounded thumb-slide" style="width: 150px; height: 150px">
									<img style="height: 150px; width: 150px;" src="<?= base_url('/public/user/foto/'.$data->foto)?>" alt="foto_siswa">
									<div class="caption">
										<span>
											<a href="#" disabled class="btn bg-warning-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-trash"></i></a>
										</span>
									</div>
								</div>
								<div class="caption text-center">
									<ul class="icons-list mt-15">
										<li><input type="file" class="file-styled-primary" name="foto"></li>
									</ul>
									<h6 class="text-semibold no-margin text-left">
										<small class="display-block">
											<i class="text-danger">*)</i> Foto akan ditimpa! 
										</small>
										<small class="display-block">
											<i class="text-danger">*)</i> Ukuran foto maks. 1 mb !
										</small>
									</h6>
								</div>
							</div>
						<?php } else { ?>
							<label class="control-label text-semibold">Foto</label>
							<div class="panel-body">
								<input type="file" class="file-styled-primary" name="foto">
								<span class="help-block">
									<i class="text-danger">*)</i> Ukuran foto maks. 1 mb!
								</span>
							</div>
						<?php } ?>
					</div>
					<?php if (isset($data)) { ?>
						<div class="form-group">
							<div class="row">

								<div class="col-md-6">
									<div class="form-group has-feedback <?= form_error('username') ? 'has-error' : '' ?>">
										<label class="control-label text-semibold">Username</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon-user-lock"></i></span>
											<input type="text" class="form-control" 
											<?= set_value('username') != null ? ' value="' . set_value('username') . '"' : ''; echo isset($data->username) ? ' value="' . $data->username . '" readonly' : '' ?>
											id="username" name="username" placeholder="Masukan Username....">
										</div>
										<div class="form-control-feedback">
											<?= form_error('username') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
										</div>
										<span class="help-block text-center">
											<?= form_error('username') ?>
										</span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group has-feedback <?= form_error('password') ? 'has-error' : '' ?>">
										<label class="control-label text-semibold">Password</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon-lock"></i></span>
											<input type="password" class="form-control" id="password" name="password" placeholder='<?= isset($data->password) ? 'Masukan Password Baru...' : 'Password...' ?>'<?= !isset($data->password) ? 'value="man01pekalongan"' : '' ?>>
										</div>
										<div class="form-control-feedback">
											<?= form_error('password') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
										</div>
										<span class="help-block text-center">
											<?= form_error('password') ?>
										</span>
									</div>
								</div>

							</div>
						</div>
					<?php } ?>
					<div class="form-group has-feedback <?= form_error('login_hash') ? 'has-error' : '' ?>">
						<label class="control-label text-semibold">Hak Akses</label>
						<select class="select-search" name="login_hash" data-placeholder="Akses Login..." <?= isset($data->login_hash) ? ' readonly' : '' ?>>
							<option></option>
							<?php foreach ($list as $bb) : ?>
								<option value='<?= $bb->id_role ?>' <?= isset($data->login_hash) ? $data->login_hash == $bb->id_role ? ' selected' : '' : '' ?>> <?= $bb->role ?> </option> 
							<?php endforeach; ?>
						</select>
						<div class="form-control-feedback">
							<?= form_error('login_hash') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
						</div>
						<span class="help-block">
							<?= form_error('login_hash') ?>
						</span>
					</div>

				</div>
			</div>
			<input type="hidden" name="log" value="<?= date('YmdHis') ?>">

			<div class="text-right">
				<a onclick="window.history.back()" class="btn btn-danger">Batal <i class="icon-cancel-circle2 position-right"></i></a>
				<button type="submit" value="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>