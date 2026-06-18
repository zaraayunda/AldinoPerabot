<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<!-- Statistik -->
<div class="row mb-4">
    <div class="col-md-12 mb-3">
        <div class="stat-card">
            <p>Total Kategori</p>
            <h4><?= count($kategori) ?></h4>
        </div>
    </div>
</div>

<!-- Card Utama -->
<div class="card card-pengguna">

    <div class="card-header card-header-pengguna">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h3>Data Kategori</h3>
                <!-- <small>Kelola seluruh data kategori produk Aldino Perabot</small> -->
            </div>

            <div class="d-flex align-items-center gap-3 header-tools">

                <div class="search-wrapper">
                    <i class="ti ti-search search-icon"></i>
                    <input
                        type="text"
                        id="search-input"
                        class="form-control search-pengguna"
                        placeholder="Cari nama kategori">
                </div>

                <button
                    type="button"
                    class="btn btn-tambah"
                    onclick="window.location.href='<?= base_url('tambahkategori') ?>'">

                    <i class="ti ti-category me-1"></i>
                    Tambah Kategori

                </button>

            </div>

        </div>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table
                class="table table-bordered table-hover align-middle"
                id="datakategori">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="140">ID Kategori</th>
                        <th width="220">Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($kategori)) : ?>

                        <?php $no = 1; ?>

                        <?php foreach ($kategori as $row) : ?>

                            <tr>

                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <?= $row['idkategori'] ?>
                                </td>

                                <td>
                                    <?= $row['namakategori'] ?>
                                </td>

                                <td>
                                    <?= strlen($row['deskripsi']) > 80
                                        ? substr($row['deskripsi'], 0, 80) . '...'
                                        : $row['deskripsi']; ?>
                                </td>

                                <td class="text-center">

                                    <a
                                        href="<?= base_url('editkategori/' . $row['idkategori']) ?>"
                                        class="btn btn-warning btn-sm">

                                        <i class="ti ti-edit"></i>

                                    </a>

                                    <a
                                        href="<?= base_url('hapuskategori/' . $row['idkategori']) ?>"
                                        class="btn btn-danger btn-sm btn-hapus">

                                        <i class="ti ti-trash"></i>

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Data kategori belum tersedia
                            </td>
                        </tr>

                    <?php endif; ?>

                    <tr id="no-result" style="display:none;">
                        <td colspan="5" class="text-center text-danger">
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
        let rows = document.querySelectorAll('#datakategori tbody tr');
        let found = false;

        rows.forEach(row => {

            if (row.id === 'no-result') return;

            let nama = row.cells[2]?.innerText.toLowerCase() || '';

            if (
                nama.includes(keyword)
            ) {

                row.style.display = '';
                found = true;

            } else {

                row.style.display = 'none';

            }

        });

        document.getElementById('no-result').style.display =
            found ? 'none' : '';

    });


    document.querySelectorAll('.btn-hapus').forEach(button => {

        button.addEventListener('click', function(e) {

            e.preventDefault();

            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Hapus Kategori?',
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
</script>

<?= $this->endSection() ?>