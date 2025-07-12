<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"> Data Tagihan </h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Daftar Tagihan</div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Detail</th>
                                            <th>ID Tagihan</th>
                                            <th>ID Penggunaan</th>
                                            <th>Pelanggan</th>
                                            <th>Periode</th>
                                            <th>Jumlah Meter</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($tagihan)): ?>
                                        <?php foreach ($tagihan as $t): ?>
                                        <?php
                                                $jumlah_meter = $t->jumlah_meter;
                                                $tarif = $t->tarifperkwh;
                                                $jumlah_bayar = $jumlah_meter * $tarif;
                                                ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('admin/detail_tagihan/' . $t->id_tagihan) ?>"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-info-circle"></i> Detail
                                                </a>
                                            </td>
                                            <td><?php echo $t->id_tagihan; ?></td>
                                            <td><?php echo $t->id_penggunaan; ?></td>
                                            <td><?php echo $t->nama_pelanggan; ?></td>
                                            <td><?php echo $t->bulan . ' ' . $t->tahun; ?></td>
                                            <td><?php echo $t->jumlah_meter; ?> kWh</td>
                                            <td>Rp <?php echo number_format($jumlah_bayar, 0, ',', '.'); ?></td>
                                            <td>
                                                <?php if (strtolower($t->status) == 'lunas'): ?>
                                                <span class="badge badge-success">Lunas</span>
                                                <?php else: ?>
                                                <span class="badge badge-warning">Belum</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada data tagihan.</td>
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
    </div>
</div>