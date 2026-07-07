<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>



<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna p-0">

        <!-- Judul -->
        <div class="header-title">
            <h2 class="mb-1">Data Kategori Produk</h2>
            <p class="mb-0 text-muted">
        </div>

        <!-- Area Tombol -->
        <div class="header-action">
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">
                <button
                    type="button"
                    class="btn btn-primary btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/kategori') ?>','_blank')">
                    <i class="ti ti-printer me-2"></i>
                    Cetak Semua
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle" id="datapengguna">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="140">ID Kategori</th>
                        <th width="220">Nama Kategori</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($kategori)) : ?>

                        <?php $no = 1; ?>

                        <?php foreach ($kategori as $row) : ?>

                            <tr>

                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <?= $row['idkategori'] ?>
                                </td>

                                <td>
                                    <?= $row['namakategori'] ?>
                                </td>

                                <td>
                                    <?= strlen($row['deskripsi']) > 80
                                        ? substr($row['deskripsi'], 0, 80) . '...'
                                        : $row['deskripsi']; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Data kategori belum tersedia
                            </td>
                        </tr>

                    <?php endif; ?>

                    <tr id="no-result" style="display:none;">
                        <td colspan="5" class="text-center text-danger">
                            Data tidak ditemukan
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection() ?>