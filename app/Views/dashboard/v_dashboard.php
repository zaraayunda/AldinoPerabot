<?= $this->extend('dashboard/dashboard') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: #f7f3ef;
    }

    /* Hero */
    .hero-dashboard {
        background: linear-gradient(135deg, #5D4037, #8D6E63);
        border-radius: 20px;
        color: white;
        overflow: hidden;
    }

    .hero-dashboard h2 {
        font-weight: 700;
    }

    .hero-dashboard p {
        opacity: .9;
    }

    .hero-icon {
        font-size: 130px;
        opacity: .15;
    }

    /* Card Statistik */

    .stat-card {
        border: none;
        border-radius: 18px;
        transition: .3s;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, .15);
    }

    .stat-icon {
        width: 65px;
        height: 65px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: white;
    }

    .bg-brown {
        background: #6D4C41;
    }

    .bg-green {
        background: #43A047;
    }

    .bg-orange {
        background: #FB8C00;
    }

    .bg-blue {
        background: #1E88E5;
    }

    .bg-red {
        background: #E53935;
    }

    .bg-purple {
        background: #8E24AA;
    }

    .bg-darkbrown {
        background: #9a7870;
    }

    .bg-gold {
        background: #B28704;
    }

    .stat-title {
        color: #777;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .stat-number {
        font-size: 18px;
        font-weight: bold;
        color: #4E342E;
    }

    .page-title {
        color: #5D4037;
        font-weight: bold;
    }
</style>

<div class="row mb-4">

    <div class="col-12">

        <div class="card border-0 shadow-sm"
            style="background:linear-gradient(135deg,#8B5E3C,#A67C52); border-radius:18px;">

            <div class="card-body p-4">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <h2 class="fw-bold text-white mb-2">
                            Selamat Datang,
                            <?= $user['namauser']; ?> 👋
                        </h2>

                        <p class="text-white mb-3">

                            Selamat bekerja kembali.

                            Berikut adalah ringkasan aktivitas
                            <b>Aldino Perabot</b> hari ini.

                        </p>

                        <span class="badge bg-light text-dark px-3 py-2">

                            Login sebagai : <?= $user['role']; ?>

                        </span>

                    </div>

                    <div class="col-md-4 text-end">

                        <img src="<?= base_url('assets/logo/logoaldino.png') ?>"
                            width="120">

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="row">

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Pelanggan

                        </small>

                        <h2 class="fw-bold mt-2">

                            <?= $totalPelanggan ?>

                        </h2>

                    </div>

                    <div class="rounded-circle d-flex align-items-center justify-content-center"

                        style="width:70px;height:70px;background:#F5ECE3;">

                        <iconify-icon
                            icon="solar:users-group-rounded-bold-duotone"
                            width="38"
                            style="color:#8B5E3C;">
                        </iconify-icon>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Produk

                        </small>

                        <h2 class="fw-bold mt-2">

                            <?= $totalProduk ?>

                        </h2>

                    </div>

                    <div class="rounded-circle d-flex align-items-center justify-content-center"

                        style="width:70px;height:70px;background:#F5ECE3;">

                        <iconify-icon
                            icon="solar:box-bold-duotone"
                            width="38"
                            style="color:#8B5E3C;">
                        </iconify-icon>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Pesanan

                        </small>

                        <h2 class="fw-bold mt-2">

                            <?= $totalPesanan ?>

                        </h2>

                    </div>

                    <div class="rounded-circle d-flex align-items-center justify-content-center"

                        style="width:70px;height:70px;background:#F5ECE3;">

                        <iconify-icon
                            icon="solar:cart-large-2-bold-duotone"
                            width="38"
                            style="color:#8B5E3C;">
                        </iconify-icon>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Pendapatan

                        </small>

                        <h4 class="fw-bold mt-2">

                            Rp <?= number_format($totalPenjualan, 0, ',', '.') ?>

                        </h4>

                    </div>

                    <div class="rounded-circle d-flex align-items-center justify-content-center"

                        style="width:70px;height:70px;background:#F5ECE3;">

                        <iconify-icon
                            icon="solar:wallet-money-bold-duotone"
                            width="38"
                            style="color:#8B5E3C;">
                        </iconify-icon>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Pembayaran Diterima

                        </small>

                        <h4 class="fw-bold mt-2">

                            Rp <?= number_format($totalSudahBayar, 0, ',', '.') ?>

                        </h4>

                    </div>

                    <div class="rounded-circle d-flex align-items-center justify-content-center"

                        style="width:70px;height:70px;background:#F5ECE3;">

                        <iconify-icon
                            icon="solar:card-transfer-bold-duotone"
                            width="38"
                            style="color:#8B5E3C;">
                        </iconify-icon>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Piutang

                        </small>

                        <h4 class="fw-bold mt-2">

                            Rp <?= number_format($totalPiutang, 0, ',', '.') ?>

                        </h4>

                    </div>

                    <div class="rounded-circle d-flex align-items-center justify-content-center"

                        style="width:70px;height:70px;background:#F5ECE3;">

                        <iconify-icon
                            icon="solar:dollar-bold-duotone"
                            width="38"
                            style="color:#8B5E3C;">
                        </iconify-icon>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="row">

    <!-- GRAFIK PENJUALAN -->
    <div class="col-lg-8 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-header bg-white border-0 pt-4">

                <h5 class="fw-bold mb-1">
                    Grafik Penjualan Bulanan
                </h5>

                <small class="text-muted">
                    Total pendapatan setiap bulan
                </small>

            </div>

            <div class="card-body">

                <div id="chartPenjualan"></div>

            </div>

        </div>

    </div>

    <!-- DONUT STATUS PESANAN -->
    <div class="col-lg-4 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-header bg-white border-0 pt-4">

                <h5 class="fw-bold mb-1">

                    Status Pesanan

                </h5>

                <small class="text-muted">

                    Distribusi pesanan saat ini

                </small>

            </div>

            <div class="card-body">

                <div id="chartStatus"></div>

            </div>

        </div>

    </div>

