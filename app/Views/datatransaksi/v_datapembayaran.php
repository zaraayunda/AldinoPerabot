<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<!-- Statistik -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Jumlah Pembayaran</p>
            <h4><?= count($pembayaran) ?></h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Menunggu Pembayaran</p>
            <h4>
                <?= count(array_filter($pembayaran, fn($u) => $u['statuspembayaran'] == 'menunggu_pembayaran')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Valid</p>
            <h4>
                <?= count(array_filter($pembayaran, fn($u) => $u['statuspembayaran'] == 'valid')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Ditolak</p>
            <h4>
                <?= count(array_filter($pembayaran, fn($u) => $u['statuspembayaran'] == 'ditolak')) ?>
            </h4>
        </div>
    </div>
</div>

<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h3>Data Pembayaran</h3>
                <!-- <small>Kelola seluruh data produk sistem Aldino Perabot</small> -->
            </div>

            <div class="d-flex align-items-center gap-3 header-tools">
                <div class="search-wrapper">
                    <i class="ti ti-search search-icon"></i>
                    <input
                        type="text"
                        id="search-input"
                        class="form-control search-pengguna"
                        placeholder="Cari ID Pembayaran atau Nama Pelanggan">
                </div>
                <button
                    type="button"
                    class="btn btn-tambah"
                    onclick="window.location.href='<?= base_url('tambahpembayaran') ?>'">
                    <i class="ti ti-plus me-1"></i>
                    Tambah
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="datapembayaran">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>ID Pembayaran</th>
                        <th>ID Pesanan</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Pembayaran</th>
                        <th>Jenis Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Jumlah Bayar</th>
                        <th>Sisa</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>
                <?php
                $pelangganMap = [];
                foreach ($pelanggan as $p) {
                    $pelangganMap[$p['idpelanggan']] = $p['namapelanggan'];
                }

                $pesananMap = [];
                foreach ($pesanan as $d) {
                    $pesananMap[$d['idpesanan']] = $d;
                }
                ?>
                <tbody>

                    <?php if (!empty($pembayaran)) : ?>
                        <?php $no = 1; ?>

                        <?php foreach ($pembayaran as $row) : ?>

                            <?php
                            $pesanan = $pesananMap[$row['idpesanan']] ?? null;

                            $pelangganId = $pesanan['idpelanggan'] ?? null;

                            $total = $pesanan['totalharga'] ?? 0;
                            $bayar = $row['jumlahbayar'] ?? 0;
                            $sisa = $total - $bayar;
                            ?>

                            <tr>
                                <td><?= $no++ ?></td>

                                <td><?= $row['idpembayaran'] ?></td>

                                <td><?= $row['idpesanan'] ?></td>
                                <td>
                                    <?= $row['tanggalpembayaran'] ?>
                                </td>
                                <td>
                                    <?= $pelangganMap[$pelangganId] ?? '-' ?>
                                </td>
                                <td>
                                    Rp <?= number_format($total, 0, ',', '.') ?>
                                </td>
                                <td>
                                    <?= $row['jenispembayaran'] ?>
                                </td>
                                <td>
                                    <?= $row['metode_pembayaran'] ?>
                                </td>
                                <td>
                                    Rp <?= number_format($bayar, 0, ',', '.') ?>
                                </td>

                                <!-- SISA -->
                                <td>
                                    Rp <?= number_format($sisa, 0, ',', '.') ?>
                                </td>

                                <!-- BUKTI -->
                                <td>
                                    <?php if (!empty($row['bukti_pembayaran'])) : ?>
                                        <img src="<?= base_url('storage/fotobuktipembayaran/' . $row['bukti_pembayaran']) ?>"
                                            class="img-thumbnail foto-preview"
                                            style="width:100px;height:70px;cursor:pointer"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalFoto"
                                            data-foto="<?= base_url('storage/fotobuktipembayaran/' . $row['bukti_pembayaran']) ?>">
                                    <?php endif; ?>
                                </td>

                                <!-- STATUS -->
                                <td>
                                    <select class="form-select status-pembayaran
                                    <?= $row['statuspembayaran'] == 'menunggu_pembayaran' ? 'border-warning text-warning' : '' ?>
                                    <?= $row['statuspembayaran'] == 'valid' ? 'border-info text-info' : '' ?>
                                    <?= $row['statuspembayaran'] == 'ditolak' ? 'border-danger text-danger' : '' ?>"
                                        style="min-width:150px;"
                                        data-id="<?= $row['idpembayaran'] ?>">

                                        <option value="menunggu_pembayaran" <?= $row['statuspembayaran'] == 'menunggu_pembayaran' ? 'selected' : '' ?>>
                                            Menunggu
                                        </option>

                                        <option value="valid" <?= $row['statuspembayaran'] == 'valid' ? 'selected' : '' ?>>
                                            Valid
                                        </option>

                                        <option value="ditolak" <?= $row['statuspembayaran'] == 'ditolak' ? 'selected' : '' ?>>
                                            Ditolak
                                        </option>

                                    </select>
                                </td>

                                <!-- AKSI -->
                                <td class="text-center align-middle gap-3">
                                    <a href="<?= base_url('editpembayaran/' . $row['idpembayaran']) ?>"
                                        class="btn btn-warning btn-sm">
                                        <i class="ti ti-edit"></i>
                                    </a>

                                    <a href="<?= base_url('hapuspembayaran/' . $row['idpembayaran']) ?>"
                                        class="btn btn-danger btn-sm btn-hapus">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else : ?>
                        <tr>
                            <td colspan="12" class="text-center text-muted">
                                Data tidak tersedia
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr id="no-result" style="display:none;">
                        <td colspan="12" class="text-center text-danger">
                            Data tidak ditemukan
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFoto" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Preview Foto Produk</h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body text-center">

                <img
                    id="previewFoto"
                    src=""
                    class="img-fluid rounded">

            </div>

        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('search-input');

    searchInput.addEventListener('keyup', function() {

        let keyword = this.value.toLowerCase();
        let rows = document.querySelectorAll('#datapembayaran tbody tr');
        let found = false;

        rows.forEach(row => {

            // skip row "no result"
            if (row.id === 'no-result') return;

            let idbayar = row.cells[2]?.innerText.toLowerCase() || '';
            let nama = row.cells[5]?.innerText.toLowerCase() || '';

            if (
                idbayar.includes(keyword) ||
                nama.includes(keyword)
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
                title: 'Hapus Data?',
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

    document.querySelectorAll('.status-pembayaran').forEach(select => {

        select.addEventListener('change', function() {

            let idpembayaran = this.dataset.id;
            let status = this.value;

            fetch('<?= base_url('pembayaran/updatestatus') ?>', {

                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },

                    body: 'idpembayaran=' + encodeURIComponent(idpembayaran) +
                        '&statuspembayaran=' + encodeURIComponent(status)

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