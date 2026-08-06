<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<!-- Statistik -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Total Pengajuan</p>
            <h4><?= count($pengajuan) ?></h4>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Menunggu Konfirmasi</p>
            <h4>
                <?= count(array_filter($pengajuan, fn($u) => $u['statuscustom'] == 'menunggu')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Di Setujui</p>
            <h4>
                <?= count(array_filter($pengajuan, fn($u) => $u['statuscustom'] == 'disetuji')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Pembatalan</p>
            <h4>
                <?= count(array_filter($pengajuan, fn($u) => $u['statuscustom'] == 'batal')) ?>
            </h4>
        </div>
    </div>
</div>

<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h3>Data Pengajuan Custom Produk</h3>
                <!-- <small>Kelola seluruh data produk sistem Aldino Perabot</small> -->
            </div>

            <div class="d-flex align-items-center gap-3 header-tools">
                <div class="search-wrapper">
                    <i class="ti ti-search search-icon"></i>
                    <input
                        type="text"
                        id="search-input"
                        class="form-control search-pengguna"
                        placeholder="Cari ID Pengajuan atau Nama Pelanggan">
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="datapengajuan">
                <thead>
                    <tr>
                        <th width="20">No</th>
                        <th>ID Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Detail</th>
                        <th>Foto Referensi</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <?php

                $pelangganMap = [];
                foreach ($pelanggan as $p) {
                    $pelangganMap[$p['idpelanggan']] = $p['namapelanggan'];
                }

                // Kelompokkan detail berdasarkan idpesanan
                $detailMap = [];
                foreach ($detailpengajuan as $d) {
                    $detailMap[$d['idpengajuan']][] = $d;
                }

                ?>
                <tbody>
                    <?php if (!empty($pengajuan)) : ?>

                        <?php $no = 1; ?>

                        <?php foreach ($pengajuan as $row) : ?>

                            <?php
                            $details = $detailMap[$row['idpengajuan']] ?? [];
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
                                                <?= $row['idpengajuan'] ?>
                                            </td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="align-middle">
                                                <?= date('d-m-Y', strtotime($row['tanggalpengajuan'])) ?>
                                            </td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="align-middle">
                                                <?= $pelangganMap[$row['idpelanggan']] ?? '-' ?>
                                            </td>

                                        <?php endif; ?>

                                        <td>
                                            <?= $d['namaprodukcustom'] ?>
                                        </td>
                                        <td>
                                            <?= $d['detailcustom'] ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($d['fotoreferensi'])) : ?>
                                                <img src="<?= base_url('storage/fotocustom/' . $d['fotoreferensi']) ?>"
                                                    class="img-thumbnail foto-preview"
                                                    style="width:100px;height:70px;cursor:pointer"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalFoto"
                                                    data-foto="<?= base_url('storage/fotocustom/' . $d['fotoreferensi']) ?>">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= $d['qty'] ?>
                                        </td>
                                        <td>
                                            Rp <?= number_format($d['hargacustom'], 0, ',', '.') ?>
                                        </td>
                                        <?php if ($index == 0) : ?>

                                            <td rowspan="<?= $jumlahDetail ?>">

                                                <?php
                                                $statusClass = [
                                                    'menunggu' => 'bg-warning text-dark',
                                                    'penawaran_harga' => 'bg-primary',
                                                    'disetujui' => 'bg-success',
                                                    'batal' => 'bg-danger'
                                                ];

                                                $statusText = [
                                                    'menunggu' => 'Menunggu Konfirmasi',
                                                    'penawaran_harga' => 'Penawaran Harga',
                                                    'disetujui' => 'Disetujui',
                                                    'batal' => 'Dibatalkan'
                                                ];
                                                ?>

                                                <span class="badge <?= $statusClass[$row['statuscustom']] ?? 'bg-secondary' ?>">
                                                    <?= $statusText[$row['statuscustom']] ?? 'Tidak Diketahui' ?>
                                                </span>

                                            </td>

                                            <td rowspan="<?= $jumlahDetail ?>" class="text-center align-middle" style="min-width:150px;">
                                                <div class="d-flex justify-content-center gap-2">

                                                    <?php if ($row['statuscustom'] == 'batal') : ?>

                                                        <!-- Hanya tombol Hapus -->
                                                        <a href="<?= base_url('hapuspengajuan/' . $row['idpengajuan']) ?>"
                                                            class="btn btn-danger btn-sm btn-hapus">
                                                            <i class="ti ti-trash"></i>
                                                        </a>

                                                    <?php elseif ($row['statuscustom'] == 'disetujui') : ?>

                                                        <!-- Tombol Edit -->
                                                        <a href="<?= base_url('editpengajuan/' . $row['idpengajuan']) ?>"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="ti ti-edit"></i>
                                                        </a>

                                                        <!-- Tombol Hapus -->
                                                        <a href="<?= base_url('hapuspengajuan/' . $row['idpengajuan']) ?>"
                                                            class="btn btn-danger btn-sm btn-hapus">
                                                            <i class="ti ti-trash"></i>
                                                        </a>

                                                    <?php elseif (in_array($row['statuscustom'], ['menunggu', 'penawaran_harga'])) : ?>

                                                        <!-- Tombol Batal -->
                                                        <a href="<?= base_url('batalkanpengajuan/' . $row['idpengajuan']) ?>"
                                                            class="btn btn-secondary btn-sm btn-batal">
                                                            <i class="ti ti-x"></i>
                                                        </a>

                                                        <!-- Tombol Edit -->
                                                        <a href="<?= base_url('editpengajuan/' . $row['idpengajuan']) ?>"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="ti ti-edit"></i>
                                                        </a>

                                                        <!-- Tombol Hapus -->
                                                        <a href="<?= base_url('hapuspengajuan/' . $row['idpengajuan']) ?>"
                                                            class="btn btn-danger btn-sm btn-hapus">
                                                            <i class="ti ti-trash"></i>
                                                        </a>

                                                    <?php endif; ?>

                                                </div>
                                            </td>

                                        <?php endif; ?>

                                    </tr>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>
                            <td colspan="11" class="text-center text-muted py-4">
                                Data pengajuan belum tersedia
                            </td>
                        </tr>

                    <?php endif; ?>
                    <tr id="no-result" style="display:none;">
                        <td colspan="11" class="text-center text-danger">
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
        let rows = document.querySelectorAll('#datapengajuan tbody tr');
        let found = false;

        rows.forEach(row => {

            // skip row "no result"
            if (row.id === 'no-result') return;

            let idpengajuan = row.cells[2]?.innerText.toLowerCase() || '';
            let nama = row.cells[4]?.innerText.toLowerCase() || '';

            if (
                idpengajuan.includes(keyword) ||
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
    document.querySelectorAll('.btn-batal').forEach(button => {

        button.addEventListener('click', function(e) {

            e.preventDefault();

            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Batal Pengajuan?',
                text: 'Anda yakin ingin membatalkan pengajuan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4d4428',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Kembali',
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

    // document.querySelectorAll('.status-pesanan').forEach(select => {

    //     let oldValue = select.value;

    //     select.addEventListener('focus', function() {
    //         oldValue = this.value;
    //     });

    //     select.addEventListener('change', function() {

    //         let currentSelect = this;
    //         let idpengajuan = this.dataset.id;
    //         let status = this.value;

    //         fetch('<?= base_url('pengajuan/updatestatus') ?>', {
    //                 method: 'POST',
    //                 headers: {
    //                     'Content-Type': 'application/x-www-form-urlencoded'
    //                 },
    //                 body: 'idpengajuan=' + encodeURIComponent(idpengajuan) +
    //                     '&statuscustom=' + encodeURIComponent(status)
    //             })
    //             .then(response => response.json())
    //             .then(data => {

    //                 if (data.success) {

    //                     Swal.fire({
    //                         icon: 'success',
    //                         title: 'Berhasil',
    //                         text: data.message,
    //                         timer: 1500,
    //                         showConfirmButton: false
    //                     });

    //                 } else {

    //                     currentSelect.value = oldValue;

    //                     Swal.fire({
    //                         icon: 'warning',
    //                         title: 'Peringatan',
    //                         text: data.message
    //                     });

    //                 }

    //             });

    //     });

    // });

    document.querySelectorAll('.foto-preview').forEach(function(img) {

        img.addEventListener('click', function() {

            document.getElementById('previewFoto').src =
                this.dataset.foto;

        });

    });
</script>

<?= $this->endSection() ?>