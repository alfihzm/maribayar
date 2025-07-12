<?php
$this->load->view('layouts/admin/admin_header');
$this->load->view('layouts/admin/admin_navbar');
$this->load->view('layouts/admin/admin_sidebar');
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Detail Tagihan</h4>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h6><strong>NO. <?= $tagihan->id_tagihan ?></strong></h6>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <td><?= $pelanggan->nama_pelanggan ?></td>
                        </tr>
                        <tr>
                            <th>Nomor KWH</th>
                            <td><?= $pelanggan->nomor_kwh ?></td>
                        </tr>
                        <tr>
                            <th>Total Tagihan</th>
                            <td>Rp <?= number_format($total_tagihan, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th>Biaya Admin</th>
                            <td>Rp <?= number_format($biaya_admin, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>Rp <?= number_format($total_bayar, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= $tagihan->status ?></td>
                        </tr>
                    </table>

                    <div class="mt-3 d-flex justify-content-start gap-2">
                        <a href="<?= base_url('admin/tagihan') ?>" class="btn btn-secondary btn-round">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <?php if ($tagihan->status == 'Menunggu Konfirmasi'): ?>
                        <a href="<?= base_url('admin/tagihan/tolak_pembayaran/' . $tagihan->id_tagihan) ?>"
                            class="btn btn-danger btn-round">
                            <i class="fas fa-times mr-1"></i> Tolak Pembayaran
                        </a>
                        <a href="<?= base_url('admin/tagihan/konfirmasi_pembayaran/' . $tagihan->id_tagihan) ?>"
                            class="btn btn-success btn-round">
                            <i class="fas fa-check mr-1"></i> Setujui Pembayaran
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('layouts/admin/admin_footer'); ?>