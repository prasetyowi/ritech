<?php

class PengukuranStuntingAdmin extends CI_Controller
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

        if (!$this->session->has_userdata('pengguna_id') || $this->session->userdata('pengguna_level') != 'administrator') {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Pengukuran Stunting";
        $data['act'] = "index";

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/pengukuran_stunting/index', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/pengukuran_stunting/script', $data);
    }

    public function create()
    {

        $data = array();

        if (!$this->session->has_userdata('pengguna_id') || $this->session->userdata('pengguna_level') != 'administrator') {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Pengukuran Stunting";
        $data['act'] = "add";
        $data['Lastpengukuran_stunting'] = $this->M_PengukuranStunting->Get_last_pengukuran_stunting();

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/pengukuran_stunting/create', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/pengukuran_stunting/script', $data);
    }

    public function edit()
    {

        $id = $this->input->get('id');

        $data = array();

        if (!$this->session->has_userdata('pengguna_id') || $this->session->userdata('pengguna_level') != 'administrator') {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Pengukuran Stunting";
        // $query['Copyright'] = Get_Copyright_Name();

        $data['Header'] = $this->M_PengukuranStunting->Get_pengukuran_stunting_header_by_id($id);
        // $data['Termin'] = $this->M_PengukuranStunting->Get_pengukuran_stunting_termin_by_id($id);

        $data['act'] = "edit";

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/pengukuran_stunting/edit', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/pengukuran_stunting/script', $data);
    }

    public function detail()
    {
        $id = $this->input->get('id');

        $data = array();

        if (!$this->session->has_userdata('pengguna_id') || $this->session->userdata('pengguna_level') != 'administrator') {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Pengukuran Stunting";

        $data['Header'] = $this->M_PengukuranStunting->Get_pengukuran_stunting_header_by_id($id);
        // $data['Termin'] = $this->M_PengukuranStunting->Get_pengukuran_stunting_termin_by_id($id);
        $data['act'] = "detail";

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/pengukuran_stunting/detail', $data);
        $this->load->view('layouts/footer', $data);
        // $this->load->view('pages/pengukuran_stunting/script', $data);
    }

    public function print()
    {

        $data = array();

        if (!$this->session->has_userdata('pengguna_id')) {
            redirect(base_url('Auth/login'));
        }

        $this->load->library('pdfgenerator');

        $id = $this->input->get('id');

        $data['Header'] = $this->M_PengukuranStunting->Get_pengukuran_stunting_header_by_id($id);
        // $data['Termin'] = $this->M_PengukuranStunting->Get_pengukuran_stunting_termin_by_id($id);

        $data['title'] = "pengukuran_stunting";
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "potrait";
        $html = $this->load->view('pages/pengukuran_stunting/print_pdf', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function Get_pengukuran_stunting_by_filter_admin()
    {
        $tgl = explode(" - ", $this->input->post('tgl'));
        $tgl1 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[0])));
        $tgl2 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[1])));

        $umur_awal = $this->input->post('umur_awal');
        $umur_akhir = $this->input->post('umur_akhir');
        $nama_orang_tua = $this->input->post('nama_orang_tua');
        $nama_anak = $this->input->post('nama_anak');

        $data = $this->M_PengukuranStunting->Get_pengukuran_stunting_by_filter_admin($tgl1, $tgl2, $umur_awal, $umur_akhir, $nama_orang_tua, $nama_anak);

        echo json_encode($data);
    }

    public function insert_pengukuran_stunting()
    {
        $table = "pengukuran_stunting";
        $column = "quotation_id";
        $kode = "STT" . date('ymd');

        $pengukuran_stunting_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);
        $nama_anak = $this->input->post('nama_anak');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $nama_orang_tua = $this->input->post('nama_orang_tua');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $usia_saat_ukur = $this->input->post('usia_saat_ukur');
        $tanggal_pengukuran = $this->input->post('tanggal_pengukuran');
        $berat = $this->input->post('berat');
        $tinggi = $this->input->post('tinggi');
        $cara_pengukuran = $this->input->post('cara_pengukuran');
        $lk = $this->input->post('lk');
        $zs_bb_u = $this->input->post('zs_bb_u');
        $zs_tb_u = $this->input->post('zs_tb_u');
        $zs_bb_tb = $this->input->post('zs_bb_tb');
        $zs_lk_u = $this->input->post('zs_lk_u');
        $umur_bb = $this->input->post('umur_bb');
        $umur_tb = $this->input->post('umur_tb');
        $kesimpulan = $this->input->post('kesimpulan');

        $this->db->trans_begin();

        $this->M_PengukuranStunting->insert_pengukuran_stunting($pengukuran_stunting_id, $nama_anak, $jenis_kelamin, $nama_orang_tua, $tanggal_lahir, $usia_saat_ukur, $tanggal_pengukuran, $berat, $tinggi, $cara_pengukuran, $lk, $zs_bb_u, $zs_tb_u, $zs_bb_tb, $zs_lk_u, $umur_bb, $umur_tb, $kesimpulan);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_pengukuran_stunting()
    {
        $pengukuran_stunting_id = $this->input->post('pengukuran_stunting_id');
        $nama_anak = $this->input->post('nama_anak');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $nama_orang_tua = $this->input->post('nama_orang_tua');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $usia_saat_ukur = $this->input->post('usia_saat_ukur');
        $tanggal_pengukuran = $this->input->post('tanggal_pengukuran');
        $berat = $this->input->post('berat');
        $tinggi = $this->input->post('tinggi');
        $cara_pengukuran = $this->input->post('cara_pengukuran');
        $lk = $this->input->post('lk');
        $zs_bb_u = $this->input->post('zs_bb_u');
        $zs_tb_u = $this->input->post('zs_tb_u');
        $zs_bb_tb = $this->input->post('zs_bb_tb');
        $zs_lk_u = $this->input->post('zs_lk_u');
        $umur_bb = $this->input->post('umur_bb');
        $umur_tb = $this->input->post('umur_tb');
        $kesimpulan = $this->input->post('kesimpulan');

        $this->db->trans_begin();

        $this->M_PengukuranStunting->update_pengukuran_stunting($pengukuran_stunting_id, $nama_anak, $jenis_kelamin, $nama_orang_tua, $tanggal_lahir, $usia_saat_ukur, $tanggal_pengukuran, $berat, $tinggi, $cara_pengukuran, $lk, $zs_bb_u, $zs_tb_u, $zs_bb_tb, $zs_lk_u, $umur_bb, $umur_tb, $kesimpulan);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
