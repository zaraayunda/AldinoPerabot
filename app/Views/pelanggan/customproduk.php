<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aldino Perabot - Registrasi</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/logo/logoaldino.png" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/css/styles.min.css" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center py-5">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-11 col-lg-10 col-xl-10">
                        <div class="card mb-0">
                            <div class="card-body">
                                <form action="<?= base_url('customproduk/simpan') ?>" method="post" enctype="multipart/form-data" onsubmit="return cekDetail()">
                                    <div class="card-body">

                                        <input
                                            type="hidden"
                                            name="idpelanggan"
                                            value="<?= $pelanggan['idpelanggan'] ?>">

                                        <!-- HEADER -->
                                        <div class="custom-header">

                                            <div class="row align-items-center">

                                                <div class="col-md-8">

                                                    <div class="d-flex align-items-center">

                                                        <div class="custom-icon">

                                                            <i class="ti ti-armchair"></i>

                                                        </div>

                                                        <div class="ms-4">

                                                            <h2 class="custom-title">
                                                                Pengajuan Produk Custom
                                                            </h2>

                                                            <p class="custom-subtitle">
                                                                Isi detail produk sesuai keinginan Anda.
                                                                Tim Aldino Perabot akan meninjau dan memberikan
                                                                penawaran harga terbaik.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-md-4 text-end">

                                                    <img
                                                        src="<?= base_url('assets/images/collection/arrivals3.png') ?>"
                                                        class="img-fluid sofa-image">

                                                </div>

                                            </div>

                                        </div>

                                        <!-- STEP -->
                                        <div class="custom-step-card">

                                            <div class="row">

                                                <div class="col-md-4">

                                                    <div class="step-item">

                                                        <div class="step-icon">
                                                            <i class="ti ti-photo"></i>
                                                        </div>

                                                        <div>

                                                            <h6>Upload Foto Referensi</h6>

                                                            <p>
                                                                Foto referensi membantu kami memahami
                                                                desain yang Anda inginkan.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <div class="step-item">

                                                        <div class="step-icon">
                                                            <i class="ti ti-pencil"></i>
                                                        </div>

                                                        <div>

                                                            <h6>Detail Spesifikasi</h6>

                                                            <p>
                                                                Semakin detail informasi yang Anda berikan,
                                                                semakin akurat hasil yang kami berikan.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <div class="step-item">

                                                        <div class="step-icon">
                                                            <i class="ti ti-clock"></i>
                                                        </div>

                                                        <div>

                                                            <h6>Proses Peninjauan</h6>

                                                            <p>
                                                                Pengajuan akan ditinjau dan Anda akan menerima
                                                                penawaran harga dari admin.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div id="produkContainer"></div>

                                        <div
                                            id="tambahButton"
                                            class="text-center mt-4"
                                            style="display:none;">

                                            <button
                                                type="button"
                                                class="btn btn-custom-add"
                                                onclick="tambahProduk()">

                                                <i class="ti ti-plus"></i>
                                                Tambah Produk Lagi

                                            </button>

                                        </div>

                                        <!-- EMPTY STATE -->
                                        <div id="emptyState" class="custom-empty-state">

                                            <div class="empty-circle">

                                                <i class="ti ti-package"></i>

                                            </div>

                                            <h4>
                                                Belum ada produk yang ditambahkan
                                            </h4>

                                            <p>
                                                Klik tombol di bawah ini untuk menambahkan
                                                produk custom pertama Anda.
                                            </p>

                                            <button
                                                type="button"
                                                class="btn btn-simpan"
                                                onclick="tambahProduk()">

                                                <i class="ti ti-plus"></i>
                                                Tambah Produk Custom

                                            </button>

                                        </div>

                                    </div>

                                    <div class="form-footer">

                                        <div class="card-body">

                                            <div class="row align-items-center">

                                                <div class="col-md-6">
