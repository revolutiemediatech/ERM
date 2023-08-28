<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;

class DiagnosaController extends Controller
{
    private $views      = 'perawat/diagnosa';
    private $url        = 'perawat/diagnosa';
    private $title      = 'Halaman Data Diagnosa';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mObat    = New ObatModel();
        $this->mPasien    = New PasienModel();
    }

    public function index()
    {
        $diagnosa = $this->mDiagnosa->get();
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
        $obat = $this->mObat->get();
        $pasien = $this->mPasien->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Diagnosa',
            'pasien'        => $pasien,
            'obat'          => $obat,
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

    public function destroy($id)
    {
        $diagnosa       = $this->mDiagnosa->where('id', $id)->first();
        $this->mDiagnosa->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa' . $diagnosa->nama . ' berhasil di hapus');
    }
}