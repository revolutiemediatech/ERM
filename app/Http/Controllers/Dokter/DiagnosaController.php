<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;

class DiagnosaController extends Controller
{
    private $views      = 'dokter/diagnosa';
    private $url        = 'dokter/diagnosa';
    private $title      = 'Halaman Data Diagnosa';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;
    protected $mUnitPelayanan;


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
        $where = [
            'idFaskes' => session()->get('idFaskes'),
        ];
        $diagnosa = $this->mDiagnosa->where($where)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Diagnosa',
            'diagnosa'      => $diagnosa
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $where = [
            'idFaskes' => session()->get('idFaskes'),
        ];
        $obat = $this->mObat->where('idFaskes', session()->get('idFaskes'))->get();
        $pasien = $this->mPasien->where($where)->get();
        $unitPelayanan = $this->mUnitPelayanan->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Diagnosa',
            'pasien'        => $pasien,
            'obat'          => $obat,
            'unitPelayanan' => $unitPelayanan,
        ];
        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataDiagnosa = [
            'idMPasien'         => $request->idMPasien,
            'idMUsers'          => session()->get('users_id'),
            'idMObat'           => $request->idMObat,
            'idFaskes'          => session()->get('idFaskes'),
            'penyakit'          => $request->penyakit,
            'idMUnitPelayanan'  => $request->idMUnitPelayanan,
        ];
        $this->mDiagnosa->create($dataDiagnosa);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil di tambahkan');
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

        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil di edit');
    }

    // public function destroy($id)
    // {
    //     $diagnosa       = $this->mDiagnosa->where('id', $id)->first();
    //     $this->mDiagnosa->destroy($id);

    //     return redirect("$this->url")->with('sukses', 'Data Diagnosa' . $diagnosa->nama . ' berhasil di hapus');
    // }
}
