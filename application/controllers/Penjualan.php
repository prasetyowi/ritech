<?php

class Penjualan extends CI_Controller
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
		$this->load->model('M_Penjualan');
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

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('Auth/login'));
		}

		// if (!$this->session->has_userdata('depo_id')) {
		// 	redirect(base_url('Main/MainDepo/DepoMenu'));
		// }

		// $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		// $query['Title'] = Get_Title_Name();
		// $query['Copyright'] = Get_Copyright_Name();

		$data['Title'] = "Penjualan";
		$data['act'] = "index";

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		// $this->load->view('layouts/header', $query);
		// $this->load->view('pages/penjualan/index', $data);
		// $this->load->view('layouts/footer', $query);
		// $this->load->view('pages/penjualan/script', $data);

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/penjualan/index', $data);
		$this->load->view('layouts/footer', $data);
		$this->load->view('pages/penjualan/script', $data);
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

		$data['Title'] = "Penjualan";
		$data['act'] = "add";
		$data['LastPenjualan'] = $this->M_Penjualan->Get_last_penjualan();

		$table = "penjualan";
		$column = "penjualan_id";
		$kode = "PNJ" . date('ymd');

		$data['penjualan_id'] = $this->M_Vrbl->Generate_kode($table, $column, $kode);

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/penjualan/create', $data);
		$this->load->view('layouts/footer', $data);
		$this->load->view('pages/penjualan/script', $data);
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

		$data['Title'] = "Penjualan";
		// $query['Copyright'] = Get_Copyright_Name();

		$data['Header'] = $this->M_Penjualan->Get_penjualan_header_by_id($id);
		$data['Detail'] = $this->M_Penjualan->Get_penjualan_detail_by_id($id);
		$data['Termin'] = $this->M_Penjualan->Get_penjualan_termin_by_id($id);

		$data['act'] = "edit";

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/penjualan/edit', $data);
		$this->load->view('layouts/footer', $data);
		$this->load->view('pages/penjualan/script', $data);
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

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('Auth/login'));
		}

		// if (!$this->session->has_userdata('depo_id')) {
		// 	redirect(base_url('Main/MainDepo/DepoMenu'));
		// }

		// $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

		// $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

		$data['Title'] = "Penjualan";
		// $query['Copyright'] = Get_Copyright_Name();
		$data['Header'] = $this->M_Penjualan->Get_penjualan_header_by_id($id);
		$data['Detail'] = $this->M_Penjualan->Get_penjualan_detail_by_id($id);
		$data['Termin'] = $this->M_Penjualan->Get_penjualan_termin_by_id($id);
		$data['act'] = "detail";

		// Kebutuhan Authority Menu 
		// $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

		$this->load->view('layouts/header', $data);
		$this->load->view('pages/penjualan/detail', $data);
		$this->load->view('layouts/footer', $data);
		// $this->load->view('pages/penjualan/script', $data);
	}

	public function Get_penjualan_by_filter()
	{
		$tgl = explode(" - ", $this->input->post('tgl'));
		$tgl1 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[0])));
		$tgl2 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[1])));
		$penjualan_id = $this->input->post('penjualan_id');
		$customer = $this->input->post('customer');
		$status = $this->input->post('status');

		$data = $this->M_Penjualan->Get_penjualan_by_filter($tgl1, $tgl2, $penjualan_id, $customer, $status);

		echo json_encode($data);
	}

	public function insert_penjualan()
	{
		$penjualan_id = str_replace("'", "", $this->input->post('penjualan_id'));
		$penjualan_kode = str_replace("'", "", $this->input->post('penjualan_kode'));
		$penjualan_tanggal = $this->input->post('penjualan_tanggal');
		$customer_id = $this->input->post('customer_id');
		$penjualan_keterangan = str_replace("'", "", $this->input->post('penjualan_keterangan'));
		$penjualan_jumlah = $this->input->post('penjualan_jumlah');
		$penjualan_status = $this->input->post('penjualan_status');
		$updwho = $this->input->post('updwho');
		$updtgl = $this->input->post('updtgl');
		$penjualan_waktu_pengiriman = $this->input->post('penjualan_waktu_pengiriman');
		$penjualan_waktu_pengerjaan = $this->input->post('penjualan_waktu_pengerjaan');
		$periode_penawaran = $this->input->post('periode_penawaran');
		$garansi = $this->input->post('garansi');
		$penjualan_no_po = $this->input->post('penjualan_no_po');
		$penjualan_pic = $this->input->post('penjualan_pic');
		$penjualan_oleh = $this->input->post('penjualan_oleh');
		$karyawan_id = $this->input->post('karyawan_id');
		$is_ppn = $this->input->post('is_ppn');
		$is_pph = $this->input->post('is_pph');
		$tanggal_faktur = $this->input->post('tanggal_faktur');
		$no_faktur = $this->input->post('no_faktur');

		$detail = $this->input->post('detail');
		$detail2 = $this->input->post('detail2');

		$cek_data = $this->M_Penjualan->cek_penjualan_duplicate($penjualan_kode);

		if ($cek_data > 0) {
			echo json_encode(array("status" => 2, "data" => ""));
			die;
		}

		$this->db->trans_begin();

		$this->M_Penjualan->insert_penjualan($penjualan_id, $penjualan_kode, $penjualan_tanggal, $customer_id, $penjualan_keterangan, $penjualan_jumlah, $penjualan_status, $updwho, $updtgl, $penjualan_waktu_pengiriman, $penjualan_waktu_pengerjaan, $periode_penawaran, $garansi, $penjualan_no_po, $penjualan_pic, $penjualan_oleh, $karyawan_id, $is_ppn, $is_pph, $tanggal_faktur, $no_faktur);

		foreach ($detail as $key => $value) {
			// $penjualan_id = $value['penjualan_id'];
			$penjualan_no_item = $key + 1;
			$barang_id = $value['barang_id'];
			$qty = $value['qty'];
			$harga_satuan = $value['harga_satuan'];
			$penjualan_total = $qty * $harga_satuan;
			$remarks = $value['remarks'];

			$this->M_Penjualan->insert_penjualan_detail($penjualan_id, $penjualan_no_item, $barang_id, $qty, $harga_satuan, $penjualan_total, $remarks);
		}

		foreach ($detail2 as $key => $value) {
			// $penjualan_id = $value['penjualan_id'];
			$penjualan_termin_no_item = $key + 1;
			$keterangan = $value['keterangan'];
			$termin_pembayaran = $value['termin_pembayaran'];
			$termin_status = $value['termin_status'];
			$termin_tanggal_bayar = $value['termin_tanggal_bayar'];

			$this->M_Penjualan->insert_penjualan_termin($penjualan_id, $penjualan_termin_no_item, $keterangan, $termin_pembayaran, $termin_status, $termin_tanggal_bayar);
		}


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array("status" => 0, "data" => ""));
		} else {
			$this->db->trans_commit();
			echo json_encode(array("status" => 1, "data" => ""));
		}
	}

	public function update_penjualan()
	{
		$penjualan_id = $this->input->post('penjualan_id');
		$penjualan_kode = str_replace("'", "", $this->input->post('penjualan_kode'));
		$penjualan_tanggal = $this->input->post('penjualan_tanggal');
		$customer_id = $this->input->post('customer_id');
		$penjualan_keterangan = str_replace("'", "", $this->input->post('penjualan_keterangan'));
		$penjualan_jumlah = $this->input->post('penjualan_jumlah');
		$penjualan_status = $this->input->post('penjualan_status');
		$updwho = $this->input->post('updwho');
		$updtgl = $this->input->post('updtgl');
		$penjualan_waktu_pengiriman = $this->input->post('penjualan_waktu_pengiriman');
		$penjualan_waktu_pengerjaan = $this->input->post('penjualan_waktu_pengerjaan');
		$periode_penawaran = $this->input->post('periode_penawaran');
		$garansi = $this->input->post('garansi');
		$penjualan_no_po = $this->input->post('penjualan_no_po');
		$penjualan_pic = $this->input->post('penjualan_pic');
		$penjualan_oleh = $this->input->post('penjualan_oleh');
		$karyawan_id = $this->input->post('karyawan_id');
		$is_ppn = $this->input->post('is_ppn');
		$is_pph = $this->input->post('is_pph');
		$tanggal_faktur = $this->input->post('tanggal_faktur');
		$no_faktur = $this->input->post('no_faktur');

		$detail = $this->input->post('detail');
		$detail2 = $this->input->post('detail2');

		$this->db->trans_begin();

		$this->M_Penjualan->update_penjualan($penjualan_id, $penjualan_kode, $penjualan_tanggal, $customer_id, $penjualan_keterangan, $penjualan_jumlah, $penjualan_status, $updwho, $updtgl, $penjualan_waktu_pengiriman, $penjualan_waktu_pengerjaan, $periode_penawaran, $garansi, $penjualan_no_po, $penjualan_pic, $penjualan_oleh, $karyawan_id, $is_ppn, $is_pph, $tanggal_faktur, $no_faktur);

		$this->M_Penjualan->delete_penjualan_detail($penjualan_id);

		foreach ($detail as $key => $value) {
			// $penjualan_id = $value['penjualan_id'];
			$penjualan_no_item = $key + 1;
			$barang_id = $value['barang_id'];
			$qty = $value['qty'];
			$harga_satuan = $value['harga_satuan'];
			$penjualan_total = $qty * $harga_satuan;
			$remarks = $value['remarks'];

			$this->M_Penjualan->insert_penjualan_detail($penjualan_id, $penjualan_no_item, $barang_id, $qty, $harga_satuan, $penjualan_total, $remarks);
		}

		$this->M_Penjualan->delete_penjualan_termin($penjualan_id);

		foreach ($detail2 as $key => $value) {
			// $penjualan_id = $value['penjualan_id'];
			$penjualan_termin_no_item = $key + 1;
			$keterangan = $value['keterangan'];
			$termin_pembayaran = $value['termin_pembayaran'];
			$termin_status = $value['termin_status'];
			$termin_tanggal_bayar = $value['termin_tanggal_bayar'];

			$this->M_Penjualan->insert_penjualan_termin($penjualan_id, $penjualan_termin_no_item, $keterangan, $termin_pembayaran, $termin_status, $termin_tanggal_bayar);
		}


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(array("status" => 0, "data" => ""));
		} else {
			$this->db->trans_commit();
			echo json_encode(array("status" => 1, "data" => ""));
		}
	}

	public function Update_termin_pembayaran()
	{
		$penjualan_id = $this->input->post('penjualan_id');
		$penjualan_termin_no_item = $this->input->post('penjualan_termin_no_item');
		$termin_tanggal_bayar = $this->input->post('termin_tanggal_bayar');
		$termin_status = $this->input->post('termin_status');

		$this->db->trans_begin();

		$this->M_Penjualan->Update_termin_pembayaran($penjualan_id, $penjualan_termin_no_item, $termin_tanggal_bayar, $termin_status);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode(0);
		} else {
			$this->db->trans_commit();
			echo json_encode(1);
		}
	}

	//Untuk proses upload foto
	function proses_upload()
	{
		$penjualan_id = $this->input->post('penjualan_id');
		$token = $this->input->post('token_foto');

		$cek_foto = $this->db->query("select * from penjualan_attachment where penjualan_id = '$penjualan_id'");
		if ($cek_foto->num_rows() > 0) {
			if (file_exists($file = FCPATH . '/assets/upload/penjualan/' . $cek_foto->row(0)->attachment)) {
				unlink($file);
			}
		}

		$config['upload_path']   = FCPATH . '/assets/upload/penjualan/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|doc|docx|csv|tsv|ppt|pptx';
		$config['max_size'] = 2048;
		$config['overwrite'] = true;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if ($this->upload->do_upload('userfile')) {
			$nama = $this->upload->data('file_name');

			if ($cek_foto->num_rows() == 0) {
				$this->db->set('penjualan_id', $penjualan_id);
				$this->db->set('attachment', $nama);
				$this->db->set('token', $token);

				$this->db->insert('penjualan_attachment');
			} else {
				$this->db->set('attachment', $nama);
				$this->db->set('token', $token);
				$this->db->where('penjualan_id', $penjualan_id);

				$this->db->update('penjualan_attachment');
			}
		}
	}


	//Untuk menghapus foto
	function hapus_file()
	{

		//Ambil token foto
		$token = $this->input->post('token');
		$foto = $this->db->get_where('penjualan_attachment', array('token' => $token));

		if ($foto->num_rows() > 0) {
			$hasil = $foto->row();
			$nama_foto = $hasil->attachment;
			if (file_exists($file = FCPATH . '/assets/upload/penjualan/' . $nama_foto)) {
				unlink($file);
			}
			$this->db->delete('penjualan_attachment', array('token' => $token));
		}


		echo "{}";
	}
}
