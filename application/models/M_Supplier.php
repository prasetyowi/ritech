<?php

class M_Supplier extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_all_supplier()
    {

        $query = $this->db->query("SELECT * FROM supplier order by supplier_nama asc");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_supplier_by_id($supplier_id)
    {

        $query = $this->db->query("SELECT
                                    supplier_id,
                                    supplier_nama,
                                    IFNULL(supplier_alamat, '') AS supplier_alamat,
                                    IFNULL(supplier_kelurahan, '') AS supplier_kelurahan,
                                    IFNULL(supplier_kecamatan, '') AS supplier_kecamatan,
                                    IFNULL(supplier_kota, '') AS supplier_kota,
                                    IFNULL(supplier_provinsi, '') AS supplier_provinsi,
                                    IFNULL(supplier_negara, '') AS supplier_negara,
                                    IFNULL(supplier_telp, '') AS supplier_telp,
                                    IFNULL(supplier_kode_pos, '') AS supplier_kode_pos,
                                    IFNULL(supplier_email, '') AS supplier_email,
                                    IFNULL(supplier_npwp, '') AS supplier_npwp,
                                    IFNULL(supplier_nama_contact_person, '') AS supplier_nama_contact_person,
                                    IFNULL(supplier_telp_contact_person, '') AS supplier_telp_contact_person,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM supplier
                                    WHERE supplier_id = '$supplier_id'
                                    ORDER BY supplier_nama ASC");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_supplier_by_filter($supplier)
    {

        $query = $this->db->query("SELECT
                                    supplier_id,
                                    supplier_nama,
                                    IFNULL(supplier_alamat,'') AS supplier_alamat,
                                    IFNULL(supplier_kelurahan,'') AS supplier_kelurahan,
                                    IFNULL(supplier_kecamatan,'') AS supplier_kecamatan,
                                    IFNULL(supplier_kota,'') AS supplier_kota,
                                    IFNULL(supplier_provinsi,'') AS supplier_provinsi,
                                    IFNULL(supplier_negara,'') AS supplier_negara,
                                    IFNULL(supplier_telp,'') AS supplier_telp,
                                    IFNULL(supplier_kode_pos,'') AS supplier_kode_pos,
                                    IFNULL(supplier_email,'') AS supplier_email,
                                    IFNULL(supplier_npwp,'') AS supplier_npwp,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM supplier
                                    WHERE supplier_nama LIKE '%" . $supplier . "%'
                                    ORDER BY supplier_nama ASC");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function search_supplier($search)
    {

        $query = $this->db->query("SELECT supplier_id as id, supplier_nama as nama, supplier_alamat, supplier_kelurahan, supplier_kecamatan, supplier_kota, supplier_provinsi,supplier_kode_pos FROM supplier where supplier_nama like '%$search%' order by supplier_nama asc LIMIT 25");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_supplier_not_in_selected_supplier($arr_list_supplier)
    {

        $arr_list_supplier_str = "";

        if (isset($arr_list_supplier)) {
            if (count($arr_list_supplier) > 0) {
                $arr_list_supplier_str = "AND supplier_id NOT IN (" . implode(",", $arr_list_supplier) . ")";
            }
        } else {
            $arr_list_supplier_str = "";
        }

        $query = $this->db->query("SELECT * FROM supplier where supplier_id is not null " . $arr_list_supplier_str . " order by supplier_nama asc");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function insert_supplier($supplier_id, $supplier_nama, $supplier_alamat, $supplier_kelurahan, $supplier_kecamatan, $supplier_kota, $supplier_provinsi, $supplier_negara, $supplier_telp, $supplier_kode_pos, $supplier_email, $supplier_npwp, $supplier_nama_contact_person, $supplier_telp_contact_person, $is_aktif)
    {
        $supplier_id = $supplier_id == '' ? null : $supplier_id;
        $supplier_nama = $supplier_nama == '' ? null : $supplier_nama;
        $supplier_alamat = $supplier_alamat == '' ? null : $supplier_alamat;
        $supplier_kelurahan = $supplier_kelurahan == '' ? null : $supplier_kelurahan;
        $supplier_kecamatan = $supplier_kecamatan == '' ? null : $supplier_kecamatan;
        $supplier_kota = $supplier_kota == '' ? null : $supplier_kota;
        $supplier_provinsi = $supplier_provinsi == '' ? null : $supplier_provinsi;
        $supplier_negara = $supplier_negara == '' ? null : $supplier_negara;
        $supplier_telp = $supplier_telp == '' ? null : $supplier_telp;
        $supplier_kode_pos = $supplier_kode_pos == '' ? null : $supplier_kode_pos;
        $supplier_email = $supplier_email == '' ? null : $supplier_email;
        $supplier_npwp = $supplier_npwp == '' ? null : $supplier_npwp;
        $supplier_nama_contact_person = $supplier_nama_contact_person == '' ? null : $supplier_nama_contact_person;
        $supplier_telp_contact_person = $supplier_telp_contact_person == '' ? null : $supplier_telp_contact_person;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('supplier_id', $supplier_id);
        $this->db->set('supplier_nama', $supplier_nama);
        $this->db->set('supplier_alamat', $supplier_alamat);
        $this->db->set('supplier_kelurahan', $supplier_kelurahan);
        $this->db->set('supplier_kecamatan', $supplier_kecamatan);
        $this->db->set('supplier_kota', $supplier_kota);
        $this->db->set('supplier_provinsi', $supplier_provinsi);
        $this->db->set('supplier_negara', $supplier_negara);
        $this->db->set('supplier_telp', $supplier_telp);
        $this->db->set('supplier_kode_pos', $supplier_kode_pos);
        $this->db->set('supplier_email', $supplier_email);
        $this->db->set('supplier_npwp', $supplier_npwp);
        $this->db->set('supplier_nama_contact_person', $supplier_nama_contact_person);
        $this->db->set('supplier_telp_contact_person', $supplier_telp_contact_person);
        $this->db->set('is_aktif', $is_aktif);

        $queryinsert = $this->db->insert("supplier");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_supplier($supplier_id, $supplier_nama, $supplier_alamat, $supplier_kelurahan, $supplier_kecamatan, $supplier_kota, $supplier_provinsi, $supplier_negara, $supplier_telp, $supplier_kode_pos, $supplier_email, $supplier_npwp, $supplier_nama_contact_person, $supplier_telp_contact_person, $is_aktif)
    {
        $supplier_id = $supplier_id == '' ? null : $supplier_id;
        $supplier_nama = $supplier_nama == '' ? null : $supplier_nama;
        $supplier_alamat = $supplier_alamat == '' ? null : $supplier_alamat;
        $supplier_kelurahan = $supplier_kelurahan == '' ? null : $supplier_kelurahan;
        $supplier_kecamatan = $supplier_kecamatan == '' ? null : $supplier_kecamatan;
        $supplier_kota = $supplier_kota == '' ? null : $supplier_kota;
        $supplier_provinsi = $supplier_provinsi == '' ? null : $supplier_provinsi;
        $supplier_negara = $supplier_negara == '' ? null : $supplier_negara;
        $supplier_telp = $supplier_telp == '' ? null : $supplier_telp;
        $supplier_kode_pos = $supplier_kode_pos == '' ? null : $supplier_kode_pos;
        $supplier_email = $supplier_email == '' ? null : $supplier_email;
        $supplier_npwp = $supplier_npwp == '' ? null : $supplier_npwp;
        $supplier_nama_contact_person = $supplier_nama_contact_person == '' ? null : $supplier_nama_contact_person;
        $supplier_telp_contact_person = $supplier_telp_contact_person == '' ? null : $supplier_telp_contact_person;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('supplier_nama', $supplier_nama);
        $this->db->set('supplier_alamat', $supplier_alamat);
        $this->db->set('supplier_kelurahan', $supplier_kelurahan);
        $this->db->set('supplier_kecamatan', $supplier_kecamatan);
        $this->db->set('supplier_kota', $supplier_kota);
        $this->db->set('supplier_provinsi', $supplier_provinsi);
        $this->db->set('supplier_negara', $supplier_negara);
        $this->db->set('supplier_telp', $supplier_telp);
        $this->db->set('supplier_kode_pos', $supplier_kode_pos);
        $this->db->set('supplier_email', $supplier_email);
        $this->db->set('supplier_npwp', $supplier_npwp);
        $this->db->set('supplier_nama_contact_person', $supplier_nama_contact_person);
        $this->db->set('supplier_telp_contact_person', $supplier_telp_contact_person);
        $this->db->set('is_aktif', $is_aktif);

        $this->db->where('supplier_id', $supplier_id);

        $queryinsert = $this->db->update("supplier");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
