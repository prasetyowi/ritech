<?php

class Quotation extends CI_Controller
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
		$this->load->model('M_Vrbl');
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

		// $query['Title'] = Get_Title_Name();
		// $query['Copyright'] = Get_Copyright_Name();

		$data['Title'] = "Quotation";
		$data['act'] = "index";

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		// $this->load->view('layouts/header', $query);
		// $this->load->view('pages/Quotation/index', $data);
		// $this->load->view('layouts/footer', $query);
		// $this->load->view('pages/Quotation/script', $data);

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/Quotation/index', $data);
		$this->load->view('layouts/footer', $data);
		$this->load->view('pages/Quotation/script', $data);
	}

	public function create()
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

		$data['Title'] = "Quotation";
		$data['act'] = "add";
		$data['LastQuotation'] = $this->M_Quotation->Get_last_quotation();

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/Quotation/create', $data);
		$this->load->view('layouts/footer', $data);
		$this->load->view('pages/Quotation/script', $data);
	}

	public function edit()
	{

		$id = $this->input->get('id');

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

		$data['Title'] = "Quotation";
		// $query['Copyright'] = Get_Copyright_Name();

		$data['Header'] = $this->M_Quotation->Get_quotation_header_by_id($id);
		$data['Detail'] = $this->M_Quotation->Get_quotation_detail_by_id($id);
		// $data['Termin'] = $this->M_Quotation->Get_quotation_termin_by_id($id);

		$data['act'] = "edit";

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/Quotation/edit', $data);
		$this->load->view('layouts/footer', $data);
		$this->load->view('pages/Quotation/script', $data);
	}

	public function detail()
	{
		$id = $this->input->get('id');

		$data = array();
		// $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
		// if ($data['Menu_Access']['R'] != 1) {
		// 	redirect(base_url('MainPage'));
		// 	exit();
		// }

		// if (!$this->session->has_userdata('pengguna_id')) {
		// 	redirect(base_url('MainPage'));
		// }

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('Auth/login'));
		}

		// $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

		// $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		$data['Title'] = "Quotation";
		// $query['Copyright'] = Get_Copyright_Name();

		$data['Header'] = $this->M_Quotation->Get_quotation_header_by_id($id);
		$data['Detail'] = $this->M_Quotation->Get_quotation_detail_by_id($id);
		// $data['Termin'] = $this->M_Quotation->Get_quotation_termin_by_id($id);
		$data['act'] = "detail";

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/Quotation/detail', $data);
		$this->load->view('layouts/footer', $data);
		// $this->load->view('pages/Quotation/script', $data);
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

		$data['Header'] = $this->M_Quotation->Get_quotation_header_by_id($id);
		$data['Detail'] = $this->M_Quotation->Get_quotation_detail_by_id($id);
		// $data['Termin'] = $this->M_Quotation->Get_quotation_termin_by_id($id);

		$data['title'] = "Quotation";
		$file_pdf = $data['title'];
		$paper = 'A4';
		$orientation = "potrait";
		$html = $this->load->view('pages/Quotation/print_pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function Get_quotation_by_filter()
	{
		$tgl = explode(" - ", $this->input->post('tgl'));
		$tgl1 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[0])));
		$tgl2 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[1])));
		$quotation_id = $this->input->post('quotation_id');
		$customer = $this->input->post('customer');
		$status = $this->input->post('status');

		$data = $this->M_Quotation->Get_quotation_by_filter($tgl1, $tgl2, $quotation_id, $customer, $status);

		echo json_encode($data);
	}

	public function insert_quotation()
	{
		$table = "quotation";
		$column = "quotation_id";
		$kode = "QT" . date('ymd');

		$quotation_id = $this->M_Vrbl->Generate_kode($table, $column, $kode);
		$quotation_kode = str_replace("'", "", $this->input->post('quotation_kode'));
		$quotation_tanggal = $this->input->post('quotation_tanggal');
		$customer_id = $this->input->post('customer_id');
		$quotation_keterangan = str_replace("'", "", $this->input->post('quotation_keterangan'));
		$quotation_jumlah = $this->input->post('quotation_jumlah');
		$quotation_status = $this->input->post('quotation_status');
		$updwho = $this->input->post('updwho');
		$updtgl = $this->input->post('updtgl');
		$quotation_waktu_pengiriman = $this->input->post('quotation_waktu_pengiriman');
		$quotation_waktu_pengerjaan = $this->input->post('quotation_waktu_pengerjaan');
		$periode_penawaran = $this->input->post('periode_penawaran');
		$garansi = $this->input->post('garansi');
		$karyawan_id = $this->input->post('karyawan_id');
		$nama_penawaran = $this->input->post('nama_penawaran');

		$detail = $this->input->post('detail');
		// $detail2 = $this->input->post('detail2');

		$cek_data = $this->M_Quotation->cek_quotation_duplicate($quotation_kode);

		if ($cek_data > 0) {
			echo json_encode(array("status" => 2, "data" => ""));
			die;
		}

		$this->db->trans_begin();

		$this->M_Quotation->insert_quotation($quotation_id, $quotation_kode, $quotation_tanggal, $customer_id, $quotation_keterangan, $quotation_jumlah, $quotation_status, $updwho, $updtgl, $quotation_waktu_pengiriman, $quotation_waktu_pengerjaan, $periode_penawaran, $garansi, $karyawan_id, $nama_penawaran);

		foreach ($detail as $key => $value) {
			// $quotation_id = $value['quotation_id'];
			$quotation_no_item = $key + 1;
			$barang_id = $value['barang_id'];
			$qty = $value['qty'];
			$harga_satuan = $value['harga_satuan'];
			$quotation_total = $qty * $harga_satuan;
			$remarks = $value['remarks'];

			$this->M_Quotation->insert_quotation_detail($quotation_id, $quotation_no_item, $barang_id, $qty, $harga_satuan, $quotation_total, $remarks);
		}

		// foreach ($detail2 as $key => $value) {
		// 	// $quotation_id = $value['quotation_id'];
		// 	$quotation_termin_no_item = $key + 1;
		// 	$keterangan = $value['keterangan'];
		// 	$termin_pembayaran = $value['termin_pembayaran'];

		// 	$this->M_Quotation->insert_quotation_termin($quotation_id, $quotation_termin_no_item, $keterangan, $termin_pembayaran);
		// }


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
		$quotation_kode = str_replace("'", "", $this->input->post('quotation_kode'));
		$quotation_tanggal = $this->input->post('quotation_tanggal');
		$customer_id = $this->input->post('customer_id');
		$quotation_keterangan = str_replace("'", "", $this->input->post('quotation_keterangan'));
		$quotation_jumlah = $this->input->post('quotation_jumlah');
		$quotation_status = $this->input->post('quotation_status');
		$updwho = $this->input->post('updwho');
		$updtgl = $this->input->post('updtgl');
		$quotation_waktu_pengiriman = $this->input->post('quotation_waktu_pengiriman');
		$quotation_waktu_pengerjaan = $this->input->post('quotation_waktu_pengerjaan');
		$periode_penawaran = $this->input->post('periode_penawaran');
		$garansi = $this->input->post('garansi');
		$karyawan_id = $this->input->post('karyawan_id');
		$nama_penawaran = $this->input->post('nama_penawaran');

		$detail = $this->input->post('detail');
		// $detail2 = $this->input->post('detail2');

		$cek_data = $this->M_Quotation->cek_quotation_duplicate_edit($quotation_id, $quotation_kode);

		if ($cek_data > 0) {
			echo json_encode(array("status" => 2, "data" => ""));
			die;
		}

		$this->db->trans_begin();

		$this->M_Quotation->update_quotation($quotation_id, $quotation_kode, $quotation_tanggal, $customer_id, $quotation_keterangan, $quotation_jumlah, $quotation_status, $updwho, $updtgl, $quotation_waktu_pengiriman, $quotation_waktu_pengerjaan, $periode_penawaran, $garansi, $karyawan_id, $nama_penawaran);

		$this->M_Quotation->delete_quotation_detail($quotation_id);

		foreach ($detail as $key => $value) {
			// $quotation_id = $value['quotation_id'];
			$quotation_no_item = $key + 1;
			$barang_id = $value['barang_id'];
			$qty = $value['qty'];
			$harga_satuan = $value['harga_satuan'];
			$quotation_total = $qty * $harga_satuan;
			$remarks = $value['remarks'];

			$this->M_Quotation->insert_quotation_detail($quotation_id, $quotation_no_item, $barang_id, $qty, $harga_satuan, $quotation_total, $remarks);
		}

		// $this->M_Quotation->delete_quotation_termin($quotation_id);

		// foreach ($detail2 as $key => $value) {
		// 	// $quotation_id = $value['quotation_id'];
		// 	$quotation_termin_no_item = $key + 1;
		// 	$keterangan = $value['keterangan'];
		// 	$termin_pembayaran = $value['termin_pembayaran'];

		// 	$this->M_Quotation->insert_quotation_termin($quotation_id, $quotation_termin_no_item, $keterangan, $termin_pembayaran);
		// }


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array("status" => 0, "data" => ""));
		} else {
			$this->db->trans_commit();
			echo json_encode(array("status" => 1, "data" => ""));
		}
	}
}
