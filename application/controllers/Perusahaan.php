<?php

class Perusahaan extends CI_Controller
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
        // $this->load->model('WMS/M_Perusahaan', 'M_Perusahaan');
        // $this->load->model('WMS/M_DeliveryOrder', 'M_DeliveryOrder');
        // $this->load->model('WMS/M_DeliveryOrderDetailDraft', 'M_DeliveryOrderDetailDraft');
        // $this->load->model('WMS/M_PersetujuanPembongkaranperusahaan', 'M_PersetujuanPembongkaranperusahaan');
        // $this->load->model('M_ClientPt');
        // $this->load->model('M_Area');
        // $this->load->model('M_StatusProgress');
        // $this->load->model('M_SKU');
        // $this->load->model('M_Principle');
        // $this->load->model('M_TipeDeliveryOrder');
        // $this->load->model('M_AutoGen');
        $this->load->model('M_Vrbl');
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

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        // $this->load->view('layouts/header', $query);
        // $this->load->view('pages/Quotation/index', $data);
        // $this->load->view('layouts/footer', $query);
        // $this->load->view('pages/Quotation/script', $data);

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/perusahaan/index', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/perusahaan/script', $data);
    }

    public function Get_all_perusahaan()
    {
        $data = $this->M_Perusahaan->Get_all_perusahaan();

        echo json_encode($data);
    }

    public function Get_all_perusahaan_by_id()
    {
        $id = $this->input->get('id');
        $data = $this->M_Perusahaan->Get_all_perusahaan_by_id($id);

        echo json_encode($data);
    }

    public function Get_perusahaan_by_filter()
    {
        $perusahaan = $this->input->get('perusahaan');

        $data = $this->M_Perusahaan->Get_perusahaan_by_filter($perusahaan);

        echo json_encode($data);
    }

    public function search_perusahaan()
    {
        $search = $this->input->get('query');

        $data = array();
        $arr_perusahaan = $this->M_Perusahaan->search_perusahaan($search);

        foreach ($arr_perusahaan as $value) {
            $value["data"] = $value["id"];
            $value["value"] = $value["nama"];

            array_push($data, $value);
        }

        $hasil = array();
        $hasil["suggestions"] = $data;
        echo json_encode($hasil);
    }

    public function Get_perusahaan_not_in_selected_perusahaan()
    {
        $filter_perusahaan_id = array();
        $arr_list_perusahaan = $this->input->post('arr_list_perusahaan');

        if (isset($arr_list_perusahaan)) {
            if (count($arr_list_perusahaan) > 0) {
                foreach ($arr_list_perusahaan as $value) {
                    if ($value['perusahaan_id'] != "" && $value['perusahaan_id'] != null) {
                        array_push($filter_perusahaan_id, "'" . $value['perusahaan_id'] . "'");
                    }
                }
            }
        }

        $data = $this->M_Perusahaan->Get_perusahaan_not_in_selected_perusahaan($filter_perusahaan_id);

        echo json_encode($data);
    }

    public function insert_perusahaan()
    {

        $table = "perusahaan";
        $column = "perusahaan_id";
        $kode = "SP";

        $perusahaan_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);

        // $perusahaan_id = $this->input->post('perusahaan_id');
        $perusahaan_nama = $this->input->post('perusahaan_nama');
        $perusahaan_alamat = $this->input->post('perusahaan_alamat');
        $perusahaan_kelurahan = $this->input->post('perusahaan_kelurahan');
        $perusahaan_kecamatan = $this->input->post('perusahaan_kecamatan');
        $perusahaan_kota = $this->input->post('perusahaan_kota');
        $perusahaan_provinsi = $this->input->post('perusahaan_provinsi');
        $perusahaan_negara = $this->input->post('perusahaan_negara');
        $perusahaan_telp = $this->input->post('perusahaan_telp');
        $perusahaan_kode_pos = $this->input->post('perusahaan_kode_pos');
        $perusahaan_email = $this->input->post('perusahaan_email');
        $perusahaan_npwp = $this->input->post('perusahaan_npwp');
        $perusahaan_nama_contact_person = $this->input->post('perusahaan_nama_contact_person');
        $perusahaan_telp_contact_person = $this->input->post('perusahaan_telp_contact_person');
        $is_aktif = $this->input->post('is_aktif');

        $this->db->trans_begin();

        $this->M_Perusahaan->insert_perusahaan($perusahaan_id, $perusahaan_nama, $perusahaan_alamat, $perusahaan_kelurahan, $perusahaan_kecamatan, $perusahaan_kota, $perusahaan_provinsi, $perusahaan_negara, $perusahaan_telp, $perusahaan_kode_pos, $perusahaan_email, $perusahaan_npwp, $perusahaan_nama_contact_person, $perusahaan_telp_contact_person, $is_aktif);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_perusahaan()
    {
        $perusahaan_id = $this->input->post('perusahaan_id');
        $perusahaan_nama = $this->input->post('perusahaan_nama');
        $perusahaan_alamat = $this->input->post('perusahaan_alamat');
        $perusahaan_kelurahan = $this->input->post('perusahaan_kelurahan');
        $perusahaan_kecamatan = $this->input->post('perusahaan_kecamatan');
        $perusahaan_kota = $this->input->post('perusahaan_kota');
        $perusahaan_provinsi = $this->input->post('perusahaan_provinsi');
        $perusahaan_negara = $this->input->post('perusahaan_negara');
        $perusahaan_telp = $this->input->post('perusahaan_telp');
        $perusahaan_kode_pos = $this->input->post('perusahaan_kode_pos');
        $perusahaan_email = $this->input->post('perusahaan_email');
        $perusahaan_npwp = $this->input->post('perusahaan_npwp');
        $perusahaan_nama_contact_person = $this->input->post('perusahaan_nama_contact_person');
        $perusahaan_telp_contact_person = $this->input->post('perusahaan_telp_contact_person');
        $is_aktif = $this->input->post('is_aktif');

        $this->db->trans_begin();

        $this->M_Perusahaan->update_perusahaan($perusahaan_id, $perusahaan_nama, $perusahaan_alamat, $perusahaan_kelurahan, $perusahaan_kecamatan, $perusahaan_kota, $perusahaan_provinsi, $perusahaan_negara, $perusahaan_telp, $perusahaan_kode_pos, $perusahaan_email, $perusahaan_npwp, $perusahaan_nama_contact_person, $perusahaan_telp_contact_person, $is_aktif);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
