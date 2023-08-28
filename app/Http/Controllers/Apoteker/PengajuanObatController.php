<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\ObatModel;
use App\Models\FaskesModel;
use App\Models\DaerahModel;
use App\Models\DesaModel;
use App\Models\KecamatanModel;
use App\Models\ProvinsiModel;
use App\Models\UserModel;
use App\Models\LokasiModel;
use App\Models\GoldarModel;
use App\Models\JenisKelaminModel;
use App\Models\JenisPasienModel;
use App\Models\KunjunganModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikanModel;
use App\Models\PerawatanModel;
use App\Models\UnitPelayananModel;
use App\Models\BedModel;
use App\Models\KamarModel;

class PengajuanObatController extends Controller
{
    private $views      = 'apoteker/pengajuan_obat';
    private $url        = 'apoteker/pengajuan-obat';
    private $title      = 'Halaman Data Pasien Pegajuan Obat';
    protected $mDiagnosa;
    protected $mPasien;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mObat        = New ObatModel();
        $this->mPasien      = New PasienModel();
    }

    public function index()
    {
        $wherenyaa = [
            'idFaskes'          => session()->get('idFaskes'),
            'idTinLanjutan'     => 1,
            'idPemPenunjang'    => 1,
        ];
        $diagnosa = $this->mDiagnosa->where($wherenyaa)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pasien Pengajuan Obat',
            'diagnosa'        => $diagnosa,
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $diagnosa           = $this->mDiagnosa->where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Detail Data Pasien',
            'diagnosa'        => $diagnosa,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $diagnosa           = $this->mDiagnosa->where('id', $id)->first();
        $obat               = $this->mObat->where('status', 1)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Input Obat Pasien',
            'id'                => $id,
            'diagnosa'          => $diagnosa,
            'obat'              => $obat,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataDiagnosa = [
            'idMObat'               => $request->idMObat,
        ];
        // echo json_encode($dataDiagnosa); die();
        $this->mDiagnosa->where('id', $id)->update($dataDiagnosa);

        return redirect("$this->url")->with('sukses', 'Data Obat berhasil di Tambahkan');
    }

}
