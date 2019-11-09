<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download_model extends CI_Model
{
    public function getDownload()
    {
        $this->db->order_by('id_download', 'DESC');
        return $this->db->get('download')->result_array();
    }

    public function getDownloadById($id)
    {
        return $this->db->get_where('download', array('id_download' => $id))->row_array();
    }

    public function addDownload()
    {
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'nama_file' => $this->_upload(),
            'tgl_posting' => date('Y-m-d h:i:s'),
            'hits' => 1
        ];

        $this->db->insert('download', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Arsip berhasil ditambah</div>');
        redirect('download');
    }

    public function editDownload()
    {

        if (!empty($_FILES["nama_file"]["name"])) {
            $file = $this->_upload();
        } else {
            $file = $this->input->post('file_lama');
        }

        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'nama_file' => $file
        ];

        $this->db->where('id_download', $this->input->post('id_download'));
        $this->db->update('download', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Arsip berhasil diubah</div>');
        redirect('download');
    }

    public function deleteDownload($id)
    {
        $this->db->where('id_download', $id);
        $this->db->delete('download');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Arsip berhasil dihapus</div>');
        redirect('download');
    }

    private function _upload()
    {
        $config['upload_path']          = '../assets/arsip/';
        $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
        //$config['file_name']            = 'modul'.$this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 8192; // 8MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('nama_file')) {
            return $this->upload->data("file_name");
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Dokumen gagal diunggah!</div>');
        redirect('download/add');
    }
}
