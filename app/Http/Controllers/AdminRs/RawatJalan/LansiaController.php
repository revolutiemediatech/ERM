<?php

namespace App\Http\Controllers\AdminRs\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;
use App\Models\PekerjaanModel;

class LansiaController extends Controller
{
    private $views      = 'adminRs/rawat_jalan/lansia';
    private $url        = 'adminRs/rawat-jalan/lansia';
    private $title      = 'Halaman Data Lansia';
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
        $this->mPekerjaan = New PekerjaanModel();
    }

    public function index()
    {
        $wherenyaa  = [
            'idFaskes'          => session()->get('idFaskes'),
            'idMPerawatan'      => 1,
            'idMUnitPelayanan'  => 2
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Lansia',
            'pasien'        => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Pasien',
            'pasien'    => $pasien,
            'pilihanPekerjaan' => $pilihanPekerjaan,
        ];
        return view($this->views . "/show", $data);
    }

}
