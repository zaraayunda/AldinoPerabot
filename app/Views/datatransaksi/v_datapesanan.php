<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<!-- Statistik -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <p>Total <br>Pesanan</p>
            <h4><?= count($pesanan) ?></h4>
        </div>
    </div>

    <div class="col-md-2 mb-3">
        <div class="stat-card">
            <p>Pesanan Selesai</p>
            <h4>
                <?= count(array_filter($pesanan, fn($u) => $u['statuspesanan'] == 'selesai')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-2 mb-3">
        <div class="stat-card">
            <p>Menunggu Konfirmasi</p>
            <h4>
                <?= count(array_filter($pesanan, fn($u) => $u['statuspesanan'] == 'menunggu_konfirmasi')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-2 mb-3">
        <div class="stat-card">
            <p>Proses Produksi</p>
            <h4>
                <?= count(array_filter($pesanan, fn($u) => $u['statuspesanan'] == 'proses_produksi')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-2 mb-3">
        <div class="stat-card">
            <p>Proses Pengantaran</p>
            <h4>
                <?= count(array_filter($pesanan, fn($u) => $u['statuspesanan'] == 'proses_pengantaran')) ?>
            </h4>
        </div>
    </div>
</div>

<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h3>Data Pesanan</h3>
                <!-- <small>Kelola seluruh data produk sistem Aldino Perabot</small> -->
            </div>

            <div class="d-flex align-items-center gap-3 header-tools">
                <div class="search-wrapper">
                    <i class="ti ti-search search-icon"></i>
                    <input
                        type="text"
                        id="search-input"
                        class="form-control search-pengguna"
                        placeholder="Cari ID Pesanan atau Nama Pelanggan">
                </div>
                <button
                    type="button"
                    class="btn btn-tambah"
                    onclick="window.location.href='<?= base_url('tambahpesanan') ?>'">
                    <i class="ti ti-plus me-1"></i>
                    Tambah Pesanan
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="datapesanan">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>ID Pesanan</th>
                        <th>Tanggal Pesan</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Sub Total</th>
                        <th>Estimasi</th>
                        <th>Status</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>
                <?php

                $pelangganMap = [];
                foreach ($pelanggan as $p) {
                    $pelangganMap[$p['idpelanggan']] = $p['namapelanggan'];
                }

                $produkMap = [];
                foreach ($produk as $p) {
                    $produkMap[$p['idproduk']] = $p['namaproduk'];
                }

                // Kelompokkan detail berdasarkan idpesanan
                $detailMap = [];
                foreach ($detailpesanan as $d) {
                    $detailMap[$d['idpesanan']][] = $d;
                }

                ?>
                <tbody>
                    <?php if (!empty($pesanan)) : ?>

                        <?php $no = 1; ?>

                        <?php foreach ($pesanan as $row) : ?>

                            <?php
                            $details = $detailMap[$row['idpesanan']] ?? [];
                            $jumlahDetail = count($details);
                            ?>

                            <?php if (!empty($details)) : ?>

                                <?php foreach ($details as $index => $d) : ?>

                                    <tr>

                                        <?php if ($index == 0) : ?>

                                            <td rowspan="<?= $jumlahDetail ?>" class="text-center align-middle">
                                                <?= $no++ ?>
                                            </td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="align-middle">
                                                <?= $row['idpesanan'] ?>
                                            </td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="align-middle">
                                                <?= date('d-m-Y', strtotime($row['tanggalpesanan'])) ?>
                                            </td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="align-middle">
                                                <?= $pelangganMap[$row['idpelanggan']] ?? '-' ?>
                                            </td>

                                        <?php endif; ?>

                                        <td>
                                            <?= $produkMap[$d['idproduk']] ?? '-' ?>
                                        </td>

                                        <td>
                                            <?= $d['qty'] ?>
                                        </td>

                                        <td>
                                            Rp <?= number_format($d['harga'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            Rp <?= number_format($d['diskon'], 0, ',', '.') ?>
                                        </td>

                                        <td>
                                            Rp <?= number_format($d['subtotal'], 0, ',', '.') ?>
                                        </td>


                                        <?php if ($index == 0) : ?>
                                            <td rowspan="<?= $jumlahDetail ?>"><?= $row['estimasiwaktu'] ?></td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="align-middle" style="min-width:170px;">

                                                <select
                                                    class="form-select status-pesanan
                                                    <?= $row['statuspesanan'] == 'menunggu_konfirmasi' ? 'border-warning text-warning' : '' ?>
                                                    <?= $row['statuspesanan'] == 'dikonfirmasi' ? 'border-info text-info' : '' ?>
                                                    <?= $row['statuspesanan'] == 'proses_produksi' ? 'border-primary text-primary' : '' ?>
                                                    <?= $row['statuspesanan'] == 'proses_pengantaran' ? 'border-secondary text-secondary' : '' ?>
                                                    <?= $row['statuspesanan'] == 'selesai' ? 'border-success text-success' : '' ?>"
                                                    data-id="<?= $row['idpesanan'] ?>">

                                                    <option value="menunggu_konfirmasi"
                                                        <?= $row['statuspesanan'] == 'menunggu_konfirmasi' ? 'selected' : '' ?>>
                                                        🟡 Menunggu Konfirmasi
                                                    </option>

                                                    <option value="dikonfirmasi"
                                                        <?= $row['statuspesanan'] == 'dikonfirmasi' ? 'selected' : '' ?>>
                                                        🔵 Dikonfirmasi
                                                    </option>

                                                    <option value="proses_produksi"
                                                        <?= $row['statuspesanan'] == 'proses_produksi' ? 'selected' : '' ?>>
                                                        🟣 Proses Produksi
                                                    </option>

                                                    <option value="proses_pengantaran"
                                                        <?= $row['statuspesanan'] == 'proses_pengantaran' ? 'selected' : '' ?>>
                                                        ⚫ Proses Pengantaran
                                                    </option>

                                                    <option value="selesai"
                                                        <?= $row['statuspesanan'] == 'selesai' ? 'selected' : '' ?>>
                                                        🟢 Selesai
                                                    </option>

                                                </select>

                                            </td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="text-center align-middle">

                                                <a href="<?= base_url('editpesanan/' . $row['idpesanan']) ?>"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                <a href="<?= base_url('hapuspesanan/' . $row['idpesanan']) ?>"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                    <i class="ti ti-trash"></i>
                                                </a>

                                            </td>

                                        <?php endif; ?>

                                    </tr>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">
                                Data pesanan belum tersedia
                            </td>
                        </tr>

                    <?php endif; ?>
                    <tr id="no-result" style="display:none;">
                        <td colspan="10" class="text-center text-danger">
                            Data tidak ditemukan
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('search-input');

    searchInput.addEventListener('keyup', function() {

        let keyword = this.value.toLowerCase();
        let rows = document.querySelectorAll('#datapesanan tbody tr');
        let found = false;

        rows.forEach(row => {

            // skip row "no result"
            if (row.id === 'no-result') return;

            let nama = row.cells[2]?.innerText.toLowerCase() || '';
            let kategori = row.cells[3]?.innerText.toLowerCase() || '';

            if (
                nama.includes(keyword) ||
                kategori.includes(keyword)
            ) {
                row.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
            }

        });

        // tampilkan / sembunyikan pesan kosong
        document.getElementById('no-result').style.display =
            found ? 'none' : '';

    });


    document.querySelectorAll('.btn-hapus').forEach(button => {

        button.addEventListener('click', function(e) {

            e.preventDefault();

            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Hapus Pesanan?',
                text: 'Data yang dihapus tidak dapat dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4d4428',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.href = url;
                }

            });

        });

    });

    document.querySelectorAll('.foto-preview').forEach(function(img) {

        img.addEventListener('click', function() {

            document.getElementById('previewFoto').src =
                this.dataset.foto;

        });

    });

    document.querySelectorAll('.status-pesanan').forEach(select => {

        select.addEventListener('change', function() {

            let idpesanan = this.dataset.id;
            let status = this.value;

            fetch('<?= base_url('pesanan/updatestatus') ?>', {

                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },

                    body: 'idpesanan=' + encodeURIComponent(idpesanan) +
                        '&statuspesanan=' + encodeURIComponent(status)

                })
                .then(response => response.json())
                .then(data => {

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message,
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => {

                        location.reload();

                    });

                });

        });

    });
</script>

<?= $this->endSection() ?>