	<div class="container-fluid">
		<div class="content-group header-demo">
			<div class="page-header page-header-default">
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="javascript:void(0)"><i class="active icon-esc position-left"></i> List Peminjaman Buku</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h6 class="panel-title text-bold"><i class=" icon-search4"></i> - Filter Data</h6>
								<div class="heading-elements">
									<ul class="icons-list">
										<li><a data-action="collapse" data-popup="tooltip" title="Collapse"></a></li>
									</ul>
								</div>
							</div>

							<form action="<?= base_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) ) ?>" method="post">
								<div class="panel-body">
									<div class="form-group has-feedback <?= form_error('nis') ? 'has-error' : '' ?>">
										<label class="control-label text-semibold">Nis Siswa</label>
										<input type="number" class="form-control" 
										<?= set_value('nis') != null ? ' value="' . set_value('nis') . '"' : ''; echo isset($data['nis']) ? ' value="' . $data['nis'] . '" readonly' : '' ?>
										id="nis" name="nisSiswa" min="0" placeholder="Masukan Nis...."> 
										<div class="form-control-feedback">
											<?= form_error('nis') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
										</div>
										<span class="help-block">
											<?= form_error('nis') ?>
										</span>
									</div>

									<div class="form-group has-feedback <?= form_error('status') ? 'has-error' : '' ?>">
										<label class="control-label text-semibold">Status Peminjaman</label>
										<select class="select-search" name="status" data-placeholder="Pilih Status Peminjaman..." <?= isset($data->status) ? ' readonly' : '' ?>>
											<option></option>
											<option value="Belum Kembali">Belum Kembali</option>
											<option value="Perpanjangan">Perpanjangan</option>
											<option value="Sudah Kembali">Sudah Kembali</option>
										</select>
										<div class="form-control-feedback">
											<?= form_error('status') ? '<i class="icon-cancel-circle2"></i>' : '' ?>
										</div>
										<span class="help-block">
											<?= form_error('status') ?>
										</span>
									</div>
								</div>
								<div class="panel-footer">
									<div class="text-right">
										<button style="margin-right: 10px;" type="submit" value="submit" class="filter btn btn-primary"> Filter <i class="icon-search4 position-right"></i></button> 
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h6 class="panel-title text-bold"><i class=" icon-books"></i> - List Data Peminjaman</h6>
								<div class="heading-elements">
									<ul class="icons-list">
										<li><a data-action="collapse" data-popup="tooltip" title="Collapse"></a></li>
									</ul>
								</div>
							</div>
							<div class="panel-body">
								<table class="table datatable-responsive">
									<thead>
										<tr>
											<th><i class="icon-make-group"></i></th>
											<th>Kode Peminjaman</th>
											<th>Nis</th>
											<th>Nama</th>
											<th class="text-center">Status</th>
											<th>Tanggal Peminjaman</th>
											<th>Tanggal Pengembalian</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>

										<?php $no = 1; foreach ($data as $d) : ?> 
										<tr> 
											<td></td> 
											<td><?= $d['kd_peminjaman_header'] ?></td> 
											<td><?= $d['nis'] ?></td> 
											<td><?= $d['nama_lengkap'] ?></td>
											<td class="text-center">
												<span class="label <?php if($d['status']=='Belum Kembali') { echo('label-danger')?>	<?php } elseif($d['status']=='Perpanjangan'){ echo('label-warning') ?> <?php } elseif($d['status']=='Sudah Kembali') { echo('label-success') ?> <?php } ?>"> 
													<?= $d['status'] ?>
												</span>
											</td> 
											<td><?= tgl_indo($d['tgl_pinjam']) ?></td> 
											<td><?= tgl_indo($d['tgl_kembali']) ?></td> 
											<td class="text-center">
												<div class="btn-group">
													<a title="Detail Data Peminjaman" href="<?= base_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/detailPeminjaman' . '/' . enkrip($d['kd_peminjaman_header'])) ?>" class="btn btn-sm btn-white"> <i class="icon-eye text-primary"></i></a>
													<!-- <a title="Perpanjang Data Peminjaman" class="btn btn-sm btn-white" href="javascript:void(0)" onclick="perpanjangPeminjaman('<?= $d['kd_peminjaman_header'] ?>')"> <i class="icon-alarm-add text-success"></i> </a> -->
												</div>
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>