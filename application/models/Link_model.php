<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link_model extends CI_Model
{
    public function getLink()
    {
        return $this->db->get('link_terkait')->result_array();
    }

    public function getLinkById($id)
    {
        return $this->db->get_where('link_terkait', array('id_link' => $id))->row_array();
    }

    public function addLink()
    {
        $data = [
            'kategori' => htmlspecialchars($this->input->post('kategori', true)),
            'nama_Link' => htmlspecialchars($this->input->post('nama_link', true)),
            'url_web' => htmlspecialchars($this->input->post('url_web', true)),
            'logo' => $this->_uploadImage()
        ];
        $this->db->insert('link_terkait', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link berhasil ditambah</div>');
        redirect('link');
    }

    public function editLink()
    {
        if (!empty($_FILES["logo"]["name"])) {
            $logo = $this->_uploadImage();
        } else {
            $logo = $this->input->post('logo_lama');
        }

        $data = [
            'kategori' => htmlspecialchars($this->input->post('kategori', true)),
            'nama_Link' => htmlspecialchars($this->input->post('nama_link', true)),
            'url_web' => htmlspecialchars($this->input->post('url_web', true)),
            'logo' => $logo
        ];

        $this->db->where('id_link', $this->input->post('id_link'));
        $this->db->update('link_terkait', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link berhasil diubah</div>');
        redirect('link');
    }

    public function deleteLink($id)
    {
        $this->db->where('id_link', $id);
        $this->db->delete('link_terkait');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link berhasil dihapus</div>');
        redirect('link');
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img_link/';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['file_name']            = 'modul'.$this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            return $this->upload->data("file_name");
        }

        return 'default.jpg';
    }
}
