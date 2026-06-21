<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pelanggan');
        $this->load->library('form_validation');
    }

    public function login()
    {
        if ($this->session->userdata('user')) {
            redirect('home');
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run()) {
                $user = $this->M_pelanggan->cek_login($this->input->post('email'), $this->input->post('password'));
                if ($user) {
                    $this->session->set_userdata('user', $user);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('error', 'Email atau Password salah!');
                }
            }
        }
        $this->load->view('auth/login');
    }

    public function register()
    {
        if ($this->session->userdata('user')) {
            redirect('home');
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pelanggan.email]');
            $this->form_validation->set_rules('no_hp', 'No HP', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run()) {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'no_hp' => $this->input->post('no_hp'),
                    'alamat' => $this->input->post('alamat'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                ];
                $this->M_pelanggan->insert($data);
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('auth/login');
            }
        }
        $this->load->view('auth/register');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
