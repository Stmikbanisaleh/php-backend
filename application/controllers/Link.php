<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Link_model', 'm_link');
    }

    public function index()
    {
        $data['title'] = "Link Terkait";
        $data['icon'] = "link";

        $data['link'] = $this->m_link->getLink();

        $this->load->view('template/header.php');
        $this->load->view('link/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url_web', 'URL Web', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah link";
            $this->load->view('template/header.php');
            $this->load->view('link/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_link->addLink();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link Terkait telah ditambahkan!</div>');
            redirect('Link');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit Link Terkait";

        $data['link'] = $this->m_link->getLinkById($id);

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url_web', 'URL Web', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('link/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_link->editLink();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link Terkait telah diubah!</div>');
            redirect('Link');
        }
    }

    function delete($id)
    {
        $this->m_link->deleteLink($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link terkait telah dihapus!</div>');
        redirect('Link');
    }
}
