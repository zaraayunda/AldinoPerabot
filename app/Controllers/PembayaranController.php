<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPesanan;
use App\Models\ModelPembayaran;
use App\Models\ModelDetailPesanan;
use App\Models\ModelPelanggan;
use App\Models\ModelProduk;

class PembayaranController extends BaseController
{
    public function index()
    {
        $modelPesanan = new ModelPesanan();
        $modelPembayaran = new ModelPembayaran();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan = new ModelPelanggan();

        // Ambil semua pesanan
        $pesanan = $modelPesanan->findAll();

        // Ambil pembayaran dan URUTKAN
        $pembayaran = $modelPembayaran
            ->orderBy('idpesanan', 'ASC')
            ->orderBy('tanggalpembayaran', 'ASC')
            ->findAll();

        // Mapping total harga
        $pesananMap = [];
        foreach ($pesanan as $p) {
            $pesananMap[$p['idpesanan']] = $p;
        }

        // Menyimpan total pembayaran tiap pesanan
        $akumulasiBayar = [];

        foreach ($pembayaran as &$row) {

            $idPesanan = $row['idpesanan'];

            if (!isset($akumulasiBayar[$idPesanan])) {
                $akumulasiBayar[$idPesanan] = 0;
            }

            // Tambahkan pembayaran sekarang
            $akumulasiBayar[$idPesanan] += $row['jumlahbayar'];

            $totalHarga = $pesananMap[$idPesanan]['total'] ?? 0;

            // Tambahkan field baru
            $row['sisa'] = $totalHarga - $akumulasiBayar[$idPesanan];
        }

        $data = [
            'pesanan' => $pesanan,
            'detailpesanan' => $modelDetailPesanan->findAll(),
            'pembayaran' => $pembayaran,
            'pelanggan' => $modelPelanggan->findAll()
        ];

        return view('datatransaksi/v_datapembayaran', $data);
    }

