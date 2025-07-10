<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penggunaan extends CI_Model
{
    public function get_all()
    {
        return $this->db->select('penggunaan.*, pelanggan.nama_pelanggan, pelanggan.id_pelanggan, tarif.daya')
            ->from('penggunaan')
            ->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan')
            ->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif', 'left')
            ->order_by('penggunaan.id_penggunaan', 'DESC')
            ->get()
            ->result();
    }
}
