<?php
/**
 * 
 */
class User_model extends CI_Model
{

	private $_table = "tb_user";
	private $_hash = "tb_role";
	public $nis;
	public $nama_lengkap;
	public $tgl_lahir;
	public $alamat;
	public $login_hash;
	public $foto = 'placeholder.jpg';
	public $qrcode;
	public $username;
	public $password;
	public $log;

	//rules_Validation
	public function rules()
	{
		return [
			[
				'field' => 'nis',
				'label'  => 'NIS',
				'rules'  => 'required|numeric',
				'errors' =>  array(
					'numeric'  => '%s Harus Angka Nominal!.',
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'nama_lengkap',
				'label'  => 'Nama Lengkap',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'tgl_lahir',
				'label'  => 'Tanggal Lahir',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'alamat',
				'label'  => 'Alamat Lengkap',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			[
				'field' => 'foto',
				'label'  => 'Upload Foto',
				'rules'  => 'mimes:jpeg,jpg,png,gif|image|max:1024',
			],

			[
				'field' => 'login_hash',
				'label'  => 'Hak Akses',
				'rules'  => 'required',
				'errors' =>  array(
					'required' => '%s Tidak Boleh Kosong!.'
				)
			],

			// [
			// 	'field' => 'username',
			// 	'label'  => 'Username',
			// 	'rules'  => 'required',
			// 	'errors' =>  array(
			// 		'required' => '%s Tidak Boleh Kosong!.'
			// 	)
			// ],

			// [
			// 	'field' => 'password',
			// 	'label'  => 'Password',
			// 	'rules'  => 'required|min_length[6]',
			// 	'errors' =>  array(
			// 		'min_length' => '%s Tidak Boleh Kurang Dari 6 Huruf!.',
			// 		'required' => '%s Tidak Boleh Kosong!.'
			// 	)
			// ]
		];
	}

	public function ambilData()
	{
		return $this->db->select('*')
		->from('tb_user')
		->join('tb_role', 'tb_user.login_hash=tb_role.id_role')
		->order_by('tb_user.nis', 'desc')
		->get();
	}

	public function ambilNis($nis)
	{
		return $this->db->select('*')
		->from('tb_user')
		->join('tb_role', 'tb_user.login_hash=tb_role.id_role')
		->where('nis', $nis)
		->get();
	}

	public function ambilRole()
	{
		return $this->db->get($this->_hash);
	}

	public function simpan()
	{
		$post = $this->input->post();
		if ($post) {
			
			//STARTGENERATE QR-CODE
			$config['cacheable']    = true; //boolean, the default is true
			$config['imagedir']     = './public/user/qrcode/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name	=  $post['nis'] . '.png'; //buat name dari qr code sesuai dengan nim
			$file  		=  $post['nis']; //buat name dari qr code sesuai dengan nim

			$params['data'] 	= enkrip($file); //data yang akan di jadikan QR CODE
			$params['level'] 	= 'H'; //H=High
			$params['size']		= 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$params['errorlog'] = FCPATH . 'application / logs / ';
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			//END GENERATE QR-CODE


			//START GENERATE PASSWORD
			$p = date_create($post['tgl_lahir']);
			$password = date_format($p, 'Ymd');
			//END GENERATE PASSWORD

			$data['nis'] = $post['nis'];
			if (isset($post['no_kelas'])) {
				$data['kelas'] = $post['kelas'] . $post['no_kelas'];
			} else {
				$data['kelas'] = $post['kelas'];
			}
			$data['nama_lengkap'] = $post['nama_lengkap'];
			$data['tgl_lahir'] = $post['tgl_lahir'];
			$data['alamat'] = $post['alamat'];
			$data['username'] = $post['nis'];
			$data['password'] = password_hash($password, PASSWORD_DEFAULT);
			$data['login_hash'] = $post['login_hash'];
			$data['foto'] = $this->uploadFoto();
			$data['qrcode'] = $image_name;
			$data['log'] = $post['log'];
			return $this->db->insert($this->_table, $data);
		} else {
			show_404();
		}
	}

	public function ubah($nis)
	{
		$post = $this->input->post();
		if (isset($post)) {
			if ($_FILES['foto']['name'] != '') {
				$this->hapusFoto($nis);
				$data['foto'] = $this->uploadFoto();
			}
			$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
			$data['log'] = $post['log'];
			$data['login_hash'] = $post['login_hash'];
			
			// $data['tgl_lahir'] = $post['tgl_lahir'];
			// $data['kelas'] = $post['kelas'];
			// $data['nis'] = $post['nis'];
			// $data['nama_lengkap'] = $post['nama_lengkap'];
			// $data['alamat'] = $post['alamat'];
			// $data['username'] = $post['username'];
			
			return $this->db->where('nis', $nis)->update($this->_table, $data);
		} else {
			show_404();
		}
	}

	public function ubahPassword($nis)
	{
		$post = $this->input->post();
		if (isset($nis)) {
			$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
			return $this->db->where('nis', $nis)->update($this->_table, $data);
		} else {
			show_404();
		}
	}

	public function hapus($nis)
	{
		$this->hapusQr($nis);
		$this->hapusFoto($nis);
		$this->db->where('nis', $nis)->delete($this->_table);
	}

	public function val_username($d)
	{
		return $this->db->get_where($this->_table, ["username" => $d]);
	}

	public function val_nis($nis)
	{
		return $this->db->get_where($this->_table, ["nis" => $nis]);
	}

	public function uploadFoto()
	{
		$config['upload_path']          = './public/user/foto/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = md5($this->input->post('nis'));
		$config['overwrite']            = TRUE; 
		// $config['encrypt_name'] 		= TRUE; //Enkripsi nama yang terupload
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if (empty($_FILES['foto']['name'])) {
			return "placeholder.jpg";
		} else {
			if ($this->upload->do_upload('foto')) {
				$foto = $this->upload->data();
    			//Compress Foto
				$config['image_library']	= 'gd2';
				$config['source_image']		='./public/user/foto/'.$foto['file_name'];
				$config['create_thumb']		= FALSE;
				$config['maintain_ratio']	= FALSE;
				// $config['quality']			= '50%';
				$config['height']			= 227;
				$config['width']			= 151;
				$config['new_image']		= './public/user/foto/'.$foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				return $this->upload->data("file_name");
			}
		}
	}

	private function hapusFoto($nis)
	{
		$user = $this->ambilNis($nis)->row();
		if ($user->foto != "placeholder.jpg") {
			$filename = explode(".", $user->foto)[0];
			return array_map('unlink', glob(FCPATH."./public/user/foto/$filename.*"));
		}
	}

	private function hapusQr($nis)
	{
		$user = $this->ambilNis($nis)->row();
		$filename = explode(".", $user->qrcode)[0];
		return array_map('unlink', glob(FCPATH."./public/user/qrcode/$filename"));
	}
}
