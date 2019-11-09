<?php

defined('BASEPATH') or exit('No script direct access allowed');

class Sop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Sop_model', 'm_sop');
    }

    public function index()
    {
        $data['title'] = "SOP";
        $data['icon'] = "file";

        $data['sop'] = $this->m_sop->getSop();

        $this->load->view('template/header');
        $this->load->view('sop/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nama_judul', 'Nama Judul', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah SOP";
            $this->load->view('template/header.php');
            $this->load->view('sop/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_sop->addSop();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP telah ditambahkan!</div>');
            redirect('sop');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit sop";

        $data['sop'] = $this->m_sop->getsopById($id);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nama_judul', 'Nama Judul', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('sop/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_sop->editSop();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP telah diubah!</div>');
            redirect('sop');
        }
    }

    function delete($id)
    {
        $this->m_sop->deletesop($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP telah dihapus!</div>');
        redirect('sop');
    }
}
