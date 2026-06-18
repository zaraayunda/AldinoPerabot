<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Tambah Produk</h3>
            <p>Lengkapi data produk baru ke dalam sistem</p>
        </div>

        <form action="<?= base_url('produk/simpan') ?>" method="post" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <input
                type="hidden"
                name="idproduk"
                value="<?= $idproduk ?>">

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
                            placeholder="Masukkan nama produk"
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

                            <option value="">Pilih Kategori</option>

                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['idkategori'] ?>">
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
                            <option value="">Pilih Jenis</option>
                            <option value="custom">Custom</option>
                            <option value="katalog">Katalog</option>

                        </select>
                    </div>

                </div>

                <!-- Jenis Produk & Harga -->
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
                            placeholder="Masukkan harga"
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
                            placeholder="Masukkan diskon(%)"
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

                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>

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
                            placeholder="Masukkan detail produk"
                            required></textarea>
                    </div>

                </div>

                <!-- Foto Produk -->
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Foto Produk
                            <span class="required">*</span>
                        </label>

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept=".jpg,.jpeg,.png"
                            required>
                        <small class="text-muted">
                            Format: JPG, JPEG, PNG | Maksimal: 2 MB
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
                        Simpan Data

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