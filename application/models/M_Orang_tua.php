<?php

class M_Orang_tua extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_all_orang_tua()
    {

        $query = $this->db->query("SELECT * FROM orang_tua order by orang_tua_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_orang_tua_aktif()
    {

        $query = $this->db->query("SELECT * FROM orang_tua where is_aktif='1' order by orang_tua_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_orang_tua_by_id($orang_tua_id)
    {

        $query = $this->db->query("SELECT
                                    orang_tua_id,
                                    orang_tua_nama,
                                    IFNULL(orang_tua_alamat, '') AS orang_tua_alamat,
                                    IFNULL(orang_tua_kelurahan, '') AS orang_tua_kelurahan,
                                    IFNULL(orang_tua_kecamatan, '') AS orang_tua_kecamatan,
                                    IFNULL(orang_tua_kota, '') AS orang_tua_kota,
                                    IFNULL(orang_tua_provinsi, '') AS orang_tua_provinsi,
                                    IFNULL(orang_tua_negara, '') AS orang_tua_negara,
                                    IFNULL(orang_tua_telp, '') AS orang_tua_telp,
                                    IFNULL(orang_tua_kode_pos, '') AS orang_tua_kode_pos,
                                    IFNULL(orang_tua_email, '') AS orang_tua_email,
                                    IFNULL(jenis_kelamin, '') AS jenis_kelamin,
                                    DATE_FORMAT(tgl_lahir, '%Y-%m-%d') AS tgl_lahir,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM orang_tua
                                    WHERE orang_tua_id = '$orang_tua_id'
                                    ORDER BY orang_tua_nama ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_orang_tua_by_filter($orang_tua)
    {

        $query = $this->db->query("SELECT
                                    orang_tua_id,
                                    orang_tua_nama,
                                    IFNULL(orang_tua_alamat,'') AS orang_tua_alamat,
                                    IFNULL(orang_tua_kelurahan,'') AS orang_tua_kelurahan,
                                    IFNULL(orang_tua_kecamatan,'') AS orang_tua_kecamatan,
                                    IFNULL(orang_tua_kota,'') AS orang_tua_kota,
                                    IFNULL(orang_tua_provinsi,'') AS orang_tua_provinsi,
                                    IFNULL(orang_tua_negara,'') AS orang_tua_negara,
                                    IFNULL(orang_tua_telp,'') AS orang_tua_telp,
                                    IFNULL(orang_tua_kode_pos,'') AS orang_tua_kode_pos,
                                    IFNULL(orang_tua_email,'') AS orang_tua_email,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM orang_tua
                                    WHERE orang_tua_nama LIKE '%" . $orang_tua . "%'
                                    ORDER BY orang_tua_nama ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function cek_orang_tua_by_id($orang_tua_id)
    {

        $query = $this->db->query("SELECT * FROM orang_tua WHERE orang_tua_id = '$orang_tua_id'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    public function insert_orang_tua($orang_tua_id, $orang_tua_nama, $orang_tua_alamat, $orang_tua_kelurahan, $orang_tua_kecamatan, $orang_tua_kota, $orang_tua_provinsi, $orang_tua_negara, $orang_tua_telp, $orang_tua_kode_pos, $orang_tua_email, $is_aktif, $tgl_lahir, $jenis_kelamin)
    {
        $orang_tua_id = $orang_tua_id == '' ? null : $orang_tua_id;
        $orang_tua_nama = $orang_tua_nama == '' ? null : $orang_tua_nama;
        $orang_tua_alamat = $orang_tua_alamat == '' ? null : $orang_tua_alamat;
        $orang_tua_kelurahan = $orang_tua_kelurahan == '' ? null : $orang_tua_kelurahan;
        $orang_tua_kecamatan = $orang_tua_kecamatan == '' ? null : $orang_tua_kecamatan;
        $orang_tua_kota = $orang_tua_kota == '' ? null : $orang_tua_kota;
        $orang_tua_provinsi = $orang_tua_provinsi == '' ? null : $orang_tua_provinsi;
        $orang_tua_negara = $orang_tua_negara == '' ? null : $orang_tua_negara;
        $orang_tua_telp = $orang_tua_telp == '' ? null : $orang_tua_telp;
        $orang_tua_kode_pos = $orang_tua_kode_pos == '' ? null : $orang_tua_kode_pos;
        $orang_tua_email = $orang_tua_email == '' ? null : $orang_tua_email;
        $jenis_kelamin = $jenis_kelamin == '' ? null : $jenis_kelamin;
        $tgl_lahir = $tgl_lahir == '' ? null : $tgl_lahir;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('orang_tua_id', $orang_tua_id);
        $this->db->set('orang_tua_nama', $orang_tua_nama);
        $this->db->set('orang_tua_alamat', $orang_tua_alamat);
        $this->db->set('orang_tua_kelurahan', $orang_tua_kelurahan);
        $this->db->set('orang_tua_kecamatan', $orang_tua_kecamatan);
        $this->db->set('orang_tua_kota', $orang_tua_kota);
        $this->db->set('orang_tua_provinsi', $orang_tua_provinsi);
        $this->db->set('orang_tua_negara', $orang_tua_negara);
        $this->db->set('orang_tua_telp', $orang_tua_telp);
        $this->db->set('orang_tua_kode_pos', $orang_tua_kode_pos);
        $this->db->set('orang_tua_email', $orang_tua_email);
        $this->db->set('jenis_kelamin', $jenis_kelamin);
        $this->db->set('tgl_lahir', $tgl_lahir);
        $this->db->set('is_aktif', $is_aktif);

        $queryinsert = $this->db->insert("orang_tua");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_orang_tua($orang_tua_id, $orang_tua_nama, $orang_tua_alamat, $orang_tua_kelurahan, $orang_tua_kecamatan, $orang_tua_kota, $orang_tua_provinsi, $orang_tua_negara, $orang_tua_telp, $orang_tua_kode_pos, $orang_tua_email, $is_aktif, $tgl_lahir, $jenis_kelamin)
    {
        $orang_tua_id = $orang_tua_id == '' ? null : $orang_tua_id;
        $orang_tua_nama = $orang_tua_nama == '' ? null : $orang_tua_nama;
        $orang_tua_alamat = $orang_tua_alamat == '' ? null : $orang_tua_alamat;
        $orang_tua_kelurahan = $orang_tua_kelurahan == '' ? null : $orang_tua_kelurahan;
        $orang_tua_kecamatan = $orang_tua_kecamatan == '' ? null : $orang_tua_kecamatan;
        $orang_tua_kota = $orang_tua_kota == '' ? null : $orang_tua_kota;
        $orang_tua_provinsi = $orang_tua_provinsi == '' ? null : $orang_tua_provinsi;
        $orang_tua_negara = $orang_tua_negara == '' ? null : $orang_tua_negara;
        $orang_tua_telp = $orang_tua_telp == '' ? null : $orang_tua_telp;
        $orang_tua_kode_pos = $orang_tua_kode_pos == '' ? null : $orang_tua_kode_pos;
        $orang_tua_email = $orang_tua_email == '' ? null : $orang_tua_email;
        $jenis_kelamin = $jenis_kelamin == '' ? null : $jenis_kelamin;
        $tgl_lahir = $tgl_lahir == '' ? null : $tgl_lahir;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('orang_tua_nama', $orang_tua_nama);
        $this->db->set('orang_tua_alamat', $orang_tua_alamat);
        $this->db->set('orang_tua_kelurahan', $orang_tua_kelurahan);
        $this->db->set('orang_tua_kecamatan', $orang_tua_kecamatan);
        $this->db->set('orang_tua_kota', $orang_tua_kota);
        $this->db->set('orang_tua_provinsi', $orang_tua_provinsi);
        $this->db->set('orang_tua_negara', $orang_tua_negara);
        $this->db->set('orang_tua_telp', $orang_tua_telp);
        $this->db->set('orang_tua_kode_pos', $orang_tua_kode_pos);
        $this->db->set('orang_tua_email', $orang_tua_email);
        $this->db->set('jenis_kelamin', $jenis_kelamin);
        $this->db->set('tgl_lahir', $tgl_lahir);
        $this->db->set('is_aktif', $is_aktif);

        $this->db->where('orang_tua_id', $orang_tua_id);

        $queryinsert = $this->db->update("orang_tua");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
