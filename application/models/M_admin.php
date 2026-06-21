<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function cek_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get('admin')->row();
    }
}
?>