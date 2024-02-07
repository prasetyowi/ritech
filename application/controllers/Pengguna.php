<?php

class pengguna extends CI_Controller
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

        // $this->MenuKode = "135002000";
        // $this->load->model('WMS/M_PickList', 'M_PickList');
        // $this->load->model('WMS/M_Pengguna', 'M_Pengguna');
        // $this->load->model('WMS/M_DeliveryOrder', 'M_DeliveryOrder');
        // $this->load->model('WMS/M_DeliveryOrderDetailDraft', 'M_DeliveryOrderDetailDraft');
        // $this->load->model('WMS/M_PersetujuanPembongkaranpengguna', 'M_PersetujuanPembongkaranpengguna');
        // $this->load->model('M_ClientPt');
        // $this->load->model('M_Area');
        // $this->load->model('M_StatusProgress');
        // $this->load->model('M_SKU');
        // $this->load->model('M_Principle');
        // $this->load->model('M_TipeDeliveryOrder');
        // $this->load->model('M_AutoGen');
        $this->load->model('M_Vrbl');
        $this->load->model('M_Pengguna');
        $this->load->model('M_Karyawan');
        $this->load->model('M_Perusahaan');
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

        $data['Title'] = "Pelanggan";
        $data['act'] = "index";

        $data['Perusahaan'] = $this->M_Perusahaan->Get_all_perusahaan_aktif();
        $data['Karyawan'] = $this->M_Karyawan->Get_all_karyawan_aktif();
        $data['Level'] = $this->M_Karyawan->Get_karyawan_level();
        $data['Divisi'] = $this->M_Karyawan->Get_karyawan_divisi();

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        // $this->load->view('layouts/header', $query);
        // $this->load->view('pages/Quotation/index', $data);
        // $this->load->view('layouts/footer', $query);
        // $this->load->view('pages/Quotation/script', $data);

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/pengguna/index', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/pengguna/script', $data);
    }

    public function Get_all_pengguna()
    {
        $data = $this->M_Pengguna->Get_all_pengguna();

        echo json_encode($data);
    }

    public function Get_all_pengguna_by_id()
    {
        $id = $this->input->get('id');
        $data = $this->M_Pengguna->Get_all_pengguna_by_id($id);

        echo json_encode($data);
    }

    public function Get_pengguna_by_filter()
    {
        $pengguna = $this->input->get('pengguna');

        $data = $this->M_Pengguna->Get_pengguna_by_filter($pengguna);

        echo json_encode($data);
    }

    public function search_pengguna()
    {
        $search = $this->input->get('query');

        $data = array();
        $arr_pengguna = $this->M_Pengguna->search_pengguna($search);

        foreach ($arr_pengguna as $value) {
            $value["data"] = $value["id"];
            $value["value"] = $value["nama"];

            array_push($data, $value);
        }

        $hasil = array();
        $hasil["suggestions"] = $data;
        echo json_encode($hasil);
    }

    public function Get_pengguna_not_in_selected_pengguna()
    {
        $filter_pengguna_id = array();
        $arr_list_pengguna = $this->input->post('arr_list_pengguna');

        if (isset($arr_list_pengguna)) {
            if (count($arr_list_pengguna) > 0) {
                foreach ($arr_list_pengguna as $value) {
                    if ($value['pengguna_id'] != "" && $value['pengguna_id'] != null) {
                        array_push($filter_pengguna_id, "'" . $value['pengguna_id'] . "'");
                    }
                }
            }
        }

        $data = $this->M_Pengguna->Get_pengguna_not_in_selected_pengguna($filter_pengguna_id);

        echo json_encode($data);
    }

    public function insert_pengguna()
    {

        $table = "pengguna";
        $column = "pengguna_id";
        $kode = "USR";

        $pengguna_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);

        // $pengguna_id = $this->input->post('pengguna_id');
        $pengguna_username = $this->input->post('pengguna_username');
        $pengguna_password = md5($this->input->post('pengguna_password'));
        $pengguna_perusahaan = $this->input->post('pengguna_perusahaan');
        $karyawan_id = $this->input->post('karyawan_id');
        $add_by = $this->session->userdata('pengguna_username');
        $updwho = $this->session->userdata('pengguna_username');
        $updtgl = date('Y-m-d');
        $is_aktif = $this->input->post('is_aktif');
        $pengguna_email = $this->input->post('pengguna_email');
        $is_delete = "";

        $cek_email = $this->M_Pengguna->Cek_pengguna_email($pengguna_email);
        $cek_username = $this->M_Pengguna->Cek_pengguna_username($pengguna_username);

        if ($cek_email > 0) {
            echo json_encode(array("status" => 2, "data" => "Email " . $pengguna_email . " Sudah Ada"));
            die;
        }

        if ($cek_username > 0) {
            echo json_encode(array("status" => 2, "data" => "Username " . $pengguna_username . " Sudah Ada"));
            die;
        }

        $this->db->trans_begin();

        $this->M_Pengguna->insert_pengguna($pengguna_id, $pengguna_username, $pengguna_password, $pengguna_perusahaan, $karyawan_id, $add_by, $updwho, $updtgl, $is_aktif, $pengguna_email, $is_delete);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_pengguna()
    {
        $pengguna_id = $this->input->post('pengguna_id');
        $pengguna_username = $this->input->post('pengguna_username');
        $pengguna_password = md5($this->input->post('pengguna_password'));
        $pengguna_perusahaan = $this->input->post('pengguna_perusahaan');
        $karyawan_id = $this->input->post('karyawan_id');
        $add_by = $this->session->userdata('pengguna_username');
        $updwho = $this->session->userdata('pengguna_username');
        $updtgl = date('Y-m-d');
        $is_aktif = $this->input->post('is_aktif');
        $pengguna_email = $this->input->post('pengguna_email');
        $is_delete = "";

        $cek_email = $this->M_Pengguna->Cek_pengguna_email_not_in_user($pengguna_id, $pengguna_email);
        $cek_username = $this->M_Pengguna->Cek_pengguna_username_not_in_user($pengguna_id, $pengguna_username);

        if ($cek_email > 0) {
            echo json_encode(array("status" => 2, "data" => "Email " . $pengguna_email . " Sudah Ada"));
            die;
        }

        if ($cek_username > 0) {
            echo json_encode(array("status" => 2, "data" => "Username " . $pengguna_username . " Sudah Ada"));
            die;
        }

        $this->db->trans_begin();

        $this->M_Pengguna->update_pengguna($pengguna_id, $pengguna_username, $pengguna_password, $pengguna_perusahaan, $karyawan_id, $add_by, $updwho, $updtgl, $is_aktif, $pengguna_email, $is_delete);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
