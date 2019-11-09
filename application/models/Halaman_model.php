<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman_model extends CI_Model
{
    public function getHalaman()
    {
        return $this->db->get('halamanstatis')->result_array();
    }

    public function getHalamanById($id)
    {
        return $this->db->get_where('halamanstatis', array('id_halaman' => $id))->row_array();
    }

    public function addHalaman()
    {
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'judul_seo' => htmlspecialchars($this->input->post('judul_seo', true)),
            'isi_halaman' => $this->input->post('isi_halaman', true),
            'tgl_posting' => date('Y-m-d h:i:s'),
            'gambar' => $this->_uploadImage(),
            'username' => 'admin'
        ];

        $this->db->insert('halamanstatis', $data);
        redirect('Halaman');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Halaman berhasil ditambah</div>');
        redirect('halaman');
    }

    public function editHalaman()
    {

        if (!empty($_FILES["gambar"]["name"])) {
            $gambar = $this->_uploadImage();
        } else {
            $gambar = $this->input->post('gambar_lama');
        }

        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'judul_seo' => htmlspecialchars($this->input->post('judul_seo', true)),
            'isi_halaman' => $this->input->post('isi_halaman', true),
            'gambar' => $gambar,
            'username' => htmlspecialchars($this->input->post('username', true))
        ];
        $this->db->where('id_halaman', $this->input->post('id_halaman'));
        $this->db->update('halamanstatis', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Halaman berhasil diubah</div>');
        redirect('halaman');
    }

    public function deleteHalaman($id)
    {
        $this->db->where('id_halaman', $id);
        $this->db->delete('halamanstatis');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Halaman berhasil dihapus</div>');
        redirect('halaman');
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img_halaman/';
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
