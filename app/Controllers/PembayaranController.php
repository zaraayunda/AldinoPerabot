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

        $data = [
            'pesanan' => $modelPesanan->findAll(),
            'detailpesanan' => $modelDetailPesanan->findAll(),
            'pembayaran' => $modelPembayaran->findAll(),
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
}
