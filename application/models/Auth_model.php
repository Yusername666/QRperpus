<?php
class Auth_model extends CI_Model
{
	private $_table = "tb_user";
	public function rules()
	{
		return [
			[
				'field' => 'userLog',
				'label' => 'Username',
				'rules' => 'required',
				'errors' =>  array(
					'required' => 'Whoops! %s Tidak Boleh Kosong !'
				)
			],

			[
				'field' => 'passLog',
				'label' => 'Password',
				'rules' => 'required',
				'errors' =>  array(
					'required' => 'Whoops! %s Tidak Boleh Kosong !'
				)
			]
		];
	}
	public function login()
	{
		$post = $this->input->post();
		$validasi = $this->form_validation;
		$validasi->set_rules($this->rules());
		if ($validasi->run()) {
			$user = $this->db->select('*')
			->from('tb_user')
			->join('tb_role', 'tb_user.login_hash=tb_role.id_role')
			->where('username', $post['userLog'])
			->get()->row();
			if ($user) {
				$cekPass = password_verify($post["passLog"], $user->password);
				if ($cekPass) {
					$this->session->set_userdata(['user_login' => $user]);
					$this->_updateLog($user->nis);
					return true;
				} else {
					$sdata['gagal'] = "gagal";
					$this->session->set_userdata($sdata);
					return false;
				}
			} else {
				$sdata['gagal'] = "gagal";
				$this->session->set_userdata($sdata);
				return false;
			}
		} else {
			$sdata['gagal'] = "gagal";
			$this->session->set_userdata($sdata);
			return false;
		}
	}
	public function cek_status()
	{
		return $this->session->userdata('user_login') === null;
	}
	private function _updateLog($nis)
	{
		$sql = "UPDATE {$this->_table} SET log = now() WHERE nis={$nis}";
		return $this->db->query($sql);
	}
}
