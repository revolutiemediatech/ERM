<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProvinsiModel;
use App\Models\DaerahModel;

class DaerahController extends Controller
{
    private $views      = 'admin/master_data/m_daerah';
    private $url        = 'admin/daerah';
    private $title      = 'Halaman Data Daerah';
    protected $mProvinsi;
    protected $mDaerah;


    public function __construct()
    {
        // Di isi Construct
        $this->mProvinsi = New ProvinsiModel();
        $this->mDaerah   = New DaerahModel();
    }

    public function index()
    {
        $daerah = $this->mDaerah->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Daerah',
            'daerah'        => $daerah
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $provinsi = $this->mProvinsi->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Daerah',
            'provinsi'      => $provinsi,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataDaerah = [
            'idMProvinsi'   => $request->idMProvinsi,
            'nama'          => $request->nama,
        ];
        $this->mDaerah->create($dataDaerah);

        return redirect("$this->url")->with('sukses', 'Data Daerah berhasil di tambahkan');
    }

    public function show($id)
    {
        $daerah       = $this->mDaerah->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Daerah',
            'daerah'    => $daerah,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $daerah       = $this->mDaerah->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Daerah',
            'id'        => $id,
            'daerah'    => $daerah,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataDaerah = [
            'nama'      => $request->nama,
        ];
        $this->mDaerah->where('id', $id)->update($dataDaerah);

        return redirect("$this->url")->with('sukses', 'Data Daerah berhasil di edit');
    }

    public function destroy($id)
    {
        $daerah      = $this->mDaerah->where('id', $id)->first();
        $this->mDaerah->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Daerah ' . $daerah->nama . ' berhasil di hapus');
    }
}
