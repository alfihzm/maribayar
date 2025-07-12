<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h4 class="page-title">Detail Pelanggan</h4>
                <a href="<?= base_url('admin/pelanggan') ?>" class="btn btn-secondary btn-round">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php endif; ?>


            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <form action="<?= base_url('admin/update_pelanggan/' . $pelanggan->id_pelanggan) ?>"
                            method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_pelanggan" value="<?= $pelanggan->nama_pelanggan ?>"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" value="<?= $pelanggan->username ?>"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KWH</label>
                                    <input type="text" name="nomor_kwh" value="<?= $pelanggan->nomor_kwh ?>"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control"
                                        required><?= $pelanggan->alamat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tarif</label>
                                    <select name="id_tarif" class="form-control" required>
                                        <?php foreach ($tarif as $t): ?>
                                        <option value="<?= $t->id_tarif ?>"
                                            <?= $t->id_tarif == $pelanggan->id_tarif ? 'selected' : '' ?>>
                                            <?= $t->daya ?> VA - Rp
                                            <?= number_format($t->tarifperkwh, 0, ',', '.') ?>/kWh
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-action text-right">
                                <button type="submit" class="btn btn-success btn-round">
                                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>