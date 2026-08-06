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

<div class="checkout-container">

    <div class="page-header">
        <h2>Checkout Pesanan</h2>
        <div class="page-divider"></div>
        <p>
            Periksa kembali produk yang akan Anda pesan.
        </p>
    </div>

    <form
        action="<?= base_url('checkout/simpan') ?>"
        method="post">

        <?php
        $grandTotal = 0;
        ?>

        <?php foreach ($produk as $item) : ?>

            <?php
            $grandTotal += $item['subtotal'];
            ?>

            <input
                type="hidden"
                name="idkeranjang[]"
                value="<?= $item['idkeranjang'] ?>">

            <div class="checkout-card">

                <div class="checkout-image">

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

                <div class="checkout-detail">

                    <h4>
                        <?= esc($item['namaproduk']) ?>
                    </h4>

                    <p>
                        Qty :
                        <?= $item['qty'] ?>
                    </p>

                    <?php if ($item['diskon'] > 0) : ?>

                        <div class="discount-pill">
                            -<?= $item['diskon'] ?>%
                        </div>

                        <div class="old-price">

                            Rp
                            <?= number_format(
                                $item['harga'],
                                0,
                                ',',
                                '.'
                            ) ?>

                        </div>

                    <?php endif; ?>

                    <div class="price">

                        Rp
                        <?= number_format(
                            $item['harga_final'],
                            0,
                            ',',
                            '.'
                        ) ?>

                    </div>

                </div>

                <div class="checkout-subtotal">

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

            </div>

        <?php endforeach; ?>

        <div class="checkout-summary">

            <div>

                <h5>
                    Total Pembayaran
                </h5>

                <h2>

                    Rp
                    <?= number_format(
                        $grandTotal,
                        0,
                        ',',
                        '.'
                    ) ?>

                </h2>

            </div>

            <button
                type="submit"
                class="btn-checkout-final">

                Buat Pesanan

            </button>

        </div>

    </form>

</div>

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