<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<!-- Statistik -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Total Pengguna</p>
            <h4><?= count($user) ?></h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Total Admin</p>
            <h4>
                <?= count(array_filter($user, fn($u) => $u['role'] == 'admin')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Total Pelanggan</p>
            <h4>
                <?= count(array_filter($user, fn($u) => $u['role'] == 'pelanggan')) ?>
            </h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <p>Pengguna Aktif</p>
            <h4>
                <?= count(array_filter($user, fn($u) => $u['status'] == 'aktif')) ?>
            </h4>
        </div>
    </div>
</div>

<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h3>Data Pengguna</h3>
                <!-- <small>Kelola seluruh data pengguna sistem Aldino Perabot</small> -->
            </div>

            <div class="d-flex align-items-center gap-3 header-tools">
                <div class="search-wrapper">
                    <i class="ti ti-search search-icon"></i>
                    <input
                        type="text"
                        id="search-input"
                        class="form-control search-pengguna"
                        placeholder="Cari nama pengguna atau email">
                </div>
                <button
                    type="button"
                    class="btn btn-tambah"
                    onclick="window.location.href='<?= base_url('tambahpengguna') ?>'">

                    <i class="ti ti-user-plus me-1"></i>
                    Tambah Pengguna

                </button>

            </div>

        </div>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle" id="datapengguna">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>ID Pengguna</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($user)) : ?>

                        <?php $no = 1; ?>
                        <?php foreach ($user as $row) : ?>

                            <tr>

                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <?= $row['iduser'] ?>
                                </td>

                                <td>
                                    <?= $row['namauser'] ?>
                                </td>

                                <td>
                                    <?= $row['email'] ?>
                                </td>

                                <td>
                                    <?= $row['username'] ?>
                                </td>

                                <td>
                                    <?= $row['role'] ?>
                                </td>

                                <td>
                                    <?php if ($row['status'] == 'aktif') : ?>

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

                                    <a href="<?= base_url('editpengguna/' . $row['iduser']) ?>"
                                        class="btn btn-warning btn-sm">

                                        <i class="ti ti-edit"></i>

                                    </a>

                                    <a href="<?= base_url('hapuspengguna/' . $row['iduser']) ?>"
                                        class="btn btn-danger btn-sm btn-hapus">
                                        <i class="ti ti-trash"></i>
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                Data pengguna belum tersedia
                            </td>
                        </tr>

                    <?php endif; ?>
                    <tr id="no-result" style="display:none;">
                        <td colspan="8" class="text-center text-danger">
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

searchInput.addEventListener('keyup', function () {

    let keyword = this.value.toLowerCase();
    let rows = document.querySelectorAll('#datapengguna tbody tr');
    let found = false;

    rows.forEach(row => {

        // skip row "no result"
        if (row.id === 'no-result') return;

        let nama = row.cells[2]?.innerText.toLowerCase() || '';
        let email = row.cells[3]?.innerText.toLowerCase() || '';

        if (
            nama.includes(keyword) ||
            email.includes(keyword)
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
                title: 'Hapus Pengguna?',
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