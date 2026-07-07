<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>



<!-- Card Utama -->
<div class="card card-pengguna">
    <div class="card-header card-header-pengguna p-0">

        <!-- Judul -->
        <div class="header-title">
            <h2 class="mb-1">Data Pengajuan Custom Produk</h2>
        </div>

        <!-- Area Tombol -->
        <div class="header-action">
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">
                <button
                    type="button"
                    class="btn btn-primary btn-cetak"
                    onclick="window.open('<?= base_url('cetaklaporan/pengajuan') ?>','_blank')">
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
                        <th>ID Pengajuan</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Detail</th>
                        <th>Foto Referensi</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Status</th>
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

                                        <?php endif; ?>

                                    </tr>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>
                            <td colspan="11" class="text-center text-muted py-4">
                                Data pesanan belum tersedia
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


<?= $this->endSection() ?>