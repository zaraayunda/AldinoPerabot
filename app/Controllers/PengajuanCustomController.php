<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelPengajuanCustom;
use App\Models\ModelDetailPengajuan;
use App\Models\ModelPesanan;
use App\Models\ModelDetailPesanan;
use App\Models\ModelPengguna;
use App\Models\ModelPelanggan;
use App\Models\ModelProduk;

class PengajuanCustomController extends BaseController
{
    public function index()
    {
        $modelPengguna = new ModelPengguna();
        $modelPelanggan = new ModelPelanggan();
        $modelPengajuan = new ModelPengajuanCustom();

        $iduser = session()->get('iduser');
        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        $data = [
            'idpengajuan' => $modelPengajuan->generateId(),
            'user' => $modelPengguna->find($iduser),
            'pelanggan' => $pelanggan
        ];

        return view('pelanggan/customproduk', $data);
    }

    public function simpan()
    {
        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();
        $modelPelanggan = new ModelPelanggan();

        $db = \Config\Database::connect();
        $db->transBegin();

        try {

            // Ambil data pelanggan
            $iduser = session()->get('iduser');

            $pelanggan = $modelPelanggan
                ->where('iduser', $iduser)
                ->first();

            if (!$pelanggan) {
                return redirect()->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Data pelanggan tidak ditemukan.'
                    );
            }

            $idpelanggan = $pelanggan['idpelanggan'];

            // Ambil data form
            $namaprodukcustom = $this->request->getPost('namaprodukcustom') ?? [];
            $qty = $this->request->getPost('qty') ?? [];
            $detailcustom = $this->request->getPost('detailcustom') ?? [];

            // Validasi minimal 1 produk
            if (count($namaprodukcustom) === 0) {

                return redirect()->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Minimal 1 produk custom harus ditambahkan.'
                    );
            }

            // Generate id pengajuan
            $idpengajuan = $modelPengajuan->generateId();

            $dataPengajuan = [
                'idpengajuan' => $idpengajuan,
                'idpelanggan' => $idpelanggan,
                'tanggalpengajuan' => date('Y-m-d'),
                'statuscustom' => 'menunggu'
            ];

            $modelPengajuan->insert($dataPengajuan);

            // Ambil file upload
            $fotos = $this->request->getFiles();

            foreach ($namaprodukcustom as $key => $namaProduk) {

                // Lewati card kosong
                if (trim($namaProduk) == '') {
                    continue;
                }

                $namaFoto = '';

                // Upload foto
                if (
                    isset($fotos['fotoreferensi'][$key])
                ) {

                    $foto = $fotos['fotoreferensi'][$key];

                    if (
                        $foto->isValid() &&
                        !$foto->hasMoved()
                    ) {

                        $namaFoto = $foto->getRandomName();

                        $foto->move(
                            FCPATH . 'storage/fotocustom',
                            $namaFoto
                        );
                    }
                }

                // Simpan detail
                $dataDetail = [

                    'idpengajuan' => $idpengajuan,

                    'namaprodukcustom' =>
                    trim($namaProduk),

                    'qty' =>
                    isset($qty[$key])
                        ? (int)$qty[$key]
                        : 1,

                    'detailcustom' =>
                    isset($detailcustom[$key])
                        ? trim($detailcustom[$key])
                        : '',

                    'fotoreferensi' =>
                    $namaFoto,

                    'hargacustom' => 0
                ];

                $modelDetail->insert($dataDetail);
            }

