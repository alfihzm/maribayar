<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">

                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $this->session->userdata('nama_pelanggan') ?>
                            <span class="user-level"> Pelanggan </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse"> Profil Saya </span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse"> Ubah Profil </span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse"> Pengaturan </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section"> Halaman Utama </h4>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pelanggan') ?>">
                        <i class="fas fa-door-open"></i>
                        <p> Beranda </p>
                    </a>
                    <a href="<?= base_url('pelanggan/profil'); ?>">
                        <i class="fas fa-user"></i>
                        <p> Profil </p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section"> Informasi </h4>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pelanggan/penggunaan') ?>">
                        <i class="fas fa-bolt"></i>
                        <p> Penggunaan </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pelanggan/tagihan') ?>">
                        <i class="fas fa-money-bill-wave"></i>
                        <p> Tagihan </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pelanggan/daftar_pembayaran') ?>">
                        <i class="fas fa-check"></i>
                        <p> Pembayaran </p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>