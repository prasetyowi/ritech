<?php

class M_Barang extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_all_barang()
    {

        $query = $this->db->query("SELECT * FROM barang order by barang_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_barang_by_id($barang_id)
    {

        $query = $this->db->query("SELECT  
                                    barang_id,
                                    barang_nama,
                                    IFNULL(harga_satuan,0) AS harga_satuan,
                                    IFNULL(harga_hpp,0) AS harga_hpp,
                                    IFNULL(barang_desc,'') AS barang_desc,
                                    IFNULL(unit,'') AS unit
                                    FROM barang where barang_id = '$barang_id' order by barang_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_barang_by_filter($barang)
    {

        $query = $this->db->query("SELECT
                                    barang_id,
                                    barang_nama,
                                    IFNULL(harga_satuan,0) AS harga_satuan,
                                    IFNULL(harga_hpp,0) AS harga_hpp,
                                    IFNULL(barang_desc,'') AS barang_desc,
                                    IFNULL(unit,'') AS unit
                                    FROM barang
                                    WHERE barang_nama LIKE '%" . $barang . "%'
                                    ORDER BY barang_nama ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_barang_not_in_selected_barang($arr_list_barang)
    {

        $arr_list_barang_str = "";

        if (isset($arr_list_barang)) {
            if (count($arr_list_barang) > 0) {
                $arr_list_barang_str = "AND barang_id NOT IN (" . implode(",", $arr_list_barang) . ")";
            }
        } else {
            $arr_list_barang_str = "";
        }

        $query = $this->db->query("SELECT * FROM barang where barang_id is not null " . $arr_list_barang_str . " order by barang_nama asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function insert_barang($barang_id, $barang_nama, $harga_satuan, $harga_hpp, $barang_desc, $unit)
    {
        $barang_id = $barang_id == '' ? null : $barang_id;
        $barang_nama = $barang_nama == '' ? null : $barang_nama;
        $harga_satuan = $harga_satuan == '' ? null : $harga_satuan;
        $harga_hpp = $harga_hpp == '' ? null : $harga_hpp;
        $barang_desc = $barang_desc == '' ? null : $barang_desc;
        $unit = $unit == '' ? null : $unit;

        $this->db->set('barang_id', $barang_id);
        $this->db->set('barang_nama', $barang_nama);
        $this->db->set('harga_satuan', $harga_satuan);
        $this->db->set('harga_hpp', $harga_hpp);
        $this->db->set('barang_desc', $barang_desc);
        $this->db->set('unit', $unit);
        $this->db->set('is_aktif', 1);
        $this->db->set('is_delete', 0);

        $queryinsert = $this->db->insert("barang");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_barang($barang_id, $barang_nama, $harga_satuan, $harga_hpp, $barang_desc, $unit)
    {
        $barang_id = $barang_id == '' ? null : $barang_id;
        $barang_nama = $barang_nama == '' ? null : $barang_nama;
        $harga_satuan = $harga_satuan == '' ? null : $harga_satuan;
        $harga_hpp = $harga_hpp == '' ? null : $harga_hpp;
        $barang_desc = $barang_desc == '' ? null : $barang_desc;
        $unit = $unit == '' ? null : $unit;

        $this->db->set('barang_nama', $barang_nama);
        $this->db->set('harga_satuan', $harga_satuan);
        $this->db->set('harga_hpp', $harga_hpp);
        $this->db->set('barang_desc', $barang_desc);
        $this->db->set('unit', $unit);
        $this->db->set('is_aktif', 1);
        $this->db->set('is_delete', 0);

        $this->db->where('barang_id', $barang_id);

        $queryinsert = $this->db->update("barang");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
