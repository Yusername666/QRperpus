	<div class="panel panel-white">
		<div class="panel-heading">
			<h6 class="panel-title text-bold">Detail Peminjaman Buku</h6>
			<div class="heading-elements">
				<?php if ($peminjam['status'] == 'Belum Kembali') { ?>
					<div class="btn-group">
						<button onclick="perpanjangan('<?= $peminjam['kd_peminjaman_header'] ?>')" class="btn btn-lg heading-btn" title="Perpanjangan Peminjaman Buku"><i class="text-warning icon-alarm-add position-lef"></i></button>
						<button onclick="pengembalianBuku('<?= $peminjam['kd_peminjaman_header'] ?>')" title="Pengembalian Buku" class="btn btn-lg heading-btn"><i class="text-success icon-alarm-check"></i></button>
					</div>
				<?php } else { ?>
					<div class="btn-group">
						<a href="<?= base_url('Admin/Peminjaman/listPeminjaman') ?>" class="btn btn-lg heading-btn" title="Perpanjangan Peminjaman Buku"><i class="icon-undo2 position-right"></i></a>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="panel-body no-padding-bottom">
			<div class="row">
				<div class="col-sm-6 content-group">
					<ul class="list-condensed list-unstyled">
						<li><i class="icon-library2"></i> - Perpustakaan MAN 01 PEKALONGAN</li>
						<li><i class="icon-location4"></i> - Jl. Bina Griya Raya No.64, Kec. Pekalongan Barat, Kota Pekalongan</li>
						<li><i class="icon-phone"></i> - (0285) 421059</li>
					</ul>
				</div>

				<div class="col-sm-6 content-group">
					<div class="invoice-details">
						<h5 class="text-uppercase text-semibold"><?= $peminjam['kd_peminjaman_header']; ?></h5>
						<ul class="list-condensed list-unstyled">
							<li>Tanggal Peminjaman : <span class="label label-info text-bold"><?= tgl_indo($peminjam['tgl_pinjam']) ?></span></li>
							<li>Tanggal Pengembalian : <span class="label label-info text-bold"><?= tgl_indo($peminjam['tgl_kembali']) ?></span></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-lg-9 content-group">
					<span class="text-muted">Data Peminjam :</span>
					<ul class="list-condensed list-unstyled">
						<li><h5>NAMA : <?= $peminjam['nama_lengkap'] ?></h5></li>
						<li><span class="text-semibold">NIS : <?= $peminjam['nis'] ?></span></li>
						<li><span class="text-semibold">KELAS : <?= $peminjam['kelas'] ?></span></li>
						<li><span class="text-semibold">ALAMAT : <?= $peminjam['alamat'] ?></span></li>
					</ul>
				</div>

				<div class="col-md-6 col-lg-3 content-group">
					<ul class="list-condensed list-unstyled invoice-payment-details">
						<li>
							<img style="height: 150px; width: 150px;" src="<?= base_url('/public/user/foto/'.$peminjam['foto'])?>" alt="foto_siswa">
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-lg">
				<thead>
					<tr>
						<th class="text-center">Sampul Buku</th>
						<th class="text-center">Kode Inventaris</th>
						<th>Judul Buku</th>
						<th>Klasifikasi Buku</th>
						<th class="text-center">Qr-Code</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($buku as $b) : ?>
					<tr>
						<td class="text-center">
							<img style="height: 80px; width: 70px;" src="<?= base_url('/public/buku/sampul/'.$b['sampul'])?>" alt="sampul_buku">
						</td>
						<td class="text-center"><?= $b['kd_inventaris'] ?></td>
						<td>
							<h6 class="no-margin"><?= $b['judul_buku']; ?></h6>
						</td>
						<td class="text-semibold text-primary"><?= $b['klasifikasi'] ?></td>
						<td class="text-center">
							<img style="height: 80px; width: 80px;" src="<?= base_url('/public/buku/qrcode/'.$b['qrcode'])?>" alt="qrcode_buku">
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panel-body">
		<div class="row invoice-payment">
			<div class="col-sm-7">

				<?php if ($peminjam['status'] === 'Sudah Kembali') { ?>
					<div class="content-group text-center">
						<h6>DENDA :</h6>
						<h3 style="cursor: default;" class="text-bold"><?= rupiah($peminjam['denda']) ?></h3>
					</div>
				<?php } ?>

			</div>

			<div class="col-sm-5">
				<div class="content-group text-center">
					<h6>STATUS PEMINJAMAN BUKU :</h6>
					<span style="cursor: default;" class="label <?php if($peminjam['status']=='Belum Kembali') { echo('label-danger')?>	<?php } elseif($peminjam['status']=='Perpanjangan'){ echo('label-warning') ?> <?php } elseif($peminjam['status']=='Sudah Kembali') { echo('label-success') ?> <?php } ?>">
						<h6><?= $peminjam['status'] ?></h6>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>

<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click">
	<li>
		<a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon">
			<i class="fab-icon-open icon-cogs"></i>
			<i class="fab-icon-close icon-cog spinner"></i>
		</a>
		<ul class="fab-menu-inner">
			<li>
				<div data-fab-label="Kembali">
					<a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-default btn-rounded btn-icon btn-float">
						<i class="icon-undo2"></i>
					</a>
				</div>
			</li>
		</ul>
	</li>
</ul>


