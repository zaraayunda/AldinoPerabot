<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Status Pesanan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #ece7e1;
            padding: 40px;
        }

        /*================ CONTAINER ================*/

        .container {

            width: 210mm;
            min-height: 297mm;
            background: #fff;
            margin: auto;
            padding: 40px;
            box-shadow: 0 0 12px rgba(0, 0, 0, .15);

        }

        /*================ HEADER ================*/

        .header {

            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #6F4E37;
            padding-bottom: 15px;

        }

        .logo {

            width: 90px;
            height: 90px;

        }

        .logo img {

            width: 100%;

        }

        .company {

            flex: 1;
            text-align: center;

        }

        .company h1 {

            font-size: 28px;
            color: #6F4E37;

        }

        .company p {

            color: #666;
            font-size: 13px;
            margin-top: 3px;

        }

        /*================ TITLE ================*/

        h2 {

            text-align: center;
            margin: 30px 0 10px;
            font-size: 28px;
            color: #6F4E37;
            letter-spacing: 2px;

        }

        .ornament {

            width: 100px;
            height: 4px;
            background: #A67C52;
            margin: 0 auto 30px;
            border-radius: 20px;

        }

        /*================ INFO ================*/

        .info {

            display: flex;
            gap: 20px;
            margin-bottom: 30px;

        }

        .card {

            flex: 1;
            border: 1px solid #d7ccc8;
            border-radius: 8px;
            overflow: hidden;
            background: white;

        }

        .card::before {

            content: "Informasi";
            display: block;
            background: #6F4E37;
            color: white;
            padding: 12px 15px;
            font-size: 15px;
            font-weight: bold;

        }

        .card table {

            width: 100%;
            border-collapse: collapse;

        }

        .card td {

            padding: 10px 15px;
            border-bottom: 1px solid #f1ece8;
            font-size: 14px;

        }

        .label {

            width: 160px;
            font-weight: bold;
            color: #6F4E37;

        }

        /*================ BADGE ================*/

        .badge {

            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            color: white;
            font-size: 12px;
            font-weight: bold;

        }

        .primary {

            background: #8B5E3C;

        }

        .success {

            background: #4E342E;

        }

        .warning {

            background: #C89B3C;

        }

        .danger {

            background: #B23A48;

        }

        /*================ TABLE ================*/

        .detail {

            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;

        }

        .detail th {

            background: #6F4E37;
            color: white;
            border: 1px solid #5D4037;
            padding: 12px;
            font-size: 14px;

        }

        .detail td {

            border: 1px solid #ddd;
            padding: 12px;
            font-size: 14px;
            text-align: center;

        }

        .detail tbody tr:nth-child(even) {

            background: #faf7f3;

        }

        /*================ TOTAL ================*/

        .total {

            margin-top: 25px;
            display: flex;
            justify-content: flex-end;

        }

        .box-total {

            width: 360px;
            border: 1px solid #d6d6d6;
            border-radius: 8px;
            overflow: hidden;

        }

        .box-total h3 {

            background: #6F4E37;
            color: white;
            padding: 12px 18px;
            font-size: 16px;
            text-align: left;

        }

        .box-total h1 {

            padding: 18px;
            text-align: right;
            font-size: 30px;
            color: #6F4E37;
            background: #faf7f3;

        }

        /*================ FOOTER ================*/

        .footer {

            margin-top: 60px;
            display: flex;
            justify-content: flex-end;
            border-top: 2px solid #d7ccc8;
            padding-top: 25px;

        }

        .footer-right {

            width: 30%;

            text-align: center;

            font-size: 14px;

        }

        .footer-right strong {

            font-size: 15px;

        }

        .ttd {

            width: 250px;
            text-align: center;
            color: #444;

        }

        .ttd p {

            margin-top: 80px;
            border-top: 2px solid #6F4E37;
            padding-top: 8px;
            font-weight: bold;
            color: #6F4E37;

        }

        /*================ PRINT ================*/

        @page {

            margin: 15mm;

        }

        @media print {

            body {

                background: white;
                padding: 0;

            }

            .container {

                width: 100%;
                box-shadow: none;
                margin: 0;
                padding: 0;

            }

        }
    </style>

</head>

