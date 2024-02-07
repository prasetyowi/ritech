<?php

class M_Customer extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_all_customer()
    {

        $query = $this->db->query("SELECT * FROM customer order by customer_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_customer_by_id($customer_id)
    {

        $query = $this->db->query("SELECT
                                    customer_id,
                                    customer_nama,
                                    IFNULL(customer_alamat, '') AS customer_alamat,
                                    IFNULL(customer_kelurahan, '') AS customer_kelurahan,
                                    IFNULL(customer_kecamatan, '') AS customer_kecamatan,
                                    IFNULL(customer_kota, '') AS customer_kota,
                                    IFNULL(customer_provinsi, '') AS customer_provinsi,
                                    IFNULL(customer_negara, '') AS customer_negara,
                                    IFNULL(customer_telp, '') AS customer_telp,
                                    IFNULL(customer_kode_pos, '') AS customer_kode_pos,
                                    IFNULL(customer_email, '') AS customer_email,
                                    IFNULL(customer_nama_contact_person, '') AS customer_nama_contact_person,
                                    IFNULL(customer_telp_contact_person, '') AS customer_telp_contact_person,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM customer
                                    WHERE customer_id = '$customer_id'
                                    ORDER BY customer_nama ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_customer_by_filter($customer)
    {

        $query = $this->db->query("SELECT
                                    customer_id,
                                    customer_nama,
                                    IFNULL(customer_alamat,'') AS customer_alamat,
                                    IFNULL(customer_kelurahan,'') AS customer_kelurahan,
                                    IFNULL(customer_kecamatan,'') AS customer_kecamatan,
                                    IFNULL(customer_kota,'') AS customer_kota,
                                    IFNULL(customer_provinsi,'') AS customer_provinsi,
                                    IFNULL(customer_negara,'') AS customer_negara,
                                    IFNULL(customer_telp,'') AS customer_telp,
                                    IFNULL(customer_kode_pos,'') AS customer_kode_pos,
                                    IFNULL(customer_email,'') AS customer_email,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM customer
                                    WHERE customer_nama LIKE '%" . $customer . "%'
                                    ORDER BY customer_nama ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function search_customer($search)
    {

        $query = $this->db->query("SELECT customer_id as id, customer_nama as nama, customer_alamat, customer_kelurahan, customer_kecamatan, customer_kota, customer_provinsi,customer_kode_pos FROM customer where customer_nama like '%$search%' order by customer_nama asc LIMIT 25");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_customer_not_in_selected_customer($arr_list_customer)
    {

        $arr_list_customer_str = "";

        if (isset($arr_list_customer)) {
            if (count($arr_list_customer) > 0) {
                $arr_list_customer_str = "AND customer_id NOT IN (" . implode(",", $arr_list_customer) . ")";
            }
        } else {
            $arr_list_customer_str = "";
        }

        $query = $this->db->query("SELECT * FROM customer where customer_id is not null " . $arr_list_customer_str . " order by customer_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function insert_customer($customer_id, $customer_nama, $customer_alamat, $customer_kelurahan, $customer_kecamatan, $customer_kota, $customer_provinsi, $customer_negara, $customer_telp, $customer_kode_pos, $customer_email, $customer_nama_contact_person, $customer_telp_contact_person, $is_aktif)
    {
        $customer_id = $customer_id == '' ? null : $customer_id;
        $customer_nama = $customer_nama == '' ? null : $customer_nama;
        $customer_alamat = $customer_alamat == '' ? null : $customer_alamat;
        $customer_kelurahan = $customer_kelurahan == '' ? null : $customer_kelurahan;
        $customer_kecamatan = $customer_kecamatan == '' ? null : $customer_kecamatan;
        $customer_kota = $customer_kota == '' ? null : $customer_kota;
        $customer_provinsi = $customer_provinsi == '' ? null : $customer_provinsi;
        $customer_negara = $customer_negara == '' ? null : $customer_negara;
        $customer_telp = $customer_telp == '' ? null : $customer_telp;
        $customer_kode_pos = $customer_kode_pos == '' ? null : $customer_kode_pos;
        $customer_email = $customer_email == '' ? null : $customer_email;
        $customer_nama_contact_person = $customer_nama_contact_person == '' ? null : $customer_nama_contact_person;
        $customer_telp_contact_person = $customer_telp_contact_person == '' ? null : $customer_telp_contact_person;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('customer_id', $customer_id);
        $this->db->set('customer_nama', $customer_nama);
        $this->db->set('customer_alamat', $customer_alamat);
        $this->db->set('customer_kelurahan', $customer_kelurahan);
        $this->db->set('customer_kecamatan', $customer_kecamatan);
        $this->db->set('customer_kota', $customer_kota);
        $this->db->set('customer_provinsi', $customer_provinsi);
        $this->db->set('customer_negara', $customer_negara);
        $this->db->set('customer_telp', $customer_telp);
        $this->db->set('customer_kode_pos', $customer_kode_pos);
        $this->db->set('customer_email', $customer_email);
        $this->db->set('customer_nama_contact_person', $customer_nama_contact_person);
        $this->db->set('customer_telp_contact_person', $customer_telp_contact_person);
        $this->db->set('is_aktif', $is_aktif);

        $queryinsert = $this->db->insert("customer");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_customer($customer_id, $customer_nama, $customer_alamat, $customer_kelurahan, $customer_kecamatan, $customer_kota, $customer_provinsi, $customer_negara, $customer_telp, $customer_kode_pos, $customer_email, $customer_nama_contact_person, $customer_telp_contact_person, $is_aktif)
    {
        $customer_id = $customer_id == '' ? null : $customer_id;
        $customer_nama = $customer_nama == '' ? null : $customer_nama;
        $customer_alamat = $customer_alamat == '' ? null : $customer_alamat;
        $customer_kelurahan = $customer_kelurahan == '' ? null : $customer_kelurahan;
        $customer_kecamatan = $customer_kecamatan == '' ? null : $customer_kecamatan;
        $customer_kota = $customer_kota == '' ? null : $customer_kota;
        $customer_provinsi = $customer_provinsi == '' ? null : $customer_provinsi;
        $customer_negara = $customer_negara == '' ? null : $customer_negara;
        $customer_telp = $customer_telp == '' ? null : $customer_telp;
        $customer_kode_pos = $customer_kode_pos == '' ? null : $customer_kode_pos;
        $customer_email = $customer_email == '' ? null : $customer_email;
        $customer_nama_contact_person = $customer_nama_contact_person == '' ? null : $customer_nama_contact_person;
        $customer_telp_contact_person = $customer_telp_contact_person == '' ? null : $customer_telp_contact_person;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;

        $this->db->set('customer_nama', $customer_nama);
        $this->db->set('customer_alamat', $customer_alamat);
        $this->db->set('customer_kelurahan', $customer_kelurahan);
        $this->db->set('customer_kecamatan', $customer_kecamatan);
        $this->db->set('customer_kota', $customer_kota);
        $this->db->set('customer_provinsi', $customer_provinsi);
        $this->db->set('customer_negara', $customer_negara);
        $this->db->set('customer_telp', $customer_telp);
        $this->db->set('customer_kode_pos', $customer_kode_pos);
        $this->db->set('customer_email', $customer_email);
        $this->db->set('customer_nama_contact_person', $customer_nama_contact_person);
        $this->db->set('customer_telp_contact_person', $customer_telp_contact_person);
        $this->db->set('is_aktif', $is_aktif);

        $this->db->where('customer_id', $customer_id);

        $queryinsert = $this->db->update("customer");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
