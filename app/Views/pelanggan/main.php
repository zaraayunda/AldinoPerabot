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
    <input
        type="hidden"
        name="iduser"
        class="form-control"
        value="<?= $user['iduser'] ?>"
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
    <!--welcome-hero end -->

    <main class="main-content">
        <?= $this->renderSection('content') ?>?>
    </main>


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


    <script src="<?= base_url() ?>/assets/product/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="<?= base_url() ?>/assets/product/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/assets/product/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="<?= base_url() ?>/assets/product/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="<?= base_url() ?>/assets/product/js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="<?= base_url() ?>/assets/product/js/jquery.countTo.js"></script>
    <!-- Flexslider -->
    <script src="<?= base_url() ?>/assets/product/js/jquery.flexslider-min.js"></script>
    <!-- Main -->
    <script src="<?= base_url() ?>/assets/product/js/main.js"></script>
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


    <?php if (session()->getFlashdata('success')) : ?>

        <script>
            Swal.fire({

                icon: 'success',

                title: 'Berhasil',

                text: "<?= session()->getFlashdata('success'); ?>",

                confirmButtonText: 'OK'

            });
        </script>


    <?php endif; ?>


    <?php if (session()->getFlashdata('error')) : ?>

        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "<?= session()->getFlashdata('error') ?>",
            });
        </script>

    <?php endif; ?>

</body>



</html>