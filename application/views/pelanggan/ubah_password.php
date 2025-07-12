<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Ubah Password</h4>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
            <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <form action="<?= base_url('pelanggan/update_password') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" name="password_lama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="password_baru" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" name="konfirmasi_password" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-action text-right">
                                <button type="submit" class="btn btn-primary btn-round">
                                    <i class="fas fa-save mr-1"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>