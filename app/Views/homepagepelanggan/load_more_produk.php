<?php if (!empty($produk)) : ?>

    <?php foreach ($produk as $row) : ?>

<div class="col-md-3 col-sm-4">
    <div class="single-new-arrival">

        <div class="single-new-arrival-bg">

            <img src="<?= base_url('storage/fotoproduk/' . $row['foto']) ?>"
                alt="<?= esc($row['namaproduk']) ?>">

            <div class="single-new-arrival-bg-overlay"></div>

            <div class="new-arrival-cart">
                <a href="#" class="action-icon">
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

        <p class="arrival-product-price">
            Rp <?= number_format($row['harga'], 0, ',', '.') ?>
        </p>

    </div>
</div>

<?php endforeach; ?>

<?php endif; ?>