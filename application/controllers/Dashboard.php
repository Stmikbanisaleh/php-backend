<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->model('Dashboard_model', 'dashboard');
        
        // print_r($this->session->userdata('token'));exit;
        $jmlberita = $this->lapan_api_library->call('dashboard/berita',['token' => $this->session->userdata('token')]);
        $jmlsop = $this->lapan_api_library->call('dashboard/sop',['token' => $this->session->userdata('token')]);
        $jmlmenu = $this->lapan_api_library->call('dashboard/menu',['token' => $this->session->userdata('token')]);

        $data['jumlahBerita'] = $jmlberita;
        $data['jumlahSop'] = $jmlsop;
        $data['jumlahMenu'] = $jmlmenu;

        $this->load->view('template/header');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}
