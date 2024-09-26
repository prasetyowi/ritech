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
        $this->load->model('M_Orang_tua');
        $this->load->model('M_Pengguna');
        $this->load->model('M_Vrbl');
    }

    function login()
    {
        $this->load->view('pages/auth/login');
    }

    function lupa_password()
    {
        $this->load->view('pages/auth/forget_password');
    }

    function proses_login()
    {
        $data_session = array();
        $level = "";

        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $arr_user = $this->M_Auth->Get_user_by_auth($email, $password);

        if (count($arr_user) > 0) {

            foreach ($arr_user as $value) {

                $level = $value['pengguna_level'];

                $data_session = array(
                    'pengguna_id' => $value['pengguna_id'],
                    'pengguna_username' => $value['pengguna_username'],
                    'pengguna_password' => $value['pengguna_password'],
                    'pengguna_reff_id' => $value['pengguna_reff_id'],
                    'pengguna_nama' => $value['pengguna_nama'],
                    'pengguna_email' => $value['pengguna_email'],
                    'pengguna_level' => $value['pengguna_level'],
                    'is_aktif' => 1
                );
            }

            $this->session->set_userdata($data_session);

            echo json_encode(array("status" => 1, "level" => $level));
        } else {
            echo json_encode(array("status" => 0, "level" => $level));
        }
    }

    function forget_password()
    {
        $data_session = array();
        $level = "";

        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $arr_user = $this->M_Auth->Cek_email_pengguna($email);

        if ($arr_user > 0) {

            $this->db->set('pengguna_password', $password);
            $this->db->where('pengguna_email', $email);

            $queryinsert = $this->db->update("pengguna");

            echo json_encode(array("status" => $queryinsert));
        } else {
            echo json_encode(array("status" => 2));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function proses_register()
    {

        $orang_tua_id = $this->input->post('orang_tua_id');
        $orang_tua_nama = $this->input->post('orang_tua_nama');
        $orang_tua_alamat = $this->input->post('orang_tua_alamat');
        $orang_tua_kelurahan = $this->input->post('orang_tua_kelurahan');
        $orang_tua_kecamatan = $this->input->post('orang_tua_kecamatan');
        $orang_tua_kota = $this->input->post('orang_tua_kota');
        $orang_tua_provinsi = $this->input->post('orang_tua_provinsi');
        $orang_tua_negara = $this->input->post('orang_tua_negara');
        $orang_tua_telp = $this->input->post('orang_tua_telp');
        $orang_tua_kode_pos = $this->input->post('orang_tua_kode_pos');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');

        $table = "pengguna";
        $column = "pengguna_id";
        $kode = "USR";

        $pengguna_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);
        $pengguna_username = $pengguna_id;
        $pengguna_password = md5($this->input->post('pengguna_password'));
        $pengguna_perusahaan = "";
        $orang_tua_id = $this->input->post('orang_tua_id');
        $add_by = "";
        $updwho = "";
        $updtgl = date('Y-m-d');
        $is_aktif = 1;
        $pengguna_email = $this->input->post('pengguna_email');
        $is_delete = "";
        $pengguna_level = "orang tua";

        $cek_orang_tua = $this->M_Orang_tua->cek_orang_tua_by_id($orang_tua_id);
        $cek_pengguna = $this->M_Pengguna->cek_pengguna_by_email($pengguna_email);

        if ($cek_orang_tua > 0) {
            echo json_encode(array("status" => 2, "data" => $orang_tua_id));
            return false;
        }

        if ($cek_pengguna > 0) {
            echo json_encode(array("status" => 3, "data" => $pengguna_email));
            return false;
        }

        $this->db->trans_begin();

        $this->M_Orang_tua->insert_orang_tua($orang_tua_id, $orang_tua_nama, $orang_tua_alamat, $orang_tua_kelurahan, $orang_tua_kecamatan, $orang_tua_kota, $orang_tua_provinsi, $orang_tua_negara, $orang_tua_telp, $orang_tua_kode_pos, $pengguna_email, $is_aktif, $tgl_lahir, $jenis_kelamin);

        $this->M_Pengguna->insert_pengguna($pengguna_id, $pengguna_username, $pengguna_password, $pengguna_perusahaan, $orang_tua_id, $add_by, $updwho, $updtgl, $is_aktif, $pengguna_email, $is_delete, $pengguna_level);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
