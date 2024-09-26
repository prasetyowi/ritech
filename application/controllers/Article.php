<?php

class Article extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    private $MenuKode;

    public function __construct()
    {
        parent::__construct();

        // $this->MenuKode = "135002000";
        // $this->load->model('WMS/M_PickList', 'M_PickList');
        // $this->load->model('WMS/M_article', 'M_article');
        // $this->load->model('WMS/M_DeliveryOrder', 'M_DeliveryOrder');
        // $this->load->model('WMS/M_DeliveryOrderDetailDraft', 'M_DeliveryOrderDetailDraft');
        // $this->load->model('WMS/M_PersetujuanPembongkaranarticle', 'M_PersetujuanPembongkaranarticle');
        // $this->load->model('M_ClientPt');
        // $this->load->model('M_Area');
        // $this->load->model('M_StatusProgress');
        // $this->load->model('M_SKU');
        // $this->load->model('M_Principle');
        // $this->load->model('M_TipeDeliveryOrder');
        // $this->load->model('M_AutoGen');
        $this->load->model('M_Vrbl');
        $this->load->model('M_article');
    }

    public function index()
    {
        $data = array();

        if ((!$this->session->has_userdata('pengguna_id')) || $this->session->userdata('pengguna_level') != 'administrator') {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Article";
        $data['act'] = "index";

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/article/index', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/article/script', $data);
    }

    public function create()
    {
        $data = array();

        if ((!$this->session->has_userdata('pengguna_id')) || $this->session->userdata('pengguna_level') != 'administrator') {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Article";
        $data['act'] = "index";

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/article/create', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/article/script', $data);
    }

    public function edit()
    {
        $data = array();

        if ((!$this->session->has_userdata('pengguna_id')) || $this->session->userdata('pengguna_level') != 'administrator') {
            redirect(base_url('Auth/login'));
        }

        $data['Title'] = "Article";
        $data['act'] = "index";

        $id = $this->input->get('id');

        $data['Header'] = $this->M_article->Get_all_article_by_id($id);

        $this->load->view('layouts/header', $data);
        $this->load->view('pages/article/edit', $data);
        $this->load->view('layouts/footer', $data);
        $this->load->view('pages/article/script', $data);
    }

    public function Get_all_article()
    {
        $data = $this->M_article->Get_all_article();

        echo json_encode($data);
    }

    public function Get_all_article_by_id()
    {
        $id = $this->input->get('id');
        $data = $this->M_article->Get_all_article_by_id($id);

        echo json_encode($data);
    }

    public function Cek_article()
    {
        $article_judul = $this->input->post('article_judul');
        $data = $this->M_article->Cek_article($article_judul);

        echo json_encode($data);
    }

    public function insert_article()
    {
        $article_id = str_replace(" ", "-", str_replace("'", "", $this->input->post('article_judul')));
        $article_judul = $this->input->post('article_judul');
        $article_short_desc = $this->input->post('article_short_desc');
        $article_desc = $this->input->post('article_desc');
        // $article_sampul = $this->input->post('article_sampul');
        $tgl_post = $this->input->post('tgl_post');

        $cek = $this->M_article->Cek_article($article_judul);

        if ($cek > 0) {
            echo json_encode(array("status" => 2, "data" => ""));
            return false;
        }

        $config['upload_path']   = FCPATH . '/assets/upload/article/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        $this->db->trans_begin();

        if ($this->upload->do_upload('article_sampul')) { //upload file
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

            $article_sampul = $data['upload_data']['file_name']; //set file name ke variable image

            $this->M_article->insert_article($article_id, $article_judul, $article_short_desc, $article_desc, $article_sampul, $tgl_post);
        } else {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 3, "data" => $this->input->post('article_sampul')));
            return false;
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_article()
    {
        $article_id = $this->input->post('article_id');
        $article_judul = $this->input->post('article_judul');
        $article_short_desc = $this->input->post('article_short_desc');
        $article_desc = $this->input->post('article_desc');
        // $article_sampul = $this->input->post('article_sampul');
        $tgl_post = $this->input->post('tgl_post');

        $config['upload_path'] = FCPATH . '/assets/upload/article/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        $this->db->trans_begin();

        if ($this->upload->do_upload('article_sampul')) { //upload file
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

            $article_sampul = $data['upload_data']['file_name']; //set file name ke variable image

            $this->M_article->update_article($article_id, $article_judul, $article_short_desc, $article_desc, $article_sampul, $tgl_post);
        } else {
            $this->M_article->update_article($article_id, $article_judul, $article_short_desc, $article_desc, "", $tgl_post);
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function delete_article()
    {
        $article_id = $this->input->post('article_id');
        $foto = $this->db->get_where('article', array('article_id' => $article_id));

        if ($foto->num_rows() > 0) {
            $hasil = $foto->row();
            $nama_foto = $hasil->article_sampul;
            if (file_exists($file = FCPATH . '/assets/upload/article/' . $nama_foto)) {
                unlink($file);
            }
        }

        $this->db->trans_begin();

        $this->db->delete('article', array('article_id' => $article_id));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }
}
