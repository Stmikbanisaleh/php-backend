<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses_model extends CI_Model
{
    public function getAkses()
    {
        return $this->db->get('akses_cepat')->result_array();
    }

    public function getAksesById($id)
    {
        return $this->db->get_where('akses_cepat', array('id_akses' => $id))->row_array();
    }

    public function addAkses()
    {
        $data = [
            'nama_link' => htmlspecialchars($this->input->post('nama_link', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
        ];
        $this->db->insert('akses_cepat', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses berhasil ditambah</div>');
        redirect('akses');
    }

    public function editAkses()
    {
        $data = [
            'nama_link' => htmlspecialchars($this->input->post('nama_link', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
        ];

        $this->db->where('id_akses', $this->input->post('id_akses'));
        $this->db->update('akses_cepat', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses berhasil diubah</div>');
        redirect('akses');
    }

    public function deleteAkses($id)
    {
        $this->db->where('id_akses', $id);
        $this->db->delete('akses_cepat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses berhasil dihapus</div>');
        redirect('akses');
    }
}
