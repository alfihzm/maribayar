<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h4 class="page-title">Tambah Tarif</h4>
                <a href="<?= base_url('admin/tarif') ?>" class="btn btn-secondary btn-round">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="<?= base_url('admin/simpan_tarif') ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Daya (VA)</label>
                                    <input type="number" name="daya" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tarif per KWh (Rp)</label>
                                    <input type="number" name="tarifperkwh" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-action text-right">
                                <button type="submit" class="btn btn-primary btn-round">
                                    <i class="fas fa-save mr-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>