<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Tarif</h4>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Daftar Tarif</div>
                                <div class="card-tools">
                                    <a href="<?= base_url('admin/tambah_tarif') ?>"
                                        class="btn btn-primary btn-round btn-sm">
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
                                                <a href="<?= base_url('admin/edit_tarif/' . $t->id_tarif) ?>"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin/hapus_tarif/' . $t->id_tarif) ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus tarif ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
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