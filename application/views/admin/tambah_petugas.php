<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Petugas</h4>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Tambah Petugas</div>
                        </div>
                        <form action="<?= base_url('admin/simpan_petugas') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input type="text" name="nama_admin" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="alert alert-info">
                                    Password default untuk petugas adalah <strong>petugas123</strong>
                                </div>
                            </div>
                            <div class="card-action text-right">
                                <a href="<?= base_url('admin/petugas') ?>" class="btn btn-danger btn-round">Batal</a>
                                <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>