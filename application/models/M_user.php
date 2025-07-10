<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function cek_login($username, $password)
    {
        return $this->db->where('username', $username)
            ->where('password', $password)
            ->get('user')->row();
    }

    public function cek_login_admin($username, $password)
    {
        return $this->db->where('username', $username)
            ->where('password', $password)
            ->get('user')
            ->row();
    }

    public function cek_login_pelanggan($username, $password)
    {
        return $this->db->where('username', $username)
            ->where('password', $password)
            ->get('pelanggan')
            ->row();
    }

    public function get_petugas()
    {
        return $this->db->where('id_level', 2)->get('user')->result();
    }
}
