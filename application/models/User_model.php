
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getUserById()
    {
        $user = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();
        $userid = $user['id'];
        $query = "SELECT `msuser`.*
        FROM `msuser`
        WHERE `msuser`.`id` =" . $userid;
        return $this->db->query($query)->row_array();
    }
}
