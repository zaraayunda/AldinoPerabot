<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Edit Pelanggan</h3>
            <p>Perbarui data pelanggan dalam sistem</p>
        </div>

        <form action="<?= base_url('pelanggan/update') ?>" method="post">

            <input type="hidden"
                name="idpelanggan"
                value="<?= $pelanggan['idpelanggan'] ?>">

            <input type="hidden"
                name="iduser"
                value="<?= $user['iduser'] ?>">

            <div class="card-body">
                <hr class="my-4">

                <h4 class="section-title">
                    Informasi Pelanggan
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Nama Pelanggan
                        </label>
                        <input
                            type="text"
                            name="namapelanggan"
                            class="form-control"
                            value="<?= $pelanggan['namapelanggan'] ?>"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Nomor HP
                        </label>

                        <input
                            type="text"
                            name="nohp"
                            class="form-control"
                            value="<?= $pelanggan['nohp'] ?>"
                            required>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="4"
                            required><?= $pelanggan['alamat'] ?></textarea>
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
                        href="<?= base_url('datapelanggan') ?>"
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