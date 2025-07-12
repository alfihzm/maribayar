<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h4 class="page-title">Pembayaran : <?= $tagihan->id_tagihan ?></h4>

            <div class="row">
                <!-- Form Pembayaran -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('pelanggan/proses_pembayaran') ?>" method="post">
                                <input type="hidden" name="id_tagihan" value="<?= $tagihan->id_tagihan ?>">
                                <div class="form-group">
                                    <label>Tanggal Bayar</label>
                                    <input type="date" name="tanggal_bayar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Bayar</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" class="form-control"
                                            value="<?= number_format($tagihan->jumlah_bayar, 0, ',', '.') ?>" readonly>
                                    </div>
                                    <input type="hidden" name="jumlah_bayar" value="<?= $tagihan->jumlah_bayar ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th>ID Tagihan</th>
                                    <td><?= $tagihan->id_tagihan ?></td>
                                </tr>
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
                                    <td><?= $tagihan->jumlah_meter ?></td>
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
                                    <th class="font-weight-bold">Total</th>
                                    <td class="text-primary font-weight-bold">
                                        Rp <?= number_format($tagihan->jumlah_bayar, 0, ',', '.') ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>