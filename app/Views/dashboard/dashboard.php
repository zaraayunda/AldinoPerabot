<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Aldino Perabot</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/logo/logoaldino.png" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="<?= base_url() ?>/assets/dashboard/images/logos/logo.png" alt="" width="220"/>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->

        <?php if (session()->get('role') == 'admin') { ?>
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                <span class="hide-menu">Home</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="<?= base_url('dashboard/tampil') ?>" aria-expanded="false">
                  <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>

              <li>
                <span class="sidebar-divider lg"></span>
              </li>
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                <span class="hide-menu">Menu Data Master</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('datapengguna') ?>"
                  aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:shield-user-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Data Pengguna</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('datakategori') ?>"
                  aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:widget-4-line-duotone"></iconify-icon>
                    </span>
                    <span class="hide-menu">Data Kategori Produk</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('dataproduk') ?>"
                  aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:cart-3-line-duotone"></iconify-icon>
                    </span>
                    <span class="hide-menu">Data Produk</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('datapelanggan') ?>"
                  aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:shield-user-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Data Pelanggan</span>
                  </div>
                </a>
              </li>
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                <span class="hide-menu">Menu Transaksi</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('datapengajuan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:letter-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Pengajuan Custom</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('datapesanan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:calendar-mark-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Pesanan</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('datapembayaran') ?>  " aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:airbuds-case-minimalistic-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Pembayaran</span>
                  </div>
                </a>
              </li>
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                <span class="hide-menu">Menu Laporan</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanuser') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:bill-list-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data User</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanpelanggan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:bill-list-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data Pelanggan</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporankategori') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:bill-list-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data<br>Kategori Produk</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanproduk') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:bill-list-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data Produk</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanpengajuancustom') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:document-text-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data <br> Pengajuan Custom</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanpesanan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:document-text-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data Pesanan</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('lapstatuspesanan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:document-text-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Data Status Pesanan</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanpenjualan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:document-text-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data Penjualan</span>
                  </div>
                </a>
              </li>
              <li>
                <span class="sidebar-divider lg"></span>
              </li>
              <li>
                <span class="sidebar-divider lg"></span>
              </li>
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                <span class="hide-menu">Actions</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="<?= base_url('logout') ?>" aria-expanded="false">
                  <iconify-icon icon="solar:login-3-line-duotone"></iconify-icon>
                  <span class="hide-menu">logout</span>
                </a>
              </li>
            </ul>
            <div
              class="unlimited-access d-flex align-items-center hide-menu bg-secondary-subtle position-relative mb-7 mt-4 p-3 rounded-3">
              <div class="flex-shrink-0">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-75 lh-sm">Check Pro Version</h6>
                <a href="https://www.wrappixel.com/templates/spike-bootstrap-admin-dashboard/?ref=376" target="_blank"
                  class="btn btn-secondary fs-2 fw-semibold lh-sm">Check</a>
              </div>
              <div class="unlimited-access-img">
                <img src="<?= base_url() ?>/assets/dashboard/images/backgrounds/sidebar-buynow-bg.png" alt="" class="img-fluid">
              </div>
            </div>
          </nav>
        <?php } ?>
        <?php if (session()->get('role') == 'pimpinan') { ?>
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                <span class="hide-menu">Home</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="<?= base_url('dashboard/tampil') ?>" aria-expanded="false">
                  <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>

              <li>
                <span class="sidebar-divider lg"></span>
              </li>
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                <span class="hide-menu">Menu Laporan</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanuser') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:bill-list-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data User</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanpelanggan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:bill-list-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data Pelanggan</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporankategori') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:bill-list-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data<br>Kategori Produk</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanproduk') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:bill-list-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data Produk</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanpengajuancustom') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:document-text-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data <br> Pengajuan Custom</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanpesanan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:document-text-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data Pesanan</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('lapstatuspesanan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:document-text-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Data Status Pesanan</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg justify-content-between" href="<?= base_url('laporanpenjualan') ?>" aria-expanded="false">
                  <div class="d-flex align-items-center gap-6">
                    <span class="d-flex">
                      <iconify-icon icon="solar:document-text-line-duotone" class=""></iconify-icon>
                    </span>
                    <span class="hide-menu">Laporan Data Penjualan</span>
                  </div>
                </a>
              </li>
              <li>
                <span class="sidebar-divider lg"></span>
              </li>
              <li>
                <span class="sidebar-divider lg"></span>
              </li>
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                <span class="hide-menu">Actions</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="<?= base_url('logout') ?>" aria-expanded="false">
                  <iconify-icon icon="solar:login-3-line-duotone"></iconify-icon>
                  <span class="hide-menu">logout</span>
                </a>
              </li>
            </ul>
            <div
              class="unlimited-access d-flex align-items-center hide-menu bg-secondary-subtle position-relative mb-7 mt-4 p-3 rounded-3">
              <div class="flex-shrink-0">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-75 lh-sm">Check Pro Version</h6>
                <a href="https://www.wrappixel.com/templates/spike-bootstrap-admin-dashboard/?ref=376" target="_blank"
                  class="btn btn-secondary fs-2 fw-semibold lh-sm">Check</a>
              </div>
              <div class="unlimited-access-img">
                <img src="<?= base_url() ?>/assets/dashboard/images/backgrounds/sidebar-buynow-bg.png" alt="" class="img-fluid">
              </div>
            </div>
          </nav>
        <?php } ?>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">

      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Header Start -->
          <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
              <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                  <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                  </a>
                </li>
              </ul>
              <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                  <li class="nav-item dropdown">
                    <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <img src="<?= base_url() ?>/assets/dashboard/images/profile/user1.jpg" alt="" width="35" height="35"
                        class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                      <div class="message-body">
                        <a href="<?= base_url('logout') ?>"
                          class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
          </header>
          <!--  Header End -->
        </div>
        <div class="container-fluid">
          <?= $this->renderSection('content') ?>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>/assets/dashboard/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/dashboard/js/sidebarmenu.js"></script>
  <script src="<?= base_url() ?>/assets/dashboard/js/app.min.js"></script>
  <script src="<?= base_url() ?>/assets/dashboard/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?= base_url() ?>/assets/dashboard/libs/simplebar/dist/simplebar.js"></script>
  <!-- <script src="<?= base_url() ?>/assets/dashboard/js/dashboard.js"></script> -->

  <?= $this->renderSection('script') ?>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <?php if (session()->getFlashdata('success')) : ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= session()->getFlashdata('success') ?>',
        confirmButtonColor: '#8B5E3C'
      });
    </script>
  <?php endif; ?>

  <?php if (session()->get('errors')) : ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Validasi Gagal',
        html: `
        <?= implode('<br>', array_map('esc', session()->get('errors'))) ?>
    `,
        confirmButtonColor: '#8B5E3C'
      });
    </script>
  <?php endif; ?>
</body>

</html>