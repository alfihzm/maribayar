<?php
$bulan_ini = date('F');
$tahun_ini = date('Y');
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">

            <div class="page-header mb-4">
                <h4 class="page-title">Data Penggunaan Periode <?= $bulan_ini . ' ' . $tahun_ini ?></h4>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <form action="<?= base_url('pelanggan/simpan_penggunaan') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <input type="text" name="bulan" class="form-control" value="<?= $bulan_ini ?>"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="<?= $tahun_ini ?>"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Meter Awal</label>
                                    <input type="number" name="meter_awal" class="form-control"
                                        value="<?= $meter_awal ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Meter Akhir</label>
                                    <input type="number" name="meter_akhir" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-start">
                                <a href="<?= base_url('pelanggan/penggunaan') ?>" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info Pelanggan -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Penggunaan untuk periode:</strong><br><?= $bulan_ini . ' ' . $tahun_ini ?></p>
                            <p><strong>ID Pelanggan:</strong><br><?= $id_pelanggan ?></p>
                            <p><strong>Nama:</strong><br><?= $nama_pelanggan ?></p>
                            <p><strong>Tarif (Daya):</strong><br>
                                Rp <?= number_format($tarifperkwh, 0, ',', '.') ?>
                                (<?= $daya ?>VA)
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>