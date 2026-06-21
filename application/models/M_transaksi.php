<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {
    public function get_all() {
        $this->db->select('transaksi.*, mobil.nama_mobil, pelanggan.nama as nama_penyewa, pelanggan.no_hp');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->order_by('transaksi.created_at', 'DESC');
        return $this->db->get()->result();
    }
    public function get_by_id($id) {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id])->row();
    }
    public function insert($data) {
        $this->db->insert('transaksi', $data);
        return $this->db->insert_id();
    }
    public function update($id, $data) {
        $this->db->where('id_transaksi', $id);
        return $this->db->update('transaksi', $data);
    }
    public function get_total_pendapatan() {
        $this->db->select_sum('total_biaya');
        $this->db->where('status_transaksi', 'Selesai');
        $q = $this->db->get('transaksi');
        return $q->row()->total_biaya ?? 0;
    }
    public function count_by_status($status) {
        $this->db->where('status_transaksi', $status);
        return $this->db->count_all_results('transaksi');
    }
}
?>