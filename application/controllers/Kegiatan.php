<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('kegiatan_model', 'm_kegiatan');
    }

    public function index()
    {
        $data['title'] = "Kegiatan";
        $data['icon'] = "extension";

        $data['kegiatan'] = $this->m_kegiatan->getKegiatan();

        $this->load->view('template/header.php');
        $this->load->view('kegiatan/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $data['posisi'] = $this->m_kegiatan->getPosisi();

        $this->form_validation->set_rules('id_posisi', 'Posisi Web', 'required');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah kegiatan";
            $this->load->view('template/header.php');
            $this->load->view('kegiatan/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_kegiatan->addkegiatan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            kegiatan telah ditambahkan!</div>');
            redirect('kegiatan');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit kegiatan";

        $data['kegiatan'] = $this->m_kegiatan->getkegiatanById($id);
        $data['posisi'] = $this->m_kegiatan->getPosisi();
        $data['status_aktif'] = ['Ya', 'Tidak'];

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('kegiatan/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_kegiatan->editkegiatan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kegiatan telah diubah!</div>');
            redirect('kegiatan');
        }
    }

    function delete($id)
    {
        $this->m_kegiatan->deletekegiatan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            kegiatan telah dihapus!</div>');
        redirect('kegiatan');
    }
}
