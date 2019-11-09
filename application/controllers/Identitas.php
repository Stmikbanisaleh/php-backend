<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Identitas_model', 'm_identitas');
    }

    public function index()
    {
        $data['title'] = "Identitas";
        $data['icon'] = "info-circle";

        $data['identitas'] = $this->m_identitas->getIdentitas();

        $this->load->view('template/header.php');
        $this->load->view('identitas/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_website', 'Nama Website', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('satker', 'satker', 'required');
        $this->form_validation->set_rules('facebook', 'facebook', 'required');
        $this->form_validation->set_rules('google', 'google', 'required');
        $this->form_validation->set_rules('twitter', 'twitter', 'required');
        $this->form_validation->set_rules('rekening', 'rekening', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('meta_deskripsi', 'meta_deskripsi', 'required');
        $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
        $this->form_validation->set_rules('favicon', 'favicon', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah identitas";
            $this->load->view('template/header.php');
            $this->load->view('identitas/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_identitas->addidentitas();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            identitas telah ditambahkan!</div>');
            redirect('identitas');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit identitas";

        $data['identitas'] = $this->m_identitas->getIdentitasById($id);

        $this->form_validation->set_rules('nama_website', 'Nama Website', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('satker', 'satker', 'required');
        $this->form_validation->set_rules('facebook', 'facebook', 'required');
        $this->form_validation->set_rules('google', 'google', 'required');
        $this->form_validation->set_rules('twitter', 'twitter', 'required');
        $this->form_validation->set_rules('rekening', 'rekening', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('meta_deskripsi', 'meta_deskripsi', 'required');
        $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
        $this->form_validation->set_rules('favicon', 'favicon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('identitas/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_identitas->editidentitas();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            identitas telah diubah!</div>');
            redirect('identitas');
        }
    }

    function delete($id)
    {
        $this->m_identitas->deleteidentitas($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            identitas telah dihapus!</div>');
        redirect('identitas');
    }
}
