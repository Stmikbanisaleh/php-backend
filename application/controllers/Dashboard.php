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
        $data['jumlahBerita'] = $this->dashboard->JumlahBerita();
        $data['jumlahSop'] = $this->dashboard->JumlahSop();
        $data['jumlahMenu'] = $this->dashboard->JumlahMenu();

        $this->load->view('template/header');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}
