<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card form-card">
        <div class="form-header">
            <h3>Edit Kategori</h3>
            <p>
                Perbarui data kategori yang terdaftar dalam sistem
            </p>
        </div>

        <form action="<?= base_url('kategori/update') ?>" method="post">
            <?= csrf_field() ?>
            <div class="card-body">

                <h4 class="section-title">
                    Informasi Kategori
                </h4>

                <div class="row">

                    <div class="col-md-3 mb-4">
                        <label class="form-label">
                            ID Kategori
                        </label>

                        <input
                            type="text"
                            name="idkategori"
                            class="form-control"
                            value="<?= $kategori['idkategori'] ?>"
                            readonly>
                    </div>

                    <div class="col-md-9 mb-4">
                        <label class="form-label">
                            Nama Kategori
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="namakategori"
                            class="form-control"
                            value="<?= $kategori['namakategori'] ?>"
                            placeholder="Masukkan nama kategori"
                            required>
                    </div>

                </div>

                <div class="row">

                    <div class="col-12 mb-3">
                        <label class="form-label">
                            Deskripsi
                            <span class="required">*</span>
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="5"
                            placeholder="Masukkan deskripsi kategori"
                            required><?= $kategori['deskripsi'] ?></textarea>
                    </div>

                </div>

            </div>

            <div class="form-footer">
                <div class="card-body">
                    <button
                        type="submit"
                        class="btn btn-simpan">
                        <i class="ti ti-edit me-1"></i>
                        Update Data
                    </button>
                    <a
                        href="<?= base_url('datapengguna') ?>"
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