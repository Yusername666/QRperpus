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
		<div class="content-divider text-muted form-group"><span>Filter Data Denda Pengembalian</span></div>
		<h4 class="text-semibold text-center"> Laporan Data Denda Perpustakaan</h4>
		<?php if($this->input->post('awal') && $this->input->post('awal')){ ?>
			<h6 class="text-muted text-center"> Periode <?= tgl_indo($this->input->post('awal')) ?> s/d <?= tgl_indo($this->input->post('akhir')) ?></h6>
		<?php } ?>
		<table class="table datatable-button-html5-basic">
			<thead> 
				<tr> <th>No</th> <th>Nis Siswa</th> <th>Nama Siswa</th> <th>Kode Peminjaman</th> <th>Denda</th> </tr> 
			</thead> 
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<!-- <?php $no = 1; foreach ($data as $d) : ?> <tr> <td></td> <td><?= $no++ ?></td> <td><?= $d['nis'] ?></td> <td><?= $d['nama_lengkap'] ?></td> <td><?= tgl_indo($d['tgl_kunjungan']) ?></td> </tr> <?php endforeach; ?>  -->
			</tbody> 
		</table>
	</div>
</div>