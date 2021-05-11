<div class="panel">
	<div class="panel-body">
		<form method="post" action="<?= base_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) ) ?>">
			<div class="panel-body">
				<fieldset>
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Tanggal Awal <span class="text-danger">*</span></label>
								<input type="date" name="awal" id="awal" class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Tanggal Akhir <span class="text-danger">*</span></label>
								<input type="date" name="akhir" id="akhir" class="form-control">
							</div>
						</div>

					</div>
				</fieldset>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn bg-info btn-block">Sortir <i class="icon-search4 position-right"></i></button>
			</div>
		</form>
		<div class="content-divider text-muted form-group"><span>Filter Data Aktivitas</span></div>
		<h4 class="text-semibold text-center"> Laporan Data Pinjam-Kembali Perpustakaan</h4>
		<?php if($this->input->post('awal') && $this->input->post('awal')){ ?>
			<h6 class="text-muted text-center"> Periode <?= tgl_indo($this->input->post('awal')) ?> s/d <?= tgl_indo($this->input->post('akhir')) ?></h6>
		<?php } ?>
		<div class="table-responsive">
			<table class="table table-lg table-bordered table-hovered">
				<thead class="border-solid">
					<tr>
						<th class="text-center text-semibold" rowspan="2">NO</th>
						<th class="text-center text-semibold" rowspan="2">NAMA PEMINJAM</th>
						<th class="text-center text-semibold" rowspan="2">JUDUL BUKU</th>
						<th class="text-center text-semibold" rowspan="2">KELAS</th>
						<th class="text-center text-semibold" colspan="3">TANGGAL</th>
						<th class="text-center text-semibold" rowspan="2">NOMOR BUKU</th>
						<th class="text-center text-semibold" rowspan="2">STATUS</th>
					</tr>
					<tr>
						<td class="text-center text-bold" >PINJAM</td>
						<td class="text-center text-bold" >PERPANJANG</td>
						<td class="text-center text-bold" >KEMBALI</td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($data as $d) : ?> 
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $d['nama_lengkap'] ?></td>
						<td><?= $d['judul_buku'] ?></td>
						<td><?= $d['kelas'] ?></td>
						<td class="text-center"><?= tgl_indo($d['tgl_pinjam']) ?></td>
						<td class="text-center">-</td>
						<td class="text-center"><?= tgl_indo($d['tgl_kembali']) ?></td>
						<td class="text-center"><?= $d['kd_inventaris'] ?></td>
						<td class="text-center"><?= $d['status'] ?></td>
					</tr>
				<?php endforeach; ?> 
			</tbody>
		</table>
	</div>
</div>
</div>