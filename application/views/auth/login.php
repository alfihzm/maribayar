<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> MariBayar Login </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url('assets/img/icon.ico" type="image/x-icon') ?>" />

    <script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/azzara.min.css') ?>">
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center"> MariBayar </h3>

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('auth/proses_login') ?>" method="post">
                <div class="form-group form-floating-label">
                    <input id="username" name="username" type="text" class="form-control input-border-bottom" required>
                    <label for="username" class="placeholder">Username</label>
                </div>
                <div class="form-group form-floating-label">
                    <input id="password" name="password" type="password" class="form-control input-border-bottom"
                        required>
                    <label for="password" class="placeholder">Password</label>
                    <div class="show-password">
                        <i class="flaticon-interface"></i>
                    </div>
                </div>
                <div class="form-action mb-3">
                    <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
                </div>

                <div class="login-account">
                    <span class="msg">Belum Punya Akun?</span>
                    <a href="#" id="show-signup" class="link"> Registrasi </a>
                </div>

                <div class="login-account">
                    <a href="<?= base_url() ?>" id="back" class="link">Kembali</a>
                </div>
            </form>

        </div>

        <div class="container container-signup animated fadeIn">
            <h3 class="text-center"> Registrasi Pelanggan </h3>
            <form action="<?= site_url('auth/register') ?>" method="post">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group form-floating-label">
                            <input id="fullname" name="nama_pelanggan" type="text"
                                class="form-control input-border-bottom" required>
                            <label for="fullname" class="placeholder">Nama Lengkap</label>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group form-floating-label">
                            <input id="nomorkwh" name="nomor_kwh" type="text" class="form-control input-border-bottom"
                                required>
                            <label for="nomorkwh" class="placeholder">Nomor KWH</label>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group form-floating-label">
                            <input id="email" name="username" type="text" class="form-control input-border-bottom"
                                required>
                            <label for="email" class="placeholder">Username</label>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group form-floating-label">
                            <select id="id_tarif" name="id_tarif" class="form-control input-border-bottom" required>
                                <option value="" disabled selected></option>
                                <option value="1">450 VA</option>
                                <option value="2">900 VA</option>
                                <option value="3">1300 VA</option>
                            </select>
                            <label for="id_tarif" class="placeholder">Pilih Daya Listrik</label>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group form-floating-label">
                            <input id="passwordsignin" name="password" type="password"
                                class="form-control input-border-bottom" required>
                            <label for="passwordsignin" class="placeholder">Password</label>
                            <div class="show-password"><i class="flaticon-interface"></i></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group form-floating-label">
                            <input id="confirmpassword" name="confirmpassword" type="password"
                                class="form-control input-border-bottom" required>
                            <label for="confirmpassword" class="placeholder">Konfirmasi Password</label>
                            <div class="show-password"><i class="flaticon-interface"></i></div>
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <div class="form-group form-floating-label">
                            <input id="alamat" name="alamat" type="text" class="form-control input-border-bottom"
                                required>
                            <label for="alamat" class="placeholder">Alamat</label>
                        </div>
                    </div>

                </div>
                <div class="form-action d-flex justify-content-between mt-3"> <button type="submit"
                        class="btn btn-primary btn-rounded btn-login mr-2">Daftar</button>
                    <a href="#" id="show-signin" class="btn btn-danger btn-rounded btn-login">Batal</a>
                </div>
            </form>
        </div>

    </div>
    <script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/ready.js') ?>"></script>
</body>

</html>