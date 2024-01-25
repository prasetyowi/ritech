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
        // $this->load->model('M_Vrbl');
        $this->load->model('M_Customer');
    }

    public function Get_all_customer()
    {
        $data = $this->M_Customer->Get_all_customer();

        echo json_encode($data);
    }

    public function Get_all_customer_by_id()
    {
        $id = $this->input->post('id');
        $data = $this->M_Customer->Get_all_customer_by_id($id);

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
        $customer_id = $this->input->post('customer_id');
        $customer_tanggal = $this->input->post('customer_tanggal');
        $customer_id = $this->input->post('customer_id');
        $customer_keterangan = $this->input->post('customer_keterangan');
        $customer_jumlah = $this->input->post('customer_jumlah');
        $customer_status = $this->input->post('customer_status');
        $updwho = $this->input->post('updwho');
        $updtgl = $this->input->post('updtgl');
        $customer_waktu_pengiriman = $this->input->post('customer_waktu_pengiriman');
        $customer_waktu_pengerjaan = $this->input->post('customer_waktu_pengerjaan');
        $periode_penawaran = $this->input->post('periode_penawaran');
        $garansi = $this->input->post('garansi');


        $detail = $this->input->post('detail');

        $cek_data = $this->M_Customer->cek_customer_duplicate($customer_id);

        if ($cek_data > 0) {
            echo json_encode(array("status" => 2, "data" => ""));
            die;
        }

        $this->db->trans_begin();

        $this->M_Customer->insert_customer($customer_id, $customer_tanggal, $customer_id, $customer_keterangan, $customer_jumlah, $customer_status, $updwho, $updtgl, $customer_waktu_pengiriman, $customer_waktu_pengerjaan, $periode_penawaran, $garansi);

        foreach ($detail as $key => $value) {
            // $customer_id = $value['customer_id'];
            $customer_no_item = $value['customer_no_item'];
            $customer_id = $value['customer_id'];
            $customer_qty = $value['customer_qty'];
            $harga_satuan = $value['harga_satuan'];
            $customer_total = $value['customer_total'];

            $this->M_Customer->insert_customer_detail($customer_id, $customer_no_item, $customer_id, $customer_qty, $harga_satuan, $customer_total);
        }


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
        $customer_tanggal = $this->input->post('customer_tanggal');
        $customer_id = $this->input->post('customer_id');
        $customer_keterangan = $this->input->post('customer_keterangan');
        $customer_jumlah = $this->input->post('customer_jumlah');
        $customer_status = $this->input->post('customer_status');
        $updwho = $this->input->post('updwho');
        $updtgl = $this->input->post('updtgl');
        $customer_waktu_pengiriman = $this->input->post('customer_waktu_pengiriman');
        $customer_waktu_pengerjaan = $this->input->post('customer_waktu_pengerjaan');
        $periode_penawaran = $this->input->post('periode_penawaran');
        $garansi = $this->input->post('garansi');


        $detail = $this->input->post('detail');

        $this->db->trans_begin();

        $this->M_Customer->update_customer($customer_id, $customer_tanggal, $customer_id, $customer_keterangan, $customer_jumlah, $customer_status, $updwho, $updtgl, $customer_waktu_pengiriman, $customer_waktu_pengerjaan, $periode_penawaran, $garansi);

        $this->M_Customer->delete_customer_detail($customer_id);

        foreach ($detail as $key => $value) {
            // $customer_id = $value['customer_id'];
            $customer_no_item = $value['customer_no_item'];
            $customer_id = $value['customer_id'];
            $customer_qty = $value['customer_qty'];
            $harga_satuan = $value['harga_satuan'];
            $customer_total = $value['customer_total'];

            $this->M_Customer->insert_customer_detail($customer_id, $customer_no_item, $customer_id, $customer_qty, $harga_satuan, $customer_total);
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
