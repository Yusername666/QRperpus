<?php 
/**
 * 
 */
class Peminjaman extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'am');
		$this->load->model('Aktivitas_model', 'ak');
		$this->load->model('Buku_model', 'bm');
		if ($this->session->userdata('user_login')->login_hash != '1') {
			redirect('Siswa/Dashboard');
		}
	}

	public function index()
	{
		return $this->template->load('Template','Admin/Aktivitas/Peminjaman_form');
	}

	public function ScanNis()
	{
		$nis = dekrip($this->input->post('code'));
		$send = $this->db->select('*')->from('tb_user')->join('tb_role', 'tb_user.login_hash=tb_role.id_role')->where(['nis' => $nis])->get()->row();
		echo json_encode($send);
	}

	public function ScanBuku()
	{
		$isbn = dekrip($this->input->post('code'));
		$send = $this->db->select('*')->from('tb_buku')->join('tb_klasifikasi', 'tb_buku.id_klasifikasi=tb_klasifikasi.id_klasifikasi')->where(['isbn' => $isbn])->get()->row();
		echo json_encode($send);
	}

	public function simpanPinjaman()
	{
		if ($this->input->post()) {

			//Pengurangan Stok Buku
			foreach ($this->cart->contents() as $key ) {
				$cek = $this->bm->ambilKode($key['id'])->row_array();
				$stokAkhir['stok'] = $cek['stok'] - $key['qty'];
				$this->bm->updateStok($key['id'], $stokAkhir); 
			}
			
			echo json_encode(array('status' => TRUE));
			$this->ak->simpan();
			$this->cart->destroy();
		}else{
			echo json_encode(array('status' => FALSE));
		}
	}

	public function listPeminjaman()
	{
		$peminjam = $this->ak;
		$nis = $this->input->post('nisSiswa', true);
		$status = $this->input->post('status', true);
		if (!isset($nis) && !isset($status) || $nis == '' && $status == '') {
			$send['data'] = $peminjam->ambilPeminjam()->result_array();
		} else {
			$send['data'] = $peminjam->filterPeminjam($nis, $status)->result_array();
		}
		return $this->template->load('Template','Admin/Aktivitas/Peminjaman_data', $send);
	}

	public function detailPeminjaman($kd_peminjaman_header)
	{
		$peminjam = $this->ak;
		if (!isset($kd_peminjaman_header)) {
			show_404();
		} 
		$send = array(
			'peminjam' => $peminjam->detailPeminjam(dekrip($kd_peminjaman_header))->row_array() ,
			'buku' => $peminjam->detailPeminjam(dekrip($kd_peminjaman_header))->result_array() ,
		);
		return $this->template->load('Template', 'Admin/Aktivitas/Peminjaman_detail', $send);
	}

	public function pengembalianBuku($kd_peminjaman_header)
	{
		$peminjam = $this->ak;
		$data = $this->db->get_where('tb_peminjaman_header', ['kd_peminjaman_header' => $kd_peminjaman_header])->row_array(); 
		$tgl_kembali = $data['tgl_kembali'];
		if (isset($tgl_kembali)) {
			$peminjam->simpanPengembalian($kd_peminjaman_header, $tgl_kembali);
			$this->session->set_flashdata('success', 'Data Buku Peminjaman Berhasil Di Kembalikan!');
			echo json_encode(array('status' => TRUE ));
		} 
	}

	public function perpanjangan($kd_peminjaman_header)
	{
		$peminjam = $this->ak;
		$data = $this->db->get_where('tb_peminjaman_header', ['kd_peminjaman_header' => $kd_peminjaman_header])->row_array(); 
	}

	//cart ci3
	public function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id' => $this->input->post('kd_inventaris'), 
			'name' => $this->input->post('judul_buku'), 
			'isbn' => $this->input->post('isbn'), 
			'price' => '0',
			'qty' => '1', 
		);
		$this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }

    public function show_cart(){ //Fungsi untuk menampilkan Cart
    	$output = '';
    	$no = 1;
    	foreach ($this->cart->contents() as $items) {
    		$output .='<tr> <td></td> <td>'.$items['id'].'</td> <td>'.$items['name'].'</td> <td>'.$items['isbn'].'</td> <td class="text-center"> <ul class="icons-list"> <li class="text-danger"> <a href="#" class="hapus_cart" id="'.$items['rowid'].'"> <i class="icon-trash"></i> </a> </li> </ul> </td> </tr> '; 
    	}
    	return $output;
    }

    public function load_cart(){ //load data cart
    	echo $this->show_cart();
    }

    public function hapus_cart(){ //fungsi untuk menghapus item cart
    	$data = array(
    		'rowid' => $this->input->post('row_id'), 
    		'qty' => 0, 
    	);
    	$this->cart->update($data);
    	echo $this->show_cart();
    }
}
?>