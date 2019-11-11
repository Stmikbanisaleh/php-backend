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

        $identitas = $this->lapan_api_library->call('identitas/getidentitas', ['token' => $this->session->userdata('token')]);
        $data['identitas'] = $identitas['rows'];

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
            $data = [
                'token' => $this->session->userdata('token'),
                'nama_website' => htmlspecialchars($this->input->post('nama_website', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'satker' => htmlspecialchars($this->input->post('satker', true)),
                'facebook' => htmlspecialchars($this->input->post('facebook', true)),
                'google' => htmlspecialchars($this->input->post('google', true)),
                'twitter' => htmlspecialchars($this->input->post('twitter', true)),
                'rekening' => htmlspecialchars($this->input->post('rekening', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'meta_deskripsi' => htmlspecialchars($this->input->post('meta_deskripsi', true)),
                'meta_keyword' => htmlspecialchars($this->input->post('meta_keyword', true)),
                'favicon' => htmlspecialchars($this->input->post('favicon', true)),
            ];

            $insert = $this->lapan_api_library->call('identitas/addidentitas', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            identitas telah ditambahkan!</div>');
            redirect('identitas');
        }
    }

    public function edit($id)
    {
        $data = [
                'token' => $this->session->userdata('token'),
                'id_identitas' => $id,
            ];

        $getbyid = $this->lapan_api_library->call('identitas/getidentitasbyid', $data);
        $data['identitas'] = $getbyid['rows'][0];

        $data['title'] = "Edit identitas";

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
            $data = [
                'token' => $this->session->userdata('token'),
                'nama_website' => htmlspecialchars($this->input->post('nama_website', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'satker' => htmlspecialchars($this->input->post('satker', true)),
                'facebook' => htmlspecialchars($this->input->post('facebook', true)),
                'google' => htmlspecialchars($this->input->post('google', true)),
                'twitter' => htmlspecialchars($this->input->post('twitter', true)),
                'rekening' => htmlspecialchars($this->input->post('rekening', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'meta_deskripsi' => htmlspecialchars($this->input->post('meta_deskripsi', true)),
                'meta_keyword' => htmlspecialchars($this->input->post('meta_keyword', true)),
                'favicon' => htmlspecialchars($this->input->post('favicon', true)),
                'id_identitas' => $this->input->post('id_identitas'),
            ];

            $update = $this->lapan_api_library->call('identitas/updateidentitas', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            identitas telah diubah!</div>');
            redirect('identitas');
        }
    }

    function delete($id)
    {
        $data = [
                'token' => $this->session->userdata('token'),
                'id_identitas' => $id,
            ];

        $delete = $this->lapan_api_library->call('identitas/deleteidentitas', $data);


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            identitas telah dihapus!</div>');
        redirect('identitas');
    }
}
