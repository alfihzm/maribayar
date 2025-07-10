<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{

    public function get_all()
    {
        return $this->db->select('pelanggan.*, tarif.daya, tarif.tarifperkwh')
            ->from('pelanggan')
            ->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif', 'left')
            ->order_by('id_pelanggan', 'DESC')
            ->get()
            ->result();
    }

    public function count_all()
    {
        return $this->db->count_all('pelanggan');
    }

    public function get_recent($limit = 5)
    {
        return $this->db->order_by('id_pelanggan', 'DESC')
            ->limit($limit)
            ->get('pelanggan')
            ->result();
    }
}
