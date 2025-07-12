<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h4 class="page-title">Profil Petugas</h4>
                <a href="<?= site_url('admin/petugas') ?>" class="btn btn-secondary btn-round">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php endif; ?>

            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card card-profile">
                        <div class="card-header"
                            style="background-image: url('<?= base_url('assets/img/bg-profile.jpg') ?>')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="<?= base_url('assets/img/users/default.jpg') ?>" alt="Foto Petugas"
                                        class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="user-profile">
                                <h4 class="mb-1"><?= $user_name ?></h4>
                                <p class="text-muted mb-2"><?= $username ?></p>
                                <span class="badge badge-secondary">Petugas</span>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Akun</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><i class="fas fa-id-badge mr-2 text-primary"></i> ID User</span>
                                    <span class="text-muted"><?= $user_id ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><i class="fas fa-user-tag mr-2 text-primary"></i> Role</span>
                                    <span class="text-muted">Petugas</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><i class="fas fa-clock mr-2 text-primary"></i> Status</span>
                                    <span class="text-muted">Aktif</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Petugas</h4>
                        </div>
                        <form action="<?= base_url('admin/update_petugas/' . $user_id) ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input type="text" name="nama_admin" value="<?= $user_name ?>" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" value="<?= $username ?>" class="form-control"
                                        required>
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