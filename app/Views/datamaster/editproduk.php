<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Edit Produk</h3>
            <p>
                Perbarui informasi produk
            </p>
        </div>

        <form action="<?= base_url('produk/update') ?>"
            method="post"
            enctype="multipart/form-data">

            <?= csrf_field() ?>

            <input
                type="hidden"
                name="idproduk"
                value="<?= $produk['idproduk'] ?>">

            <div class="card-body">

                <h4 class="section-title">
                    Informasi Produk
                </h4>

                <!-- Nama Produk & Kategori -->
                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Nama Produk
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="namaproduk"
                            class="form-control"
                            value="<?= $produk['namaproduk'] ?>"
                            required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Kategori
                            <span class="required">*</span>
                        </label>

                        <select
                            name="idkategori"
                            class="form-select"
                            required>

                            <?php foreach ($kategori as $k) : ?>

                                <option
                                    value="<?= $k['idkategori'] ?>"
                                    <?= ($k['idkategori'] == $produk['idkategori']) ? 'selected' : '' ?>>

                                    <?= $k['namakategori'] ?>

                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Jenis Produk
                            <span class="required">*</span>
                        </label>

                        <select
                            name="jenisproduk"
                            class="form-select"
                            required>

                            <option value="custom"
                                <?= ($produk['jenisproduk'] == 'custom') ? 'selected' : '' ?>>
                                Custom
                            </option>

                            <option value="katalog"
                                <?= ($produk['jenisproduk'] == 'katalog') ? 'selected' : '' ?>>
                                Katalog
                            </option>

                        </select>
                    </div>
                </div>

                <!-- Jenis Produk, Harga, Status -->
                <div class="row">
                     <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Harga
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            name="harga"
                            class="form-control"
                            value="<?= $produk['harga'] ?>"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Diskon
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            name="diskon"
                            class="form-control"
                            value="<?= $produk['diskon'] ?>"
                            required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Status Produk
                            <span class="required">*</span>
                        </label>

                        <select
                            name="statusproduk"
                            class="form-select"
                            required>

                            <option value="aktif"
                                <?= ($produk['statusproduk'] == 'aktif') ? 'selected' : '' ?>>
                                Aktif
                            </option>

                            <option value="nonaktif"
                                <?= ($produk['statusproduk'] == 'nonaktif') ? 'selected' : '' ?>>
                                Nonaktif
                            </option>

                        </select>
                    </div>

                </div>

                <!-- Detail Produk -->
                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Detail Produk
                            <span class="required">*</span>
                        </label>

                        <textarea
                            name="detailproduk"
                            class="form-control"
                            rows="5"
                            required><?= $produk['detailproduk'] ?></textarea>

                    </div>

                </div>

                <!-- Foto Lama -->
                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Foto Saat Ini
                        </label>

                        <div class="mt-2">

                            <a href="<?= base_url('storage/fotoproduk/' . $produk['foto']) ?>"
                                target="_blank">

                                <img
                                    src="<?= base_url('storage/fotoproduk/' . $produk['foto']) ?>"
                                    class="img-thumbnail"
                                    style="width:150px;height:150px;object-fit:cover;">

                            </a>

                        </div>

                    </div>

                </div>

                <!-- Upload Foto Baru -->
                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Ganti Foto Produk
                        </label>

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                        </small>

                    </div>

                </div>

            </div>

            <div class="form-footer">

                <div class="card-body">

                    <button
                        type="submit"
                        class="btn btn-simpan">

                        <i class="ti ti-device-floppy me-1"></i>
                        Update Data

                    </button>

                    <a
                        href="<?= base_url('dataproduk') ?>"
                        class="btn btn-kembali ms-2">

                        <i class="ti ti-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

<?= $this->endSection() ?>