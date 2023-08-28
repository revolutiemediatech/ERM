<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FaskesModel;
use App\Models\LokasiModel;

class MitraController extends Controller
{
    public function __construct()
    {
        $this->mFaskes         = New FaskesModel();
        $this->mLokasi         = New LokasiModel();
        
    }

    public function getAllMitra()
    {
        $mitra = $this->mFaskes->get();

        $data = [
            'error_code'    => 0,
            'data'          => $mitra,
        ];
        echo json_encode($data);
    }

    public function getLokasi($idFaskes = null)
    {
        $lokasi = $this->mLokasi->where('idFaskes', $idFaskes)->get();

        $data = [
            'error_code'    => 0,
            'data'          => $lokasi,
        ];
        echo json_encode($data);
    }

}
