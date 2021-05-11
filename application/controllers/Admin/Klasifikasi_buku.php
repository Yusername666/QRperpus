<?php
/**
 * 
 */
class Klasifikasi_buku extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Klasifikasi_model', 'km');
		$this->load->model('Auth_model', 'am');
		if ($this->session->userdata('user_login')->login_hash != '1') {
			redirect('Siswa/Dashboard');
		}
	}

	public function index()
	{
		$send = array(
			'list' => $this->km->ambilData()->result_array(), 
			'kode' => $this->km->ambilData()->num_rows(), 
		);
		return $this->template->load('Template', 'Admin/Buku/Klasifikasi_data', $send);
	}

	public function tambah($metode)
	{
		$ktg = $this->km;
		$validasi = $this->form_validation;
		$post = $this->input->post();
		$validasi->set_rules($ktg->rules());
		if ($validasi->run()) {
			if (!isset($post)) {
				show_404();
			} else {
				if ($metode == "create") {
					$ktg->tambah();
					$this->session->set_flashdata('success', 'Data Klasifikasi Buku Berhasil Disimpan!');
				} else {
					$ktg->ubah();
					$this->session->set_flashdata('success', 'Data Klasifikasi Buku Berhasil Diubah!');
				}
				echo json_encode(array('status' => TRUE ));
			}
		} else {
			$this->template->load('Template', 'Admin/Buku/Klasifikasi_data');
		}
	}

	public function ubah($id_klasifikasi)
	{
		$data = $this->km->ambilId($id_klasifikasi)->row_array();
		echo json_encode($data);
	}

	public function hapus($id_klasifikasi)
	{
		$id_klasifikasi = $this->uri->segment(4);
		if ($this->km->hapus($id_klasifikasi)) {
			json_encode(array('status' => TRUE));
		} else {
			json_encode(array('status' => FALSE));
		}
	}

	public function cekdata_klasifikasi($klasifikasi)
	{
		$data = $this->km->val_klasifikasi(rawurldecode($klasifikasi))->row();
		if ($data) {
			echo json_encode(array('status' => TRUE));
		} else {
			echo json_encode(array('status' => FALSE));
		}
	}

	public function cekdata_id($id_klasifikasi)
	{
		$data = $this->km->val_id(rawurldecode($id_klasifikasi))->row();
		if ($data) {
			echo json_encode(array('status' => TRUE));
		} else {
			echo json_encode(array('status' => FALSE));
		}
	}
}
?>