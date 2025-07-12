<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('auth/login');
        }

        $this->load->model('M_admin');
    }

    public function index()
    {
        $this->load->model('M_pelanggan');
        $data['total_pelanggan'] = $this->M_pelanggan->count_all();
        $data['recent_pelanggan'] = $this->M_pelanggan->get_recent();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function profil()
    {
        $data['user_id']     = $this->session->userdata('id_user');
        $data['user_name']   = $this->session->userdata('nama_admin');
        $data['username']    = $this->session->userdata('username');
        $data['user_level']  = $this->session->userdata('level');

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/profil', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function update_profil()
    {
        $this->load->model('M_user');

        $id_user = $this->session->userdata('id_user');
        $data = [
            'nama_admin' => $this->input->post('nama_admin'),
            'username'   => $this->input->post('username')
        ];

        $this->M_user->update($id_user, $data);

        $this->session->set_userdata('nama_admin', $data['nama_admin']);
        $this->session->set_userdata('username', $data['username']);

        $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
        redirect('admin/profil');
    }

    public function ubah_password()
    {
        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/ubah_password');
        $this->load->view('layouts/admin/admin_footer');
    }

    public function proses_ubah_password()
    {
        $this->load->model('M_user');

        $id_user       = $this->session->userdata('id_user');
        $password_lama = md5($this->input->post('password_lama'));
        $password_baru = $this->input->post('password_baru');
        $konfirmasi    = $this->input->post('konfirmasi_password');

        $user = $this->M_user->get_by_id($id_user);

        if ($user->password != $password_lama) {
            $this->session->set_flashdata('error', 'Password lama salah!');
            redirect('admin/ubah_password');
        } elseif ($password_baru != $konfirmasi) {
            $this->session->set_flashdata('error', 'Password baru dan konfirmasi tidak sama!');
            redirect('admin/ubah_password');
        } else {
            $this->M_user->update($id_user, ['password' => md5($password_baru)]);
            $this->session->set_flashdata('success', 'Password berhasil diubah!');
            redirect('admin/ubah_password');
        }
    }

    public function pelanggan()
    {
        $this->load->model('M_pelanggan');
        $data['pelanggan'] = $this->M_pelanggan->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/pelanggan/daftar_pelanggan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function tambah_pelanggan()
    {
        $this->load->model('M_tarif');
        $data['tarif'] = $this->M_tarif->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/pelanggan/tambah_pelanggan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function simpan_pelanggan()
    {
        $this->load->model('M_pelanggan');
        $data = [
            'username'        => $this->input->post('username'),
            'password'        => md5('pelanggan123'),
            'nomor_kwh'       => $this->input->post('nomor_kwh'),
            'nama_pelanggan'  => $this->input->post('nama_pelanggan'),
            'alamat'          => $this->input->post('alamat'),
            'id_tarif'        => $this->input->post('id_tarif')
        ];
        $this->M_pelanggan->insert($data);
        $this->session->set_flashdata('success', 'Pelanggan berhasil ditambahkan!');
        redirect('admin/pelanggan');
    }

    public function detail_pelanggan($id)
    {
        $this->load->model('M_pelanggan');
        $this->load->model('M_tarif');

        $pelanggan = $this->M_pelanggan->get_by_id($id);

        if (!$pelanggan) {
            show_404();
        }

        $data['pelanggan'] = $pelanggan;
        $data['tarif'] = $this->M_tarif->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/pelanggan/detail_pelanggan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function update_pelanggan($id)
    {
        $this->load->model('M_pelanggan');

        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'username'       => $this->input->post('username'),
            'nomor_kwh'      => $this->input->post('nomor_kwh'),
            'alamat'         => $this->input->post('alamat'),
            'id_tarif'       => $this->input->post('id_tarif')
        ];

        $this->M_pelanggan->update($id, $data);
        $this->session->set_flashdata('success', 'Data pelanggan berhasil diperbarui!');
        redirect('admin/detail_pelanggan/' . $id);
    }

    public function hapus_pelanggan($id)
    {
        $this->load->model('M_pelanggan');
        $this->M_pelanggan->delete($id);
        $this->session->set_flashdata('success', 'Pelanggan berhasil dihapus!');
        redirect('admin/pelanggan');
    }

    public function petugas()
    {
        $this->load->model('M_user');
        $data['petugas'] = $this->M_user->get_petugas();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/petugas/daftar_petugas', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function tambah_petugas()
    {
        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/petugas/tambah_petugas');
        $this->load->view('layouts/admin/admin_footer');
    }

    public function simpan_petugas()
    {
        $this->load->model('M_user');

        $data = [
            'username'   => $this->input->post('username'),
            'password'   => md5('petugas123'),
            'nama_admin' => $this->input->post('nama_admin'),
            'id_level'   => 2
        ];

        $this->M_user->insert($data);
        $this->session->set_flashdata('success', 'Petugas berhasil ditambahkan!');
        redirect('admin/petugas');
    }

    public function detail_petugas($id)
    {
        $this->load->model('M_user');
        $petugas = $this->M_user->get_by_id($id);

        if (!$petugas) {
            show_404();
        }

        $data = [
            'user_id'     => $petugas->id_user,
            'user_name'   => $petugas->nama_admin,
            'username'    => $petugas->username,
            'user_level'  => $petugas->id_level
        ];

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/petugas/detail_petugas', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function update_petugas($id)
    {
        $this->load->model('M_user');

        $data = [
            'nama_admin' => $this->input->post('nama_admin'),
            'username'   => $this->input->post('username'),
        ];

        $this->M_user->update($id, $data);
        $this->session->set_flashdata('success', 'Data petugas berhasil diperbarui!');
        redirect('admin/detail_petugas/' . $id);
    }

    public function hapus_petugas($id)
    {
        $this->load->model('M_user');

        $hapus = $this->M_user->delete($id);
        if ($hapus) {
            $this->session->set_flashdata('success', 'Petugas berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus petugas.');
        }

        redirect('admin/petugas');
    }


    public function tarif()
    {
        $this->load->model('M_tarif');
        $data['tarif'] = $this->M_tarif->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/tarif/daftar_tarif', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function tambah_tarif()
    {
        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/tarif/tambah_tarif');
        $this->load->view('layouts/admin/admin_footer');
    }

    public function simpan_tarif()
    {
        $this->load->model('M_tarif');

        $data = [
            'daya' => $this->input->post('daya'),
            'tarifperkwh' => $this->input->post('tarifperkwh')
        ];

        $this->M_tarif->insert($data);
        $this->session->set_flashdata('success', 'Tarif berhasil ditambahkan!');
        redirect('admin/tarif');
    }

    public function edit_tarif($id)
    {
        $this->load->model('M_tarif');
        $data['tarif'] = $this->M_tarif->get_by_id($id);

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/tarif/edit_tarif', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function update_tarif()
    {
        $this->load->model('M_tarif');

        $id = $this->input->post('id_tarif');
        $data = [
            'daya' => $this->input->post('daya'),
            'tarifperkwh' => $this->input->post('tarifperkwh')
        ];

        $this->M_tarif->update($id, $data);
        $this->session->set_flashdata('success', 'Tarif berhasil diperbarui!');
        redirect('admin/tarif');
    }

    public function hapus_tarif($id)
    {
        $this->load->model('M_tarif');
        $this->M_tarif->delete($id);
        $this->session->set_flashdata('success', 'Tarif berhasil dihapus!');
        redirect('admin/tarif');
    }

    public function penggunaan()
    {
        $this->load->model('M_penggunaan');
        $data['penggunaan'] = $this->M_penggunaan->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/daftar_penggunaan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function tagihan()
    {
        $this->load->model('M_tagihan');
        $data['tagihan'] = $this->M_tagihan->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/tagihan/daftar_tagihan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function detail_tagihan($id_tagihan)
    {
        $this->load->model(['M_tagihan', 'M_pelanggan', 'M_penggunaan']);

        $tagihan = $this->M_tagihan->get_by_id($id_tagihan);
        if (!$tagihan) {
            $this->session->set_flashdata('error', 'Tagihan tidak ditemukan.');
            redirect('admin/tagihan');
        }

        $pelanggan = $this->M_pelanggan->get_by_id($tagihan->id_pelanggan);
        $penggunaan = $this->M_penggunaan->get_by_id($tagihan->id_penggunaan);

        $data = [
            'tagihan' => $tagihan,
            'pelanggan' => $pelanggan,
            'penggunaan' => $penggunaan,
            'total_tagihan' => ($tagihan->jumlah_meter * $pelanggan->tarifperkwh),
            'biaya_admin' => 2500,
            'total_bayar' => ($tagihan->jumlah_meter * $pelanggan->tarifperkwh) + 2500
        ];

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/tagihan/detail_tagihan', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function setujui_pembayaran($id_tagihan)
    {
        $this->load->model('M_tagihan');
        $this->M_tagihan->update($id_tagihan, ['status' => 'Lunas']);
        $this->session->set_flashdata('success', 'Pembayaran telah disetujui dan tagihan ditandai sebagai Lunas.');
        redirect('admin/tagihan');
    }

    public function tolak_pembayaran($id_tagihan)
    {
        $this->load->model('M_tagihan');
        $this->M_tagihan->update($id_tagihan, ['status' => 'Belum Lunas']);
        $this->session->set_flashdata('success', 'Pembayaran ditolak, status tagihan diubah menjadi Belum Lunas.');
        redirect('admin/tagihan');
    }

    public function pembayaran()
    {
        $this->load->model('M_pembayaran');
        $data['pembayaran'] = $this->M_pembayaran->get_all();

        $this->load->view('layouts/admin/admin_header');
        $this->load->view('layouts/admin/admin_navbar');
        $this->load->view('layouts/admin/admin_sidebar');
        $this->load->view('admin/daftar_pembayaran', $data);
        $this->load->view('layouts/admin/admin_footer');
    }

    public function konfirmasi_pembayaran($id_pembayaran)
    {
        $this->load->model(['M_pembayaran', 'M_tagihan']);

        $pembayaran = $this->M_pembayaran->get_by_id($id_pembayaran);

        $this->M_pembayaran->update($id_pembayaran, ['status' => 'Dikonfirmasi']);

        $this->M_tagihan->update($pembayaran->id_tagihan, ['status' => 'Lunas']);

        $this->session->set_flashdata('success', 'Pembayaran berhasil dikonfirmasi!');
        redirect('admin/pembayaran');
    }
}