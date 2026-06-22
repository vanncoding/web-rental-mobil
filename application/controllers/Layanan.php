<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index()
    {
        $this->load->view('layanan/index');
    }

    public function kirim()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layanan/index');
            return;
        }

        $nama  = $this->input->post('nama');
        $email = $this->input->post('email');
        $pesan = $this->input->post('pesan');

        // Konfigurasi SMTP (Gmail)
        $config['protocol']    = 'smtp';
        $config['smtp_host']   = 'smtp.gmail.com';
        $config['smtp_port']   = 587;
        $config['smtp_user']   = '19250772@bsi.ac.id';   // GANTI DENGAN EMAIL GMALMU
        $config['smtp_pass']   = 'rkfjsprfdyxtrgwq';      // APP PASSWORD (16 DIGIT TANPA SPASI)
        $config['smtp_crypto'] = 'tls';
        $config['charset']     = 'utf-8';
        $config['mailtype']    = 'html';
        $config['newline']     = "\r\n";

        $this->email->initialize($config);
        $this->email->from($email, $nama);
        $this->email->to('19250772@bsi.ac.id');      // GANTI DENGAN EMAIL TUJUAN
        $this->email->subject('Pesan Baru dari Layanan PremiumRental');
        $this->email->message("
            <h3>Pesan dari Form Layanan</h3>
            <p><strong>Nama:</strong> {$nama}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Pesan:</strong><br>{$pesan}</p>
        ");

        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
        } else {
            $this->session->set_flashdata('error', 'Gagal kirim. Coba lagi.');
        }
        redirect('layanan');
    }
}
