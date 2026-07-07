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
            <h3>Tambah Pesanan</h3>
            <p>Lengkapi data pesanan pelanggan</p>
        </div>

        <form action="<?= base_url('pesanan/simpan') ?>" method="post">

            <?= csrf_field() ?>
            <input
                type="hidden"
                name="idpesanan"
                class="form-control"
                value="<?= $idpesanan ?>"
                readonly>

            <div class="card-body">

                <h4 class="section-title">
                    Informasi Pesanan
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Pesanan</label>
                        <input
                            type="date"
                            name="tanggalpesanan"
                            class="form-control"
                            value="<?= date('Y-m-d') ?>"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pelanggan</label>

                        <div class="input-group">

                            <input
                                type="hidden"
                                name="idpelanggan"
                                id="idpelanggan">

                            <input
                                type="text"
                                id="namapelanggan"
                                class="form-control"
                                placeholder="Pilih pelanggan"
                                readonly>

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalPelanggan">
                                Cari
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            No HP
                        </label>

                        <input
                            type="text"
                            id="nohp"
                            class="form-control"
                            readonly>
                    </div>
                    <div class="col-md-8 mb-3">

                        <label class="form-label">
                            Alamat Pengantaran
                        </label>

                        <input
                            type="text"
                            id="alamat"
                            class="form-control"
                            rows="3"
                            readonly></input>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Estimasi Waktu (hari)
                        </label>

                        <input
                            type="number"
                            id="estimasiwaktu"
                            name="estimasiwaktu"
                            class="form-control"
                            rows="3"></input>

                    </div>
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Biaya Pengantaran
                        </label>

                        <input
                            type="number"
                            id="biayaantar"
                            name="biayaantar"
                            class="form-control"
                            rows="3"></input>

                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Status Pesanan</label>

                        <select
                            name="statuspesanan"
                            class="form-select"
                            required>

                            <option value="menunggu_konfirmasi">
                                Menunggu Konfirmasi
                            </option>

                            <option value="dikonfirmasi">
                                Dikonfirmasi
                            </option>

                            <option value="proses_produksi">
                                Proses Produksi
                            </option>

                            <option value="proses_pengantaran">
                                Proses Pengantaran
                            </option>

                            <option value="selesai">
                                Selesai
                            </option>
                        </select>
                    </div>

                </div>

                <hr>

                <h4 class="section-title">
                    Detail Produk
                </h4>

                <div class="row align-items-end">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Produk
                        </label>

                        <div class="input-group">

                            <input
                                type="hidden"
                                id="idproduk">

                            <input
                                type="text"
                                id="namaproduk"
                                class="form-control"
                                readonly>

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalProduk">

                                Cari

                            </button>

                        </div>

                    </div>

                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Harga
                        </label>

                        <input
                            type="number"
                            id="harga"
                            class="form-control"
                            readonly>

                    </div>
                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Diskon
                        </label>

                        <input
                            type="number"
                            id="diskon"
                            class="form-control"
                            readonly>

                    </div>

                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Qty
                        </label>

                        <input
                            type="number"
                            id="qty"
                            class="form-control">

                    </div>

                    <div class="col-md-2 mb-3">

                        <button
                            type="button"
                            class="btn btn-primary w-100"
                            onclick="tambahDetail()">

                            +Tambah

                        </button>

                    </div>

                </div>

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>

                            <tr>
                                <th>ID Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th width="80">Aksi</th>
                            </tr>

                        </thead>

                        <tbody id="detailPesanan">

                        </tbody>

                    </table>

                </div>

                <div class="row">

                    <div class="col-md-3 ms-auto">

                        <label class="form-label">
                            Total Pesanan
                        </label>

                        <input
                            type="number"
                            name="total"
                            id="total"
                            class="form-control"
                            readonly>

                    </div>

                </div>

            </div>

            <div class="form-footer">

                <div class="card-body">

                    <button
                        type="submit"
                        class="btn btn-simpan">

                        Simpan Pesanan

                    </button>

                    <a
                        href="<?= base_url('datapesanan') ?>"
                        class="btn btn-kembali ms-2">

                        Kembali

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- MODAL PELANGGAN -->

<div class="modal fade" id="modalPelanggan">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Data Pelanggan
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($pelanggan as $p) : ?>

                            <tr>

                                <td><?= $p['idpelanggan'] ?></td>
                                <td><?= $p['namapelanggan'] ?></td>
                                <td><?= $p['alamat'] ?></td>
                                <td><?= $p['nohp'] ?></td>

                                <td>

                                    <button
                                        type="button"
                                        class="btn btn-success btn-sm pilih-pelanggan"

                                        data-id="<?= $p['idpelanggan'] ?>"
                                        data-nama="<?= $p['namapelanggan'] ?>"
                                        data-alamat="<?= $p['alamat'] ?>"
                                        data-nohp="<?= $p['nohp'] ?>">

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


