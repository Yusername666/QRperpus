<?php
/**
 * 
 */
class Klasifikasi_model extends CI_Model
{
	private $_table 	= 'tb_klasifikasi';
	public $id_klasifikasi;
	public $klasifikasi;

	public function rules()
	{
		return [

			[
				'field' => 'id_klasifikasi',
				'label'  => 'Klasifikasi Buku',
				'rules'  => 'required|numeric',
				'errors' =>  array(
					'numeric'  => '%s Harus Angka Nominal!.',
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'klasifikasi',
				'label'  => 'Klasifikasi Buku',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

		];
	}

	public function ambilData()
	{
		return $this->db->from($this->_table)->order_by('id_klasifikasi', 'desc')->get();
	}

	public function ambilId($id_klasifikasi)
	{
		return $this->db->get_where($this->_table, ['id_klasifikasi' => $id_klasifikasi]);
	}

	public function tambah()
	{
		$post = $this->input->post();
		if (!isset($post)) {
			show_404();
		} else {
			$data = array(
				'id_klasifikasi' => $post['id_klasifikasi'],
				'klasifikasi' => $post['klasifikasi'],
			);
			return $this->db->insert($this->_table, $data);
		}
	}

	public function ubah()
	{
		$post = $this->input->post();
		if (!isset($post)) {
			show_404();
		} else {
			$data['klasifikasi'] = $post['klasifikasi'];
			return $this->db->where('id_klasifikasi', $post['id_klasifikasi'])->update($this->_table, $data);
		}
	}

	public function hapus($id_klasifikasi)
	{
		return $this->db->where('id_klasifikasi', $id_klasifikasi)->delete($this->_table);
	}

	public function val_klasifikasi($klasifikasi)
	{
		return $this->db->get_where($this->_table, ['klasifikasi' => $klasifikasi]);
	}

	public function val_id($id_klasifikasi)
	{
		return $this->db->get_where($this->_table, ['id_klasifikasi' => $id_klasifikasi]);
	}
}
?>