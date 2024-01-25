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
        // $this->load->model('M_Vrbl');
        $this->load->model('M_Barang');
    }

    public function Get_all_barang()
    {
        $data = $this->M_Barang->Get_all_barang();

        echo json_encode($data);
    }

    public function Get_all_barang_by_id()
    {
        $id = $this->input->post('id');
        $data = $this->M_Barang->Get_all_barang_by_id($id);

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

    public function insert_Barang()
    {
        $Barang_id = $this->input->post('Barang_id');
        $Barang_tanggal = $this->input->post('Barang_tanggal');
        $customer_id = $this->input->post('customer_id');
        $Barang_keterangan = $this->input->post('Barang_keterangan');
        $Barang_jumlah = $this->input->post('Barang_jumlah');
        $Barang_status = $this->input->post('Barang_status');
        $updwho = $this->input->post('updwho');
        $updtgl = $this->input->post('updtgl');
        $Barang_waktu_pengiriman = $this->input->post('Barang_waktu_pengiriman');
        $Barang_waktu_pengerjaan = $this->input->post('Barang_waktu_pengerjaan');
        $periode_penawaran = $this->input->post('periode_penawaran');
        $garansi = $this->input->post('garansi');


        $detail = $this->input->post('detail');

        $cek_data = $this->M_Barang->cek_Barang_duplicate($Barang_id);

        if ($cek_data > 0) {
            echo json_encode(array("status" => 2, "data" => ""));
            die;
        }

        $this->db->trans_begin();

        $this->M_Barang->insert_Barang($Barang_id, $Barang_tanggal, $customer_id, $Barang_keterangan, $Barang_jumlah, $Barang_status, $updwho, $updtgl, $Barang_waktu_pengiriman, $Barang_waktu_pengerjaan, $periode_penawaran, $garansi);

        foreach ($detail as $key => $value) {
            // $Barang_id = $value['Barang_id'];
            $Barang_no_item = $value['Barang_no_item'];
            $barang_id = $value['barang_id'];
            $Barang_qty = $value['Barang_qty'];
            $harga_satuan = $value['harga_satuan'];
            $Barang_total = $value['Barang_total'];

            $this->M_Barang->insert_Barang_detail($Barang_id, $Barang_no_item, $barang_id, $Barang_qty, $harga_satuan, $Barang_total);
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_Barang()
    {
        $Barang_id = $this->input->post('Barang_id');
        $Barang_tanggal = $this->input->post('Barang_tanggal');
        $customer_id = $this->input->post('customer_id');
        $Barang_keterangan = $this->input->post('Barang_keterangan');
        $Barang_jumlah = $this->input->post('Barang_jumlah');
        $Barang_status = $this->input->post('Barang_status');
        $updwho = $this->input->post('updwho');
        $updtgl = $this->input->post('updtgl');
        $Barang_waktu_pengiriman = $this->input->post('Barang_waktu_pengiriman');
        $Barang_waktu_pengerjaan = $this->input->post('Barang_waktu_pengerjaan');
        $periode_penawaran = $this->input->post('periode_penawaran');
        $garansi = $this->input->post('garansi');


        $detail = $this->input->post('detail');

        $this->db->trans_begin();

        $this->M_Barang->update_Barang($Barang_id, $Barang_tanggal, $customer_id, $Barang_keterangan, $Barang_jumlah, $Barang_status, $updwho, $updtgl, $Barang_waktu_pengiriman, $Barang_waktu_pengerjaan, $periode_penawaran, $garansi);

        $this->M_Barang->delete_Barang_detail($Barang_id);

        foreach ($detail as $key => $value) {
            // $Barang_id = $value['Barang_id'];
            $Barang_no_item = $value['Barang_no_item'];
            $barang_id = $value['barang_id'];
            $Barang_qty = $value['Barang_qty'];
            $harga_satuan = $value['harga_satuan'];
            $Barang_total = $value['Barang_total'];

            $this->M_Barang->insert_Barang_detail($Barang_id, $Barang_no_item, $barang_id, $Barang_qty, $harga_satuan, $Barang_total);
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
