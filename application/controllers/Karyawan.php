<?php

class Karyawan extends CI_Controller
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
        // $this->load->model('WMS/M_Karyawan', 'M_Karyawan');
        // $this->load->model('WMS/M_DeliveryOrder', 'M_DeliveryOrder');
        // $this->load->model('WMS/M_DeliveryOrderDetailDraft', 'M_DeliveryOrderDetailDraft');
        // $this->load->model('WMS/M_PersetujuanPembongkarankaryawan', 'M_PersetujuanPembongkarankaryawan');
        // $this->load->model('M_ClientPt');
        // $this->load->model('M_Area');
        // $this->load->model('M_StatusProgress');
        // $this->load->model('M_SKU');
        // $this->load->model('M_Principle');
        // $this->load->model('M_TipeDeliveryOrder');
        // $this->load->model('M_AutoGen');
        $this->load->model('M_Vrbl');
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
        $data['Level'] = $this->M_Karyawan->Get_karyawan_level();
        $data['Divisi'] = $this->M_Karyawan->Get_karyawan_divisi();

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        // $this->load->view('layouts/header', $query);
        // $this->load->view('pages/Quotation/index', $data);
        // $this->load->view('layouts/footer', $query);
        // $this->load->view('pages/Quotation/script', $data);

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/karyawan/index', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/karyawan/script', $data);
    }

    public function Get_all_karyawan()
    {
        $data = $this->M_Karyawan->Get_all_karyawan();

        echo json_encode($data);
    }

    public function Get_all_karyawan_by_id()
    {
        $id = $this->input->get('id');
        $data = $this->M_Karyawan->Get_all_karyawan_by_id($id);

        echo json_encode($data);
    }

    public function Get_karyawan_by_filter()
    {
        $karyawan = $this->input->get('karyawan');

        $data = $this->M_Karyawan->Get_karyawan_by_filter($karyawan);

        echo json_encode($data);
    }

    public function search_karyawan()
    {
        $search = $this->input->get('query');

        $data = array();
        $arr_karyawan = $this->M_Karyawan->search_karyawan($search);

        foreach ($arr_karyawan as $value) {
            $value["data"] = $value["id"];
            $value["value"] = $value["nama"];

            array_push($data, $value);
        }

        $hasil = array();
        $hasil["suggestions"] = $data;
        echo json_encode($hasil);
    }

    public function Get_karyawan_not_in_selected_karyawan()
    {
        $filter_karyawan_id = array();
        $arr_list_karyawan = $this->input->post('arr_list_karyawan');

        if (isset($arr_list_karyawan)) {
            if (count($arr_list_karyawan) > 0) {
                foreach ($arr_list_karyawan as $value) {
                    if ($value['karyawan_id'] != "" && $value['karyawan_id'] != null) {
                        array_push($filter_karyawan_id, "'" . $value['karyawan_id'] . "'");
                    }
                }
            }
        }

        $data = $this->M_Karyawan->Get_karyawan_not_in_selected_karyawan($filter_karyawan_id);

        echo json_encode($data);
    }

    public function insert_karyawan()
    {

        $table = "karyawan";
        $column = "karyawan_id";
        $kode = "KRW";

        $karyawan_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);

        // $karyawan_id = $this->input->post('karyawan_id');
        $karyawan_nama = $this->input->post('karyawan_nama');
        $karyawan_alamat = $this->input->post('karyawan_alamat');
        $karyawan_telp = $this->input->post('karyawan_telp');
        $karyawan_divisi = $this->input->post('karyawan_divisi');
        $karyawan_level = $this->input->post('karyawan_level');
        $perusahaan_id = $this->input->post('perusahaan_id');
        $is_aktif = $this->input->post('is_aktif');

        $this->db->trans_begin();

        $this->M_Karyawan->insert_karyawan($karyawan_id, $karyawan_nama, $karyawan_alamat, $karyawan_telp, $karyawan_divisi, $karyawan_level, $perusahaan_id, $is_aktif);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_karyawan()
    {
        $karyawan_id = $this->input->post('karyawan_id');
        $karyawan_nama = $this->input->post('karyawan_nama');
        $karyawan_alamat = $this->input->post('karyawan_alamat');
        $karyawan_telp = $this->input->post('karyawan_telp');
        $karyawan_divisi = $this->input->post('karyawan_divisi');
        $karyawan_level = $this->input->post('karyawan_level');
        $perusahaan_id = $this->input->post('perusahaan_id');
        $is_aktif = $this->input->post('is_aktif');

        $this->db->trans_begin();

        $this->M_Karyawan->update_karyawan($karyawan_id, $karyawan_nama, $karyawan_alamat, $karyawan_telp, $karyawan_divisi, $karyawan_level, $perusahaan_id, $is_aktif);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
