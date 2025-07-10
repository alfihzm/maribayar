<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function getPaymentsByUser($id_user)
    {
        return $this->db->select('pembayaran.id_pembayaran, 
                              pelanggan.nama_pelanggan AS pelanggan, 
                              DATE_FORMAT(pembayaran.tanggal_pembayaran, "%M %Y") AS periode, 
                              pembayaran.total_bayar AS jumlah_bayar')
            ->from('pembayaran')
            ->join('pelanggan', 'pembayaran.id_pelanggan = pelanggan.id_pelanggan')
            ->where('pembayaran.id_user', $id_user)
            ->order_by('pembayaran.id_pembayaran', 'DESC')
            ->limit(10)
            ->get()
            ->result_array();
    }
}
