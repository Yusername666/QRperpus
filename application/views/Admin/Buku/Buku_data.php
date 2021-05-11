<div class="content-group header-demo">
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="#"><i class="active icon-books position-left"></i> Kelola Buku</a></li>
			</ul>
		</div>
	</div>
</div>

<ul class="visible-xs-block fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click">
	<li>
		<a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon">
			<i class="fab-icon-open icon-plus2"></i>
			<i class="fab-icon-close icon-cross2"></i>
		</a>
		<ul class="fab-menu-inner">
			<li>
				<div data-fab-label="Tambah Data">
					<a href="<?= base_url($this->uri->segment(1). '/' .$this->uri->segment(2). '/tambah') ?>" class="btn btn-default btn-rounded btn-icon btn-float">
						<i class="icon-pencil"></i>
					</a>
				</div>
			</li>
			<li>
				<div data-fab-label="Tambah Klasifikasi Buku">
					<a href="<?= base_url($this->uri->segment(1). '/Klasifikasi_buku') ?>" class="btn btn-default btn-rounded btn-icon btn-float">
						<i class="icon-price-tags"></i>
					</a>
				</div>
			</li>
		</ul>
	</li>
</ul>
<div class="panel panel-flat">
	<div class="panel-body">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="icon-folder-open text-success"></i> &nbsp; Data Buku</h3>
			<div class="heading-elements">
				<ul class="icons-list">
					<li>
						<a href="<?= base_url($this->uri->segment(1). '/Klasifikasi_buku') ?>" class="btn bg-success-300 btn-labeled btn-rounded text-white"><b><i class="icon-price-tags"></i></b>Tambah Klasifikasi</a>
					</li>
					<li>
						<a href="<?= base_url($this->uri->segment(1). '/' .$this->uri->segment(2). '/tambah') ?>" class="btn bg-success-300 btn-labeled btn-rounded text-white"><b><i class="icon-plus2"></i></b>Tambah Data Buku</a>
					</li>
					<li style="display: none;">
						<a href="<?= base_url($this->uri->segment(1). '/' .$this->uri->segment(2). '/cetakQr') ?>" class="btn bg-success-300 btn-labeled btn-rounded text-white"><b><i class="icon-qrcode"></i></b>Cetak Data QRcode</a>
					</li>
				</ul>
			</div>
		</div>
		<table class="table datatable-responsive-row-control">
			<thead>
				<tr>
					<th></th>
					<th>No</th>
					<th>Sampul</th>
					<th>Judul Buku</th>
					<th>Tahun Terbit</th>
					<th>Klasifikasi</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($data as $d) :
					?>
					<tr>
						<td></td>
						<td><?= $no++ ?></td>
						<td>
							<img style="height: 60px; width: 60px;" src="<?= base_url('/public/buku/sampul/'.$d['sampul'])?>" alt="">
						</td>
						<td class="text-capitalize"><?= $d['judul_buku'] ?></td>
						<td class="text-capitalize"><?= $d['thn_terbit'] ?></td>
						<td><span class="label label-success"><?= $d['klasifikasi'] ?></span></td>
						<td class="text-center">
							<div class="btn-group">
								<a title="Edit Data" class="btn btn-sm btn-white" href="<?= base_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . 'ubah' . '/' . $d['kd_inventaris']) ?>"> <i class="icon-pencil5 text-primary"></i> </a> 
								<a title="Hapus Data" class="btn btn-sm btn-white" href="#" onclick="hapusBuku('<?= $d['kd_inventaris'] ?>')"><i class="icon-trash text-danger"></i></a> 
								<a title="QrBook Data" class="btn btn-sm btn-white" href="<?= base_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . 'QrBook' . '/' . $d['kd_inventaris']) ?>"><i class="icon-qrcode text-info"></i></a>
							</div>
						</td>
					</tr>
					<?php
				endforeach;
				?>
			</tbody>
		</table>
	</div>
</div>



