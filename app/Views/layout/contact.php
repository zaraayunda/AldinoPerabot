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


    <!-- Animate.css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/product/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/product/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/product/css/bootstrap.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/product/css/flexslider.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/product/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/product/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/product/css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

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

                                <!-- Search -->
                                <li class="search">
                                    <a href="#">
                                        <span class="lnr lnr-magnifier"></span>
                                    </a>
                                </li>

                                <!-- Keranjang -->
                                <li class="cart-icon">

                                    <a href="<?= base_url('keranjang') ?>">

                                        <span class="lnr lnr-cart"></span>

                                        <?php if (isset($jumlahKeranjang) && $jumlahKeranjang > 0) : ?>

                                            <span class="badge badge-bg-1">
                                                <?= $jumlahKeranjang ?>
                                            </span>

                                        <?php endif; ?>

                                    </a>

                                </li>

                                <!-- Profile -->
                                <li class="nav-profile dropdown">

                                    <a href="#"
                                        class="dropdown-toggle profile-icon"
                                        data-toggle="dropdown">

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
                                <li><a href="<?= base_url('homepage') ?>">Home</a></li>
                                <li><a href="<?= base_url('katalogproduk') ?>">Product</a></li>
                                <li><a href="<?= base_url('about') ?>">About</a></li>
                                <li><a href="<?= base_url('contact') ?>">Contact</a></li>
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

<!--================ HERO =================-->
<br>
<br>
<br>

<section class="contact-hero">

    <div class="container">

        <div class="hero-content">

            <h1>Hubungi Kami</h1>

            <p>
                Kami siap membantu Anda menemukan furniture terbaik
                untuk rumah, kantor maupun kebutuhan interior lainnya.
            </p>

            <div class="hero-line"></div>

        </div>

    </div>

</section>

<!--================ INFO =================-->

<section class="contact-info">

    <div class="container">

        <div class="row">

            <!-- MAP -->

            <div class="col-md-7">

                <div class="contact-card">

                    <h3>
                        <i class="fa fa-map-marker"></i>
                        Lokasi Kami
                    </h3>

                    <iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510629.1322606219!2d100.05446267343753!3d-0.9323417999999959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2b4b25fe0d94e9%3A0x144bda80efa73177!2sAldino%20Perabot!5e0!3m2!1sen!2sid!4v1782894635520!5m2!1sen!2sid"
							width="100%"
							height="420"
							style="border:0;"
							allowfullscreen=""
							loading="lazy"
							referrerpolicy="strict-origin-when-cross-origin">
						</iframe>

                </div>

            </div>

            <!-- INFO -->

            <div class="col-md-5">

                <div class="contact-card">

                    <h3>

                        <i class="fa fa-info-circle"></i>

                        Informasi Toko

                    </h3>

                    <div class="info-item">

                        <i class="fa fa-map-marker"></i>

                        <div>

                            <h4>Alamat</h4>

                            <p>
                                Jl. Lintas Sumatera Kilometer 17, Koto Gadang Guguak, Kecamatan Gunung Talang, Kabupaten Solok.
                            </p>

                        </div>

                    </div>

                    <div class="info-item">

                        <i class="fa fa-phone"></i>

                        <div>

                            <h4>Telepon</h4>

                            <p>+62 852 7477 6577</p>

                        </div>

                    </div>

                    <div class="info-item">

                        <i class="fa fa-whatsapp"></i>

                        <div>

                            <h4>WhatsApp</h4>

                            <p>+62 852 7477 6577</p>

                        </div>

                    </div>

                    <div class="info-item">

                        <i class="fa fa-envelope"></i>

                        <div>

                            <h4>Email</h4>

                            <p>aldinoperabot@gmail.com</p>

                        </div>

                    </div>

                    <div class="info-item">

                        <i class="fa fa-clock-o"></i>

                        <div>

                            <h4>Jam Operasional</h4>

                            <p>

                                Setiap Hari<br>

                                08.00 - 17.00 WIB

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!--================ KEUNGGULAN =================-->

<section class="why-us">

    <div class="container">

        <div class="section-title">

            <h2>Mengapa Memilih Kami?</h2>

            <p>
                Kami berkomitmen memberikan pelayanan terbaik
                dengan produk furniture berkualitas.
            </p>

        </div>

        <div class="row">

            <div class="col-md-3">

                <div class="why-card">

                    <i class="fa fa-cube"></i>

                    <h4>Produk Berkualitas</h4>

                    <p>

                        Menggunakan material pilihan
                        sehingga awet digunakan.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="why-card">

                    <i class="fa fa-truck"></i>

                    <h4>Pengiriman Aman</h4>

                    <p>

                        Pengiriman cepat
                        dan aman sampai tujuan.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="why-card">

                    <i class="fa fa-wallet"></i>

                    <h4>Harga Terjangkau</h4>

                    <p>

                        Harga bersaing
                        dengan kualitas terbaik.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="why-card">

                    <i class="fa fa-handshake"></i>

                    <h4>Pelayanan Ramah</h4>

                    <p>

                        Tim kami siap membantu
                        kebutuhan furniture Anda.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<!--================ FAQ =================-->

