<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FaskesModel;
use App\Models\KamarModel;
use App\Models\LokasiModel;

class MitraController extends Controller
{
    public function __construct()
    {
        // $this->mFaskes         = New FaskesModel();
        // $this->mLokasi         = New LokasiModel();
        
    }

    public function getAllMitra()
    {
        $mitra = FaskesModel::get();

        $data = [
            'error_code'    => 0,
            'data'          => $mitra,
        ];
        echo json_encode($data);
    }

    public function getLokasi($idFaskes = null)
    {
        $lokasi = LokasiModel::where('idFaskes', $idFaskes)->get();

        $data = [
            'error_code'    => 0,
            'data'          => $lokasi,
        ];
        echo json_encode($data);
    }

    public function getKamar($idLokasiPemeriksaan = null)
    {
        $kamar = KamarModel::where('idLokasiPemeriksaan', $idLokasiPemeriksaan)->get();

        $data = [
            'error_code'    => 0,
            'data'          => $kamar,
        ];
        echo json_encode($data);
    }

}
