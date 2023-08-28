<?php

namespace App\Http\Controllers\Admin\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;

class LaboratController extends Controller
{
    private $views      = 'admin/rawat_jalan/laborat';
    private $url        = 'admin/rawat-jalan/laborat';
    private $title      = 'Halaman Data Laborat';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa        = New DiagnosaModel();
        $this->mObat            = New ObatModel();
        $this->mPasien          = New PasienModel();
        $this->mUnitPelayanan   = New UnitPelayananModel();
    }

    public function index()
    {
        $wherenyaa  = [
            'idMPerawatan'      => 1,
            'idMUnitPelayanan'  => 6
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();
        // $diagnosa = $this->mDiagnosa->where('idMUnitPelayanan', 6)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Laborat',
            'pasien'        => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $obat = $this->mObat->get();
        $pasien = $this->mPasien->where('idMUnitPelayanan', 6)->get();
        $unitPelayanan      = UnitPelayananModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Diagnosa',
            'pasien'        => $pasien,
            'obat'          => $obat,
            'unitPelayanan'     => $unitPelayanan,
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataDiagnosa = [
            'idMPasien'             => $request->idMPasien,
            'idMUsers'              => session()->get('users_id'),
            'idFaskes'              => $request->idFaskes,
            'idMObat'               => $request->idMObat,
            'idMUnitPelayanan'      => 6,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'penyakit'              => $request->penyakit,
        ];
        $this->mDiagnosa->create($dataDiagnosa);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil di tambahkan');
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

    public function edit($id)
    {
        $diagnosa           = $this->mDiagnosa->where('id', $id)->first();
        $obat               = $this->mObat->get();
        $unitPelayanan      = UnitPelayananModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Diagnosa',
            'id'                => $id,
            'diagnosa'          => $diagnosa,
            'obat'              => $obat,
            'faskes'            => $faskes,
            'unitPelayanan'     => $unitPelayanan,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataDiagnosa = [
            'idMPasien'   => $request->idMPasien,
            'idMUsers'    => session()->get('users_id'),
            'idFaskes'    => $request->idFaskes,
            'idMObat'     => $request->idMObat,
            'idMUnitPelayanan'     => 6,
            'idLokasiPemeriksaan'       => $request->idLokasiPemeriksaan,
            'penyakit'    => $request->penyakit,
        ];
        $this->mDiagnosa->where('id', $id)->update($dataDiagnosa);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil di edit');
    }

    public function destroy($id)
    {
        $diagnosa       = $this->mDiagnosa->where('id', $id)->first();
        $this->mDiagnosa->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa' . $diagnosa->nama . ' berhasil di hapus');
    }
}
