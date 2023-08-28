<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\BedModel;
use App\Models\KamarModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;

class BedController extends Controller
{
    private $views      = 'admin/bed';
    private $url        = 'admin/bed';
    private $title      = 'Halaman Data Bed Kamar';
    protected $mBed;
    protected $mKamar;

    public function __construct()
    {
        // Di isi Construct
        $this->mBed = New BedModel();
        $this->mKamar = New KamarModel();
    }

    public function index()
    {
        $bed = $this->mBed->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Bed',
            'bed'           => $bed
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $kamar              = KamarModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Bed',
            'kamar'             => $kamar,
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataBed = [
            'nama'                  => $request->nama,
            'idKamar'               => $request->idKamar,
            'idFaskes'              => $request->idFaskes,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
        ];
        $this->mBed->create($dataBed);

        return redirect("$this->url")->with('sukses', 'Data Bed berhasil di tambahkan');
    }

    public function show($id)
    {
        $bed       = $this->mBed->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Bed',
            'bed'       => $bed,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $bed       = $this->mBed->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Bed',
            'id'        => $id,
            'bed'       => $bed,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataBed = [
            'nama'                  => $request->nama,
        ];
        $this->mBed->where('id', $id)->update($dataBed);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Bed berhasil di edit');
    }

    public function destroy($id)
    {
        $bed       = $this->mBed->where('id', $id)->first();
        $this->mBed->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Bed' . $bed->nama . ' berhasil di hapus');
    }
}
