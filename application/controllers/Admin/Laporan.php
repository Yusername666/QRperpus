<?php 
/**
 * 
 */
class Laporan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_model', 'lm');
		$this->load->model('Auth_model', 'am');
		if ($this->session->userdata('user_login')->login_hash != '1') {
			redirect('Siswa/Dashboard');
		}
	}

	public function laporanKunjungan()
	{
		$kunjungan = $this->lm;
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');
		if (!isset($awal) && !isset($akhir) || $awal == '' && $akhir == '') {
			$send['data'] = $kunjungan->ambilKunjungan()->result_array();
		} else {
			$send['data'] = $kunjungan->kunjunganFilterDate($awal, $akhir)->result_array();
		}
		return $this->template->load('Template','Admin/Laporan/Laporan_kunjungan', $send);
	}

	public function laporanDenda()
	{
		return $this->template->load('Template','Admin/Laporan/Laporan_denda');
	}
	
	public function laporanPerpus()
	{
		$aktivitas = $this->lm;
		$post = $this->input->post();
		if ($post) {
			$send['data'] = $aktivitas->ambilAktivitas()->result_array();
		} else {
			$send['data'] = $aktivitas->ambilAktivitas()->result_array();
		}
		return $this->template->load('Template','Admin/Laporan/Laporan_perpus', $send);
	}

}
?>