<?php
$this->load->view('layouts/admin/admin_header');
$this->load->view('layouts/admin/admin_navbar');
$this->load->view('layouts/admin/admin_sidebar');
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Detail Tagihan : <?= $tagihan->id_tagihan ?></h4>
            </div>

            <div class="card mt-3 mx-auto" style="max-width: 600px;">
                <div class="card-body">
                    <h6 class="mb-3"><strong>NO. <?= $tagihan->id_tagihan ?></strong></h6>
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <td class="text-right"><?= $pelanggan->nama_pelanggan ?></td>
                        </tr>
                        <tr>
                            <th>Nomor KWH</th>
                            <td class="text-right"><?= $pelanggan->nomor_kwh ?></td>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <td class="text-right">
                                <?= $penggunaan ? $penggunaan->bulan . ' ' . $penggunaan->tahun : '-' ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah Meter</th>
                            <td class="text-right"><?= $tagihan->jumlah_meter ?></td>
                        </tr>
                        <tr>
                            <th>Total Tagihan</th>
                            <td class="text-right">Rp <?= number_format($total_tagihan, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th>Biaya Admin</th>
                            <td class="text-right">Rp <?= number_format($biaya_admin, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td class="text-right">
                                <?php if ($tagihan->status == 'Menunggu Konfirmasi') {
                                    echo '<span class="text-warning">Menunggu Konfirmasi</span>';
                                } else {
                                    echo $tagihan->status;
                                } ?>
                            </td>
                        </tr>
                        <tr class="border-top">
                            <th><strong>Total</strong></th>
                            <td class="text-right"><strong>Rp <?= number_format($total_bayar, 0, ',', '.') ?></strong>
                            </td>
                        </tr>
                    </table>

                    <div class="mt-4 d-flex justify-content-between">
                        <a href="<?= base_url('admin/tagihan') ?>" class="btn btn-secondary">
                            Kembali
                        </a>
                        <?php if ($tagihan->status == 'Belum Lunas'): ?>
                            <div>
                                <a href="<?= base_url('admin/tolak_pembayaran/' . $tagihan->id_tagihan) ?>"
                                    class="btn btn-danger mr-2">
                                    Tolak Pembayaran
                                </a>
                                <a href="<?= base_url('admin/konfirmasi_pembayaran/' . $tagihan->id_tagihan) ?>"
                                    class="btn btn-warning">
                                    Setujui Pembayaran
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('layouts/admin/admin_footer'); ?>