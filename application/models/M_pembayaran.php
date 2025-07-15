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

    public function insert($data)
    {
        return $this->db->insert('pembayaran', $data);
    }

    public function delete_by_tagihan($id_tagihan)
    {
        return $this->db->delete('pembayaran', ['id_tagihan' => $id_tagihan]);
    }

    public function update_by_tagihan($id_tagihan, $data)
    {
        $this->db->where('id_tagihan', $id_tagihan);
        return $this->db->update('pembayaran', $data);
    }


    public function get_by_id($id_penggunaan)
    {
        return $this->db->get_where('penggunaan', ['id_penggunaan' => $id_penggunaan])->row();
    }

    public function get_confirmed_payments()
    {
        return $this->db->select('pembayaran.*, pelanggan.nama_pelanggan, penggunaan.bulan, penggunaan.tahun, user.nama_admin')
            ->from('pembayaran')
            ->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan')
            ->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan')
            ->join('pelanggan', 'pembayaran.id_pelanggan = pelanggan.id_pelanggan')
            ->join('user', 'pembayaran.id_user = user.id_user', 'left')
            ->where('tagihan.status', 'Lunas')
            ->order_by('pembayaran.id_pembayaran', 'DESC')
            ->get()
            ->result();
    }

    public function count_by_pelanggan($id_pelanggan)
    {
        return $this->db->where('id_pelanggan', $id_pelanggan)->count_all_results('pembayaran');
    }

    public function get_histori_by_pelanggan($id_pelanggan)
    {
        return $this->db->select('pembayaran.*, tagihan.bulan, tagihan.tahun, tagihan.jumlah_meter, tagihan.jumlah_bayar')
            ->from('pembayaran')
            ->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan')
            ->where('pembayaran.id_pelanggan', $id_pelanggan)
            ->where('pembayaran.status', 'Dikonfirmasi')
            ->order_by('pembayaran.tanggal_pembayaran', 'DESC')
            ->get()
            ->result();
    }
}
