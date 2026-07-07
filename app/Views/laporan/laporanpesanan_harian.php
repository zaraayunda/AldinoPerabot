<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pesanan</title>

    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 13px;
            color: #333;
            margin: 30px;
            background: #fff;
            line-height: 1.5;
        }

        .kop {
            display: flex;
            align-items: center;
            border-bottom: 3px solid #4d4428;
            padding-bottom: 12px;
            margin-bottom: 4px;
        }

        .garis {
            border-bottom: 1px solid #999;
            margin-bottom: 25px;
        }

        .logo {
            width: 90px;
            height: 90px;
            object-fit: contain;
            margin-right: 18px;
        }

        .perusahaan {
            flex: 1;
            text-align: center;
        }

        .perusahaan h1 {
            margin: 0;
            font-size: 30px;
            color: #4d4428;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .perusahaan h3 {
            margin: 3px 0;
            font-size: 17px;
            color: #666;
            font-weight: 500;
        }

        .perusahaan p {
            margin: 2px 0;
            font-size: 13px;
            color: #555;
        }

        .judul {
            text-align: center;
            margin: 30px 0 25px;
        }

        .judul h2 {
            display: inline-block;
            margin: 0;
            padding: 8px 35px;
            border: 2px solid #4d4428;
            color: #4d4428;
            background: #f5f2eb;
            border-radius: 4px;
            letter-spacing: 1px;
            font-size: 20px;
        }

        .info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            background: #fafafa;
            border: 1px solid #d6d6d6;
        }

        .info td {
            padding: 9px 12px;
            border: none;
            font-size: 13px;
        }

        .laporan {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 13px;
        }

        .laporan th {
            background: #4d4428;
            color: #fff;
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
            font-weight: 600;
        }

        .laporan td {
            border: 1px solid #bdbdbd;
            padding: 9px 12px;
            vertical-align: middle;
        }

        .laporan tbody tr:nth-child(even) {
            background: #faf8f4;
        }

        .laporan tbody tr:hover {
            background: #f2ede3;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .total-row {
            background: #e8e2cf;
            font-weight: bold;
        }

        .total-row td {
            padding: 12px;
            border-top: 2px solid #4d4428;
            font-size: 14px;
        }

        .jumlah {
            margin-top: 18px;
            padding: 12px 15px;
            background: #f5f2eb;
            border-left: 5px solid #4d4428;
            font-weight: 600;
            color: #4d4428;
        }

        .footer {
            margin-top: 65px;
            width: 100%;
        }

        .ttd {
            width: 270px;
            float: right;
            text-align: center;
        }

        .ttd p {
            margin: 4px 0;
        }

        .ttd .nama {
            margin-top: 75px;
            font-weight: bold;
            text-decoration: underline;
            font-size: 15px;
            color: #222;
        }

        .ttd .jabatan {
            color: #666;
            font-size: 13px;
        }

        @page {
            margin: 15mm;
        }

        @media print {

            body {
                margin: 0;
                color: #000;
            }

            .laporan tbody tr:hover {
                background: transparent;
            }

        }
    </style>

</head>

<body>

    <div class="kop">

        <img src="<?= base_url() ?>/assets/logo/logoaldino.png" class="logo">

        <div class="perusahaan">

            <h1>ALDINO PERABOT</h1>
            <h3>Menerima Perabotan Kunsen, Pintu, Jendela dan lainnya</h3>

            <p>Jl. Lintas Sumatera, Pasar Usang Guguak KM 17</p>
            <p>Telp. (0852) 7477 6577 • aldinoperabot@gmail.com</p>

        </div>

    </div>

    <div class="garis"></div>

    <div class="judul">
        <h2>Laporan Pesanan Harian</h2>
    </div>
    <table class="info">
        <tr>
            <td width="160"><strong>Periode</strong></td>
            <td width="10">:</td>
            <td>Harian</td>

            <td width="150"><strong>Tanggal</strong></td>
            <td width="10">:</td>
            <td><?= date('d F Y', strtotime($tanggalpesanan)) ?></td>
        </tr>
    </table>

    <table class="laporan">

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
            <tr class="total-row">

                <td colspan="10">
                    <strong>Total Pesanan</strong>
                </td>

                <td class="center">
                    <strong><?= count($pesanan) ?></strong>
                </td>

            </tr>

        </tbody>

    </table>

    <div class="footer">

        <div class="ttd">

            Solok, <?= date('d F Y') ?>

            <br><br>

            Mengetahui,

            <br>

            <strong>Pemilik Aldino Perabot</strong>

            <div class="nama">
                Aldino Oktami
            </div>

            <div class="jabatan">
                Owner
            </div>

        </div>

    </div>

    <script>
        window.print();
    </script>

</body>

</html>