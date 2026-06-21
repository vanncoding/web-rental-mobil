<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mobil');
        $this->load->model('M_pelanggan');
        $this->load->model('M_transaksi');
        $this->load->model('M_admin');
        $this->load->helper('whatsapp');
    }

    // ============ LOGIN ADMIN ============
    public function login()
    {
        if ($this->session->userdata('admin')) {
            redirect('admin/dashboard');
        }
        if ($this->input->post()) {
            $admin = $this->M_admin->cek_login($this->input->post('username'), $this->input->post('password'));
            if ($admin) {
                $this->session->set_userdata('admin', $admin);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah!');
            }
        }
        $this->load->view('admin/login');
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    // ============ DASHBOARD ============
    public function dashboard()
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        $data['total_mobil'] = count($this->M_mobil->get_all());
        $data['tersedia'] = $this->M_mobil->count_by_status('Tersedia');
        $data['disewa'] = $this->M_mobil->count_by_status('Sedang Disewa');
        $data['pendapatan'] = $this->M_transaksi->get_total_pendapatan();
        $data['mobil_list'] = $this->M_mobil->get_all();
        $this->load->view('admin/dashboard', $data);
    }

    // ============ DATA MOBIL (CRUD) ============
    public function mobil()
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        $data['mobil'] = $this->M_mobil->get_all();
        $this->load->view('admin/mobil', $data);
    }

    public function tambah_mobil()
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        if ($this->input->post()) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            $gambar = '';
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            }

            $data = [
                'nama_mobil' => $this->input->post('nama_mobil'),
                'merk' => $this->input->post('merk'),
                'transmisi' => $this->input->post('transmisi'),
                'tahun' => $this->input->post('tahun'),
                'harga_per_hari' => str_replace('.', '', $this->input->post('harga_per_hari')),
                'status' => $this->input->post('status'),
                'gambar' => $gambar,
            ];
            $this->M_mobil->insert($data);
            $this->session->set_flashdata('success', 'Mobil berhasil ditambahkan!');
            redirect('admin/mobil');
        }
        $this->load->view('admin/tambah_mobil');
    }

    public function edit_mobil($id)
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        $data['mobil'] = $this->M_mobil->get_by_id($id);
        if (!$data['mobil']) show_404();

        if ($this->input->post()) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            $gambar = $this->input->post('old_gambar');
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            }

            $update = [
                'nama_mobil' => $this->input->post('nama_mobil'),
                'merk' => $this->input->post('merk'),
                'transmisi' => $this->input->post('transmisi'),
                'tahun' => $this->input->post('tahun'),
                'harga_per_hari' => str_replace('.', '', $this->input->post('harga_per_hari')),
                'status' => $this->input->post('status'),
                'gambar' => $gambar,
            ];
            $this->M_mobil->update($id, $update);
            $this->session->set_flashdata('success', 'Mobil berhasil diupdate!');
            redirect('admin/mobil');
        }
        $this->load->view('admin/edit_mobil', $data);
    }

    public function hapus_mobil($id)
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        $this->M_mobil->delete($id);
        $this->session->set_flashdata('success', 'Mobil dihapus!');
        redirect('admin/mobil');
    }

    // ============ DATA TRANSAKSI ============
    public function transaksi()
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        $data['transaksi'] = $this->M_transaksi->get_all();
        $data['pelanggan'] = $this->M_pelanggan->get_all();
        $data['mobil'] = $this->M_mobil->get_all();
        $this->load->view('admin/transaksi', $data);
    }

    public function tambah_transaksi()
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        if ($this->input->post()) {
            $id_mobil = $this->input->post('id_mobil');
            $mobil = $this->M_mobil->get_by_id($id_mobil);
            $tgl_sewa = $this->input->post('tgl_sewa');
            $tgl_kembali = $this->input->post('tgl_kembali');

            $diff = abs(strtotime($tgl_kembali) - strtotime($tgl_sewa));
            $lama = floor($diff / (60 * 60 * 24));
            if ($lama == 0) $lama = 1;

            $total = $lama * $mobil->harga_per_hari;
            $status_trans = $this->input->post('status_transaksi');

            $data = [
                'id_mobil' => $id_mobil,
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_admin' => $this->session->userdata('admin')->id_admin,
                'tgl_sewa' => $tgl_sewa,
                'tgl_kembali' => $tgl_kembali,
                'lama_sewa' => $lama,
                'total_biaya' => $total,
                'status_transaksi' => $status_trans,
            ];

            $id_trans = $this->M_transaksi->insert($data);

            if ($status_trans == 'Disewa') {
                $this->M_mobil->update($id_mobil, ['status' => 'Sedang Disewa']);
            }

            $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan!');
            redirect('admin/transaksi');
        }
    }

    public function edit_transaksi($id)
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        $trans = $this->M_transaksi->get_by_id($id);
        if (!$trans) show_404();

        if ($this->input->post()) {
            $status_baru = $this->input->post('status_transaksi');
            $status_lama = $trans->status_transaksi;

            $update = [
                'tgl_sewa' => $this->input->post('tgl_sewa'),
                'tgl_kembali' => $this->input->post('tgl_kembali'),
                'status_transaksi' => $status_baru,
            ];

            $this->M_transaksi->update($id, $update);

            if ($status_baru == 'Disewa' && $status_lama != 'Disewa') {
                $this->M_mobil->update($trans->id_mobil, ['status' => 'Sedang Disewa']);
            } elseif ($status_baru == 'Selesai' || $status_baru == 'Batal') {
                $this->M_mobil->update($trans->id_mobil, ['status' => 'Tersedia']);
            }
            if ($status_baru == 'Menunggu' && $status_lama == 'Disewa') {
                $this->M_mobil->update($trans->id_mobil, ['status' => 'Tersedia']);
            }

            $this->session->set_flashdata('success', 'Transaksi diupdate!');
            redirect('admin/transaksi');
        }

        $data['trans'] = $trans;
        $data['pelanggan'] = $this->M_pelanggan->get_all();
        $data['mobil'] = $this->M_mobil->get_all();
        $this->load->view('admin/edit_transaksi', $data);
    }

    public function hapus_transaksi($id)
    {
        if (!$this->session->userdata('admin')) redirect('admin/login');
        $trans = $this->M_transaksi->get_by_id($id);
        if ($trans && ($trans->status_transaksi == 'Disewa' || $trans->status_transaksi == 'Menunggu')) {
            $this->M_mobil->update($trans->id_mobil, ['status' => 'Tersedia']);
        }
        $this->db->delete('transaksi', ['id_transaksi' => $id]);
        $this->session->set_flashdata('success', 'Transaksi dihapus!');
        redirect('admin/transaksi');
    }
}
