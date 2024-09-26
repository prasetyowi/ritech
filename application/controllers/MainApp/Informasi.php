<?php

class Informasi extends CI_Controller
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

        $this->load->library('pagination');

        $this->load->model('M_Vrbl');
        $this->load->model('M_Article');
    }

    public function index()
    {
        $data = array();

        $data['Title'] = "Informasi";
        $data['act'] = "index";

        //konfigurasi pagination
        $config['base_url'] = base_url('MainApp/Informasi/index'); //site url
        $config['total_rows'] = $this->db->count_all('article'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel M_Article. 
        $data['Article'] = $this->M_Article->get_article_list($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/informasi/index', $data);
        $this->load->view('layouts/footer_web', $data);
    }

    public function search()
    {
        $judul = $this->input->get('filter_judul');

        $data = array();

        $data['Title'] = "Informasi";
        $data['act'] = "index";

        //konfigurasi pagination
        $config['base_url'] = base_url('MainApp/Informasi/search'); //site url
        $config['total_rows'] = $this->db->count_all('article'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel M_Article. 
        $data['Article'] = $this->M_Article->get_article_list_by_judul($judul, $config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/informasi/index', $data);
        $this->load->view('layouts/footer_web', $data);
    }

    public function detail($id)
    {
        $data = array();

        $data['Title'] = "Informasi";
        $data['act'] = "index";

        $data['Article'] = $this->M_Article->Get_all_article_by_id($id);

        $this->load->view('layouts/header_web', $data);
        $this->load->view('main_app/informasi/detail', $data);
        $this->load->view('layouts/footer_web', $data);
    }
}
