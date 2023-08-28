<?php

namespace App\Http\Controllers\Perawat\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;

class GiziController extends Controller
{
    private $views      = 'perawat/rawat_jalan/gizi';
    private $url        = 'perawat/gizi';
    private $title      = 'Halaman Data Gizi';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;
    protected $mLokasi;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mObat    = New ObatModel();
        $this->mPasien    = New PasienModel();
        $this->mUnitPelayanan = New UnitPelayananModel();
        $this->mLokasi = New LokasiModel();
    }

    public function index()
    {
        $wherenyaa  = [
            'idFaskes' => session()->get('idFaskes'),
            'idMPerawatan'      => 1,
            'idMUnitPelayanan' => 7
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Gizi',
            'pasien'      => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    // public function create()
    // {
    //     $obat = $this->mObat->get();
    //     $pasien = $this->mPasien->where('idMUnitPelayanan', 7)->get();
    //     $wherenyaa  = [
    //         'idFaskes' => session()->get('idFaskes')
    //     ];
    //     $lokasiPemeriksaan = $this->mLokasi->where($wherenyaa)->get();
    //     $unitPelayanan      = UnitPelayananModel::all();
    //     $faskes             = FaskesModel::all();
        
    //     $data = [
    //         'title'         => $this->title,
    //         'url'           => $this->url,
    //         'page'          => 'Tambah Data Diagnosa',
    //         'pasien'        => $pasien,
    //         'obat'          => $obat,
    //         'unitPelayanan'     => $unitPelayanan,
    //         'faskes'            => $faskes,
    //         'lokasiPemeriksaan' => $lokasiPemeriksaan,
    //     ];

    //     return view($this->views . "/create", $data);
    // }

    // public function store(Request $request)
    // {
    //     $dataDiagnosa = [
    //         'idMPasien'   => $request->idMPasien,
    //         'idMUsers'    => session()->get('users_id'),
    //         'idFaskes'    => $request->idFaskes,
    //         'idMObat'     => $request->idMObat,
    //         'idLokasiPemeriksaan'   => session()->get('idLokasiPemeriksaan'),
    //         'idMUnitPelayanan'     => $request->idMUnitPelayanan,
    //         'penyakit'    => $request->penyakit,
    //     ];
    //     $this->mDiagnosa->create($dataDiagnosa);

    //     return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil di tambahkan');
    // }

    public function show($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Diagnosa',
            'pasien'  => $pasien,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();
        $obat = $this->mObat->get();
        $unitPelayanan      = UnitPelayananModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = $this->mLokasi->where('idFaskes', session()->get('idFaskes'))->get();

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
            'idFaskes'              => session()->get('idFaskes'),
            // 'idMObat'               => $request->idMObat,
            'idMUnitPelayanan'      => 7,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'idTinLanjutan'         => $request->idTinLanjutan,
            'idPemPenunjang'        => $request->idPemPenunjang,
            'subjective'            => $request->subjective,
            'objective'             => $request->objective,
            'assesment'             => $request->assesment,
        ];
        // echo json_encode($dataDiagnosa); die();
        $this->mDiagnosa->where('id', $id)->create($dataDiagnosa);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil di edit');
    }

    public function destroy($id)
    {
        $diagnosa       = $this->mDiagnosa->where('id', $id)->first();
        $this->mDiagnosa->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa' . $diagnosa->nama . ' berhasil di hapus');
    }
}
