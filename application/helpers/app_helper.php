<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

function alertsuccess($pesan)
{
	$ci =& get_instance();
	return $ci->session->set_flashdata("pesan","<script>document.onload = setTimeout(function () {Command: toastr['success']('".$pesan."', 'SELAMAT !!!!')
		toastr.options = {'closeButton': false,'debug': false,'newestOnTop': false,'progressBar': false,'positionClass': 'toast-bottom-right','preventDuplicates': false,'showDuration': '300','hideDuration': '1000','timeOut': '5000','extendedTimeOut': '1000','showEasing': 'easeOutBounce','hideEasing': 'easeInBack','showMethod': 'slideDown','hideMethod': 'slideUp'}}, 0);</script>");
}
function alerterror($pesan)
{
	$ci =& get_instance();
	return $ci->session->set_flashdata("pesan","<script>document.onload = setTimeout(function () {Command: toastr['error']('".$pesan."', 'MAAF !!!!')
		toastr.options = {'closeButton': false,'debug': false,'newestOnTop': false,'progressBar': false,'positionClass': 'toast-bottom-right','preventDuplicates': false,'showDuration': '300','hideDuration': '1000','timeOut': '5000','extendedTimeOut': '1000','showEasing': 'easeOutBounce','hideEasing': 'easeInBack','showMethod': 'slideDown','hideMethod': 'slideUp'}}, 0);</script>");
}

function ambil_satu_colom($table, $array)
{
	$ci =& get_instance();
	return $ci->db->get_where($table, $array);
}

function ceksession()
{
	$ci =& get_instance();
	$base_url = base_url();
	if ($ci->session->userdata($base_url.'nip_baru')==null || $ci->session->userdata($base_url.'nama_pegawai')==null || $ci->session->userdata($base_url.'id_opd')==null || $ci->session->userdata($base_url.'eselon')==null  || $ci->session->userdata($base_url.'jenis_kelamin')==null || $ci->session->userdata($base_url.'id_pegawai_jabatan_dinas')==null || $ci->session->userdata($base_url.'level_user_dinas')==null || $ci->session->userdata($base_url.'jenis_jabatan_dinas')==null || $ci->session->userdata($base_url.'id_pegawai_jabatan_plt')==null || $ci->session->userdata($base_url.'level_user_plt')==null || $ci->session->userdata($base_url.'jenis_jabatan_plt')==null || $ci->session->userdata($base_url.'id_pegawai_jabatan_plh')==null || $ci->session->userdata($base_url.'level_user_plh')==null || $ci->session->userdata($base_url.'jenis_jabatan_plh')==null) {
		$base_url = base_url();
		$ci->session->unset_userdata($base_url.'nip_baru');
		$ci->session->unset_userdata($base_url.'nama_pegawai');
		$ci->session->unset_userdata($base_url.'id_opd');
		$ci->session->unset_userdata($base_url.'eselon');
		$ci->session->unset_userdata($base_url.'jenis_kelamin');
		$ci->session->unset_userdata($base_url.'id_pegawai_jabatan_dinas');
		$ci->session->unset_userdata($base_url.'level_user_dinas');
		$ci->session->unset_userdata($base_url.'jenis_jabatan_dinas');
		$ci->session->unset_userdata($base_url.'id_pegawai_jabatan_plt');
		$ci->session->unset_userdata($base_url.'level_user_plt');
		$ci->session->unset_userdata($base_url.'jenis_jabatan_plt');
		$ci->session->unset_userdata($base_url.'id_pegawai_jabatan_plh');
		$ci->session->unset_userdata($base_url.'level_user_plh');
		$ci->session->unset_userdata($base_url.'jenis_jabatan_plh');
		$ci->session->unset_userdata($base_url.'status');
		return FALSE;
	}else{			
		if (dekrip($ci->session->userdata($base_url.'status'))!=="SIJAKA-BKPPD-KOTA-PEKALONGAN") {
			$base_url = base_url();
			$ci->session->unset_userdata($base_url.'nip_baru');
			$ci->session->unset_userdata($base_url.'nama_pegawai');
			$ci->session->unset_userdata($base_url.'id_opd');
			$ci->session->unset_userdata($base_url.'eselon');
			$ci->session->unset_userdata($base_url.'jenis_kelamin');
			$ci->session->unset_userdata($base_url.'id_pegawai_jabatan_dinas');
			$ci->session->unset_userdata($base_url.'level_user_dinas');
			$ci->session->unset_userdata($base_url.'jenis_jabatan_dinas');
			$ci->session->unset_userdata($base_url.'id_pegawai_jabatan_plt');
			$ci->session->unset_userdata($base_url.'level_user_plt');
			$ci->session->unset_userdata($base_url.'jenis_jabatan_plt');
			$ci->session->unset_userdata($base_url.'id_pegawai_jabatan_plh');
			$ci->session->unset_userdata($base_url.'level_user_plh');
			$ci->session->unset_userdata($base_url.'jenis_jabatan_plh');
			$ci->session->unset_userdata($base_url.'status');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
function kode_otomatis($kode_inisial)
{
	$ci 			=& get_instance();
	// $total 			= $ci->db->get($tabel)->num_rows();
 //    $kode_hari 		= date('YmdHis');
 //    $totall			= ++$total;
 //    $kode_jadi		= $kode_hari+$totall;
    return $kode_inisial.''.$ci->uuid->v4();
}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal); 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function rupiah($d)
{
	return 'Rp.'.number_format($d,0,',','.').'.-';
}
function tgl_indo_to_database($string)
{
	$satu = explode('-',$string);
	return $satu[2].'-'.$satu[1].'-'.$satu[0];	
}