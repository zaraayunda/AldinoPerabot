<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Edit Pengguna</h3>
            <p>
                Perbarui data pengguna yang terdaftar dalam sistem
            </p>
        </div>

        <form action="<?= base_url('pengguna/update') ?>" method="post">

            <?= csrf_field() ?>

            <div class="card-body">

                <h4 class="section-title">
                    Informasi Pengguna
                </h4>

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            ID Pengguna
                        </label>

                        <input
                            type="text"
                            name="iduser"
                            class="form-control"
                            value="<?= $user['iduser'] ?>"
                            readonly>
                    </div>

                    <div class="col-md-9 mb-3">
                        <label class="form-label">
                            Nama Pengguna
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="namauser"
                            class="form-control"
                            value="<?= $user['namauser'] ?>"
                            required>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Email
                            <span class="required">*</span>
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?= $user['email'] ?>"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Username
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            value="<?= $user['username'] ?>"
                            required>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Password Baru
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Kosongkan jika tidak ingin mengubah password">

                        <small class="text-muted">
                            Isi hanya jika ingin mengganti password.
                        </small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Konfirmasi Password Baru
                        </label>

                        <input
                            type="password"
                            name="konfirmasi_password"
                            class="form-control"
                            placeholder="Ulangi password baru">
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Role
                            <span class="required">*</span>
                        </label>

                        <select
                            name="role"
                            class="form-select"
                            required>

                            <option value="admin"
                                <?= ($user['role'] == 'admin') ? 'selected' : '' ?>>
                                Admin
                            </option>

                            <option value="pelanggan"
                                <?= ($user['role'] == 'pelanggan') ? 'selected' : '' ?>>
                                Pelanggan
                            </option>

                            <option value="pimpinan"
                                <?= ($user['role'] == 'pimpinan') ? 'selected' : '' ?>>
                                Pimpinan
                            </option>

                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Status
                            <span class="required">*</span>
                        </label>

                        <select
                            name="status"
                            class="form-select"
                            required>

                            <option value="aktif"
                                <?= ($user['status'] == 'aktif') ? 'selected' : '' ?>>
                                Aktif
                            </option>

                            <option value="nonaktif"
                                <?= ($user['status'] == 'nonaktif') ? 'selected' : '' ?>>
                                Nonaktif
                            </option>

                        </select>
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