<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Buku_model', 'bm');
		$this->load->model('User_model', 'um');
		$this->load->model('Laporan_model', 'lm');
		$this->load->model('Auth_model', 'am');
		$this->load->model('Aktivitas_model', 'ak');
		if ($this->session->userdata('user_login')->login_hash != '1') {
			redirect('Siswa/Dashboard');
		}
	}

	public function index()
	{
		$send = array(
			'total_user' => $this->um->ambilData()->num_rows(), 
			'total_buku' => $this->bm->ambilData()->num_rows(), 
			'total_peminjam' => $this->ak->ambilPeminjam()->num_rows(), 
			'total_kembali' => $this->ak->ambilPengembalian()->num_rows(), 
			'kunjungan' => $this->lm->dataHariIni()->result_array(), 
		);

		return $this->template->load('Template', 'Admin/Dashboard', $send);
	}
}
