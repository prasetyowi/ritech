<?php

class M_Article extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->db = $this->load->database('d4',true);
    }

    public function Get_all_article()
    {

        $query = $this->db->query("SELECT
                                    article_id,
                                    article_judul,
                                    IFNULL(article_short_desc, '') AS article_short_desc,
                                    IFNULL(article_desc, '') AS article_desc,
                                    IFNULL(article_sampul, '') AS article_sampul,
                                    DATE_FORMAT(tgl_post, '%d/%m/%Y') AS tgl_post,
                                    updwho,
                                    updtgl
                                    FROM article 
                                    order by tgl_post desc");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function get_article_list($per_page, $page)
    {

        $query = $this->db->query("SELECT
                                    article_id,
                                    article_judul,
                                    IFNULL(article_short_desc, '') AS article_short_desc,
                                    IFNULL(article_desc, '') AS article_desc,
                                    IFNULL(article_sampul, '') AS article_sampul,
                                    DATE_FORMAT(tgl_post, '%d/%m/%Y') AS tgl_post,
                                    updwho,
                                    updtgl
                                    FROM article 
                                    order by tgl_post desc
                                    LIMIT $page, $per_page");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
        // return $this->db->last_query();
    }

    public function get_article_list_by_judul($judul, $per_page, $page)
    {

        $query = $this->db->query("SELECT
                                    article_id,
                                    article_judul,
                                    IFNULL(article_short_desc, '') AS article_short_desc,
                                    IFNULL(article_desc, '') AS article_desc,
                                    IFNULL(article_sampul, '') AS article_sampul,
                                    DATE_FORMAT(tgl_post, '%d/%m/%Y') AS tgl_post,
                                    updwho,
                                    updtgl
                                    FROM article 
                                    WHERE article_judul LIKE '%$judul%'
                                    order by tgl_post desc
                                    LIMIT $page, $per_page");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
        // return $this->db->last_query();
    }

    public function Get_all_article_by_id($article_id)
    {

        $query = $this->db->query("SELECT
                                    article_id,
                                    article_judul,
                                    IFNULL(article_short_desc, '') AS article_short_desc,
                                    IFNULL(article_desc, '') AS article_desc,
                                    IFNULL(article_sampul, '') AS article_sampul,
                                    DATE_FORMAT(tgl_post, '%d/%m/%Y') AS tgl_post,
                                    updwho,
                                    updtgl
                                    FROM article
                                    WHERE article_id = '$article_id'");

        if ($query->num_rows() == 0) {
            $query = array();
        } else {
            $query = $query->result_array();
        }

        return $query;
    }

    public function Cek_article($article_judul)
    {

        $query = $this->db->query("SELECT
                                    article_id,
                                    article_judul,
                                    IFNULL(article_short_desc, '') AS article_short_desc,
                                    IFNULL(article_desc, '') AS article_desc,
                                    IFNULL(article_sampul, '') AS article_sampul,
                                    DATE_FORMAT(tgl_post, '%d/%m/%Y') AS tgl_post,
                                    updwho,
                                    updtgl
                                    FROM article
                                    WHERE article_judul = '$article_judul'");

        if ($query->num_rows() == 0) {
            $query = 0;
        } else {
            $query = $query->num_rows();
        }

        return $query;
    }

    public function insert_article($article_id, $article_judul, $article_short_desc, $article_desc, $article_sampul, $tgl_post)
    {
        $article_id = $article_id == '' ? null : $article_id;
        $article_judul = $article_judul == '' ? null : $article_judul;
        $article_short_desc = $article_short_desc == '' ? null : $article_short_desc;
        $article_desc = $article_desc == '' ? null : $article_desc;
        $article_sampul = $article_sampul == '' ? null : $article_sampul;
        $tgl_post = $tgl_post == '' ? null : $tgl_post;

        $this->db->set('article_id', $article_id);
        $this->db->set('article_judul', $article_judul);
        $this->db->set('article_short_desc', $article_short_desc);
        $this->db->set('article_desc', $article_desc);
        $this->db->set('article_sampul', $article_sampul);
        $this->db->set('tgl_post', date('Y-m-d H:i:s'));
        $this->db->set('updwho', $this->session->userdata('pengguna_username'));
        $this->db->set('updtgl', date('Y-m-d H:i:s'));

        $queryinsert = $this->db->insert("article");

        return $queryinsert;
        // return $this->db->last_query();
    }

    public function update_article($article_id, $article_judul, $article_short_desc, $article_desc, $article_sampul, $tgl_post)
    {
        $article_id = $article_id == '' ? null : $article_id;
        $article_judul = $article_judul == '' ? null : $article_judul;
        $article_short_desc = $article_short_desc == '' ? null : $article_short_desc;
        $article_desc = $article_desc == '' ? null : $article_desc;
        $article_sampul = $article_sampul == '' ? null : $article_sampul;
        $tgl_post = $tgl_post == '' ? null : $tgl_post;

        // $this->db->set('article_judul', $article_judul);
        $this->db->set('article_short_desc', $article_short_desc);
        $this->db->set('article_desc', $article_desc);

        if ($article_sampul !== null) {
            $this->db->set('article_sampul', $article_sampul);
        }
        // $this->db->set('tgl_post', $tgl_post);
        $this->db->set('updwho', $this->session->userdata('pengguna_username'));
        $this->db->set('updtgl', date('Y-m-d H:i:s'));

        $this->db->where('article_id', $article_id);

        $queryinsert = $this->db->update("article");

        return $queryinsert;
        // return $this->db->last_query();
    }
}
