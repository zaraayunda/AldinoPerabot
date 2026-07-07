<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>



<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna p-0">

        <!-- Judul -->
        <div class="header-title">
            <h2 class="mb-1">Data Produk</h2>
            <p class="mb-0 text-muted">
        </div>

        <!-- Area Tombol -->
        <div class="header-action">
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">

                <button
                    type="button"
                    class="btn btn-primary btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/produk?jenisproduk=custom') ?>','_blank')">

                    <i class="ti ti-printer me-2"></i>
                    Cetak Produk Custom

                </button>

                <button
                    type="button"
                    class="btn btn-primary btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/produk?jenisproduk=katalog') ?>','_blank')">

                    <i class="ti ti-printer me-2"></i>
                    Cetak Produk Katalog

                </button>

                <button
                    type="button"
                    class="btn btn-primary btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/produk') ?>','_blank')">

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
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Foto</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php
                $kategoriMap = [];

                foreach ($kategori as $k) {
                    $kategoriMap[$k['idkategori']] = $k['namakategori'];
                }
                ?>
                <tbody>
                    <?php if (!empty($produk)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($produk as $row) : ?>
                            <tr>
                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $row['idproduk'] ?>
                                </td>
                                <td>
                                    <?= $row['namaproduk'] ?>
                                </td>
                                <td>
                                    <?= $kategoriMap[$row['idkategori']] ?? '-' ?>
                                </td>
                                <td>
                                    <?= $row['jenisproduk'] ?>
                                </td>
                                <td>
                                    Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                                </td>
                                <td>
                                    <?= number_format($row['diskon'], 0, ',', '.') ?> %
                                </td>
                                <td class="text-center">

                                    <?php if (!empty($row['foto'])) : ?>

                                        <img
                                            src="<?= base_url('storage/fotoproduk/' . $row['foto']) ?>"
                                            alt="<?= $row['namaproduk'] ?>"
                                            class="img-thumbnail foto-preview"
                                            style="width:150px;height:80px;object-fit:cover;cursor:pointer;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalFoto"
                                            data-foto="<?= base_url('storage/fotoproduk/' . $row['foto']) ?>">

                                    <?php endif; ?>

                                </td>
                                <td class="align-middle" style="min-width:100px;">
                                    <?php if ($row['statusproduk'] == 'aktif') : ?>
                                        <span class="badge-status">
                                            Aktif
                                        </span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">
                                            Nonaktif
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                Data Pesanan belum tersedia
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr id="no-result" style="display:none;">
                        <td colspan="10" class="text-center text-danger">
                            Data tidak ditemukan
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection() ?>