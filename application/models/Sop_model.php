<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sop_model extends CI_Model
{
    public function getSop()
    {
        return $this->db->get('sop')->result_array();
    }

    public function getSopById($id)
    {
        return $this->db->get_where('sop', array('id_sop' => $id))->row_array();
    }

    public function addSop()
    {
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'nama_judul' => htmlspecialchars($this->input->post('nama_judul', true)),
            'nama_file' => $this->_uploadFile(),
            'tgl_posting' => date('Y-m-d h:i:s')
        ];
        $this->db->insert('sop', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP berhasil ditambah</div>');
        redirect('sop');
    }

    public function editsop()
    {

        if (!empty($_FILES["nama_file"]["name"])) {
            $file = $this->_uploadFile();
        } else {
            $file = $this->input->post('nama_file_lama');
        }

        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'nama_judul' => htmlspecialchars($this->input->post('nama_judul', true)),
            'nama_file' => $file
        ];
        var_dump($data);
        die;

        $this->db->where('id_sop', $this->input->post('id_sop'));
        $this->db->update('sop', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP berhasil diubah</div>');
        redirect('sop');
    }

    public function deleteSop($id)
    {
        $this->db->where('id_sop', $id);
        $this->db->delete('sop');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SOP berhasil dihapus</div>');
        redirect('sop');
    }

    private function _uploadFile()
    {
        $judul = $this->input->post('judul');
        $date = date('d-m-Y');

        //Sesuaikan upload path dengan server
        $config['upload_path']          = 'E://Dev/htdocs/pusispan/assets/doc_sop/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['file_name']            = $judul . '_' . $date;
        $config['overwrite']            = true;
        $config['max_size']             = 4096; // 4MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('nama_file')) {
            return $this->upload->data("file_name");
        }
    }
}
