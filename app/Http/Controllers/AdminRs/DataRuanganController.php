<?php

namespace App\Http\Controllers\AdminRs;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\RuanganModel;
use App\Models\FaskesModel;

class DataRuanganController extends Controller
{
    private $views      = 'adminRs/data_ruangan';
    private $url        = 'adminRs/data_ruangan';
    private $title      = 'Halaman Data Unit/Ruangan';

    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $ruangan = RuanganModel::where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Unit/Ruangan',
            'ruangan'       => $ruangan,
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Unit/Ruangan',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataRuangan = [
            'nama'      => $request->nama,
            'idFaskes'  => session()->get('idFaskes'),
            'status'    => 1, //1: Aktif, 2: Tidak Aktif
        ];
        RuanganModel::create($dataRuangan);

        return redirect("$this->url")->with('sukses', 'Data Unit/Ruangan berhasil di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ruangan       = RuanganModel::where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Unit/Ruangan',
            'id'        => $id,
            'ruangan'   => $ruangan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataRuangan = [
            'nama'      => $request->nama,
            'status'    => $request->status, //1: Aktif, 2: Tidak Aktif
        ];
        RuanganModel::where('id', $id)->update($dataRuangan);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Unit/Ruangan berhasil di edit');
    }

    public function destroy($id)
    {
        $ruangan       = RuanganModel::where('id', $id)->first();
        RuanganModel::destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Unit/Ruangan' . $ruangan->nama . ' berhasil di hapus');
    }
}
