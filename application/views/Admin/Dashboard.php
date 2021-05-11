<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-library2"></i> - Dashboard Admin</h6>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="reload" data-popup="tooltip" title="Reload"></a></li>
				</ul>
			</div>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="panel panel-body bg-blue-400 has-bg-image">
						<div class="media no-margin">
							<div class="media-body">
								<h3 class="no-margin"><?= $total_user; ?></h3>
								<span class="text-uppercase text-size-mini">total pengguna</span>
							</div>

							<div class="media-right media-middle">
								<i class="icon-users icon-3x opacity-75"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="panel panel-body bg-danger-400 has-bg-image">
						<div class="media no-margin">
							<div class="media-body">
								<h3 class="no-margin"><?= $total_buku; ?></h3>
								<span class="text-uppercase text-size-mini">total buku</span>
							</div>

							<div class="media-right media-middle">
								<i class="icon-books icon-3x opacity-75"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="panel panel-body bg-success-400 has-bg-image">
						<div class="media no-margin">
							<div class="media-left media-middle">
								<i class="icon-esc icon-3x opacity-75"></i>
							</div>

							<div class="media-body text-right">
								<h3 class="no-margin"><?= $total_peminjam; ?></h3>
								<span class="text-uppercase text-size-mini">total peminjam</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="panel panel-body bg-indigo-400 has-bg-image">
						<div class="media no-margin">
							<div class="media-left media-middle">
								<i class="icon-enter6 icon-3x opacity-75"></i>
							</div>

							<div class="media-body text-right">
								<h3 class="no-margin"><?= $total_kembali ?></h3>
								<span class="text-uppercase text-size-mini">total pengembalian</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tabbable panel width-400">

				<div class="tab-content panel-body">
					<div class="tab-pane fade in active" id="basic-tab1">
						<div class="panel-heading">
							<h6 class="panel-title"><i class="text-warning icon-spinner9 spinner"></i> - Pengunjung Perpustakaan Hari Ini</h6>
						</div>

						<div class="panel-body">
							<table class="table datatable-responsive-row-control">
								<thead> 
									<tr> <th></th> <th>No</th> <th>Nis Siswa</th> <th>Nama Siswa</th> <th>Tanggal</th> </tr> 
								</thead> 
								<tbody>
									<?php $no = 1; foreach ($kunjungan as $d) : ?> <tr> <td></td> <td><?= $no++ ?></td> <td><?= $d['nis'] ?></td> <td><?= $d['nama_lengkap'] ?></td> <td><?= tgl_indo($d['tgl_kunjungan']) ?></td> </tr> <?php endforeach; ?> 
								</tbody> 
							</table>
						</div>
					</div>

					<div class="tab-pane fade" id="basic-tab2">
						<div class="text-center">
							<div class="profile-cover thumbnail" data-popup="tooltip" title="Foto tidak bisa dihapus!">
								<div class="thumb thumb-rounded thumb-slide" style="width: 120px; height: 120px">
									<img style="height: 120px; width: 120px;" src="<?= base_url('/public/user/foto/'.$this->session->userdata('user_login')->foto)?>" alt="foto_siswa">
									<div class="caption">
										<span>
											<a href="javascript:void(0)" disabled class="btn bg-warning-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-trash"></i></a>
										</span>
									</div>
								</div>

								<div class="caption text-center">
									<h5 class="content-group"><?= $this->session->userdata('user_login')->nama_lengkap ?> <small class="display-block text-indigo-400"><?= $this->session->userdata('user_login')->role ?></small></h5>
								</div>
							</div>
						</div>
						<fieldset>
							<div class="form-group">
								<label class="control-label text-semibold">Tanggal Lahir :</label>
								<input type="text" readonly class="form-control" name="alamat" value="<?= tgl_indo($this->session->userdata('user_login')->tgl_lahir) ?>"> 
							</div>
							<div class="form-group">
								<label class="control-label text-semibold">Alamat Lengkap :</label>
								<input type="text" readonly class="form-control" name="alamat" value="<?= $this->session->userdata('user_login')->alamat ?>"> 
							</div>
						</fieldset>
					</div>
				</div>

				<ul class="nav nav-tabs nav-justified">
					<li class="active"> 
						<a style="cursor: pointer;" href="#basic-tab1" title="Data Kunjungan Siswa" data-toggle="tab"> <h6 class="text-bold"> <i class="icon-table2"></i> <p class="visible-xs-block">Data Pengunjung Perpustakaan</p> </h6> </a> 
					</li> 
					<li>
						<a style="cursor: pointer;" href="#basic-tab2" title="Profile Pengguna" data-toggle="tab"><h6 class="text-bold"><i class="icon-user-lock"></i> <p class="visible-xs-block">Profile Saya</p> </h6></a>
					</li>
				</ul>

			</div>
			
		</div>
	</div>
</div>