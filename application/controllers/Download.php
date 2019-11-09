<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Download_model', 'm_download');
    }

    public function index()
    {
        $data['title'] = "Download";
        $data['icon'] = "download";

        $data['download'] = $this->m_download->getDownload();

        $this->load->view('template/header.php');
        $this->load->view('download/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah File";
            $this->load->view('template/header.php');
            $this->load->view('download/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_download->addDownload();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            File telah ditambahkan!</div>');
            redirect('Download');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit Download";

        $data['download'] = $this->m_download->getDownloadById($id);

        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('download/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_download->editDownload();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            File telah diubah!</div>');
            redirect('Download');
        }
    }

    function delete($id)
    {
        $this->m_download->deleteDownload($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            File telah dihapus!</div>');
        redirect('Download');
    }
}
