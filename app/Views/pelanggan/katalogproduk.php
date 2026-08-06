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
    <!--welcome-hero end -->

    <!-- Kategori Produk -->
    <section class="kategori-section">

        <div class="container">

            <!-- Heading -->
            <div class="page-header">

                <h2>
                    Kategori Produk
                </h2>

                <div class="page-divider"></div>

                <p>
                    Temukan berbagai pilihan furniture berkualitas untuk melengkapi
                    ruang tamu, kamar tidur, ruang makan, hingga kebutuhan interior
                    rumah Anda.
                </p>

            </div>

            <!-- Kategori -->
            <div class="kategori-wrapper">

                <button class="kategori-btn active" data-kategori="all">
                    <i class="fa-solid fa-border-all"></i>
                    Semua
                </button>

                <?php foreach ($kategori as $k) :

                    $icon = "fa-box";

                    switch (strtolower($k['namakategori'])) {

                        case "kursi":
                            $icon = "fa-chair";
                            break;

                        case "meja":
                            $icon = "fa-table";
                            break;

                        case "lemari":
                            $icon = "fa-door-open";
                            break;

                        case "sofa":
                            $icon = "fa-couch";
                            break;

                        case "tempat tidur":
                            $icon = "fa-bed";
                            break;

                        case "rak":
                            $icon = "fa-book";
                            break;

                        case "bufet":
                            $icon = "fa-cabinet-filing";
                            break;
                    }

                ?>

                    <button
                        class="kategori-btn"
                        data-kategori="<?= $k['idkategori'] ?>">

                        <i class="fa-solid <?= $icon ?>"></i>

                        <?= esc($k['namakategori']) ?>

                    </button>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <section id="new-arrivals" class="new-arrivals">
        <div class="container">
            <div class="new-arrivals-content">
                <div class="row" id="produk-container">

                    <?php if (!empty($produk)) : ?>
                        <?php foreach ($produk as $row) : ?>

                            <?php
                            $hargaAsli = $row['harga'];
                            $diskon = (float) $row['diskon'];
                            $hargaDiskon = $hargaAsli;

                            if ($diskon > 0) {
                                $hargaDiskon = $hargaAsli - ($hargaAsli * $diskon / 100);
                            }
                            ?>

                            <div class="col-md-3 col-sm-4 produk-item" data-kategori="<?= $row['idkategori'] ?>">
                                <div class="single-new-arrival">

                                    <div class="single-new-arrival-bg">

                                        <?php if ($diskon > 0) : ?>
                                            <div class="sale bg-1">
                                                -<?= $diskon ?>%
                                            </div>
                                        <?php endif; ?>

                                        <img
                                            src="<?= base_url('storage/fotoproduk/' . $row['foto']) ?>"
                                            alt="<?= esc($row['namaproduk']) ?>">

                                        <div class="single-new-arrival-bg-overlay"></div>

                                        <div class="new-arrival-cart">

                                            <a href="<?= base_url('simpankeranjang/' . $row['idproduk']) ?>" class="action-icon">
                                                <span class="lnr lnr-cart"></span>
                                            </a>

                                            <a href="#"
                                                class="action-icon btn-detail-produk"
                                                data-id="<?= $row['idproduk'] ?>"
                                                data-nama="<?= esc($row['namaproduk']) ?>"
                                                data-jenis="<?= esc($row['jenisproduk']) ?>"
                                                data-harga="<?= $row['harga'] ?>"
                                                data-diskon="<?= $row['diskon'] ?>"
                                                data-detail="<?= esc($row['detailproduk']) ?>"
                                                data-foto="<?= base_url('storage/fotoproduk/' . $row['foto']) ?>">

                                                <span class="lnr lnr-eye"></span>

                                            </a>

                                        </div>

                                    </div>

                                    <h4>
                                        <a href="#">
                                            <?= esc($row['namaproduk']) ?>
                                        </a>
                                    </h4>

                                    <?php if ($diskon > 0) : ?>

                                        <p class="arrival-product-price" style="margin-bottom:4px;">
                                            <span style="text-decoration:line-through;color:#999;font-size:14px;">
                                                Rp <?= number_format($hargaAsli, 0, ',', '.') ?>
                                            </span>
                                        </p>

                                        <p class="arrival-product-price">
                                            <span style="color:#d9534f;font-weight:bold;font-size:18px;">
                                                Rp <?= number_format($hargaDiskon, 0, ',', '.') ?>
                                            </span>
                                        </p>

                                    <?php else : ?>

                                        <p class="arrival-product-price">
                                            Rp <?= number_format($hargaAsli, 0, ',', '.') ?>
                                        </p>

                                    <?php endif; ?>

                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Empty State -->
                    <div id="empty-kategori" class="empty-product"
                        style="<?= empty($produk) ? '' : 'display:none;' ?>">

                        <div class="empty-icon">
                            <i class="fa-solid fa-box-open"></i>
                        </div>

                        <h3>Produk Belum Tersedia</h3>

                        <p>
                            Maaf, belum ada produk pada kategori yang dipilih.
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalDetailProduk" tabindex="-1" role="dialog">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content detail-modal">

                <!-- Header -->
                <div class="modal-header detail-header">

                    <div class="header-title">

                        <h3>
                            <i class="fa fa-cube"></i>
                            Detail Produk
                        </h3>

                        <small>Informasi lengkap produk furniture pilihan Anda</small>

                    </div>

                    <button
                        type="button"
                        class="close btn-close-modal-x"
                        data-dismiss="modal">

                        &times;

                    </button>

                </div>

                <!-- Body -->
                <div class="modal-body">

                    <div class="row">

                        <!-- FOTO -->
                        <div class="col-md-5">

                            <div class="detail-image">

                                <img
                                    id="modalFoto"
                                    src=""
                                    class="img-responsive">

                            </div>

                        </div>

                        <!-- INFORMASI -->
                        <div class="col-md-7">

                            <h2 id="modalNama"></h2>

                            <div class="detail-divider"></div>

                            <table class="table-detail">

                                <tr>

                                    <td>Harga</td>

                                    <td id="modalHarga"></td>

                                </tr>

                                <tr>

                                    <td>Diskon</td>

                                    <td id="modalDiskon"></td>

                                </tr>

                            </table>

                            <div class="detail-item">

                                <span>Deskripsi Produk</span>

                                <div class="deskripsi-box">

                                    <p id="modalDetail"></p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer detail-footer">

                    <button
                        type="button"
                        class="btn btn-close-custom"
                        data-dismiss="modal">

                        Tutup

                    </button>

                    <button
                        type="button"
                        id="btnKeranjangModal"
                        class="btn btn-cart-modal">

                        <i class="fa fa-shopping-cart"></i>

                        Tambah ke Keranjang

                    </button>

                </div>

            </div>

        </div>

    </div>


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


    <script>
        $(document).ready(function() {

            $('.btn-detail-produk').click(function(e) {

                e.preventDefault();

                var nama = $(this).data('nama');
                var jenis = $(this).data('jenis');
                var harga = parseFloat($(this).data('harga'));
                var diskon = parseFloat($(this).data('diskon'));
                var detail = $(this).data('detail');
                var foto = $(this).data('foto');
                var id = $(this).data('id');

                $('#btnKeranjangModal').attr(
                    'href',
                    '<?= base_url("simpankeranjang") ?>/' + id
                );

                $('#modalNama').text(nama);
                $('#modalJenis').text(jenis);
                $('#modalDetail').text(detail);
                $('#modalFoto').attr('src', foto);

                if (diskon > 0) {

                    var hargaDiskon = harga - (harga * diskon / 100);

                    $('#modalHarga').html(
                        '<span class="old-price">Rp ' + harga.toLocaleString('id-ID') + '</span>' +
                        '<span class="new-price">Rp ' + hargaDiskon.toLocaleString('id-ID') + '</span>'
                    );

                    $('#modalDiskon').html(
                        '<span class="diskon-badge">Diskon ' + diskon + '%</span>'
                    );

                } else {

                    $('#modalHarga').html(
                        '<span class="new-price">Rp ' + harga.toLocaleString('id-ID') + '</span>'
                    );

                    $('#modalDiskon').html('-');

                }

                $('#modalDetailProduk').modal('show');

            });

        });

        // Filter Kategori
        $('.kategori-btn').click(function() {

            $('.kategori-btn').removeClass('active');
            $(this).addClass('active');

            let kategori = $(this).data('kategori');

            if (kategori == 'all') {

                $('.produk-item').fadeIn(200);
                $('#empty-kategori').hide();

            } else {

                $('.produk-item').hide();

                let produk = $('.produk-item[data-kategori="' + kategori + '"]');

                if (produk.length > 0) {

                    produk.fadeIn(200);
                    $('#empty-kategori').hide();

                } else {

                    $('#empty-kategori').fadeIn(200);

                }

            }

        });
    </script>
</body>

</html>