<body>
    <?php

    $dataPesanan = null;

    foreach ($pesanan as $p) {
        if ($p['idpesanan'] == $idpesanan) {
            $dataPesanan = $p;
            break;
        }
    }

    if (!$dataPesanan) {
        die("Data pesanan tidak ditemukan");
    }

    $namaPelanggan = "-";

    foreach ($pelanggan as $pl) {

        if ($pl['idpelanggan'] == $dataPesanan['idpelanggan']) {

            $namaPelanggan = $pl['namapelanggan'];

            break;
        }
    }
    $statusPembayaran = "Belum Lunas";

    foreach ($pembayaran as $pb) {

        if ($pb['idpesanan'] == $dataPesanan['idpesanan']) {

            if (
                $pb['statuspembayaran'] == 'valid' &&
                (
                    $pb['jenispembayaran'] == 'Full Payment' ||
                    $pb['jenispembayaran'] == 'Pelunasan'
                )
            ) {
                $statusPembayaran = "Lunas";
            } else {
                $statusPembayaran = "Belum Lunas";
            }

            break;
        }
    }
    ?>

    <div class="container">

        <div class="header">

            <img src="<?= base_url() ?>/assets/logo/logoaldino.png" class="logo">

            <div class="company" style="margin-left:18px;">

                <h1>ALDINO PERABOT</h1>
                <p>Menerima Perabotan Kunsen, Pintu, Jendela dan lainnya</p>

                <p>Jl. Lintas Sumatera, Pasar Usang Guguak KM 17</p>
                <p>Telp. (0852) 7477 6577 • aldinoperabot@gmail.com</p>

            </div>

        </div>

        <h2>Laporan Status Pesanan</h2>

        <div class="info">

            <div class="card">

                <table>

                    <tr>
                        <td class="label">ID Pesanan</td>
                        <td>: <?= $idpesanan ?></td>
                    </tr>

                    <tr>
                        <td class="label">Tanggal</td>
                        <td>: <?= date('d-m-Y', strtotime($dataPesanan['tanggalpesanan'])) ?></td>
                    </tr>

                    <tr>
                        <td class="label">Nama Pelanggan</td>
                        <td>: <?= $namaPelanggan ?></td>
                    </tr>

                </table>

            </div>

            <div class="card">

                <table>

                    <tr>
                        <td class="label">Status Pesanan</td>
                        <td>:
                            <span class="badge primary">
                                <?= $dataPesanan['statuspesanan'] ?>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="label">Pembayaran</td>
                        <td>:
                            <span class="badge success">
                                <?= $statusPembayaran ?>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="label">Total</td>
                        <td>: <b>Rp <?= number_format($dataPesanan['total'], 0, ',', '.') ?></b></td>
                    </tr>

                </table>

            </div>

        </div>

        <h3>Detail Pesanan</h3>

        <table class="detail">

            <thead>

                <tr>

                    <th>No</th>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Diskon</th>
                    <th>Subtotal</th>

                </tr>

            </thead>

            <tbody>

                <?php $no = 1; ?>

                <?php foreach ($detailpesanan as $d): ?>

                    <?php if ($d['idpesanan'] == $dataPesanan['idpesanan']): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= $d['idproduk'] ?></td>

                            <td>

                                <?php

                                foreach ($produk as $pr) {

                                    if ($pr['idproduk'] == $d['idproduk']) {

                                        echo $pr['namaproduk'];

                                        break;
                                    }
                                }

                                ?>

                            </td>

                            <td>Rp <?= number_format($d['harga'], 0, ',', '.') ?></td>

                            <td><?= $d['qty'] ?></td>

                            <td>Rp <?= number_format($d['diskon'], 0, ',', '.') ?></td>

                            <td>Rp <?= number_format($d['subtotal'], 0, ',', '.') ?></td>

                        </tr>

                    <?php endif; ?>

                <?php endforeach; ?>

            </tbody>

        </table>

        <div class="total">

            <div class="box-total">

                <h3>Total Keseluruhan</h3>

                <h1>
                    Rp <?= number_format($dataPesanan['total'], 0, ',', '.') ?>
                </h1>

            </div>

        </div>

        <div class="footer">

            <div class="footer-right">

                <p>

                    Padang,
                    <?= date('d F Y'); ?>

                </p>

                <br><br><br><br>

                <strong>

                    Aldino Oktami

                </strong>

                <br>

                Owner Aldino Perabot

            </div>

        </div>

    </div>
    <script>
        window.onload = function() {

            window.print();

        }
    </script>

</body>

</html>