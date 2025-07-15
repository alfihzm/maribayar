<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard Pelanggan</h4>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-file"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Penggunaan</p>
                                        <h4 class="card-title"><?= $total_penggunaan ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-stats card-warning card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-interface-6"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Tagihan Aktif</p>
                                        <h4 class="card-title"><?= $total_tagihan ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-credit-card"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Pembayaran</p>
                                        <h4 class="card-title"><?= $total_pembayaran ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Selamat Datang, <?= $this->session->userdata('nama_pelanggan') ?>!
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                Di halaman ini Anda dapat melihat informasi tagihan listrik Anda, melakukan pembayaran,
                                dan memantau histori penggunaan.
                            </p>
                            <ul>
                                <li>Gunakan menu "Penggunaan" untuk memasukkan data pemakaian listrik Anda.</li>
                                <li>Menu "Tagihan" akan menampilkan jumlah tagihan yang perlu Anda bayar.</li>
                                <li>Setelah membayar, admin akan memverifikasi pembayaran Anda.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>