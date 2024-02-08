<?php

class M_Quotation extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		// $this->db = $this->load->database('d4',true);
	}

	public function cek_quotation_duplicate($quotation_kode)
	{

		$query = $this->db->query("SELECT * FROM quotation where quotation_kode = '$quotation_kode'");

		if ($query->num_rows() == 0) {
			$query = 0;
		} else {
			$query = $query->num_rows();
		}

		return $query;
	}

	public function cek_quotation_duplicate_edit($quotation_id, $quotation_kode)
	{

		$query = $this->db->query("SELECT * FROM quotation where quotation_id <> '$quotation_id' AND quotation_kode = '$quotation_kode'");

		if ($query->num_rows() == 0) {
			$query = 0;
		} else {
			$query = $query->num_rows();
		}

		return $query;
	}


	function Get_last_quotation()
	{
		$query = $this->db->query("SELECT *
									FROM quotation
									ORDER BY updtgl desc
									LIMIT 1");

		if ($query->num_rows() == 0) {
			$query = "";
		} else {
			$query = $query->row(0)->quotation_kode;
		}

		return $query;
	}

	function Get_quotation_header_by_id($quotation_id)
	{
		$query = $this->db->query("SELECT
									a.quotation_id,
									a.quotation_kode,
									DATE_FORMAT(a.quotation_tanggal, '%Y-%m-%d') AS quotation_tanggal,
									a.karyawan_id,
									k.karyawan_nama,
									k.karyawan_telp,
									a.customer_id,
									c.customer_nama,
									c.customer_alamat,
									c.customer_kelurahan,
									c.customer_kecamatan,
									c.customer_kota,
									c.customer_provinsi,
									c.customer_kode_pos,
									a.quotation_keterangan,
									a.quotation_jumlah,
									a.quotation_status,
									a.updwho,
									a.updtgl,
									a.quotation_waktu_pengiriman,
									a.quotation_waktu_pengerjaan,
									a.periode_penawaran,
									a.garansi
									FROM quotation a
									LEFT JOIN customer c
									ON c.customer_id = a.customer_id
									LEFT JOIN karyawan k
									ON k.karyawan_id = a.karyawan_id
									WHERE a.quotation_id = '$quotation_id'");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_quotation_detail_by_id($quotation_id)
	{
		$query = $this->db->query("SELECT
									a.quotation_id,
									a.quotation_no_item,
									a.barang_id,
									b.barang_nama,
									b.harga_satuan,
									b.barang_desc,
									b.unit,
									IFNULL(a.quotation_qty, 0) AS qty,
									a.quotation_total,
									a.remarks
									FROM quotation_detail a
									LEFT JOIN barang b
									ON b.barang_id = a.barang_id
									WHERE quotation_id = '$quotation_id'
									ORDER BY a.quotation_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_quotation_termin_by_id($quotation_id)
	{
		$query = $this->db->query("SELECT
									quotation_id,
									quotation_termin_no_item,
									keterangan,
									IFNULL(termin_pembayaran, 0) AS termin_pembayaran
									FROM quotation_termin
									WHERE quotation_id = '$quotation_id'
									ORDER BY quotation_termin_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	public function Get_quotation_by_filter($tgl1, $tgl2, $quotation_id, $customer, $status)
	{
		if ($quotation_id != "") {
			$quotation_id = "AND a.quotation_id LIKE '%$quotation_id%' ";
		} else {
			$quotation_id = "";
		}

		if ($customer != "") {
			$customer = "AND c.customer_nama LIKE '%$customer%' ";
		} else {
			$customer = "";
		}

		if ($status != "") {
			$status = "AND a.quotation_status = '$status' ";
		} else {
			$status = "";
		}

		$query = $this->db->query("SELECT
									a.quotation_id,
									a.quotation_kode,
									DATE_FORMAT(a.quotation_tanggal, '%d-%m-%Y') AS quotation_tanggal,
									a.customer_id,
									c.customer_nama,
									a.quotation_keterangan,
									a.quotation_jumlah,
									a.quotation_status,
									a.updwho,
									a.updtgl,
									a.quotation_waktu_pengiriman,
									a.quotation_waktu_pengerjaan,
									a.periode_penawaran,
									a.garansi
									FROM quotation a
									LEFT JOIN customer c
									ON c.customer_id = a.customer_id
									WHERE DATE_FORMAT(a.quotation_tanggal, '%Y-%m-%d') BETWEEN '$tgl1' AND '$tgl2'
									" . $quotation_id . "
									" . $customer . "
									" . $status . "
									ORDER BY a.quotation_tanggal DESC, a.quotation_kode ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	public function insert_quotation($quotation_id, $quotation_kode, $quotation_tanggal, $customer_id, $quotation_keterangan, $quotation_jumlah, $quotation_status, $updwho, $updtgl, $quotation_waktu_pengiriman, $quotation_waktu_pengerjaan, $periode_penawaran, $garansi, $karyawan_id)
	{
		$quotation_id = $quotation_id == '' ? null : $quotation_id;
		$quotation_kode = $quotation_kode == '' ? null : $quotation_kode;
		$quotation_tanggal = $quotation_tanggal == '' ? null : $quotation_tanggal;
		$customer_id = $customer_id == '' ? null : $customer_id;
		$quotation_keterangan = $quotation_keterangan == '' ? null : $quotation_keterangan;
		$quotation_jumlah = $quotation_jumlah == '' ? null : $quotation_jumlah;
		$quotation_status = $quotation_status == '' ? null : $quotation_status;
		$updwho = $updwho == '' ? null : $updwho;
		$updtgl = $updtgl == '' ? null : $updtgl;
		$quotation_waktu_pengiriman = $quotation_waktu_pengiriman == '' ? null : $quotation_waktu_pengiriman;
		$quotation_waktu_pengerjaan = $quotation_waktu_pengerjaan == '' ? null : $quotation_waktu_pengerjaan;
		$periode_penawaran = $periode_penawaran == '' ? null : $periode_penawaran;
		$garansi = $garansi == '' ? null : $garansi;
		$karyawan_id = $karyawan_id == '' ? null : $karyawan_id;

		$this->db->set('quotation_id', $quotation_id);
		$this->db->set('quotation_kode', $quotation_kode);
		$this->db->set('quotation_tanggal', $quotation_tanggal);
		$this->db->set('customer_id', $customer_id);
		$this->db->set('quotation_keterangan', $quotation_keterangan);
		$this->db->set('quotation_jumlah', $quotation_jumlah);
		$this->db->set('quotation_status', $quotation_status);
		$this->db->set('updwho', $this->session->userdata('pengguna_username'));
		$this->db->set('updtgl', date('Y-m-d H:i:s'));
		$this->db->set('quotation_waktu_pengiriman', $quotation_waktu_pengiriman);
		$this->db->set('quotation_waktu_pengerjaan', $quotation_waktu_pengerjaan);
		// $this->db->set('periode_penawaran', $periode_penawaran);
		$this->db->set('garansi', $garansi);
		$this->db->set('karyawan_id', $karyawan_id);

		$queryinsert = $this->db->insert("quotation");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function update_quotation($quotation_id, $quotation_kode, $quotation_tanggal, $customer_id, $quotation_keterangan, $quotation_jumlah, $quotation_status, $updwho, $updtgl, $quotation_waktu_pengiriman, $quotation_waktu_pengerjaan, $periode_penawaran, $garansi, $karyawan_id)
	{
		$quotation_id = $quotation_id == '' ? null : $quotation_id;
		$quotation_kode = $quotation_kode == '' ? null : $quotation_kode;
		$quotation_tanggal = $quotation_tanggal == '' ? null : $quotation_tanggal;
		$customer_id = $customer_id == '' ? null : $customer_id;
		$quotation_keterangan = $quotation_keterangan == '' ? null : $quotation_keterangan;
		$quotation_jumlah = $quotation_jumlah == '' ? null : $quotation_jumlah;
		$quotation_status = $quotation_status == '' ? null : $quotation_status;
		$updwho = $updwho == '' ? null : $updwho;
		$updtgl = $updtgl == '' ? null : $updtgl;
		$quotation_waktu_pengiriman = $quotation_waktu_pengiriman == '' ? null : $quotation_waktu_pengiriman;
		$quotation_waktu_pengerjaan = $quotation_waktu_pengerjaan == '' ? null : $quotation_waktu_pengerjaan;
		$periode_penawaran = $periode_penawaran == '' ? null : $periode_penawaran;
		$garansi = $garansi == '' ? null : $garansi;
		$karyawan_id = $karyawan_id == '' ? null : $karyawan_id;

		$this->db->set('quotation_kode', $quotation_kode);
		$this->db->set('quotation_tanggal', $quotation_tanggal);
		$this->db->set('customer_id', $customer_id);
		$this->db->set('quotation_keterangan', $quotation_keterangan);
		$this->db->set('quotation_jumlah', $quotation_jumlah);
		$this->db->set('quotation_status', $quotation_status);
		$this->db->set('updwho', $this->session->userdata('pengguna_username'));
		$this->db->set('updtgl', date('Y-m-d H:i:s'));
		$this->db->set('quotation_waktu_pengiriman', $quotation_waktu_pengiriman);
		$this->db->set('quotation_waktu_pengerjaan', $quotation_waktu_pengerjaan);
		// $this->db->set('periode_penawaran', $periode_penawaran);
		$this->db->set('garansi', $garansi);
		$this->db->set('karyawan_id', $karyawan_id);

		$this->db->where('quotation_id', $quotation_id);

		$queryinsert = $this->db->update("quotation");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function insert_quotation_detail($quotation_id, $quotation_no_item, $barang_id, $quotation_qty, $harga_satuan, $quotation_total, $remarks)
	{
		$quotation_id = $quotation_id == '' ? null : $quotation_id;
		$quotation_no_item = $quotation_no_item == '' ? null : $quotation_no_item;
		$barang_id = $barang_id == '' ? null : $barang_id;
		$quotation_qty = $quotation_qty == '' ? null : $quotation_qty;
		$harga_satuan = $harga_satuan == '' ? null : $harga_satuan;
		$quotation_total = $quotation_total == '' ? null : $quotation_total;
		$remarks = $remarks == '' ? null : $remarks;

		$this->db->set('quotation_id', $quotation_id);
		$this->db->set('quotation_no_item', $quotation_no_item);
		$this->db->set('barang_id', $barang_id);
		$this->db->set('quotation_qty', $quotation_qty);
		$this->db->set('harga_satuan', $harga_satuan);
		$this->db->set('quotation_total', $quotation_total);
		$this->db->set('remarks', $remarks);

		$queryinsert = $this->db->insert("quotation_detail");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function insert_quotation_termin($quotation_id, $quotation_termin_no_item, $keterangan, $termin_pembayaran)
	{
		$quotation_id = $quotation_id == '' ? null : $quotation_id;
		$quotation_termin_no_item = $quotation_termin_no_item == '' ? null : $quotation_termin_no_item;
		$keterangan = $keterangan == '' ? null : $keterangan;
		$termin_pembayaran = $termin_pembayaran == '' ? null : $termin_pembayaran;

		$this->db->set('quotation_id', $quotation_id);
		$this->db->set('quotation_termin_no_item', $quotation_termin_no_item);
		$this->db->set('keterangan', $keterangan);
		$this->db->set('termin_pembayaran', $termin_pembayaran);

		$queryinsert = $this->db->insert("quotation_termin");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function delete_quotation_detail($quotation_id)
	{
		$this->db->where('quotation_id', $quotation_id);
		$queryinsert = $this->db->delete("quotation_detail");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function delete_quotation_termin($quotation_id)
	{
		$this->db->where('quotation_id', $quotation_id);
		$queryinsert = $this->db->delete("quotation_termin");

		return $queryinsert;
		// return $this->db->last_query();
	}
}
