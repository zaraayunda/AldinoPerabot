<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>



<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna p-0">

        <!-- Judul -->
        <div class="header-title">
            <h2 class="mb-1">Data Pengguna</h2>
            <p class="mb-0 text-muted">
        </div>

        <!-- Area Tombol -->
        <div class="header-action">
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">

                <button
                    type="button"
                    class="btn btn-success btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/user?status=aktif') ?>','_blank')">

                    <i class="ti ti-user-check me-2"></i>
                    Cetak Pengguna Aktif

                </button>

                <button
                    type="button"
                    class="btn btn-danger btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/user?status=nonaktif') ?>','_blank')">

                    <i class="ti ti-user-x me-2"></i>
                    Cetak Pengguna Nonaktif

                </button>

                <button
                    type="button"
                    class="btn btn-primary btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/user') ?>','_blank')">

                    <i class="ti ti-users me-2"></i>
                    Cetak Semua Pengguna

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

<?= $this->endSection() ?>