<div class="checkout-container">

    <div class="page-header">
        <h2>Checkout Pesanan</h2>
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

