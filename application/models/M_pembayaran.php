<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{
    public function get_all()
    {
        return $this->db->select('pembayaran.*, pelanggan.nama_pelanggan, tagihan.bulan, tagihan.tahun, user.nama_admin')
            ->from('pembayaran')
            ->join('pelanggan', 'pembayaran.id_pelanggan = pelanggan.id_pelanggan')
            ->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan')
            ->join('user', 'pembayaran.id_user = user.id_user')
            ->order_by('pembayaran.id_pembayaran', 'DESC')
            ->get()
            ->result();
    }
}
