<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $admin = $this->m_user->cek_login_admin($username, $password);
        if ($admin) {
            $this->session->set_userdata([
                'id_user'    => $admin->id_user,
                'username'   => $admin->username,
                'nama_admin' => $admin->nama_admin,
                'level'      => $admin->id_level,
                'login'      => TRUE
            ]);
            redirect('admin');
        }

        $pelanggan = $this->m_user->cek_login_pelanggan($username, $password);
        if ($pelanggan) {
            $this->session->set_userdata([
                'id_pelanggan'   => $pelanggan->id_pelanggan,
                'username'       => $pelanggan->username,
                'nama_pelanggan' => $pelanggan->nama_pelanggan,
                'login_pelanggan' => TRUE
            ]);
            redirect('pelanggan');
        }

        $this->session->set_flashdata('error', 'Username atau Password salah!');
        redirect('auth/login');
    }

    public function register()
    {
        $password = $this->input->post('password');
        $confirmpassword = $this->input->post('confirmpassword');

        if ($password !== $confirmpassword) {
            $this->session->set_flashdata('error', 'Password tidak cocok!');
            redirect('auth/login');
        }

        $data = [
            'username'        => $this->input->post('username'),
            'password'        => md5($password),
            'nomor_kwh'       => $this->input->post('nomor_kwh'),
            'nama_pelanggan'  => $this->input->post('nama_pelanggan'),
            'alamat'          => $this->input->post('alamat'),
            'id_tarif'        => $this->input->post('id_tarif')
        ];

        $this->db->insert('pelanggan', $data);

        $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login!');
        redirect('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
