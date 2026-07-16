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
                  <img src="<?= base_url() ?>/assets/dashboard/images/logos/logo.png" alt="" width="330">
                </a>
                <p class="text-center">Jalan Lintas Solok – Padang KM 17, Ps. Usang Guguk, Sumatera Barat</p>
                <form action="<?= base_url('registrasi/simpan') ?>" method="post">

                  <div class="card-body">
                    <h4 class="section-title">
                      Lengkapi Data Berikut :
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

                      <div class="col-md-6 mb-3">
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
                      <div class="col-md-6 mb-3">
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
                    </div>
                    <div class="row">

                      <div class="col-md-6 mb-3">
                        <label class="form-label">
                          Nama Lengkap
                          <span class="required">*</span>
                        </label>

                        <input
                          type="text"
                          name="namapelanggan"
                          class="form-control"
                          placeholder="Masukkan nama lengkap"
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
                          placeholder="Masukkan alamat"
                          required></textarea>
                      </div>

                    </div>

                  </div>

                  <div class="form-footer">

                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Sign Up</button>
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                      <a class="text-primary fw-bold ms-2" href="<?= base_url('login') ?>">Sign In</a>
                    </div>
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