<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelPengajuanCustom;
use App\Models\ModelDetailPengajuan;
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



        // ==========================
        // CEK PELANGGAN
        // ==========================

        $iduser = session()->get('iduser');


        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();



        if (!$pelanggan) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Data pelanggan tidak ditemukan'
                );
        }



        $idpelanggan = $pelanggan['idpelanggan'];





        // ==========================
        // VALIDASI DETAIL
        // ==========================


        $namaprodukcustom =
            $this->request->getPost('namaprodukcustom');


        if (empty($namaprodukcustom)) {


            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Minimal 1 produk custom harus ditambahkan'
                );
        }





        // ==========================
        // GENERATE ID PENGAJUAN
        // ==========================


        $idpengajuan = $modelPengajuan->generateId();






        // ==========================
        // SIMPAN PENGAJUAN
        // ==========================


        $dataPengajuan = [

            'idpengajuan' =>
            $idpengajuan,

            'idpelanggan' =>
            $idpelanggan,

            'tanggalpengajuan' =>
            date('Y-m-d'),

            'statuscustom' =>
            'menunggu'

        ];




        $modelPengajuan->insert($dataPengajuan);



        if (!empty($modelPengajuan->errors())) {


            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal menyimpan data pengajuan'
                );
        }





        // ==========================
        // SIMPAN DETAIL CUSTOM
        // ==========================


        $qty =
            $this->request->getPost('qty');


        $detailcustom =
            $this->request->getPost('detailcustom');





        foreach ($namaprodukcustom as $key => $value) {



            $dataDetail = [


                'idpengajuan' =>

                $idpengajuan,



                'namaprodukcustom' =>

                $namaprodukcustom[$key],



                'qty' =>

                $qty[$key],



                'detailcustom' =>

                $detailcustom[$key],



                'fotoreferensi' =>

                '',



                'hargacustom' =>

                0


            ];




            $modelDetail->insert($dataDetail);



            if (!empty($modelDetail->errors())) {


                return redirect()->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Gagal menyimpan detail pengajuan'
                    );
            }
        }





        // ==========================
        // BERHASIL
        // ==========================


        session()->setFlashdata(
            'success',
            'Data produk berhasil diajukan, silahkan tunggu konfirmasi'
        );



        return redirect()->to('/homepage');
    }
}
