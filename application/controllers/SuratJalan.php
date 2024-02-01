<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratJalan extends CI_Controller
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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_Quotation');
		$this->load->model('M_Pembelian');
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
		$this->load->view('pages/SuratJalan/index');
		$this->load->view('layouts/footer');
		// $this->load->view('pages/Quotation/script', $data);
	}

	public function create()
	{

		// $data = array();
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

		// $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

		// $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		// $query['Title'] = Get_Title_Name();
		// $query['Copyright'] = Get_Copyright_Name();

		// $data['act'] = "add";

		// // Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		// $this->load->view('layouts/header', $query);
		// $this->load->view('pages/Quotation/create', $data);
		// $this->load->view('layouts/footer', $query);
		// $this->load->view('pages/Quotation/script', $data);

		$this->load->view('layouts/header');
		$this->load->view('pages/SuratJalan/create');
		$this->load->view('layouts/footer');
	}

	public function print()
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

		// $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

		// $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		// $query['Title'] = Get_Title_Name();
		// $query['Copyright'] = Get_Copyright_Name();

		// $data['act'] = "add";

		// // Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		// $this->load->view('layouts/header', $query);
		// $this->load->view('pages/Quotation/create', $data);
		// $this->load->view('layouts/footer', $query);
		// $this->load->view('pages/Quotation/script', $data);

		$this->load->library('pdfgenerator');

		$id = $this->input->get('id');

		$data['Header'] = $this->M_Pembelian->Get_cetak_invoice_pembelian_header_by_id($id);
		$data['Detail'] = $this->M_Pembelian->Get_pembelian_detail_by_id($id);

		// $this->load->view('layouts/header_pdf', $data);
		// $this->load->view('pages/SuratJalan/print_pdf', $data);
		// $this->load->view('layouts/footer_pdf', $data);

		$data['title'] = "Surat Jalan";
		$file_pdf = $data['title'];
		$paper = 'A4';
		$orientation = "potrait";
		$html = $this->load->view('pages/SuratJalan/print_pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
