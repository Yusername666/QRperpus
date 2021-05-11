<div class="panel panel-white">
	<div class="panel-heading">
		<h6 class="panel-title">Dashboard Siswa</h6>
		<div class="heading-elements">
			<ul class="icons-list">
				<li><a data-action="collapse" data-popup="tooltip" title="Collapse"></a></li>
				<li><a data-action="reload" data-popup="tooltip" title="Reload"></a></li>
				<li><a data-action="close" data-popup="tooltip" title="Close"></a></li>
			</ul>
		</div>
	</div>

	<div class="panel-body">

		<div class="row">
			<div class="col-sm-4 col-md-4">
				<div class="panel panel-body bg-danger-400 has-bg-image">
					<div class="media no-margin">
						<div class="media-body">
							<h3 class="no-margin"><?= $total_kunjungan ?></h3>
							<span class="text-uppercase text-size-mini">total kunjungan</span>
						</div>

						<div class="media-right media-middle">
							<i class="icon-library2 icon-3x opacity-75"></i>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-4 col-md-4">
				<div class="panel panel-body bg-success-400 has-bg-image">
					<div class="media no-margin">
						<div class="media-left media-middle">
							<i class="icon-esc icon-3x opacity-75"></i>
						</div>

						<div class="media-body text-right">
							<h3 class="no-margin"><?= $total_pengembalian ?></h3>
							<span class="text-uppercase text-size-mini">buku dikembalikan</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-4 col-md-4">
				<div class="panel panel-body bg-indigo-400 has-bg-image">
					<div class="media no-margin">
						<div class="media-left media-middle">
							<i class="icon-enter6 icon-3x opacity-75"></i>
						</div>

						<div class="media-body text-right">
							<h3 class="no-margin"><?= $total_peminjaman ?></h3>
							<span class="text-uppercase text-size-mini">buku dipinjam</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tabbable panel width-400">

			<div class="tab-content panel-body">
				<div class="tab-pane fade in active" id="basic-tab1">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="text-primary icon-books"></i> - Data Buku Dipinjam</h6>
					</div>

					<div class="panel-body">
						<table class="table datatable-responsive-row-control">
							<thead> 
								<tr> <th></th> <th class="text-bold text-center">Sampul</th> <th class="text-bold text-center">Judul Buku</th> <th class="text-bold text-center">Tanggal Harus Kembali</th> <th class="text-bold text-center">Status</th> </tr> 
							</thead> 
							<tbody>
								<?php $no = 1; foreach ($info as $d) : ?> <tr class="text-center"> <td></td> <td><img style="height: 60px; width: 60px;" src="<?= base_url('/public/buku/sampul/'.$d['sampul'])?>" alt="sampul_buku"></td> <td><?= $d['judul_buku'] ?></td> <td><?= tgl_indo($d['tgl_kembali']) ?></td> <td><span class="label <?php if($d['status']=='Belum Kembali') { echo('label-danger')?>	<?php } elseif($d['status']=='Perpanjangan'){ echo('label-warning') ?> <?php } elseif($d['status']=='Sudah Kembali') { echo('label-success') ?> <?php } ?>"> <?= $d['status'] ?> </span></td> </tr> <?php endforeach; ?> 
							</tbody>
						</table>
					</div>
				</div>

				<div class="tab-pane fade" id="basic-tab2">
					<form class="form-horizontal form-validate-jquery" action="javascript:void(0)" method="post" id="form" name="form">
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

							<!-- Password field -->
							<div class="form-group">
								<label class="control-label col-lg-3">Password field <span class="text-danger">*</span></label>
								<div class="col-lg-9">
									<input type="password" name="password" id="password" class="form-control" required="required" placeholder="Masukan Password Baru...">
								</div>
							</div>
							<!-- /password field -->

							<!-- Repeat password -->
							<div class="form-group">
								<label class="control-label col-lg-3">Repeat password <span class="text-danger">*</span></label>
								<div class="col-lg-9">
									<input type="password" id="repeat_password" name="repeat_password" class="form-control" required="required" placeholder="Input Ulang Password Baru...">
								</div>
							</div>
							<!-- /repeat password -->

							<button type="submit" onclick="ubahPassword('<?= $this->session->userdata('user_login')->nis ?>')" class="btn bg-success-400 btn-block">Ubah Password <i class="icon-circle-right2 position-right"></i></button>

						</fieldset>

					</form>
				</div>
			</div>

			<ul class="nav nav-tabs nav-justified">
				<li class="active"> 
					<a style="cursor: pointer;" href="#basic-tab1" title="Data Kunjungan Siswa" data-toggle="tab"> <h6 class="text-bold"> <i class="icon-table2"></i> <p class="visible-xs-block">Data Pengunjung Perpustakaan</p> </h6> </a> 
				</li> 
				<li>
					<a style="cursor: pointer;" href="#basic-tab2" title="Pengaturan Pengguna" data-toggle="tab"><h6 class="text-bold"><i class="icon-user-lock"></i> <p class="visible-xs-block">Profile Saya</p> </h6></a>
				</li>
			</ul>

		</div>
	</div>
</div>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
		var validator = $(".form-validate-jquery").validate({
			errorClass: 'validation-error-label',
			successClass: 'validation-valid-label',
			highlight: function(element, errorClass) {
				$(element).removeClass(errorClass);
			},
			unhighlight: function(element, errorClass) {
				$(element).removeClass(errorClass);
			},

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Input group, styled file input
            if (element.parents().hasClass('input-group')) {
            	error.appendTo( element.parent().parent() );
            } else {
            	error.insertAfter(element);
            }
        },

        validClass: "validation-valid-label",
        success: function(label) {
        	label.addClass("validation-valid-label").text("Success.")
        },
        rules: {
        	password: {
        		minlength: 6
        	},
        	repeat_password: {
        		equalTo: "#password"
        	},
        },
    });
	})
</script>