<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas_model extends CI_Model
{
    public function getIdentitas()
    {
        return $this->db->get('identitas')->result_array();
    }

    public function getIdentitasById($id)
    {
        return $this->db->get_where('identitas', array('id_identitas' => $id))->row_array();
    }

    public function addIdentitas()
    {
        $data = [
            'nama_website' => htmlspecialchars($this->input->post('nama_website', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'satker' => htmlspecialchars($this->input->post('satker', true)),
            'facebook' => htmlspecialchars($this->input->post('facebook', true)),
            'google' => htmlspecialchars($this->input->post('google', true)),
            'twitter' => htmlspecialchars($this->input->post('twitter', true)),
            'rekening' => htmlspecialchars($this->input->post('rekening', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'meta_deskripsi' => htmlspecialchars($this->input->post('meta_deskripsi', true)),
            'meta_keyword' => htmlspecialchars($this->input->post('meta_keyword', true)),
            'favicon' => htmlspecialchars($this->input->post('favicon', true)),
        ];

        $this->db->insert('identitas', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Identitas berhasil ditambah</div>');
        redirect('identitas');
    }

    public function editIdentitas()
    {
        $data = [
            'nama_website' => htmlspecialchars($this->input->post('nama_website', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'satker' => htmlspecialchars($this->input->post('satker', true)),
            'facebook' => htmlspecialchars($this->input->post('facebook', true)),
            'google' => htmlspecialchars($this->input->post('google', true)),
            'twitter' => htmlspecialchars($this->input->post('twitter', true)),
            'rekening' => htmlspecialchars($this->input->post('rekening', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'meta_deskripsi' => htmlspecialchars($this->input->post('meta_deskripsi', true)),
            'meta_keyword' => htmlspecialchars($this->input->post('meta_keyword', true)),
            'favicon' => htmlspecialchars($this->input->post('favicon', true)),
        ];

        $this->db->where('id_identitas', $this->input->post('id_identitas'));
        $this->db->update('identitas', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Identitas berhasil diubah</div>');
        redirect('identitas');
    }

    public function deleteidentitas($id)
    {
        $this->db->where('id_identitas', $id);
        $this->db->delete('identitas');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Identitas berhasil dihapus</div>');
        redirect('identitas');
    }
}
