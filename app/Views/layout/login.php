<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aldino Perabot - Login</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/logo/logoaldino.png" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?= base_url() ?>/assets/dashboard/images/logos/logo.png" alt="" width="300">
                </a>
                <p class="text-center">Jalan Lintas Solok – Padang KM 17, Ps. Usang Guguk, Sumatera Barat</p>
                <form action="<?= base_url('login/ceklogin') ?>" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username/Email</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan username atau email">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukkan password valid">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">

                    </div>
                    <a class="text-primary fw-bold" href="<?=  base_url('lupasandi') ?>">Lupa Sandi ?</a>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Belum memiliki akun?</p>
                    <a class="text-primary fw-bold ms-2" href="<?= base_url('registrasi') ?>">Sign Up</a>
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
  <?php if (session()->getFlashdata('msg')) : ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          icon: '<?= session()->getFlashdata('icon') ?>',
          title: '<?= session()->getFlashdata('title') ?>',
          text: '<?= session()->getFlashdata('msg') ?>',
          confirmButtonText: 'OK'
        });
      });
    </script>
  <?php endif; ?>
</body>

</html>