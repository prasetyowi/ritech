<?php

class M_Auth extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_user_by_auth($email, $password)
    {

        $query = $this->db->query("SELECT
                                        pengguna.pengguna_id,
                                        pengguna.pengguna_username,
                                        pengguna.pengguna_email,
                                        pengguna.pengguna_password,
                                        pengguna.karyawan_id,
                                        karyawan.karyawan_nama,
                                        karyawan.perusahaan_id,
                                        karyawan.karyawan_level,
                                        karyawan.karyawan_divisi
                                    from pengguna
                                    LEFT JOIN karyawan
                                    on karyawan.karyawan_id = pengguna.karyawan_id
                                    WHERE pengguna.pengguna_email = '$email' AND pengguna.pengguna_password = '$password'");

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
            $query = 0;
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
