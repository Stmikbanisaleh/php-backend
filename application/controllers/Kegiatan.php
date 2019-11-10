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
        $kegiatan = $this->lapan_api_library->call('kegiatan/getkegiatan', ['token' => $this->session->userdata('token')]);
        $data['kegiatan'] = $kegiatan[0];
        $this->load->view('template/header.php');
        $this->load->view('kegiatan/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {

        $posisi = $this->lapan_api_library->call('kegiatan/getposisi', ['token' => $this->session->userdata('token')]);
        $data['posisi'] = $posisi[0];

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
            if (!empty($_FILES['gambar']['tmp_name']) && file_exists($_FILES['gambar']['tmp_name'])) {
                $filename = $_FILES['gambar']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['gambar']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($_FILES['gambar']['tmp_name']);
                $gambar_base64 = base64_encode($data_getcontent);

                $data = [
                    'id_posisi' => $this->input->post('id_posisi', true),
                    'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
                    'tempat' => htmlspecialchars($this->input->post('tempat', true)),
                    'gambar' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
                    'token' => $this->session->userdata('token')
                ];
            } else {
                $data = [
                    'id_posisi' => $this->input->post('id_posisi', true),
                    'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
                    'tempat' => htmlspecialchars($this->input->post('tempat', true)),
                    'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
                    'token' => $this->session->userdata('token')
                ];
            }

            $insert = $this->lapan_api_library->call('kegiatan/addkegiatan', $data);
            if ($insert['status'] == 200) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                kegiatan telah ditambahkan!</div>');
                redirect('kegiatan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                kegiatan Gagal ditambahkan!</div>');
                redirect('kegiatan');
            }
        }
    }

    public function edit($id)
    {
        $data = [
            'id_kegiatan' => $id,
            'token' => $this->session->userdata('token')
        ];
        $posisi = $this->lapan_api_library->call('kegiatan/getposisi', ['token' => $this->session->userdata('token')]);
        $getkegiatanbyid = $this->lapan_api_library->call('kegiatan/getkegiatanbyid', $data);
        $data['title'] = "Edit kegiatan";

        $data['kegiatan'] = $getkegiatanbyid['rows'][0];
        $data['posisi'] = $posisi[0];
        $data['status_aktif'] = ['Ya', 'Tidak'];

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header.php');
            $this->load->view('kegiatan/edit', $data);
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
                    'id_posisi' => $this->input->post('id_posisi', true),
                    'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
                    'tempat' => htmlspecialchars($this->input->post('tempat', true)),
                    'gambar' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'tanggal' => $this->input->post('tanggal'),
                    'token' => $this->session->userdata('token'),
                    'id_kegiatan' => $id
                ];
            } else {
                $data = [
                    'id_posisi' => $this->input->post('id_posisi', true),
                    'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
                    'tempat' => htmlspecialchars($this->input->post('tempat', true)),
                    'tanggal' => $this->input->post('tanggal'),
                    'token' => $this->session->userdata('token'),
                    'id_kegiatan' => $id
                ];
            }
            $update = $this->lapan_api_library->call('kegiatan/updatekegiatan', $data);
            if ($update['status'] == 200) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                kegiatan telah diubah!</div>');
                redirect('kegiatan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                kegaitan Gagal diubah!</div>');
                redirect('kegiatan');
            }
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_kegiatan' => $id
        ];
        $kegiatan = $this->lapan_api_library->call('kegiatan/deletekegiatan', $data);
        if ($kegiatan['status'] == 200) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kegiatan telah dihapus!</div>');
            redirect('berita');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Kegiatan gagal dihapus!</div>');
            redirect('berita');
        }
    }
}
