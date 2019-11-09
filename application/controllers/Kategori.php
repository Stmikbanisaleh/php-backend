<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Kategori_model', 'm_kategori');
    }

    public function index()
    {
        $data['title'] = "Kategori";
        $data['icon'] = "grid-4";

        $data['kategori'] = $this->m_kategori->getKategori();

        $this->load->view('template/header.php');
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('kategori_seo', 'Kategori Seo', 'required');
        $this->form_validation->set_rules('aktif', 'Aktif', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah Kategori";
            $this->load->view('template/header.php');
            $this->load->view('kategori/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_kategori->addkategori();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            kategori telah ditambahkan!</div>');
            redirect('Kategori');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit Kategori";

        $data['kategori'] = $this->m_kategori->getKategoriById($id);
        $data['aktif'] = ['Ya', 'Tidak'];

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('kategori_seo', 'Kategori Seo', 'required');
        $this->form_validation->set_rules('aktif', 'Aktif', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('kategori/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_kategori->editKategori();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kategori telah diubah!</div>');
            redirect('Kategori');
        }
    }

    function delete($id)
    {
        $this->m_kategori->deletekategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kategori telah dihapus!</div>');
        redirect('Kategori');
    }
}
