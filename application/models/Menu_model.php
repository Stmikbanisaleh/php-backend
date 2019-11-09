<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getMenu()
    {
        $query = "SELECT `menu`.*, `posisi`.`nama_web`
        FROM `menu`
        JOIN `posisi` ON `menu`.`id_posisi` = `posisi`.`id_posisi`";
        return $this->db->query($query)->result_array();
    }

    public function getParentMenu()
    {
        return $this->db->query("SELECT id_menu,nama_menu FROM menu WHERE id_parent ='' AND punya_sub = 'Ya' ")->result_array();
    }

    public function getParentName()
    {
        return $this->db->query("SELECT id_menu,nama_menu FROM menu")->result_array();
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('menu', array('id_menu' => $id))->row_array();
    }

    public function getPosisi()
    {
        $query = "SELECT * FROM posisi";
        return $this->db->query($query)->result_array();
    }

    public function addMenu()
    {
        $data = [
            'id_posisi' => $this->input->post('id_posisi', true),
            'id_parent' => $this->input->post('id_parent', true),
            'nama_menu' => htmlspecialchars($this->input->post('nama_menu', true)),
            'link' => htmlspecialchars($this->input->post('link', true)),
            'punya_sub' => $this->input->post('punya_sub', true),
            'status_aktif' => $this->input->post('status_aktif', true),
            'urutan' => htmlspecialchars($this->input->post('urutan', true))
        ];

        $this->db->insert('menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil ditambah</div>');
        redirect('menu');
    }

    public function editMenu()
    {
        $data = [
            'id_posisi' => $this->input->post('id_posisi', true),
            'id_parent' => $this->input->post('id_parent', true),
            'nama_menu' => htmlspecialchars($this->input->post('nama_menu', true)),
            'link' => htmlspecialchars($this->input->post('link', true)),
            'punya_sub' => $this->input->post('punya_sub', true),
            'status_aktif' => $this->input->post('status_aktif', true),
            'urutan' => htmlspecialchars($this->input->post('urutan', true))
        ];
        var_dump($data);

        $this->db->where('id_menu', $this->input->post('id_menu'));
        $this->db->update('menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil diubah</div>');
        redirect('menu');
    }

    public function deleteMenu($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil dihapus</div>');
        redirect('menu');
    }
}
