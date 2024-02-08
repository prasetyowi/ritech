<?php

class M_Vrbl extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Generate_kode($table, $column, $kode)
    {

        $query = $this->db->query("SELECT * FROM " . $table . " where " . $column . " LIKE '%" . $kode . "%'");

        $counter = $query->num_rows() + 1;

        if ($counter > 0 && $counter < 10) {
            $kode = $kode . "0000" . $counter;
        } else if ($counter >= 10 && $counter < 100) {
            $kode = $kode . "000" . $counter;
        } else if ($counter >= 100 && $counter < 1000) {
            $kode = $kode . "00" . $counter;
        } else if ($counter >= 1000 && $counter < 10000) {
            $kode = $kode . "0" . $counter;
        } else if ($counter >= 10000) {
            $kode = $kode . $counter;
        }

        return $kode;
    }

    public function Get_vrbl_value($param)
    {

        $query = $this->db->query("SELECT * FROM vrbl where vrbl_param = '$param'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->row(0)->vrbl_nilai;
        }

        return $query;
    }
}
