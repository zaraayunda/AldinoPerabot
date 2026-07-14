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

<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Tambah Pembayaran</h3>
            <p>Lengkapi data pembayaran pesanan</p>
        </div>

        <form action="<?= base_url('pembayaran/simpan') ?>" method="post" enctype="multipart/form-data">

            <?= csrf_field() ?>
            <input
                type="hidden"
                name="idpembayaran"
                class="form-control"
                value="<?= $idpembayaran ?>"
                readonly>

            <div class="card-body">

                <h4 class="section-title">
                    Informasi Pesanan
                </h4>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Pesanan</label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="idpesanan"
                                id="idpesanan"
                                class="form-control"
                                placeholder="Pilih Pesanan"
                                readonly>

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalPesanan">
                                Cari
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Tanggal Pesanan
                        </label>

                        <input
                            type="date"
                            id="tanggalpesanan"
                            class="form-control"
                            readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Nama Pelanggan
                        </label>
                        <div class="input-group">
                            <input
                                type="hidden"
                                id="idpelanggan">
                            <input
                                type="text"
                                id="namapelanggan"
                                class="form-control"
                                readonly>
                        </div>
                    </div>
                </div>

                <div class="row align-items-end">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Jumlah Produk
                        </label>
                        <input
                            type="number"
                            id="jumlahproduk"
                            class="form-control"
                            readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Total Pembayaran
                        </label>
                        <input
                            type="number"
                            id="total"
                            class="form-control"
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
                            readonly>
                    </div>

                </div>

                <hr>

                <h4 class="section-title">
                    Data Pembayaran
                </h4>

                <div class="row align-items-end">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Pembayaran</label>
                        <input
                            type="date"
                            name="tanggalpembayaran"
                            class="form-control"
                            value="<?= date('Y-m-d') ?>"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Jumlah Bayar
                        </label>
                        <input
                            type="number"
                            id="jumlahbayar"
                            name="jumlahbayar"
                            class="form-control">
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jenis Pembayaran</label>

                        <select
                            name="jenispembayaran"
                            class="form-select"
                            required>
                            <option value="DP">
                                DP
                            </option>
                            <option value="Full Payment">
                                Full Payment
                            </option>
                            <option value="Pelunasan">
                                Pelunasan
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Metode Pembayaran</label>
                        <select
                            name="metode_pembayaran"
                            class="form-select"
                            required>
                            <option value="cash">
                                Cash
                            </option>
                            <option value="transfer">
                                Transfer
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Status Pembayaran</label>
                        <select
                            name="statuspembayaran"
                            class="form-select"
                            placeholder="Pilih"
                            required>
                            <option value="menunggu_pembayaran">
                                Menunggu Pembayaran
                            </option>
                            <option value="valid">
                                Valid
                            </option>
                            <option value="ditolak">
                                Ditolak
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-end">

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Bukti Pembayaran
                            <span class="required">*</span>
                        </label>

                        <input
                            type="file"
                            name="bukti_pembayaran"
                            class="form-control"
                            accept=".jpg,.jpeg,.png"
                            required>
                        <small class="text-muted">
                            Format: JPG, JPEG, PNG | Maksimal: 2 MB
                        </small>
                    </div>
                </div>

            </div>

            <div class="form-footer">

                <div class="card-body">

                    <button
                        type="submit"
                        class="btn btn-simpan">
                        Simpan
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

<div class="modal fade" id="modalPesanan">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Data Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <?php
                // MAP pelanggan
                $pelangganMap = [];
                foreach ($pelanggan as $p) {
                    $pelangganMap[$p['idpelanggan']] = $p['namapelanggan'];
                }

                // HITUNG JUMLAH PRODUK PER PESANAN
                $jumlahProdukMap = [];

                foreach ($detailpesanan as $d) {
                    $id = $d['idpesanan'];

                    if (!isset($jumlahProdukMap[$id])) {
                        $jumlahProdukMap[$id] = 0;
                    }

                    $jumlahProdukMap[$id] += $d['qty']; // atau $d['jumlah'] sesuai field kamu
                }
                ?>

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Nama Pelanggan</th>
                            <th>Jumlah Produk</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($pesanan as $p) : ?>

                            <?php
                            $namaPelanggan = $pelangganMap[$p['idpelanggan']] ?? '-';

                            // jumlah produk (fallback 0)
                            $jumlahProduk = $jumlahProdukMap[$p['idpesanan']] ?? 0;
                            ?>

                            <tr>

                                <td><?= $p['idpesanan'] ?></td>

                                <td><?= $p['tanggalpesanan'] ?></td>

                                <td><?= $namaPelanggan ?></td>

                                <td>
                                    <?= $jumlahProduk ?> pcs
                                </td>

                                <td>
                                    Rp <?= number_format($p['total'], 0, ',', '.') ?>
                                </td>

                                <td>
                                    <?= $p['statuspesanan'] ?>
                                </td>

                                <td>

                                    <button type="button"
                                        class="btn btn-success btn-sm pilih-pesanan"

                                        data-id="<?= $p['idpesanan'] ?>"
                                        data-tanggal="<?= $p['tanggalpesanan'] ?>"
                                        data-nama="<?= $namaPelanggan ?>"
                                        data-idpelanggan="<?= $p['idpelanggan'] ?>"
                                        data-total="<?= $p['total'] ?>"
                                        data-jumlahproduk="<?= $jumlahProduk ?>"
                                        data-statuspesanan="<?= $p['statuspesanan'] ?>">

                                        Pilih

                                    </button>

                                </td>

                            </tr>

                        <?php endforeach ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script>
    document.querySelectorAll('.pilih-pesanan').forEach(btn => {
        btn.addEventListener('click', function() {

            document.getElementById('idpesanan').value = this.dataset.id;
            document.getElementById('tanggalpesanan').value = this.dataset.tanggal;
            document.getElementById('namapelanggan').value = this.dataset.nama;
            document.getElementById('idpelanggan').value = this.dataset.idpelanggan;
            document.getElementById('jumlahproduk').value = this.dataset.jumlahproduk;
            document.getElementById('total').value = this.dataset.total;
            document.getElementById('statuspesanan').value = this.dataset.statuspesanan;

            // OPTIONAL kalau kamu punya field jumlah produk di form
            // document.getElementById('jumlahproduk').value = this.dataset.jumlahproduk;

            bootstrap.Modal.getInstance(
                document.getElementById('modalPesanan')
            ).hide();

        });
    });
</script>

<?= $this->endSection() ?>