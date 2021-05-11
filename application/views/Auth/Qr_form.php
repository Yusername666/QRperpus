<link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet"type="text/css">

<div class="container-fluid" id="QR-Code">
	<div class="tabbable panel">
		<ul class="nav nav-tabs nav-justified">
			<li class="active"> 
				<a style="cursor: pointer;" href="#basic-tab1" title="QR-Scan" data-toggle="tab"> <h6 class="text-bold"> <i class="icon-qrcode"></i> </h6> </a> 
			</li> 
			<li>
				<a style="cursor: pointer;" href="#basic-tab2" title="Pengaturan" data-toggle="tab"><h6 class="text-bold"><i class="icon-cogs"></i></h6></a>
			</li>
		</ul>
		<div class="tab-content panel-body">
			<div class="tab-pane fade in active" id="basic-tab1">
				<div class="thumb thumb-square">
					<div class="well" style="position: relative;display: inline-block;">
						<canvas width="320" height="240" id="webcodecam-canvas"></canvas>
						<div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
						<div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
						<div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
						<div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
					</div>
					<div class="caption-overflow">
						<span>
							<button title="Play" class="btn border-white text-white btn-flat btn-icon btn-rounded btn-xs" id="play" type="button" data-toggle="tooltip"><i class="text-success icon-play3"></i></button>
							<button title="Pause" class="btn border-white text-white btn-flat btn-icon btn-rounded btn-xs" id="pause" type="button" data-toggle="tooltip"><i class="text-warning icon-pause"></i></button>
							<button title="Stop streams" class="btn border-white text-white btn-flat btn-icon btn-rounded btn-xs" id="stop" type="button" data-toggle="tooltip"><i class="text-danger icon-stop"></i></button>
						</span>
					</div>
				</div>
				<div class="content-divider text-muted form-group"><span>Scanned result :</span></div>
				<div class="caption">
					<div id="pesan-hasil"></div>
					<h6 class="content-group text-center text-semibold no-margin-top">
						<small id="scanned-QR" class="display-block"></small> 
					</h6> 
				</div>
			</div>
			<div class="tab-pane fade" id="basic-tab2">
				<div class="panel-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-camera"></i></span>
						<select class="form-control" id="camera-select"></select>
						<input id="image-url" style="display:none" type="text" class="form-control" placeholder="Image url">
					</div>
					<br>
					<label id="zoom-value" width="100">Zoom: 2</label>
					<input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
					<label id="brightness-value" width="100">Brightness: 0</label>
					<input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
					<label id="contrast-value" width="100">Contrast: 0</label>
					<input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
					<label id="threshold-value" width="100">Threshold: 0</label>
					<input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
					<div class="card" style="display: none;">
						<div class="form-group">
							<hr>
							<center>
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
							</center>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- hidden-form -->
<div class="row" style="display:none">
	<div class="col-md-12">
		<div class="panel panel-info">


			<div class="panel-body">
				<div class="col-md-6">
					<center>
						<div class="form-group" style="display:none">
							<button title="Decode Image" style="display:none" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><i class="icon-upload"></i></button>
							<button title="Image shoot" style="display:none" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><i class="icon-picture"></i></button>
						</div>
					</center>
				</div>
				<div class="col-md-6">

				</div>
			</div>
			<hr>
			<div class="thumbnail" style="display:none" id="result">
				<div class="well" style="overflow: hidden;">
					<img width="320" height="240" id="scanned-img" src="">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?= base_url('assets/scanner'); ?>/js/filereader.js"></script>
<script type="text/javascript" src="<?= base_url('assets/scanner'); ?>/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?= base_url('assets/scanner'); ?>/js/webcodecamjs.js"></script>
<script type="text/javascript" src="<?= base_url('assets/scanner'); ?>/js/presensi.js"></script>
