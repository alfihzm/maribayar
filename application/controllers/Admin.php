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
        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/dashboard');
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
}
