<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('auth/login');
        }

        $this->load->model('M_admin');
    }

    public function index()
    {
        $this->load->model('M_pelanggan');
        $data['total_pelanggan'] = $this->M_pelanggan->count_all();
        $data['recent_pelanggan'] = $this->M_pelanggan->get_recent();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function profil()
    {
        $data['user_id']     = $this->session->userdata('id_user');
        $data['user_name']   = $this->session->userdata('nama_admin');
        $data['username']    = $this->session->userdata('username');
        $data['user_level']  = $this->session->userdata('level');

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/profil', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function pelanggan()
    {
        $this->load->model('M_pelanggan');
        $data['pelanggan'] = $this->M_pelanggan->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/daftar_pelanggan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function petugas()
    {
        $this->load->model('M_user');
        $data['petugas'] = $this->M_user->get_petugas();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/daftar_petugas', $data);
        $this->load->view('layouts/admin/admin_footer');
    }


    public function tarif()
    {
        $this->load->model('M_tarif');
        $data['tarif'] = $this->M_tarif->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/daftar_tarif', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function penggunaan()
    {
        $this->load->model('M_penggunaan');
        $data['penggunaan'] = $this->M_penggunaan->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/daftar_penggunaan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }


    public function tagihan()
    {
        $this->load->model('M_tagihan');
        $data['tagihan'] = $this->M_tagihan->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/daftar_tagihan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }


    public function pembayaran()
    {
        $this->load->model('M_pembayaran');
        $data['pembayaran'] = $this->M_pembayaran->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/daftar_pembayaran', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function tambah_petugas()
    {
        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/tambah_petugas');
        $this->load->view('layouts/admin/admin_footer');
    }

    public function simpan_petugas()
    {
        $this->load->model('M_user');

        $data = [
            'username'   => $this->input->post('username'),
            'password'   => md5('petugas123'),
            'nama_admin' => $this->input->post('nama_admin'),
            'id_level'   => 2
        ];

        $this->M_user->insert($data);
        $this->session->set_flashdata('success', 'Petugas berhasil ditambahkan!');
        redirect('admin/petugas');
    }

    public function detail_petugas($id)
    {
        $this->load->model('M_user');
        $petugas = $this->M_user->get_by_id($id);

        if (!$petugas) {
            show_404();
        }

        $data = [
            'user_id'     => $petugas->id_user,
            'user_name'   => $petugas->nama_admin,
            'username'    => $petugas->username,
            'user_level'  => $petugas->id_level
        ];

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/detail_petugas', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function update_petugas($id)
    {
        $this->load->model('M_user');

        $data = [
            'nama_admin' => $this->input->post('nama_admin'),
            'username'   => $this->input->post('username'),
        ];

        $this->M_user->update($id, $data);
        $this->session->set_flashdata('success', 'Data petugas berhasil diperbarui!');
        redirect('admin/detail_petugas/' . $id);
    }

    public function hapus_petugas($id)
    {
        $this->load->model('M_user');

        $hapus = $this->M_user->delete($id);
        if ($hapus) {
            $this->session->set_flashdata('success', 'Petugas berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus petugas.');
        }

        redirect('admin/petugas');
    }
}