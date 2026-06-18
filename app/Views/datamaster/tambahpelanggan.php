<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>


<body>
    

<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Tambah Pelanggan</h3>
            <p>Lengkapi data pelanggan baru ke dalam sistem</p>
        </div>

        <form action="<?= base_url('pelanggan/simpan') ?>" method="post">

            <div class="card-body">
                <h4 class="section-title">
                    Informasi Akun
                </h4>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <input
                            type="hidden"
                            name="iduser"
                            class="form-control"
                            value="<?= $iduser ?>"
                            readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <input
                            type="hidden"
                            name="idpelanggan"
                            class="form-control"
                            value="<?= $idpelanggan ?>"
                            readonly>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Username
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Masukkan username"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Email
                            <span class="required">*</span>
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Masukkan email"
                            required>
                    </div>

                </div>

                <div class="row">                    

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Password
                            <span class="required">*</span>
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Konfirmasi Password
                            <span class="required">*</span>
                        </label>

                        <input
                            type="password"
                            name="konfirmasi_password"
                            class="form-control"
                            placeholder="Ulangi password"
                            required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>

                        </select>
                    </div>


                </div>

                <hr class="my-4">

                <h4 class="section-title">
                    Informasi Pelanggan
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Nama Pelanggan
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="namapelanggan"
                            class="form-control"
                            placeholder="Masukkan nama pelanggan"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Nomor HP
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="nohp"
                            class="form-control"
                            placeholder="Masukkan nomor HP"
                            required>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Alamat
                            <span class="required">*</span>
                        </label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="4"
                            placeholder="Masukkan alamat pelanggan"
                            required></textarea>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <?php if (session('errors')) : ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Registrasi Gagal',
        html: `
        <?php foreach (session('errors') as $error): ?>
            <?= $error ?><br>
        <?php endforeach; ?>
    `,
        confirmButtonText: 'OK'
      });
    </script>
  <?php endif; ?>
</body>

<?= $this->endSection() ?>