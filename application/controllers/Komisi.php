<?php

class Komisi extends CI_Controller
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
        $this->load->model('M_Komisi');
        $this->load->model('M_Karyawan');
        $this->load->model('M_Vrbl');
        $this->load->helper(array('url', 'file'));
    }

    public function index()
    {
        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        if (!$this->session->has_userdata('pengguna_id')) {
            redirect(base_url('Auth/login'));
        }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        // $query['Title'] = Get_Title_Name();
        // $query['Copyright'] = Get_Copyright_Name();

        $data['Title'] = "Pengeluaran Kas";
        $data['act'] = "index";

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        // $this->load->view('layouts/header', $query);
        // $this->load->view('pages/kas/index', $data);
        // $this->load->view('layouts/footer', $query);
        // $this->load->view('pages/kas/script', $data);

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/komisi/index', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/komisi/script', $data);
    }

    public function create()
    {

        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        if (!$this->session->has_userdata('pengguna_id')) {
            redirect(base_url('Auth/login'));
        }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        $data['Title'] = "Komisi";

        $data['act'] = "add";

        $table = "komisi";
        $column = "komisi_id";
        $kode = "KMS" . date('ymd');

        $data['komisi_id'] = $this->M_Vrbl->Generate_kode($table, $column, $kode);
        $data['Karyawan'] = $this->M_Karyawan->Get_all_karyawan_aktif();

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/komisi/create', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/komisi/script', $data);
    }

    public function edit()
    {

        $id = $this->input->get('id');

        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        if (!$this->session->has_userdata('pengguna_id')) {
            redirect(base_url('Auth/login'));
        }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        $data['Title'] = "Pengeluaran Kas";
        // $query['Copyright'] = Get_Copyright_Name();

        $data['Header'] = $this->M_Komisi->Get_komisi_header_by_id($id);
        $data['Karyawan'] = $this->M_Karyawan->Get_all_karyawan_aktif();

        $data['act'] = "edit";

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/komisi/edit', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/komisi/script', $data);
    }

    public function detail()
    {
        $id = $this->input->get('id');

        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        if (!$this->session->has_userdata('pengguna_id')) {
            redirect(base_url('Auth/login'));
        }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        $data['Title'] = "Pengeluaran Kas";
        // $query['Copyright'] = Get_Copyright_Name();
        $data['Header'] = $this->M_Komisi->Get_komisi_header_by_id($id);
        $data['Karyawan'] = $this->M_Karyawan->Get_all_karyawan_aktif();
        $data['act'] = "detail";

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/komisi/detail', $data);
        $this->load->view('layouts/footer', $data);
        // $this->load->view('pages/kas/script', $data);
    }

    public function Get_komisi_by_filter()
    {
        $tgl = explode(" - ", $this->input->post('tgl'));
        $tgl1 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[0])));
        $tgl2 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[1])));
        $komisi_id = $this->input->post('komisi_id');
        $status = $this->input->post('status');

        $data = $this->M_Komisi->Get_komisi_by_filter($tgl1, $tgl2, $komisi_id, $status);

        echo json_encode($data);
    }

    public function insert_komisi()
    {

        $komisi_id = $this->input->post('komisi_id');
        $komisi_tanggal = $this->input->post('komisi_tanggal');
        $karyawan_id = $this->input->post('karyawan_id');
        $nama_project = $this->input->post('nama_project');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $jumlah = $this->input->post('jumlah');
        $komisi_status = $this->input->post('komisi_status');
        $updwho = $this->input->post('updwho');
        $updtgl = $this->input->post('updtgl');

        $cek_data = $this->M_Komisi->cek_komisi_duplicate($komisi_id);

        if ($cek_data > 0) {
            echo json_encode(array("status" => 2, "data" => ""));
            die;
        }

        $this->db->trans_begin();

        $this->M_Komisi->insert_komisi($komisi_id, $komisi_tanggal, $karyawan_id, $nama_project, $tanggal_pembayaran, $jumlah, $komisi_status, $updwho, $updtgl);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_komisi()
    {
        $komisi_id = $this->input->post('komisi_id');
        $komisi_tanggal = $this->input->post('komisi_tanggal');
        $karyawan_id = $this->input->post('karyawan_id');
        $nama_project = $this->input->post('nama_project');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $jumlah = $this->input->post('jumlah');
        $komisi_status = $this->input->post('komisi_status');
        $updwho = $this->input->post('updwho');
        $updtgl = $this->input->post('updtgl');;

        $this->db->trans_begin();

        $this->M_Komisi->update_komisi($komisi_id, $komisi_tanggal, $karyawan_id, $nama_project, $tanggal_pembayaran, $jumlah, $komisi_status, $updwho, $updtgl);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
