<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>


<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Tambah Pengguna</h3>
            <p>
                Lengkapi data pengguna baru ke dalam sistem
            </p>
        </div>
        <form action="<?= base_url('pengguna/simpan') ?>" method="post">

            <?= csrf_field() ?>

            <input
                type="hidden"
                name="iduser"
                value="<?= $iduser ?>">

            <div class="card-body">

                <h4 class="section-title">
                    Informasi Pengguna
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Nama Pengguna
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="namauser"
                            class="form-control"
                            placeholder="Masukkan nama pengguna"
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
                            Password
                            <span class="required">*</span>
                        </label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Masukkan password (minimal 8 karakter)"
                            minlength="8"
                            required>
                        <small id="password-error" class="text-danger"></small>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Konfirmasi Password
                            <span class="required">*</span>
                        </label>

                        <input
                            type="password"
                            name="konfirmasi_password"
                            id="konfirmasi_password"
                            class="form-control"
                            placeholder="Ulangi password"
                            required>
                        <small id="konfirmasi-error" class="text-danger"></small>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            Role
                            <span class="required">*</span>
                        </label>

                        <select
                            name="role"
                            class="form-select"
                            required>

                            <option value="">Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="pelanggan">Pelanggan</option>
                            <option value="pimpinan">Pimpinan</option>

                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            Status
                            <span class="required">*</span>
                        </label>

                        <select
                            name="status"
                            class="form-select"
                            required>

                            <option value="aktif" selected>Aktif</option>
                            <option value="nonaktif">Nonaktif</option>

                        </select>
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

<script>
    const password = document.getElementById('password');
    const konfirmasi = document.getElementById('konfirmasi_password');

    const passwordError = document.getElementById('password-error');
    const konfirmasiError = document.getElementById('konfirmasi-error');

    function cekPassword() {

        // Validasi minimal 8 karakter
        if (password.value.length > 0 && password.value.length < 8) {
            passwordError.innerHTML = "Password minimal 8 karakter.";
            password.setCustomValidity("Password minimal 8 karakter.");
        } else {
            passwordError.innerHTML = "";
            password.setCustomValidity("");
        }

        // Validasi konfirmasi password
        if (konfirmasi.value.length > 0 && password.value !== konfirmasi.value) {
            konfirmasiError.innerHTML = "Konfirmasi password tidak sesuai.";
            konfirmasi.setCustomValidity("Konfirmasi password tidak sesuai.");
        } else {
            konfirmasiError.innerHTML = "";
            konfirmasi.setCustomValidity("");
        }
    }

    password.addEventListener('input', cekPassword);
    konfirmasi.addEventListener('input', cekPassword);
</script>

<?= $this->endSection() ?>