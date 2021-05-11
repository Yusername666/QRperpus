<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="refresh" content="3600">
  <meta charset="utf-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if($this->input->post('awal') && $this->input->post('awal')){ ?> 
    <title>
      Laporan Sistem Informasi Perpustakaan
      Periode <?= tgl_indo($this->input->post('awal')) ?> s/d <?= tgl_indo($this->input->post('akhir')) ?>
    </title> 
  <?php } else { ?> <title> SIPerpus - MAN 01 Pekalongan </title> <?php } ?>
  <link rel="shortcut icon"href="<?php echo base_url('global_assets/images/signature.png'); ?>">
  <script src="<?php echo base_url('global_assets/js/core/libraries/jquery.min.js'); ?>"> </script> 

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('global_assets/css/icons/icomoon/styles.css'); ?>"rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"type="text/css">
  <link href="<?php echo base_url('assets/css/core.min.css'); ?>" rel="stylesheet"type="text/css">
  <link href="<?php echo base_url('assets/css/components.min.css'); ?>"rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/colors.min.css'); ?>" rel="stylesheet"type="text/css">
  <link href="<?php echo base_url('assets/less/toastr/toastr.min.css') ?>" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script src="<?php echo base_url('global_assets/js/plugins/forms/validation/validate.min.js') ?>"></script>
  <script src="<?php echo base_url('/global_assets/js/plugins/forms/validation/localization/messages_id.js') ?>"></script>
  <script src="<?php echo base_url('global_assets/js/demo_pages/form_inputs.js') ?>" defer></script>
  <script src="<?php echo base_url('global_assets/js/plugins/loaders/pace.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/core/libraries/bootstrap.min.js'); ?>" defer> </script> 
  <script src="<?php echo base_url('global_assets/js/plugins/loaders/blockui.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/ui/nicescroll.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/ui/drilldown.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/ui/fab.min.js'); ?>" defer> </script> 
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="<?php echo base_url('assets/less/toastr/toastr.min.js'); ?>"></script>
  <script src="<?php echo base_url('global_assets/js/plugins/visualization/d3/d3.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/visualization/d3/d3_tooltip.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/forms/styling/switchery.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/ui/moment/moment.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/pickers/daterangepicker.js'); ?>" defer> </script>
  <script src="<?php echo base_url('assets/less/sweetalert/sweetalert2.all.js'); ?>" defer> </script>
  <script src="<?php echo base_url('assets/less/sweetalert/sweetalert2.all.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/forms/styling/uniform.min.js'); ?>" defer> </script>
  <!-- <script src="<?php echo base_url('global_assets/js/plugins/notifications/pnotify.min.js'); ?>" defer> </script> -->
  <script src="<?php echo base_url('global_assets/js/plugins/forms/selects/select2.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/demo_pages/form_select2.js'); ?>" defer></script>
  <script src="<?php echo base_url('global_assets/js/plugins/tables/datatables/datatables.min.js'); ?>"> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/tables/datatables/extensions/responsive.min.js'); ?>"> </script>
  <script src="<?php echo base_url('global_assets/js/demo_pages/datatables_responsive.js'); ?>"> </script>
  <script src="<?php echo base_url('global_assets/js/demo_pages/datatables_basic.js'); ?>"> </script>
  <script src="<?php echo base_url('assets/js/bootstrap-maxlength.js'); ?>" defer></script>
  <script src="<?php echo base_url('assets/js/app.js'); ?>" defer></script>
  <script src="<?php echo base_url('global_assets/js/core/libraries/jquery_ui/interactions.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/ui/ripple.min.js'); ?>" defer> </script>
  <!-- /theme JS files -->

  <!-- exportDatatable JS files -->
  <script src="<?php echo base_url('global_assets/js/plugins/tables/datatables/extensions/buttons.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/plugins/tables/datatables/extensions/buttons.min.js'); ?>" defer> </script>
  <script src="<?php echo base_url('global_assets/js/demo_pages/datatables_extension_buttons_html5.js'); ?>" defer> </script>
  <!-- /exportDatatable JS files -->

  <script type="text/javascript">
    <?php
    $alertSuccess = $this->session->flashdata('success');
    if ($alertSuccess) { ?>
     $(document).ready(function() {
      toastr["success"]("<?= $this->session->flashdata('success') ?>", "Success")
      toastr.options = {
       "closeButton": true,
       "debug": true,
       "newestOnTop": true,
       "progressBar": true,
       "positionClass": "toast-top-right",
       "preventDuplicates": true,
       "onclick": null,
       "showDuration": "300",
       "hideDuration": "1000",
       "timeOut": "5000",
       "extendedTimeOut": "1000",
       "showEasing": "swing",
       "hideEasing": "linear",
       "showMethod": "fadeIn",
       "hideMethod": "fadeOut"
     }
   })
   <?php }
   ?>
 </script>

 <script type="text/javascript">
  <?php
  $alertWarning = $this->session->flashdata('warning');
  if ($alertWarning) { ?>
   $(document).ready(function() {
    toastr["warning"]("<?= $this->session->flashdata('warning') ?>", "Warning")
    toastr.options = {
     "closeButton": true,
     "debug": true,
     "newestOnTop": true,
     "progressBar": true,
     "positionClass": "toast-top-right",
     "preventDuplicates": true,
     "onclick": null,
     "showDuration": "300",
     "hideDuration": "1000",
     "timeOut": "5000",
     "extendedTimeOut": "1000",
     "showEasing": "swing",
     "hideEasing": "linear",
     "showMethod": "fadeIn",
     "hideMethod": "fadeOut"
   }
 })
 <?php }
 ?>
