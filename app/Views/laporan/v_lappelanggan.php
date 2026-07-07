<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>



<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna p-0">

        <!-- Judul -->
        <div class="header-title">
            <h2 class="mb-1">Data Pelanggan</h2>            
        </div>

        <!-- Area Tombol -->
        <div class="header-action">
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">
                <button
                    type="button"
                    class="btn btn-primary btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/pelanggan') ?>','_blank')">
                    <i class="ti ti-users me-2"></i>
                    Cetak Laporan
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table
                class="table table-bordered table-hover align-middle" id="datapelanggan">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="140">ID Pelanggan</th>
                        <th width="220">Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (!empty($pelanggan)) : ?>

                        <?php $no = 1; ?>

                        <?php foreach ($pelanggan as $row) : ?>

                            <tr>
                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $row['idpelanggan'] ?>
                                </td>

                                <td>
                                    <?= $row['namapelanggan'] ?>
                                </td>

                                <td>
                                    <?= strlen($row['alamat']) > 80
                                        ? substr($row['alamat'], 0, 80) . '...'
                                        : $row['alamat']; ?>
                                </td>

                                <td>
                                    <?= $row['nohp'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Data pelanggan belum tersedia
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr id="no-result" style="display:none;">
                        <td colspan="6" class="text-center text-danger">
                            Data tidak ditemukan
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>


<?= $this->endSection() ?>