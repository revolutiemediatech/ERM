<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BedModel;
use App\Models\KamarModel;

class KamarController extends Controller
{
    protected $mKamar;
    protected $mBed;

    public function __construct()
    {
        $this->mBed         = New BedModel();
        $this->mKamar       = New KamarModel();
    }

    public function getAllKamar()
    {
        $kamar = $this->mKamar->where()->get();

        $data = [
            'error_code'    => 0,
            'data'          => $kamar,
        ];
        echo json_encode($data);
    }

    public function getKamar($idLokasiPemeriksaan = null)
    {
        $kamar = $this->mKamar->where('idLokasiPemeriksaan', $idLokasiPemeriksaan)->get();

        $data = [
            'error_code'    => 0,
            'data'          => $kamar,
        ];
        echo json_encode($data);
    }

    public function getBed($idKamar = null)
    {
        $bed = $this->mBed->where('idKamar', $idKamar)->get();

        $data = [
            'error_code'    => 0,
            'data'          => $bed,
        ];
        echo json_encode($data);
    }

}
