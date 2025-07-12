<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold">Data Penggunaan</h3>
                <a href="<?= base_url('pelanggan/tambah_penggunaan') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Input Penggunaan
                </a>
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

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID Penggunaan</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Meter Awal</th>
                                    <th>Meter Akhir</th>
                                    <th>Daya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($penggunaan)): ?>
                                <?php foreach ($penggunaan as $p): ?>
                                <tr>
                                    <td><?= $p->id_penggunaan ?></td>
                                    <td><?= $p->bulan ?></td>
                                    <td><?= $p->tahun ?></td>
                                    <td><?= $p->meter_awal ?></td>
                                    <td><?= $p->meter_akhir ?></td>
                                    <td><?= $p->daya ?> VA</td>
                                    <td>
                                        <a href="<?= base_url('pelanggan/hapus_penggunaan/' . $p->id_penggunaan) ?>"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data penggunaan.</td>
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