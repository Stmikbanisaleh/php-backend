<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Menu_model', 'm_menu');
    }

    public function index()
    {
        $data['title'] = "Menu";
        $data['icon'] = "menu";
        $menu = $this->lapan_api_library->call('menu/getmenu', ['token' => $this->session->userdata('token')]);
        $parentmenu = $this->lapan_api_library->call('menu/getparentmenu', ['token' => $this->session->userdata('token')]);
        $data['menu'] = $menu[0];
        $data['parentname'] = $parentmenu[0];

        $this->load->view('template/header.php');
        $this->load->view('menu/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $posisi = $this->lapan_api_library->call('menu/getposisi', ['token' => $this->session->userdata('token')]);
        $parentmenu = $this->lapan_api_library->call('menu/getparentmenu', ['token' => $this->session->userdata('token')]);
        $data['parent'] = $parentmenu[0];
        $data['posisi'] = $posisi[0];

        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah Menu";
            $this->load->view('template/header.php');
            $this->load->view('menu/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $data = [
                'id_posisi' => $this->input->post('id_posisi', true),
                'id_parent' => $this->input->post('id_parent', true),
                'nama_menu' => htmlspecialchars($this->input->post('nama_menu', true)),
                'link' => htmlspecialchars($this->input->post('link', true)),
                'punya_sub' => $this->input->post('punya_sub', true),
                'status_aktif' => $this->input->post('status_aktif', true),
                'urutan' => htmlspecialchars($this->input->post('urutan', true)),
                'token' => $this->session->userdata('token', true),
            ];
            $insert = $this->lapan_api_library->call('menu/addmenu', $data);
            // print_r(json_encode($insert));exit;
            if ($insert['status'] == 200) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Menu telah ditambahkan!</div>');
                redirect('Menu');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Menu gagal ditambahkan!</div>');
                redirect('Menu');
            }
        }
    }

    public function edit($id)
    {

        $data['title'] = "Edit Menu";

        $data['menu'] = $this->m_menu->getMenuById($id);
        $data['status_aktif'] = ['Ya', 'Tidak'];
        $data['sub_menu'] = ['Ya', 'Tidak'];
        $data['posisi'] = $this->m_menu->getPosisi();

        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header.php');
            $this->load->view('menu/edit', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_menu->editMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu telah diubah!</div>');
            redirect('Menu');
        }
    }

    function delete($id)
    {
        $data = [
            'token' => $this->session->userdata('token'),
            'id_menu' => $id
        ];
        $delete = $this->lapan_api_library->call('menu/deletemenu', $data);
        if ($delete['status'] == 200) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu telah dihapus!</div>');
            redirect('Menu');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Menu Gagal dihapus!</div>');
            redirect('Menu');
        }
    }
}
