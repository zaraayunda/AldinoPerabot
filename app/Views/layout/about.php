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
    <!--welcome-hero end -->

    <section class="about-hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <span class="about-label">
                        <i class="fa fa-home"></i>
                        Tentang Kami
                    </span>

                    <h1>
                        Menghadirkan Furniture Berkualitas
                        dengan Sentuhan Pengrajin Lokal
                        Sejak <span>2002</span>
                    </h1>

                    <p>
                        Aldino Perabot merupakan usaha furnitur yang berlokasi di Kabupaten Solok
                        dan telah dipercaya masyarakat selama lebih dari dua dekade dalam
                        menghasilkan berbagai produk furnitur berkualitas, mulai dari pintu,
                        lemari, meja hingga pesanan custom sesuai kebutuhan pelanggan.
                    </p>

                    <div class="hero-button">

                        <a href="<?= base_url('katalogproduk') ?>" class="btn-about-primary">
                            <i class="fa fa-shopping-bag"></i>
                            Lihat Katalog
                        </a>

                        <a href="<?= base_url('pengajuan-custom') ?>" class="btn-about-secondary">
                            Ajukan Custom
                        </a>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="about-image">

                        <img
                            src="<?= base_url() ?>/assets/images/populer-products/p2.png"
                            class="img-responsive">

                    </div>

                </div>

            </div>

        </div>

    </section>
    <section class="company-story">

        <div class="container">

            <div class="section-title text-center">

                <h2>Cerita Kami</h2>

                <p>
                    Perjalanan Aldino Perabot dalam menghadirkan furnitur berkualitas
                    untuk setiap pelanggan.
                </p>

            </div>

            <div class="row">

                <div class="col-md-5">

                    <div class="story-image">

                        <img
                            src="<?= base_url() ?>/assets/images/populer-products/p2.png"
                            class="img-responsive">

                    </div>

                </div>

                <div class="col-md-7">

                    <div class="story-content">

                        <span class="story-year">
                            Berdiri Sejak 2002
                        </span>

                        <h3>
                            Berawal dari Sebuah Keahlian
                            Menjadi Usaha Furnitur Terpercaya
                        </h3>

                        <p>

                            Aldino Perabot merupakan usaha furnitur yang berlokasi di Jalan
                            Lintas Sumatera Kilometer 17, Koto Gadang Guguak,
                            Kecamatan Gunung Talang, Kabupaten Solok.

                        </p>

                        <p>

                            Usaha ini didirikan oleh <strong>Bapak Dalimi</strong> pada tahun
                            <strong>2002</strong>. Pada awal berdirinya, Aldino Perabot hanya
                            memproduksi pintu kayu. Seiring meningkatnya kepercayaan pelanggan,
                            usaha berkembang dan mulai memproduksi berbagai jenis furnitur
                            rumah tangga maupun perlengkapan bangunan.

                        </p>

                        <p>

                            Sejak tahun <strong>2017</strong>, usaha ini diteruskan oleh
                            <strong>Aldino Oktami</strong> yang tetap mempertahankan kualitas,
                            pelayanan terbaik, serta kepercayaan pelanggan hingga saat ini.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <section class="company-counter">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-6">

                    <div class="counter-box">

                        <i class="fa fa-calendar"></i>

                        <h2>2002</h2>

                        <p>Tahun Berdiri</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="counter-box">

                        <i class="fa fa-users"></i>

                        <h2>3</h2>

                        <p>Tenaga Kerja</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="counter-box">

                        <i class="fa fa-cubes"></i>

                        <h2>100+</h2>

                        <p>Produk Selesai</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="counter-box">

                        <i class="fa-regular fa-face-smile"></i>

                        <h2>20+</h2>

                        <p>Tahun Pengalaman</p>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <section class="why-us">

        <div class="container">

            <div class="section-title text-center">

                <h2>Mengapa Memilih Aldino Perabot?</h2>

                <p>
                    Kami selalu mengutamakan kualitas, ketepatan, dan kepuasan pelanggan
                    dalam setiap produk yang kami hasilkan.
                </p>

            </div>

            <div class="row">

                <div class="col-md-3">

                    <div class="why-card">

                        <i class="fa fa-tree"></i>

                        <h4>Berkualitas</h4>

                        <p>
                            Menggunakan kayu pilihan yang kuat,
                            tahan lama, dan berkualitas.
                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="why-card">

                        <i class="fa fa-pencil"></i>

                        <h4>Custom Design</h4>

                        <p>
                            Produk dibuat sesuai desain
                            dan kebutuhan pelanggan.
                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="why-card">

                        <i class="fa fa-check-circle"></i>

                        <h4>Kualitas Terjamin</h4>

                        <p>
                            Setiap produk melalui proses
                            pengerjaan yang teliti.
                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="why-card">

                        <i class="fa fa-handshake"></i>

                        <h4>Terpercaya</h4>

                        <p>
                            Dipercaya pelanggan sejak tahun
                            2002 hingga sekarang.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <section class="vision-mission">

        <div class="container">

            <div class="section-title text-center">

                <h2>Visi & Misi</h2>

                <p>
                    Komitmen kami dalam menghadirkan produk furnitur berkualitas
                    dan pelayanan terbaik bagi setiap pelanggan.
                </p>

            </div>

            <div class="row">

                <div class="col-md-5">

                    <div class="vision-box">

                        <div class="vm-icon">
                            <i class="fa fa-eye"></i>
                        </div>

                        <h3>Visi</h3>

                        <p>
                            Menjadi usaha mebel yang terpercaya dalam menyediakan
                            produk furnitur berkualitas dan sesuai dengan kebutuhan
                            pelanggan.
                        </p>

                    </div>

                </div>

                <div class="col-md-7">

                    <div class="mission-box">

                        <div class="vm-icon">
                            <i class="fa fa-bullseye"></i>
                        </div>

                        <h3>Misi</h3>

                        <ul>

                            <li>
                                Memberikan pelayanan terbaik dengan mengutamakan kepuasan pelanggan.
                            </li>

                            <li>
                                Menghasilkan produk furnitur yang berkualitas, kuat, dan tahan lama.
                            </li>

                            <li>
                                Melayani berbagai jenis pesanan, baik skala kecil maupun besar.
                            </li>

                            <li>
                                Menjalin hubungan baik untuk meningkatkan kepercayaan pelanggan.
                            </li>

                            <li>
                                Mengembangkan usaha agar mampu bersaing di pasar yang lebih luas.
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <section class="our-team">

        <div class="container">

            <div class="section-title text-center">

                <h2>Tim Kami</h2>

                <p>
                    Orang-orang yang berada di balik setiap furnitur berkualitas
                    yang kami hasilkan.
                </p>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="team-card">

                        <img src="<?= base_url('assets/images/team/owner.jpg') ?>">

                        <h4>Aldino Oktami</h4>

                        <span>Owner</span>

                        <p>
                            Bertanggung jawab dalam menerima pesanan,
                            konsultasi desain,
                            hingga memastikan kualitas produk.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="team-card">

                        <img src="<?= base_url('assets/images/team/produksi.jpg') ?>">

                        <h4>Tim Produksi</h4>

                        <span>Furniture Production</span>

                        <p>
                            Mengolah material kayu menjadi produk
                            furnitur sesuai desain yang telah
                            disepakati bersama pelanggan.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="team-card">

                        <img src="<?= base_url('assets/images/team/finishing.jpg') ?>">

                        <h4>Finishing & Operasional</h4>

                        <span>Quality & Delivery</span>

                        <p>
                            Bertugas melakukan finishing,
                            pengecekan kualitas,
                            pengiriman dan pemasangan
                            produk kepada pelanggan.
                        </p>

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