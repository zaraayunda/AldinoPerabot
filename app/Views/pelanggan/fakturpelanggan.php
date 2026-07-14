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
            font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
        }

        body {
            background: #ececec;
            padding: 30px;
            color: #333;
        }

        .invoice {
            width: 210mm;
            min-height: 297mm;
            background: #fff;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, .12);
        }

        /* ================= HEADER ================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #dcdcdc;
            padding-bottom: 12px;
        }

        .logo {
            width: 70px;
        }

        .company {
            margin-left: 15px;
        }

        .company h1 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 3px;
        }

        .company p {
            font-size: 11px;
            color: #666;
            line-height: 17px;
            margin: 0;
        }

        .header table {
            font-size: 13px;
            border-collapse: collapse;
        }

        .header table td {
            padding: 2px 4px;
        }

        /* ================= JUDUL ================= */

        .title {
            text-align: center;
            margin: 18px 0 20px;
        }

        .title h2 {
            font-size: 24px;
            color: #2c3e50;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .title p {
            color: #777;
            font-size: 12px;
        }

        /* ================= INFO ================= */

        .info {
            display: flex;
            gap: 18px;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .box {
            flex: 1;
            border: 1px solid #d9dee3;
            border-radius: 6px;
            overflow: hidden;
            background: #fff;
        }

        .box-title {
            background: #2c3e50;
            color: #fff;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 600;
        }

        .table-info {
            width: 100%;
            border-collapse: collapse;
        }

        .table-info tr {
            border-bottom: 1px solid #eceff2;
        }

        .table-info tr:last-child {
            border-bottom: none;
        }

        .table-info td {
            padding: 11px 15px;
            font-size: 13px;
            vertical-align: top;
        }

        .table-info td:first-child {
            width: 120px;
            color: #666;
            font-weight: 600;
        }

        .table-info td:nth-child(2) {
            width: 15px;
            color: #999;
        }

        .table-info td:last-child {
            color: #2c3e50;
            font-weight: 500;
        }

        /* ================= STATUS ================= */

        .status-lunas,
        .status-belum {
            display: inline-block;
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .6px;
            text-transform: uppercase;
        }

        .status-lunas {
            background: #d4edda;
            color: #155724;
            border: 1px solid #b9dfc2;
        }

        .status-belum {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #efb9c0;
        }

        /* ================= TABEL PRODUK ================= */

        .product-table {
            margin-top: 8px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table thead th {
            background: #2c3e50;
            color: #fff;
            border: 1px solid #d0d5da;
            padding: 11px;
            font-size: 13px;
            font-weight: 600;
        }

        .invoice-table tbody td {
            border: 1px solid #e3e6e8;
            padding: 10px;
            font-size: 13px;
        }

        .invoice-table tbody tr:nth-child(even) {
            background: #fafafa;
        }

        .invoice-table tbody tr:hover {
            background: #f5f8fb;
        }

        /* ================= ALIGN ================= */

        .center {
            text-align: center;
            white-space: nowrap;
        }

        .right {
            text-align: right;
            white-space: nowrap;
        }

        .nowrap {
            white-space: nowrap;
        }

        /* ================= SUMMARY ================= */

        .summary {
            margin-top: 25px;
            display: flex;
            justify-content: flex-end;
        }

        .summary-box {
            width: 400px;
            border: 1px solid #d9dee3;
            border-radius: 6px;
            overflow: hidden;
        }

        .summary-title {
            background: #2c3e50;
            color: #fff;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 600;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary-table td {
            padding: 10px 18px;
            font-size: 13px;
        }

        .summary-table tr:nth-child(even) {
            background: #fafafa;
        }

        .summary-table .line td {
            border-top: 1px dashed #999;
            padding: 0;
            height: 8px;
        }

        .summary-table .grand-total td {
            background: #eef3f7;
            font-size: 15px;
            font-weight: bold;
        }

        /* ================= FOOTER ================= */

        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .footer-left {
            width: 60%;
        }

        .footer-left h4 {
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .footer-left p {
            font-size: 13px;
            line-height: 22px;
            color: #555;
        }

        .footer-right {
            width: 30%;
            text-align: center;
        }

        .footer-right p {
            font-size: 13px;
            margin-bottom: 50px;
        }

        .footer-right strong {
            font-size: 14px;
        }

        /* ================= PRINT ================= */

        @page {
            margin: 12mm;
        }

        @media print {

            body {
                background: #fff;
                padding: 0;
            }

            .invoice {
                width: 100%;
                padding: 0;
                margin: 0;
                box-shadow: none;
            }

            .invoice-table tbody tr:hover {
                background: transparent;
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

                        <td>Biaya Pengiriman</td>

                        <td class="right">
                            Rp <?= number_format($pesanan['biayaantar'], 0, ',', '.'); ?>
                        </td>

                    </tr>

                    <tr>

                        <td>Total Pesanan</td>

                        <td class="right">
                            Rp <?= number_format($pesanan['total'], 0, ',', '.'); ?>
                        </td>

                    </tr>
                    <tr class="line">

                        <td colspan="2"></td>

                    </tr>


                    <?php foreach ($pembayaran as $bayar): ?>

                        <tr>
                            <td>
                                <p><?= $bayar['jenispembayaran']; ?></p><br>
                                <small style="color:#777;">
                                    Di bayarkan tanggal <?= date('d F Y', strtotime($bayar['tanggalpembayaran'])); ?>
                                </small>
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