<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Album extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Album_model', 'm_album');
    }

    public function index()
    {
        $data['title'] = "Album";
        $data['icon'] = "gallery";

        $data['album'] = $this->m_album->getAlbum();

        $this->load->view('template/header.php');
        $this->load->view('album/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah Gambar";
            $this->load->view('template/header.php');
            $this->load->view('album/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_album->addAlbum();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Album telah ditambahkan!</div>');
            redirect('Album');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit gambar";

        $data['album'] = $this->m_album->getalbumById($id);

        $this->form_validation->set_rules('judul_album', 'Judul Album', 'required');
        $this->form_validation->set_rules('album_seo', 'Album Seo', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('album/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_album->editalbum();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Album telah diubah!</div>');
            redirect('Album');
        }
    }

    function delete($id)
    {
        $this->m_album->deleteAlbum($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Album telah dihapus!</div>');
        redirect('Album');
    }
}
