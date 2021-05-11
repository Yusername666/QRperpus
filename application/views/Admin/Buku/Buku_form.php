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
		<h6 class="panel-title"><i class="icon-folder-open text-success"></i> &nbsp;Data Informasi Buku</h6>
		<div class="heading-elements">
			<ul class="icons-list">
				<li><a data-action="collapse"></a></li>
				<li><a data-action="reload"></a></li>
				<li><a data-action="close"></a></li>
			</ul>
		</div>
	</div>

	<div class="panel-body">
		<form action="<?= isset($data['kd_inventaris']) ? '#' : base_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) ) ?>" method="post" enctype="multipart/form-data">

			<div class="panel">
				<div class="panel-body">

					<div class="form-group has-feedback <?= form_error('kd_inventaris') ? 'has-error' : '' ?>">
						<label class="control-label text-semibold">Kode Inventaris Buku</label>
						<input type="number" class="form-control" 
						<?= set_value('kd_inventaris') != null ? ' value="' . set_value('kd_inventaris') . '"' : ''; echo isset($data['kd_inventaris']) ? ' value="' . $data['kd_inventaris'] . '" readonly' : '' ?>
						id="kd_inventaris" name="kd_inventaris" min="0" placeholder="Masukan Kode Inventaris Buku...."> 
						<div class="form-control-feedback">
							<?= form_error('kd_inventaris') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
						</div>
						<span class="help-block">
							<?= form_error('kd_inventaris') ?>
						</span>
					</div>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('judul_buku') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Judul Buku</label>
								<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();"
								<?= set_value('judul_buku') != null ? ' value="' . set_value('judul_buku') . '"' : ''; echo isset($data['judul_buku']) ? ' value="' . $data['judul_buku'] . '" ' : '' ?>
								id="judul_buku" name="judul_buku" placeholder="Masukan Judul Buku...."> 
								<div class="form-control-feedback">
									<?= form_error('judul_buku') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('judul_buku') ?>
								</span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('pengarang') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Pengarang Buku</label>
								<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();"
								<?= set_value('pengarang') != null ? ' value="' . set_value('pengarang') . '"' : ''; echo isset($data['pengarang']) ? ' value="' . $data['pengarang'] . '" ' : '' ?>
								id="pengarang" name="pengarang" placeholder="Masukan Pengarang Buku...."> 
								<div class="form-control-feedback">
									<?= form_error('pengarang') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('pengarang') ?>
								</span>
							</div>
						</div>

					</div>

					<div class="form-group has-feedback <?= form_error('isbn') ? 'has-error' : '' ?>">
						<label class="control-label text-semibold">ISBN Buku</label>
						<input type="number" class="form-control" 
						<?= set_value('isbn') != null ? ' value="' . set_value('isbn') . '"' : ''; echo isset($data['isbn']) ? ' value="' . $data['isbn'] . '" ' : '' ?>
						id="isbn" name="isbn" min="0" placeholder="Masukan No. ISBN Buku...."> 
						<div class="form-control-feedback">
							<?= form_error('isbn') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
						</div>
						<span class="help-block">
							<?= form_error('isbn') ?>
						</span>
					</div>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('penerbit') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Penerbit Buku</label>
								<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();"
								<?= set_value('penerbit') != null ? ' value="' . set_value('penerbit') . '"' : ''; echo isset($data['penerbit']) ? ' value="' . $data['penerbit'] . '" ' : '' ?>
								id="penerbit" name="penerbit" placeholder="Masukan Penerbit Buku...."> 
								<div class="form-control-feedback">
									<?= form_error('penerbit') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('penerbit') ?>
								</span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('thn_terbit') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Tahun Terbit Buku</label>
								<input type="number" class="form-control" onkeyup="this.value = this.value.toUpperCase();"
								<?= set_value('thn_terbit') != null ? ' value="' . set_value('thn_terbit') . '"' : ''; echo isset($data['thn_terbit']) ? ' value="' . $data['thn_terbit'] . '" ' : '' ?>
								id="thn_terbit" name="thn_terbit" min="0" max_lenght="4" placeholder="Masukan Tahun Terbit Buku...."> 
								<div class="form-control-feedback">
									<?= form_error('thn_terbit') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('thn_terbit') ?>
								</span>
							</div>
						</div>

					</div>

				</div>
			</div>

			<div class="panel">
				<div class="panel-body">

					<div class="form-group has-feedback <?= form_error('id_klasifikasi') ? 'has-error' : '' ?>">
						<label class="control-label text-semibold">Klasifikasi Buku</label>
						<select class="select-search" name="id_klasifikasi" id="id_klasifikasi" data-placeholder="Pilih Klasifikasi..." <?= isset($list['id_klasifikasi']) ? ' ' : '' ?>>
							<option></option>
							<?php foreach ($list as $l) :?>
								<option value="<?= $l['id_klasifikasi'] ?>" 
									<?= isset($data['id_klasifikasi']) ? $data['id_klasifikasi'] == $l['id_klasifikasi'] ? ' selected' : '' : '' ?>>
									<?= $l['id_klasifikasi'] .' - '. $l['klasifikasi'] ?>
								</option>
							<?php endforeach; ?>
						</select>
						<div class="form-control-feedback">
							<?= form_error('id_klasifikasi') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
						</div>
						<span class="help-block">
							<?= form_error('id_klasifikasi') ?>
						</span>
					</div>

					<div class="form-group has-feedback <?= form_error('sampul') ? 'has-error' : '' ?>">
						<label class="control-label text-semibold">Sampul Buku</label>
						<?php if (isset($data)) {?>
							<span class="help-block">
								<?= form_error('sampul') ?>
							</span>
							<div class="thumbnail" data-popup="tooltip" title="Sampul tidak boleh dihapus!">
								<center>
									<div class="thumb thumb-slide" style="width: 150px; height: 150px">
										<img style="height: 150px; width: 150px;" src="<?= base_url('/public/buku/sampul/'.$data['sampul'])?>" alt="sampul_buku">
										<div class="caption">
											<span>
												<a href="#" disabled class="btn bg-warning-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-trash"></i></a>
											</span>
										</div>
									</div>
								</center>
								<div class="caption text-center">
									<ul class="icons-list mt-15">
										<li><input type="file" class="file-styled-primary" name="sampul"></li>
									</ul>
									<h6 class="text-semibold no-margin text-left">
										<small class="display-block">
											<i class="text-danger">*)</i> Sampul buku akan ditimpa! 
										</small>
										<small class="display-block">
											<i class="text-danger">*)</i> Ukuran sampul buku maks. 1 mb !
										</small>
									</h6>
								</div>
							</div>
						<?php } else { ?>
							<div class="panel-body">
								<input type="file" class="file-styled-primary" name="sampul">
								<span class="help-block">
									<i class="text-danger">*)</i> Ukuran sampul maks. 1 mb!
								</span>
							</div>
						<?php } ?>
					</div>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('jml_hlm') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Jumlah Halaman Buku</label>
								<input type="text" class="form-control"
								<?= set_value('jml_hlm') != null ? ' value="' . set_value('jml_hlm') . '"' : ''; echo isset($data['jml_hlm']) ? ' value="' . $data['jml_hlm'] . '" ' : '' ?>
								id="jml_hlm" name="jml_hlm" min="0" placeholder="Masukan Jumlah Halaman Buku...."> 
								<div class="form-control-feedback">
									<?= form_error('jml_hlm') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('jml_hlm') ?>
								</span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('stok') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Stok Buku</label>
								<input type="number" class="form-control" onkeyup="this.value = this.value.toUpperCase();"
								<?= set_value('stok') != null ? ' value="' . set_value('stok') . '"' : ''; echo isset($data['stok']) ? ' value="' . $data['stok'] . '" ' : '' ?>
								id="stok" name="stok" min="0" placeholder="Masukan Stok Buku...."> 
								<div class="form-control-feedback">
									<?= form_error('stok') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('stok') ?>
								</span>
							</div>
						</div>

					</div>

				</div>
			</div>

			<div class="text-right">
				<a onclick="window.history.back()" class="btn btn-danger">Batal <i class="icon-cancel-circle2 position-right"></i></a>
				<button type="submit" value="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>