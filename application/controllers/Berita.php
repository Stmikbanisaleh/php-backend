<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Berita_model', 'm_berita');
    }

    public function index()
    {
        $data['title'] = "Berita";
        $data['icon'] = "list";

        $data['berita'] = $this->m_berita->getBerita();

        $this->load->view('template/header.php');
        $this->load->view('berita/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $data['posisi'] = $this->m_berita->getPosisi();

        $this->form_validation->set_rules('id_posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        //$this->form_validation->set_rules('sub_judul', 'Sub Judul', 'required');
        // $this->form_validation->set_rules('judul_seo', 'Judul SEO', 'required');
        // $this->form_validation->set_rules('youtube', 'Youtube', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah berita";
            $this->load->view('template/header.php');
            $this->load->view('berita/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_berita->addBerita();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berita telah ditambahkan!</div>');
            redirect('Berita');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit berita";

        $data['berita'] = $this->m_berita->getberitaById($id);
        $data['posisi'] = $this->m_berita->getPosisi();
        $data['status_aktif'] = ['Ya', 'Tidak'];

        $this->form_validation->set_rules('id_posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('sub_judul', 'Sub Judul', 'required');
        $this->form_validation->set_rules('judul_seo', 'Judul SEO', 'required');
        $this->form_validation->set_rules('youtube', 'Youtube', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('berita/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_berita->editBerita();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            berita telah diubah!</div>');
            redirect('berita');
        }
    }

    function delete($id)
    {
        $this->m_berita->deleteberita($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            berita telah dihapus!</div>');
        redirect('berita');
    }
}
