<?php

class LaporanKeuangan extends CI_Controller
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

		$this->load->model('Laporan/M_LaporanKeuangan');
		$this->load->model('M_Perusahaan');
	}

	public function index()
	{
		$data = array();

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('Auth/login'));
		}

		$data['Title'] = "Laporan Keuangan";
		$data['Perusahaan'] = $this->M_Perusahaan->Get_all_perusahaan_aktif();

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/Laporan/LaporanKeuangan/index', $data);
		$this->load->view('layouts/footer', $data);
		$this->load->view('pages/Laporan/LaporanKeuangan/script', $data);
	}

	public function Get_laporan_keuangan_by_filter()
	{
		$tahun = $this->input->post('tahun');

		$data = $this->M_LaporanKeuangan->Get_laporan_keuangan_by_filter($tahun);

		echo json_encode($data);
	}
}
