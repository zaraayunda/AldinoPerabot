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
    <input
        type="hidden"
        name="iduser"
        class="form-control"
        value="<?= $user['iduser'] ?>"
        readonly>
    <input
        type="hidden"
        name="idpelanggan"
        class="form-control"
        value="<?= $pelanggan['idpelanggan'] ?>"
        readonly>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
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
                                            <a href="<?= base_url('pesanan') ?>">
                                                <i class="lnr lnr-cart"></i>
                                                Pesanan Saya
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('riwayat') ?>">
                                                <i class="lnr lnr-history"></i>
                                                Riwayat Pembelian
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('pengaturan') ?>">
                                                <i class="lnr lnr-cog"></i>
                                                Pengaturan Akun
                                            </a>
                                        </li>

                                        <li class="divider"></li>

                                        <li class="logout-item">
                                            <a href="<?= base_url('logout') ?>" class="logout-btn">
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

    <!-- Kategori Produk -->
    <section class="kategori-section">

        <div class="container">

            <!-- Divider -->
            <div class="section-divider">
                <span><i class="fa fa-home"></i></span>
            </div>

            <!-- Judul -->
            <div class="text-center mb-3">
                <h2 class="kategori-title">Kategori Produk</h2>

                <p class="kategori-subtitle">
                    Temukan furnitur sesuai kebutuhan ruangan Anda
                </p>
            </div>

            <!-- Button Kategori -->
            <div class="kategori-wrapper">

                <button
                    class="kategori-btn active"
                    data-kategori="all">

                    Semua
                </button>

                <?php foreach ($kategori as $k) : ?>

                    <button
                        class="kategori-btn"
                        data-kategori="<?= $k['idkategori'] ?>">

                        <?= esc($k['namakategori']) ?>

                    </button>

                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!--new-arrivals start -->
    <section id="new-arrivals" class="new-arrivals">
        <div class="container">
            <div class="new-arrivals-content">
                <div class="row" id="produk-container">
                    <?php if (!empty($produk)) : ?>
                        <?php foreach ($produk as $row) : ?>

                            <?php
                            $diskon = $row['diskon'] ?? 0;
                            $hargaAsli = $row['harga'];
                            $hargaDiskon = $hargaAsli - ($hargaAsli * $diskon / 100);
                            ?>

                            <div class="col-md-3 col-sm-4 produk-item" data-kategori="<?= $row['idkategori'] ?>">
                                <div class="single-new-arrival">

                                    <div class="single-new-arrival-bg">

                                        <?php if ($diskon > 0): ?>
                                            <span class="discount-badge">
                                                -<?= $diskon ?>%
                                            </span>
                                        <?php endif; ?>

                                        <img
                                            src="<?= base_url('storage/fotoproduk/' . $row['foto']) ?>"
                                            alt="<?= esc($row['namaproduk']) ?>">

                                        <div class="single-new-arrival-bg-overlay"></div>

                                        <div class="new-arrival-cart">

                                            <a href="<?= base_url('masukkeranjang/' . $row['idproduk']) ?>"
                                                class="action-icon btn-cart"
                                                data-idproduk="<?= $row['idproduk'] ?>">

                                                <span class="lnr lnr-cart"></span>

                                            </a>

                                            <a href="#" class="action-icon">
                                                <span class="lnr lnr-eye"></span>
                                            </a>

                                        </div>

                                    </div>

                                    <h4>
                                        <a href="#">
                                            <?= esc($row['namaproduk']) ?>
                                        </a>
                                    </h4>

                                    <?php if ($diskon > 0): ?>

                                        <div class="price-wrapper">

                                            <span class="old-price">
                                                Rp <?= number_format($hargaAsli, 0, ',', '.') ?>
                                            </span>

                                            <span class="new-price">
                                                Rp <?= number_format($hargaDiskon, 0, ',', '.') ?>
                                            </span>

                                        </div>

                                    <?php else: ?>

                                        <p class="arrival-product-price">
                                            Rp <?= number_format($hargaAsli, 0, ',', '.') ?>
                                        </p>

                                    <?php endif; ?>

                                </div>
                            </div>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <div class="col-md-12 text-center">
                            <h4>Produk belum tersedia</h4>
                        </div>

                    <?php endif; ?>

                </div>

                <!-- Pesan jika produk tidak tersedia -->
                <div id="empty-product" class="empty-product d-none">
                    <i class="fa fa-frown-o"></i>
                    <h4>Produk Belum Tersedia</h4>
                    <p>
                        Maaf, produk pada kategori ini belum tersedia saat ini.
                    </p>
                </div>
            </div>
        </div><!--/.container-->

    </section>
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
        const buttons = document.querySelectorAll('.kategori-btn');
        const produk = document.querySelectorAll('.produk-item');
        const emptyProduct = document.getElementById('empty-product');

        buttons.forEach(btn => {

            btn.addEventListener('click', function() {

                buttons.forEach(b =>
                    b.classList.remove('active')
                );

                this.classList.add('active');

                const kategori = this.dataset.kategori;

                let adaProduk = false;

                produk.forEach(item => {

                    if (
                        kategori === 'all' ||
                        item.dataset.kategori === kategori
                    ) {
                        item.style.display = 'block';
                        adaProduk = true;
                    } else {
                        item.style.display = 'none';
                    }

                });

                if (adaProduk) {
                    emptyProduct.classList.add('d-none');
                } else {
                    emptyProduct.classList.remove('d-none');
                }

            });

        });

        document.querySelectorAll('.btn-cart')
            .forEach(button => {

                button.addEventListener('click', function(e) {

                    e.preventDefault();

                    const url = this.href;

                    Swal.fire({
                        title: 'Tambah ke Keranjang?',
                        text: 'Apakah kamu ingin menambahkan produk ini ke keranjang?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#8B7355',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Tambahkan',
                        cancelButtonText: 'Batal'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.href = url;
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
                text: '<?= $success ?>'
            });
        </script>
    <?php endif; ?>
    <?php if ($warning = session()->getFlashdata('warning')) : ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: '<?= $warning ?>'
            });
        </script>
    <?php endif; ?>

    <?php if ($error = session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= $error ?>'
            });
        </script>
    <?php endif; ?>

</body>

</html>