<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function cek_login($username, $password) {
        $this->db->where('username', $username);
        // cek pwnya pake md5 bos jadi kalau bikin akun baru atmin harus bikin passwordnya pake md5 juga
        $this->db->where('password', md5($password)); 
        return $this->db->get('admin')->row();
    }
}
?>