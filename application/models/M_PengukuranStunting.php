<?php

class M_PengukuranStunting extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function cek_pengukuran_stunting_duplicate($pengukuran_stunting_id)
    {

        $query = $this->db->query("SELECT * FROM pengukuran_stunting where pengukuran_stunting_id = '$pengukuran_stunting_id'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    function Get_pengukuran_stunting_by_id($pengukuran_stunting_id)
    {
        $query = $this->db->query("SELECT
                                    pengukuran_stunting_id,
                                    nama_anak,
                                    jenis_kelamin,
                                    nama_orang_tua,
                                    DATE_FORMAT(tanggal_lahir, '%Y-%m-%d') AS tanggal_lahir,
                                    usia_saat_ukur,
                                    DATE_FORMAT(tanggal_pengukuran, '%Y-%m-%d') AS tanggal_pengukuran,
                                    berat,
                                    tinggi,
                                    cara_pengukuran,
                                    lk,
                                    zs_bb_u,
                                    zs_tb_u,
                                    zs_bb_tb,
                                    zs_lk_u,
                                    umur_bb,
                                    umur_tb,
                                    kesimpulan,
                                    updwho,
									updtgl
									FROM pengukuran_stunting
									WHERE pengukuran_stunting_id = '$pengukuran_stunting_id'");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_pengukuran_stunting_by_filter($bulan, $tahun, $user)
    {

        $query = $this->db->query("SELECT
                                    pengukuran_stunting_id,
                                    nama_anak,
                                    jenis_kelamin,
                                    nama_orang_tua,
                                    DATE_FORMAT(tanggal_lahir, '%Y-%m-%d') AS tanggal_lahir,
                                    usia_saat_ukur,
                                    DATE_FORMAT(tanggal_pengukuran, '%d-%m-%Y') AS tanggal_pengukuran,
                                    berat,
                                    tinggi,
                                    cara_pengukuran,
                                    lk,
                                    zs_bb_u,
                                    zs_tb_u,
                                    zs_bb_tb,
                                    zs_lk_u,
                                    umur_bb,
                                    umur_tb,
                                    kesimpulan,
                                    updwho,
									updtgl
									FROM pengukuran_stunting
									WHERE MONTH(tanggal_pengukuran) = '$bulan'
                                    AND YEAR(tanggal_pengukuran) = '$tahun'
                                    AND updwho = '$user' ");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_pengukuran_stunting_by_filter_admin($tgl1, $tgl2, $umur_awal, $umur_akhir, $nama_orang_tua, $nama_anak)
    {

        if ($nama_orang_tua != "") {
            $nama_orang_tua = " AND nama_orang_tua LIKE '%$nama_orang_tua%'";
        }

        if ($nama_anak != "") {
            $nama_anak = " AND nama_anak LIKE '%$nama_anak%'";
        }


        $query = $this->db->query("SELECT
                                    pengukuran_stunting_id,
                                    nama_anak,
                                    jenis_kelamin,
                                    nama_orang_tua,
                                    DATE_FORMAT(tanggal_lahir, '%Y-%m-%d') AS tanggal_lahir,
                                    usia_saat_ukur,
                                    DATE_FORMAT(tanggal_pengukuran, '%d-%m-%Y') AS tanggal_pengukuran,
                                    berat,
                                    tinggi,
                                    cara_pengukuran,
                                    lk,
                                    zs_bb_u,
                                    zs_tb_u,
                                    zs_bb_tb,
                                    zs_lk_u,
                                    umur_bb,
                                    umur_tb,
                                    kesimpulan,
                                    updwho,
									updtgl,
                                    IFNULL((select a.umur_bulan from pengukuran_tinggi_badan a where a.median <= tinggi AND a.jenis_kelamin = jenis_kelamin order by a.umur_bulan DESC LIMIT 1),0) as umur_tb,
                                    IFNULL((select a.umur_bulan from pengukuran_berat_badan a where a.median <= berat AND a.jenis_kelamin = jenis_kelamin order by a.umur_bulan DESC LIMIT 1),0) as umur_bb
									FROM pengukuran_stunting
									WHERE DATE_FORMAT(tanggal_pengukuran, '%Y-%m-%d') BETWEEN '$tgl1' AND '$tgl2'
                                    AND usia_saat_ukur BETWEEN '$umur_awal' AND '$umur_akhir'
                                    " . $nama_orang_tua . "
                                    " . $nama_anak . "
                                    ORDER BY tanggal_pengukuran DESC, nama_orang_tua ASC");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
        // return $this->db->last_query();
    }

    public function Get_hasil_pengukuran_stunting_by_tinggi($usia_saat_ukur, $jenis_kelamin, $tinggi)
    {

        $query = $this->db->query("SELECT
                                        jenis_kelamin,
                                        umur_bulan,
                                        min_1_sd,
                                        median,
                                        max_1_sd,
                                        CASE
                                            WHEN $tinggi > median THEN
                                                ($tinggi-median) / (max_1_sd-median)
                                            ELSE
                                                ($tinggi-median) / (median-min_1_sd)
                                        END as hasil
                                    FROM pengukuran_tinggi_badan
                                    WHERE umur_bulan = '$usia_saat_ukur' AND jenis_kelamin = '$jenis_kelamin'");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Get_dashboard_pengukuran_stunting()
    {
        $filter_bulan = "";
        $filter_bulan_lalu = "";

        if (date('m') == 1) {
            $tahun_lalu = date('Y') - 1;
            $filter_bulan = "MONTH(tanggal_pengukuran) = '" . date('m') . "' AND YEAR(tanggal_pengukuran) = '" . date('Y') . "'";
            $filter_bulan_lalu = "MONTH(tanggal_pengukuran) = '12' AND YEAR(tanggal_pengukuran) = '" . $tahun_lalu . "'";
        } else {
            $bulan_lalu = date('m') - 1;
            $filter_bulan = "MONTH(tanggal_pengukuran) = '" . date('m') . "' AND YEAR(tanggal_pengukuran) = '" . date('Y') . "'";
            $filter_bulan_lalu = "MONTH(tanggal_pengukuran) = '" . $bulan_lalu . "' AND YEAR(tanggal_pengukuran) = '" . date('Y') . "'";
        }

        $query = $this->db->query("SELECT
                                        COUNT(DISTINCT CASE WHEN " . $filter_bulan . " THEN nama_anak ELSE NULL END) total_pengukuran,
                                        COUNT(DISTINCT CASE WHEN " . $filter_bulan . "  AND kesimpulan = 'Tidak Stunting' THEN nama_anak ELSE NULL END) tidak_stunting_bulan_ini,
                                        COUNT(DISTINCT CASE WHEN " . $filter_bulan . "  AND kesimpulan = 'Hampir Stunting' THEN nama_anak ELSE NULL END) hampir_stunting_bulan_ini,
                                        COUNT(DISTINCT CASE WHEN " . $filter_bulan . "  AND kesimpulan = 'Stunting' THEN nama_anak ELSE NULL END) stunting_bulan_ini,
                                        COUNT(DISTINCT CASE WHEN " . $filter_bulan_lalu . "  AND kesimpulan = 'Tidak Stunting' THEN nama_anak ELSE NULL END) tidak_stunting_bulan_lalu,
                                        COUNT(DISTINCT CASE WHEN " . $filter_bulan_lalu . "  AND kesimpulan = 'Hampir Stunting' THEN nama_anak ELSE NULL END) hampir_stunting_bulan_lalu,
                                        COUNT(DISTINCT CASE WHEN " . $filter_bulan_lalu . "  AND kesimpulan = 'Stunting' THEN nama_anak ELSE NULL END) stunting_bulan_lalu
                                    FROM pengukuran_stunting
                                    WHERE YEAR(tanggal_pengukuran) = '" . date('Y') . "'");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function insert_pengukuran_stunting($pengukuran_stunting_id, $nama_anak, $jenis_kelamin, $nama_orang_tua, $tanggal_lahir, $usia_saat_ukur, $tanggal_pengukuran, $berat, $tinggi, $cara_pengukuran, $lk, $zs_bb_u, $zs_tb_u, $zs_bb_tb, $zs_lk_u, $umur_bb, $umur_tb, $kesimpulan)
    {
        $pengukuran_stunting_id = $pengukuran_stunting_id == '' ? null : $pengukuran_stunting_id;
        $nama_anak = $nama_anak == '' ? null : $nama_anak;
        $jenis_kelamin = $jenis_kelamin == '' ? null : $jenis_kelamin;
        $nama_orang_tua = $nama_orang_tua == '' ? null : $nama_orang_tua;
        $tanggal_lahir = $tanggal_lahir == '' ? null : $tanggal_lahir;
        $usia_saat_ukur = $usia_saat_ukur == '' ? null : $usia_saat_ukur;
        $tanggal_pengukuran = $tanggal_pengukuran == '' ? null : $tanggal_pengukuran;
        $berat = $berat == '' ? null : $berat;
        $tinggi = $tinggi == '' ? null : $tinggi;
        $cara_pengukuran = $cara_pengukuran == '' ? null : $cara_pengukuran;
        $lk = $lk == '' ? null : $lk;
        $zs_bb_u = $zs_bb_u == '' ? null : $zs_bb_u;
        $zs_tb_u = $zs_tb_u == '' ? null : $zs_tb_u;
        $zs_bb_tb = $zs_bb_tb == '' ? null : $zs_bb_tb;
        $zs_lk_u = $zs_lk_u == '' ? null : $zs_lk_u;
        $umur_bb = $umur_bb == '' ? null : $umur_bb;
        $umur_tb = $umur_tb == '' ? null : $umur_tb;
        $kesimpulan = $kesimpulan == '' ? null : $kesimpulan;

        $this->db->set('pengukuran_stunting_id', $pengukuran_stunting_id);
        $this->db->set('nama_anak', $nama_anak);
        $this->db->set('jenis_kelamin', $jenis_kelamin);
        $this->db->set('nama_orang_tua', $nama_orang_tua);
        $this->db->set('tanggal_lahir', $tanggal_lahir);
        $this->db->set('usia_saat_ukur', $usia_saat_ukur);
        $this->db->set('tanggal_pengukuran', $tanggal_pengukuran);
        $this->db->set('berat', $berat);
        $this->db->set('tinggi', $tinggi);
        $this->db->set('cara_pengukuran', $cara_pengukuran);
        $this->db->set('lk', $lk);
        $this->db->set('zs_bb_u', $zs_bb_u);
        $this->db->set('zs_tb_u', $zs_tb_u);
        $this->db->set('zs_bb_tb', $zs_bb_tb);
        $this->db->set('zs_lk_u', $zs_lk_u);
        $this->db->set('umur_bb', $umur_bb);
        $this->db->set('umur_tb', $umur_tb);
        $this->db->set('kesimpulan', $kesimpulan);
        $this->db->set('updwho', $this->session->userdata('pengguna_username'));
        $this->db->set('updtgl', date('Y-m-d H:i:s'));

        $queryinsert = $this->db->insert("pengukuran_stunting");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_pengukuran_stunting($pengukuran_stunting_id, $nama_anak, $jenis_kelamin, $nama_orang_tua, $tanggal_lahir, $usia_saat_ukur, $tanggal_pengukuran, $berat, $tinggi, $cara_pengukuran, $lk, $zs_bb_u, $zs_tb_u, $zs_bb_tb, $zs_lk_u, $umur_bb, $umur_tb, $kesimpulan)
    {
        $pengukuran_stunting_id = $pengukuran_stunting_id == '' ? null : $pengukuran_stunting_id;
        $nama_anak = $nama_anak == '' ? null : $nama_anak;
        $jenis_kelamin = $jenis_kelamin == '' ? null : $jenis_kelamin;
        $nama_orang_tua = $nama_orang_tua == '' ? null : $nama_orang_tua;
        $tanggal_lahir = $tanggal_lahir == '' ? null : $tanggal_lahir;
        $usia_saat_ukur = $usia_saat_ukur == '' ? null : $usia_saat_ukur;
        $tanggal_pengukuran = $tanggal_pengukuran == '' ? null : $tanggal_pengukuran;
        $berat = $berat == '' ? null : $berat;
        $tinggi = $tinggi == '' ? null : $tinggi;
        $cara_pengukuran = $cara_pengukuran == '' ? null : $cara_pengukuran;
        $lk = $lk == '' ? null : $lk;
        $zs_bb_u = $zs_bb_u == '' ? null : $zs_bb_u;
        $zs_tb_u = $zs_tb_u == '' ? null : $zs_tb_u;
        $zs_bb_tb = $zs_bb_tb == '' ? null : $zs_bb_tb;
        $zs_lk_u = $zs_lk_u == '' ? null : $zs_lk_u;
        $umur_bb = $umur_bb == '' ? null : $umur_bb;
        $umur_tb = $umur_tb == '' ? null : $umur_tb;
        $kesimpulan = $kesimpulan == '' ? null : $kesimpulan;

        $this->db->set('nama_anak', $nama_anak);
        $this->db->set('jenis_kelamin', $jenis_kelamin);
        $this->db->set('nama_orang_tua', $nama_orang_tua);
        $this->db->set('tanggal_lahir', $tanggal_lahir);
        $this->db->set('usia_saat_ukur', $usia_saat_ukur);
        $this->db->set('tanggal_pengukuran', $tanggal_pengukuran);
        $this->db->set('berat', $berat);
        $this->db->set('tinggi', $tinggi);
        $this->db->set('cara_pengukuran', $cara_pengukuran);
        $this->db->set('lk', $lk);
        $this->db->set('zs_bb_u', $zs_bb_u);
        $this->db->set('zs_tb_u', $zs_tb_u);
        $this->db->set('zs_bb_tb', $zs_bb_tb);
        $this->db->set('zs_lk_u', $zs_lk_u);
        $this->db->set('umur_bb', $umur_bb);
        $this->db->set('umur_tb', $umur_tb);
        $this->db->set('kesimpulan', $kesimpulan);
        $this->db->set('updwho', $this->session->userdata('pengguna_username'));
        $this->db->set('updtgl', date('Y-m-d H:i:s'));

        $this->db->where('pengukuran_stunting_id', $pengukuran_stunting_id);

        $queryinsert = $this->db->update("pengukuran_stunting");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function delete_pengukuran_stunting($pengukuran_stunting_id)
    {
        $this->db->where('pengukuran_stunting_id', $pengukuran_stunting_id);
        $queryinsert = $this->db->delete("pengukuran_stunting");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
