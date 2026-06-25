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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

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

    <div class="cart-container">

        <div class="page-header">
            <h2>Keranjang Saya</h2>
            <p>
                Pilih produk yang ingin Anda checkout.
            </p>
        </div>

        <form action="<?= base_url('checkout') ?>" method="post">


            <?php if (!empty($keranjang)) : ?>

                <?php foreach ($keranjang as $item) : ?>

                    <div class="cart-card">

                        <div class="cart-check">

                            <input
                                type="checkbox"
                                name="idkeranjang[]"
                                value="<?= $item['idkeranjang'] ?>"
                                class="cart-checkbox"
                                data-subtotal="<?= $item['subtotal'] ?>">

                        </div>

                        <div class="cart-image">

                            <?php if (!empty($item['foto'])) : ?>

                                <img
                                    src="<?= base_url('storage/fotoproduk/' . $item['foto']) ?>"
                                    alt="<?= esc($item['namaproduk']) ?>">

                            <?php else : ?>

                                <img
                                    src="<?= base_url('assets/images/no-image.png') ?>"
                                    alt="No Image">

                            <?php endif; ?>

                        </div>

                        <div class="cart-detail">

                            <h4>

                                <?= esc($item['namaproduk']) ?>

                            </h4>

                            <div class="cart-meta">

                                <span>
                                    Qty :
                                    <?= $item['qty'] ?>
                                </span>

                            </div>

                            <div class="price-area">

                                <?php if ($item['diskon'] > 0) : ?>

                                    <span class="discount-pill">

                                        -<?= $item['diskon'] ?>%

                                    </span>

                                    <small class="old-price">

                                        Rp
                                        <?= number_format(
                                            $item['harga'],
                                            0,
                                            ',',
                                            '.'
                                        ) ?>

                                    </small>

                                <?php endif; ?>

                                <h5>

                                    Rp
                                    <?= number_format(
                                        $item['harga_final'],
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </h5>

                            </div>

                        </div>

                        <div class="cart-price">

                            <small>
                                Subtotal
                            </small>

                            <h4>

                                Rp
                                <?= number_format(
                                    $item['subtotal'],
                                    0,
                                    ',',
                                    '.'
                                ) ?>

                            </h4>                            

                        </div>
                        <a
                                href="<?= base_url('hapuskeranjang/' . $item['idkeranjang']) ?>"
                                class="btn-delete"
                                title="Hapus dari Keranjang">

                                <i class="ti ti-trash"></i>

                            </a>

                    </div>

                <?php endforeach; ?>

            <?php else : ?>

                <div class="empty-cart">

                    <span class="lnr lnr-cart"></span>

                    <h3>

                        Keranjang Kosong

                    </h3>

                    <p>

                        Belum ada produk yang ditambahkan ke keranjang.

                    </p>

                </div>

            <?php endif; ?>

            <div class="checkout-bar">

                <div class="checkout-info">

                    <h5>

                        Produk Dipilih :

                        <span id="selected-count">
                            0
                        </span>

                    </h5>

                    <h3>

                        Total :

                        <span id="total-price" name="totalharga">

                            Rp 0

                        </span>

                    </h3>

                </div>

                <button
                    type="submit"
                    class="btn-checkout">

                    Checkout

                </button>

            </div>

        </form>

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
        document.addEventListener(
            'DOMContentLoaded',
            function() {

                const checkboxes =
                    document.querySelectorAll(
                        '.cart-checkbox'
                    );

                const totalPrice =
                    document.getElementById(
                        'total-price'
                    );

                const selectedCount =
                    document.getElementById(
                        'selected-count'
                    );

                function hitungTotal() {

                    let total = 0;

                    let jumlah = 0;

                    checkboxes.forEach(cb => {

                        if (cb.checked) {

                            total += parseInt(
                                cb.dataset.subtotal
                            );

                            jumlah++;

                        }

                    });

                    totalPrice.innerHTML =
                        'Rp ' +
                        total.toLocaleString(
                            'id-ID'
                        );

                    selectedCount.innerHTML =
                        jumlah;
                }

                checkboxes.forEach(cb => {

                    cb.addEventListener(
                        'change',
                        hitungTotal
                    );

                });

            }
        );
    </script>




</body>

</html>