<?php

class Dashboard extends CI_Controller
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

        // $data['Title'] = Get_Title_Name();
        // $data['Copyright'] = Get_Copyright_Name();

        $data['Title'] = "Dashboard";
        $data['act'] = "index";

        $pemasukan_bulan_ini = $this->db->query("SELECT
                                                    SUM(pd.penjualan_total) AS penjualan_total
                                                FROM penjualan p
                                                LEFT JOIN penjualan_detail pd
                                                ON pd.penjualan_id = p.penjualan_id
                                                WHERE YEAR(p.penjualan_tanggal) = '" . date('Y') . "' AND MONTH(p.penjualan_tanggal) = '" . date('m') . "' AND p.penjualan_status = 'Applied'");
        if ($pemasukan_bulan_ini->num_rows() == 0) {
            $pemasukan_bulan_ini = 0;
        } else {
            $pemasukan_bulan_ini = $pemasukan_bulan_ini->row(0)->penjualan_total;
        }

        if (date('m') == "01") {
            $tahun = date('Y') - 1;
            $bulan = 12;
            $pemasukan_bulan_lalu = $this->db->query("SELECT
                                                    SUM(pd.penjualan_total) AS penjualan_total
                                                FROM penjualan p
                                                LEFT JOIN penjualan_detail pd
                                                ON pd.penjualan_id = p.penjualan_id
                                                WHERE YEAR(p.penjualan_tanggal) = '" . $tahun . "' AND MONTH(p.penjualan_tanggal) = '" . $bulan . "' AND p.penjualan_status = 'Applied'");
            if ($pemasukan_bulan_lalu->num_rows() == 0) {
                $pemasukan_bulan_lalu = 0;
            } else {
                $pemasukan_bulan_lalu = $pemasukan_bulan_lalu->row(0)->penjualan_total;
            }
        } else {
            $tahun = date('Y');
            $bulan = date('m') - 1;

            $pemasukan_bulan_lalu = $this->db->query("SELECT
                                                    SUM(pd.penjualan_total) AS penjualan_total
                                                FROM penjualan p
                                                LEFT JOIN penjualan_detail pd
                                                ON pd.penjualan_id = p.penjualan_id
                                                WHERE YEAR(p.penjualan_tanggal) = '" . $tahun . "' AND MONTH(p.penjualan_tanggal) = '" . $bulan . "' AND p.penjualan_status = 'Applied'");
            if ($pemasukan_bulan_lalu->num_rows() == 0) {
                $pemasukan_bulan_lalu = 0;
            } else {
                $pemasukan_bulan_lalu = $pemasukan_bulan_lalu->row(0)->penjualan_total;
            }
        }

        $pengeluaran_bulan_ini = $this->db->query("SELECT
                                                    SUM(kas_jumlah) AS kas_jumlah
                                                FROM kas
                                                WHERE YEAR(kas_tanggal) = '" . date('Y') . "' AND MONTH(kas_tanggal) = '" . date('m') . "' AND kas_status = 'Applied'");
        if ($pengeluaran_bulan_ini->num_rows() == 0) {
            $pengeluaran_bulan_ini = 0;
        } else {
            $pengeluaran_bulan_ini = $pengeluaran_bulan_ini->row(0)->kas_jumlah;
        }

        $data['pemasukan_bulan_ini'] = $pemasukan_bulan_ini;
        $data['pemasukan_bulan_lalu'] = $pemasukan_bulan_lalu;
        $data['pengeluaran_bulan_ini'] = $pengeluaran_bulan_ini;

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        // $this->load->view('layouts/header', $data);
        // $this->load->view('pages/Quotation/index', $data);
        // $this->load->view('layouts/footer', $data);
        // $this->load->view('pages/Quotation/script', $data);

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/Dashboard/index', $data);
        $this->load->view('layouts/footer', $data);
    }
}
