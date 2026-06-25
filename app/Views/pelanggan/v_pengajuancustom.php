<!doctype html>

<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- title of site -->
    <title>Aldino Perabot</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="<?= base_url() ?>/assets/logo/logoaldino.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/linearicons.css">

    <!--animate.css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/animate.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.theme.default.min.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">

    <!-- bootsnav -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootsnav.css">

    <!--style.css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive.css">

</head>

<body>
    <!--welcome-hero start -->
    <header id="home" class="welcome-hero">
        <!-- top-area Start -->
        <div class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Search -->

                    <div class="container">
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="search">
                                    <a href="#"><span class="lnr lnr-magnifier"></span></a>
                                </li><!--/.search-->
                                <li class="dropdown">
                                    <a href="<?= base_url('keranjang') ?>" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="lnr lnr-cart"></span>
                                        <!-- <span class="badge badge-bg-1">0</span> -->
                                    </a>
                                </li>
                                <li class="nav-profile dropdown">
                                    <a href="#" class="dropdown-toggle profile-icon" data-toggle="dropdown">
                                        <span class="lnr lnr-user"></span>
                                    </a>

                                    <ul class="dropdown-menu profile-menu">

                                        <li>
                                            <a href="<?= base_url('profil') ?>">
                                                <i class="lnr lnr-user"></i>
                                                Profil Saya
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('pesananpelanggan') ?>">
                                                <i class="lnr lnr-cart"></i>
                                                Pesanan Saya
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('pengajuan-custom') ?>">
                                                <i class="lnr lnr-pencil"></i>
                                                Pengajuan Custom
                                            </a>
                                        </li>

                                        <!-- <li>
                                            <a href="<?= base_url('riwayat') ?>">
                                                <i class="lnr lnr-history"></i>
                                                Riwayat Pembelian
                                            </a>
                                        </li> -->

                                        <!-- <li>
                                            <a href="<?= base_url('pengaturan') ?>">
                                                <i class="lnr lnr-cog"></i>
                                                Pengaturan Akun
                                            </a>
                                        </li> -->

                                        <li class="divider"></li>

                                        <li class="logout-item">
                                            <a href="<?= base_url('logout') ?>"
                                                class="logout-btn">

                                                Logout

                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div><!--/.attr-nav-->
                        <!-- End Atribute Navigation -->

                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="<?= base_url('/') ?>">Aldino Perabot</a>

                        </div><!--/.navbar-header-->
                        <!-- End Header Navigation -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                                <li class=" scroll active"><a href="<?= base_url('/') ?>">home</a></li>
                                <li class="scroll"><a href="#new-arrivals">new arrival</a></li>
                                <li class="scroll"><a href="#feature">features</a></li>
                                <li class="scroll"><a href="#blog">blog</a></li>
                                <li class="scroll"><a href="#newsletter">contact</a></li>
                            </ul><!--/.nav -->
                        </div><!-- /.navbar-collapse -->
                    </div><!--/.container-->
                </nav><!--/nav-->
                <!-- End Navigation -->
            </div><!--/.header-area-->
            <div class="clearfix"></div>

        </div><!-- /.top-area-->
        <!-- top-area End -->

    </header><!--/.welcome-hero-->
    <!--welcome-hero end -->

    <br>
    <br>
    <br>

    <div class="custom-page">
        <div class="page-header">
            <h2>Pengajuan Custom Saya</h2>
            <p>
                Kelola dan pantau seluruh pengajuan produk custom Anda.
            </p>
        </div>
        <div class="status-filter">
            <button
                class="status-btn active"
                data-status="all">
                Semua
            </button>
            <button
                class="status-btn"
                data-status="menunggu">
                Menunggu
            </button>
            <button
                class="status-btn"
                data-status="penawaran_harga">
                Penawaran Harga
            </button>
            <button
                class="status-btn"
                data-status="disetujui">
                Disetujui
            </button>
            <button
                class="status-btn"
                data-status="batal">
                Dibatalkan
            </button>
        </div>

        <?php if (empty($pengajuan)): ?>
            <div class="empty-custom">
                <span class="lnr lnr-file-empty"></span>
                <h3>
                    Belum Ada Pengajuan Custom
                </h3>
                <p>
                    Silakan ajukan produk custom terlebih dahulu.
                </p>
            </div>

        <?php endif; ?>
        <?php foreach ($pengajuan as $row): ?>
            <?php
            $statusClass = '';
            switch ($row['statuscustom']) {
                case 'menunggu':
                    $statusClass = 'waiting';
                    break;
                case 'penawaran_harga':
                    $statusClass = 'offer';
                    break;
                case 'disetujui':
                    $statusClass = 'approved';
                    break;
                case 'batal':
                    $statusClass = 'cancelled';
                    break;
            }
            ?>

            <div class="custom-card pengajuan-item" data-status="<?= $row['statuscustom'] ?>">
                <div class="card-header">
                    <div>
                        <h6>
                            <?= $row['idpengajuan'] ?>
                        </h6>
                        <span>
                            <?= date(
                                'd F Y',
                                strtotime(
                                    $row['tanggalpengajuan']
                                )
                            ) ?>
                        </span>
                    </div>
                    <div class="status-badge <?= $statusClass ?>">
                        <?= ucfirst(
                            str_replace(
                                '_',
                                ' ',
                                $row['statuscustom']
                            )
                        ) ?>
                    </div>
                </div>
                <?php foreach ($row['detail'] as $detail): ?>
                    <div class="card-content">
                        <div class="image-wrapper">
                            <?php if (!empty($detail['fotoreferensi'])): ?>
                                <img
                                    src="<?= base_url(
                                                'storage/fotocustom/' .
                                                    $detail['fotoreferensi']
                                            ) ?>"
                                    class="product-image">
                            <?php else: ?>
                                <div class="no-image">
                                    <span class="lnr lnr-picture"></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="product-detail">

                            <h4>
                                <?= $detail['namaprodukcustom'] ?>
                            </h4>

                            <div class="product-meta">

                                <span>
                                    Qty :
                                    <?= $detail['qty'] ?>
                                </span>

                            </div>

                        </div>
                        <?php if ($row['statuscustom'] == 'menunggu'): ?>

                            <div class="info-box waiting-box">

                                <i class="lnr lnr-clock"></i>

                                <div>

                                    <strong>
                                        Menunggu Review Admin
                                    </strong>

                                    <p>
                                        Pengajuan sedang ditinjau oleh admin.
                                        Belum ada penawaran harga yang diberikan.
                                    </p>

                                </div>

                            </div>

                        <?php endif; ?>
                        <?php if ($row['statuscustom'] == 'batal'): ?>

                            <div class="info-box cancel-box">

                                <i class="lnr lnr-cross-circle"></i>

                                <div>

                                    <strong>
                                        Pengajuan Dibatalkan
                                    </strong>

                                    <p>
                                        Pengajuan custom ini telah dibatalkan
                                        dan tidak dapat diproses lebih lanjut.
                                    </p>

                                </div>

                            </div>

                        <?php endif; ?>

                        <?php if ($row['statuscustom']  == 'penawaran_harga'  ||  $row['statuscustom'] == 'disetujui'): ?>

                            <div class="price-box offer-box">

                                <div class="offer-label">

                                    <i class="lnr lnr-tag"></i>

                                    Harga Produk

                                </div>

                                <h5>

                                    Rp
                                    <?= number_format(
                                        $detail['hargacustom'],
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </h5>

                                <small>
                                    Subtotal
                                </small>

                                <h4>

                                    Rp
                                    <?= number_format(
                                        $detail['subtotal'],
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </h4>

                            </div>

                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

                <?php if ($row['statuscustom']  == 'penawaran_harga' || $row['statuscustom'] == 'disetujui'): ?>

                    <div class="total-wrapper <?= $row['statuscustom'] == 'disetujui' ? 'approved-total' : '' ?>">

                        <span>

                            <?= $row['statuscustom'] == 'disetujui'

                                ? 'Total Harga Disetujui'

                                : 'Total Penawaran'

                            ?>

                        </span>

                        <h2>Rp <?= number_format($row['total_penawaran'], 0, ',', '.') ?></h2>

                        <?php if ($row['statuscustom'] == 'disetujui'): ?>

                            <div class="approved-info">

                                <i class="lnr lnr-checkmark-circle"></i>

                                <div>

                                    <strong style="display:block;text-align:left;">
                                        Pesanan Anda Telah Masuk
                                    </strong>

                                    <p>
                                        Silakan lihat menu <a href="<?= base_url('pesananpelanggan') ?>">Pesanan Saya</a>
                                        untuk mengetahui perkembangan pesanan Anda.
                                    </p>

                                </div>

                            </div>

                        <?php endif; ?>

                    </div>


                    <?php if ($row['statuscustom'] == 'penawaran_harga'): ?>

                        <div class="card-action">

                            <button
                                data-url="<?= base_url('customproduk/batal/' . $row['idpengajuan']) ?>"
                                class="btn-cancel btn-batal">
                                Batalkan
                            </button>
                            <button
                                data-url="<?= base_url('customproduk/setuju/' . $row['idpengajuan']) ?>"
                                class="btn-approve btn-setuju">
                                Setujui Penawaran
                            </button>

                        </div>

                    <?php endif; ?>

                <?php endif; ?>





            </div>

        <?php endforeach; ?>
        <div
            id="empty-pengajuan"
            class="empty-custom d-none">

            <span class="lnr lnr-file-empty"></span>

            <h3>
                Tidak Ada Data
            </h3>

            <p>
                Tidak ada pengajuan pada status ini.
            </p>

        </div>

    </div>

    <!--footer start-->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="hm-footer-copyright text-center">
                <div class="footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
                <p>
                    &copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
                </p><!--/p-->
            </div><!--/.text-center-->
        </div><!--/.container-->

        <div id="scroll-Top">
            <div class="return-to-top">
                <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div>

        </div><!--/.scroll-Top-->

    </footer><!--/.footer-->
    <!--footer end-->

    <!-- Include all js compiled plugins (below), or include individual files as needed -->

    <script src="<?= base_url() ?>/assets/js/jquery.js"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="<?= base_url() ?>/assets/js/bootsnav.js"></script>

    <!--owl.carousel.js-->
    <script src="<?= base_url() ?>/assets/js/owl.carousel.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


    <!--Custom JS-->
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-popup {
            font-size: 1.6rem !important;
            width: 32em !important;
        }

        .swal2-title {
            font-size: 1.8rem !important;
        }

        .swal2-html-container {
            font-size: 1.4rem !important;
        }

        .swal2-confirm,
        .swal2-cancel {
            font-size: 1.4rem !important;
        }
    </style>

    <script>
        document.querySelectorAll('.btn-setuju')
            .forEach(button => {

                button.addEventListener('click', function(e) {

                    e.preventDefault();

                    const url =
                        this.dataset.url;

                    Swal.fire({

                        title: 'Setujui Penawaran Harga?',

                        html: `
                <p>
                    Dengan menyetujui penawaran ini,
                    pengajuan custom akan diproses
                    menjadi pesanan.
                </p>

                <br>

                <small>
                    Pastikan detail produk dan harga
                    yang ditawarkan sudah sesuai.
                </small>
            `,

                        icon: 'question',

                        showCancelButton: true,

                        confirmButtonColor: '#8B7355',

                        cancelButtonColor: '#d33',

                        confirmButtonText: 'Ya, Setujui',

                        cancelButtonText: 'Periksa Lagi',

                        allowOutsideClick: false,

                        allowEscapeKey: false

                    }).then((result) => {

                        if (result.isConfirmed) {

                            Swal.fire({

                                icon: 'success',

                                title: 'Berhasil',

                                text: 'Penawaran harga akan diproses menjadi pesanan.',

                                confirmButtonText: 'OK',

                                allowOutsideClick: false,

                                allowEscapeKey: false

                            }).then(() => {

                                window.location.href =
                                    url;

                            });

                        }

                    });

                });

            });

        document.querySelectorAll('.btn-batal')
            .forEach(button => {

                button.addEventListener('click', function(e) {

                    e.preventDefault();

                    const url =
                        this.dataset.url;

                    Swal.fire({

                        title: 'Batalkan Pengajuan Custom?',

                        html: `
                <p>
                    Pengajuan custom yang dibatalkan
                    tidak dapat diproses lebih lanjut.
                </p>

                <br>

                <small>
                    Anda perlu membuat pengajuan baru
                    jika ingin melanjutkan kembali.
                </small>
            `,

                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonColor: '#d33',

                        cancelButtonColor: '#6c757d',

                        confirmButtonText: 'Ya, Batalkan',

                        cancelButtonText: 'Kembali',

                        allowOutsideClick: false,

                        allowEscapeKey: false

                    }).then((result) => {

                        if (result.isConfirmed) {

                            Swal.fire({

                                icon: 'warning',

                                title: 'Pengajuan Dibatalkan',

                                text: 'Pengajuan custom akan dibatalkan dan tidak dapat diproses kembali.',

                                confirmButtonText: 'OK',

                                allowOutsideClick: false,

                                allowEscapeKey: false

                            }).then(() => {

                                window.location.href =
                                    url;

                            });

                        }

                    });

                });

            });
    </script>

    <?php if ($success = session()->getFlashdata('success')) : ?>

        <script>
            Swal.fire({

                icon: 'success',

                title: 'Berhasil',

                text: '<?= $success ?>',

                confirmButtonColor: '#8B7355',

                confirmButtonText: 'OK',

                allowOutsideClick: false,

                allowEscapeKey: false

            });
        </script>

    <?php endif; ?>

    <?php if ($warning = session()->getFlashdata('warning')) : ?>

        <script>
            Swal.fire({

                icon: 'warning',

                title: 'Perhatian',

                text: '<?= $warning ?>',

                confirmButtonColor: '#8B7355',

                confirmButtonText: 'OK',

                allowOutsideClick: false,

                allowEscapeKey: false

            });
        </script>

    <?php endif; ?>

    <?php if ($error = session()->getFlashdata('error')) : ?>

        <script>
            Swal.fire({

                icon: 'error',

                title: 'Gagal',

                text: '<?= $error ?>',

                confirmButtonColor: '#8B7355',

                confirmButtonText: 'OK',

                allowOutsideClick: false,

                allowEscapeKey: false

            });
        </script>

    <?php endif; ?>

    <script>
        const buttons =
            document.querySelectorAll(
                '.status-btn'
            );

        const pengajuan =
            document.querySelectorAll(
                '.pengajuan-item'
            );

        const emptyPengajuan =
            document.getElementById(
                'empty-pengajuan'
            );

        buttons.forEach(btn => {

            btn.addEventListener(
                'click',
                function() {

                    buttons.forEach(b =>
                        b.classList.remove(
                            'active'
                        )
                    );

                    this.classList.add(
                        'active'
                    );

                    const status =
                        this.dataset.status;

                    let adaData = false;

                    pengajuan.forEach(item => {

                        if (
                            status === 'all' ||
                            item.dataset.status === status
                        ) {

                            item.style.display =
                                'block';

                            adaData = true;

                        } else {

                            item.style.display =
                                'none';

                        }

                    });

                    if (adaData) {

                        emptyPengajuan
                            .classList.add(
                                'd-none'
                            );

                    } else {

                        emptyPengajuan
                            .classList.remove(
                                'd-none'
                            );

                    }

                }
            );

        });

        document.querySelectorAll('.btn-setuju')
            .forEach(button => {

                button.addEventListener('click', function() {

                    const url = this.dataset.url;

                    Swal.fire({

                        title: 'Setujui Penawaran Harga?',

                        html: `
                <p>
                    Dengan menyetujui penawaran ini,
                    pengajuan custom akan diproses
                    menjadi pesanan.
                </p>

                <br>

                <small>
                    Pastikan detail dan harga yang
                    ditawarkan sudah sesuai.
                </small>
            `,

                        icon: 'question',

                        showCancelButton: true,

                        confirmButtonText: 'Ya, Setujui',

                        cancelButtonText: 'Periksa Lagi',

                        confirmButtonColor: '#16a34a',

                        cancelButtonColor: '#6b7280',

                        reverseButtons: true

                    }).then((result) => {

                        if (result.isConfirmed) {

                            window.location.href = url;

                        }

                    });

                });

            });

        document.querySelectorAll('.btn-batal')
            .forEach(button => {

                button.addEventListener('click', function() {

                    const url = this.dataset.url;

                    Swal.fire({

                        title: 'Batalkan Pengajuan Custom?',

                        html: `
                <p>
                    Pengajuan custom yang dibatalkan
                    tidak dapat diproses lebih lanjut.
                </p>

                <br>

                <small>
                    Anda perlu membuat pengajuan baru
                    jika ingin melanjutkan kembali.
                </small>
            `,

                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonText: 'Ya, Batalkan',

                        cancelButtonText: 'Kembali',

                        confirmButtonColor: '#dc2626',

                        cancelButtonColor: '#6b7280',

                        reverseButtons: true

                    }).then((result) => {

                        if (result.isConfirmed) {

                            window.location.href = url;

                        }

                    });

                });

            });
    </script>


</body>

</html>