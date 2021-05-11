<link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet"type="text/css">

<button class="btn btn-lg btn-rounded text-primary" onclick="topFunction()" id="myBtn" title="Pergi Ke Atas"><i class="icon-circle-up2"></i></button>

<div id="pesan-hasil"></div>
<div class="caption">
	<h3 style="display:none;">Scanned result</h3>
	<p style="display: none;" id="scanned-QR"></p>
</div>
<div class="container-fluid">
	<div class="content-group header-demo">
		<div class="page-header page-header-default">
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="javascript:void(0)"><i class="active icon-menu2 position-left"></i> Peminjaman Buku</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="container-fluid" id="QR-Code">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-qrcode"></i> - QRcode Scanner</h6>
					<div class="heading-elements">
						<div class="btn-group">
							<button class="btn btn-warning" onclick="scanSiswa()" title="Scan QRcode Siswa"><i class="icon-users"></i></button>
							<button class="btn btn-warning" onclick="scanBuku()" title="Scan QRcode Buku"><i class="icon-books"></i></button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<center>
						<div class="input-group" style="margin-bottom: 5px;margin-top: -20px">
							<span class="input-group-addon"><i class="icon-camera"></i></span>
							<select class="form-control" id="camera-select"></select>
							<input id="image-url" style="display:none" type="text" class="form-control" placeholder="Image url">
						</div>
						<div class="well" style="position: relative;display: inline-block;">
							<canvas width="320" height="240" id="webcodecam-canvas"></canvas>
							<div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
							<div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
							<div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
							<div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
						</div>
						<div class="form-group" style="margin-top: 5px; margin-bottom: -12px">
							<button title="Decode Image" style="display:none" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="icon-upload"></span></button>
							<button title="Image shoot" style="display:none" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="icon-picture"></span></button>
							<button title="Play" class="btn btn-default btn-lg btn-rounded" id="play" type="button" data-toggle="tooltip"><span class="text-success icon-play3"></span></button>
							<button title="Pause" class="btn btn-default btn-lg btn-rounded" id="pause" type="button" data-toggle="tooltip"><span class="text-warning icon-pause"></span></button>
							<button title="Stop streams" class="btn btn-default btn-lg btn-rounded" id="stop" type="button" data-toggle="tooltip"><span class="text-danger icon-stop"></span></button>
						</div>
					</center>
				</div>
				<div class="pajangan" style="display:none">
					<div class="thumbnail" style="display:none" id="result">
						<div class="well" style="overflow: hidden;">
							<img width="320" height="240" id="scanned-img" src="">
						</div>
					</div>

					<div class="panel-body">
						<div style="display:none">
							<label id="zoom-value"  width="100">Zoom: 2</label>
							<input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
							<label id="brightness-value" width="100">Brightness: 0</label>
							<input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
							<label id="contrast-value" width="100">Contrast: 0</label>
							<input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
							<label id="threshold-value" width="100">Threshold: 0</label>
							<input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
						</div>
						<div class="card" style="display:none">
							<div class="form-group">
								<hr>
								<center>
									<div class="row">
										<div class="col-md-6">
											<div class="table-responsive">
												<table class="table">
													<tr>
														<td>
															<div class="input-group">
																<input type="checkbox" class="switchery" id="sharpness" onchange="Page.changeSharpness();">
																<label id="sharpness-value" class="text-bold">
																	Sharpness : off
																</label>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="input-group">
																<input type="checkbox" class="switchery" id="grayscale" onchange="Page.changeGrayscale();">
																<label id="grayscale-value" class="text-bold">
																	Grayscale : off
																</label>
															</div>
														</td>
													</tr>
												</table>
											</div>
										</div>
										<div class="col-md-6">
											<div class="table-responsive">
												<table class="table">
													<tr>
														<td>
															<div class="input-group">
																<input type="checkbox" class="switchery" id="flipVertical" onchange="Page.changeVertical();">
																<label id="flipVertical-value" class="text-bold">
																	Flip Vertical : off
																</label>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="input-group">
																<input type="checkbox" class="switchery" id="flipHorizontal" onchange="Page.changeHorizontal();">
																<label id="flipHorizontal-value" class="text-bold">
																	Flip Horizontal : off
																</label>
															</div>
														</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</center>
								<hr>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-book"></i> - Data Buku</h6>
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="collapse"></a></li>
						</ul>
					</div>
				</div>
				<div class="panel">
					<form action="javascript:void(0)" id="dataBuku" name="dataBuku" method="post" onsubmit="return validateForm()">
						<div class="panel-body">
							<div style="margin-top: 10px">
								<div class="form-group has-feedback has-feedback-left">
									<label class="control-label text-semibold">Kode Inventaris Buku</label>
									<input style="cursor: default;" type="number" class="form-control"id="kd_inventaris" name="kd_inventaris" min="0" placeholder="Kode Inventaris Buku...." readonly required="required">
									<div class="form-control-feedback">
										<i class="icon-circle-right2 text-muted"></i>
									</div>
								</div>
								<div class="form-group has-feedback has-feedback-left">
									<label class="control-label text-semibold">Judul Buku</label>
									<input style="cursor: default;" type="text" class="form-control" id="judul_buku" name="judul_buku" min="0" placeholder="Judul Buku...." readonly required="required">
									<div class="form-control-feedback">
										<i class="icon-circle-right2 text-muted"></i>
									</div>
								</div>
								<div class="form-group has-feedback has-feedback-left">
									<label class="control-label text-semibold">ISBN Buku</label>
									<input style="cursor: default;" type="number" class="form-control"id="isbn" name="isbn" min="0" placeholder="ISBN Buku...." readonly required="required"> 
									<div class="form-control-feedback">
										<i class="icon-circle-right2 text-muted"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="text-center" style="margin-top: 10px;margin-bottom: 10px">
								<button type="reset" value="reset" class="btn btn-danger btn-labeled btn-rounded text-white text-right"><b><i class="icon-cancel-circle2"></i></b> Batal</button>

								<button type="submit" value="submit" id="add" class="add_cart isDisable btn btn-primary btn-labeled btn-rounded text-white text-right"><b><i class="icon-arrow-right14"></i></b> Tambah</button> 
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<form action="javascript:void(0)" method="post" name="dataPeminjam" id="dataPeminjam">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h6 class="panel-title"><i class="icon-library2"></i> - Data Peminjaman Buku</h6>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
					</ul>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h6 class="panel-title"><i class="icon-books"></i> - List Buku</h6>
								<div class="heading-elements">
									<ul class="icons-list">
										<li><a data-action="collapse"></a></li>
									</ul>
								</div>
							</div>
							<div class="panel-body">
								<div class="table-responsive pre-scrollable">
									<table class="table table-framed">
										<thead>
											<tr>
												<th></th>
												<th>Kode</th>
												<th>Judul</th>
												<th>ISBN</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="detail_cart">

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h6 class="panel-title"><i class="icon-vcard"></i> - Peminjam Buku</h6>
								<div class="heading-elements">
									<ul class="icons-list">
										<li><a data-action="collapse"></a></li>
									</ul>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label text-semibold">NIS</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-circle-right2 text-muted"></i></span>
												<input style="cursor: default;" type="number" class="form-control"id="nis" name="nis" min="0" placeholder="NIS Peminjaman...." readonly> 
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label text-semibold">NAMA LENGKAP</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-circle-right2 text-muted"></i></span>
												<input style="cursor: default;" type="text" class="form-control"id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap...." readonly> 
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label text-semibold">Tanggal Peminjaman</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-circle-right2 text-muted"></i></span>
												<input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label text-semibold">Tanggal Kembali</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-circle-right2 text-muted"></i></span>
												<input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="text-right">
					<button type="submit" value="submit" class="save btn btn-success btn-labeled btn-rounded text-white text-right"><b><i class="icon-arrow-right14"></i></b> Simpan Data</button> 
				</div>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript" src="<?= base_url('assets/scanner'); ?>/js/filereader.js"></script>
<script type="text/javascript" src="<?= base_url('assets/scanner'); ?>/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?= base_url('assets/scanner'); ?>/js/webcodecamjs.js"></script>
<script type="text/javascript" src="<?= base_url('assets/scanner'); ?>/js/scan.js"></script>