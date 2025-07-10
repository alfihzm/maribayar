<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tagihan extends CI_Model
{
    public function get_all()
    {
        return $this->db->select('tagihan.*, pelanggan.nama_pelanggan, penggunaan.id_penggunaan, tarif.tarifperkwh')
            ->from('tagihan')
            ->join('pelanggan', 'tagihan.id_pelanggan = pelanggan.id_pelanggan')
            ->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan')
            ->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif')
            ->order_by('tagihan.id_tagihan', 'DESC')
            ->get()
            ->result();
    }
}
