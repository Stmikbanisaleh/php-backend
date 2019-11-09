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

        $data['menu'] = $this->m_menu->getMenu();
        $data['parentname'] = $this->m_menu->getParentName();

        $this->load->view('template/header.php');
        $this->load->view('menu/index', $data);
        $this->load->view('template/footer.php');
    }

    public function add()
    {
        $data['parent'] = $this->m_menu->getParentMenu();
        $data['posisi'] = $this->m_menu->getPosisi();

        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['title'] = "Tambah Menu";
            $this->load->view('template/header.php');
            $this->load->view('menu/add', $data);
            $this->load->view('template/footer.php');
        } else {
            $this->m_menu->addMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu telah ditambahkan!</div>');
            redirect('Menu');
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
        $this->m_menu->deleteMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu telah dihapus!</div>');
        redirect('Menu');
    }
}
