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
        $halaman = $this->lapan_api_library->call('halaman/gethalaman', ['token' => $this->session->userdata('token')]);
        $data['halaman'] = $halaman['rows'];
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
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'judul_seo' => htmlspecialchars($this->input->post('judul_seo', true)),
                    'isi_halaman' => $this->input->post('isi_halaman', true),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'gambar' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'username' => 'admin',
                    'token' => $this->session->userdata('token')
                ];
            } else {
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'judul_seo' => htmlspecialchars($this->input->post('judul_seo', true)),
                    'isi_halaman' => $this->input->post('isi_halaman', true),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'gambar' => null,
                    'gambar_base64' => null,
                    'gambar_type' => null,
                    'username' => 'admin',
                    'token' => $this->session->userdata('token')
                ];
            }
            $insert = $this->lapan_api_library->call('halaman/addhalaman', $data);
            // print_r($insert);exit;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Halaman telah ditambahkan!</div>');
            redirect('Halaman');
        }
    }

    public function edit($id)
    {

        $data = [
            'id_halaman' => $id,
            'token' => $this->session->userdata('token')
        ];
        $gethalamanbyid = $this->lapan_api_library->call('halaman/gethalamanbyid', $data);
        $data['halaman'] = $gethalamanbyid['rows'][0];
        $data['status_aktif'] = ['Ya', 'Tidak'];
        $data['title'] = "Edit halaman";

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('judul_seo', 'Judul Seo', 'required');
        $this->form_validation->set_rules('isi_halaman', 'Isi Halaman', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('halaman/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            if (!empty($_FILES['gambar']['tmp_name']) && file_exists($_FILES['gambar']['tmp_name'])) {
                $filename = $_FILES['gambar']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['gambar']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($_FILES['gambar']['tmp_name']);
                $gambar_base64 = base64_encode($data_getcontent);

                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'judul_seo' => htmlspecialchars($this->input->post('judul_seo', true)),
                    'isi_halaman' => $this->input->post('isi_halaman', true),
                    'gambar' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'token' => $this->session->userdata('token'),
                    'id_halaman' => $id
                ];
            } else {
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'judul_seo' => htmlspecialchars($this->input->post('judul_seo', true)),
                    'isi_halaman' => $this->input->post('isi_halaman', true),
                    'gambar' => null,
                    'gambar_base64' => null,
                    'gambar_type' => null,
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'token' => $this->session->userdata('token'),
                    'id_halaman' => $id
                ];
            }
            $update = $this->lapan_api_library->call('halaman/updatehalaman', $data);
            if($update['status'] == 200){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                halaman telah diubah!</div>');
                redirect('halaman');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                halaman Gagal diubah!</div>');
                redirect('halaman');
            }
        }
    }

    function delete($id)
    {
        $response = $this->lapan_api_library->call('halaman/deletehalaman', ['token' => $this->session->userdata('token'), 'id_halaman' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            halaman telah dihapus!</div>');
        redirect('halaman');
    }
}
