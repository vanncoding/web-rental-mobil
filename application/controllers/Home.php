<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mobil');
        $this->load->helper('whatsapp');
        $this->load->helper('text');
    }

    public function index()
    {
        // Ambil keyword dari GET
        $keyword = $this->input->get('search', TRUE);
        $keyword = trim($keyword);

        // Jika ada keyword, cari; jika tidak, tampilkan semua
        if (!empty($keyword)) {
            $data['mobil'] = $this->M_mobil->search($keyword);
        } else {
            $data['mobil'] = $this->M_mobil->get_all();
        }

        // Hitung mobil tersedia
        $data['available_count'] = $this->M_mobil->count_by_status('Tersedia');
        $data['keyword'] = $keyword;
        $data['user'] = $this->session->userdata('user');

        $this->load->view('home/index', $data);
    }
}
