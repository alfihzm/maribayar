<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h4 class="page-title">Profil Saya</h4>
                <a href="<?= site_url('pelanggan/ubah_password') ?>" class="btn btn-primary btn-round">
                    <i class="fas fa-key mr-1"></i> Ubah Password
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
                    <!-- Card Profil -->
                    <div class="card card-profile">
                        <div class="card-header"
                            style="background-image: url('<?= base_url('assets/img/bg-profile.jpg') ?>')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="<?= base_url('assets/img/users/default.jpg') ?>"
                                        class="avatar-img rounded-circle" alt="Foto">
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="mb-1"><?= $nama_pelanggan ?></h4>
                            <p class="text-muted mb-2"><?= $username ?></p>
                            <span class="badge badge-info">Pelanggan</span>
                        </div>
                    </div>

                    <!-- Informasi Akun -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Akun</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label><i class="fas fa-id-badge mr-1 text-primary"></i> ID Pelanggan</label>
                                <input type="text" class="form-control" value="<?= $id_pelanggan ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-bolt mr-1 text-primary"></i> No. KWH</label>
                                <input type="text" class="form-control" value="<?= $nomor_kwh ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt mr-1 text-primary"></i> Alamat</label>
                                <textarea class="form-control" rows="3" readonly><?= $alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-plug mr-1 text-primary"></i> Daya</label>
                                <input type="text" class="form-control" value="<?= $daya ?> VA" readonly>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-coins mr-1 text-primary"></i> Tarif / kWh</label>
                                <input type="text" class="form-control"
                                    value="Rp <?= number_format($tarifperkwh, 0, ',', '.') ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Form -->
                    <form action="<?= base_url('pelanggan/update_profil') ?>" method="post">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit Profil</div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_pelanggan" class="form-control"
                                        value="<?= $nama_pelanggan ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= $username ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3"><?= $alamat ?></textarea>
                                </div>
                            </div>
                            <div class="card-action text-right">
                                <button type="submit" class="btn btn-success btn-round">
                                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>