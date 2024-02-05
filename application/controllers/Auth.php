<?php

class Auth extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    private $MenuKode;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_Auth');
    }

    function login()
    {
        $this->load->view('pages/auth/login');
    }

    function proses_login()
    {
        $data_session = array();

        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $arr_user = $this->M_Auth->Get_user_by_auth($email, $password);

        if (count($arr_user) > 0) {

            foreach ($arr_user as $value) {

                $data_session = array(
                    'pengguna_id' => $value['pengguna_id'],
                    'pengguna_username' => $value['pengguna_username'],
                    'pengguna_password' => $value['pengguna_password'],
                    'perusahaan_id' => $value['perusahaan_id'],
                    'karyawan_id' => $value['karyawan_id'],
                    'karyawan_nama' => $value['karyawan_nama'],
                    'karyawan_level' => $value['karyawan_level'],
                    'karyawan_divisi' => $value['karyawan_divisi'],
                    'pengguna_email' => $value['pengguna_email'],

                    'is_aktif' => 1
                );
            }

            $this->session->set_userdata($data_session);

            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Auth/login'));
    }
}
