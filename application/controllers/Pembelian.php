<?php

class Pembelian extends CI_Controller
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
		$this->load->model('M_Pembelian');
		$this->load->model('M_Vrbl');
		$this->load->helper(array('url', 'file'));
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
		// $this->load->view('pages/pembelian/index', $data);
		// $this->load->view('layouts/footer', $query);
		// $this->load->view('pages/pembelian/script', $data);

		$this->load->view('layouts/header');
		$this->load->view('pages/pembelian/index');
		$this->load->view('layouts/footer');
		$this->load->view('pages/pembelian/script');
	}

	public function create()
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

		$query['Title'] = "pembelian";

		$data['act'] = "add";

		$table = "pembelian";
		$column = "pembelian_id";
		$kode = "PMB" . date('ymd');

		$data['pembelian_id'] = $this->M_Vrbl->Generate_kode($table, $column, $kode);

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $query);
		$this->load->view('pages/pembelian/create', $data);
		$this->load->view('layouts/footer', $query);
		$this->load->view('pages/pembelian/script', $data);
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

		// if (!$this->session->has_userdata('pengguna_id')) {
		// 	redirect(base_url('MainPage'));
		// }

		// if (!$this->session->has_userdata('depo_id')) {
		// 	redirect(base_url('Main/MainDepo/DepoMenu'));
		// }

		// $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

		// $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		$query['Title'] = "pembelian";
		// $query['Copyright'] = Get_Copyright_Name();

		$data['Header'] = $this->M_Pembelian->Get_pembelian_header_by_id($id);
		$data['Detail'] = $this->M_Pembelian->Get_pembelian_detail_by_id($id);
		$data['Termin'] = $this->M_Pembelian->Get_pembelian_termin_by_id($id);

		$data['act'] = "edit";

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $query);
		$this->load->view('pages/pembelian/edit', $data);
		$this->load->view('layouts/footer', $query);
		$this->load->view('pages/pembelian/script', $data);
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

		// if (!$this->session->has_userdata('depo_id')) {
		// 	redirect(base_url('Main/MainDepo/DepoMenu'));
		// }

		// $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

		// $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		$query['Title'] = "pembelian";
		// $query['Copyright'] = Get_Copyright_Name();
		$data['Header'] = $this->M_Pembelian->Get_pembelian_header_by_id($id);
		$data['Detail'] = $this->M_Pembelian->Get_pembelian_detail_by_id($id);
		$data['Termin'] = $this->M_Pembelian->Get_pembelian_termin_by_id($id);
		$data['act'] = "detail";

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $query);
		$this->load->view('pages/pembelian/detail', $data);
		$this->load->view('layouts/footer', $query);
		// $this->load->view('pages/pembelian/script', $data);
	}

	public function Get_pembelian_by_filter()
	{
		$tgl = explode(" - ", $this->input->post('tgl'));
		$tgl1 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[0])));
		$tgl2 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[1])));
		$pembelian_id = $this->input->post('pembelian_id');
		$customer = $this->input->post('customer');
		$status = $this->input->post('status');

		$data = $this->M_Pembelian->Get_pembelian_by_filter($tgl1, $tgl2, $pembelian_id, $customer, $status);

		echo json_encode($data);
	}

	public function insert_pembelian()
	{
		$pembelian_id = str_replace("'", "", $this->input->post('pembelian_id'));
		$pembelian_kode = str_replace("'", "", $this->input->post('pembelian_kode'));
		$pembelian_tanggal = $this->input->post('pembelian_tanggal');
		$customer_id = $this->input->post('customer_id');
		$pembelian_keterangan = str_replace("'", "", $this->input->post('pembelian_keterangan'));
		$pembelian_jumlah = $this->input->post('pembelian_jumlah');
		$pembelian_status = $this->input->post('pembelian_status');
		$updwho = $this->input->post('updwho');
		$updtgl = $this->input->post('updtgl');
		$pembelian_waktu_pengiriman = $this->input->post('pembelian_waktu_pengiriman');
		$pembelian_waktu_pengerjaan = $this->input->post('pembelian_waktu_pengerjaan');
		$periode_penawaran = $this->input->post('periode_penawaran');
		$garansi = $this->input->post('garansi');
		$pembelian_no_po = $this->input->post('pembelian_no_po');

		$detail = $this->input->post('detail');
		$detail2 = $this->input->post('detail2');

		$cek_data = $this->M_Pembelian->cek_pembelian_duplicate($pembelian_kode);

		if ($cek_data > 0) {
			echo json_encode(array("status" => 2, "data" => ""));
			die;
		}

		$this->db->trans_begin();

		$this->M_Pembelian->insert_pembelian($pembelian_id, $pembelian_kode, $pembelian_tanggal, $customer_id, $pembelian_keterangan, $pembelian_jumlah, $pembelian_status, $updwho, $updtgl, $pembelian_waktu_pengiriman, $pembelian_waktu_pengerjaan, $periode_penawaran, $garansi, $pembelian_no_po);

		foreach ($detail as $key => $value) {
			// $pembelian_id = $value['pembelian_id'];
			$pembelian_no_item = $key + 1;
			$barang_id = $value['barang_id'];
			$qty = $value['qty'];
			$harga_satuan = $value['harga_satuan'];
			$pembelian_total = $qty * $harga_satuan;
			$remarks = $value['remarks'];

			$this->M_Pembelian->insert_pembelian_detail($pembelian_id, $pembelian_no_item, $barang_id, $qty, $harga_satuan, $pembelian_total, $remarks);
		}

		foreach ($detail2 as $key => $value) {
			// $pembelian_id = $value['pembelian_id'];
			$pembelian_termin_no_item = $key + 1;
			$keterangan = $value['keterangan'];
			$termin_pembayaran = $value['termin_pembayaran'];

			$this->M_Pembelian->insert_pembelian_termin($pembelian_id, $pembelian_termin_no_item, $keterangan, $termin_pembayaran);
		}


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array("status" => 0, "data" => ""));
		} else {
			$this->db->trans_commit();
			echo json_encode(array("status" => 1, "data" => ""));
		}
	}

	public function update_pembelian()
	{
		$pembelian_id = $this->input->post('pembelian_id');
		$pembelian_kode = str_replace("'", "", $this->input->post('pembelian_kode'));
		$pembelian_tanggal = $this->input->post('pembelian_tanggal');
		$customer_id = $this->input->post('customer_id');
		$pembelian_keterangan = str_replace("'", "", $this->input->post('pembelian_keterangan'));
		$pembelian_jumlah = $this->input->post('pembelian_jumlah');
		$pembelian_status = $this->input->post('pembelian_status');
		$updwho = $this->input->post('updwho');
		$updtgl = $this->input->post('updtgl');
		$pembelian_waktu_pengiriman = $this->input->post('pembelian_waktu_pengiriman');
		$pembelian_waktu_pengerjaan = $this->input->post('pembelian_waktu_pengerjaan');
		$periode_penawaran = $this->input->post('periode_penawaran');
		$garansi = $this->input->post('garansi');
		$pembelian_no_po = $this->input->post('pembelian_no_po');

		$detail = $this->input->post('detail');
		$detail2 = $this->input->post('detail2');

		$this->db->trans_begin();

		$this->M_Pembelian->update_pembelian($pembelian_id, $pembelian_kode, $pembelian_tanggal, $customer_id, $pembelian_keterangan, $pembelian_jumlah, $pembelian_status, $updwho, $updtgl, $pembelian_waktu_pengiriman, $pembelian_waktu_pengerjaan, $periode_penawaran, $garansi, $pembelian_no_po);

		$this->M_Pembelian->delete_pembelian_detail($pembelian_id);

		foreach ($detail as $key => $value) {
			// $pembelian_id = $value['pembelian_id'];
			$pembelian_no_item = $key + 1;
			$barang_id = $value['barang_id'];
			$qty = $value['qty'];
			$harga_satuan = $value['harga_satuan'];
			$pembelian_total = $qty * $harga_satuan;
			$remarks = $value['remarks'];

			$this->M_Pembelian->insert_pembelian_detail($pembelian_id, $pembelian_no_item, $barang_id, $qty, $harga_satuan, $pembelian_total, $remarks);
		}

		$this->M_Pembelian->delete_pembelian_termin($pembelian_id);

		foreach ($detail2 as $key => $value) {
			// $pembelian_id = $value['pembelian_id'];
			$pembelian_termin_no_item = $key + 1;
			$keterangan = $value['keterangan'];
			$termin_pembayaran = $value['termin_pembayaran'];

			$this->M_Pembelian->insert_pembelian_termin($pembelian_id, $pembelian_termin_no_item, $keterangan, $termin_pembayaran);
		}


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array("status" => 0, "data" => ""));
		} else {
			$this->db->trans_commit();
			echo json_encode(array("status" => 1, "data" => ""));
		}
	}

	//Untuk proses upload foto
	function proses_upload()
	{
		$pembelian_id = $this->input->post('pembelian_id');
		$token = $this->input->post('token_foto');

		$cek_foto = $this->db->query("select * from pembelian_attachment where pembelian_id = '$pembelian_id'");

		if (file_exists($file = FCPATH . '/assets/upload/pembelian/' . $cek_foto->row(0)->attachment)) {
			unlink($file);
		}

		$config['upload_path']   = FCPATH . '/assets/upload/pembelian/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|doc|docx|csv|tsv|ppt|pptx';
		$config['max_size'] = 2048;
		$config['overwrite'] = true;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if ($this->upload->do_upload('userfile')) {
			$nama = $this->upload->data('file_name');

			if ($cek_foto->num_rows() == 0) {
				$this->db->set('pembelian_id', $pembelian_id);
				$this->db->set('attachment', $nama);
				$this->db->set('token', $token);

				$this->db->insert('pembelian_attachment');
			} else {
				$this->db->set('attachment', $nama);
				$this->db->set('token', $token);
				$this->db->where('pembelian_id', $pembelian_id);

				$this->db->update('pembelian_attachment');
			}
		}
	}


	//Untuk menghapus foto
	function hapus_file()
	{

		//Ambil token foto
		$token = $this->input->post('token');
		$foto = $this->db->get_where('pembelian_attachment', array('token' => $token));

		if ($foto->num_rows() > 0) {
			$hasil = $foto->row();
			$nama_foto = $hasil->attachment;
			if (file_exists($file = FCPATH . '/assets/upload/pembelian/' . $nama_foto)) {
				unlink($file);
			}
			$this->db->delete('pembelian_attachment', array('token' => $token));
		}


		echo "{}";
	}
}
