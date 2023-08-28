<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProvinsiModel;

class ProvinsiController extends Controller
{
    private $views      = 'admin/master_data/m_provinsi';
    private $url        = 'admin/provinsi';
    private $title      = 'Halaman Data Provinsi';
    protected $mProvinsi;


    public function __construct()
    {
        // Di isi Construct
        $this->mProvinsi = New ProvinsiModel();
    }

    public function index()
    {
        $provinsi = $this->mProvinsi->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Provinsi',
            'provinsi'       => $provinsi
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Provinsi',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataProvinsi = [
            'nama'      => $request->nama,
        ];
        $this->mProvinsi->create($dataProvinsi);

        return redirect("$this->url")->with('sukses', 'Data Provinsi berhasil di tambahkan');
    }

    public function show($id)
    {
        $provinsi       = $this->mProvinsi->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Provinsi',
            'provinsi'  => $provinsi,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $provinsi       = $this->mProvinsi->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Provinsi',
            'id'        => $id,
            'provinsi'  => $provinsi,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataProvinsi = [
            'nama'      => $request->nama,
        ];
        $this->mProvinsi->where('id', $id)->update($dataProvinsi);

        return redirect("$this->url")->with('sukses', 'Data Provinsi berhasil di edit');
    }

    public function destroy($id)
    {
        $provinsi       = $this->mProvinsi->where('id', $id)->first();
        $this->mProvinsi->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Provinsi' . $provinsi->nama . ' berhasil di hapus');
    }
}
