<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login_pelanggan')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->load->model(['M_penggunaan', 'M_tagihan', 'M_pembayaran']);

        $id = $this->session->userdata('id_pelanggan');

        $data = [
            'total_penggunaan'  => $this->M_penggunaan->count_by_pelanggan($id),
            'total_tagihan'     => $this->M_tagihan->count_by_status($id, 'Belum Lunas'),
            'total_pembayaran'  => $this->M_pembayaran->count_by_pelanggan($id)
        ];

        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/dashboard', $data);
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }

    public function profil()
    {
        $this->load->model('M_pelanggan');
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $pelanggan = $this->M_pelanggan->get_by_id($id_pelanggan);

        $data = [
            'id_pelanggan'   => $pelanggan->id_pelanggan,
            'nama_pelanggan' => $pelanggan->nama_pelanggan,
            'username'       => $pelanggan->username,
            'alamat'         => $pelanggan->alamat,
            'nomor_kwh'      => $pelanggan->nomor_kwh,
            'daya'           => $pelanggan->daya,
            'tarifperkwh'    => $pelanggan->tarifperkwh,
        ];

        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/profil', $data);
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }

    public function ubah_password()
    {
        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/ubah_password');
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }

    public function update_password()
    {
        $this->load->model('M_pelanggan');
        $id = $this->session->userdata('id_pelanggan');

        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');

        $pelanggan = $this->M_pelanggan->get_by_id($id);

        if (!password_verify($password_lama, $pelanggan->password)) {
            $this->session->set_flashdata('error', 'Password lama salah!');
            redirect('pelanggan/ubah_password');
        }

        if ($password_baru != $konfirmasi_password) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak cocok!');
            redirect('pelanggan/ubah_password');
        }

        $data = ['password' => password_hash($password_baru, PASSWORD_DEFAULT)];
        $this->M_pelanggan->update($id, $data);

        $this->session->set_flashdata('success', 'Password berhasil diubah!');
        redirect('pelanggan/ubah_password');
    }

    public function update_profil()
    {
        $this->load->model('M_pelanggan');

        $id = $this->input->post('id_pelanggan');
        $nama = $this->input->post('nama_pelanggan');
        $username = $this->input->post('username');
        $alamat = $this->input->post('alamat');

        $data = [
            'nama_pelanggan' => $nama,
            'username'       => $username,
            'alamat'         => $alamat
        ];

        $update = $this->M_pelanggan->update($id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
            $this->session->set_userdata('nama_pelanggan', $nama);
            $this->session->set_userdata('username', $username);
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil.');
        }

        redirect('pelanggan/profil');
    }

    public function penggunaan()
    {
        $this->load->model('M_penggunaan');
        $id = $this->session->userdata('id_pelanggan');

        $data['penggunaan'] = $this->M_penggunaan->get_by_pelanggan($id);

        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/penggunaan/penggunaan', $data);
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }

    public function tambah_penggunaan()
    {
        $this->load->model(['M_penggunaan', 'M_pelanggan']);

        $id = $this->session->userdata('id_pelanggan');
        $pelanggan = $this->M_pelanggan->get_by_id($id);
        $last = $this->M_penggunaan->get_last_meter($id);

        $data = [
            'meter_awal'     => $last ? $last->meter_akhir : 0,
            'bulan'          => date('F'),
            'tahun'          => date('Y'),
            'id_pelanggan'   => $pelanggan->id_pelanggan,
            'nama_pelanggan' => $pelanggan->nama_pelanggan,
            'tarifperkwh'    => $pelanggan->tarifperkwh,
            'daya'           => $pelanggan->daya
        ];

        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/penggunaan/tambah_penggunaan', $data);
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }

    public function simpan_penggunaan()
    {
        $this->load->model(['M_penggunaan', 'M_tagihan', 'M_pelanggan']);

        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $pelanggan = $this->M_pelanggan->get_by_id($id_pelanggan);

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->load->model('M_penggunaan');
        $cek_duplikat = $this->M_penggunaan->cek_penggunaan_bulanan($id_pelanggan, $bulan, $tahun);
        if ($cek_duplikat) {
            $this->session->set_flashdata('error', 'Penggunaan untuk bulan ini sudah ada!');
            redirect('pelanggan/penggunaan');
        }

        $id_penggunaan = 'PGN' . date('ymd') . sprintf("%03d", rand(1, 999));
        $meter_awal = $this->input->post('meter_awal');
        $meter_akhir = $this->input->post('meter_akhir');

        if ($meter_akhir <= $meter_awal) {
            $this->session->set_flashdata('error', 'Meter akhir harus lebih besar dari meter awal!');
            redirect('pelanggan/tambah_penggunaan');
        }

        // Simpan penggunaan
        $data_penggunaan = [
            'id_penggunaan' => $id_penggunaan,
            'id_pelanggan'  => $id_pelanggan,
            'bulan'         => $bulan,
            'tahun'         => $tahun,
            'meter_awal'    => $meter_awal,
            'meter_akhir'   => $meter_akhir,
        ];
        $this->M_penggunaan->insert($data_penggunaan);

        // Hitung dan simpan tagihan
        $jumlah_meter = $meter_akhir - $meter_awal;
        $tarif_perkwh = $pelanggan->tarifperkwh;
        $biaya_admin = 2500;
        $jumlah_bayar = ($jumlah_meter * $tarif_perkwh) + $biaya_admin;

        $this->session->set_flashdata('success', 'Penggunaan dan tagihan berhasil disimpan.');
        redirect('pelanggan/penggunaan');
    }

    public function hapus_penggunaan($id_penggunaan)
    {
        $this->load->model(['M_penggunaan', 'M_tagihan', 'M_pembayaran']);

        $tagihan = $this->M_tagihan->get_by_penggunaan($id_penggunaan);

        if ($tagihan && isset($tagihan->id_tagihan)) {
            $this->M_pembayaran->delete_by_tagihan($tagihan->id_tagihan);
            $this->M_tagihan->delete_by_penggunaan($id_penggunaan);
        }

        $this->M_penggunaan->delete($id_penggunaan);

        $this->session->set_flashdata('success', 'Data penggunaan dan tagihan berhasil dihapus!');
        redirect('pelanggan/penggunaan');
    }


    public function tagihan()
    {
        $this->load->model('M_tagihan');
        $id = $this->session->userdata('id_pelanggan');

        $data['tagihan'] = $this->M_tagihan->get_by_pelanggan($id);

        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/tagihan/tagihan', $data);
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }

    public function detail_tagihan($id = null)
    {
        if ($id === null) {
            show_404(); // atau redirect('pelanggan/tagihan');
        }

        $this->load->model('M_tagihan');
        $tagihan = $this->M_tagihan->get_detail($id);

        if (!$tagihan) {
            show_404();
        }

        $data['tagihan'] = $tagihan;

        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/tagihan/detail_tagihan', $data);
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }


    public function bayar($id_tagihan)
    {
        $this->load->model('M_tagihan');

        $tagihan = $this->M_tagihan->get_detail($id_tagihan);
        if (!$tagihan || $tagihan->status == 'Lunas') {
            show_404();
        }

        $data['tagihan'] = $tagihan;

        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/tagihan/form_pembayaran', $data);
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }

    public function proses_pembayaran()
    {
        $this->load->model(['M_pembayaran', 'M_tagihan']);

        $data = [
            'id_pembayaran'       => 'PB' . date('ymd') . sprintf("%03d", rand(1, 999)),
            'id_tagihan'          => $this->input->post('id_tagihan'),
            'id_pelanggan'        => $this->session->userdata('id_pelanggan'),
            'tanggal_pembayaran'  => $this->input->post('tanggal_bayar'),
            'total_bayar'         => $this->input->post('jumlah_bayar'),
            'status'              => 'Belum Lunas'
        ];

        $this->M_pembayaran->insert($data);

        $this->M_tagihan->update($data['id_tagihan'], ['status' => 'Belum Lunas']);

        $this->session->set_flashdata('success', 'Pembayaran berhasil, menunggu konfirmasi admin.');
        redirect('pelanggan/tagihan');
    }

    public function daftar_pembayaran()
    {
        $this->load->model(['M_pembayaran']);

        $id_pelanggan = $this->session->userdata('id_pelanggan');

        // Menggunakan M_pembayaran untuk kerapihan
        $data['histori'] = $this->M_pembayaran->get_histori_by_pelanggan($id_pelanggan);

        $this->load->view('layouts/pelanggan/pelanggan_header');
        $this->load->view('layouts/pelanggan/pelanggan_navbar');
        $this->load->view('layouts/pelanggan/pelanggan_sidebar');
        $this->load->view('pelanggan/pembayaran/daftar_pembayaran', $data);
        $this->load->view('layouts/pelanggan/pelanggan_footer');
    }
}