    public function updateStatus()
    {
        $model = new ModelPembayaran();

        $idpembayaran = $this->request->getPost('idpembayaran');
        $status = $this->request->getPost('statuspembayaran');

        $model->update(
            $idpembayaran,
            [
                'statuspembayaran' => $status
            ]
        );

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Status pembayaran berhasil diperbarui'
        ]);
    }

    public function tambahdata()
    {
        $modelPesanan = new ModelPesanan();
        $modelPembayaran = new ModelPembayaran();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan = new ModelPelanggan();
        $modelProduk = new ModelProduk();

        $data = [
            'pesanan' => $modelPesanan->findAll(),
            'detailpesanan' => $modelDetailPesanan->findAll(),
            'pembayaran' => $modelPembayaran->findAll(),
            'pelanggan' => $modelPelanggan->findAll(),
            'produk' => $modelProduk->findAll(),
            'idpembayaran' => $modelPembayaran->generateId()
        ];

        return view('datatransaksi/tambahpembayaran', $data);
    }

    public function simpan()
    {
        $model = new ModelPembayaran();

        $rules = [
            'idpembayaran' => 'required',
            'idpesanan' => 'required',
            'tanggalpembayaran' => 'required',
            'jenispembayaran' => 'required',
            'metode_pembayaran' => 'required',
            'jumlahbayar' => 'required|numeric',
            'statuspembayaran' => 'required',
            'bukti_pembayaran' => [
                'rules' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,2048]|is_image[bukti_pembayaran]',
                'errors' => [
                    'uploaded' => 'Bukti pembayaran wajib diupload',
                    'max_size' => 'Ukuran gambar maksimal 2 MB',
                    'is_image' => 'File harus berupa gambar'
                ]
            ]
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Upload Bukti Pembayaran
        $bukti = $this->request->getFile('bukti_pembayaran');

        $namaBukti = $bukti->getRandomName();

        $bukti->move(
            FCPATH . 'storage/fotobuktipembayaran',
            $namaBukti
        );
        $idpembayaran = $this->request->getPost('idpembayaran');

        // Simpan ke database
        $data = [
            'idpembayaran'      => $idpembayaran,
            'idpesanan'         => $this->request->getPost('idpesanan'),
            'tanggalpembayaran' => $this->request->getPost('tanggalpembayaran'),
            'jenispembayaran'   => $this->request->getPost('jenispembayaran'),
            'metode_pembayaran'   => $this->request->getPost('metode_pembayaran'),
            'jumlahbayar'       => $this->request->getPost('jumlahbayar'),
            'statuspembayaran'  => $this->request->getPost('statuspembayaran'),
            'bukti_pembayaran'  => $namaBukti
        ];

        $model->insert($data);

        session()->setFlashdata(
            'success',
            'Data pembayaran berhasil ditambahkan'
        );

        return redirect()->to('/datapembayaran');
    }

    public function edit($idpembayaran)
    {
        $modelPembayaran = new ModelPembayaran();
        $modelPesanan = new ModelPesanan();
        $modelPelanggan = new ModelPelanggan();
        $modelDetailPesanan = new ModelDetailPesanan();

        // Ambil data pembayaran
        $pembayaran = $modelPembayaran
            ->where('idpembayaran', $idpembayaran)
            ->first();

        if (!$pembayaran) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data pembayaran tidak ditemukan'
            );
        }

        // Ambil data pesanan yang terkait pembayaran
        $pesananTerpilih = $modelPesanan
            ->where('idpesanan', $pembayaran['idpesanan'])
            ->first();

        // Hitung jumlah produk pesanan
        $jumlahProduk = 0;

        $detailPesananTerpilih = $modelDetailPesanan
            ->where('idpesanan', $pembayaran['idpesanan'])
            ->findAll();

        foreach ($detailPesananTerpilih as $detail) {
            $jumlahProduk += $detail['qty'];
        }

        $data = [
            'pembayaran'       => $pembayaran,
            'pesananTerpilih'  => $pesananTerpilih,
            'jumlahProduk'     => $jumlahProduk,

            // untuk modal
            'pesanan'          => $modelPesanan->findAll(),
            'pelanggan'        => $modelPelanggan->findAll(),
            'detailpesanan'    => $modelDetailPesanan->findAll(),
        ];

        return view('datatransaksi/editpembayaran', $data);
    }

    public function update()
    {
        $model = new ModelPembayaran();

        $idpembayaran = $this->request->getPost('idpembayaran');

        $pembayaranLama = $model->find($idpembayaran);

        if (!$pembayaranLama) {
            return redirect()->back()
                ->with('error', 'Data pembayaran tidak ditemukan');
        }

        // Ambil file baru (jika ada)
        $bukti = $this->request->getFile('bukti_pembayaran');

        $namaBukti = $pembayaranLama['bukti_pembayaran'];

        // Jika upload file baru
        if ($bukti && $bukti->isValid() && !$bukti->hasMoved()) {

            // Hapus file lama
            $fileLama = FCPATH . 'storage/fotobuktipembayaran/' . $pembayaranLama['bukti_pembayaran'];

            if (
                !empty($pembayaranLama['bukti_pembayaran']) &&
                file_exists($fileLama)
            ) {
                unlink($fileLama);
            }

            // Simpan file baru
            $namaBukti = $bukti->getRandomName();

            $bukti->move(
                FCPATH . 'storage/fotobuktipembayaran',
                $namaBukti
            );
        }

        $data = [
            'idpesanan'         => $this->request->getPost('idpesanan'),
            'tanggalpembayaran' => $this->request->getPost('tanggalpembayaran'),
            'jenispembayaran'   => $this->request->getPost('jenispembayaran'),
            'metode_pembayaran'   => $this->request->getPost('metode_pembayaran'),
            'jumlahbayar'       => $this->request->getPost('jumlahbayar'),
            'statuspembayaran'  => $this->request->getPost('statuspembayaran'),
            'bukti_pembayaran'  => $namaBukti
        ];

        $model->update($idpembayaran, $data);

        session()->setFlashdata(
            'success',
            'Data pembayaran berhasil diperbarui'
        );

        return redirect()->to('/datapembayaran');
    }

    public function hapus($idpembayaran)
    {
        $model = new ModelPembayaran();

        $pembayaran = $model->find($idpembayaran);

        if (!$pembayaran) {

            session()->setFlashdata(
                'error',
                'Data pembayaran tidak ditemukan'
            );

            return redirect()->to('/datapembayaran');
        }

        // Hapus file bukti pembayaran
        if (!empty($pembayaran['bukti_pembayaran'])) {

            $file = FCPATH . 'storage/fotobuktipembayaran/' . $pembayaran['bukti_pembayaran'];

            if (file_exists($file)) {
                unlink($file);
            }
        }

        // Hapus data database
        $model->delete($idpembayaran);

        session()->setFlashdata(
            'success',
            'Data pembayaran berhasil dihapus'
        );

        return redirect()->to('/datapembayaran');
    }

    public function pelangganbayar($idpesanan)
    {
        $modelPembayaran    = new ModelPembayaran();
        $modelPesanan       = new ModelPesanan();
        $modelPelanggan     = new ModelPelanggan();
        $modelDetailPesanan = new ModelDetailPesanan();

        // Ambil data pesanan
        $pesanan = $modelPesanan->find($idpesanan);

        if (!$pesanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pesanan tidak ditemukan');
        }

        // Ambil seluruh riwayat pembayaran
        $pembayaran = $modelPembayaran
            ->where('idpesanan', $idpesanan)
            ->findAll();

        // ===========================
        // Default
        // ===========================
        $mode = 'awal';

        $sudah_bayar = 0;
        $sisa_bayar  = $pesanan['total'];
        $jumlah_bayar = '';

        // ===========================
        // Cek pembayaran
        // ===========================
        foreach ($pembayaran as $row) {

            switch ($row['jenispembayaran']) {

                // ================= DP =================
                case 'DP':

                    if ($row['statuspembayaran'] == 'valid') {

                        $sudah_bayar = $row['jumlahbayar'];
                        $sisa_bayar  = $pesanan['total'] - $row['jumlahbayar'];
                        $jumlah_bayar = $sisa_bayar;

                        $mode = 'pelunasan';
                    } elseif ($row['statuspembayaran'] == 'menunggu') {

                        $mode = 'menunggu';
                    } elseif ($row['statuspembayaran'] == 'ditolak') {

                        $mode = 'awal';
                    }

                    break;


                // ================= FULL PAYMENT =================
                case 'Full Payment':

                    if ($row['statuspembayaran'] == 'valid') {

                        $sudah_bayar = $row['jumlahbayar'];
                        $sisa_bayar = 0;
                        $jumlah_bayar = 0;

                        $mode = 'selesai';
                    } elseif ($row['statuspembayaran'] == 'menunggu') {

                        $mode = 'menunggu';
                    } elseif ($row['statuspembayaran'] == 'ditolak') {

                        $mode = 'awal';
                    }

                    break;


                // ================= PELUNASAN =================
                case 'Pelunasan':

                    if ($row['statuspembayaran'] == 'valid') {

                        $sudah_bayar += $row['jumlahbayar'];
                        $sisa_bayar = 0;
                        $jumlah_bayar = 0;

                        $mode = 'selesai';
                    } elseif ($row['statuspembayaran'] == 'menunggu') {

                        $mode = 'menunggu';
                    } elseif ($row['statuspembayaran'] == 'ditolak') {

                        $jumlah_bayar = $row['jumlahbayar'];
                        $mode = 'pelunasan';
                    }

                    break;
            }
        }
        $data = [
            'pesanan'       => $pesanan,
            'pembayaran'    => $pembayaran,
            'mode'          => $mode,
            'sudah_bayar'   => $sudah_bayar,
            'sisa_bayar'    => $sisa_bayar,
            'jumlah_bayar'  => $jumlah_bayar
        ];

        return view('pelanggan/v_pembayaranpelanggan', $data);
    }

    public function simpanpelanggan()
    {
        $modelPembayaran = new ModelPembayaran();
        $modelPesanan    = new ModelPesanan();

        $idpesanan       = $this->request->getPost('idpesanan');
        $jenis           = $this->request->getPost('jenispembayaran');
        $jumlah          = $this->request->getPost('jumlahbayar');

        // Ambil data pesanan
        $pesanan = $modelPesanan->find($idpesanan);

        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        $total = $pesanan['total'];

        // ===========================
        // Validasi sesuai jenis pembayaran
        // ===========================

        if ($jenis == 'DP') {

            $minimalDP = $total * 0.3;

            if ($jumlah < $minimalDP) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Minimal DP adalah 30% dari total pesanan.');
            }

            if ($jumlah >= $total) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Jika ingin membayar penuh, pilih Full Payment.');
            }
        }

        if ($jenis == 'Full Payment') {

            if ($jumlah != $total) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Jumlah Full Payment harus sama dengan total pesanan.');
            }
        }

        if ($jenis == 'Pelunasan') {

            $dp = $modelPembayaran
                ->where('idpesanan', $idpesanan)
                ->where('jenispembayaran', 'DP')
                ->where('statuspembayaran', 'valid')
                ->first();

            if (!$dp) {

                return redirect()->back()
                    ->with('error', 'DP belum divalidasi.');
            }

            $sisa = $total - $dp['jumlahbayar'];

            if ($jumlah != $sisa) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Jumlah pelunasan harus sebesar sisa pembayaran.');
            }
        }

        // ===========================
        // Validasi upload
        // ===========================

        $rules = [

            'bukti_pembayaran' => [

                'rules' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,2048]|is_image[bukti_pembayaran]',

                'errors' => [

                    'uploaded' => 'Bukti pembayaran wajib diupload',

                    'max_size' => 'Ukuran gambar maksimal 2 MB',

                    'is_image' => 'File harus berupa gambar'

                ]

            ]

        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // ===========================
        // Upload gambar
        // ===========================

        $bukti = $this->request->getFile('bukti_pembayaran');

        $namaBukti = $bukti->getRandomName();

        $bukti->move(
            FCPATH . 'storage/fotobuktipembayaran',
            $namaBukti
        );

        // ===========================
        // Generate ID
        // ===========================

        $idpembayaran = $modelPembayaran->generateId();

        // ===========================
        // Simpan
        // ===========================

        $modelPembayaran->insert([

            'idpembayaran'      => $idpembayaran,

            'idpesanan'         => $idpesanan,

            'tanggalpembayaran' => date('Y-m-d'),

            'jenispembayaran'   => $jenis,

            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),

            'jumlahbayar'       => $jumlah,

            'statuspembayaran'  => 'menunggu_pembayaran',

            'bukti_pembayaran'  => $namaBukti

        ]);

        return redirect()->to('pesananpelanggan')
            ->with('success', 'Pembayaran berhasil dikirim dan sedang menunggu validasi admin.');
    }
}
