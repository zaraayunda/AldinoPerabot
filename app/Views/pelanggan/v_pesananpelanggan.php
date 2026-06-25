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
                                            <a href="<?= base_url('pesanan-custom') ?>">
                                                <i class="lnr lnr-pencil"></i>
                                                pesanan Custom
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
            <h2>Pesanan Saya</h2>
            <p>
                Pantau status dan perkembangan seluruh pesanan Anda.
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
                data-status="menunggu_konfirmasi">
                Menunggu Konfirmasi
            </button>

            <button
                class="status-btn"
                data-status="dikonfirmasi">
                Telah Dikonfirmasi
            </button>
            <button
                class="status-btn"
                data-status="proses_produksi">
                Proses Produksi
            </button>

            <button
                class="status-btn"
                data-status="proses_pengantaran">
                Diantarkan
            </button>

            <button
                class="status-btn"
                data-status="batal">
                Batal
            </button>
            <button
                class="status-btn"
                data-status="selesai">
                Selesai
            </button>

        </div>

        <?php if (empty($pesanan)): ?>

            <div class="empty-custom">

                <span class="lnr lnr-cart"></span>

                <h3>
                    Belum Ada Pesanan
                </h3>

                <p>
                    Anda belum memiliki pesanan.
                </p>

            </div>

        <?php endif; ?>

        <?php foreach ($pesanan as $row): ?>

            <?php

            $statusClass = '';

            switch ($row['statuspesanan']) {

                case 'menunggu_konfirmasi':
                    $statusClass = 'waiting';
                    break;

                case 'dikonfirmasi':
                    $statusClass = 'confirmed';
                    break;

                case 'proses_produksi':
                    $statusClass = 'production';
                    break;

                case 'proses_pengantaran':
                    $statusClass = 'delivery';
                    break;

                case 'selesai':
                    $statusClass = 'completed';
                    break;
                case 'batal':
                    $statusClass = 'cancelled';
                    break;
            }

            ?>

            <div
                class="custom-card pesanan-item"
                data-status="<?= $row['statuspesanan'] ?>">

                <div class="card-header">

                    <div>

                        <h6>
                            <?= $row['idpesanan'] ?>
                        </h6>

                        <span>
                            <?= date(
                                'd F Y',
                                strtotime($row['tanggalpesanan'])
                            ) ?>
                        </span>

                    </div>

                    <div class="status-badge <?= $statusClass ?>">

                        <?= ucwords(
                            str_replace(
                                '_',
                                ' ',
                                $row['statuspesanan']
                            )
                        ) ?>

                    </div>

                </div>

                <?php foreach ($row['detail'] as $detail): ?>

                    <div class="card-content">

                        <div class="image-wrapper">

                            <?php if (!empty($detail['foto'])) : ?>

                                <img
                                    src="<?= base_url('storage/fotoproduk/' . $detail['foto']) ?>"
                                    class="product-image">

                            <?php else : ?>

                                <div class="no-image">
                                    <span class="lnr lnr-picture"></span>
                                </div>

                            <?php endif; ?>

                        </div>

                        <div class="product-detail">

                            <h4>
                                <?= $detail['namaproduk'] ?>
                            </h4>

                            <div class="product-meta">

                                <span>
                                    Qty :
                                    <?= $detail['qty'] ?>
                                </span>

                                <span>
                                    Harga :
                                    Rp <?= number_format(
                                            $detail['harga'],
                                            0,
                                            ',',
                                            '.'
                                        ) ?>
                                </span>

                            </div>

                        </div>

                        <div class="price-box offer-box">

                            <div class="offer-label">

                                <i class="lnr lnr-cart"></i>

                                Subtotal

                            </div>

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

                    </div>

                <?php endforeach; ?>

                <div class="total-wrapper">

                    <span>
                        Total Pesanan
                    </span>

                    <h2>

                        Rp
                        <?= number_format(
                            $row['totalharga'],
                            0,
                            ',',
                            '.'
                        ) ?>

                    </h2>

                </div>
                <?php if ($row['statuspesanan'] == 'menunggu_konfirmasi'): ?>

                    <div class="info-box waiting-box">

                        <i class="lnr lnr-clock"></i>

                        <div class="info-content">

                            <strong>
                                Menunggu Konfirmasi Admin
                            </strong>

                            <p>
                                Pesanan Anda sedang menunggu konfirmasi dari admin.
                                Anda masih dapat membatalkan pesanan sebelum dikonfirmasi.
                            </p>

                            <button
                                data-url="<?= base_url('pesananpelanggan/batal/' . $row['idpesanan']) ?>"
                                class="btn-cancel btn-batal-pesanan">

                                Batalkan

                            </button>

                        </div>

                    </div>



                <?php endif; ?>


                <?php if ($row['statuspesanan'] == 'dikonfirmasi'): ?>

                    <div class="info-box approved-box">

                        <i class="lnr lnr-checkmark-circle"></i>

                        <div>

                            <strong>
                                Pesanan Telah Dikonfirmasi
                            </strong>

                            <p>
                                Pesanan telah dikonfirmasi oleh admin.
                                Silakan lakukan pembayaran agar pesanan dapat diproses lebih lanjut.
                            </p>

                            <?php if (!$row['sudah_lunas']) : ?>

                                <br>

                                <a href="<?= base_url('pembayaran/create/' . $row['idpesanan']) ?>"
                                    class="btn-payment">

                                    Bayar Sekarang

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endif; ?>


                <?php if ($row['statuspesanan'] == 'proses_produksi'): ?>

                    <div class="info-box production-box">

                        <i class="lnr lnr-cog"></i>

                        <div>

                            <strong>
                                Sedang Diproduksi
                            </strong>

                            <p>
                                Produk Anda sedang dalam proses produksi.
                            </p>

                            <?php if (
                                $row['sudah_dp'] &&
                                !$row['sudah_lunas']
                            ) : ?>

                                <br>

                                <a href="<?= base_url('pembayaran/create/' . $row['idpesanan']) ?>"
                                    class="btn-payment">

                                    Bayar Pelunasan

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endif; ?>


                <?php if ($row['statuspesanan'] == 'proses_pengantaran'): ?>

                    <div class="info-box delivery-box">

                        <i class="lnr lnr-truck"></i>

                        <div>

                            <strong>
                                Sedang Diantarkan
                            </strong>

                            <p>
                                Produk sedang dalam perjalanan menuju alamat tujuan.
                            </p>

                        </div>

                    </div>

                <?php endif; ?>


                <?php if ($row['statuspesanan'] == 'selesai'): ?>

                    <div class="info-box completed-box">

                        <i class="lnr lnr-checkmark-circle"></i>

                        <div>

                            <strong>
                                Pesanan Selesai
                            </strong>

                            <p>
                                Pesanan telah selesai dan berhasil diterima.
                                Terima kasih telah berbelanja di Aldino Perabot.
                            </p>

                        </div>

                    </div>

                <?php endif; ?>


                <?php if ($row['statuspesanan'] == 'batal'): ?>

                    <div class="info-box cancel-box">

                        <i class="lnr lnr-cross-circle"></i>

                        <div>

                            <strong>
                                Pesanan Dibatalkan
                            </strong>

                            <p>
                                Pesanan ini telah dibatalkan dan tidak akan diproses lebih lanjut.
                            </p>

                        </div>

                    </div>

                <?php endif; ?>


                <?php if (
                    $row['statuspesanan'] == 'dikonfirmasi' ||
                    $row['statuspesanan'] == 'proses_produksi'
                ): ?>

                    <div class="approved-info">

                        <i class="lnr lnr-clock"></i>

                        <div>

                            <strong>
                                Estimasi Pengerjaan
                            </strong>

                            <p>

                                <?php if (!empty($row['estimasiwaktu'])) : ?>

                                    <?= $row['estimasiwaktu'] ?> Hari

                                <?php else : ?>

                                    Belum ada perkiraan waktu penyelesaian.

                                <?php endif; ?>

                            </p>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

        <div
            id="empty-pesanan"
            class="empty-custom d-none">

            <span class="lnr lnr-file-empty"></span>

            <h3>
                Tidak Ada Data
            </h3>

            <p>
                Tidak ada pesanan pada status ini.
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
        document.querySelectorAll('.btn-batal-pesanan')
            .forEach(button => {

                button.addEventListener('click', function(e) {

                    e.preventDefault();

                    const url =
                        this.dataset.url;

                    Swal.fire({

                        title: 'Batalkan pesanan?',

                        html: `
                <p>
                    pesanan yang dibatalkan
                    tidak dapat diproses lebih lanjut.
                </p>

                <br>

                <small>
                    Anda perlu membuat pesanan baru
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

                                title: 'pesanan Dibatalkan',

                                text: 'pesanan akan dibatalkan dan tidak dapat diproses kembali.',

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

        const pesanan =
            document.querySelectorAll(
                '.pesanan-item'
            );

        const emptypesanan =
            document.getElementById(
                'empty-pesanan'
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

                    pesanan.forEach(item => {

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

                        emptypesanan
                            .classList.add(
                                'd-none'
                            );

                    } else {

                        emptypesanan
                            .classList.remove(
                                'd-none'
                            );

                    }

                }
            );

        });
    </script>


</body>

</html>