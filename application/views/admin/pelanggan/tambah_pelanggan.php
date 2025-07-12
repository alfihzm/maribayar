<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Pelanggan</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <form action="<?= base_url('admin/simpan_pelanggan') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_pelanggan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KWH</label>
                                    <input type="text" name="nomor_kwh" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tarif</label>
                                    <select name="id_tarif" class="form-control" required>
                                        <option value="">-- Pilih Tarif --</option>
                                        <?php foreach ($tarif as $t): ?>
                                        <option value="<?= $t->id_tarif ?>">
                                            <?= $t->daya ?> VA - Rp
                                            <?= number_format($t->tarifperkwh, 0, ',', '.') ?>/kWh
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="alert alert-info mt-2">
                                    Password default: <strong>pelanggan123</strong>
                                </div>
                            </div>
                            <div class="card-action text-right">
                                <a href="<?= base_url('admin/pelanggan') ?>" class="btn btn-danger btn-round">Batal</a>
                                <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>