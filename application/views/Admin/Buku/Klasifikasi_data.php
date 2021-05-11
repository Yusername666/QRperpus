<div class="content-group header-demo">
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="#"><i class="active icon-price-tags position-left"></i> Kelola Klasifikasi Buku</a></li>
			</ul>
		</div>
	</div>
</div>

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
<div class="panel panel-flat">
	<div class="panel-body">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="icon-file-empty2 text-success"></i> &nbsp; Data Klasifikasi Buku</h3>
			<div class="heading-elements">
				<ul class="icons-list">
					<li>
						<a href="#" class="btn bg-success-300 btn-labeled btn-rounded text-white" onclick="tambah()" data-toggle="modal" data-target="#modal_form_inline"><b><i class="icon-price-tags"></i></b>Tambah Data Klasifikasi</a>
					</li>
				</ul>
			</div>
		</div>
		<table class="table datatable-responsive-row-control">
			<thead>
				<tr>
					<th></th>
					<th>No</th>
					<th>Klasifikasi Buku</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $d) : ?>

					<tr>
						<td></td>
						<td><?= $d['id_klasifikasi'] ?></td>
						<td><?= $d['klasifikasi'] ?></td>
						<td class="text-center">
							<div class="btn-group">
								<a title="Edit Data" class="btn btn-sm btn-white" onclick="editKlasifikasi('<?= $d['id_klasifikasi'] ?>')" data-toggle="modal" data-target="#modal_form_inline"> <i class="icon-pencil5 text-primary"></i> </a>
								<a title="Hapus Data" class="btn btn-sm btn-white" href="javascript:void(0)" onclick="hapusKlasifikasi('<?= $d['id_klasifikasi'] ?>')">
									<i class="icon-trash text-danger"></i>
								</a>
							</div>
						</td>
					</tr>

				<?php endforeach; ?>

			</tbody>
		</table>
	</div>
</div>

<!-- Inline form modal -->
<div id="modal_form_inline" class="modal fade" data-backdrop="static" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h3 class="modal-title"><i class="icon-file-plus2 text-success"></i> &nbsp; Form Klasifikasi Buku</h3>
			</div>

			<div class="modal-body">
				<form action="javascript:void(0)" method="post" id="form">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('id_klasifikasi') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Id Klasifikasi</label>
								<!-- value="<?= sprintf("%s",++$kode) ?>" -->
								<input type="number" min="0" class="form-control" 
								<?= set_value('id_klasifikasi') != null ? ' value="' . set_value('id_klasifikasi') . '"' : ''; echo isset($data['id_klasifikasi']) ? ' value="' . $data['id_klasifikasi'] . '" readonly' : ' ' ?>
								name="id_klasifikasi" id="id_klasifikasi" placeholder="Masukan Id Klasifikasi....">
								<div class="form-control-feedback">
									<?= form_error('id_klasifikasi') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('id_klasifikasi') ?>
								</span>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group has-feedback <?= form_error('klasifikasi') ? 'has-error' : '' ?>">
								<label class="control-label text-semibold">Klasifikasi Buku</label>
								<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();"
								<?= set_value('klasifikasi') != null ? ' value="' . set_value('klasifikasi') . '"' : ''; echo isset($data['klasifikasi']) ? ' value="' . $data['klasifikasi'] . '" readonly' : '' ?>
								name="klasifikasi" id="klasifikasi" placeholder="Masukan Klasifikasi Buku....">
								<div class="form-control-feedback">
									<?= form_error('klasifikasi') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
								</div>
								<span class="help-block">
									<?= form_error('klasifikasi') ?>
								</span>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="reset" id="batal" class="btn btn-danger" data-dismiss="modal">
							Batal 
							<i class="icon-cancel-circle2 position-right"></i>
						</button>
						<button type="submit" id="simpan" class="btn btn-primary">
							Simpan 
							<i class="icon-arrow-right14 position-right"></i>
						</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<!-- /inline form modal -->

