<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pembayaran Pesanan</title>

    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/logo/logoaldino.png" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/css/styles.min.css" />

</head>

<body>

    <div class="page-wrapper"
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin6"
        data-sidebartype="full"
        data-sidebar-position="fixed"
        data-header-position="fixed">

        <div class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center py-5">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="card shadow">

                            <div class="card-body p-4">

                                <!-- ================= HEADER ================= -->

                                <div class="custom-header mb-4">

                                    <div class="row align-items-center">

                                        <div class="col-md-8">

                                            <div class="d-flex align-items-center">

                                                <div class="custom-icon">

                                                    <i class="ti ti-credit-card"></i>

                                                </div>

                                                <div class="ms-4">

                                                    <h2 class="custom-title">

                                                        Pembayaran Pesanan

                                                    </h2>

                                                    <p class="custom-subtitle">

                                                        Silakan selesaikan pembayaran agar pesanan dapat diproses oleh admin.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4 text-end">

                                            <img src="<?= base_url('assets/images/collection/arrivals3.png') ?>"
                                                class="img-fluid sofa-image">

                                        </div>

                                    </div>

                                </div>

                                <!-- ================= INFORMASI PESANAN ================= -->

                                <div class="card border mb-4">

                                    <div class="card-header-pengguna bg-primary text-white">

                                        Informasi Pesanan

                                    </div>

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-6 mb-3">

                                                <label>ID Pesanan</label>

                                                <input type="text"
                                                    class="form-control"
                                                    readonly
                                                    value="<?= $pesanan['idpesanan']; ?>">

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label>Tanggal Pesanan</label>

                                                <input type="text"
                                                    class="form-control"
                                                    readonly
                                                    value="<?= date('d-m-Y', strtotime($pesanan['tanggalpesanan'])); ?>">

                                            </div>

                                            <div class="col-md-12">

                                                <label>Total Pesanan</label>

                                                <input type="text"
                                                    class="form-control fw-bold text-success"
                                                    readonly
                                                    value="Rp <?= number_format($pesanan['totalharga'], 0, ',', '.'); ?>">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- ================= RINGKASAN ================= -->

                                <div class="row mb-4">

                                    <div class="col-md-4">

                                        <div class="card border">

                                            <div class="card-body text-center">

                                                <h6>Total Pesanan</h6>

                                                <h4 class="text-primary">

                                                    Rp <?= number_format($pesanan['totalharga'], 0, ',', '.'); ?>

                                                </h4>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="card border">

                                            <div class="card-body text-center">

                                                <h6>Sudah Dibayar</h6>

                                                <h4 class="text-success">

                                                    Rp <?= number_format($sudah_bayar, 0, ',', '.'); ?>

                                                </h4>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="card border">

                                            <div class="card-body text-center">

                                                <h6>Sisa Pembayaran</h6>

                                                <h4 class="text-danger">

                                                    Rp <?= number_format($pesanan['totalharga'] - $sudah_bayar, 0, ',', '.'); ?>

                                                </h4>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- ================= FORM ================= -->

                                <form action="<?= base_url('pembayaranpelanggan/simpan') ?>"
                                    method="post"
                                    enctype="multipart/form-data">

                                    <input type="hidden"
                                        name="idpesanan"
                                        value="<?= $pesanan['idpesanan']; ?>">

                                    <div class="card border">

                                        <div class="card-header-pengguna bg-primary text-white">

                                            Form Pembayaran

                                        </div>

                                        <div class="card-body">

                                            <?php if ($mode == "awal") { ?>

                                                <div class="mb-3">

                                                    <label class="form-label">

                                                        Jenis Pembayaran

                                                    </label>

                                                    <select name="jenispembayaran"
                                                        class="form-select">

                                                        <option value="DP">DP</option>

                                                        <option value="Full Payment">Full Payment</option>

                                                    </select>

                                                </div>

                                            <?php } ?>

                                            <?php if ($mode == "pelunasan") { ?>

                                                <div class="alert alert-info">

                                                    Pelunasan pembayaran.

                                                </div>

                                                <input type="hidden"
                                                    name="jenispembayaran"
                                                    value="Pelunasan">

                                            <?php } ?>

                                            <div class="mb-3">

                                                <label>Metode Pembayaran</label>

                                                <select
                                                    name="metode_pembayaran"
                                                    class="form-select">

                                                    <option value="Cash">Cash</option>

                                                    <option value="Transfer">Transfer</option>

                                                </select>

                                            </div>

                                            <div class="mb-3">

                                                <label>Jumlah Pembayaran</label>

                                                <input
                                                    type="number"
                                                    name="jumlahbayar"
                                                    class="form-control"
                                                    <?= $mode == "pelunasan" ? "readonly" : "" ?>
                                                    value="<?= $mode == "pelunasan" ? $pesanan['totalharga'] - $sudah_bayar : "" ?>">

                                                <small class="text-muted">

                                                    Minimal DP adalah 30% dari total pesanan.

                                                </small>

                                            </div>

                                            <div class="mb-3">

                                                <label>Bukti Pembayaran</label>

                                                <input
                                                    type="file"
                                                    name="bukti_pembayaran"
                                                    class="form-control">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="text-end mt-4">

                                        <a
                                            onclick="history.back()"
                                            class="btn btn-secondary">

                                            Kembali

                                        </a>

                                        <button type="submit" class="btn btn-primary">
                                            Bayar Sekarang
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script src="<?= base_url() ?>/assets/dashboard/libs/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>/assets/dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>