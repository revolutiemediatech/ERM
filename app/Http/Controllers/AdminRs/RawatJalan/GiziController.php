<?php

namespace App\Http\Controllers\AdminRs\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;
use App\Models\PekerjaanModel;

class GiziController extends Controller
{
    private $views      = 'adminRs/rawat_jalan/gizi';
    private $url        = 'adminRs/rawat-jalan/gizi';
    private $title      = 'Halaman Data Gizi';
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
            'idMUnitPelayanan'  => 7
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Gizi',
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
