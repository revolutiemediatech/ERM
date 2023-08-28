<?php

namespace App\Http\Controllers\AdminRs\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;

class LaboratController extends Controller
{
    private $views      = 'adminRs/rawat_jalan/laborat';
    private $url        = 'adminRs/rawat-jalan/laborat';
    private $title      = 'Halaman Data Laborat';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mObat    = New ObatModel();
        $this->mPasien    = New PasienModel();
        $this->mUnitPelayanan = New UnitPelayananModel();
    }

    public function index()
    {
        $wherenyaa  = [
            'idFaskes'          => session()->get('idFaskes'),
            'idMPerawatan'      => 1,
            'idMUnitPelayanan'  => 6
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Laborat',
            'pasien'        => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Pasien',
            'pasien'    => $pasien,
        ];
        return view($this->views . "/show", $data);
    }

}
