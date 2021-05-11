<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'am');
		$this->load->model('User_model', 'um');
		$this->load->model('Aktivitas_model', 'ak');
		if ($this->am->cek_status()) {
			redirect('Auth/logout');
		}
	}
	public function index()
	{
		$send = array(
			'total_peminjaman' => $this->ak->ambilPeminjamanSiswa()->num_rows(), 
			'total_pengembalian' => $this->ak->ambilPengembalianSiswa()->num_rows(), 
			'total_kunjungan' => $this->ak->ambilKunjunganSiswa()->num_rows(), 
			'info' => $this->ak->ambilInfo()->result_array(),
		);
		$this->template->load('Template', 'Siswa/Dashboard', $send);
	}

	public function resetPassword($nis)
	{
		$user = $this->um;
		$post = $this->input->post();
		if (!isset($nis)) {
			show_404();
		}
		if ($post) {
			if ($user->ubahPassword($nis)) {
				$this->session->set_flashdata('success', 'Password Berhasil Di Ubah!');
				echo json_encode(array('status' => TRUE));
			} else {
				$this->session->set_flashdata('error', 'Password Gagal Di Ubah!');
			}
		} else {
			$this->session->set_flashdata('error', 'Something Wrong!');
		} 
	}
}
