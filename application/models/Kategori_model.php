<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('kategori', array('id_kategori' => $id))->row_array();
    }

    public function addKategori()
    {
        $data = [
            'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'kategori_seo' => htmlspecialchars($this->input->post('kategori_seo', true)),
            'aktif' => $this->input->post('aktif', true)
        ];

        $this->db->insert('kategori', $data);
        redirect('Kategori');
    }

    public function editKategori()
    {
        $data = [
            'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'kategori_seo' => htmlspecialchars($this->input->post('kategori_seo', true)),
            'aktif' => $this->input->post('aktif', true)
        ];
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('kategori', $data);
    }

    public function deleteKategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }
}
