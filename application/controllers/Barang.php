<?php

class Barang extends CI_Controller
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
        // $this->load->model('WMS/M_Barang', 'M_Barang');
        // $this->load->model('WMS/M_DeliveryOrder', 'M_DeliveryOrder');
        // $this->load->model('WMS/M_DeliveryOrderDetailDraft', 'M_DeliveryOrderDetailDraft');
        // $this->load->model('WMS/M_PersetujuanPembongkaranBarang', 'M_PersetujuanPembongkaranBarang');
        // $this->load->model('M_ClientPt');
        // $this->load->model('M_Area');
        // $this->load->model('M_StatusProgress');
        // $this->load->model('M_SKU');
        // $this->load->model('M_Principle');
        // $this->load->model('M_TipeDeliveryOrder');
        // $this->load->model('M_AutoGen');
        $this->load->model('M_Vrbl');
        $this->load->model('M_Barang');
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
        $this->load->view('pages/Barang/index');
        $this->load->view('layouts/footer');
        $this->load->view('pages/Barang/script');
    }
    public function Get_all_barang()
    {
        $data = $this->M_Barang->Get_all_barang();

        echo json_encode($data);
    }

    public function Get_all_barang_by_id()
    {
        $id = $this->input->get('id');

        $data = $this->M_Barang->Get_all_barang_by_id($id);

        echo json_encode($data);
    }

    public function Get_barang_by_filter()
    {
        $barang = $this->input->get('barang');

        $data = $this->M_Barang->Get_barang_by_filter($barang);

        echo json_encode($data);
    }

    public function Get_barang_not_in_selected_barang()
    {
        $filter_barang_id = array();
        $arr_list_barang = $this->input->post('arr_list_barang');

        if (isset($arr_list_barang)) {
            if (count($arr_list_barang) > 0) {
                foreach ($arr_list_barang as $value) {
                    if ($value['barang_id'] != "" && $value['barang_id'] != null) {
                        array_push($filter_barang_id, "'" . $value['barang_id'] . "'");
                    }
                }
            }
        }

        $data = $this->M_Barang->Get_barang_not_in_selected_barang($filter_barang_id);

        echo json_encode($data);
    }

    public function insert_barang()
    {
        $table = "barang";
        $column = "barang_id";
        $kode = "BRG";

        $barang_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);

        $barang_nama = $this->input->post('barang_nama');
        $harga_satuan = $this->input->post('harga_satuan');
        $barang_desc = $this->input->post('barang_desc');
        $unit = $this->input->post('unit');

        // $cek_data = $this->M_Barang->cek_Barang_duplicate($barang_id);

        // if ($cek_data > 0) {
        //     echo json_encode(array("status" => 2, "data" => ""));
        //     die;
        // }

        $this->db->trans_begin();

        $this->M_Barang->insert_barang($barang_id, $barang_nama, $harga_satuan, $barang_desc, $unit);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_barang()
    {
        $barang_id = $this->input->post('barang_id');
        $barang_nama = $this->input->post('barang_nama');
        $harga_satuan = $this->input->post('harga_satuan');
        $barang_desc = $this->input->post('barang_desc');
        $unit = $this->input->post('unit');

        // $cek_data = $this->M_Barang->cek_Barang_duplicate($barang_id);

        // if ($cek_data > 0) {
        //     echo json_encode(array("status" => 2, "data" => ""));
        //     die;
        // }

        $this->db->trans_begin();

        $this->M_Barang->update_barang($barang_id, $barang_nama, $harga_satuan, $barang_desc, $unit);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
