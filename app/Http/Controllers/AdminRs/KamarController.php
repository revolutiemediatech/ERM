<?php

namespace App\Http\Controllers\AdminRs;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\KamarModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;

class KamarController extends Controller
{
    private $views      = 'adminRs/kamar';
    private $url        = 'adminRs/kamar';
    private $title      = 'Halaman Data Kamar';

    public function __construct()
    {
        // Di isi Construct
        $this->mKamar = New KamarModel();
    }

    public function index()
    {
        $kamar = $this->mKamar->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Kamar',
            'kamar'         => $kamar
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Kamar',
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataKamar = [
            'nama'                  => $request->nama,
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
        ];
        $this->mKamar->create($dataKamar);

        return redirect("$this->url")->with('sukses', 'Data Kamar berhasil di tambahkan');
    }

    public function show($id)
    {
        $kamar       = $this->mKamar->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Kamar',
            'kamar'     => $kamar,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $kamar       = $this->mKamar->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Kamar',
            'id'        => $id,
            'kamar'     => $kamar,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataKamar = [
            'nama'                  => $request->nama,
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
        ];
        $this->mKamar->where('id', $id)->update($dataKamar);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Kamar berhasil di edit');
    }

    public function destroy($id)
    {
        $kamar       = $this->mKamar->where('id', $id)->first();
        $this->mKamar->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Kamar' . $kamar->nama . ' berhasil di hapus');
    }
}
