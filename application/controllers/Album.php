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

        $album = $this->lapan_api_library->call('album/getalbum', ['token' => $this->session->userdata('token')]);
        $data['album'] = $album['rows'];

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
            $file_tmp = $_FILES['gambar']['tmp_name'];
            if (!empty($_FILES['gambar']['tmp_name']) && file_exists($_FILES['gambar']['tmp_name'])) {
                $filename = $_FILES['gambar']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['gambar']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($_FILES['gambar']['tmp_name']);
                $gambar_base64 = base64_encode($data_getcontent);
                
                $data = [
                    'judul_album' => htmlspecialchars($this->input->post('judul_album', true)),
                    'album_seo' => htmlspecialchars($this->input->post('album_seo', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'username' => 'admin',
                    'gambar' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'username' => 'admin',
                    'token' => $this->session->userdata('token')
                ];
                // print_r($data);exit;
            } else {
                $data = [
                    'judul_album' => htmlspecialchars($this->input->post('judul_album', true)),
                    'album_seo' => htmlspecialchars($this->input->post('album_seo', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'username' => 'admin',
                    'gambar' => null,
                    'gambar_base64' => null,
                    'gambar_type' => null,
                    'username' => 'admin',
                    'token' => $this->session->userdata('token')
                ];
            }
            $insert = $this->lapan_api_library->call('album/addalbum', $data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Album telah ditambahkan!</div>');
            redirect('Album');
        }
    }

    public function edit($id)
    {
        $data = [
                'token' => $this->session->userdata('token'),
                'id_album' => $id,
            ];

        $getbyid = $this->lapan_api_library->call('album/getalbumbyid', $data);
        $data['album'] = $getbyid['rows'][0];

        $data['title'] = "Edit gambar";

        $this->form_validation->set_rules('judul_album', 'Judul Album', 'required');
        $this->form_validation->set_rules('album_seo', 'Album Seo', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('album/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $file_tmp = $_FILES['gambar']['tmp_name'];
            if (!empty($_FILES['gambar']['tmp_name']) && file_exists($_FILES['gambar']['tmp_name'])) {
                $filename = $_FILES['gambar']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['gambar']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($_FILES['gambar']['tmp_name']);
                $gambar_base64 = base64_encode($data_getcontent);
                
                $data = [
                    'judul_album' => htmlspecialchars($this->input->post('judul_album', true)),
                    'album_seo' => htmlspecialchars($this->input->post('album_seo', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'username' => 'admin',
                    'gambar' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'username' => 'admin',
                    'token' => $this->session->userdata('token'),
                    'id_album' => $this->input->post('id_album'),
                ];
            } else {
                $data = [
                    'judul_album' => htmlspecialchars($this->input->post('judul_album', true)),
                    'album_seo' => htmlspecialchars($this->input->post('album_seo', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'username' => 'admin',
                    'gambar' => null,
                    'gambar_base64' => null,
                    'gambar_type' => null,
                    'username' => 'admin',
                    'token' => $this->session->userdata('token'),
                    'id_album' => $this->input->post('id_album'),
                ];
            }
            $update = $this->lapan_api_library->call('album/updatealbum', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Album telah diubah!</div>');
            redirect('Album');
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_album' => $id,
        ];

        $delete = $this->lapan_api_library->call('album/deletealbum', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Album telah dihapus!</div>');
        redirect('Album');
    }
}
