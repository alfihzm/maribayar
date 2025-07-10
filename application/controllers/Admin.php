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
    }

    public function index()
    {
        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/admin/admin_footer');
    }
}
