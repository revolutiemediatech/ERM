<?php

namespace App\Http\Controllers\Dokter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\ObatModel;

class PengajuanObatController extends Controller
{
    private $views      = 'dokter/pengajuan_obat';
    private $url        = 'dokter/pengajuan-obat';
    private $title      = 'Halaman Data Pasien Pegajuan Obat';
    protected $mDiagnosa;
    protected $mPasien;
    protected $mObat;


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
            'diagnosa'      => $diagnosa
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
            'diagnosa'      => $diagnosa,
        ];
        return view($this->views . "/show", $data);
    }

}
