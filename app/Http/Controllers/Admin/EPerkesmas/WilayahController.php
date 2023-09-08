<?php

namespace App\Http\Controllers\Admin\EPerkesmas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WilayahPerkesmasModel;
use App\Models\FaskesModel;

class WilayahController extends Controller
{
    private $views      = 'admin/eperkesmas/wilayah';
    private $url        = 'admin/wilayah-eperkesmas';
    private $title      = 'Halaman Data Wilayah E-Perkesmas';


    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $wilayah = WilayahPerkesmasModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Wilayah',
            'wilayah'         => $wilayah
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes = FaskesModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Wilayah',
            'faskes'        => $faskes
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataWilayah = [
            'idFaskes'      => $request->idFaskes,
            'idUsers'       => session()->get('users_id'),
            'nama'          => $request->nama,
            'status'        => 1,
        ];
        // echo json_encode($dataWilayah); die();
        WilayahPerkesmasModel::create($dataWilayah);

        return redirect("$this->url")->with('sukses', 'Data Wilayah E-Perkesmas berhasil di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $wilayah   = WilayahPerkesmasModel::where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Wilayah',
            'id'        => $id,
            'wilayah'   => $wilayah,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataWilayah = [
            'nama'          => $request->nama,
            'status'        => $request->status,
        ];
        WilayahPerkesmasModel::where('id', $id)->update($dataWilayah);

        return redirect("$this->url")->with('sukses', 'Data Wilayah E-Perkesmas berhasil di edit');
    }

    public function destroy($id)
    {
        $wilayah      = WilayahPerkesmasModel::where('id', $id)->first();
        WilayahPerkesmasModel::destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Wilayah E-Perkesmas ' . $wilayah->nama . ' berhasil di hapus');
    }
}
