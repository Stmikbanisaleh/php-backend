<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Berita_model', 'm_berita');
    }

    public function index()
    {
        $data['title'] = "Berita";
        $data['icon'] = "list";
        $berita = $this->lapan_api_library->call('berita/getberita', ['token' => $this->session->userdata('token')]);
        $data['berita'] = $berita[0];

        $this->load->view('template/header.php');
        $this->load->view('berita/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $posisi = $this->lapan_api_library->call('berita/getposisi', ['token' => $this->session->userdata('token')]);
        $data['posisi'] = $posisi[0];
        $this->form_validation->set_rules('id_posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah berita";
            $this->load->view('template/header.php');
            $this->load->view('berita/add', $data);
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
                    'username' => $this->session->userdata('name'),
                    'id_posisi' => $this->input->post('id_posisi', true),
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'sub_judul' => htmlspecialchars($this->input->post('sub_judul', true)),
                    'youtube' => htmlspecialchars($this->input->post('youtube', true)),
                    'judul_seo' => $this->_judulSeo(),
                    'isi_berita' => $this->input->post('isi_berita', true),
                    'gambar' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'keterangan_gambar' => htmlspecialchars($this->input->post('keterangan_gambar', true)),
                    'tanggal' => date('Y-m-d h:i:s'),
                    'token' => $this->session->userdata('token')
                ];
                // print_r($data);exit;
            } else {
                $data = [
                    'username' => $this->session->userdata('name'),
                    'id_posisi' => $this->input->post('id_posisi', true),
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'sub_judul' => htmlspecialchars($this->input->post('sub_judul', true)),
                    'youtube' => htmlspecialchars($this->input->post('youtube', true)),
                    'judul_seo' => $this->_judulSeo(),
                    'isi_berita' => $this->input->post('isi_berita', true),
                    'gambar' => null,
                    'gambar_base64' => null,
                    'gambar_type' => null,
                    'keterangan_gambar' => htmlspecialchars($this->input->post('keterangan_gambar', true)),
                    'tanggal' => date('Y-m-d h:i:s'),
                    'token' => $this->session->userdata('token')
                ];
            }

            $insert = $this->lapan_api_library->call('berita/addberita', $data);
            if($insert['status'] == 200){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berita telah ditambahkan!</div>');
                redirect('Berita');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Berita gagal ditambahkan!</div>');
                redirect('Berita');
            }
           
        }
    }

    public function edit($id)
    {
        $posisi = $this->lapan_api_library->call('berita/getposisi', ['token' => $this->session->userdata('token')]);
        $berita = $this->lapan_api_library->call('berita/getberitabyid', ['token' => $this->session->userdata('token'),'id_berita' => $id]);

        $data['title'] = "Edit berita";

        $data['berita'] = $berita['rows'][0];
        $data['posisi'] =  $posisi[0];
        
        $data['status_aktif'] = ['Ya', 'Tidak'];

        $this->form_validation->set_rules('id_posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('sub_judul', 'Sub Judul', 'required');
        $this->form_validation->set_rules('judul_seo', 'Judul SEO', 'required');
        $this->form_validation->set_rules('youtube', 'Youtube', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('berita/edit', $data);
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
                    'username' => $this->session->userdata('name'),
                    'id_posisi' => $this->input->post('id_posisi', true),
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'sub_judul' => htmlspecialchars($this->input->post('sub_judul', true)),
                    'youtube' => htmlspecialchars($this->input->post('youtube', true)),
                    'judul_seo' => $this->_judulSeo(),
                    'isi_berita' => $this->input->post('isi_berita', true),
                    'gambar' => $filename,
                    'gambar_base64' => $gambar_base64,
                    'gambar_type' => $type,
                    'keterangan_gambar' => htmlspecialchars($this->input->post('keterangan_gambar', true)),
                    'tanggal' => date('Y-m-d h:i:s'),
                    'token' => $this->session->userdata('token'),
                    'id_berita' => $id
                ]; 
            } else {
                $data = [
                    'username' => $this->session->userdata('name'),
                    'id_posisi' => $this->input->post('id_posisi', true),
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'sub_judul' => htmlspecialchars($this->input->post('sub_judul', true)),
                    'youtube' => htmlspecialchars($this->input->post('youtube', true)),
                    'judul_seo' => $this->_judulSeo(),
                    'isi_berita' => $this->input->post('isi_berita', true),
                    'gambar' => null,
                    'gambar_base64' => null,
                    'gambar_type' => null,
                    'keterangan_gambar' => htmlspecialchars($this->input->post('keterangan_gambar', true)),
                    'tanggal' => date('Y-m-d h:i:s'),
                    'token' => $this->session->userdata('token'),
                    'id_berita' => $id,

                ];
            }
            $update = $this->lapan_api_library->call('berita/updateberita', $data);
            if($update['status'] == 200){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                berita telah diubah!</div>');
                redirect('berita');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                berita gagal diubah!</div>');
                redirect('berita');
            }
       
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_berita' => $id
        ];
        $berita = $this->lapan_api_library->call('berita/deleteberita', $data);
        if ($berita['status'] == 200) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            berita telah dihapus!</div>');
            redirect('berita');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            berita gagal dihapus!</div>');
            redirect('berita');
        }
    }

    private function _judulSeo()
    {
        $seo = htmlspecialchars($this->input->post('judul', true));
        $repseo = preg_replace('/\s+/', '_', $seo);
        $tgl = date('dmY');
        $judulseo = $repseo . '_' . $tgl;

        return $judulseo;
    }
}
