<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aldino Perabot - Registrasi</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/logo/logoaldino.png" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/css/styles.min.css" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center py-5">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-8 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= base_url() ?>/assets/dashboard/images/logos/logo.png" alt="" width="300">
                                </a>
                                <p class="text-center">Jalan Lintas Solok – Padang KM 17, Ps. Usang Guguk, Sumatera Barat</p>
                                <form action="<?= base_url('edit_pelanggan/simpan') ?>" method="post">

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">
                                                    Nama Lengkap
                                                    <span class="required">*</span>
                                                </label>

                                                <input
                                                    type="text"
                                                    name="namapelanggan"
                                                    class="form-control"
                                                    value="<?= $pelanggan['namapelanggan'] ?>"
                                                    placeholder="Masukkan nama lengkap"
                                                    required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">
                                                    Username
                                                    <span class="required">*</span>
                                                </label>

                                                <input
                                                    type="text"
                                                    name="username"
                                                    class="form-control"
                                                    value="<?= $user['username'] ?>"
                                                    placeholder="Masukkan username"
                                                    required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">
                                                    Email
                                                    <span class="required">*</span>
                                                </label>

                                                <input
                                                    type="email"
                                                    name="email"
                                                    class="form-control"
                                                    value="<?= $user['email'] ?>"
                                                    placeholder="Masukkan email"
                                                    required>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">
                                                    Nomor HP
                                                    <span class="required">*</span>
                                                </label>

                                                <input
                                                    type="text"
                                                    name="nohp"
                                                    class="form-control"
                                                    value="<?= $pelanggan['nohp'] ?>"
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
                                                    placeholder="Masukkan alamat"
                                                    required><?= $pelanggan['alamat'] ?></textarea>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-footer">

                                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Update Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>/assets/dashboard/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
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

</html>