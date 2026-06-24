<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


<div class="container-fluid">

    <div class="card form-card">

        <div class="form-header">
            <h3>Penawaran Harga</h3>
            <p>Edit data harga produk</p>
        </div>
        <form action="<?= base_url('pengajuan/updateharga') ?>" method="post">

            <div class="card-body">

                <div class="alert alert-light border">

                    <div class="row">

                        <div class="col-md-3">
                            <strong>ID Pengajuan</strong><br>
                            <?= $pengajuan['idpengajuan'] ?>
                        </div>
                        <div class="col-md-3">
                            <strong>Tanggal Pengajuan</strong><br>
                            <?= date('d-m-Y', strtotime($pengajuan['tanggalpengajuan'])) ?>
                        </div>
                        <div class="col-md-3">
                            <strong>Nama Pelanggan</strong><br>
                            <?= $pelanggan['namapelanggan'] ?>
                        </div>
                        <div class="col-md-3">
                            <strong>Status</strong><br>
                            <?php
                            $statusText = [
                                'menunggu' => 'Menunggu Konfirmasi',
                                'penawaran_harga' => 'Penawaran Harga',
                                'disetujui' => 'Disetujui',
                                'batal' => 'Dibatalkan'
                            ];
                            ?>
                            <?= $statusText[$pengajuan['statuscustom']] ?? '-' ?>
                        </div>
                    </div>
                </div>
                <input
                    type="hidden"
                    name="idpengajuan"
                    value="<?= $pengajuan['idpengajuan'] ?>">
                <div class="table-responsive mt-4">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Produk</th>
                                <th width="80">Qty</th>
                                <th width="130">Foto</th>
                                <th>Detail Produk</th>
                                <th width="250">Harga Penawaran/Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detailpengajuan as $d) : ?>
                                <tr>
                                    <td>
                                        <?= $d['namaprodukcustom'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $d['qty'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (!empty($d['fotoreferensi'])) : ?>
                                            <img
                                                src="<?= base_url('storage/fotocustom/' . $d['fotoreferensi']) ?>"
                                                class="img-thumbnail"
                                                style="width:100px;height:80px;object-fit:cover;">
                                        <?php else : ?>
                                            <span class="text-muted">
                                                Tidak ada foto
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= $d['detailcustom'] ?>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                Rp
                                            </span>
                                            <input
                                                type="number"
                                                name="hargacustom[]"
                                                value="<?= $d['hargacustom'] ?>"
                                                class="form-control"
                                                min="0"
                                                required>
                                        </div>
                                        <input
                                            type="hidden"
                                            name="iddetailcustom[]"
                                            value="<?= $d['iddetailcustom'] ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-footer">
                <div class="card-body">
                    <button
                        type="submit"
                        class="btn btn-simpan">
                        <i class="ti ti-device-floppy me-1"></i>
                        Simpan Penawaran Harga
                    </button>
                    <a
                        href="<?= base_url('datapengajuan') ?>"
                        class="btn btn-kembali ms-2">
                        <i class="ti ti-arrow-left me-1"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </form>

    </div>

</div>

<?= $this->endSection() ?>