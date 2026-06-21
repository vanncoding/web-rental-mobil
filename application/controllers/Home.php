<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_mobil');
        $this->load->helper('whatsapp');
    }

    public function index() {
        $data['mobil'] = $this->M_mobil->get_all();
        $data['user'] = $this->session->userdata('user');
        $data['available_count'] = $this->M_mobil->count_by_status('Tersedia');
        $this->load->view('home/index', $data);
    }
}
?>