<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h3 class="fw-bold">Data Tagihan</h3>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>Detail</th>
                                    <th>ID Tagihan</th>
                                    <th>Periode</th>
                                    <th>Jumlah Meter</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($tagihan)): ?>
                                    <?php foreach ($tagihan as $row): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('pelanggan/detail_tagihan/' . $row->id_tagihan) ?>"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-info-circle"></i> Detail
                                                </a>
                                            </td>
                                            <td><?= $row->id_tagihan ?></td> <!-- ✅ tambahkan ini jika tidak ada -->
                                            <td><?= $row->bulan . ' ' . $row->tahun ?></td>
                                            <td><?= $row->jumlah_meter ?></td>
                                            <td>Rp <?= number_format($row->jumlah_bayar, 0, ',', '.') ?></td>
                                            <td>
                                                <?php if ($row->status == 'Lunas'): ?>
                                                    <span class="badge badge-success">Lunas</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Belum Lunas</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data tagihan.</td>
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