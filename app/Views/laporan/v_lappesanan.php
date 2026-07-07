<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>



<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna p-0">

        <!-- Judul -->
        <div class="header-title">
            <h2 class="mb-1">Data Pesanan</h2>
            <p class="mb-0 text-muted">
        </div>

        <!-- Area Tombol -->
        <div class="header-action">

            <div class="row g-4">

                <!-- LAPORAN HARIAN -->
                <div class="col-lg-4">

                    <div class="card shadow-sm border-0 h-100">

                        <div class="card-body">

                            <label class="form-label">
                                Pilih Tanggal
                            </label>

                            <input
                                type="date"
                                id="tanggalpesanan"
                                name="tanggalpesanan"
                                class="form-control"
                                value="<?= date('Y-m-d') ?>">

                            <button
                                class="btn btn-primary w-100 mt-3"
                                onclick="cetakHarian()">

                                <i class="ti ti-printer me-2"></i>
                                Tampilkan Laporan Harian

                            </button>

                        </div>

                    </div>

                </div>

                <!-- LAPORAN BULANAN -->
                <div class="col-lg-4">

                    <div class="card shadow-sm border-0 h-100">

                        <div class="card-body">

                            <label class="form-label">
                                Pilih Bulan
                            </label>

                            <input
                                type="month"
                                id="bulanpesanan"
                                name="bulanpesanan"
                                class="form-control"
                                value="<?= date('Y-m') ?>">

                            <button
                                class="btn btn-primary w-100 mt-3"
                                onclick="cetakBulanan()">

                                <i class="ti ti-printer me-2"></i>
                                Tampilkan Laporan Bulanan

                            </button>

                        </div>

                    </div>

                </div>

                <!-- LAPORAN TAHUNAN -->
                <div class="col-lg-4">

                    <div class="card shadow-sm border-0 h-100">

                        <div class="card-body">

                            <label class="form-label">
                                Pilih Tahun
                            </label>

                            <select id="tahunpesanan" name="tahunpesanan" class="form-select">

                                <?php
                                $tahunSekarang = date('Y');

                                for ($i = $tahunSekarang; $i >= 2010; $i--) :
                                ?>

                                    <option value="<?= $i ?>">
                                        <?= $i ?>
                                    </option>

                                <?php endfor; ?>

                            </select>

                            <button
                                class="btn btn-primary w-100 mt-3"
                                onclick="cetakTahunan()">

                                <i class="ti ti-printer me-2"></i>
                                Tampilkan Laporan Tahunan

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Semua -->
            <div class="text-center mt-4">

                <button
                    class="btn btn-success px-5"
                    onclick="window.open('<?= base_url('cetaklaporan/pesanan') ?>','_blank')">

                    <i class="ti ti-printer me-2"></i>
                    Cetak Semua Data

                </button>

            </div>

        </div>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle" id="datapengguna">

                <thead>
                    <tr>
                        <th>No</th>
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
                                            <?= number_format($d['diskon'], 0, ',', '.') ?> %
                                        </td>

                                        <td>
                                            Rp <?= number_format($d['subtotal'], 0, ',', '.') ?>
                                        </td>


                                        <?php if ($index == 0) : ?>
                                            <td rowspan="<?= $jumlahDetail ?>">
                                                <?= $row['estimasiwaktu'] !== null
                                                    ? $row['estimasiwaktu'] . ' Hari'
                                                    : 'Belum ditentukan' ?>
                                            </td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="align-middle text-center">
                                                <?php
                                                switch ($row['statuspesanan']) {
                                                    case 'menunggu_konfirmasi':
                                                        $class = 'bg-warning text-dark';
                                                        $text  = 'Menunggu Konfirmasi';
                                                        break;
                                                    case 'dikonfirmasi':
                                                        $class = 'bg-info text-white';
                                                        $text  = 'Dikonfirmasi';
                                                        break;
                                                    case 'proses_produksi':
                                                        $class = 'bg-primary text-white';
                                                        $text  = 'Proses Produksi';
                                                        break;
                                                    case 'proses_pengantaran':
                                                        $class = 'bg-secondary text-white';
                                                        $text  = 'Proses Pengantaran';
                                                        break;
                                                    case 'selesai':
                                                        $class = 'bg-success';
                                                        $text  = 'Selesai';
                                                        break;
                                                    case 'dibatalkan':
                                                        $class = 'bg-danger';
                                                        $text  = 'Dibatalkan';
                                                        break;
                                                    default:
                                                        $class = 'bg-light text-dark';
                                                        $text  = ucfirst(str_replace('_', ' ', $row['statuspesanan']));
                                                        break;
                                                }
                                                ?>
                                                <span class="badge <?= $class ?> px-3 py-2">
                                                    <?= $text ?>
                                                </span>
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
    function cetakHarian() {

        let tanggal = document.getElementById('tanggalpesanan').value;

        window.open(
            "<?= base_url('cetaklaporan/pesanan') ?>?jenis=harian&tanggalpesanan=" + tanggal,
            "_blank"
        );

    }

    function cetakBulanan() {

        let bulan = document.getElementById('bulanpesanan').value;

        window.open(
            "<?= base_url('cetaklaporan/pesanan') ?>?jenis=bulanan&bulanpesanan=" + bulan,
            "_blank"
        );

    }

    function cetakTahunan() {

        let tahun = document.getElementById('tahunpesanan').value;

        window.open(
            "<?= base_url('cetaklaporan/pesanan') ?>?jenis=tahunan&tahunpesanan=" + tahun,
            "_blank"
        );

    }
</script>

<?= $this->endSection() ?>