<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {
    public function cek_login($email, $password) {
        $this->db->where('email', $email);
        $user = $this->db->get('pelanggan')->row();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
    public function insert($data) {
        return $this->db->insert('pelanggan', $data);
    }
    public function get_all() {
        return $this->db->get('pelanggan')->result();
    }
    public function get_by_id($id) {
        return $this->db->get_where('pelanggan', ['id_pelanggan' => $id])->row();
    }
}
?>