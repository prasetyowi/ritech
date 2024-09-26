<?php

class PengukuranStunting extends CI_Controller
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

        $data['Title'] = "Pengukuran Stunting";
        $data['act'] = "index";

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/pengukuran_stunting/index', $data);
        $this->load->view('layouts/footer_web', $data);
        $this->load->view('main_app/pengukuran_stunting/script', $data);
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

    public function Get_hasil_pengukuran_stunting()
    {
        $usia_saat_ukur = $this->input->post('usia_saat_ukur');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tinggi = $this->input->post('tinggi');

        $data['PengukuranTinggi'] = $this->M_PengukuranStunting->Get_hasil_pengukuran_stunting_by_tinggi($usia_saat_ukur, $jenis_kelamin, $tinggi);

        echo json_encode($data);
    }

    public function insert_pengukuran_stunting()
    {
        $table = "pengukuran_stunting";
        $column = "pengukuran_stunting_id";
        $kode = "STT" . date('ymd');

        $pengukuran_stunting_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);
        $nama_anak = $this->input->post('nama_anak');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $nama_orang_tua = $this->session->userdata('pengguna_nama');
        $tanggal_lahir = date('Y-m-d', strtotime(str_replace("/", "-", $this->input->post('tanggal_lahir'))));
        $usia_saat_ukur = $this->input->post('usia_saat_ukur');
        $tanggal_pengukuran = date('Y-m-d', strtotime(str_replace("/", "-", $this->input->post('tanggal_pengukuran'))));
        $berat = $this->input->post('berat');
        $tinggi = $this->input->post('tinggi');
        $cara_pengukuran = $this->input->post('cara_pengukuran');
        $lk = $this->input->post('lk');
        $zs_bb_u = "";
        $zs_tb_u = $this->input->post('zs_tb_u');
        $zs_bb_tb = "";
        $zs_lk_u = "";
        $umur_bb = "";
        $umur_tb = "";
        $kesimpulan = $this->input->post('kesimpulan');

        // $zs_bb_u = $this->input->post('zs_bb_u');
        // $zs_tb_u = $this->input->post('zs_tb_u');
        // $zs_bb_tb = $this->input->post('zs_bb_tb');
        // $zs_lk_u = $this->input->post('zs_lk_u');
        // $umur_bb = $this->input->post('umur_bb');
        // $umur_tb = $this->input->post('umur_tb');

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
