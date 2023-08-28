<?php

namespace App\Http\Controllers\Perawat\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BedModel;
use App\Models\KamarModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;
use App\Models\DiagnosaModel;
use App\Models\PasienModel;;

class PasienInapController extends Controller
{
    private $views      = 'perawat/rawat_inap';
    private $url        = 'perawat/rawat-inap/pasien';
    private $title      = 'Halaman Data Pasien Rawat Inap';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;
    protected $mBed;
    protected $mKamar;
    protected $mLokasi;
    protected $mFaskes;


    public function __construct()
    {
        // Di isi Construct
        $this->mBed         = New BedModel();
        $this->mKamar       = New KamarModel();
        $this->mFaskes      = New FaskesModel();
        $this->mLokasi      = New LokasiModel();
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mPasien      = New PasienModel();
    }

    public function index()
    {
        $pasien             = $this->mPasien->where('idMPerawatan', 2)->get();
        $kamar              = KamarModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        // $diagnosa = $this->mDiagnosa->where('idMUnitPelayanan', 1)->get();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Halaman Data Pasien Rawat Inap',
            'pasien'            => $pasien,
            'kamar'             => $kamar,
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $obat               = $this->mObat->get();
        $pasien             = $this->mPasien->where('idMUnitPelayanan', 1)->get();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Diagnosa',
            'pasien'            => $pasien,
            'obat'              => $obat,
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
            'idMUnitPelayanan'      => 1,
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
        $pasien             = $this->mPasien->where('id', $id)->first();
        $obat               = $this->mObat->get();
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
            'idMUnitPelayanan'      => 1,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'idTinLanjutan'         => $request->idTinLanjutan,
            'idPemPenunjang'        => $request->idPemPenunjang,
            'subjective'            => $request->subjective,
            'objective'             => $request->objective,
            'assesment'             => $request->assesment,
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