</div>


<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    var options = {

        series: [{

            name: "Penjualan",

            data: <?= json_encode($grafikPenjualan) ?>

        }],

        chart: {

            type: "area",

            height: 350,

            toolbar: {

                show: false

            },

            zoom: {

                enabled: false

            }

        },

        colors: ['#8B5E3C'],

        stroke: {

            curve: "smooth",

            width: 4

        },

        fill: {

            type: "gradient",

            gradient: {

                shadeIntensity: 1,

                opacityFrom: 0.45,

                opacityTo: 0.05

            }

        },

        grid: {

            borderColor: "#EEEEEE",

            strokeDashArray: 4

        },

        markers: {

            size: 5

        },

        dataLabels: {

            enabled: false

        },

        xaxis: {

            categories: [

                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',

                'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'

            ]

        },

        yaxis: {

            labels: {

                formatter: function(value) {

                    return "Rp " + value.toLocaleString("id-ID");

                }

            }

        },

        tooltip: {

            y: {

                formatter: function(value) {

                    return "Rp " + value.toLocaleString("id-ID");

                }

            }

        }

    };

    new ApexCharts(

        document.querySelector("#chartPenjualan"),

        options

    ).render();
</script>

<script>
    var statusOptions = {

        series: [

            <?= $statusPesanan['menunggu']; ?>,

            <?= $statusPesanan['konfirmasi']; ?>,

            <?= $statusPesanan['produksi']; ?>,

            <?= $statusPesanan['pengantaran']; ?>,

            <?= $statusPesanan['selesai']; ?>

        ],

        chart: {

            type: 'donut',

            height: 320

        },

        labels: [

            'Menunggu',

            'Dikonfirmasi',

            'Produksi',

            'Pengantaran',

            'Selesai'

        ],

        colors: [

            '#D7CCC8',

            '#BC8F6F',

            '#8B5E3C',

            '#6D4C41',

            '#4E342E'

        ],

        legend: {

            position: 'bottom'

        },

        dataLabels: {

            enabled: true

        },

        responsive: [{

            breakpoint: 480,

            options: {

                chart: {

                    width: 250

                }

            }

        }]

    };

    new ApexCharts(

        document.querySelector("#chartStatus"),

        statusOptions

    ).render();
</script>

<?= $this->endSection() ?>