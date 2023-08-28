<?php

namespace App\Http\Controllers\Bidan\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;
use App\Models\LokasiModel;

class UGDController extends Controller
{
    private $views      = 'bidan/rawat_jalan/ugd';
    private $url        = 'bidan/ugd';
    private $title      = 'Halaman Data UGD';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;
    protected $mUnitPelayanan;
    protected $mCabang;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mObat    = New ObatModel();
        $this->mPasien    = New PasienModel();
        $this->mUnitPelayanan = New UnitPelayananModel();
        $this->mCabang = New LokasiModel();
    }

    public function index()
    {
        $wherenyaa  = [
            'idFaskes' => session()->get('idFaskes'),
            'idMUnitPelayanan' => 3
        ];
        $diagnosa = $this->mDiagnosa->where($wherenyaa)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data UGD',
            'diagnosa'      => $diagnosa
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $wherenyaa  = [
            'idFaskes' => session()->get('idFaskes'),
            'idMUnitPelayanan' => 3
        ];
        $obat = $this->mObat->get();
        $pasien = $this->mPasien->where($wherenyaa)->get();
        $cabang = $this->mCabang->where('idFaskes', session()->get('idFakses'),)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Diagnosa',
            'pasien'        => $pasien,
            'obat'          => $obat,
            'cabang'        => $cabang,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataDiagnosa = [
            'idMPasien'   => $request->idMPasien,
            'idMUsers'    => session()->get('users_id'),
            'idMObat'     => $request->idMObat,
            'penyakit'    => $request->penyakit,
            'idFaskes'    => session()->get('idFaskes'),
            'idMUnitPelayanan'    => 3,
            'idLokasiPemeriksaan'    => $request->idLokasiPemeriksaan,
        ];
        $this->mDiagnosa->create($dataDiagnosa);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil ditambahkan');
    }

    public function show($id)
    {
        $diagnosa       = $this->mDiagnosa->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Diagnosa',
            'diagnosa'  => $diagnosa,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $diagnosa       = $this->mDiagnosa->where('id', $id)->first();
        $obat = $this->mObat->get();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Diagnosa',
            'id'        => $id,
            'diagnosa'  => $diagnosa,
            'obat'      => $obat,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataDiagnosa = [
            'penyakit'    => $request->penyakit,
        ];
        $this->mDiagnosa->where('id', $id)->update($dataDiagnosa);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil diedit');
    }

    public function destroy($id)
    {
        $diagnosa       = $this->mDiagnosa->where('id', $id)->first();
        $this->mDiagnosa->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa' . $diagnosa->nama . ' berhasil dihapus');
    }
}