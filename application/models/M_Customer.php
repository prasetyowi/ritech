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
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_customer_by_id($customer_id)
    {

        $query = $this->db->query("SELECT * FROM customer where customer_id = '$customer_id' order by customer_nama asc");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function search_customer($search)
    {

        $query = $this->db->query("SELECT customer_id as id, customer_nama as nama FROM customer where customer_nama like '%$search%' order by customer_nama asc LIMIT 25");

        if ($query->num_rows() == 0) {
            $query = 0;
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
            $query = 0;
        } else {
            $query = $query->result_array();
        }

        return $query;
    }
}