<!-- 
                                                    <div class="privacy-box">

                                                        <i class="ti ti-shield-check"></i>

                                                        <div>

                                                            <strong>
                                                                Privasi Terjamin
                                                            </strong>

                                                            <p class="mb-0">
                                                                Data dan informasi produk Anda akan kami jaga kerahasiaannya.
                                                            </p>

                                                        </div>

                                                    </div> -->

                                                </div>

                                                <div class="col-md-6 text-end">

                                                    <a
                                                        onclick="history.back()"
                                                        class="btn btn-kembali btn-lg">

                                                        <i class="ti ti-arrow-left"></i>
                                                        Kembali

                                                    </a>

                                                    <button
                                                        type="submit"
                                                        class="btn btn-simpan btn-lg ms-2">

                                                        <i class="ti ti-send"></i>
                                                        Ajukan Custom

                                                    </button>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>/assets/dashboard/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "<?= session()->getFlashdata('success'); ?>",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: "<?= session()->getFlashdata('error'); ?>",
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

    <script>
        let nomorProduk = 0;

        function tambahProduk() {

            document.getElementById('emptyState').style.display = 'none';
            document.getElementById('tambahButton').style.display = 'block';

            nomorProduk++;

            let html = `

    <div class="card produk-card mb-4">

        <div class="card-header produk-header">

            <h5 class="mb-0 judul-produk">
                <i class="ti ti-package me-2"></i>
                Produk Custom #${nomorProduk}
            </h5>

            <button
                type="button"
                class="btn btn-danger btn-sm"
                onclick="hapusProduk(this)">

                <i class="ti ti-trash"></i>

            </button>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-8">

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="namaprodukcustom[]"
                            class="form-control"
                            required>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="mb-3">

                        <label class="form-label">
                            Qty
                        </label>

                        <input
                            type="number"
                            name="qty[]"
                            min="1"
                            class="form-control"
                            required>

                    </div>

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Upload Foto Referensi
                </label>

                <input
                    type="file"
                    name="fotoreferensi[]"
                    class="form-control"
                    accept="image/*"
                    onchange="previewFoto(this)"
                    required>

                <img
                    src=""
                    class="img-thumbnail mt-3 preview-foto"
                    style="
                        display:none;
                        width:180px;
                        height:140px;
                        object-fit:cover;
                        border-radius:15px;
                    ">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Detail 
                </label>

                <textarea
                    name="detailcustom[]"
                    rows="4"
                    class="form-control"
                    required></textarea>

            </div>

        </div>

    </div>

    `;

            document
                .getElementById('produkContainer')
                .insertAdjacentHTML(
                    'beforeend',
                    html
                );
        }

        function hapusProduk(btn) {

            btn.closest('.produk-card').remove();

            let jumlah =
                document.querySelectorAll('.produk-card')
                .length;

            if (jumlah === 0) {

                document.getElementById(
                    'emptyState'
                ).style.display = 'block';

                document.getElementById(
                    'tambahButton'
                ).style.display = 'none';

                nomorProduk = 0;
            }
            updateNomorProduk();
        }

        function cekDetail() {

            let jumlah =
                document.querySelectorAll(
                    '.produk-card'
                ).length;

            if (jumlah === 0) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Minimal 1 produk harus ditambahkan'
                });

                return false;
            }

            return true;
        }

        function previewFoto(input) {

            let preview =
                input.parentElement.querySelector(
                    '.preview-foto'
                );

            if (input.files && input.files[0]) {

                preview.src =
                    URL.createObjectURL(input.files[0]);

                preview.style.display = 'block';
            }
        }

        function updateNomorProduk() {

            let cards =
                document.querySelectorAll(
                    '.produk-card'
                );

            cards.forEach(
                (card, index) => {

                    card.querySelector(
                            '.judul-produk'
                        ).innerHTML =
                        `<i class="ti ti-package me-2"></i>
                 Produk Custom #${index + 1}`;
                }
            );

            nomorProduk = cards.length;
        }
    </script>
</body>

</html>