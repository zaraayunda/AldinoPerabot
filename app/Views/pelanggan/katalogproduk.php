 <?= $this->extend('pelanggan/main') ?>
<?= $this->section('content') ?>
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
    <?= $this->endSection() ?>