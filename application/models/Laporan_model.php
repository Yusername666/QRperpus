<?php
/**
 * 
 */
class Laporan_model extends CI_Model
{
	private $_header 		= 'tb_peminjaman_header';
	private $_detail 		= 'tb_peminjaman_detail';
	private $_buku			= 'tb_buku';
	private $_siswa			= 'tb_user';
	private $_perpanjangan	= 'tb_perpanjangan';

	private $_kunjungan = 'tb_kunjungan';
	private $_user = 'tb_user';

	public function dataHariIni()
	{
		//start filter otomatis hari ini
		$ina =  time() + (60 * 60 * 7);
		$now = gmdate('Y-m-d', $ina);
		//end filter otomatis hari ini

		return $this->db->select('*') 
		->from($this->_kunjungan) 
		->join('tb_user', 'tb_user.nis=tb_kunjungan.nis') 
		->where('tb_kunjungan.tgl_kunjungan', $now) 
		->get(); 
	}

	public function datang($nis)
	{
		//start timestamp GMT +7
		$ina =  time() + (60 * 60 * 7);
		$now = date('Y-m-d H:i:s', $ina);
		//end timestamp

		$data = array(
			'nis' => $nis, 
			'tgl_kunjungan' => $now, 
		);
		return $this->db->insert($this->_kunjungan, $data);
	}

	public function ambilKunjungan()
	{
		return $this->db->select('*')
		->from($this->_kunjungan)
		->join($this->_user, 'tb_user.nis=tb_kunjungan.nis')
		->order_by('tgl_kunjungan', 'desc')
		->get();
	}

	public function ambilAktivitas()
	{
		return $this->db->select('*') 
		->from($this->_header) 
		->join($this->_siswa, 'tb_peminjaman_header.nis=tb_user.nis')
		->join($this->_detail, 'tb_peminjaman_detail.kd_peminjaman_header=tb_peminjaman_header.kd_peminjaman_header') 
		->join($this->_buku, 'tb_peminjaman_detail.kd_inventaris=tb_buku.kd_inventaris')
		// ->join($this->_perpanjangan, 'tb_peminjaman_detail.kd_perpanjangan=tb_perpanjangan.kd_perpanjangan')
		->order_by('tb_peminjaman_header.tgl_pinjam','asc') 
		->get();
	}

	public function kunjunganFilterDate($awal, $akhir)
	{
		return $this->db->select('*')
		->from($this->_kunjungan)
		->join($this->_user, 'tb_user.nis=tb_kunjungan.nis')
		->where("tb_kunjungan.tgl_kunjungan BETWEEN '$awal' AND '$akhir'")
		->order_by('tb_kunjungan.tgl_kunjungan', 'desc')
		->get();
	}

}
?>