<!-- MODAL PRODUK -->

<div class="modal fade" id="modalProduk">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Data Produk
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>
                    <?php
                    $kategoriMap = [];

                    foreach ($kategori as $k) {
                        $kategoriMap[$k['idkategori']] = $k['namakategori'];
                    }
                    ?>
                    <tbody>

                        <?php foreach ($produk as $p) : ?>

                            <tr>

                                <td><?= $p['idproduk'] ?></td>
                                <td><?= $p['namaproduk'] ?></td>
                                <td>
                                    <?= $kategoriMap[$p['idkategori']] ?? '-' ?>
                                </td>
                                <td>
                                    Rp <?= number_format($p['harga'], 0, ',', '.') ?>
                                </td>
                                <td>
                                    <?= number_format($p['diskon'], 0, ',', '.') ?>%
                                </td>

                                <td>

                                    <button
                                        type="button"
                                        class="btn btn-success btn-sm pilih-produk"

                                        data-id="<?= $p['idproduk'] ?>"
                                        data-nama="<?= $p['namaproduk'] ?>"
                                        data-harga="<?= $p['harga'] ?>"
                                        data-diskon="<?= $p['diskon'] ?>">

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
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.pilih-pelanggan').forEach(button => {

            button.addEventListener('click', function() {

                document.getElementById('idpelanggan').value = this.dataset.id;
                document.getElementById('namapelanggan').value = this.dataset.nama;
                document.getElementById('alamat').value = this.dataset.alamat;
                document.getElementById('nohp').value = this.dataset.nohp;

                bootstrap.Modal.getInstance(
                    document.getElementById('modalPelanggan')
                ).hide();

            });

        });

        document.querySelectorAll('.pilih-produk').forEach(button => {

            button.addEventListener('click', function() {

                document.getElementById('idproduk').value = this.dataset.id;
                document.getElementById('namaproduk').value = this.dataset.nama;
                document.getElementById('harga').value = this.dataset.harga;
                document.getElementById('diskon').value = this.dataset.diskon;

                bootstrap.Modal.getInstance(
                    document.getElementById('modalProduk')
                ).hide();

            });

        });

    });

    let totalHarga = 0;
    let totalProduk = 0;

    function tambahDetail() {

        let idproduk = document.getElementById('idproduk').value;
        let namaproduk = document.getElementById('namaproduk').value;
        let harga = parseInt(document.getElementById('harga').value);
        let diskon = parseInt(document.getElementById('diskon').value);
        let qty = parseInt(document.getElementById('qty').value);

        if (!idproduk || !qty) {
            alert('Pilih produk dan isi qty');
            return;
        }

        let subtotal = (harga * qty) - ((harga * qty) * (diskon / 100));

        totalProduk += subtotal;
        let biayaantar = parseInt(document.getElementById('biayaantar').value) || 0;
        let totalHarga = totalProduk + biayaantar;

        document.getElementById('total').value = totalHarga;

        let row = `
        <tr>

            <td>
                ${idproduk}
                <input type="hidden" name="idproduk[]" value="${idproduk}">
            </td>

            <td>${namaproduk}</td>

            <td>
                ${harga}
                <input type="hidden" name="harga[]" value="${harga}">
            </td>
            <td>
                ${diskon}
                <input type="hidden" name="diskon[]" value="${diskon}">
            </td>

            <td>
                ${qty}
                <input type="hidden" name="qty[]" value="${qty}">
            </td>

            <td>
                ${subtotal}
                <input type="hidden" name="subtotal[]" value="${subtotal}">
            </td>

            <td>
                <button
                    type="button"
                    class="btn btn-danger btn-sm"
                    onclick="hapusBaris(this, ${subtotal})">
                    Hapus
                </button>
            </td>

        </tr>
    `;

        document
            .getElementById('detailPesanan')
            .insertAdjacentHTML('beforeend', row);
    }

    function hapusBaris(button, subtotal) {
        totalProduk -= subtotal;

        let biayaantar = parseInt(document.getElementById('biayaantar').value) || 0;
        let totalHarga = totalProduk + biayaantar;

        document.getElementById('total').value = totalHarga;

        button.closest('tr').remove();

    }
</script>

<?= $this->endSection() ?>