</script>
</head>

<body class="navbar-bottom">
  <!-- Page header -->
  <div class="page-header page-header-inverse bg-blue-400 has-bg-image">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse navbar-transparent">
      <div class="navbar-header">
        <a class="navbar-brand" href="javascript:void(0)"><span
          class="btn btn-sm bg-blue btn-labeled btn-rounded text-white"><b><i
            class=" icon-qrcode"></i></b>
            <h7 class="font-weight-bold text-bold">SIPerpus - MAN 1 PEKALONGAN</h7>
          </span></a>

          <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-grid3"></i></a></li>
          </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
          <!-- <ul class="nav navbar-nav"></ul> -->
          <div class="navbar-right">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-cog4 spinner"></i>
                  <span class="visible-xs-inline-block position-right">Settings</span>
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li>
                    <a href="#">
                      <i class="icon-user text-indigo-400"></i>
                      <?= $this->session->userdata('user_login')->nama_lengkap ?>
                    </a>
                  </li>
                  <li>
                    <a href="#" onclick="logout()">
                      <i class="icon-switch2 text-danger"></i> LOGOUT
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /main navbar -->

      <!-- Page header content -->
      <div class="page-header-content" style="margin-bottom: 20px;margin-top: 10px;">

        <div style="display: none;" class="page-title">
          <h1 class="text-bold">
            <i class="status-mark status-mark-inline border-info position-left"></i> 
            <i class="status-mark status-mark-inline border-info position-left"></i> 
          </h1>
        </div>

        <div  class="heading-elements" style="margin-right: 14px;">
          <ul class="breadcrumb heading-text">
            <li><a href="#"><i class="icon-spinner4 spinner position-left text-warning"></i> <b id="clock"></b></a></li>
            <li><a href="#"><b ><?= tgl_indo(date('Y-m-d')) ?></b></a></li>
          </ul>
        </div>
      </div>
      <!-- /page header content -->

      <!-- Second navbar -->
      <div class="navbar navbar-inverse navbar-transparent" id="navbar-second">
        <ul class="nav navbar-nav visible-xs-block">
          <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i
            class="icon-grid5"></i></a></li>
          </ul>

          <div class="navbar-collapse collapse" id="navbar-second-toggle">
            <?php if ($this->session->userdata('user_login')->login_hash != 2) { ?>
              <ul class="nav navbar-nav navbar-nav-material">

                <li class="<?php if ($this->uri->segment(2) == 'Dashboard') {echo 'active'; } ?>"><a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a></li>

                <li class="<?php if ($this->uri->segment(2) == 'Kelola_user') {echo 'active'; } ?>"><a href="<?= base_url('Admin/Kelola_user') ?>">Kelola User</a></li>

                <li class="<?php if ($this->uri->segment(2) == 'Kelola_buku' || $this->uri->segment(2) == 'Klasifikasi_buku') {echo 'active'; } ?>"><a href="<?= base_url('Admin/Kelola_buku') ?>">Kelola Buku</a></li>

                <li class="dropdown">

                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Aktivitas <span
                  class="visible-xs-block caret"></span></a>
                  <ul class="dropdown-menu width-250">

                    <li class="<?php if ($this->uri->segment(2) == 'Peminjaman' && $this->uri->segment(3) == '') {echo 'active'; } ?>"><a href="<?= base_url('Admin/Peminjaman') ?>"><i class="icon-menu2"></i> Peminjaman Buku</a></li>

                    <li class="<?php if ($this->uri->segment(2) == 'Peminjaman' && $this->uri->segment(3) == 'listPeminjaman') {echo 'active'; } ?>"><a href="<?= base_url('Admin/Peminjaman/listPeminjaman') ?>"><i class="icon-spinner9 spinner"></i> Data Peminjaman Buku</a></li>

                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <span
                    class="visible-xs-block caret"></span></a>
                    <ul class="dropdown-menu width-250">

                      <li class="<?php if ($this->uri->segment(3) == 'laporanPerpus') {echo 'active'; } ?>"><a href="<?= base_url('Admin/Laporan/laporanPerpus') ?>"><i class="icon-archive"></i> Laporan Perpus</a></li>

                      <li class="<?php if ($this->uri->segment(3) == 'laporanDenda') {echo 'active'; } ?>"><a href="<?= base_url('Admin/Laporan/laporanDenda') ?>"><i class="icon-archive"></i> Laporan Denda</a></li> 

                      <li class="<?php if ($this->uri->segment(3) == 'laporanKunjungan') {
                        echo 'active';
                      } ?>"><a href="<?= base_url('Admin/Laporan/laporanKunjungan') ?>"><i class="icon-archive"></i> Laporan Kunjungan</a></li> 

                    </ul>
                  </li>
                </ul>
              <?php } else { ?>
                <ul class="nav navbar-nav navbar-nav-material">
                  <li class="<?php if ($this->uri->segment(2) == 'Dashboard') {
                    echo 'active';
                  } ?>"><a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a></li>
                </ul>
              <?php } ?>

              <ul class="nav navbar-nav navbar-nav-material navbar-right">
               <li><a href="#"><i
                class="status-mark status-mark-inline border-success-300 position-left"></i>Online <span
                class="icon-feed"></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /second navbar -->
        </div>
        <!-- /page header -->


        <!-- Page container -->
        <div class="page-container">

         <!-- Page content -->
         <div class="page-content">

          <!-- Main content -->
          <div class="content-wrapper">

           <?= $contents ?>

         </div>
         <!-- /main content -->

       </div>
       <!-- /page content -->

     </div>
     <!-- /page container -->
     <div class="text-center">
       <button class="btn btn-xs btn-block text-primary" onclick="topFunction()" id="myBtn" title="Pergi Ke Atas"><i class="icon-circle-up2"></i></button>
     </div>

     <!-- Footer -->
     <div class="navbar navbar-default navbar-fixed-bottom footer">
       <ul class="nav navbar-nav visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i
         class="icon-circle-up2"></i></a></li>
       </ul>


       <div class="navbar-collapse collapse" id="footer">
         <div class="navbar-text">
          &copy;
          <?= date('Y') ?>. <a href="#" class="navbar-link">SIPerpus Web App Kit</a> by <a href="#" class="navbar-link"
          target="_blank">Developer</a>
        </div>

        <div class="navbar-right">
          <ul class="nav navbar-nav">
           <li><a href=""><i class="icon-instagram"></i></a></li>
           <li><a href=""><i class="icon-twitter"></i></a></li>
           <li><a href=""><i class="icon-git"></i></a></li>
         </ul>
       </div>
     </div>
   </div>
   <!-- /footer -->

 </body>

 </html>
 
 <script src="<?php echo base_url('assets/js/main.js'); ?>" defer></script>