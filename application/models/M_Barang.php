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
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_barang_by_id($barang_id)
    {

        $query = $this->db->query("SELECT * FROM barang where barang_id = '$barang_id' order by barang_nama asc");

        if ($query->num_rows() == 0) {
            $query = 0;
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
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }
}
