<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php
$pelangganMap = [];
foreach ($pelanggan as $p) {
    $pelangganMap[$p['idpelanggan']] = $p['namapelanggan'];
}
?>

<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Edit Pembayaran</h3>
            <p>Edit data pembayaran pesanan</p>
        </div>

        <form action="<?= base_url('pembayaran/update') ?>"
            method="post"
            enctype="multipart/form-data">

            <?= csrf_field() ?>

            <input
                type="hidden"
                name="idpembayaran"
                value="<?= $pembayaran['idpembayaran'] ?>">

            <div class="card-body">

                <h4 class="section-title">
                    Informasi Pesanan
                </h4>

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            ID Pesanan
                        </label>

                        <input
                            type="text"
                            name="idpesanan"
                            id="idpesanan"
                            class="form-control"
                            value="<?= $pembayaran['idpesanan'] ?>"
                            readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Tanggal Pesanan
                        </label>

                        <input
                            type="date"
                            id="tanggalpesanan"
                            class="form-control"
                            value="<?= $pesananTerpilih['tanggalpesanan'] ?>"
                            readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Nama Pelanggan
                        </label>

                        <input
                            type="text"
                            id="namapelanggan"
                            class="form-control"
                            value="<?= $pelangganMap[$pesananTerpilih['idpelanggan']] ?? '-' ?>"
                            readonly>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Jumlah Produk
                        </label>

                        <input
                            type="number"
                            id="jumlahproduk"
                            class="form-control"
                            value="<?= $jumlahProduk ?>"
                            readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Total Pembayaran
                        </label>

                        <input
                            type="number"
                            id="totalharga"
                            class="form-control"
                            value="<?= $pesananTerpilih['totalharga'] ?>"
                            readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Status Pesanan
                        </label>

                        <input
                            type="text"
                            id="statuspesanan"
                            class="form-control"
                            value="<?= $pesananTerpilih['statuspesanan'] ?>"
                            readonly>
                    </div>

                </div>

                <hr>

                <h4 class="section-title">
                    Data Pembayaran
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tanggal Pembayaran
                        </label>

                        <input
                            type="date"
                            name="tanggalpembayaran"
                            class="form-control"
                            value="<?= $pembayaran['tanggalpembayaran'] ?>"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jumlah Bayar
                        </label>

                        <input
                            type="number"
                            name="jumlahbayar"
                            class="form-control"
                            value="<?= $pembayaran['jumlahbayar'] ?>"
                            required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Jenis Pembayaran
                        </label>

                        <select
                            name="jenispembayaran"
                            class="form-select"
                            required>

                            <option value="DP"
                                <?= $pembayaran['jenispembayaran'] == 'DP' ? 'selected' : '' ?>>
                                DP
                            </option>

                            <option value="Full Payment"
                                <?= $pembayaran['jenispembayaran'] == 'Full Payment' ? 'selected' : '' ?>>
                                Full Payment
                            </option>

                            <option value="Pelunasan"
                                <?= $pembayaran['jenispembayaran'] == 'Pelunasan' ? 'selected' : '' ?>>
                                Pelunasan
                            </option>

                        </select>

                    </div>
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Metode Pembayaran
                        </label>

                        <select
                            name="metode_pembayaran"
                            class="form-select"
                            required>

                            <option value="cash"
                                <?= $pembayaran['metode_pembayaran'] == 'cash' ? 'selected' : '' ?>>
                                Cash
                            </option>

                            <option value="transfer"
                                <?= $pembayaran['metode_pembayaran'] == 'transfer' ? 'selected' : '' ?>>
                                Transfer
                            </option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Status Pembayaran
                        </label>

                        <select
                            name="statuspembayaran"
                            class="form-select"
                            required>

                            <option value="menunggu_pembayaran"
                                <?= $pembayaran['statuspembayaran'] == 'menunggu_pembayaran' ? 'selected' : '' ?>>
                                Menunggu Pembayaran
                            </option>

                            <option value="valid"
                                <?= $pembayaran['statuspembayaran'] == 'valid' ? 'selected' : '' ?>>
                                Valid
                            </option>

                            <option value="ditolak"
                                <?= $pembayaran['statuspembayaran'] == 'ditolak' ? 'selected' : '' ?>>
                                Ditolak
                            </option>

                        </select>

                    </div>

                </div>

                <!-- Foto Lama -->

                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Bukti Pembayaran Saat Ini
                        </label>

                        <div class="mt-2">

                            <a href="<?= base_url('storage/fotobuktipembayaran/' . $pembayaran['bukti_pembayaran']) ?>"
                                target="_blank">

                                <img
                                    src="<?= base_url('storage/fotobuktipembayaran/' . $pembayaran['bukti_pembayaran']) ?>"
                                    class="img-thumbnail"
                                    style="width:150px;height:150px;object-fit:cover;">

                            </a>

                        </div>

                    </div>

                </div>

                <!-- Upload Baru -->

                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Ganti Bukti Pembayaran
                        </label>

                        <input
                            type="file"
                            name="bukti_pembayaran"
                            class="form-control"
                            accept=".jpg,.jpeg,.png">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti gambar
                        </small>

                    </div>

                </div>

            </div>

            <div class="form-footer">

                <div class="card-body">

                    <button
                        type="submit"
                        class="btn btn-simpan">
                        Simpan Perubahan
                    </button>

                    <a
                        href="<?= base_url('datapembayaran') ?>"
                        class="btn btn-kembali ms-2">
                        Kembali
                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

<?= $this->endSection() ?>