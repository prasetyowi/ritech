<?php

class OrangTua extends CI_Controller
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
        // $this->load->model('WMS/M_Orang_tua', 'M_Orang_tua');
        // $this->load->model('WMS/M_DeliveryOrder', 'M_DeliveryOrder');
        // $this->load->model('WMS/M_DeliveryOrderDetailDraft', 'M_DeliveryOrderDetailDraft');
        // $this->load->model('WMS/M_PersetujuanPembongkaranorang_tua', 'M_PersetujuanPembongkaranorang_tua');
        // $this->load->model('M_ClientPt');
        // $this->load->model('M_Area');
        // $this->load->model('M_StatusProgress');
        // $this->load->model('M_SKU');
        // $this->load->model('M_Principle');
        // $this->load->model('M_TipeDeliveryOrder');
        // $this->load->model('M_AutoGen');
        $this->load->model('M_Vrbl');
        $this->load->model('M_Orang_tua');
    }

    public function index()
    {
        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        if (!$this->session->has_userdata('pengguna_id') || $this->session->userdata('pengguna_level') != 'administrator') {
            redirect(base_url('Auth/login'));
        }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        // $query['Title'] = Get_Title_Name();
        // $query['Copyright'] = Get_Copyright_Name();

        $data['Title'] = "Orang Tua";
        $data['act'] = "index";

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        // $this->load->view('layouts/header', $query);
        // $this->load->view('pages/Quotation/index', $data);
        // $this->load->view('layouts/footer', $query);
        // $this->load->view('pages/Quotation/script', $data);

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/orang_tua/index', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/orang_tua/script', $data);
    }

    public function Get_all_orang_tua()
    {
        $data = $this->M_Orang_tua->Get_all_orang_tua();

        echo json_encode($data);
    }

    public function Get_orang_tua_by_id()
    {
        $id = $this->input->get('id');
        $data = $this->M_Orang_tua->Get_orang_tua_by_id($id);

        echo json_encode($data);
    }

    public function Get_orang_tua_by_filter()
    {
        $orang_tua = $this->input->get('orang_tua');

        $data = $this->M_Orang_tua->Get_orang_tua_by_filter($orang_tua);

        echo json_encode($data);
    }

    public function search_orang_tua()
    {
        $search = $this->input->get('query');

        $data = array();
        $arr_orang_tua = $this->M_Orang_tua->search_orang_tua($search);

        foreach ($arr_orang_tua as $value) {
            $value["data"] = $value["id"];
            $value["value"] = $value["nama"];

            array_push($data, $value);
        }

        $hasil = array();
        $hasil["suggestions"] = $data;
        echo json_encode($hasil);
    }

    public function insert_orang_tua()
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
        $orang_tua_email = $this->input->post('pengguna_email');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $is_aktif = $this->input->post('is_aktif');

        $this->db->trans_begin();

        $this->M_Orang_tua->insert_orang_tua($orang_tua_id, $orang_tua_nama, $orang_tua_alamat, $orang_tua_kelurahan, $orang_tua_kecamatan, $orang_tua_kota, $orang_tua_provinsi, $orang_tua_negara, $orang_tua_telp, $orang_tua_kode_pos, $orang_tua_email, $is_aktif, $tgl_lahir, $jenis_kelamin);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_orang_tua()
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
        $orang_tua_email = $this->input->post('pengguna_email');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $is_aktif = $this->input->post('is_aktif');

        $this->db->trans_begin();

        $this->M_Orang_tua->update_orang_tua($orang_tua_id, $orang_tua_nama, $orang_tua_alamat, $orang_tua_kelurahan, $orang_tua_kecamatan, $orang_tua_kota, $orang_tua_provinsi, $orang_tua_negara, $orang_tua_telp, $orang_tua_kode_pos, $orang_tua_email, $is_aktif, $tgl_lahir, $jenis_kelamin);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
