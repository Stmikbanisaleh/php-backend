<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Download_model', 'm_download');
    }

    public function index()
    {
        $data['title'] = "Download";
        $data['icon'] = "download";

        $download = $this->lapan_api_library->call('download/getdownload', ['token' => $this->session->userdata('token')]);
        $data['download'] = $download['rows'];

        $this->load->view('template/header.php');
        $this->load->view('download/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah File";
            $this->load->view('template/header.php');
            $this->load->view('download/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $file_tmp = $_FILES['nama_file']['tmp_name'];

            if (!empty($file_tmp) && file_exists($file_tmp)) {
                $filename = $_FILES['nama_file']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['nama_file']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($file_tmp);
                $file_base64 = base64_encode($data_getcontent);

                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'hits' => 1,
                    'nama_file' => $filename,
                    'file_base64' => $file_base64,
                    'file_type' => $type,
                    'token' => $this->session->userdata('token'),
                ];
            }else{
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'hits' => 1,
                    'nama_file' => null,
                    'file_base64' => null,
                    'file_type' => null,
                    'token' => $this->session->userdata('token'),
                ];
            }

            $insert = $this->lapan_api_library->call('download/adddownload', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            File telah ditambahkan!</div>');
            redirect('Download');
        }
    }

    public function edit($id)
    {
        $data = [
                'token' => $this->session->userdata('token'),
                'id_download' => $id,
            ];

        $getbyid = $this->lapan_api_library->call('download/getdownloadbyid', $data);
        $data['download'] = $getbyid['rows'][0];

        $data['title'] = "Edit Download";

        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('download/edit', $data);
            $this->load->view('template/footer.php');
        } else {
             $file_tmp = $_FILES['nama_file']['tmp_name'];

            if (!empty($file_tmp) && file_exists($file_tmp)) {
                $filename = $_FILES['nama_file']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['nama_file']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($file_tmp);
                $file_base64 = base64_encode($data_getcontent);

                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'hits' => 1,
                    'nama_file' => $filename,
                    'file_base64' => $file_base64,
                    'file_type' => $type,
                    'token' => $this->session->userdata('token'),
                    'id_download' => $this->input->post('id_download'),
                ];
            }else{
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'hits' => 1,
                    'token' => $this->session->userdata('token'),
                    'id_download' => $this->input->post('id_download'),
                ];
            }

            $update = $this->lapan_api_library->call('download/updatedownload', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            File telah diubah!</div>');
            redirect('Download');
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_download' => $id,
        ];

        $delete = $this->lapan_api_library->call('download/deletedownload', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            File telah dihapus!</div>');
        redirect('Download');
    }
}
