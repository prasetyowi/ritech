<?php

class Supplier extends CI_Controller
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
        // $this->load->model('WMS/M_Supplier', 'M_Supplier');
        // $this->load->model('WMS/M_DeliveryOrder', 'M_DeliveryOrder');
        // $this->load->model('WMS/M_DeliveryOrderDetailDraft', 'M_DeliveryOrderDetailDraft');
        // $this->load->model('WMS/M_PersetujuanPembongkaransupplier', 'M_PersetujuanPembongkaransupplier');
        // $this->load->model('M_ClientPt');
        // $this->load->model('M_Area');
        // $this->load->model('M_StatusProgress');
        // $this->load->model('M_SKU');
        // $this->load->model('M_Principle');
        // $this->load->model('M_TipeDeliveryOrder');
        // $this->load->model('M_AutoGen');
        $this->load->model('M_Vrbl');
        $this->load->model('M_Supplier');
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
        $this->load->view('pages/supplier/index', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/supplier/script', $data);
    }

    public function Get_all_supplier()
    {
        $data = $this->M_Supplier->Get_all_supplier();

        echo json_encode($data);
    }

    public function Get_all_supplier_by_id()
    {
        $id = $this->input->get('id');
        $data = $this->M_Supplier->Get_all_supplier_by_id($id);

        echo json_encode($data);
    }

    public function Get_supplier_by_filter()
    {
        $supplier = $this->input->get('supplier');

        $data = $this->M_Supplier->Get_supplier_by_filter($supplier);

        echo json_encode($data);
    }

    public function search_supplier()
    {
        $search = $this->input->get('query');

        $data = array();
        $arr_supplier = $this->M_Supplier->search_supplier($search);

        foreach ($arr_supplier as $value) {
            $value["data"] = $value["id"];
            $value["value"] = $value["nama"];

            array_push($data, $value);
        }

        $hasil = array();
        $hasil["suggestions"] = $data;
        echo json_encode($hasil);
    }

    public function Get_supplier_not_in_selected_supplier()
    {
        $filter_supplier_id = array();
        $arr_list_supplier = $this->input->post('arr_list_supplier');

        if (isset($arr_list_supplier)) {
            if (count($arr_list_supplier) > 0) {
                foreach ($arr_list_supplier as $value) {
                    if ($value['supplier_id'] != "" && $value['supplier_id'] != null) {
                        array_push($filter_supplier_id, "'" . $value['supplier_id'] . "'");
                    }
                }
            }
        }

        $data = $this->M_Supplier->Get_supplier_not_in_selected_supplier($filter_supplier_id);

        echo json_encode($data);
    }

    public function insert_supplier()
    {

        $table = "supplier";
        $column = "supplier_id";
        $kode = "SP";

        $supplier_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);

        // $supplier_id = $this->input->post('supplier_id');
        $supplier_nama = $this->input->post('supplier_nama');
        $supplier_alamat = $this->input->post('supplier_alamat');
        $supplier_kelurahan = $this->input->post('supplier_kelurahan');
        $supplier_kecamatan = $this->input->post('supplier_kecamatan');
        $supplier_kota = $this->input->post('supplier_kota');
        $supplier_provinsi = $this->input->post('supplier_provinsi');
        $supplier_negara = $this->input->post('supplier_negara');
        $supplier_telp = $this->input->post('supplier_telp');
        $supplier_kode_pos = $this->input->post('supplier_kode_pos');
        $supplier_email = $this->input->post('supplier_email');
        $supplier_npwp = $this->input->post('supplier_npwp');
        $supplier_nama_contact_person = $this->input->post('supplier_nama_contact_person');
        $supplier_telp_contact_person = $this->input->post('supplier_telp_contact_person');
        $is_aktif = $this->input->post('is_aktif');

        $this->db->trans_begin();

        $this->M_Supplier->insert_supplier($supplier_id, $supplier_nama, $supplier_alamat, $supplier_kelurahan, $supplier_kecamatan, $supplier_kota, $supplier_provinsi, $supplier_negara, $supplier_telp, $supplier_kode_pos, $supplier_email, $supplier_npwp, $supplier_nama_contact_person, $supplier_telp_contact_person, $is_aktif);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_supplier()
    {
        $supplier_id = $this->input->post('supplier_id');
        $supplier_nama = $this->input->post('supplier_nama');
        $supplier_alamat = $this->input->post('supplier_alamat');
        $supplier_kelurahan = $this->input->post('supplier_kelurahan');
        $supplier_kecamatan = $this->input->post('supplier_kecamatan');
        $supplier_kota = $this->input->post('supplier_kota');
        $supplier_provinsi = $this->input->post('supplier_provinsi');
        $supplier_negara = $this->input->post('supplier_negara');
        $supplier_telp = $this->input->post('supplier_telp');
        $supplier_kode_pos = $this->input->post('supplier_kode_pos');
        $supplier_email = $this->input->post('supplier_email');
        $supplier_npwp = $this->input->post('supplier_npwp');
        $supplier_nama_contact_person = $this->input->post('supplier_nama_contact_person');
        $supplier_telp_contact_person = $this->input->post('supplier_telp_contact_person');
        $is_aktif = $this->input->post('is_aktif');

        $this->db->trans_begin();

        $this->M_Supplier->update_supplier($supplier_id, $supplier_nama, $supplier_alamat, $supplier_kelurahan, $supplier_kecamatan, $supplier_kota, $supplier_provinsi, $supplier_negara, $supplier_telp, $supplier_kode_pos, $supplier_email, $supplier_npwp, $supplier_nama_contact_person, $supplier_telp_contact_person, $is_aktif);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
