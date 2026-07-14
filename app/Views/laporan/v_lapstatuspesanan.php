<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<div class="card-header card-header-pengguna p-0">

    <!-- Judul -->
    <div class="header-title">
        <h2 class="mb-1">Data Pesanan</h2>
        <p class="mb-0 text-muted">
    </div>

    <!-- Area Tombol -->
    <div class="header-action">

        <div class="row g-4">

            <!-- LAPORAN HARIAN -->
            <div class="col-lg-12">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body">

                        <form action="<?= base_url('cetaklaporan/statuspesanan') ?>" method="post" target="_blank">

                            <label class="form-label">
                                Silahkan Masukkan ID Pesanan
                            </label>
                            <select
                                name="idpesanan"
                                class="form-select"
                                required>

                                <option value="">Pilih ID Pesanan</option>

                                <?php foreach ($pesanan as $p) : ?>
                                    <option value="<?= $p['idpesanan'] ?>">
                                        <?= $p['idpesanan'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>

                            <button class="btn btn-primary w-100 mt-3">

                                <i class="ti ti-printer me-2"></i>

                                Cetak Data Pesanan

                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>