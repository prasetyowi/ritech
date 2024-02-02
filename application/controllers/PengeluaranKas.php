<?php

class PengeluaranKas extends CI_Controller
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
        $this->load->model('M_PengeluaranKas');
        $this->load->model('M_Vrbl');
        $this->load->helper(array('url', 'file'));
    }

    public function index()
    {
        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        // if (!$this->session->has_userdata('pengguna_id')) {
        // 	redirect(base_url('MainPage'));
        // }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        // $query['Title'] = Get_Title_Name();
        // $query['Copyright'] = Get_Copyright_Name();

        $data['act'] = "index";

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        // $this->load->view('layouts/header', $query);
        // $this->load->view('pages/kas/index', $data);
        // $this->load->view('layouts/footer', $query);
        // $this->load->view('pages/kas/script', $data);

        $this->load->view('layouts/header');
        $this->load->view('pages/pengeluaran_kas/index');
        $this->load->view('layouts/footer');
        $this->load->view('pages/pengeluaran_kas/script');
    }

    public function create()
    {

        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        // if (!$this->session->has_userdata('pengguna_id')) {
        // 	redirect(base_url('MainPage'));
        // }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        $query['Title'] = "Pengeluaran Kas";

        $data['act'] = "add";

        $table = "kas";
        $column = "kas_id";
        $kode = "KAS" . date('ymd');

        $data['kas_id'] = $this->M_Vrbl->Generate_kode($table, $column, $kode);

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        $this->load->view('layouts/header', $query);
        $this->load->view('pages/pengeluaran_kas/create', $data);
        $this->load->view('layouts/footer', $query);
        $this->load->view('pages/pengeluaran_kas/script', $data);
    }

    public function edit()
    {

        $id = $this->input->get('id');

        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        // if (!$this->session->has_userdata('pengguna_id')) {
        // 	redirect(base_url('MainPage'));
        // }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        $query['Title'] = "Pengeluaran Kas";
        // $query['Copyright'] = Get_Copyright_Name();

        $data['Header'] = $this->M_PengeluaranKas->Get_pengeluaran_kas_header_by_id($id);

        $data['act'] = "edit";

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        $this->load->view('layouts/header', $query);
        $this->load->view('pages/pengeluaran_kas/edit', $data);
        $this->load->view('layouts/footer', $query);
        $this->load->view('pages/pengeluaran_kas/script', $data);
    }

    public function detail()
    {
        $id = $this->input->get('id');

        $data = array();
        // $data['Menu_Access'] = $this->M_Menu->Getmenu_access_web($this->session->userdata('pengguna_grup_id'), $this->MenuKode);
        // if ($data['Menu_Access']['R'] != 1) {
        // 	redirect(base_url('MainPage'));
        // 	exit();
        // }

        // if (!$this->session->has_userdata('pengguna_id')) {
        // 	redirect(base_url('MainPage'));
        // }

        // if (!$this->session->has_userdata('depo_id')) {
        // 	redirect(base_url('Main/MainDepo/DepoMenu'));
        // }

        // $data['sidemenu'] = $this->M_Menu->GetMenu_Depo('', $this->session->userdata('pengguna_grup_id'));

        // $data['Ses_UserName'] = $this->session->userdata('pengguna_username');

        $query['Title'] = "Pengeluaran Kas";
        // $query['Copyright'] = Get_Copyright_Name();
        $data['Header'] = $this->M_PengeluaranKas->Get_pengeluaran_kas_header_by_id($id);
        $data['act'] = "detail";

        // Kebutuhan Authority Menu 
        // $this->session->set_userdata('MenuLink', str_replace(base_url(), '', current_url()));

        $this->load->view('layouts/header', $query);
        $this->load->view('pages/pengeluaran_kas/detail', $data);
        $this->load->view('layouts/footer', $query);
        // $this->load->view('pages/kas/script', $data);
    }

    public function Get_pengeluaran_kas_by_filter()
    {
        $tgl = explode(" - ", $this->input->post('tgl'));
        $tgl1 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[0])));
        $tgl2 = date('Y-m-d', strtotime(str_replace("/", "-", $tgl[1])));
        $kas_id = $this->input->post('kas_id');
        $status = $this->input->post('status');

        $data = $this->M_PengeluaranKas->Get_pengeluaran_kas_by_filter($tgl1, $tgl2, $kas_id, $status);

        echo json_encode($data);
    }

    public function insert_pengeluaran_kas()
    {

        $kas_id = $this->input->post('kas_id');
        $kas_tanggal = $this->input->post('kas_tanggal');
        $tipe_kas = $this->input->post('tipe_kas');
        $kas_no_akun = $this->input->post('kas_no_akun');
        $kas_keterangan = str_replace("'", "", $this->input->post('kas_keterangan'));
        $kas_no_rekening = $this->input->post('kas_no_rekening');
        $kas_jumlah = $this->input->post('kas_jumlah');
        $kas_status = $this->input->post('kas_status');
        $updwho = $this->input->post('updwho');
        $updtgl = $this->input->post('updtgl');

        $cek_data = $this->M_PengeluaranKas->cek_pengeluaran_kas_duplicate($kas_id);

        if ($cek_data > 0) {
            echo json_encode(array("status" => 2, "data" => ""));
            die;
        }

        $this->db->trans_begin();

        $this->M_PengeluaranKas->insert_pengeluaran_kas($kas_id, $kas_tanggal, $tipe_kas, $kas_no_akun, $kas_keterangan, $kas_no_rekening, $kas_jumlah, $kas_status, $updwho, $updtgl);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    public function update_pengeluaran_kas()
    {
        $kas_id = $this->input->post('kas_id');
        $kas_tanggal = $this->input->post('kas_tanggal');
        $tipe_kas = $this->input->post('tipe_kas');
        $kas_no_akun = $this->input->post('kas_no_akun');
        $kas_keterangan = str_replace("'", "", $this->input->post('kas_keterangan'));
        $kas_no_rekening = $this->input->post('kas_no_rekening');
        $kas_jumlah = $this->input->post('kas_jumlah');
        $kas_status = $this->input->post('kas_status');
        $updwho = $this->input->post('updwho');
        $updtgl = $this->input->post('updtgl');

        $this->db->trans_begin();

        $this->M_PengeluaranKas->update_pengeluaran_kas($kas_id, $kas_tanggal, $tipe_kas, $kas_no_akun, $kas_keterangan, $kas_no_rekening, $kas_jumlah, $kas_status, $updwho, $updtgl);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(array("status" => 0, "data" => ""));
        } else {
            $this->db->trans_commit();
            echo json_encode(array("status" => 1, "data" => ""));
        }
    }

    //Untuk proses upload foto
    function proses_upload()
    {
        $kas_id = $this->input->post('kas_id');
        $token = $this->input->post('token_foto');

        $cek_foto = $this->db->query("select * from kas_attachment where kas_id = '$kas_id'");

        if ($cek_foto->num_rows() > 0) {
            if (file_exists($file = FCPATH . '/assets/upload/pengeluaran_kas/' . $cek_foto->row(0)->attachment)) {
                unlink($file);
            }
        }

        $config['upload_path']   = FCPATH . '/assets/upload/pengeluaran_kas/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|doc|docx|csv|tsv|ppt|pptx';
        $config['max_size'] = 2048;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile')) {
            $nama = $this->upload->data('file_name');

            if ($cek_foto->num_rows() == 0) {
                $this->db->set('kas_id', $kas_id);
                $this->db->set('attachment', $nama);
                $this->db->set('token', $token);

                $this->db->insert('kas_attachment');
            } else {
                $this->db->set('attachment', $nama);
                $this->db->set('token', $token);
                $this->db->where('kas_id', $kas_id);

                $this->db->update('kas_attachment');
            }
        }
    }


    //Untuk menghapus foto
    function hapus_file()
    {

        //Ambil token foto
        $token = $this->input->post('token');
        $foto = $this->db->get_where('kas_attachment', array('token' => $token));

        if ($foto->num_rows() > 0) {
            $hasil = $foto->row();
            $nama_foto = $hasil->attachment;
            if (file_exists($file = FCPATH . '/assets/upload/pengeluaran_kas/' . $nama_foto)) {
                unlink($file);
            }
            $this->db->delete('kas_attachment', array('token' => $token));
        }


        echo "{}";
    }
}
