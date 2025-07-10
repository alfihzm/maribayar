<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Penggunaan</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Daftar Penggunaan</div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Penggunaan</th>
                                            <th>ID Pelanggan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Meter Awal</th>
                                            <th>Meter Akhir</th>
                                            <th>Daya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($penggunaan)): ?>
                                            <?php foreach ($penggunaan as $p): ?>
                                                <tr>
                                                    <td><?php echo $p->id_penggunaan; ?></td>
                                                    <td><?php echo $p->id_pelanggan; ?></td>
                                                    <td><?php echo $p->nama_pelanggan; ?></td>
                                                    <td><?php echo $p->bulan; ?></td>
                                                    <td><?php echo $p->tahun; ?></td>
                                                    <td><?php echo $p->meter_awal; ?></td>
                                                    <td><?php echo $p->meter_akhir; ?></td>
                                                    <td><?php echo $p->daya; ?> VA</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center text-muted">Belum ada data penggunaan.
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