<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\SekolahModel;
use App\Models\DaerahModel;
use App\Models\KecamatanModel;
use App\Models\ProvinsiModel;


class SekolahController extends Controller
{
    private $views      = 'admin/sekolah';
    private $url        = 'admin/sekolah';
    private $title      = 'Halaman Data Sekolah';
    protected $mBed;
    protected $mKamar;

    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $sekolah = SekolahModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Sekolah',
            'sekolah'       => $sekolah
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $provinsi   = ProvinsiModel::all();
        $daerah     = DaerahModel::all();
        $kecamatan  = KecamatanModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Sekolah',
            'provinsi'          => $provinsi,
            'daerah'            => $daerah,
            'kecamatan'         => $kecamatan,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataSekolah = [
            'nama'                  => $request->nama,
            'alamat'                => $request->alamat,
            'idMProvinsi'           => $request->idMProvinsi,
            'idMDaerah'             => $request->idMDaerah,
            'idMKecamatan'          => $request->idMKecamatan,
        ];
        SekolahModel::create($dataSekolah);

        return redirect("$this->url")->with('sukses', 'Data Sekolah berhasil di tambahkan');
    }

    public function show($id)
    {
        $sekolah       = SekolahModel::where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Sekolah',
            'sekolah'   => $sekolah,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $sekolah       = SekolahModel::where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Sekolah',
            'id'        => $id,
            'sekolah'   => $sekolah,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataSekolah = [
            'nama'                  => $request->nama,
            'alamat'                => $request->alamat,
        ];
        SekolahModel::where('id', $id)->update($dataSekolah);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Sekolah berhasil di edit');
    }

    public function destroy($id)
    {
        $sekolah       = SekolahModel::where('id', $id)->first();
        SekolahModel::destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Sekolah' . $sekolah->nama . ' berhasil di hapus');
    }
}
