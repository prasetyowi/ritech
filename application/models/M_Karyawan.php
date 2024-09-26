<?php

class M_Karyawan extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_all_karyawan()
    {

        $query = $this->db->query("SELECT * FROM karyawan order by karyawan_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_karyawan_aktif()
    {

        $query = $this->db->query("SELECT * FROM karyawan where is_aktif='1' order by karyawan_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_karyawan_level()
    {

        $query = $this->db->query("SELECT * FROM karyawan_level order by karyawan_level asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_karyawan_divisi()
    {

        $query = $this->db->query("SELECT * FROM karyawan_divisi order by karyawan_divisi asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_karyawan_by_id($karyawan_id)
    {

        $query = $this->db->query("SELECT
                                    karyawan_id,
                                    karyawan_nama,
                                    IFNULL(karyawan_alamat, '') AS karyawan_alamat,
                                    IFNULL(karyawan_divisi, '') AS karyawan_divisi,
                                    IFNULL(karyawan_level, '') AS karyawan_level,
                                    IFNULL(perusahaan_id, '') AS perusahaan_id,
                                    IFNULL(karyawan_telp, '') AS karyawan_telp,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM karyawan
                                    WHERE karyawan_id = '$karyawan_id'
                                    ORDER BY karyawan_nama ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_karyawan_by_filter($karyawan)
    {

        $query = $this->db->query("SELECT
                                    karyawan_id,
                                    karyawan_nama,
                                    IFNULL(karyawan_alamat, '') AS karyawan_alamat,
                                    IFNULL(karyawan_divisi, '') AS karyawan_divisi,
                                    IFNULL(karyawan_level, '') AS karyawan_level,
                                    IFNULL(a.is_aktif, 0) AS is_aktif,
                                    IFNULL(a.is_delete, 0) AS is_delete
                                    FROM karyawan a
                                    WHERE karyawan_nama LIKE '%" . $karyawan . "%'
                                    ORDER BY karyawan_nama ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function search_karyawan($search)
    {

        $query = $this->db->query("SELECT karyawan_id as id, karyawan_nama as nama FROM karyawan where karyawan_nama like '%$search%' order by karyawan_nama asc LIMIT 25");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_karyawan_not_in_selected_karyawan($arr_list_karyawan)
    {

        $arr_list_karyawan_str = "";

        if (isset($arr_list_karyawan)) {
            if (count($arr_list_karyawan) > 0) {
                $arr_list_karyawan_str = "AND karyawan_id NOT IN (" . implode(",", $arr_list_karyawan) . ")";
            }
        } else {
            $arr_list_karyawan_str = "";
        }

        $query = $this->db->query("SELECT * FROM karyawan where karyawan_id is not null " . $arr_list_karyawan_str . " order by karyawan_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function insert_karyawan($karyawan_id, $karyawan_nama, $karyawan_alamat, $karyawan_telp, $karyawan_divisi, $karyawan_level, $perusahaan_id, $is_aktif)
    {
        $karyawan_id = $karyawan_id == '' ? null : $karyawan_id;
        $karyawan_nama = $karyawan_nama == '' ? null : $karyawan_nama;
        $karyawan_alamat = $karyawan_alamat == '' ? null : $karyawan_alamat;
        $karyawan_telp = $karyawan_telp == '' ? null : $karyawan_telp;
        $karyawan_divisi = $karyawan_divisi == '' ? null : $karyawan_divisi;
        $karyawan_level = $karyawan_level == '' ? null : $karyawan_level;
        $perusahaan_id = $perusahaan_id == '' ? null : $perusahaan_id;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('karyawan_id', $karyawan_id);
        $this->db->set('karyawan_nama', $karyawan_nama);
        $this->db->set('karyawan_alamat', $karyawan_alamat);
        $this->db->set('karyawan_telp', $karyawan_telp);
        $this->db->set('karyawan_divisi', $karyawan_divisi);
        $this->db->set('karyawan_level', $karyawan_level);
        $this->db->set('perusahaan_id', $perusahaan_id);
        $this->db->set('is_aktif', $is_aktif);

        $queryinsert = $this->db->insert("karyawan");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_karyawan($karyawan_id, $karyawan_nama, $karyawan_alamat, $karyawan_telp, $karyawan_divisi, $karyawan_level, $perusahaan_id, $is_aktif)
    {
        $karyawan_id = $karyawan_id == '' ? null : $karyawan_id;
        $karyawan_nama = $karyawan_nama == '' ? null : $karyawan_nama;
        $karyawan_alamat = $karyawan_alamat == '' ? null : $karyawan_alamat;
        $karyawan_telp = $karyawan_telp == '' ? null : $karyawan_telp;
        $karyawan_divisi = $karyawan_divisi == '' ? null : $karyawan_divisi;
        $karyawan_level = $karyawan_level == '' ? null : $karyawan_level;
        $perusahaan_id = $perusahaan_id == '' ? null : $perusahaan_id;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('karyawan_nama', $karyawan_nama);
        $this->db->set('karyawan_alamat', $karyawan_alamat);
        $this->db->set('karyawan_telp', $karyawan_telp);
        $this->db->set('karyawan_divisi', $karyawan_divisi);
        $this->db->set('karyawan_level', $karyawan_level);
        $this->db->set('perusahaan_id', $perusahaan_id);
        $this->db->set('is_aktif', $is_aktif);

        $this->db->where('karyawan_id', $karyawan_id);

        $queryinsert = $this->db->update("karyawan");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
