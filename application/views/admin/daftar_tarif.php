<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Tarif</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Daftar Tarif</div>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-primary btn-round btn-sm">
                                        <i class="fas fa-plus"></i> Tambah Tarif
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
                                            <th>Daya (VA)</th>
                                            <th>Tarif per KWh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($tarif)): ?>
                                            <?php foreach ($tarif as $t): ?>
                                                <tr>
                                                    <td><?php echo $t->id_tarif; ?></td>
                                                    <td><?php echo number_format($t->daya, 0, ',', '.'); ?> VA</td>
                                                    <td>Rp <?php echo number_format($t->tarifperkwh, 0, ',', '.'); ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="#" class="btn btn-sm btn-danger"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">Belum ada data tarif.</td>
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