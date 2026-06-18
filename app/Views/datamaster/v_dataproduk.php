<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<!-- Statistik -->
<div class="row mb-4 ">
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <p>Total Produk</p>
            <h4><?= count($produk) ?></h4>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <p>Produk Katalog</p>
            <h4>
                <?= count(array_filter($produk, fn($u) => $u['jenisproduk'] == 'katalog')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <p>Produk Custom</p>
            <h4>
                <?= count(array_filter($produk, fn($u) => $u['jenisproduk'] == 'custom')) ?>
            </h4>
        </div>
    </div>
</div>


<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h3>Data Produk</h3>
                <!-- <small>Kelola seluruh data produk sistem Aldino Perabot</small> -->
            </div>

            <div class="d-flex align-items-center gap-3 header-tools">
                <div class="search-wrapper">
                    <i class="ti ti-search search-icon"></i>
                    <input
                        type="text"
                        id="search-input"
                        class="form-control search-pengguna"
                        placeholder="Cari nama produk atau kategori">
                </div>
                <button
                    type="button"
                    class="btn btn-tambah"
                    onclick="window.location.href='<?= base_url('tambahproduk') ?>'">
                    <i class="ti ti-category me-1"></i>
                    Tambah Produk
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="dataproduk">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>
                <?php
                $kategoriMap = [];

                foreach ($kategori as $k) {
                    $kategoriMap[$k['idkategori']] = $k['namakategori'];
                }
                ?>
                <tbody>
                    <?php if (!empty($produk)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($produk as $row) : ?>
                            <tr>
                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $row['idproduk'] ?>
                                </td>
                                <td>
                                    <?= $row['namaproduk'] ?>
                                </td>
                                <td>
                                    <?= $kategoriMap[$row['idkategori']] ?? '-' ?>
                                </td>
                                <td>
                                    <?= $row['jenisproduk'] ?>
                                </td>
                                <td>
                                    Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                                </td>
                                <td>
                                     <?= number_format($row['diskon'], 0, ',', '.') ?> %
                                </td>
                                <td class="text-center">

                                    <?php if (!empty($row['foto'])) : ?>

                                        <img
                                            src="<?= base_url('storage/fotoproduk/' . $row['foto']) ?>"
                                            alt="<?= $row['namaproduk'] ?>"
                                            class="img-thumbnail foto-preview"
                                            style="width:150px;height:80px;object-fit:cover;cursor:pointer;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalFoto"
                                            data-foto="<?= base_url('storage/fotoproduk/' . $row['foto']) ?>">

                                    <?php endif; ?>

                                </td>
                                <td class="align-middle" style="min-width:100px;">
                                    <?php if ($row['statusproduk'] == 'aktif') : ?>
                                        <span class="badge-status">
                                            Aktif
                                        </span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">
                                            Nonaktif
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('editproduk/' . $row['idproduk']) ?>"
                                        class="btn btn-warning btn-sm">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a href="<?= base_url('hapusproduk/' . $row['idproduk']) ?>"
                                        class="btn btn-danger btn-sm btn-hapus">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                Data produk belum tersedia
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
        let rows = document.querySelectorAll('#dataproduk tbody tr');
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
                title: 'Hapus Produk?',
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
</script>

<?= $this->endSection() ?>