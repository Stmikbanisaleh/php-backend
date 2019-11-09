<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function getBerita()
    {
        $query = "SELECT `berita`.*,`posisi`.`id_posisi`,`posisi`.`nama_web`
            FROM `berita` 
            JOIN `posisi` ON `posisi`.`id_posisi` = `berita`.`id_posisi`
            ORDER BY `berita`.`id_berita` DESC";
        return $this->db->query($query)->result_array();
    }

    public function getBeritaById($id)
    {
        return $this->db->get_where('berita', array('id_berita' => $id))->row_array();
    }

    public function getposisi()
    {
        $this->db->select('id_posisi, nama_web');
        $query = $this->db->get('posisi');

        return $query->result_array();
    }

    public function addBerita()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();
        $username = $data['user']['name'];

        $data = [
            'username' => $username,
            'id_posisi' => $this->input->post('id_posisi', true),
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'sub_judul' => htmlspecialchars($this->input->post('sub_judul', true)),
            'youtube' => htmlspecialchars($this->input->post('youtube', true)),
            'judul_seo' => $this->_judulSeo(),
            'isi_berita' => $this->input->post('isi_berita', true),
            'gambar' => $this->_uploadImage(),
            'keterangan_gambar' => htmlspecialchars($this->input->post('keterangan_gambar', true)),
            'tanggal' => date('Y-m-d h:i:s')
        ];

        $this->db->insert('berita', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berita berhasil ditambah</div>');
        redirect('berita');
    }

    public function editBerita()
    {

        if (!empty($_FILES["gambar"]["name"])) {
            $gambar = $this->_uploadImage();
        } else {
            $gambar = $this->input->post('gambar_lama');
        }

        $data = [
            'username' => 'admin',
            'id_posisi' => $this->input->post('id_posisi', true),
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'sub_judul' => htmlspecialchars($this->input->post('sub_judul', true)),
            'youtube' => htmlspecialchars($this->input->post('youtube', true)),
            'judul_seo' => htmlspecialchars($this->input->post('judul_seo', true)),
            'isi_berita' => $this->input->post('isi_berita', true),
            'gambar' => $gambar,
            'keterangan_gambar' => htmlspecialchars($this->input->post('keterangan_gambar', true)),
        ];

        $this->db->where('id_berita', $this->input->post('id_berita'));
        $this->db->update('berita', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berita berhasil diubah</div>');
        redirect('berita');
    }

    public function deleteBerita($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->delete('berita');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berita berhasil dihapus</div>');
        redirect('berita');
    }

    private function _uploadImage()
    {
        //Sesuaikan upload path dengan server
        $config['upload_path']          = 'E://Dev/htdocs/pusispan/assets/img_berita/';
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

    private function _judulSeo()
    {
        $seo = htmlspecialchars($this->input->post('judul', true));
        $repseo = preg_replace('/\s+/', '_', $seo);
        $tgl = date('dmY');
        $judulseo = $repseo . '_' . $tgl;

        return $judulseo;
    }
}
