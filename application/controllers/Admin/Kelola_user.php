<?php 
/**
 * 
 */
class Kelola_user extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'um');
		$this->load->model('Auth_model', 'am');
		if ($this->session->userdata('user_login')->login_hash != '1') {
			$this->session->set_flashdata('warning', 'Data User Tidak Memiliki Akses!');
			redirect('Siswa/Dashboard');
		}
	}

	public function index()
	{
		$send = array(
			'data' => $this->um->ambilData()->result(), 
		);
		return $this->template->load('Template','Admin/User/User_data', $send);
	}

	public function tambah()
	{
		$user = $this->um;
		$validasi = $this->form_validation;
		$post = $this->input->post();
		$validasi->set_rules($user->rules());
		if ($validasi->run()) {
			if (!isset($post)) {
				show_404();
			} else {
				$user->simpan();
				$this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
				redirect('Admin/Kelola_user');
			}
		}
		$send = array(
			'list' => $user->ambilRole()->result(),
		);
		if (!isset($send)) {
			show_404();
		} else {
			return $this->template->load('Template','Admin/User/User_form', $send);
		}
	}

	public function ubah($nis)
	{
		if (!isset($nis)) {
			redirect('Kelola_user');
		}
		$post = $this->input->post();
		$user = $this->um;
		$validasi = $this->form_validation;
		$validasi->set_rules($user->rules());
		if ($validasi->run()) {
			if (!isset($post)) {
				show_404();
			} else {
				$user->ubah($nis);
				$this->session->set_flashdata('success', 'Data User Berhasil Di Update !');
				redirect('Admin/Kelola_user');
			}
		}
		$send = array(
			'data' => $user->ambilNis($nis)->row(),
			'list' => $user->ambilRole()->result(),
		);
		if (!isset($send)) {
			show_404();
		} else {
			return $this->template->load('Template', 'Admin/User/User_form', $send);
		}
	}

	public function hapus()
	{
		$nis = $this->uri->segment(4);
		if ($this->um->hapus($nis)) {
			json_encode(array('status' => TRUE));
		} else {
			json_encode(array('status' => FALSE));
		}
	}

	public function cekdata_username($username)
	{
		$data = $this->um->val_username(rawurldecode($username))->row();
		if ($data) {
			echo json_encode(array('status' => TRUE));
		} else {
			echo json_encode(array('status' => FALSE));
		}
	}

	public function cekdata_nis($nis)
	{
		$data = $this->um->val_nis(rawurldecode($nis))->row();
		if ($data) {
			echo json_encode(array('status' => TRUE));
		} else {
			echo json_encode(array('status' => FALSE));
		}
	}

	public function QrCard($nis)
	{
		$user = $this->um;
		if ($this->session->userdata('user_login') !== null) {
			if (!isset($nis)) {
				show_404();
			} else {
				$send = array(
					'data' => $user->ambilNis($nis)->row(),
				);
				$this->load->view('Admin/Qr/QrCard', $send);
			}
		} else {
			show_404();
		}
	}

	public function CetakQr()
	{
		if ($this->session->userdata('user_login') !== null) {
			$send = array('data' => $this->um->ambilData()->result());
			return $this->load->view('Admin/Qr/User', $send);
		}
	}
}