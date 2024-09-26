<?php

class Laporan extends CI_Controller
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

        $this->load->model('M_PengukuranStunting');
        $this->load->model('M_Vrbl');
    }

    public function index()
    {
        $data = array();

        if (!$this->session->has_userdata('pengguna_id')) {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Laporan Pengukuran Stunting";
        $data['act'] = "index";

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/laporan/index', $data);
        $this->load->view('layouts/footer_web', $data);
        $this->load->view('main_app/laporan/script', $data);
    }

    public function detail()
    {
        $data = array();

        if (!$this->session->has_userdata('pengguna_id')) {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Laporan Pengukuran Stunting";
        $data['act'] = "index";

        $id = $this->input->get('id');

        $data['Pengukuran'] = $this->M_PengukuranStunting->Get_pengukuran_stunting_by_id($id);

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/laporan/detail', $data);
        $this->load->view('layouts/footer_web', $data);
        $this->load->view('main_app/laporan/script', $data);
    }

    public function Get_pengukuran_stunting_by_filter()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $user = $this->session->userdata('pengguna_username');

        $data = $this->M_PengukuranStunting->Get_pengukuran_stunting_by_filter($bulan, $tahun, $user);

        echo json_encode($data);
    }

    public function Get_pengukuran_stunting_by_id()
    {
        $pengukuran_stunting_id = $this->input->get('pengukuran_stunting_id');

        $data = $this->M_PengukuranStunting->Get_pengukuran_stunting_by_id($pengukuran_stunting_id);

        echo json_encode($data);
    }
}
