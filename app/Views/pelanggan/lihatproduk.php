<?= $this->extend('pelanggan/main') ?>
<?= $this->section('content') ?>

<?php
$hargaAsli = $produk['harga'];
$diskon = (float)$produk['diskon'];
$hargaDiskon = $hargaAsli;

if ($diskon > 0) {
    $hargaDiskon = $hargaAsli - ($hargaAsli * $diskon / 100);
}
?>

<section style="padding:60px 0;">
    <div class="container">

        <div class="row">

            <!-- Foto -->
            <div class="col-md-6">

                <img src="<?= base_url('storage/fotoproduk/' . $produk['foto']) ?>"
                    class="img-responsive"
                    style="width:100%;border-radius:10px;border:1px solid #ddd;">

            </div>

            <!-- Detail -->
            <div class="col-md-6">

                <h2><?= esc($produk['namaproduk']) ?></h2>

                <hr>

                <p>
                    <strong>ID Produk</strong><br>
                    <?= $produk['idproduk'] ?>
                </p>

                <p>
                    <strong>Kategori</strong><br>
                    <?= esc($produk['namakategori']) ?>
                </p>

                <p>
                    <strong>Jenis Produk</strong><br>
                    <?= esc($produk['jenisproduk']) ?>
                </p>

                <?php if ($diskon > 0) : ?>

                    <h4>
                        <del style="color:#999;">
                            Rp <?= number_format($hargaAsli,0,',','.') ?>
                        </del>
                    </h4>

                    <h2 style="color:#d9534f;">
                        Rp <?= number_format($hargaDiskon,0,',','.') ?>
                    </h2>

                    <span class="badge badge-danger">
                        Diskon <?= $diskon ?>%
                    </span>

                <?php else : ?>

                    <h2>
                        Rp <?= number_format($hargaAsli,0,',','.') ?>
                    </h2>

                <?php endif; ?>

                <hr>

                <h4>Detail Produk</h4>

                <p style="text-align:justify;line-height:28px;">
                    <?= nl2br(esc($produk['detailproduk'])) ?>
                </p>

                <br>

                <a href="<?= base_url('simpankeranjang/' . $produk['idproduk']) ?>"
                    class="btn btn-danger btn-lg">

                    <i class="fa fa-shopping-cart"></i>
                    Tambah ke Keranjang

                </a>

                <a href="<?= base_url('katalog') ?>"
                    class="btn btn-default btn-lg">

                    Kembali

                </a>

            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>