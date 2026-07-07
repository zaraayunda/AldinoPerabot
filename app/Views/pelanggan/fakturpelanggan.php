<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Faktur Pembayaran</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {

            background: #ececec;
            padding: 40px;

        }

        .invoice {

            width: 210mm;
            min-height: 297mm;

            background: #fff;

            margin: auto;

            padding: 40px;

            box-shadow: 0 0 12px rgba(0, 0, 0, .15);

        }

        .header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            border-bottom: 3px solid #222;

            padding-bottom: 15px;

        }

        .logo {

            width: 90px;

        }

        .company h1 {

            font-size: 28px;

            color: #111;

        }

        .company p {

            color: #555;

            font-size: 13px;

            margin-top: 3px;

        }

        .title {

            text-align: center;

            margin: 30px 0;

        }

        .title h2 {

            font-size: 28px;

            letter-spacing: 2px;

        }

        .title p {

            margin-top: 8px;

            color: #666;

        }

        .info {

            display: flex;

            justify-content: space-between;

            gap: 20px;

            margin-top: 25px;

            margin-bottom: 30px;

        }

        .box {

            flex: 1;

            border: 1px solid #dcdcdc;

            border-radius: 8px;

            overflow: hidden;

        }

        .box-title {

            background: #2c3e50;

            color: white;

            padding: 12px 15px;

            font-size: 15px;

            font-weight: bold;

        }

        .table-info {

            width: 100%;

            border-collapse: collapse;

        }

        .table-info td {

            padding: 10px 15px;

            font-size: 14px;

            vertical-align: top;

        }

        .badge-success {

            background: #27ae60;

            color: white;

            padding: 4px 12px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;

        }

        .product-table {

            margin-top: 15px;

        }

        .invoice-table {

            width: 100%;

            border-collapse: collapse;

        }

        .invoice-table thead th {

            background: #f3f4f6;

            color: #222;

            border: 1px solid #cfcfcf;

            padding: 12px;

            font-size: 14px;

        }

        .invoice-table tbody td {

            border: 1px solid #dcdcdc;

            padding: 12px;

            font-size: 14px;

        }

        .invoice-table tbody tr:nth-child(even) {

            background: #fafafa;

        }

        .center {

            text-align: center;

        }

        .right {

            text-align: right;

        }

        .summary {

            margin-top: 25px;

            display: flex;

            justify-content: flex-end;

        }

        .summary-box {

            width: 380px;

            border: 1px solid #d6d6d6;

            border-radius: 8px;

            overflow: hidden;

        }

        .summary-title {

            background: #2c3e50;

            color: white;

            padding: 12px 18px;

            font-weight: bold;

        }

        .summary-table {

            width: 100%;

            border-collapse: collapse;

        }

        .summary-table td {

            padding: 12px 18px;

            font-size: 14px;

        }

        .summary-table tr:nth-child(even) {

            background: #fafafa;

        }

        .summary-table .line td {

            border-top: 2px dashed #999;

            padding: 0;

            height: 10px;

        }

        .status-lunas {

            background: #28a745;

            color: white;

            padding: 5px 12px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;

        }

        .status-belum {

            background: #dc3545;

            color: white;

            padding: 5px 40px;

            border-radius: 10px;

            font-size: 12px;

            font-weight: bold;

        }

        .footer {

            margin-top: 60px;

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            border-top: 2px solid #dcdcdc;

            padding-top: 25px;

        }

        .footer-left {

            width: 55%;

        }

        .footer-left h4 {

            margin-bottom: 10px;

            color: #2c3e50;

        }

        .footer-left p {

            font-size: 14px;

            color: #555;

            line-height: 24px;

        }

        .footer-right {

            width: 30%;

            text-align: center;

            font-size: 14px;

        }

        .footer-right strong {

            font-size: 15px;

        }

        @page {

            size: A4;

            margin: 15mm;

        }

        @media print {

            body {

                background: white;

                padding: 0;

            }

            .invoice {

                width: 100%;

                box-shadow: none;

                margin: 0;

                padding: 0;

            }

        }
    </style>

</head>

