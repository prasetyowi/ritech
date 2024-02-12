<?php

class M_Komisi extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function cek_komisi_duplicate($komisi_id)
    {
        // $this->db->select("*")
        // 	->from("msgl")
        // 	->order_by("gl04")
        // 	->order_by("gl01");
        // $query = $this->db->get();

        $query = $this->db->query("SELECT * FROM komisi where komisi_id = '$komisi_id'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    function Get_komisi_header_by_id($komisi_id)
    {
        $query = $this->db->query("SELECT
                                    komisi_id,
                                    DATE_FORMAT(komisi_tanggal, '%Y-%m-%d') AS komisi_tanggal,
                                    DATE_FORMAT(tanggal_pembayaran, '%Y-%m-%d') AS tanggal_pembayaran,
                                    karyawan_id,
                                    nama_project,
                                    jumlah,
                                    komisi_status,
                                    updwho,
                                    updtgl
									FROM komisi
									WHERE komisi_id = '$komisi_id'");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_komisi_by_filter($tgl1, $tgl2, $komisi_id, $status)
    {
        if ($komisi_id != "") {
            $komisi_id = "AND a.komisi_id LIKE '%$komisi_id%' ";
        } else {
            $komisi_id = "";
        }

        if ($status != "") {
            $status = "AND a.komisi_status = '$status' ";
        } else {
            $status = "";
        }

        $query = $this->db->query("SELECT
                                    komisi_id,
                                    DATE_FORMAT(komisi_tanggal, '%d-%m-%Y') AS komisi_tanggal,
                                    DATE_FORMAT(tanggal_pembayaran, '%d-%m-%Y') AS tanggal_pembayaran,
                                    komisi.karyawan_id,
                                    karyawan.karyawan_nama,
                                    nama_project,
                                    jumlah,
                                    komisi_status,
                                    updwho,
                                    updtgl
									FROM komisi
                                    LEFT JOIN karyawan
                                    ON karyawan.karyawan_id = komisi.karyawan_id
									WHERE DATE_FORMAT(tanggal_pembayaran, '%Y-%m-%d') BETWEEN '$tgl1' AND '$tgl2'
									" . $komisi_id . "
									" . $status . "
									ORDER BY tanggal_pembayaran DESC, komisi_id ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function insert_komisi($komisi_id, $komisi_tanggal, $karyawan_id, $nama_project, $tanggal_pembayaran, $jumlah, $komisi_status, $updwho, $updtgl)
    {
        $komisi_id = $komisi_id == '' ? null : $komisi_id;
        $komisi_tanggal = $komisi_tanggal == '' ? null : $komisi_tanggal;
        $karyawan_id = $karyawan_id == '' ? null : $karyawan_id;
        $nama_project = $nama_project == '' ? null : $nama_project;
        $tanggal_pembayaran = $tanggal_pembayaran == '' ? null : $tanggal_pembayaran;
        $jumlah = $jumlah == '' ? null : $jumlah;
        $komisi_status = $komisi_status == '' ? null : $komisi_status;
        $updwho = $updwho == '' ? null : $updwho;
        $updtgl = $updtgl == '' ? null : $updtgl;


        $this->db->set('komisi_id', $komisi_id);
        $this->db->set('komisi_tanggal', $komisi_tanggal);
        $this->db->set('karyawan_id', $karyawan_id);
        $this->db->set('nama_project', $nama_project);
        $this->db->set('tanggal_pembayaran', $tanggal_pembayaran);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('komisi_status', $komisi_status);
        $this->db->set('updwho', $this->session->userdata('pengguna_username'));
        $this->db->set('updtgl', date('Y-m-d H:i:s'));

        $queryinsert = $this->db->insert("komisi");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_komisi($komisi_id, $komisi_tanggal, $karyawan_id, $nama_project, $tanggal_pembayaran, $jumlah, $komisi_status, $updwho, $updtgl)
    {
        // $komisi_id = $komisi_id == '' ? null : $komisi_id;
        $komisi_tanggal = $komisi_tanggal == '' ? null : $komisi_tanggal;
        $karyawan_id = $karyawan_id == '' ? null : $karyawan_id;
        $nama_project = $nama_project == '' ? null : $nama_project;
        $tanggal_pembayaran = $tanggal_pembayaran == '' ? null : $tanggal_pembayaran;
        $jumlah = $jumlah == '' ? null : $jumlah;
        $komisi_status = $komisi_status == '' ? null : $komisi_status;
        $updwho = $updwho == '' ? null : $updwho;
        $updtgl = $updtgl == '' ? null : $updtgl;

        $this->db->set('komisi_tanggal', $komisi_tanggal);
        $this->db->set('karyawan_id', $karyawan_id);
        $this->db->set('nama_project', $nama_project);
        $this->db->set('tanggal_pembayaran', $tanggal_pembayaran);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('komisi_status', $komisi_status);
        $this->db->set('updwho', $this->session->userdata('pengguna_username'));
        $this->db->set('updtgl', date('Y-m-d H:i:s'));

        $this->db->where('komisi_id', $komisi_id);

        $queryinsert = $this->db->update("komisi");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function delete_komisi($komisi_id)
    {
        $this->db->where('komisi_id', $komisi_id);
        $queryinsert = $this->db->delete("komisi");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
