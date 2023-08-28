<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProvinsiModel;
use App\Models\DaerahModel;
use App\Models\KecamatanModel;

class KecamatanController extends Controller
{
    private $views      = 'admin/master_data/m_kecamatan';
    private $url        = 'admin/kecamatan';
    private $title      = 'Halaman Data Kecamatan';
    protected $mProvinsi;
    protected $mDaerah;
    protected $mKecamatan;


    public function __construct()
    {
        // Di isi Construct
        $this->mProvinsi    = New ProvinsiModel();
        $this->mDaerah      = New DaerahModel();
        $this->mKecamatan   = New KecamatanModel();
    }

    public function index()
    {
        $kecamatan = $this->mKecamatan->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Kecamatan',
            'kecamatan'        => $kecamatan
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $provinsi = $this->mProvinsi->get();
        $daerah = $this->mDaerah->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Kecamatan',
            'provinsi'      => $provinsi,
            'daerah'        => $daerah,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataKecamatan = [
            'idMProvinsi'   => $request->idMProvinsi,
            'idMDaerah'     => $request->idMDaerah,
            'nama'          => $request->nama,
        ];
        $this->mKecamatan->create($dataKecamatan);

        return redirect("$this->url")->with('sukses', 'Data Kecamatan berhasil di tambahkan');
    }

    public function show($id)
    {
        $kecamatan       = $this->mKecamatan->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Kecamatan',
            'kecamatan' => $kecamatan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $kecamatan       = $this->mKecamatan->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Kecamatan',
            'id'        => $id,
            'kecamatan' => $kecamatan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataKecamatan = [
            'nama'      => $request->nama,
        ];
        $this->mKecamatan->where('id', $id)->update($dataKecamatan);

        return redirect("$this->url")->with('sukses', 'Data Kecamatan berhasil di edit');
    }

    public function destroy($id)
    {
        $kecamatan       = $this->mKecamatan->where('id', $id)->first();
        $this->mKecamatan->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Kecamatan' . $kecamatan->nama . ' berhasil di hapus');
    }
}
