<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Cek session login pelanggan jika sudah dibuat
        // if (!$this->session->userdata('id_pelanggan')) redirect('auth/login');
    }

    public function index()
    {
        // Misal nanti akan ambil data tagihan atau penggunaan dari model
        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/dashboard');
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }
}
