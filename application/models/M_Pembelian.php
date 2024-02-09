<?php

class M_Pembelian extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		// $this->db = $this->load->database('d4',true);
	}

	public function cek_pembelian_duplicate($pembelian_kode)
	{
		// $this->db->select("*")
		// 	->from("msgl")
		// 	->order_by("gl04")
		// 	->order_by("gl01");
		// $query = $this->db->get();

		$query = $this->db->query("SELECT * FROM pembelian where pembelian_kode = '$pembelian_kode'");

		if ($query->num_rows() == 0) {
			$query = 0;
		} else {
			$query = $query->num_rows();
		}

		return $query;
	}

	function Get_last_pembelian()
	{
		$query = $this->db->query("SELECT *
									FROM penjualan
									ORDER BY updtgl desc
									LIMIT 1");

		if ($query->num_rows() == 0) {
			$query = "";
		} else {
			$query = $query->row(0)->penjualan_kode;
		}

		return $query;
	}

	function Get_pembelian_header_by_id($pembelian_id)
	{
		$query = $this->db->query("SELECT
									a.pembelian_id,
									a.pembelian_kode,
									DATE_FORMAT(a.pembelian_tanggal, '%Y-%m-%d') AS pembelian_tanggal,
									a.supplier_id,
									c.supplier_nama,
									c.supplier_alamat,
									c.supplier_kelurahan,
									c.supplier_kecamatan,
									c.supplier_kota,
									c.supplier_provinsi,
									c.supplier_kode_pos,
									a.pembelian_keterangan,
									a.pembelian_jumlah,
									a.pembelian_status,
									a.updwho,
									a.updtgl,
									a.pembelian_waktu_pengiriman,
									a.pembelian_waktu_pengerjaan,
									a.periode_penawaran,
									a.garansi,
									a.pembelian_no_po,
									a.pembelian_pic,
									a.pembelian_oleh,
									IFNULL(b.attachment, '') AS attachment
									FROM pembelian a
									LEFT JOIN pembelian_attachment b
									ON b.pembelian_id = a.pembelian_id
									LEFT JOIN supplier c
									ON c.supplier_id = a.supplier_id
									WHERE a.pembelian_id = '$pembelian_id'");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_cetak_invoice_pembelian_header_by_id($pembelian_id)
	{
		$query = $this->db->query("SELECT
									a.pembelian_id,
									a.pembelian_kode,
									DATE_FORMAT(a.pembelian_tanggal, '%d %M %Y') AS pembelian_tanggal,
									a.supplier_id,
									c.supplier_nama,
									c.supplier_alamat,
									c.supplier_kelurahan,
									c.supplier_kecamatan,
									c.supplier_kota,
									c.supplier_provinsi,
									c.supplier_kode_pos,
									a.pembelian_keterangan,
									a.pembelian_jumlah,
									a.pembelian_status,
									a.updwho,
									a.updtgl,
									a.pembelian_waktu_pengiriman,
									a.pembelian_waktu_pengerjaan,
									a.periode_penawaran,
									a.garansi,
									a.pembelian_no_po,
									a.pembelian_pic,
									a.pembelian_oleh,
									IFNULL(b.attachment, '') AS attachment
									FROM pembelian a
									LEFT JOIN pembelian_attachment b
									ON b.pembelian_id = a.pembelian_id
									LEFT JOIN supplier c
									ON c.supplier_id = a.supplier_id
									WHERE a.pembelian_id = '$pembelian_id'");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_pembelian_detail_by_id($pembelian_id)
	{
		$query = $this->db->query("SELECT
									a.pembelian_id,
									a.pembelian_no_item,
									a.barang_id,
									b.barang_nama,
									IFNULL(b.harga_satuan, 0) AS harga_satuan,
									b.barang_desc,
									b.unit,
									IFNULL(a.pembelian_qty, 0) AS qty,
									a.pembelian_total,
									a.remarks
									FROM pembelian_detail a
									LEFT JOIN barang b
									ON b.barang_id = a.barang_id
									WHERE a.pembelian_id = '$pembelian_id'
									ORDER BY a.pembelian_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_cetak_invoice_pembelian_detail_termin_by_id($pembelian_id, $no_urut)
	{
		$query = $this->db->query("SELECT
									a.pembelian_id,
									a.pembelian_no_item,
									a.barang_id,
									b.barang_nama,
									IFNULL(b.harga_satuan, 0) AS harga_satuan,
									b.barang_desc,
									b.unit,
									IFNULL(a.pembelian_qty, 0) AS qty,
									a.pembelian_total,
									a.remarks,
									IFNULL(c.termin_pembayaran, 0) AS termin_pembayaran
									FROM pembelian_detail a
									LEFT JOIN pembelian_termin c
									ON c.pembelian_id = a.pembelian_id
									AND c.pembelian_termin_no_item = '$no_urut'
									LEFT JOIN barang b
									ON b.barang_id = a.barang_id
									WHERE a.pembelian_id = '$pembelian_id'
									ORDER BY a.pembelian_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_pembelian_termin_by_id($pembelian_id)
	{
		$query = $this->db->query("SELECT
									pembelian_id,
									pembelian_termin_no_item,
									keterangan,
									IFNULL(termin_pembayaran, 0) AS termin_pembayaran
									FROM pembelian_termin
									WHERE pembelian_id = '$pembelian_id'
									ORDER BY pembelian_termin_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_cetak_invoice_pembelian_termin_by_id($pembelian_id, $no_urut)
	{
		$query = $this->db->query("SELECT
									pembelian_id,
									pembelian_termin_no_item,
									keterangan,
									IFNULL(termin_pembayaran, 0) AS termin_pembayaran
									FROM pembelian_termin
									WHERE pembelian_id = '$pembelian_id'
									AND pembelian_termin_no_item = '$no_urut'
									ORDER BY pembelian_termin_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	public function Get_pembelian_by_filter($tgl1, $tgl2, $pembelian_id, $supplier, $status)
	{
		if ($pembelian_id != "") {
			$pembelian_id = "AND a.pembelian_id LIKE '%$pembelian_id%' ";
		} else {
			$pembelian_id = "";
		}

		if ($supplier != "") {
			$supplier = "AND c.supplier_nama LIKE '%$supplier%' ";
		} else {
			$supplier = "";
		}

		if ($status != "") {
			$status = "AND a.pembelian_status = '$status' ";
		} else {
			$status = "";
		}

		$query = $this->db->query("SELECT
									a.pembelian_id,
									a.pembelian_kode,
									a.pembelian_no_po,
									DATE_FORMAT(a.pembelian_tanggal, '%d-%m-%Y') AS pembelian_tanggal,
									a.supplier_id,
									c.supplier_nama,
									a.pembelian_keterangan,
									a.pembelian_jumlah,
									a.pembelian_status,
									a.updwho,
									a.updtgl,
									a.pembelian_waktu_pengiriman,
									a.pembelian_waktu_pengerjaan,
									a.periode_penawaran,
									a.garansi
									FROM pembelian a
									LEFT JOIN supplier c
									ON c.supplier_id = a.supplier_id
									WHERE DATE_FORMAT(a.pembelian_tanggal, '%Y-%m-%d') BETWEEN '$tgl1' AND '$tgl2'
									" . $pembelian_id . "
									" . $supplier . "
									" . $status . "
									ORDER BY a.pembelian_tanggal DESC, a.pembelian_kode ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	public function insert_pembelian($pembelian_id, $pembelian_kode, $pembelian_tanggal, $supplier_id, $pembelian_keterangan, $pembelian_jumlah, $pembelian_status, $updwho, $updtgl, $pembelian_waktu_pengiriman, $pembelian_waktu_pengerjaan, $periode_penawaran, $garansi, $pembelian_no_po, $pembelian_pic, $pembelian_oleh)
	{
		$pembelian_id = $pembelian_id == '' ? null : $pembelian_id;
		$pembelian_kode = $pembelian_kode == '' ? null : $pembelian_kode;
		$pembelian_tanggal = $pembelian_tanggal == '' ? null : $pembelian_tanggal;
		$supplier_id = $supplier_id == '' ? null : $supplier_id;
		$pembelian_keterangan = $pembelian_keterangan == '' ? null : $pembelian_keterangan;
		$pembelian_jumlah = $pembelian_jumlah == '' ? null : $pembelian_jumlah;
		$pembelian_status = $pembelian_status == '' ? null : $pembelian_status;
		$updwho = $updwho == '' ? null : $updwho;
		$updtgl = $updtgl == '' ? null : $updtgl;
		$pembelian_waktu_pengiriman = $pembelian_waktu_pengiriman == '' ? null : $pembelian_waktu_pengiriman;
		$pembelian_waktu_pengerjaan = $pembelian_waktu_pengerjaan == '' ? null : $pembelian_waktu_pengerjaan;
		$periode_penawaran = $periode_penawaran == '' ? null : $periode_penawaran;
		$garansi = $garansi == '' ? null : $garansi;
		$pembelian_no_po = $pembelian_no_po == '' ? null : $pembelian_no_po;
		$pembelian_pic = $pembelian_pic == '' ? null : $pembelian_pic;
		$pembelian_oleh = $pembelian_oleh == '' ? null : $pembelian_oleh;

		$this->db->set('pembelian_id', $pembelian_id);
		$this->db->set('pembelian_kode', $pembelian_kode);
		$this->db->set('pembelian_tanggal', $pembelian_tanggal);
		$this->db->set('supplier_id', $supplier_id);
		$this->db->set('pembelian_keterangan', $pembelian_keterangan);
		$this->db->set('pembelian_jumlah', $pembelian_jumlah);
		$this->db->set('pembelian_status', $pembelian_status);
		$this->db->set('updwho', $this->session->userdata('pengguna_username'));
		$this->db->set('updtgl', date('Y-m-d H:i:s'));
		$this->db->set('pembelian_waktu_pengiriman', $pembelian_waktu_pengiriman);
		$this->db->set('pembelian_waktu_pengerjaan', $pembelian_waktu_pengerjaan);
		// $this->db->set('periode_penawaran', $periode_penawaran);
		$this->db->set('garansi', $garansi);
		$this->db->set('pembelian_no_po', $pembelian_no_po);
		$this->db->set('pembelian_pic', $pembelian_pic);
		$this->db->set('pembelian_oleh', $pembelian_oleh);

		$queryinsert = $this->db->insert("pembelian");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function update_pembelian($pembelian_id, $pembelian_kode, $pembelian_tanggal, $supplier_id, $pembelian_keterangan, $pembelian_jumlah, $pembelian_status, $updwho, $updtgl, $pembelian_waktu_pengiriman, $pembelian_waktu_pengerjaan, $periode_penawaran, $garansi, $pembelian_no_po, $pembelian_pic, $pembelian_oleh)
	{
		$pembelian_id = $pembelian_id == '' ? null : $pembelian_id;
		$pembelian_kode = $pembelian_kode == '' ? null : $pembelian_kode;
		$pembelian_tanggal = $pembelian_tanggal == '' ? null : $pembelian_tanggal;
		$supplier_id = $supplier_id == '' ? null : $supplier_id;
		$pembelian_keterangan = $pembelian_keterangan == '' ? null : $pembelian_keterangan;
		$pembelian_jumlah = $pembelian_jumlah == '' ? null : $pembelian_jumlah;
		$pembelian_status = $pembelian_status == '' ? null : $pembelian_status;
		$updwho = $updwho == '' ? null : $updwho;
		$updtgl = $updtgl == '' ? null : $updtgl;
		$pembelian_waktu_pengiriman = $pembelian_waktu_pengiriman == '' ? null : $pembelian_waktu_pengiriman;
		$pembelian_waktu_pengerjaan = $pembelian_waktu_pengerjaan == '' ? null : $pembelian_waktu_pengerjaan;
		$periode_penawaran = $periode_penawaran == '' ? null : $periode_penawaran;
		$garansi = $garansi == '' ? null : $garansi;
		$pembelian_no_po = $pembelian_no_po == '' ? null : $pembelian_no_po;
		$pembelian_pic = $pembelian_pic == '' ? null : $pembelian_pic;
		$pembelian_oleh = $pembelian_oleh == '' ? null : $pembelian_oleh;

		$this->db->set('pembelian_kode', $pembelian_kode);
		$this->db->set('pembelian_tanggal', $pembelian_tanggal);
		$this->db->set('supplier_id', $supplier_id);
		$this->db->set('pembelian_keterangan', $pembelian_keterangan);
		$this->db->set('pembelian_jumlah', $pembelian_jumlah);
		$this->db->set('pembelian_status', $pembelian_status);
		$this->db->set('updwho', $this->session->userdata('pengguna_username'));
		$this->db->set('updtgl', date('Y-m-d H:i:s'));
		$this->db->set('pembelian_waktu_pengiriman', $pembelian_waktu_pengiriman);
		$this->db->set('pembelian_waktu_pengerjaan', $pembelian_waktu_pengerjaan);
		// $this->db->set('periode_penawaran', $periode_penawaran);
		$this->db->set('garansi', $garansi);
		$this->db->set('pembelian_no_po', $pembelian_no_po);
		$this->db->set('pembelian_pic', $pembelian_pic);
		$this->db->set('pembelian_oleh', $pembelian_oleh);

		$this->db->where('pembelian_id', $pembelian_id);


		$queryinsert = $this->db->update("pembelian");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function insert_pembelian_detail($pembelian_id, $pembelian_no_item, $barang_id, $pembelian_qty, $harga_satuan, $pembelian_total, $remarks)
	{
		$pembelian_id = $pembelian_id == '' ? null : $pembelian_id;
		$pembelian_no_item = $pembelian_no_item == '' ? null : $pembelian_no_item;
		$barang_id = $barang_id == '' ? null : $barang_id;
		$pembelian_qty = $pembelian_qty == '' ? null : $pembelian_qty;
		$harga_satuan = $harga_satuan == '' ? null : $harga_satuan;
		$pembelian_total = $pembelian_total == '' ? null : $pembelian_total;
		$remarks = $remarks == '' ? null : $remarks;

		$this->db->set('pembelian_id', $pembelian_id);
		$this->db->set('pembelian_no_item', $pembelian_no_item);
		$this->db->set('barang_id', $barang_id);
		$this->db->set('pembelian_qty', $pembelian_qty);
		$this->db->set('harga_satuan', $harga_satuan);
		$this->db->set('pembelian_total', $pembelian_total);
		$this->db->set('remarks', $remarks);

		$queryinsert = $this->db->insert("pembelian_detail");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function insert_pembelian_termin($pembelian_id, $pembelian_termin_no_item, $keterangan, $termin_pembayaran)
	{
		$pembelian_id = $pembelian_id == '' ? null : $pembelian_id;
		$pembelian_termin_no_item = $pembelian_termin_no_item == '' ? null : $pembelian_termin_no_item;
		$keterangan = $keterangan == '' ? null : $keterangan;
		$termin_pembayaran = $termin_pembayaran == '' ? null : $termin_pembayaran;

		$this->db->set('pembelian_id', $pembelian_id);
		$this->db->set('pembelian_termin_no_item', $pembelian_termin_no_item);
		$this->db->set('keterangan', $keterangan);
		$this->db->set('termin_pembayaran', $termin_pembayaran);

		$queryinsert = $this->db->insert("pembelian_termin");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function delete_pembelian_detail($pembelian_id)
	{
		$this->db->where('pembelian_id', $pembelian_id);
		$queryinsert = $this->db->delete("pembelian_detail");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function delete_pembelian_termin($pembelian_id)
	{
		$this->db->where('pembelian_id', $pembelian_id);
		$queryinsert = $this->db->delete("pembelian_termin");

		return $queryinsert;
		// return $this->db->last_query();
	}
}
