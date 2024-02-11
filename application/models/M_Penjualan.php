<?php

class M_Penjualan extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		// $this->db = $this->load->database('d4',true);
	}

	public function cek_penjualan_duplicate($penjualan_kode)
	{
		// $this->db->select("*")
		// 	->from("msgl")
		// 	->order_by("gl04")
		// 	->order_by("gl01");
		// $query = $this->db->get();

		$query = $this->db->query("SELECT * FROM penjualan where penjualan_kode = '$penjualan_kode'");

		if ($query->num_rows() == 0) {
			$query = 0;
		} else {
			$query = $query->num_rows();
		}

		return $query;
	}

	function Get_last_penjualan()
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

	function Get_penjualan_header_by_id($penjualan_id)
	{
		$query = $this->db->query("SELECT
									a.penjualan_id,
									a.penjualan_kode,
									DATE_FORMAT(a.penjualan_tanggal, '%Y-%m-%d') AS penjualan_tanggal,
									a.karyawan_id,
									IFNULL(k.karyawan_nama,'') AS karyawan_nama,
									IFNULL(k.karyawan_telp,'') AS karyawan_telp,
									a.customer_id,
									c.customer_nama,
									c.customer_alamat,
									c.customer_kelurahan,
									c.customer_kecamatan,
									c.customer_kota,
									c.customer_provinsi,
									c.customer_kode_pos,
									a.penjualan_keterangan,
									a.penjualan_jumlah,
									a.penjualan_status,
									a.updwho,
									a.updtgl,
									a.penjualan_waktu_pengiriman,
									a.penjualan_waktu_pengerjaan,
									a.periode_penawaran,
									a.garansi,
									a.penjualan_no_po,
									a.perusahaan_id,
									a.penjualan_pic,
									a.penjualan_oleh,
									IFNULL(a.is_ppn,0) AS is_ppn,
									IFNULL(a.is_pph,0) AS is_pph,
									IFNULL(a.no_faktur,'') AS no_faktur,
									DATE_FORMAT(a.tanggal_faktur, '%Y-%m-%d') AS tanggal_faktur,
									IFNULL(b.attachment, '') AS attachment
									FROM penjualan a
									LEFT JOIN penjualan_attachment b
									ON b.penjualan_id = a.penjualan_id
									LEFT JOIN customer c
									ON c.customer_id = a.customer_id
									LEFT JOIN karyawan k
									ON k.karyawan_id = a.karyawan_id
									WHERE a.penjualan_id = '$penjualan_id'");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_cetak_invoice_penjualan_header_by_id($penjualan_id)
	{
		$query = $this->db->query("SELECT
									a.penjualan_id,
									a.penjualan_kode,
									DATE_FORMAT(a.penjualan_tanggal, '%d %M %Y') AS penjualan_tanggal,
									a.karyawan_id,
									IFNULL(k.karyawan_nama,'') AS karyawan_nama,
									IFNULL(k.karyawan_telp,'') AS karyawan_telp,
									a.customer_id,
									c.customer_nama,
									c.customer_alamat,
									c.customer_kelurahan,
									c.customer_kecamatan,
									c.customer_kota,
									c.customer_provinsi,
									c.customer_kode_pos,
									a.penjualan_keterangan,
									a.penjualan_jumlah,
									a.penjualan_status,
									a.updwho,
									a.updtgl,
									a.penjualan_waktu_pengiriman,
									a.penjualan_waktu_pengerjaan,
									a.periode_penawaran,
									a.garansi,
									a.penjualan_no_po,
									a.perusahaan_id,
									a.penjualan_pic,
									a.penjualan_oleh,
									IFNULL(a.is_ppn,0) AS is_ppn,
									IFNULL(a.is_pph,0) AS is_pph,
									IFNULL(a.no_faktur,'') AS no_faktur,
									DATE_FORMAT(a.tanggal_faktur, '%d %M %Y') AS tanggal_faktur,
									IFNULL(b.attachment, '') AS attachment
									FROM penjualan a
									LEFT JOIN penjualan_attachment b
									ON b.penjualan_id = a.penjualan_id
									LEFT JOIN customer c
									ON c.customer_id = a.customer_id
									LEFT JOIN karyawan k
									ON k.karyawan_id = a.karyawan_id
									WHERE a.penjualan_id = '$penjualan_id'");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_penjualan_detail_by_id($penjualan_id)
	{
		$query = $this->db->query("SELECT
									a.penjualan_id,
									a.penjualan_no_item,
									a.barang_id,
									b.barang_nama,
									IFNULL(b.harga_satuan, 0) AS harga_satuan,
									b.barang_desc,
									b.unit,
									IFNULL(a.penjualan_qty, 0) AS qty,
									a.penjualan_total,
									a.remarks
									FROM penjualan_detail a
									LEFT JOIN barang b
									ON b.barang_id = a.barang_id
									WHERE a.penjualan_id = '$penjualan_id'
									ORDER BY a.penjualan_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_cetak_invoice_penjualan_detail_termin_by_id($penjualan_id, $no_urut)
	{
		$query = $this->db->query("SELECT
									a.penjualan_id,
									a.penjualan_no_item,
									a.barang_id,
									b.barang_nama,
									IFNULL(b.harga_satuan, 0) AS harga_satuan,
									b.barang_desc,
									b.unit,
									IFNULL(a.penjualan_qty, 0) AS qty,
									a.penjualan_total,
									a.remarks,
									IFNULL(c.termin_pembayaran, 0) AS termin_pembayaran
									FROM penjualan_detail a
									LEFT JOIN penjualan_termin c
									ON c.penjualan_id = a.penjualan_id
									AND c.penjualan_termin_no_item = '$no_urut'
									LEFT JOIN barang b
									ON b.barang_id = a.barang_id
									WHERE a.penjualan_id = '$penjualan_id'
									ORDER BY a.penjualan_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_penjualan_termin_by_id($penjualan_id)
	{
		$query = $this->db->query("SELECT
									penjualan_id,
									penjualan_termin_no_item,
									keterangan,
									IFNULL(termin_pembayaran, 0) AS termin_pembayaran,
									IFNULL(termin_status, '') AS termin_status,
									DATE_FORMAT(termin_tanggal_bayar, '%Y-%m-%d') AS termin_tanggal_bayar,
									DATE_FORMAT(tanggal_invoice, '%Y-%m-%d') AS tanggal_invoice,
									DATE_FORMAT(termin_tanggal_update, '%Y-%m-%d %H:%i:%s') AS termin_tanggal_update
									FROM penjualan_termin
									WHERE penjualan_id = '$penjualan_id'
									ORDER BY penjualan_termin_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	function Get_cetak_invoice_penjualan_termin_by_id($penjualan_id, $no_urut)
	{
		$query = $this->db->query("SELECT
									penjualan_id,
									penjualan_termin_no_item,
									keterangan,
									IFNULL(termin_pembayaran, 0) AS termin_pembayaran,
									DATE_FORMAT(tanggal_invoice, '%d %M %Y') AS tanggal_invoice
									FROM penjualan_termin
									WHERE penjualan_id = '$penjualan_id'
									AND penjualan_termin_no_item = '$no_urut'
									ORDER BY penjualan_termin_no_item ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	public function Get_penjualan_by_filter($tgl1, $tgl2, $penjualan_id, $customer, $status)
	{
		if ($penjualan_id != "") {
			$penjualan_id = "AND a.penjualan_id LIKE '%$penjualan_id%' ";
		} else {
			$penjualan_id = "";
		}

		if ($customer != "") {
			$customer = "AND c.customer_nama LIKE '%$customer%' ";
		} else {
			$customer = "";
		}

		if ($status != "") {
			$status = "AND a.penjualan_status = '$status' ";
		} else {
			$status = "";
		}

		$query = $this->db->query("SELECT
									a.penjualan_id,
									a.penjualan_kode,
									a.penjualan_no_po,
									DATE_FORMAT(a.penjualan_tanggal, '%d-%m-%Y') AS penjualan_tanggal,
									a.customer_id,
									c.customer_nama,
									a.penjualan_keterangan,
									a.penjualan_jumlah,
									a.penjualan_status,
									a.updwho,
									a.updtgl,
									a.penjualan_waktu_pengiriman,
									a.penjualan_waktu_pengerjaan,
									a.periode_penawaran,
									a.garansi
									FROM penjualan a
									LEFT JOIN customer c
									ON c.customer_id = a.customer_id
									WHERE DATE_FORMAT(a.penjualan_tanggal, '%Y-%m-%d') BETWEEN '$tgl1' AND '$tgl2'
									" . $penjualan_id . "
									" . $customer . "
									" . $status . "
									ORDER BY a.penjualan_tanggal DESC, a.penjualan_kode ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}

	public function insert_penjualan($penjualan_id, $penjualan_kode, $penjualan_tanggal, $customer_id, $penjualan_keterangan, $penjualan_jumlah, $penjualan_status, $updwho, $updtgl, $penjualan_waktu_pengiriman, $penjualan_waktu_pengerjaan, $periode_penawaran, $garansi, $penjualan_no_po, $penjualan_pic, $penjualan_oleh, $karyawan_id, $is_ppn, $is_pph, $tanggal_faktur, $no_faktur, $perusahaan_id)
	{
		$penjualan_id = $penjualan_id == '' ? null : $penjualan_id;
		$penjualan_kode = $penjualan_kode == '' ? null : $penjualan_kode;
		$penjualan_tanggal = $penjualan_tanggal == '' ? null : $penjualan_tanggal;
		$customer_id = $customer_id == '' ? null : $customer_id;
		$penjualan_keterangan = $penjualan_keterangan == '' ? null : $penjualan_keterangan;
		$penjualan_jumlah = $penjualan_jumlah == '' ? null : $penjualan_jumlah;
		$penjualan_status = $penjualan_status == '' ? null : $penjualan_status;
		$updwho = $updwho == '' ? null : $updwho;
		$updtgl = $updtgl == '' ? null : $updtgl;
		$penjualan_waktu_pengiriman = $penjualan_waktu_pengiriman == '' ? null : $penjualan_waktu_pengiriman;
		$penjualan_waktu_pengerjaan = $penjualan_waktu_pengerjaan == '' ? null : $penjualan_waktu_pengerjaan;
		$periode_penawaran = $periode_penawaran == '' ? null : $periode_penawaran;
		$garansi = $garansi == '' ? null : $garansi;
		$penjualan_no_po = $penjualan_no_po == '' ? null : $penjualan_no_po;
		$penjualan_pic = $penjualan_pic == '' ? null : $penjualan_pic;
		$penjualan_oleh = $penjualan_oleh == '' ? null : $penjualan_oleh;
		$karyawan_id = $karyawan_id == '' ? null : $karyawan_id;
		$is_ppn = $is_ppn == '' ? null : $is_ppn;
		$is_pph = $is_pph == '' ? null : $is_pph;
		$tanggal_faktur = $tanggal_faktur == '' ? null : $tanggal_faktur;
		$no_faktur = $no_faktur == '' ? null : $no_faktur;
		$perusahaan_id = $perusahaan_id == '' ? null : $perusahaan_id;

		$this->db->set('penjualan_id', $penjualan_id);
		$this->db->set('penjualan_kode', $penjualan_kode);
		$this->db->set('penjualan_tanggal', $penjualan_tanggal);
		$this->db->set('customer_id', $customer_id);
		$this->db->set('penjualan_keterangan', $penjualan_keterangan);
		$this->db->set('penjualan_jumlah', $penjualan_jumlah);
		$this->db->set('penjualan_status', $penjualan_status);
		$this->db->set('updwho', $this->session->userdata('pengguna_username'));
		$this->db->set('updtgl', date('Y-m-d H:i:s'));
		$this->db->set('penjualan_waktu_pengiriman', $penjualan_waktu_pengiriman);
		$this->db->set('penjualan_waktu_pengerjaan', $penjualan_waktu_pengerjaan);
		// $this->db->set('periode_penawaran', $periode_penawaran);
		$this->db->set('garansi', $garansi);
		$this->db->set('penjualan_no_po', $penjualan_no_po);
		$this->db->set('penjualan_pic', $penjualan_pic);
		$this->db->set('penjualan_oleh', $penjualan_oleh);
		$this->db->set('karyawan_id', $karyawan_id);
		$this->db->set('is_ppn', $is_ppn);
		$this->db->set('is_pph', $is_pph);
		$this->db->set('tanggal_faktur', $tanggal_faktur);
		$this->db->set('no_faktur', $no_faktur);
		$this->db->set('perusahaan_id', $perusahaan_id);

		$queryinsert = $this->db->insert("penjualan");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function update_penjualan($penjualan_id, $penjualan_kode, $penjualan_tanggal, $customer_id, $penjualan_keterangan, $penjualan_jumlah, $penjualan_status, $updwho, $updtgl, $penjualan_waktu_pengiriman, $penjualan_waktu_pengerjaan, $periode_penawaran, $garansi, $penjualan_no_po, $penjualan_pic, $penjualan_oleh, $karyawan_id, $is_ppn, $is_pph, $tanggal_faktur, $no_faktur, $perusahaan_id)
	{
		$penjualan_id = $penjualan_id == '' ? null : $penjualan_id;
		$penjualan_kode = $penjualan_kode == '' ? null : $penjualan_kode;
		$penjualan_tanggal = $penjualan_tanggal == '' ? null : $penjualan_tanggal;
		$customer_id = $customer_id == '' ? null : $customer_id;
		$penjualan_keterangan = $penjualan_keterangan == '' ? null : $penjualan_keterangan;
		$penjualan_jumlah = $penjualan_jumlah == '' ? null : $penjualan_jumlah;
		$penjualan_status = $penjualan_status == '' ? null : $penjualan_status;
		$updwho = $updwho == '' ? null : $updwho;
		$updtgl = $updtgl == '' ? null : $updtgl;
		$penjualan_waktu_pengiriman = $penjualan_waktu_pengiriman == '' ? null : $penjualan_waktu_pengiriman;
		$penjualan_waktu_pengerjaan = $penjualan_waktu_pengerjaan == '' ? null : $penjualan_waktu_pengerjaan;
		$periode_penawaran = $periode_penawaran == '' ? null : $periode_penawaran;
		$garansi = $garansi == '' ? null : $garansi;
		$penjualan_no_po = $penjualan_no_po == '' ? null : $penjualan_no_po;
		$penjualan_pic = $penjualan_pic == '' ? null : $penjualan_pic;
		$penjualan_oleh = $penjualan_oleh == '' ? null : $penjualan_oleh;
		$karyawan_id = $karyawan_id == '' ? null : $karyawan_id;
		$is_ppn = $is_ppn == '' ? null : $is_ppn;
		$is_pph = $is_pph == '' ? null : $is_pph;
		$tanggal_faktur = $tanggal_faktur == '' ? null : $tanggal_faktur;
		$no_faktur = $no_faktur == '' ? null : $no_faktur;
		$perusahaan_id = $perusahaan_id == '' ? null : $perusahaan_id;

		$this->db->set('penjualan_kode', $penjualan_kode);
		$this->db->set('penjualan_tanggal', $penjualan_tanggal);
		$this->db->set('customer_id', $customer_id);
		$this->db->set('penjualan_keterangan', $penjualan_keterangan);
		$this->db->set('penjualan_jumlah', $penjualan_jumlah);
		$this->db->set('penjualan_status', $penjualan_status);
		$this->db->set('updwho', $this->session->userdata('pengguna_username'));
		$this->db->set('updtgl', date('Y-m-d H:i:s'));
		$this->db->set('penjualan_waktu_pengiriman', $penjualan_waktu_pengiriman);
		$this->db->set('penjualan_waktu_pengerjaan', $penjualan_waktu_pengerjaan);
		// $this->db->set('periode_penawaran', $periode_penawaran);
		$this->db->set('garansi', $garansi);
		$this->db->set('penjualan_no_po', $penjualan_no_po);
		$this->db->set('penjualan_pic', $penjualan_pic);
		$this->db->set('penjualan_oleh', $penjualan_oleh);
		$this->db->set('karyawan_id', $karyawan_id);
		$this->db->set('is_ppn', $is_ppn);
		$this->db->set('is_pph', $is_pph);
		$this->db->set('tanggal_faktur', $tanggal_faktur);
		$this->db->set('no_faktur', $no_faktur);
		$this->db->set('perusahaan_id', $perusahaan_id);

		$this->db->where('penjualan_id', $penjualan_id);

		$queryinsert = $this->db->update("penjualan");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function insert_penjualan_detail($penjualan_id, $penjualan_no_item, $barang_id, $penjualan_qty, $harga_satuan, $penjualan_total, $remarks)
	{
		$penjualan_id = $penjualan_id == '' ? null : $penjualan_id;
		$penjualan_no_item = $penjualan_no_item == '' ? null : $penjualan_no_item;
		$barang_id = $barang_id == '' ? null : $barang_id;
		$penjualan_qty = $penjualan_qty == '' ? null : $penjualan_qty;
		$harga_satuan = $harga_satuan == '' ? null : $harga_satuan;
		$penjualan_total = $penjualan_total == '' ? null : $penjualan_total;
		$remarks = $remarks == '' ? null : $remarks;

		$this->db->set('penjualan_id', $penjualan_id);
		$this->db->set('penjualan_no_item', $penjualan_no_item);
		$this->db->set('barang_id', $barang_id);
		$this->db->set('penjualan_qty', $penjualan_qty);
		$this->db->set('harga_satuan', $harga_satuan);
		$this->db->set('penjualan_total', $penjualan_total);
		$this->db->set('remarks', $remarks);

		$queryinsert = $this->db->insert("penjualan_detail");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function insert_penjualan_termin($penjualan_id, $penjualan_termin_no_item, $keterangan, $termin_pembayaran, $termin_status, $termin_tanggal_bayar, $tanggal_invoice)
	{
		$penjualan_id = $penjualan_id == '' ? null : $penjualan_id;
		$penjualan_termin_no_item = $penjualan_termin_no_item == '' ? null : $penjualan_termin_no_item;
		$keterangan = $keterangan == '' ? null : $keterangan;
		$termin_pembayaran = $termin_pembayaran == '' ? null : $termin_pembayaran;
		$termin_status = $termin_status == '' ? null : $termin_status;
		$termin_tanggal_bayar = $termin_tanggal_bayar == '' ? null : $termin_tanggal_bayar;
		$tanggal_invoice = $tanggal_invoice == '' ? null : $tanggal_invoice;

		$this->db->set('penjualan_id', $penjualan_id);
		$this->db->set('penjualan_termin_no_item', $penjualan_termin_no_item);
		$this->db->set('keterangan', $keterangan);
		$this->db->set('termin_pembayaran', $termin_pembayaran);
		$this->db->set('termin_status', $termin_status);
		$this->db->set('termin_tanggal_bayar', $termin_tanggal_bayar);
		$this->db->set('termin_tanggal_update', date('Y-m-d H:i:s'));
		$this->db->set('tanggal_invoice', $tanggal_invoice);

		$queryinsert = $this->db->insert("penjualan_termin");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function delete_penjualan_detail($penjualan_id)
	{
		$this->db->where('penjualan_id', $penjualan_id);
		$queryinsert = $this->db->delete("penjualan_detail");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function delete_penjualan_termin($penjualan_id)
	{
		$this->db->where('penjualan_id', $penjualan_id);
		$queryinsert = $this->db->delete("penjualan_termin");

		return $queryinsert;
		// return $this->db->last_query();
	}

	public function Update_termin_pembayaran($penjualan_id, $penjualan_termin_no_item, $termin_tanggal_bayar, $termin_status, $tanggal_invoice)
	{
		$penjualan_id = $penjualan_id == '' ? null : $penjualan_id;
		$penjualan_termin_no_item = $penjualan_termin_no_item == '' ? null : $penjualan_termin_no_item;
		$termin_tanggal_bayar = $termin_tanggal_bayar == '' ? null : $termin_tanggal_bayar;
		$termin_status = $termin_status == '' ? null : $termin_status;
		$tanggal_invoice = $tanggal_invoice == '' ? null : $tanggal_invoice;

		$this->db->set('updwho', $this->session->userdata('pengguna_username'));
		$this->db->set('updtgl', date('Y-m-d H:i:s'));

		$this->db->where('penjualan_id', $penjualan_id);

		$this->db->update("penjualan");

		$this->db->set('termin_tanggal_bayar', $termin_tanggal_bayar);
		$this->db->set('termin_status', $termin_status);
		$this->db->set('tanggal_invoice', $tanggal_invoice);
		$this->db->set('termin_tanggal_update', date('Y-m-d H:i:s'));

		$this->db->where('penjualan_termin_no_item', $penjualan_termin_no_item);
		$this->db->where('penjualan_id', $penjualan_id);

		$queryinsert = $this->db->update("penjualan_termin");

		return $queryinsert;
		// return $this->db->last_query();
	}
}
