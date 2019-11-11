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

        $link = $this->lapan_api_library->call('link/getlink', ['token' => $this->session->userdata('token')]);
        $data['link'] = $link['rows'];

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
            $file_tmp = $_FILES['logo']['tmp_name'];

            if (!empty($file_tmp) && file_exists($file_tmp)) {
                $filename = $_FILES['logo']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['logo']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($file_tmp);
                $file_base64 = base64_encode($data_getcontent);

                $data = [
                    'kategori' => htmlspecialchars($this->input->post('kategori', true)),
                    'nama_link' => htmlspecialchars($this->input->post('nama_link', true)),
                    'url_web' => htmlspecialchars($this->input->post('url_web', true)),
                    'logo' => $filename,
                    'file_base64' => $file_base64,
                    'file_type' => $type,
                    'token' => $this->session->userdata('token')
                ];
            }else{
                $data = [
                    'kategori' => htmlspecialchars($this->input->post('kategori', true)),
                    'nama_link' => htmlspecialchars($this->input->post('nama_link', true)),
                    'url_web' => htmlspecialchars($this->input->post('url_web', true)),
                    'logo' => null,
                    'file_base64' => null,
                    'file_type' => null,
                    'token' => $this->session->userdata('token')
                ];
            }

            $insert = $this->lapan_api_library->call('link/addlink', $data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link Terkait telah ditambahkan!</div>');
            redirect('Link');
        }
    }

    public function edit($id)
    {
        $data = [
                'token' => $this->session->userdata('token'),
                'id_link' => $id,
            ];

        $getbyid = $this->lapan_api_library->call('link/getlinkbyid', $data);
        $data['link'] = $getbyid['rows'][0];

        $data['title'] = "Edit Link Terkait";

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url_web', 'URL Web', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('link/edit', $data);
            $this->load->view('template/footer.php');
        } else {

             $file_tmp = $_FILES['logo']['tmp_name'];

            if ($file_tmp) {
                $filename = $_FILES['logo']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['logo']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($file_tmp);
                $file_base64 = base64_encode($data_getcontent);

                $data = [
                    'kategori' => htmlspecialchars($this->input->post('kategori', true)),
                    'nama_link' => htmlspecialchars($this->input->post('nama_link', true)),
                    'url_web' => htmlspecialchars($this->input->post('url_web', true)),
                    'logo' => $filename,
                    'file_base64' => $file_base64,
                    'file_type' => $type,
                    'token' => $this->session->userdata('token'),
                    'id_link' => $this->input->post('id_link')
                ];
            }else{
                $data = [
                    'kategori' => htmlspecialchars($this->input->post('kategori', true)),
                    'nama_link' => htmlspecialchars($this->input->post('nama_link', true)),
                    'url_web' => htmlspecialchars($this->input->post('url_web', true)),
                    'token' => $this->session->userdata('token'),
                    'id_link' => $this->input->post('id_link')
                ];
            }

            $update = $this->lapan_api_library->call('link/updatelink', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link Terkait telah diubah!</div>');
            redirect('Link');
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_link' => $id,
        ];

        $delete = $this->lapan_api_library->call('link/deletelink', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link terkait telah dihapus!</div>');
        redirect('Link');
    }
}
