<?php

class Invoice extends CI_Controller
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

		$this->load->model('M_Quotation');
		$this->load->model('M_Pembelian');
		$this->load->model('M_Penjualan');
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
		$this->load->view('pages/Invoice/index');
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
		$this->load->view('pages/Invoice/create');
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

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('Auth/login'));
		}

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
		$penjualan_termin_no_item = $this->input->get('penjualan_termin_no_item');

		$data['Header'] = $this->M_Penjualan->Get_cetak_invoice_penjualan_header_by_id($id);
		$data['Detail'] = $this->M_Penjualan->Get_cetak_invoice_penjualan_detail_termin_by_id($id, $penjualan_termin_no_item);
		$data['Termin'] = $this->M_Penjualan->Get_cetak_invoice_penjualan_termin_by_id($id, $penjualan_termin_no_item);

		// $this->load->view('layouts/header_pdf', $data);
		// $this->load->view('pages/Invoice/print_pdf', $data);
		// $this->load->view('layouts/footer_pdf', $data);

		$data['title'] = "Invoice";
		$file_pdf = $data['title'];
		$paper = 'A4';
		$orientation = "potrait";
		$html = $this->load->view('pages/Invoice/print_pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function edit()
	{

		$id = $this->input->get('id');

		$data = array();
		$data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
		if ($data['Menu_Access']['R'] != 1) {
			redirect(base_url('MainPage'));
			exit();
		}

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('MainPage'));
		}

		if (!$this->session->has_userdata('depo_id')) {
			redirect(base_url('Main/MainDepo/DepoMenu'));
		}

		$data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

		$data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		$query['Title'] = Get_Title_Name();
		$query['Copyright'] = Get_Copyright_Name();
		$data['Header'] = $this->M_Quotation->GetQuotationHeaderById($id);
		$data['Detail'] = $this->M_Quotation->GetQuotationDetailById($id);
		$data['act'] = "edit";

		// Kebutuhan Authority Menu 
		$this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $query);
		$this->load->view('pages/Quotation/edit', $data);
		$this->load->view('layouts/footer', $query);
		$this->load->view('pages/Quotation/script', $data);
	}

	public function detail()
	{
		$id = $this->input->get('id');

		$data = array();
		$data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
		if ($data['Menu_Access']['R'] != 1) {
			redirect(base_url('MainPage'));
			exit();
		}

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('MainPage'));
		}

		if (!$this->session->has_userdata('depo_id')) {
			redirect(base_url('Main/MainDepo/DepoMenu'));
		}

		$data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

		$data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		$query['Title'] = Get_Title_Name();
		$query['Copyright'] = Get_Copyright_Name();
		$data['Header'] = $this->M_Quotation->GetQuotationHeaderById($id);
		$data['Detail'] = $this->M_Quotation->GetQuotationDetailById($id);
		$data['act'] = "detail";

		// Kebutuhan Authority Menu 
		$this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $query);
		$this->load->view('pages/Quotation/detail', $data);
		$this->load->view('layouts/footer', $query);
		$this->load->view('pages/Quotation/script', $data);
	}

	public function Get_quotation_by_filter()
	{
		$tgl = explode(" - ", $this->input->post('tgl'));
		$tgl1 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[0])));
		$tgl2 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[1])));
		$quotation_id = $this->input->post('quotation_id');
		$customer = $this->input->post('customer');
		$status = $this->input->post('status');

		$data = $this->M_Quotation->GetQuotationByFilter($tgl1, $tgl2, $quotation_id, $customer, $status);

		echo json_encode($data);
	}

	public function insert_quotation()
	{
		$quotation_id = $this->input->post('quotation_id');
		$quotation_tanggal = $this->input->post('quotation_tanggal');
		$customer_id = $this->input->post('customer_id');
		$quotation_keterangan = $this->input->post('quotation_keterangan');
		$quotation_jumlah = $this->input->post('quotation_jumlah');
		$quotation_status = $this->input->post('quotation_status');
		$updwho = $this->input->post('updwho');
		$updtgl = $this->input->post('updtgl');
		$quotation_waktu_pengiriman = $this->input->post('quotation_waktu_pengiriman');
		$quotation_waktu_pengerjaan = $this->input->post('quotation_waktu_pengerjaan');
		$periode_penawaran = $this->input->post('periode_penawaran');
		$garansi = $this->input->post('garansi');


		$detail = $this->input->post('detail');

		$cek_data = $this->M_Quotation->cek_quotation_duplicate($quotation_id);

		if ($cek_data > 0) {
			echo json_encode(array("status" => 2, "data" => ""));
			die;
		}

		$this->db->trans_begin();

		$this->M_Quotation->insert_quotation($quotation_id, $quotation_tanggal, $customer_id, $quotation_keterangan, $quotation_jumlah, $quotation_status, $updwho, $updtgl, $quotation_waktu_pengiriman, $quotation_waktu_pengerjaan, $periode_penawaran, $garansi);

		foreach ($detail as $key => $value) {
			// $quotation_id = $value['quotation_id'];
			$quotation_no_item = $value['quotation_no_item'];
			$barang_id = $value['barang_id'];
			$quotation_qty = $value['quotation_qty'];
			$harga_satuan = $value['harga_satuan'];
			$quotation_total = $value['quotation_total'];

			$this->M_Quotation->insert_quotation_detail($quotation_id, $quotation_no_item, $barang_id, $quotation_qty, $harga_satuan, $quotation_total);
		}


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array("status" => 0, "data" => ""));
		} else {
			$this->db->trans_commit();
			echo json_encode(array("status" => 1, "data" => ""));
		}
	}

	public function update_quotation()
	{
		$quotation_id = $this->input->post('quotation_id');
		$quotation_tanggal = $this->input->post('quotation_tanggal');
		$customer_id = $this->input->post('customer_id');
		$quotation_keterangan = $this->input->post('quotation_keterangan');
		$quotation_jumlah = $this->input->post('quotation_jumlah');
		$quotation_status = $this->input->post('quotation_status');
		$updwho = $this->input->post('updwho');
		$updtgl = $this->input->post('updtgl');
		$quotation_waktu_pengiriman = $this->input->post('quotation_waktu_pengiriman');
		$quotation_waktu_pengerjaan = $this->input->post('quotation_waktu_pengerjaan');
		$periode_penawaran = $this->input->post('periode_penawaran');
		$garansi = $this->input->post('garansi');


		$detail = $this->input->post('detail');

		$this->db->trans_begin();

		$this->M_Quotation->update_quotation($quotation_id, $quotation_tanggal, $customer_id, $quotation_keterangan, $quotation_jumlah, $quotation_status, $updwho, $updtgl, $quotation_waktu_pengiriman, $quotation_waktu_pengerjaan, $periode_penawaran, $garansi);

		$this->M_Quotation->delete_quotation_detail($quotation_id);

		foreach ($detail as $key => $value) {
			// $quotation_id = $value['quotation_id'];
			$quotation_no_item = $value['quotation_no_item'];
			$barang_id = $value['barang_id'];
			$quotation_qty = $value['quotation_qty'];
			$harga_satuan = $value['harga_satuan'];
			$quotation_total = $value['quotation_total'];

			$this->M_Quotation->insert_quotation_detail($quotation_id, $quotation_no_item, $barang_id, $quotation_qty, $harga_satuan, $quotation_total);
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
