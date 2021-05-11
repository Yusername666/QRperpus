<?php
/**
 * 
 */
class Buku_model extends CI_Model
{
	private $_table 		= 'tb_buku';
	private $_klasifikasi 	= 'tb_klasifikasi';
	public $sampul 			= 'placeholder.jpg';
	public $kd_inventaris;
	public $judul_buku;
	public $pengarang;
	public $isbn;
	public $penerbit;
	public $thn_terbit;
	public $id_klasifikasi;
	public $jml_hlm;
	public $qrcode;
	public $stok;

	public function rules()
	{
		return [
			[
				'field' => 'kd_inventaris',
				'label'  => 'Kode Inventaris',
				'rules'  => 'required|numeric',
				'errors' =>  array(
					'numeric'  => '   %s Harus Angka Nominal!.',
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'judul_buku',
				'label'  => 'Judul Buku',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'isbn',
				'label'  => 'ISBN Buku',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'pengarang',
				'label'  => 'Pengarang Buku',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'penerbit',
				'label'  => 'Penerbit Buku',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'thn_terbit',
				'label'  => 'Tahun Terbit',
				'rules'  => 'required|numeric',
				'errors' =>  array(
					'numeric'  => '   %s Harus Angka Nominal!.',
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'id_klasifikasi',
				'label'  => 'Klasifikasi Buku',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'jml_hlm',
				'label'  => 'Jumlah Halaman Buku',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'stok',
				'label'  => 'Stok Buku',
				'rules'  => 'required|numeric',
				'errors' =>  array(
					'numeric'  => '   %s Harus Angka Nominal!.',
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

		];
	}

	public function ambilData()
	{
		return $this->db->select('*')
		->from('tb_buku')
		->join('tb_klasifikasi', 'tb_klasifikasi.id_klasifikasi=tb_buku.id_klasifikasi')
		->order_by('tb_buku.kd_inventaris', 'desc')
		->get();
	}

	public function ambilKode($kd_inventaris)
	{
		return $this->db->select('*')
		->from('tb_buku')
		->join('tb_klasifikasi', 'tb_klasifikasi.id_klasifikasi=tb_buku.id_klasifikasi')
		->where('tb_buku.kd_inventaris', $kd_inventaris)
		->get();
	}

	public function simpan()
	{
		$post = $this->input->post();
		if (isset($post)) {
			$config['cacheable']    = true; //boolean, the default is true
			$config['imagedir']     = './public/buku/qrcode/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name	=  md5($post['judul_buku']) . '.png'; //buat name dari qr code sesuai dengan nim
			$file  		=  $post['isbn']; //buat name dari qr code sesuai dengan nim

			$params['data'] 	= enkrip($file); //data yang akan di jadikan QR CODE
			$params['level'] 	= 'H'; //H=High
			$params['size']		= 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$params['errorlog'] = FCPATH . 'application / logs / ';
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

			$data['kd_inventaris'] = $post['kd_inventaris'];
			$data['judul_buku'] = $post['judul_buku'];
			$data['pengarang'] = $post['pengarang'];
			$data['isbn'] = $post['isbn'];
			$data['penerbit'] = $post['penerbit'];
			$data['thn_terbit'] = $post['thn_terbit'];
			$data['id_klasifikasi'] = $post['id_klasifikasi'];
			$data['jml_hlm'] = $post['jml_hlm'];
			$data['stok'] = $post['stok'];
			$data['sampul'] = $this->uploadSampul();
			$data['qrcode'] = $image_name;
			return $this->db->insert($this->_table, $data);
		}
	}

	public function ubah($kd_inventaris)
	{
		$post = $this->input->post();
		if (isset($post)) {
			if ($_FILES['sampul']['name'] != '') {
				$this->hapusSampul($kd_inventaris);
				$data['sampul'] = $this->uploadSampul();
			}
			$data['judul_buku'] = $post['judul_buku'];
			$data['pengarang'] = $post['pengarang'];
			$data['isbn'] = $post['isbn'];
			$data['penerbit'] = $post['penerbit'];
			$data['thn_terbit'] = $post['thn_terbit'];
			$data['id_klasifikasi'] = $post['id_klasifikasi'];
			$data['jml_hlm'] = $post['jml_hlm'];
			$data['stok'] = $post['stok'];
			return $this->db->where('kd_inventaris', $kd_inventaris)->update($this->_table, $data);
		} else {
			show_404();
		}
	}

	public function updateStok($kd_inventaris, $stokAkhir)
	{
		$this->db->where('kd_inventaris', $kd_inventaris)->update($this->_table, $stokAkhir);
	}

	public function hapus($kd_inventaris)
	{
		$this->hapusQr($kd_inventaris);
		$this->hapusSampul($kd_inventaris);
		$this->db->where('kd_inventaris', $kd_inventaris)->delete($this->_table);
	}

	public function val_isbn($isbn)
	{
		return $this->db->get_where($this->_table, ["isbn" => $isbn]);
	}

	private function uploadSampul()
	{
		$config['upload_path']          = './public/buku/sampul/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = md5($this->input->post('judul_buku'));
		// $config['encrypt_name'] 		= TRUE; //Enkripsi nama yang terupload
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if (empty($_FILES['sampul']['name'])) {
			return "placeholder.jpg";
		} else {
			if ($this->upload->do_upload('sampul')) {
				$foto = $this->upload->data();
    			//Compress Foto
				$config['image_library']	= 'gd2';
				$config['source_image']		='./public/buku/sampul/'.$foto['file_name'];
				$config['create_thumb']		= FALSE;
				$config['maintain_ratio']	= FALSE;
				// $config['quality']			= '50%';
				$config['height']			= 1123;
				$config['width']			= 794;
				$config['new_image']		= './public/buku/sampul/'.$foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				return $this->upload->data("file_name");
			}
		}
	}

	private function hapusSampul($kd_inventaris)
	{
		$buku = $this->ambilKode($kd_inventaris)->row_array();
		if ($buku['sampul'] != "placeholder.jpg") {
			$filename = $buku['sampul'];
			$filename = explode(".", $buku['sampul'])[0];
			return array_map('unlink', glob(FCPATH."./public/buku/sampul/$filename.*"));
		}
	}	

	private function hapusQr($kd_inventaris)
	{
		$buku = $this->ambilKode($kd_inventaris)->row_array();
		$filename = $buku['qrcode'];
		return array_map('unlink', glob(FCPATH."./public/buku/qrcode/$filename"));
	}
}
?>