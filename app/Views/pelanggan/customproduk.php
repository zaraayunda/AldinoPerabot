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
                    <div class="col-md-8 col-lg-8 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= base_url() ?>/assets/dashboard/images/logos/logo.svg" alt="">
                                </a>
                                <p class="text-center">Jalan Lintas Solok – Padang KM 17, Ps. Usang Guguk, Sumatera Barat</p>
                                <form action="<?= base_url('customproduk/simpan') ?>" method="post" enctype="multipart/form-data" onsubmit="return cekDetail()">
                                    <div class="card-body">
                                        <h4 class="section-title">
                                            Lengkapi Data Custom Produk
                                        </h4>
                                        <input
                                            type="hidden"
                                            name="idpelanggan"
                                            value="<?= $pelanggan['idpelanggan'] ?>">
                                        <!-- INPUT PRODUK CUSTOM -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">
                                                    Nama Produk
                                                    <span class="required">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    id="namaprodukcustom"
                                                    class="form-control"
                                                    placeholder="Masukkan nama produk">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">
                                                    Jumlah
                                                    <span class="required">*</span>
                                                </label>
                                                <input
                                                    type="number"
                                                    id="qty"
                                                    class="form-control"
                                                    placeholder="Masukkan jumlah">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">
                                                    Foto Referensi
                                                    <span class="required">*</span>
                                                </label>
                                                <input
                                                    type="file"
                                                    id="fotoreferensi"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">
                                                    Detail Produk
                                                    <span class="required">*</span>
                                                </label>
                                                <textarea
                                                    id="detailcustom"
                                                    class="form-control"
                                                    rows="4"
                                                    placeholder="Masukkan detail produk seperti bahan, ukuran, warna">
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary w-100"
                                                    onclick="tambahDetail()">
                                                    + Tambah Produk
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Produk</th>
                                                        <th>Qty</th>
                                                        <th>Foto</th>
                                                        <th>Detail</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="detailCustom">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-primary w-100 py-6 fs-4 mb-4">
                                            Ajukan Custom
                                        </button>
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
        let noDetail = 0;
        function tambahDetail() {
            let namaProduk = document.getElementById('namaprodukcustom').value;
            let qty = document.getElementById('qty').value;
            let foto = document.getElementById('fotoreferensi').files[0];
            let detail = document.getElementById('detailcustom').value;
            if ( namaProduk == '' || qty == '' || foto == undefined || detail == '' ) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data belum lengkap',
                    text: 'Lengkapi data produk custom terlebih dahulu'
                });
                return;
            }
            noDetail++;
            let tbody = document.getElementById('detailCustom');
            let row = `
            <tr>
                <td>${noDetail}</td>
                <td>${namaProduk}
                    <input type="hidden" name="namaprodukcustom[]" value="${namaProduk}">
                </td>
                <td>${qty}
                    <input type="hidden" name="qty[]" value="${qty}">
                </td>        
                <td>${foto.name}</td>
                <td>${detail}
                    <input type="hidden" name="detailcustom[]" value="${detail}">
                </td>
                <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="hapusDetail(this)">
                Hapus
                </button>
                </td>
            </tr>
            `;
            tbody.innerHTML += row;
            document.getElementById('namaprodukcustom').value = '';
            document.getElementById('qty').value = '';
            document.getElementById('fotoreferensi').value = '';
            document.getElementById('detailcustom').value = '';
        }
        function hapusDetail(btn) {
            btn.closest('tr').remove();
        }
        function cekDetail() {
            let jumlah =
                document.querySelectorAll('#detailCustom tr').length;
            if (jumlah == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Belum ada produk',
                    text: 'Tambahkan minimal satu produk custom'
                });
                return false;
            }
            return true;
        }
    </script>
</body>

</html>