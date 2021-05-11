<?php
/**
 * 
 */
class Kelola_buku extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Buku_model', 'bm');
		$this->load->model('Klasifikasi_model', 'km');
		$this->load->model('Auth_model', 'am');
		if ($this->session->userdata('user_login')->login_hash != '1') {
			redirect('Siswa/Dashboard');
		}
	}

	public function index()
	{
		$buku = $this->bm;
		$send = array(
			'data' => $buku->ambilData()->result_array(), 
		);
		return $this->template->load('Template', 'Admin/Buku/Buku_data', $send);
	}

	public function tambah()
	{
		$buku = $this->bm;
		$klasifikasi = $this->km;
		$validasi = $this->form_validation;
		$post = $this->input->post();
		$validasi->set_rules($buku->rules());
		if ($validasi->run()) {
			if (!isset($post)) {
				show_404();
			} else {
				$buku->simpan();
				$this->session->set_flashdata('success', 'Data Buku Berhasil Disimpan!');
				redirect('Admin/Kelola_buku');
			}
		}
		$send = array(
			'list' => $klasifikasi->ambilData()->result_array(),
		);
		if (!isset($send)) {
			show_404();
		} else {
			return $this->template->load('Template', 'Admin/Buku/Buku_form', $send);
		}
	}

	public function hapus($kd_inventaris)
	{
		$kd_inventaris = $this->uri->segment(4);
		if ($this->bm->hapus($kd_inventaris)) {
			echo json_encode(array('status' => true));
		} else {
			echo json_encode(array('status' => false));
		}
	}

	public function cekdata_isbn($isbn)
	{
		$data = $this->bm->val_isbn(rawurldecode($isbn))->row();
		if ($data) {
			echo json_encode(array('status' => TRUE));
		} else {
			echo json_encode(array('status' => FALSE));
		}
	}

	public function ubah($kd_inventaris)
	{
		if (!isset($kd_inventaris)) {
			redirect('Kelola_buku');
		}
		$post = $this->input->post();
		$buku = $this->bm;
		$klasifikasi = $this->km;
		$validasi = $this->form_validation;
		$validasi->set_rules($buku->rules());
		if ($validasi->run()) {
			if (!isset($post)) {
				show_404();
			} else {
				$buku->ubah($kd_inventaris);
				$this->session->set_flashdata('success', 'Data Buku Berhasil Diubah!');
				redirect('Admin/Kelola_buku');
			}
		}
		$send = array(
			'data' => $buku->ambilKode($kd_inventaris)->row_array(), 
			'list' => $klasifikasi->ambilData()->result_array(),
		);

		if (!isset($send)) {
			show_404();
		} else {
			return $this->template->load('Template', 'Admin/Buku/Buku_form', $send);
		}
	}

	public function QrBook($kd_inventaris)
	{
		$buku = $this->bm;
		if ($this->session->userdata('user_login') !== null) {
			if (!isset($kd_inventaris)) {
				show_404();
			} else {
				$send = array(
					'data' => $buku->ambilKode($kd_inventaris)->row_array(),
				);
				$this->load->view('Admin/Qr/QrBook', $send);
			}
		} else {
			show_404();
		}
	}

	public function CetakQr()
	{
		if ($this->session->userdata('user_login') !== null) {
			$send = array('data' => $this->bm->ambilData()->result_array());
			return $this->load->view('Admin/Qr/Book', $send);
		}
	}
}
?>