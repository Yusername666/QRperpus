<?php 
/**
 * 
 */
class Aktivitas_model extends CI_Model
{
	private $_header 		= 'tb_peminjaman_header';
	private $_detail 		= 'tb_peminjaman_detail';
	private $_buku			= 'tb_buku';
	private $_klasifikasi	= 'tb_klasifikasi';
	private $_siswa			= 'tb_user';
	private $_perpanjangan	= 'tb_perpanjangan';
	private $_kunjungan	    = 'tb_kunjungan';

	public function simpan()
	{
		if ($this->input->post()) {
			$data = array(
				'kd_peminjaman_header' => 'PM-'.date('YmdHis'), 
				'nis' => $this->input->post('nis'), 
				'tgl_pinjam' => $this->input->post('tgl_pinjam'), 
				'tgl_kembali' => $this->input->post('tgl_kembali'),
				'status' => 'Belum Kembali',
				'denda' => 0 
			);
			foreach ($this->cart->contents() as $i){
				$cart = array(
					'kd_peminjaman_header' => $data['kd_peminjaman_header'], 
					'kd_inventaris' => $i['id'],
					'jml_pinjam' => $i['qty']
				);
				$this->db->insert($this->_detail, $cart);
			}
			$this->db->insert($this->_header, $data);
		}
	}

	public function ambilPeminjam()
	{
		return $this->db->select('*') 
		->from($this->_header) 
		->join($this->_siswa, 'tb_peminjaman_header.nis=tb_user.nis')
		->where('tb_peminjaman_header.status', 'Belum Kembali')
		->order_by('tb_peminjaman_header.kd_peminjaman_header','desc') 
		->limit(25, 0)
		->get(); 
	}	

	public function ambilPengembalian()
	{
		return $this->db->select('*') 
		->from($this->_header) 
		->join($this->_siswa, 'tb_peminjaman_header.nis=tb_user.nis')
		->where('tb_peminjaman_header.status', 'Sudah Kembali')
		->order_by('tb_peminjaman_header.kd_peminjaman_header','desc') 
		->limit(25, 0)
		->get(); 
	}

	public function filterPeminjam($nis, $status)
	{
		return $this->db->select('*') 
		->from($this->_header) 
		->join($this->_siswa, 'tb_peminjaman_header.nis=tb_user.nis')
		->where('tb_peminjaman_header.nis', $nis) 
		->where('tb_peminjaman_header.status', $status)
		->order_by('tb_peminjaman_header.kd_peminjaman_header','desc') 
		->get();
	}

	public function detailPeminjam($kd_peminjaman_header)
	{
		return $this->db->select('*') 
		->from($this->_header) 
		->join($this->_siswa, 'tb_peminjaman_header.nis=tb_user.nis')
		->join($this->_detail, 'tb_peminjaman_detail.kd_peminjaman_header=tb_peminjaman_header.kd_peminjaman_header')
		->join($this->_buku, 'tb_peminjaman_detail.kd_inventaris=tb_buku.kd_inventaris')
		->join($this->_klasifikasi, 'tb_klasifikasi.id_klasifikasi=tb_buku.id_klasifikasi')
		// ->join($this->_perpanjangan, 'tb_peminjaman_detail.kd_perpanjangan=tb_perpanjangan.kd_perpanjangan')
		->where('tb_peminjaman_header.kd_peminjaman_header', $kd_peminjaman_header) 
		->get();
	}

	public function simpanPengembalian($kd_peminjaman_header,$tgl_kembali)
	{
		if (!isset($kd_peminjaman_header) && !isset($tgl_kembali)) {
			return show_404();
		}

		//Hitung Denda
		$tglSekarang = date('Y-m-d');
		$pinjam = date_create($tgl_kembali);
		$kembali = date_create($tglSekarang);
		$terlambat = date_diff($pinjam, $kembali);
		$hari = $terlambat->format("%a");
		$p = date_format($pinjam, 'Ymd');
		$k = date_format($kembali, 'Ymd');
		if ($k >= $p) {
			$denda = $hari * 500;
		} else {
			$denda = $hari * 0;
		}

		$data = array(
			'status' => 'Sudah Kembali',
			'denda'	 => $denda,
		);
		
		//cek data peminjaman
		$detailPeminjam = $this->detailPeminjam($kd_peminjaman_header)->result_array();
		foreach ($detailPeminjam as $key) {

			//ambil data stok buku
			$stokBuku = $this->db->select('*') ->from('tb_buku') ->join('tb_klasifikasi', 'tb_klasifikasi.id_klasifikasi=tb_buku.id_klasifikasi') ->where('tb_buku.kd_inventaris', $key['kd_inventaris']) ->get() ->row_array();

			//denda
			$stokAkhir['stok'] = $stokBuku['stok'] + $key['jml_pinjam'];

			$this->db->where('kd_inventaris', $stokBuku['kd_inventaris'])->update($this->_buku, $stokAkhir);
		}
		$this->db->where('kd_peminjaman_header', $kd_peminjaman_header)->update($this->_header, $data);
	}

	//Dashboard Siswa
	public function ambilPengembalianSiswa()
	{
		return $this->db->get_where($this->_header, ['nis' => $this->session->userdata('user_login')->nis, 'status' => 'Sudah Kembali']);
	}
	public function ambilPeminjamanSiswa()
	{
		return $this->db->get_where($this->_header, ['nis' => $this->session->userdata('user_login')->nis, 'status' => 'Belum Kembali']);
	}
	public function ambilInfo()
	{
		return $this->db->select('*') 
		->from($this->_header) 
		->join($this->_siswa, 'tb_peminjaman_header.nis=tb_user.nis')
		->join($this->_detail, 'tb_peminjaman_detail.kd_peminjaman_header=tb_peminjaman_header.kd_peminjaman_header')
		->join($this->_buku, 'tb_peminjaman_detail.kd_inventaris=tb_buku.kd_inventaris')
		->where('tb_peminjaman_header.nis', $this->session->userdata('user_login')->nis)
		->limit(25, 0)
		->get();
	}
	public function ambilKunjunganSiswa()
	{
		return $this->db->get_where($this->_kunjungan, ['nis' => $this->session->userdata('user_login')->nis]);
	}
	//End
}
?>