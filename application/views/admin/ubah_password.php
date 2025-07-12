<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h4 class="page-title">Ubah Password</h4>
                <a href="<?= base_url('admin/profil') ?>" class="btn btn-secondary btn-round">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
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

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="<?= base_url('admin/proses_ubah_password') ?>" method="post">
                        <div class="card">
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
                                    <i class="fas fa-key"></i> Ubah Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>