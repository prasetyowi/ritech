<?php

class M_Pengguna extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_all_pengguna()
    {

        $query = $this->db->query("SELECT * FROM pengguna order by pengguna_username asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_pengguna_aktif()
    {

        $query = $this->db->query("SELECT * FROM pengguna where is_aktif='1' order by pengguna_username asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Cek_pengguna_email($email)
    {

        $query = $this->db->query("SELECT * FROM pengguna where pengguna_email='$email'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    public function Cek_pengguna_username($username)
    {

        $query = $this->db->query("SELECT * FROM pengguna where pengguna_username='$username'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    public function Cek_pengguna_email_not_in_user($pengguna_id, $email)
    {

        $query = $this->db->query("SELECT * FROM pengguna where pengguna_id NOT IN ('$pengguna_id') AND pengguna_email='$email'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    public function Cek_pengguna_username_not_in_user($pengguna_id, $username)
    {

        $query = $this->db->query("SELECT * FROM pengguna where pengguna_id NOT IN ('$pengguna_id') AND pengguna_username='$username'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    public function Get_all_pengguna_by_id($pengguna_id)
    {

        $query = $this->db->query("SELECT
                                    pengguna_id,
                                    IFNULL(pengguna_username, '') AS pengguna_username,
                                    IFNULL(pengguna_password, '') AS pengguna_password,
                                    IFNULL(pengguna_perusahaan, '')AS pengguna_perusahaan,
                                    IFNULL(pengguna_reff_id, '')AS pengguna_reff_id,
                                    IFNULL(pengguna_email, '')AS pengguna_email,
                                    IFNULL(pengguna_level, '')AS pengguna_level,
                                    add_by,
                                    updwho,
                                    updtgl,
                                    IFNULL(is_aktif, 0) AS is_aktif,
                                    IFNULL(is_delete, 0) AS is_delete
                                    FROM pengguna
                                    WHERE pengguna_id = '$pengguna_id'
                                    ORDER BY pengguna_username ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_all_user_reff_aktif()
    {

        $query = $this->db->query("SELECT
                                    karyawan_id,
                                    karyawan_nama
                                    FROM karyawan
                                    WHERE is_aktif='1'
                                    UNION
                                    SELECT
                                    orang_tua_id as karyawan_id,
                                    orang_tua_nama as karyawan_nama
                                    FROM orang_tua
                                    WHERE is_aktif='1'
                                    ORDER BY karyawan_nama");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_pengguna_by_filter($pengguna)
    {

        $query = $this->db->query("SELECT
                                    pengguna_id,
                                    IFNULL(pengguna_username, '') AS pengguna_username,
                                    IFNULL(pengguna_password, '') AS pengguna_password,
                                    IFNULL(pengguna_perusahaan, '')AS pengguna_perusahaan,
                                    IFNULL(pengguna_reff_id, '')AS pengguna_reff_id,
                                    IFNULL(pengguna_email, '')AS pengguna_email,
                                    add_by,
                                    updwho,
                                    updtgl,
                                    IFNULL(a.is_aktif, 0) AS is_aktif,
                                    IFNULL(a.is_delete, 0) AS is_delete
                                    FROM pengguna a
                                    WHERE pengguna_username LIKE '%" . $pengguna . "%'
                                    ORDER BY pengguna_username ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function search_pengguna($search)
    {

        $query = $this->db->query("SELECT pengguna_id as id, pengguna_username as nama, pengguna_alamat, pengguna_kelurahan, pengguna_kecamatan, pengguna_kota, pengguna_provinsi,pengguna_kode_pos FROM pengguna where pengguna_username like '%$search%' order by pengguna_username asc LIMIT 25");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_pengguna_not_in_selected_pengguna($arr_list_pengguna)
    {

        $arr_list_pengguna_str = "";

        if (isset($arr_list_pengguna)) {
            if (count($arr_list_pengguna) > 0) {
                $arr_list_pengguna_str = "AND pengguna_id NOT IN (" . implode(",", $arr_list_pengguna) . ")";
            }
        } else {
            $arr_list_pengguna_str = "";
        }

        $query = $this->db->query("SELECT * FROM pengguna where pengguna_id is not null " . $arr_list_pengguna_str . " order by pengguna_username asc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function cek_pengguna_by_email($pengguna_email)
    {

        $query = $this->db->query("SELECT * FROM pengguna WHERE pengguna_email = '$pengguna_email'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    public function insert_pengguna($pengguna_id, $pengguna_username, $pengguna_password, $pengguna_perusahaan, $pengguna_reff_id, $add_by, $updwho, $updtgl, $is_aktif, $pengguna_email, $is_delete, $pengguna_level)
    {
        $pengguna_id = $pengguna_id == '' ? null : $pengguna_id;
        $pengguna_username = $pengguna_username == '' ? null : $pengguna_username;
        $pengguna_password = $pengguna_password == '' ? null : $pengguna_password;
        $pengguna_perusahaan = $pengguna_perusahaan == '' ? null : $pengguna_perusahaan;
        $pengguna_reff_id = $pengguna_reff_id == '' ? null : $pengguna_reff_id;
        $add_by = $add_by == '' ? null : $add_by;
        $updwho = $updwho == '' ? null : $updwho;
        $updtgl = $updtgl == '' ? null : $updtgl;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;
        $pengguna_email = $pengguna_email == '' ? null : $pengguna_email;
        $is_delete = $is_delete == '' ? null : $is_delete;
        $pengguna_level = $pengguna_level == '' ? null : $pengguna_level;

        $this->db->set('pengguna_id', $pengguna_id);
        $this->db->set('pengguna_username', $pengguna_username);
        $this->db->set('pengguna_password', $pengguna_password);
        $this->db->set('pengguna_perusahaan', $pengguna_perusahaan);
        $this->db->set('pengguna_reff_id', $pengguna_reff_id);
        $this->db->set('add_by', $add_by);
        $this->db->set('updwho', $updwho);
        $this->db->set('updtgl', $updtgl);
        $this->db->set('is_aktif', $is_aktif);
        $this->db->set('pengguna_email', $pengguna_email);
        $this->db->set('pengguna_level', $pengguna_level);
        // $this->db->set('is_delete', $is_delete);

        $queryinsert = $this->db->insert("pengguna");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_pengguna($pengguna_id, $pengguna_username, $pengguna_password, $pengguna_perusahaan, $pengguna_reff_id, $add_by, $updwho, $updtgl, $is_aktif, $pengguna_email, $is_delete, $pengguna_level)
    {
        $pengguna_id = $pengguna_id == '' ? null : $pengguna_id;
        $pengguna_username = $pengguna_username == '' ? null : $pengguna_username;
        $pengguna_password = $pengguna_password == '' ? null : $pengguna_password;
        $pengguna_perusahaan = $pengguna_perusahaan == '' ? null : $pengguna_perusahaan;
        $pengguna_reff_id = $pengguna_reff_id == '' ? null : $pengguna_reff_id;
        $add_by = $add_by == '' ? null : $add_by;
        $updwho = $updwho == '' ? null : $updwho;
        $updtgl = $updtgl == '' ? null : $updtgl;
        $is_aktif = $is_aktif == '' ? null : $is_aktif;
        $pengguna_email = $pengguna_email == '' ? null : $pengguna_email;
        $is_delete = $is_delete == '' ? null : $is_delete;
        $pengguna_level = $pengguna_level == '' ? null : $pengguna_level;

        $this->db->set('pengguna_username', $pengguna_username);
        if ($pengguna_password !== null) {
            $this->db->set('pengguna_password', $pengguna_password);
        }
        $this->db->set('pengguna_perusahaan', $pengguna_perusahaan);
        $this->db->set('pengguna_reff_id', $pengguna_reff_id);
        // $this->db->set('add_by', $add_by);
        $this->db->set('updwho', $updwho);
        $this->db->set('updtgl', $updtgl);
        $this->db->set('is_aktif', $is_aktif);
        $this->db->set('pengguna_email', $pengguna_email);
        $this->db->set('pengguna_level', $pengguna_level);
        // $this->db->set('is_delete', $is_delete);

        $this->db->where('pengguna_id', $pengguna_id);

        $queryinsert = $this->db->update("pengguna");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_pengguna_profile($pengguna_id, $pengguna_email, $pengguna_password, $updwho, $updtgl)
    {
        $pengguna_id = $pengguna_id == '' ? null : $pengguna_id;
        $pengguna_password = $pengguna_password == '' ? null : $pengguna_password;
        $updwho = $updwho == '' ? null : $updwho;
        $updtgl = $updtgl == '' ? null : $updtgl;
        $pengguna_email = $pengguna_email == '' ? null : $pengguna_email;

        if ($pengguna_password !== null) {
            $this->db->set('pengguna_password', $pengguna_password);
        }
        // $this->db->set('add_by', $add_by);
        $this->db->set('updwho', $updwho);
        $this->db->set('updtgl', $updtgl);
        $this->db->set('pengguna_email', $pengguna_email);

        $this->db->where('pengguna_id', $pengguna_id);

        $queryinsert = $this->db->update("pengguna");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
