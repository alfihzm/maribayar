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

    public function insert($data)
    {
        return $this->db->insert('tagihan', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_tagihan', $id)->update('tagihan', $data);
    }

    public function get_by_pelanggan($id_pelanggan)
    {
        return $this->db->select('tagihan.id_tagihan, tagihan.*, penggunaan.bulan, penggunaan.tahun, penggunaan.meter_awal, penggunaan.meter_akhir, pelanggan.nama_pelanggan, pelanggan.nomor_kwh')
            ->from('tagihan')
            ->join('penggunaan', 'penggunaan.id_penggunaan = tagihan.id_penggunaan')
            ->join('pelanggan', 'pelanggan.id_pelanggan = penggunaan.id_pelanggan')
            ->where('penggunaan.id_pelanggan', $id_pelanggan)
            ->order_by('tagihan.id_tagihan', 'DESC')
            ->get()
            ->result();
    }

    public function get_detail($id_tagihan)
    {
        return $this->db->select('tagihan.*, pelanggan.nama_pelanggan, pelanggan.nomor_kwh, penggunaan.bulan, penggunaan.tahun')
            ->from('tagihan')
            ->join('penggunaan', 'penggunaan.id_penggunaan = tagihan.id_penggunaan')
            ->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan')
            ->where('tagihan.id_tagihan', $id_tagihan)
            ->get()
            ->row();
    }

    public function get_by_penggunaan($id_penggunaan)
    {
        return $this->db->get_where('tagihan', ['id_penggunaan' => $id_penggunaan])->row(); // BUKAN ->result()
    }

    public function delete_by_penggunaan($id_penggunaan)
    {
        return $this->db->delete('tagihan', ['id_penggunaan' => $id_penggunaan]);
    }

    public function get_by_id($id_tagihan)
    {
        return $this->db->get_where('tagihan', ['id_tagihan' => $id_tagihan])->row();
    }

    public function cek_tagihan_ada($id_pelanggan, $bulan, $tahun)
    {
        return $this->db->get_where('tagihan', [
            'id_pelanggan' => $id_pelanggan,
            'bulan' => $bulan,
            'tahun' => $tahun
        ])->row();
    }

    public function count_by_status($id_pelanggan, $status)
    {
        return $this->db->where([
            'id_pelanggan' => $id_pelanggan,
            'status' => $status
        ])->count_all_results('tagihan');
    }
}
