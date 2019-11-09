<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Album_model extends CI_Model
{
    public function getAlbum()
    {
        $this->db->order_by('id_album', 'DESC');
        return $this->db->get('album')->result_array();
    }

    public function getAlbumById($id)
    {
        return $this->db->get_where('album', array('id_album' => $id))->row_array();
    }

    public function addAlbum()
    {
        $data = [
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'gambar' => $this->_uploadImage(),
            'tgl_posting' => date('Y-m-d h:i:s'),
            'username' => 'admin'
        ];
        $this->db->insert('album', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gambar berhasil ditambah</div>');
        redirect('album');
    }

    public function editAlbum()
    {
        if (!empty($_FILES["gambar"]["name"])) {
            $gambar = $this->_uploadImage();
        } else {
            $gambar = $this->input->post('gambar_lama');
        }

        $data = [
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'gambar' => $gambar
        ];

        $this->db->where('id_album', $this->input->post('id_album'));
        $this->db->update('album', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gambar berhasil diubah</div>');
        redirect('album');
    }

    public function deleteAlbum($id)
    {
        $this->db->where('id_album', $id);
        $this->db->delete('album');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gambar berhasil dihapus</div>');
        redirect('album');
    }

    private function _uploadImage()
    {
        //Sesuaikan upload path dengan server
        $config['upload_path']          = 'E://Dev/htdocs/pusispan/assets/img_album/';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['file_name']            = 'modul'.$this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }

        return 'default.jpg';
    }
}
