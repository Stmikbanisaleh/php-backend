<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Halaman_model', 'm_halaman');
    }

    public function index()
    {
        $data['title'] = "Halaman Statis";
        $data['icon'] = "layout";

        $data['halaman'] = $this->m_halaman->getHalaman();

        $this->load->view('template/header.php');
        $this->load->view('halaman/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('judul_seo', 'Judul Seo', 'required');
        $this->form_validation->set_rules('isi_halaman', 'Isi Halaman', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah Halaman";
            $this->load->view('template/header.php');
            $this->load->view('halaman/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_halaman->addHalaman();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Halaman telah ditambahkan!</div>');
            redirect('Halaman');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit halaman";

        $data['halaman'] = $this->m_halaman->getHalamanById($id);
        $data['status_aktif'] = ['Ya', 'Tidak'];

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('judul_seo', 'Judul Seo', 'required');
        $this->form_validation->set_rules('isi_halaman', 'Isi Halaman', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('halaman/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_halaman->edithalaman();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            halaman telah diubah!</div>');
            redirect('halaman');
        }
    }

    function delete($id)
    {
        $this->m_halaman->deletehalaman($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            halaman telah dihapus!</div>');
        redirect('halaman');
    }
}
