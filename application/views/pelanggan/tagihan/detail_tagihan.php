<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h4 class="page-title">Detail Tagihan : <?= $tagihan->id_tagihan ?></h4>

            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">NO. <?= $tagihan->id_tagihan ?></h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <td><?= $tagihan->nama_pelanggan ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor KWH</th>
                                    <td><?= $tagihan->nomor_kwh ?></td>
                                </tr>
                                <tr>
                                    <th>Periode</th>
                                    <td><?= $tagihan->bulan . ' ' . $tagihan->tahun ?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Meter</th>
                                    <td><?= number_format($tagihan->jumlah_meter, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <th>Total Tagihan</th>
                                    <td>Rp <?= number_format($tagihan->jumlah_bayar - 2500, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <th>Biaya Admin</th>
                                    <td>Rp 2.500,00</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php if ($tagihan->status == 'Lunas'): ?>
                                        <span class="text-success font-weight-bold"><?= $tagihan->status ?></span>
                                        <?php else: ?>
                                        <span class="text-danger font-weight-bold"><?= $tagihan->status ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="text-primary font-weight-bold">
                                        Rp <?= number_format($tagihan->jumlah_bayar, 0, ',', '.') ?>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="card-footer">
                            <?php if ($tagihan->status == 'Belum Lunas'): ?>
                            <a href="<?= base_url('pelanggan/bayar/' . $tagihan->id_tagihan) ?>"
                                class="btn btn-primary btn-block">Buat Pembayaran</a>
                            <?php endif; ?>
                            <a href="<?= base_url('pelanggan/tagihan') ?>" class="btn btn-link">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>