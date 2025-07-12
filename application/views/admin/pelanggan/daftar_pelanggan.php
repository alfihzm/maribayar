<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Pelanggan</h4>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Daftar Pelanggan</div>
                                <div class="card-tools">
                                    <a href="<?= base_url('admin/tambah_pelanggan') ?>"
                                        class="btn btn-primary btn-round btn-sm">
                                        <i class="fas fa-user-plus"></i> Tambah Pelanggan
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
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>No. KWH</th>
                                            <th>Daya</th>
                                            <th>Tarif/KWh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($pelanggan)): ?>
                                        <?php $no = 1;
                                            foreach ($pelanggan as $p): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?php echo $p->nama_pelanggan; ?></td>
                                            <td><?php echo $p->username; ?></td>
                                            <td><?php echo $p->nomor_kwh; ?></td>
                                            <td><?php echo $p->daya; ?> VA</td>
                                            <td>Rp <?php echo number_format($p->tarifperkwh, 0, ',', '.'); ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/detail_pelanggan/' . $p->id_pelanggan) ?>"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?= base_url('admin/hapus_pelanggan/' . $p->id_pelanggan) ?>"
                                                    onclick="return confirm('Yakin ingin menghapus pelanggan ini?')"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">Belum ada data pelanggan.
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
    </div> <!-- end content -->
</div> <!-- end main-panel -->