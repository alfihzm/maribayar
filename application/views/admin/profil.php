<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h4 class="page-title">Profil Saya</h4>
                <a href="<?php echo site_url('admin/ubah_password'); ?>" class="btn btn-primary btn-round">
                    <i class="fas fa-key mr-1"></i> Ubah Password
                </a>
            </div>

            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card card-profile">
                        <div class="card-header"
                            style="background-image: url('<?php echo base_url('assets/img/bg-profile.jpg'); ?>')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="<?php echo base_url('assets/img/users/default.jpg'); ?>" alt="Foto Admin"
                                        class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="user-profile">
                                <h4 class="mb-1"><?php echo $user_name; ?></h4>
                                <p class="text-muted mb-2"><?php echo $username; ?></p>
                                <span class="badge badge-info">
                                    <?php echo ($user_level == 1) ? 'Administrator' : 'Petugas'; ?>
                                </span>

                                <div class="mt-4">
                                    <a href="<?php echo site_url('admin/edit_profile'); ?>"
                                        class="btn btn-info btn-sm btn-round">
                                        <i class="fas fa-user-edit mr-1"></i> Edit Profil
                                    </a>
                                    <a href="<?php echo site_url('auth/logout'); ?>"
                                        class="btn btn-danger btn-sm btn-round ml-2">
                                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Akun -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Akun</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><i class="fas fa-id-badge mr-2 text-primary"></i> ID User</span>
                                    <span class="text-muted"><?php echo $user_id; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><i class="fas fa-user-tag mr-2 text-primary"></i> Role</span>
                                    <span
                                        class="text-muted"><?php echo ($user_level == 1) ? 'Administrator' : 'Petugas'; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><i class="fas fa-clock mr-2 text-primary"></i> Login Terakhir</span>
                                    <span class="text-muted">Baru saja</span> <!-- Placeholder -->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Info -->
                </div>
            </div>
        </div>
    </div>
</div>