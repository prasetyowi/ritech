<?php

class M_PengeluaranKas extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function cek_pengeluaran_kas_duplicate($kas_id)
    {
        // $this->db->select("*")
        // 	->from("msgl")
        // 	->order_by("gl04")
        // 	->order_by("gl01");
        // $query = $this->db->get();

        $query = $this->db->query("SELECT * FROM kas where kas_id = '$kas_id'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    public function Get_tipe_kas()
    {

        $query = $this->db->query("SELECT * FROM tipe_kas order by tipe_id asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    function Get_pengeluaran_kas_header_by_id($kas_id)
    {
        $query = $this->db->query("SELECT
                                    a.kas_id,
                                    DATE_FORMAT(a.kas_tanggal, '%Y-%m-%d') AS kas_tanggal,
                                    a.tipe_kas,
                                    a.kas_no_akun,
                                    a.kas_keterangan,
                                    a.kas_no_rekening,
                                    a.kas_jumlah,
                                    a.kas_status,
                                    a.updwho,
                                    a.updtgl,
                                    a.customer_id,
                                    a.no_po,
									IFNULL(b.attachment, '') AS attachment
									FROM kas a
									LEFT JOIN kas_attachment b
									ON b.kas_id = a.kas_id
									WHERE a.kas_id = '$kas_id'");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_pengeluaran_kas_by_filter($tgl1, $tgl2, $kas_id, $status)
    {
        if ($kas_id != "") {
            $kas_id = "AND a.kas_id LIKE '%$kas_id%' ";
        } else {
            $kas_id = "";
        }

        if ($status != "") {
            $status = "AND a.kas_status = '$status' ";
        } else {
            $status = "";
        }

        $query = $this->db->query("SELECT
                                    kas_id,
                                    DATE_FORMAT(kas_tanggal, '%Y-%m-%d') AS kas_tanggal,
                                    tipe_kas,
                                    kas_no_akun,
                                    kas_keterangan,
                                    kas_no_rekening,
                                    kas_jumlah,
                                    kas_status,
                                    updwho,
                                    updtgl,
                                    kas.customer_id,
                                    customer.customer_nama,
                                    kas.no_po
									FROM kas
                                    LEFT JOIN customer
                                    ON customer.customer_id = kas.customer_id
									WHERE DATE_FORMAT(kas_tanggal, '%Y-%m-%d') BETWEEN '$tgl1' AND '$tgl2'
									" . $kas_id . "
									" . $status . "
									ORDER BY kas_tanggal DESC, kas_id ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function insert_pengeluaran_kas($kas_id, $kas_tanggal, $tipe_kas, $kas_no_akun, $kas_keterangan, $kas_no_rekening, $kas_jumlah, $kas_status, $updwho, $updtgl, $customer_id, $no_po)
    {
        $kas_id = $kas_id == '' ? null : $kas_id;
        $kas_tanggal = $kas_tanggal == '' ? null : $kas_tanggal;
        $tipe_kas = $tipe_kas == '' ? null : $tipe_kas;
        $kas_no_akun = $kas_no_akun == '' ? null : $kas_no_akun;
        $kas_keterangan = $kas_keterangan == '' ? null : $kas_keterangan;
        $kas_no_rekening = $kas_no_rekening == '' ? null : $kas_no_rekening;
        $kas_jumlah = $kas_jumlah == '' ? null : $kas_jumlah;
        $kas_status = $kas_status == '' ? null : $kas_status;
        $updwho = $updwho == '' ? null : $updwho;
        $updtgl = $updtgl == '' ? null : $updtgl;
        $customer_id = $customer_id == '' ? null : $customer_id;
        $no_po = $no_po == '' ? null : $no_po;

        $this->db->set('kas_id', $kas_id);
        $this->db->set('kas_tanggal', $kas_tanggal);
        $this->db->set('tipe_kas', $tipe_kas);
        $this->db->set('kas_no_akun', $kas_no_akun);
        $this->db->set('kas_keterangan', $kas_keterangan);
        $this->db->set('kas_no_rekening', $kas_no_rekening);
        $this->db->set('kas_jumlah', $kas_jumlah);
        $this->db->set('kas_status', $kas_status);
        $this->db->set('customer_id', $customer_id);
        $this->db->set('no_po', $no_po);
        $this->db->set('updwho', $this->session->userdata('pengguna_username'));
        $this->db->set('updtgl', date('Y-m-d H:i:s'));

        $queryinsert = $this->db->insert("kas");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_pengeluaran_kas($kas_id, $kas_tanggal, $tipe_kas, $kas_no_akun, $kas_keterangan, $kas_no_rekening, $kas_jumlah, $kas_status, $updwho, $updtgl, $customer_id, $no_po)
    {
        $kas_id = $kas_id == '' ? null : $kas_id;
        $kas_tanggal = $kas_tanggal == '' ? null : $kas_tanggal;
        $tipe_kas = $tipe_kas == '' ? null : $tipe_kas;
        $kas_no_akun = $kas_no_akun == '' ? null : $kas_no_akun;
        $kas_keterangan = $kas_keterangan == '' ? null : $kas_keterangan;
        $kas_no_rekening = $kas_no_rekening == '' ? null : $kas_no_rekening;
        $kas_jumlah = $kas_jumlah == '' ? null : $kas_jumlah;
        $kas_status = $kas_status == '' ? null : $kas_status;
        $updwho = $updwho == '' ? null : $updwho;
        $updtgl = $updtgl == '' ? null : $updtgl;
        $customer_id = $customer_id == '' ? null : $customer_id;
        $no_po = $no_po == '' ? null : $no_po;

        $this->db->set('kas_tanggal', $kas_tanggal);
        $this->db->set('tipe_kas', $tipe_kas);
        $this->db->set('kas_no_akun', $kas_no_akun);
        $this->db->set('kas_keterangan', $kas_keterangan);
        $this->db->set('kas_no_rekening', $kas_no_rekening);
        $this->db->set('kas_jumlah', $kas_jumlah);
        $this->db->set('kas_status', $kas_status);
        $this->db->set('customer_id', $customer_id);
        $this->db->set('no_po', $no_po);
        $this->db->set('updwho', $this->session->userdata('pengguna_username'));
        $this->db->set('updtgl', date('Y-m-d H:i:s'));


        $this->db->where('kas_id', $kas_id);

        $queryinsert = $this->db->update("kas");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function delete_kas($kas_id)
    {
        $this->db->where('kas_id', $kas_id);
        $queryinsert = $this->db->delete("kas");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
