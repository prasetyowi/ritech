<?php

class M_Perusahaan extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_all_perusahaan()
    {

        $query = $this->db->query("SELECT * FROM perusahaan order by perusahaan_nama asc");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_perusahaan_by_id($perusahaan_id)
    {

        $query = $this->db->query("SELECT
                                    perusahaan_id,
                                    perusahaan_nama,
                                    IFNULL(perusahaan_alamat, '') AS perusahaan_alamat,
                                    IFNULL(perusahaan_kelurahan, '') AS perusahaan_kelurahan,
                                    IFNULL(perusahaan_kecamatan, '') AS perusahaan_kecamatan,
                                    IFNULL(perusahaan_kota, '') AS perusahaan_kota,
                                    IFNULL(perusahaan_provinsi, '') AS perusahaan_provinsi,
                                    IFNULL(perusahaan_negara, '') AS perusahaan_negara,
                                    IFNULL(perusahaan_telp, '') AS perusahaan_telp,
                                    IFNULL(perusahaan_kode_pos, '') AS perusahaan_kode_pos,
                                    IFNULL(perusahaan_email, '') AS perusahaan_email,
                                    IFNULL(perusahaan_npwp, '') AS perusahaan_npwp,
                                    IFNULL(perusahaan_nama_contact_person, '') AS perusahaan_nama_contact_person,
                                    IFNULL(perusahaan_telp_contact_person, '') AS perusahaan_telp_contact_person,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM perusahaan
                                    WHERE perusahaan_id = '$perusahaan_id'
                                    ORDER BY perusahaan_nama ASC");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_perusahaan_by_filter($perusahaan)
    {

        $query = $this->db->query("SELECT
                                    perusahaan_id,
                                    perusahaan_nama,
                                    IFNULL(perusahaan_alamat,'') AS perusahaan_alamat,
                                    IFNULL(perusahaan_kelurahan,'') AS perusahaan_kelurahan,
                                    IFNULL(perusahaan_kecamatan,'') AS perusahaan_kecamatan,
                                    IFNULL(perusahaan_kota,'') AS perusahaan_kota,
                                    IFNULL(perusahaan_provinsi,'') AS perusahaan_provinsi,
                                    IFNULL(perusahaan_negara,'') AS perusahaan_negara,
                                    IFNULL(perusahaan_telp,'') AS perusahaan_telp,
                                    IFNULL(perusahaan_kode_pos,'') AS perusahaan_kode_pos,
                                    IFNULL(perusahaan_email,'') AS perusahaan_email,
                                    IFNULL(perusahaan_npwp,'') AS perusahaan_npwp,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM perusahaan
                                    WHERE perusahaan_nama LIKE '%" . $perusahaan . "%'
                                    ORDER BY perusahaan_nama ASC");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function search_perusahaan($search)
    {

        $query = $this->db->query("SELECT perusahaan_id as id, perusahaan_nama as nama, perusahaan_alamat, perusahaan_kelurahan, perusahaan_kecamatan, perusahaan_kota, perusahaan_provinsi,perusahaan_kode_pos FROM perusahaan where perusahaan_nama like '%$search%' order by perusahaan_nama asc LIMIT 25");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_perusahaan_not_in_selected_perusahaan($arr_list_perusahaan)
    {

        $arr_list_perusahaan_str = "";

        if (isset($arr_list_perusahaan)) {
            if (count($arr_list_perusahaan) > 0) {
                $arr_list_perusahaan_str = "AND perusahaan_id NOT IN (" . implode(",", $arr_list_perusahaan) . ")";
            }
        } else {
            $arr_list_perusahaan_str = "";
        }

        $query = $this->db->query("SELECT * FROM perusahaan where perusahaan_id is not null " . $arr_list_perusahaan_str . " order by perusahaan_nama asc");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function insert_perusahaan($perusahaan_id, $perusahaan_nama, $perusahaan_alamat, $perusahaan_kelurahan, $perusahaan_kecamatan, $perusahaan_kota, $perusahaan_provinsi, $perusahaan_negara, $perusahaan_telp, $perusahaan_kode_pos, $perusahaan_email, $perusahaan_npwp, $perusahaan_nama_contact_person, $perusahaan_telp_contact_person, $is_aktif)
    {
        $perusahaan_id = $perusahaan_id == '' ? null : $perusahaan_id;
        $perusahaan_nama = $perusahaan_nama == '' ? null : $perusahaan_nama;
        $perusahaan_alamat = $perusahaan_alamat == '' ? null : $perusahaan_alamat;
        $perusahaan_kelurahan = $perusahaan_kelurahan == '' ? null : $perusahaan_kelurahan;
        $perusahaan_kecamatan = $perusahaan_kecamatan == '' ? null : $perusahaan_kecamatan;
        $perusahaan_kota = $perusahaan_kota == '' ? null : $perusahaan_kota;
        $perusahaan_provinsi = $perusahaan_provinsi == '' ? null : $perusahaan_provinsi;
        $perusahaan_negara = $perusahaan_negara == '' ? null : $perusahaan_negara;
        $perusahaan_telp = $perusahaan_telp == '' ? null : $perusahaan_telp;
        $perusahaan_kode_pos = $perusahaan_kode_pos == '' ? null : $perusahaan_kode_pos;
        $perusahaan_email = $perusahaan_email == '' ? null : $perusahaan_email;
        $perusahaan_npwp = $perusahaan_npwp == '' ? null : $perusahaan_npwp;
        $perusahaan_nama_contact_person = $perusahaan_nama_contact_person == '' ? null : $perusahaan_nama_contact_person;
        $perusahaan_telp_contact_person = $perusahaan_telp_contact_person == '' ? null : $perusahaan_telp_contact_person;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('perusahaan_id', $perusahaan_id);
        $this->db->set('perusahaan_nama', $perusahaan_nama);
        $this->db->set('perusahaan_alamat', $perusahaan_alamat);
        $this->db->set('perusahaan_kelurahan', $perusahaan_kelurahan);
        $this->db->set('perusahaan_kecamatan', $perusahaan_kecamatan);
        $this->db->set('perusahaan_kota', $perusahaan_kota);
        $this->db->set('perusahaan_provinsi', $perusahaan_provinsi);
        $this->db->set('perusahaan_negara', $perusahaan_negara);
        $this->db->set('perusahaan_telp', $perusahaan_telp);
        $this->db->set('perusahaan_kode_pos', $perusahaan_kode_pos);
        $this->db->set('perusahaan_email', $perusahaan_email);
        $this->db->set('perusahaan_npwp', $perusahaan_npwp);
        $this->db->set('perusahaan_nama_contact_person', $perusahaan_nama_contact_person);
        $this->db->set('perusahaan_telp_contact_person', $perusahaan_telp_contact_person);
        $this->db->set('is_aktif', $is_aktif);

        $queryinsert = $this->db->insert("perusahaan");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_perusahaan($perusahaan_id, $perusahaan_nama, $perusahaan_alamat, $perusahaan_kelurahan, $perusahaan_kecamatan, $perusahaan_kota, $perusahaan_provinsi, $perusahaan_negara, $perusahaan_telp, $perusahaan_kode_pos, $perusahaan_email, $perusahaan_npwp, $perusahaan_nama_contact_person, $perusahaan_telp_contact_person, $is_aktif)
    {
        $perusahaan_id = $perusahaan_id == '' ? null : $perusahaan_id;
        $perusahaan_nama = $perusahaan_nama == '' ? null : $perusahaan_nama;
        $perusahaan_alamat = $perusahaan_alamat == '' ? null : $perusahaan_alamat;
        $perusahaan_kelurahan = $perusahaan_kelurahan == '' ? null : $perusahaan_kelurahan;
        $perusahaan_kecamatan = $perusahaan_kecamatan == '' ? null : $perusahaan_kecamatan;
        $perusahaan_kota = $perusahaan_kota == '' ? null : $perusahaan_kota;
        $perusahaan_provinsi = $perusahaan_provinsi == '' ? null : $perusahaan_provinsi;
        $perusahaan_negara = $perusahaan_negara == '' ? null : $perusahaan_negara;
        $perusahaan_telp = $perusahaan_telp == '' ? null : $perusahaan_telp;
        $perusahaan_kode_pos = $perusahaan_kode_pos == '' ? null : $perusahaan_kode_pos;
        $perusahaan_email = $perusahaan_email == '' ? null : $perusahaan_email;
        $perusahaan_npwp = $perusahaan_npwp == '' ? null : $perusahaan_npwp;
        $perusahaan_nama_contact_person = $perusahaan_nama_contact_person == '' ? null : $perusahaan_nama_contact_person;
        $perusahaan_telp_contact_person = $perusahaan_telp_contact_person == '' ? null : $perusahaan_telp_contact_person;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('perusahaan_nama', $perusahaan_nama);
        $this->db->set('perusahaan_alamat', $perusahaan_alamat);
        $this->db->set('perusahaan_kelurahan', $perusahaan_kelurahan);
        $this->db->set('perusahaan_kecamatan', $perusahaan_kecamatan);
        $this->db->set('perusahaan_kota', $perusahaan_kota);
        $this->db->set('perusahaan_provinsi', $perusahaan_provinsi);
        $this->db->set('perusahaan_negara', $perusahaan_negara);
        $this->db->set('perusahaan_telp', $perusahaan_telp);
        $this->db->set('perusahaan_kode_pos', $perusahaan_kode_pos);
        $this->db->set('perusahaan_email', $perusahaan_email);
        $this->db->set('perusahaan_npwp', $perusahaan_npwp);
        $this->db->set('perusahaan_nama_contact_person', $perusahaan_nama_contact_person);
        $this->db->set('perusahaan_telp_contact_person', $perusahaan_telp_contact_person);
        $this->db->set('is_aktif', $is_aktif);

        $this->db->where('perusahaan_id', $perusahaan_id);

        $queryinsert = $this->db->update("perusahaan");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
