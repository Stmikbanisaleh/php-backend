<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    public function getKegiatan()
    {
        $query = "SELECT `kegiatan`.*,`posisi`.`id_posisi`,`posisi`.`nama_web`
            FROM `kegiatan` 
            JOIN `posisi` ON `posisi`.`id_posisi` = `kegiatan`.`id_posisi`";
        return $this->db->query($query)->result_array();
    }

    public function getKegiatanById($id)
    {
        return $this->db->get_where('kegiatan', array('id_kegiatan' => $id))->row_array();
    }

    public function getPosisi()
    {
        $query = "SELECT* FROM posisi WHERE id_posisi != 1";
        return $this->db->query($query)->result_array();
    }

    public function addKegiatan()
    {
        $data = [
            'id_posisi' => $this->input->post('id_posisi', true),
            'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
            'tempat' => htmlspecialchars($this->input->post('tempat', true)),
            'gambar' => $this->_uploadImage(),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
        ];
        $this->db->insert('kegiatan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kegiatan berhasil ditambah</div>');
        redirect('kegiatan');
    }

    public function editKegiatan()
    {

        if (!empty($_FILES["gambar"]["name"])) {
            $gambar = $this->_uploadImage();
        } else {
            $gambar = $this->input->post('gambar_lama');
        }

        $data = [
            'id_posisi' => $this->input->post('id_posisi', true),
            'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
            'tempat' => htmlspecialchars($this->input->post('tempat', true)),
            'gambar' => $this->_uploadImage(),
            'tanggal' => $this->input->post('tanggal')
        ];

        $this->db->where('id_kegiatan', $this->input->post('id_kegiatan'));
        $this->db->update('kegiatan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kegiatan berhasil diubah</div>');
        redirect('kegiatan');
    }

    public function deleteKegiatan($id)
    {
        $this->db->where('id_kegiatan', $id);
        $this->db->delete('kegiatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kegiatan berhasil dihapus</div>');
        redirect('kegiatan');
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'E://Dev/htdocs/pusispan/assets/img_kegiatan/';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['file_name']            = 'modul'.$this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }

        return 'default.jpg';
    }
}
