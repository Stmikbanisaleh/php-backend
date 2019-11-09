<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{
    public function getAgenda()
    {
        $this->db->order_by('id_agenda', 'DESC');
        return $this->db->get('agenda')->result_array();
    }

    public function getAgendaById($id)
    {
        return $this->db->get_where('agenda', array('id_agenda' => $id))->row_array();
    }

    public function getKategori()
    {
        $this->db->select('id_kategori, nama_kategori');
        $query = $this->db->get('kategori');

        return $query->result_array();
    }

    public function addAgenda()
    {
        $data = [
            'nama_agenda' => htmlspecialchars($this->input->post('nama_agenda', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'tanggal_awal' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'foto' => $this->_uploadImage()
        ];

        $this->db->insert('Agenda', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Agenda berhasil ditambah</div>');
        redirect('album');
        redirect('agenda');
    }

    public function editAgenda()
    {

        if (!empty($_FILES["foto"]["name"])) {
            $foto = $this->_uploadImage();
        } else {
            $foto = $this->input->post('foto_lama');
        }

        $data = [
            'nama_agenda' => htmlspecialchars($this->input->post('nama_agenda', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'tanggal_awal' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'foto' => $this->_uploadImage()
        ];

        $this->db->where('id_agenda', $this->input->post('id_agenda'));
        $this->db->update('agenda', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Agenda berhasil diubah</div>');
        redirect('agenda');
    }

    public function deleteAgenda($id)
    {
        $this->db->where('id_agenda', $id);
        $this->db->delete('agenda');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gambar berhasil dihapus</div>');
        redirect('agenda');
    }

    private function _uploadImage()
    {
        //Sesuaikan upload path dengan server
        $config['upload_path']          = 'E://Dev/htdocs/pusispan/assets/img_agenda/';
        $config['allowed_types']        = 'jpg|png';
        //$config['file_name']            = 'modul'.$this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        return 'default.jpg';
    }
}
