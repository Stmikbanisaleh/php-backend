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
        $agenda = $this->lapan_api_library->call('agenda/getagenda', ['token' => $this->session->userdata('token')]);
        $data['agenda'] = $agenda[0];

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
            if (!empty($_FILES['foto']['tmp_name']) && file_exists($_FILES['foto']['tmp_name'])) {
                $filename = $_FILES['foto']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['foto']['name'];
                $ext = explode('.', $type);
				$type = end($ext);
                $data_getcontent = file_get_contents($_FILES['foto']['tmp_name']);
                $gambar_base64 = base64_encode($data_getcontent);
                
                $data = [
                    'nama_agenda' => htmlspecialchars($this->input->post('nama_agenda', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'tanggal_awal' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
                    'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
                    'foto' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'token' => $this->session->userdata('token')
                ];
            } else {
                $data = [
                    'nama_agenda' => htmlspecialchars($this->input->post('nama_agenda', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'tanggal_awal' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
                    'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
                    'token' => $this->session->userdata('token')
                ];
            }

            $insert = $this->lapan_api_library->call('agenda/addagenda', $data);
            if($insert['status'] == 200){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Agenda telah ditambahkan!</div>');
                redirect('agenda');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Agenda Gagal ditambahkan!</div>');
                redirect('agenda');
            }
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit agenda";
        $agenda = $this->lapan_api_library->call('agenda/getagendabyid', ['token' => $this->session->userdata('token'),'id_agenda' => $id]);
        $data['agenda'] = $agenda['rows'][0];
        $this->form_validation->set_rules('nama_agenda', 'Nama agenda', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header.php');
            $this->load->view('agenda/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            if (!empty($_FILES['foto']['tmp_name']) && file_exists($_FILES['foto']['tmp_name'])) {
                $filename = $_FILES['foto']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $type = $_FILES['foto']['name'];
                $ext = explode('.', $type);
                $type = end($ext);
                $data_getcontent = file_get_contents($_FILES['foto']['tmp_name']);
                $gambar_base64 = base64_encode($data_getcontent);
                $data = [
                    'nama_agenda' => htmlspecialchars($this->input->post('nama_agenda', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'tanggal_awal' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
                    'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
                    'foto' => $this-> $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'token' => $this->session->userdata('token'),
                    'id_agenda' => $id
                ];
            } else {
                $data = [
                    'nama_agenda' => htmlspecialchars($this->input->post('nama_agenda', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'tanggal_awal' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
                    'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
                    'token' => $this->session->userdata('token'),
                    'id_agenda' => $id
                ];
            }
            $update = $this->lapan_api_library->call('agenda/updateagenda', $data);
            if ($update['status'] == 200) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Agenda telah diubah!</div>');
                redirect('agenda');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                kegaitan Gagal diubah!</div>');
                redirect('agenda');
            }
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_agenda' => $id
        ];
        $agenda = $this->lapan_api_library->call('agenda/deleteagenda', $data);
        if ($agenda['status'] == 200) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Agenda telah dihapus!</div>');
            redirect('agenda');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Agenda gagal dihapus!</div>');
            redirect('agenda');
        }
    }
}
