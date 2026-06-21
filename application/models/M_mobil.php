<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mobil extends CI_Model {
    public function get_all() {
        return $this->db->get('mobil')->result();
    }
    public function get_by_id($id) {
        return $this->db->get_where('mobil', ['id_mobil' => $id])->row();
    }
    public function insert($data) {
        return $this->db->insert('mobil', $data);
    }
    public function update($id, $data) {
        $this->db->where('id_mobil', $id);
        return $this->db->update('mobil', $data);
    }
    public function delete($id) {
        $this->db->where('id_mobil', $id);
        return $this->db->delete('mobil');
    }
    public function count_by_status($status) {
        $this->db->where('status', $status);
        return $this->db->count_all_results('mobil');
    }
    public function get_available() {
        $this->db->where('status', 'Tersedia');
        return $this->db->get('mobil')->result();
    }
}
?>