<?php

defined('BASEPATH') or exit('No script direct access allowed');

class Sop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Sop_model', 'm_sop');
    }

    public function index()
    {
        $data['title'] = "SOP";
        $data['icon'] = "file";

        $sop = $this->lapan_api_library->call('sop/getsop', ['token' => $this->session->userdata('token')]);
        $data['sop'] = $sop['rows'];

        $this->load->view('template/header');
        $this->load->view('sop/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nama_judul', 'Nama Judul', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah SOP";
            $this->load->view('template/header.php');
            $this->load->view('sop/add', $data);
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
                    'nama_judul' => htmlspecialchars($this->input->post('nama_judul', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'nama_file' => $filename,
                    'file_base64' => $file_base64,
                    'file_type' => $type,
                    'token' => $this->session->userdata('token')
                ];
            }else{
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'nama_judul' => htmlspecialchars($this->input->post('nama_judul', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'nama_file' => null,
                    'file_base64' => null,
                    'file_type' => null,
                    'token' => $this->session->userdata('token')
                ];
            }

            $insert = $this->lapan_api_library->call('sop/addsop', $data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP telah ditambahkan!</div>');
            redirect('sop');
        }
    }

    public function edit($id)
    {

        $data = [
                'token' => $this->session->userdata('token'),
                'id_sop' => $id,
            ];

        $getbyid = $this->lapan_api_library->call('sop/getsopbyid', $data);
        $data['sop'] = $getbyid['rows'][0];

        $data['title'] = "Edit sop";

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nama_judul', 'Nama Judul', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('sop/edit', $data);
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
                    'nama_judul' => htmlspecialchars($this->input->post('nama_judul', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'nama_file' => $filename,
                    'file_base64' => $file_base64,
                    'file_type' => $type,
                    'token' => $this->session->userdata('token'),
                    'id_sop' => $this->input->post('id_sop'),
                ];
            }else{
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'nama_judul' => htmlspecialchars($this->input->post('nama_judul', true)),
                    'tgl_posting' => date('Y-m-d h:i:s'),
                    'token' => $this->session->userdata('token'),
                    'id_sop' => $this->input->post('id_sop'),
                ];
            }

            $update = $this->lapan_api_library->call('sop/updatesop', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP telah diubah!</div>');
            redirect('sop');
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_sop' => $id,
        ];

        $delete = $this->lapan_api_library->call('sop/deletesop', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP telah dihapus!</div>');
        redirect('sop');
    }
}
