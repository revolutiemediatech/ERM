<?php

namespace App\Http\Controllers\Bidan\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;
use App\Models\LokasiModel;
use App\Models\FaskesModel;

class KIAController extends Controller
{
    private $views      = 'bidan/rawat_jalan/kia';
    private $url        = 'bidan/rawat-jalan/kia';
    private $title      = 'Halaman Data KIA, Imunisasi, dan KB';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;
    protected $mUnitPelayanan;
    protected $mCabang;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa        = New DiagnosaModel();
        $this->mObat            = New ObatModel();
        $this->mPasien          = New PasienModel();
        $this->mUnitPelayanan   = New UnitPelayananModel();
        $this->mCabang          = New LokasiModel();
    }

    public function index()
    {
        $wherenyaa  = [
            'idFaskes' => session()->get('idFaskes'),
            'idMUnitPelayanan' => 5
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data KIA, Imunisasi, dan KB',
            'pasien'      => $pasien
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

    public function edit($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $obat               = $this->mObat->get();
        $unitPelayanan      = UnitPelayananModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah RAPT Baru',
            'id'                => $id,
            'pasien'            => $pasien,
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
            'idMPasien'             => $request->idMPasien,
            'idMUsers'              => session()->get('users_id'),
            'idFaskes'              => $request->idFaskes,
            // 'idMObat'               => $request->idMObat,
            'idMUnitPelayanan'      => 5,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'idTinLanjutan'         => $request->idTinLanjutan,
            'idPemPenunjang'        => $request->idPemPenunjang,
            'subjective'            => $request->subjective,
            'objective'             => $request->objective,
            'assesment'             => $request->assesment,
        ];
        // echo json_encode($dataDiagnosa); die();
        $this->mDiagnosa->where('id', $id)->create($dataDiagnosa);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil diedit');
    }

    public function destroy($id)
    {
        $diagnosa       = $this->mDiagnosa->where('id', $id)->first();
        $this->mDiagnosa->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa' . $diagnosa->nama . ' berhasil dihapus');
    }
}