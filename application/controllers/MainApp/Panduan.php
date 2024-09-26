<?php

class Panduan extends CI_Controller
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
        // $this->load->model('M_Barang');
    }

    public function PanduanPengukuranStunting()
    {
        $data = array();

        $data['Title'] = "Panduan";
        $data['act'] = "index";

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/panduan/pengukuran_stunting', $data);
        $this->load->view('layouts/footer_web', $data);
    }

    public function PanduanLaporan()
    {
        $data = array();

        $data['Title'] = "Panduan";
        $data['act'] = "index";

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/panduan/laporan_stunting', $data);
        $this->load->view('layouts/footer_web', $data);
    }

    public function InformasiGizi()
    {
        $data = array();

        $data['Title'] = "Panduan";
        $data['act'] = "index";

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/panduan/informasi_gizi', $data);
        $this->load->view('layouts/footer_web', $data);
    }
}
