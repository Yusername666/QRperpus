<?php 
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'am');
        $this->load->model('Laporan_model', 'km');
    }
    public function index()
    {
        if ($this->input->post()) {
            if ($this->am->login()) {
                if ($this->session->userdata('user_login')->login_hash === '1') {
                    redirect('Admin/Dashboard');
                } else {
                    redirect('Siswa/Dashboard');
                }
                redirect('Admin/Dashboard');
            }
        }
        return $this->template->load('Auth/Login','Auth/Login_form');
    }

    public function Qr()
    {
        return $this->template->load('Auth/Login','Auth/Qr_form');
    }

    public function scanMasuk()
    {
        if ($this->input->post()) {
            $nis = dekrip($this->input->post('code'));
            $data = $this->db->select('*')->from('tb_user')->join('tb_role', 'tb_user.login_hash=tb_role.id_role')->where(['nis' => $nis])->get()->row_array();
            if (isset($data)) {
                $this->km->datang($nis);
                echo '<div class="alert alert-success" role="alert">SELAMAT DATANG '.$data['nama_lengkap'].'</br>DI PERPUSATAKAAN MAN 1 PEKALONGAN</div>';
            } else {
                return null;
            }
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
