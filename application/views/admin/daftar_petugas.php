<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Petugas</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Daftar Petugas</div>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-primary btn-round btn-sm">
                                        <i class="fas fa-user-plus"></i> Tambah Petugas
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($petugas)): ?>
                                        <?php foreach ($petugas as $p): ?>
                                        <tr>
                                            <td><?php echo $p->id_user; ?></td>
                                            <td><?php echo $p->nama_admin; ?></td>
                                            <td><?php echo $p->username; ?></td>
                                            <td><span class="badge badge-secondary">Petugas</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-sm btn-warning"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">Belum ada data petugas.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>