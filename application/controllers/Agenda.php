<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('agenda_model', 'm_agenda');
    }

    public function index()
    {
        $data['title'] = "Agenda";
        $data['icon'] = "extension";

        $data['agenda'] = $this->m_agenda->getagenda();

        $this->load->view('template/header.php');
        $this->load->view('agenda/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_agenda', 'Nama Agenda', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah agenda";
            $this->load->view('template/header.php');
            $this->load->view('agenda/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_agenda->addagenda();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            agenda telah ditambahkan!</div>');
            redirect('agenda');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit agenda";

        $data['agenda'] = $this->m_agenda->getagendaById($id);

        $this->form_validation->set_rules('nama_agenda', 'Nama agenda', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('agenda/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_agenda->editagenda();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            agenda telah diubah!</div>');
            redirect('agenda');
        }
    }

    function delete($id)
    {
        $this->m_agenda->deleteagenda($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            agenda telah dihapus!</div>');
        redirect('agenda');
    }
}