<section class="faq-section">

    <div class="container">

        <div class="section-title">

            <h2>Pertanyaan yang Sering Diajukan</h2>

            <p>
                Berikut beberapa pertanyaan yang sering ditanyakan pelanggan
                mengenai produk dan layanan Aldino Perabot.
            </p>

        </div>

        <div class="panel-group" id="faqAccordion">

            <!-- FAQ 1 -->

            <div class="panel panel-default faq-card">

                <div class="panel-heading">

                    <h4 class="panel-title">

                        <a data-toggle="collapse"
                            data-parent="#faqAccordion"
                            href="#faq1">

                            Bagaimana cara melakukan pemesanan?

                        </a>

                    </h4>

                </div>

                <div id="faq1" class="panel-collapse collapse in">

                    <div class="panel-body">

                        Anda dapat melakukan pemesanan langsung melalui website,
                        kemudian menambahkan produk ke keranjang dan melakukan checkout.
                        Apabila membutuhkan bantuan, silakan hubungi admin melalui WhatsApp.

                    </div>

                </div>

            </div>

            <!-- FAQ 2 -->

            <div class="panel panel-default faq-card">

                <div class="panel-heading">

                    <h4 class="panel-title">

                        <a data-toggle="collapse"
                            data-parent="#faqAccordion"
                            href="#faq2"
                            class="collapsed">

                            Apakah menerima pembayaran DP?

                        </a>

                    </h4>

                </div>

                <div id="faq2" class="panel-collapse collapse">

                    <div class="panel-body">

                        Ya. Kami menerima pembayaran Down Payment (DP)
                        sesuai ketentuan yang berlaku.
                        Pelunasan dapat dilakukan sebelum barang dikirim.

                    </div>

                </div>

            </div>

            <!-- FAQ 3 -->

            <div class="panel panel-default faq-card">

                <div class="panel-heading">

                    <h4 class="panel-title">

                        <a data-toggle="collapse"
                            data-parent="#faqAccordion"
                            href="#faq3"
                            class="collapsed">

                            Berapa lama proses pengiriman?

                        </a>

                    </h4>

                </div>

                <div id="faq3" class="panel-collapse collapse">

                    <div class="panel-body">

                        Pengiriman biasanya membutuhkan waktu
                        1–3 hari kerja tergantung lokasi tujuan
                        dan ketersediaan produk.

                    </div>

                </div>

            </div>

            <!-- FAQ 4 -->

            <div class="panel panel-default faq-card">

                <div class="panel-heading">

                    <h4 class="panel-title">

                        <a data-toggle="collapse"
                            data-parent="#faqAccordion"
                            href="#faq4"
                            class="collapsed">

                            Apakah bisa melakukan custom furniture?

                        </a>

                    </h4>

                </div>

                <div id="faq4" class="panel-collapse collapse">

                    <div class="panel-body">

                        Ya. Kami menerima pembuatan furniture custom
                        sesuai ukuran, model, dan kebutuhan pelanggan.

                    </div>

                </div>

            </div>

            <!-- FAQ 5 -->

            <div class="panel panel-default faq-card">

                <div class="panel-heading">

                    <h4 class="panel-title">

                        <a data-toggle="collapse"
                            data-parent="#faqAccordion"
                            href="#faq5"
                            class="collapsed">

                            Apakah ada garansi produk?

                        </a>

                    </h4>

                </div>

                <div id="faq5" class="panel-collapse collapse">

                    <div class="panel-body">

                        Beberapa produk memiliki garansi sesuai jenis
                        dan ketentuan dari Aldino Perabot.
                        Silakan tanyakan kepada admin sebelum melakukan pembelian.

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

   

    <!--footer start-->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="hm-footer-copyright text-center">
                <div class="footer-social">
                    <div class="social-media">
                        <a href="https://www.facebook.com/USERNAME" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="https://www.instagram.com/dino_ok86?igsh=MWs3MTgya2dzOGxkYw==" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a href="https://www.tiktok.com/@dinook5?_r=1&_t=ZS-97fKVSNCGdF" target="_blank">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
                <p>
                    &copy;2026. Aldino Perabot. All Rights Reserved.
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

</body>

</html>