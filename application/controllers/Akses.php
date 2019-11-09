<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Akses_model', 'm_akses');
    }

    public function index()
    {
        $data['title'] = "Akses Cepat";
        $data['icon'] = "bookmark";

        $data['akses'] = $this->m_akses->getAkses();

        $this->load->view('template/header.php');
        $this->load->view('akses/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah akses";
            $this->load->view('template/header.php');
            $this->load->view('akses/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_akses->addAkses();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses Cepat telah ditambahkan!</div>');
            redirect('akses');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit Akses Cepat";

        $data['akses'] = $this->m_akses->getAksesById($id);

        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('akses/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_akses->editAkses();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses Cepat telah diubah!</div>');
            redirect('akses');
        }
    }

    function delete($id)
    {
        $this->m_akses->deleteAkses($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses Cepat telah dihapus!</div>');
        redirect('akses');
    }
}
