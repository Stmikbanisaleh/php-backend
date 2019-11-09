<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function JumlahBerita()
    {
        $berita = $this->db->get('berita')->result_array();
        $jumlah = count($berita);
        return $jumlah;
    }
    public function JumlahSop()
    {
        $sop = $this->db->get('sop')->result_array();
        $jumlah = count($sop);
        return $jumlah;
    }
    public function JumlahMenu()
    {
        $menu = $this->db->get('menu')->result_array();
        $jumlah = count($menu);
        return $jumlah;
    }
}
