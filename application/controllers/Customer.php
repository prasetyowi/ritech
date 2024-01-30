<?php

class Customer extends CI_Controller
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
        // $this->load->model('WMS/M_Customer', 'M_Customer');
        // $this->load->model('WMS/M_DeliveryOrder', 'M_DeliveryOrder');
        // $this->load->model('WMS/M_DeliveryOrderDetailDraft', 'M_DeliveryOrderDetailDraft');
        // $this->load->model('WMS/M_PersetujuanPembongkaranCustomer', 'M_PersetujuanPembongkaranCustomer');
        // $this->load->model('M_ClientPt');
        // $this->load->model('M_Area');
        // $this->load->model('M_StatusProgress');
        // $this->load->model('M_SKU');
        // $this->load->model('M_Principle');
        // $this->load->model('M_TipeDeliveryOrder');
        // $this->load->model('M_AutoGen');
        $this->load->model('M_Vrbl');
        $this->load->model('M_Customer');
    }

    public function index()
    {
        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        // if (!$this->session->has_userdata('pengguna_id')) {
        // 	redirect(base_url('MainPage'));
        // }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        // $query['Title'] = Get_Title_Name();
        // $query['Copyright'] = Get_Copyright_Name();

        $data['act'] = "index";

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        // $this->load->view('layouts/header', $query);
        // $this->load->view('pages/Quotation/index', $data);
        // $this->load->view('layouts/footer', $query);
        // $this->load->view('pages/Quotation/script', $data);

        $this->load->view('layouts/header');
        $this->load->view('pages/Customer/index');
        $this->load->view('layouts/footer');
        $this->load->view('pages/Customer/script');
    }

    public function Get_all_customer()
    {
        $data = $this->M_Customer->Get_all_customer();

        echo json_encode($data);
    }

    public function Get_all_customer_by_id()
    {
        $id = $this->input->get('id');
        $data = $this->M_Customer->Get_all_customer_by_id($id);

        echo json_encode($data);
    }

    public function Get_customer_by_filter()
    {
        $customer = $this->input->get('customer');

        $data = $this->M_Customer->Get_customer_by_filter($customer);

        echo json_encode($data);
    }

    public function search_customer()
    {
        $search = $this->input->get('query');

        $data = array();
        $arr_customer = $this->M_Customer->search_customer($search);

        foreach ($arr_customer as $value) {
            $value["data"] = $value["id"];
            $value["value"] = $value["nama"];

            array_push($data, $value);
        }

        $hasil = array();
        $hasil["suggestions"] = $data;
        echo json_encode($hasil);
    }

    public function Get_customer_not_in_selected_customer()
    {
        $filter_customer_id = array();
        $arr_list_customer = $this->input->post('arr_list_customer');

        if (isset($arr_list_customer)) {
            if (count($arr_list_customer) > 0) {
                foreach ($arr_list_customer as $value) {
                    if ($value['customer_id'] != "" && $value['customer_id'] != null) {
                        array_push($filter_customer_id, "'" . $value['customer_id'] . "'");
                    }
                }
            }
        }

        $data = $this->M_Customer->Get_customer_not_in_selected_customer($filter_customer_id);

        echo json_encode($data);
    }

    public function insert_customer()
    {

        $table = "customer";
        $column = "customer_id";
        $kode = "CS";

        $customer_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);

        // $customer_id = $this->input->post('customer_id');
        $customer_nama = $this->input->post('customer_nama');
        $customer_alamat = $this->input->post('customer_alamat');
        $customer_kelurahan = $this->input->post('customer_kelurahan');
        $customer_kecamatan = $this->input->post('customer_kecamatan');
        $customer_kota = $this->input->post('customer_kota');
        $customer_provinsi = $this->input->post('customer_provinsi');
        $customer_negara = $this->input->post('customer_negara');
        $customer_telp = $this->input->post('customer_telp');
        $customer_kode_pos = $this->input->post('customer_kode_pos');
        $customer_email = $this->input->post('customer_email');

        $this->db->trans_begin();

        $this->M_Customer->insert_customer($customer_id, $customer_nama, $customer_alamat, $customer_kelurahan, $customer_kecamatan, $customer_kota, $customer_provinsi, $customer_negara, $customer_telp, $customer_kode_pos, $customer_email);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_customer()
    {
        $customer_id = $this->input->post('customer_id');
        $customer_nama = $this->input->post('customer_nama');
        $customer_alamat = $this->input->post('customer_alamat');
        $customer_kelurahan = $this->input->post('customer_kelurahan');
        $customer_kecamatan = $this->input->post('customer_kecamatan');
        $customer_kota = $this->input->post('customer_kota');
        $customer_provinsi = $this->input->post('customer_provinsi');
        $customer_negara = $this->input->post('customer_negara');
        $customer_telp = $this->input->post('customer_telp');
        $customer_kode_pos = $this->input->post('customer_kode_pos');
        $customer_email = $this->input->post('customer_email');

        $this->db->trans_begin();

        $this->M_Customer->update_customer($customer_id, $customer_nama, $customer_alamat, $customer_kelurahan, $customer_kecamatan, $customer_kota, $customer_provinsi, $customer_negara, $customer_telp, $customer_kode_pos, $customer_email);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
