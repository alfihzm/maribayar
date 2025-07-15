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

    public function get_by_pelanggan($id_pelanggan)
    {
        return $this->db->select('penggunaan.*, pelanggan.nama_pelanggan, tarif.daya')
            ->from('penggunaan')
            ->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan')
            ->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif', 'left')
            ->where('penggunaan.id_pelanggan', $id_pelanggan)
            ->order_by('tahun DESC, bulan DESC')
            ->get()
            ->result();
    }

    public function get_last_meter($id_pelanggan)
    {
        return $this->db->select('meter_akhir')
            ->where('id_pelanggan', $id_pelanggan)
            ->order_by('id_penggunaan', 'DESC')
            ->limit(1)
            ->get('penggunaan')
            ->row();
    }

    public function insert($data)
    {
        return $this->db->insert('penggunaan', $data);
    }

    public function count_by_date($date)
    {
        $this->db->like('id_penggunaan', 'PG-' . $date, 'after');
        return $this->db->count_all_results('penggunaan');
    }

    public function get_by_id($id_penggunaan)
    {
        return $this->db->get_where('penggunaan', ['id_penggunaan' => $id_penggunaan])->row();
    }

    public function delete($id_penggunaan)
    {
        return $this->db->delete('penggunaan', ['id_penggunaan' => $id_penggunaan]);
    }

    public function count_by_pelanggan($id_pelanggan)
    {
        return $this->db->where('id_pelanggan', $id_pelanggan)->count_all_results('penggunaan');
    }

    public function cek_penggunaan_bulanan($id_pelanggan, $bulan, $tahun)
    {
        return $this->db->get_where('penggunaan', [
            'id_pelanggan' => $id_pelanggan,
            'bulan' => $bulan,
            'tahun' => $tahun
        ])->row();
    }
}