<body>

    <div class="invoice">

        <!-- Header -->
        <div class="header">

            <div style="display:flex;align-items:center;">

                <!-- Logo -->
                <img src="<?= base_url() ?>/assets/logo/logoaldino.png" class="logo">

                <div class="company" style="margin-left:18px;">

                    <h1>ALDINO PERABOT</h1>
                    <p>Menerima Perabotan Kunsen, Pintu, Jendela dan lainnya</p>

                    <p>Jl. Lintas Sumatera, Pasar Usang Guguak KM 17</p>
                    <p>Telp. (0852) 7477 6577 • aldinoperabot@gmail.com</p>

                </div>

            </div>

            <div style="text-align:right;">

                <h3 style="margin-bottom:10px;">FAKTUR</h3>

                <table style="font-size:13px;">

                    <tr>

                        <td><b>No Faktur</b></td>

                        <td>:</td>

                        <td>
                            INV-<?= substr($pesanan['idpesanan'], 3) ?>
                        </td>

                    </tr>

                    <tr>

                        <td><b>No Pesanan</b></td>

                        <td>:</td>

                        <td><?= $pesanan['idpesanan'] ?></td>

                    </tr>

                    <tr>

                        <td><b>Tanggal</b></td>

                        <td>:</td>

                        <td>
                            <?= date('d-m-Y', strtotime($pesanan['tanggalpesanan'])) ?>
                        </td>

                    </tr>

                </table>

            </div>

        </div>

        <!-- Judul -->
        <div class="title">

            <h2>FAKTUR PEMBAYARAN</h2>

            <p>
                Bukti resmi transaksi pembayaran pelanggan
            </p>

        </div>

        <!-- Informasi -->
        <div class="info">

            <div class="box">

                <div class="box-title">
                    Data Pelanggan
                </div>

                <table class="table-info">

                    <tr>

                        <td width="90">Nama</td>

                        <td width="15">:</td>

                        <td><?= $pelanggan['namapelanggan']; ?></td>

                    </tr>

                    <tr>

                        <td>No HP</td>

                        <td>:</td>

                        <td><?= $pelanggan['nohp']; ?></td>

                    </tr>

                    <tr>

                        <td>Alamat</td>

                        <td>:</td>

                        <td><?= $pelanggan['alamat']; ?></td>

                    </tr>

                </table>

            </div>

            <div class="box">

                <div class="box-title">
                    Informasi Transaksi
                </div>

                <table class="table-info">

                    <tr>

                        <td><strong>Status</strong></td>

                        <td class="right">

                            <?php if ($pesanan['sisa'] == 0): ?>

                                <span class="status-lunas">
                                    LUNAS
                                </span>

                            <?php else: ?>

                                <span class="status-belum">
                                    Belum Lunas
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                    <tr>

                        <td>Total Pesanan</td>

                        <td>:</td>

                        <td>

                            Rp <?= number_format($pesanan['total'], 0, ',', '.'); ?>

                        </td>

                    </tr>

                    <tr>

                        <td>Total Dibayar</td>

                        <td>:</td>

                        <td>

                            Rp <?= number_format($pesanan['total_bayar'], 0, ',', '.'); ?>

                        </td>

                    </tr>

                    <tr>

                        <td>Sisa</td>

                        <td>:</td>

                        <td>

                            Rp <?= number_format($pesanan['sisa'], 0, ',', '.'); ?>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

        <!-- Tabel -->
        <div class="product-table">

            <table class="invoice-table">

                <thead>

                    <tr>

                        <th width="6%">No</th>

                        <th>Nama Produk</th>

                        <th width="10%">Qty</th>

                        <th width="18%">Harga</th>

                        <th width="10%">Diskon</th>

                        <th width="20%">Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($detail as $d) : ?>

                        <tr>

                            <td class="center">
                                <?= $no++; ?>
                            </td>

                            <td>

                                <strong><?= $d['namaproduk']; ?></strong>

                            </td>

                            <td class="center">

                                <?= $d['qty']; ?>

                            </td>

                            <td class="right">

                                Rp <?= number_format($d['harga'], 0, ',', '.'); ?>

                            </td>

                            <td class="center">

                                <?= $d['diskon']; ?>%

                            </td>

                            <td class="right">

                                Rp <?= number_format($d['subtotal'], 0, ',', '.'); ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
        <!-- Total -->
        <div class="summary">

            <div class="summary-box">

                <div class="summary-title">
                    Ringkasan Pembayaran
                </div>

                <table class="summary-table">

                    <tr>

                        <td>Total Pesanan</td>

                        <td class="right">
                            Rp <?= number_format($pesanan['total'], 0, ',', '.'); ?>
                        </td>

                    </tr>

                    <?php foreach ($pembayaran as $bayar): ?>

                        <tr>

                            <td>

                                <?= $bayar['jenispembayaran']; ?>

                            </td>

                            <td class="right">

                                Rp <?= number_format($bayar['jumlahbayar'], 0, ',', '.'); ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <tr class="line">

                        <td colspan="2"></td>

                    </tr>

                    <tr>

                        <td><strong>Total Dibayar</strong></td>

                        <td class="right">

                            <strong>

                                Rp <?= number_format($pesanan['total_bayar'], 0, ',', '.'); ?>

                            </strong>

                        </td>

                    </tr>

                    <tr>

                        <td><strong>Sisa Pembayaran</strong></td>

                        <td class="right">

                            <strong>

                                Rp <?= number_format($pesanan['sisa'], 0, ',', '.'); ?>

                            </strong>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

        <!-- Footer -->
        <div class="footer">

            <div class="footer-left">

                <h4>Catatan</h4>

                <p>

                    Terima kasih telah mempercayakan kebutuhan furniture Anda kepada
                    <strong>Aldino Perabot</strong>.

                </p>

                <p>

                    Faktur ini merupakan bukti pembayaran yang sah.

                </p>

            </div>

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