            if ($db->transStatus() === false) {

                $db->transRollback();

                return redirect()->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Data gagal disimpan.'
                    );
            }

            $db->transCommit();

            return redirect()
                ->to('/homepage')
                ->with(
                    'success',
                    'Data produk berhasil diajukan, silahkan tunggu konfirmasi admin. Anda dapat memantau proses pengajuan melalui menu "Pengajuan Custom".'
                );
        } catch (\Exception $e) {

            $db->transRollback();

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }

    public function datapengajuan()
    {
        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();
        $modelPelanggan = new ModelPelanggan();

        $data = [
            'pengajuan' => $modelPengajuan->findAll(),
            'detailpengajuan' => $modelDetail->findAll(),
            'pelanggan' => $modelPelanggan->findAll()
        ];

        return view('datatransaksi/v_datapengajuancustom', $data);
    }

    // public function updateStatus()
    // {
    //     $model = new ModelPengajuanCustom();
    //     $modelDetail = new ModelDetailPengajuan();

    //     $idpengajuan = $this->request->getPost('idpengajuan');
    //     $status = $this->request->getPost('statuscustom');

    //     // Cek apakah masih ada harga yang 0
    //     $cekHarga = $modelDetail
    //         ->where('idpengajuan', $idpengajuan)
    //         ->where('hargacustom', 0)
    //         ->countAllResults();

    //     if ($cekHarga > 0) {
    //         return $this->response->setJSON([
    //             'success' => false,
    //             'message' => 'Harga penawaran untuk produk custom ini belum ditentukan. Mohon lengkapi harga terlebih dahulu.'
    //         ]);
    //     }

    //     $model->update(
    //         $idpengajuan,
    //         [
    //             'statuscustom' => $status
    //         ]
    //     );

    //     return $this->response->setJSON([
    //         'success' => true,
    //         'message' => 'Status pengajuan berhasil diperbarui.'
    //     ]);
    // }

    public function edit($idpengajuan)
    {
        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();
        $modelPelanggan = new ModelPelanggan();

        $pengajuan = $modelPengajuan
            ->where('idpengajuan', $idpengajuan)
            ->first();

        if (!$pengajuan) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data pengajuan tidak ditemukan'
            );
        }

        $pelanggan = $modelPelanggan
            ->where('idpelanggan', $pengajuan['idpelanggan'])
            ->first();

        $detailpengajuan = $modelDetail
            ->where('idpengajuan', $idpengajuan)
            ->findAll();

        $data = [
            'pengajuan' => $pengajuan,
            'pelanggan' => $pelanggan,
            'detailpengajuan' => $detailpengajuan
        ];

        return view(
            'datatransaksi/editpengajuancustom',
            $data
        );
    }

    public function updateHarga()
    {
        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();

        $idpengajuan = $this->request->getPost('idpengajuan');

        $iddetail = $this->request->getPost('iddetailcustom');
        $hargacustom = $this->request->getPost('hargacustom');

        foreach ($iddetail as $key => $id) {

            $modelDetail->update($id, [
                'hargacustom' => $hargacustom[$key]
            ]);
        }

        // Ubah status pengajuan menjadi penawaran_harga
        $modelPengajuan->update($idpengajuan, [
            'statuscustom' => 'penawaran_harga'
        ]);

        session()->setFlashdata(
            'success',
            'Penawaran harga berhasil disimpan.'
        );

        return redirect()->to('/datapengajuan');
    }

    public function hapus($idpengajuan)
    {
        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();

        $detail = $modelDetail
            ->where('idpengajuan', $idpengajuan)
            ->findAll();

        foreach ($detail as $d) {

            if (!empty($d['fotoreferensi'])) {

                $path = FCPATH .
                    'storage/fotocustom/' .
                    $d['fotoreferensi'];

                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $modelPengajuan->delete($idpengajuan);

        session()->setFlashdata(
            'success',
            'Data pengajuan berhasil dihapus.'
        );

        return redirect()->to('/datapengajuan');
    }

    public function pengajuancustom()
    {
        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();
        $modelPelanggan = new ModelPelanggan();

        $iduser = session()->get('iduser');

        if (!$iduser) {

            return redirect()->to('/login');
        }

        // Ambil data pelanggan login
        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        if (!$pelanggan) {

            return redirect()->back()
                ->with(
                    'error',
                    'Data pelanggan tidak ditemukan'
                );
        }

        // Ambil semua pengajuan milik pelanggan
        $pengajuan = $modelPengajuan
            ->where(
                'idpelanggan',
                $pelanggan['idpelanggan']
            )
            ->orderBy(
                'tanggalpengajuan',
                'DESC'
            )
            ->findAll();

        // Ambil detail setiap pengajuan
        foreach ($pengajuan as &$row) {

            $detail = $modelDetail
                ->where(
                    'idpengajuan',
                    $row['idpengajuan']
                )
                ->findAll();

            $totalPenawaran = 0;
            $jumlahProduk = 0;

            foreach ($detail as &$item) {

                $subtotal =
                    $item['qty']
                    * $item['hargacustom'];

                $item['subtotal'] = $subtotal;

                $totalPenawaran += $subtotal;

                $jumlahProduk++;
            }

            $row['detail'] = $detail;

            $row['total_penawaran'] =
                $totalPenawaran;

            $row['jumlah_produk'] =
                $jumlahProduk;
        }

        $data = [

            'pengajuan' => $pengajuan

        ];

        return view(
            'pelanggan/v_pengajuancustom',
            $data
        );
    }

    public function customsetuju($idpengajuan)
    {
        $db = \Config\Database::connect();

        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();
        $modelPelanggan = new ModelPelanggan();
        $modelProduk = new ModelProduk();
        $modelPesanan = new ModelPesanan();
        $modelDetailPesanan = new ModelDetailPesanan();

        $iduser = session()->get('iduser');

        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        if (!$pelanggan) {

            session()->setFlashdata(
                'error',
                'Data pelanggan tidak ditemukan.'
            );

            return redirect()->back();
        }

        $idpelanggan = $pelanggan['idpelanggan'];

        $pengajuan = $modelPengajuan
            ->where('idpengajuan', $idpengajuan)
            ->first();

        if (!$pengajuan) {

            session()->setFlashdata(
                'error',
                'Data pengajuan tidak ditemukan.'
            );

            return redirect()->back();
        }

        $detailPengajuan = $modelDetail
            ->where('idpengajuan', $idpengajuan)
            ->findAll();

        if (empty($detailPengajuan)) {

            session()->setFlashdata(
                'error',
                'Detail pengajuan tidak ditemukan.'
            );

            return redirect()->back();
        }

        try {

            $db->transStart();

            $idpesanan =
                $modelPesanan->generateId();

            /*
        |--------------------------------------------------
        | Simpan Pesanan Dulu
        |--------------------------------------------------
        */
            $modelPesanan->insert([

                'idpesanan' => $idpesanan,
                'idpelanggan' => $idpelanggan,
                'tanggalpesanan' => date('Y-m-d'),
                'biayaantar' => null,
                'total' => 0,
                'estimasiwaktu' => null,
                'statuspesanan' => 'dikonfirmasi'

            ]);

            $totalharga = 0;

            /*
        |--------------------------------------------------
        | Loop Detail Pengajuan
        |--------------------------------------------------
        */
            foreach ($detailPengajuan as $detail) {

                $idproduk =
                    $modelProduk->generateId();

                $subtotal =
                    $detail['qty'] *
                    $detail['hargacustom'];

                /*
            |----------------------------------------------
            | Simpan Produk Custom
            |----------------------------------------------
            */
                $modelProduk->insert([

                    'idproduk' => $idproduk,

                    'idkategori' => null,

                    'namaproduk' =>
                    $detail['namaprodukcustom'],

                    'jenisproduk' => 'custom',

                    'harga' =>
                    $detail['hargacustom'],

                    'detailproduk' =>
                    $detail['detailcustom'],

                    'foto' =>'',

                    'statusproduk' => 'nonaktif'

                ]);

                /*
            |----------------------------------------------
            | Simpan Detail Pesanan
            |----------------------------------------------
            */
                $modelDetailPesanan->insert([

                    'idpesanan' => $idpesanan,

                    'idproduk' => $idproduk,

                    'qty' => $detail['qty'],

                    'harga' =>
                    $detail['hargacustom'],

                    'subtotal' =>
                    $subtotal

                ]);

                $totalharga += $subtotal;
            }

            /*
        |--------------------------------------------------
        | Update Total Harga Pesanan
        |--------------------------------------------------
        */
            $modelPesanan->update(
                $idpesanan,
                [
                    'total' => $totalharga
                ]
            );

            /*
        |--------------------------------------------------
        | Update Status Pengajuan
        |--------------------------------------------------
        */
            $modelPengajuan->update(
                $idpengajuan,
                [
                    'statuscustom' => 'disetujui'
                ]
            );

            $db->transComplete();

            if ($db->transStatus() === false) {

                throw new \Exception(
                    'Gagal menyimpan data.'
                );
            }

            session()->setFlashdata(
                'success',
                'Penawaran harga berhasil disetujui. Pesanan Anda telah masuk dan dapat dipantau melalui menu Pesanan Saya.'
            );

            return redirect()->to(
                '/pengajuan-custom'
            );
        } catch (\Exception $e) {

            $db->transRollback();

            session()->setFlashdata(
                'error',
                $e->getMessage()
            );

            return redirect()->back();
        }
    }

    public function custombatal($idpengajuan)
    {
        $modelPengajuan = new ModelPengajuanCustom();

        $modelPengajuan->update($idpengajuan, [
            'statuscustom' => 'batal'
        ]);

        session()->setFlashdata(
            'success',
            'Anda telah membatalkan pengajuan ini.'
        );

        return redirect()->to('/pengajuan-custom');
    }
    public function batalkanpengajuan($idpengajuan)
    {
        $modelPengajuan = new ModelPengajuanCustom();

        $modelPengajuan->update($idpengajuan, [
            'statuscustom' => 'batal'
        ]);

        session()->setFlashdata(
            'success',
            'Anda telah membatalkan pengajuan ini.'
        );

        return redirect()->to('/pengajuan-custom');
    }
}
