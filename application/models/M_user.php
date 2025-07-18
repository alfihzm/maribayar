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

    public function cek_login_pelanggan($username, $raw_password)
    {
        $user = $this->db->get_where('pelanggan', ['username' => $username])->row();

        if ($user && password_verify($raw_password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function get_pelanggan_by_username($username)
    {
        return $this->db->get_where('pelanggan', ['username' => $username])->row();
    }

    public function get_petugas()
    {
        return $this->db->where('id_level', 2)->get('user')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_by_id($id_user, $level = null)
    {
        $this->db->where('id_user', $id_user);
        if ($level !== null) {
            $this->db->where('id_level', $level);
        }
        return $this->db->get('user')->row();
    }

    public function update($id, $data)
    {
        return $this->db->where('id_user', $id)->update('user', $data);
    }

    public function delete($id_user)
    {
        return $this->db->where('id_user', $id_user)
            ->where('id_level', 2)
            ->delete('user');
    }
}