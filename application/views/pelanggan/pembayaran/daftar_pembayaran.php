<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h4 class="page-title">Histori Pembayaran</h4>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Periode</th>
                                    <th>Jumlah Meter</th>
                                    <th>Total Tagihan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($histori)): ?>
                                    <?php foreach ($histori as $h): ?>
                                        <tr class="text-center">
                                            <td><?= date('d-m-Y', strtotime($h->tanggal_pembayaran)) ?></td>
                                            <td><?= $h->bulan . ' ' . $h->tahun ?></td>
                                            <td><?= number_format($h->jumlah_meter, 0, ',', '.') ?> kWh</td>
                                            <td>Rp <?= number_format($h->total_bayar, 0, ',', '.') ?></td>
                                            <td><span class="badge badge-success"><?= $h->status ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada histori pembayaran.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>