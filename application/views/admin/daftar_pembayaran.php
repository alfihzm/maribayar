<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Pembayaran</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Daftar Pembayaran</div>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-primary btn-round btn-sm">
                                        <i class="fas fa-plus"></i> Tambah Pembayaran
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Pelanggan</th>
                                            <th>Periode</th>
                                            <th>Biaya Admin</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($pembayaran)): ?>
                                        <?php foreach ($pembayaran as $p): ?>
                                        <tr>
                                            <td><?php echo $p->id_pembayaran; ?></td>
                                            <td><?php echo $p->nama_pelanggan; ?></td>
                                            <td><?php echo $p->bulan . ' ' . $p->tahun; ?></td>
                                            <td>Rp <?php echo number_format($p->biaya_admin, 0, ',', '.'); ?></td>
                                            <td>Rp <?php echo number_format($p->total_bayar, 0, ',', '.'); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($p->tanggal_pembayaran)); ?></td>
                                            <td><?php echo $p->nama_admin; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">Belum ada data pembayaran.
                                            </td>
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