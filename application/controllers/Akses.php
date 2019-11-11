<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Akses_model', 'm_akses');
    }

    public function index()
    {
        $data['title'] = "Akses Cepat";
        $data['icon'] = "bookmark";

        $data['akses'] = $this->m_akses->getAkses();

        $this->load->view('template/header.php');
        $this->load->view('akses/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah akses";
            $this->load->view('template/header.php');
            $this->load->view('akses/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $data = [
                'token' => $this->session->userdata('token'),
                'nama_link' => htmlspecialchars($this->input->post('nama_link', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
            ];

            $insert = $this->lapan_api_library->call('aksescepat/addaksescepat', $data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses Cepat telah ditambahkan!</div>');
            redirect('akses');
        }
    }

    public function edit($id)
    {
        $data = [
                'token' => $this->session->userdata('token'),
                'id_akses' => $id,
            ];

        $getbyid = $this->lapan_api_library->call('aksescepat/getaksescepatbyid', $data);
        $data['akses'] = $getbyid['rows'][0];

        $data['title'] = "Edit Akses Cepat";

        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('akses/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $data = [
                'token' => $this->session->userdata('token'),
                'nama_link' => htmlspecialchars($this->input->post('nama_link', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'id_akses' => $this->input->post('id_akses'),
            ];

            $update = $this->lapan_api_library->call('aksescepat/updateaksescepat', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses Cepat telah diubah!</div>');
            redirect('akses');
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_akses' => $id,
        ];

        $delete = $this->lapan_api_library->call('aksescepat/deleteaksescepat', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses Cepat telah dihapus!</div>');
        redirect('akses');
    }
}
