<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProvinsiModel;
use App\Models\DaerahModel;
use App\Models\KecamatanModel;
use App\Models\DesaModel;

class DesaController extends Controller
{
    private $views      = 'admin/master_data/m_desa';
    private $url        = 'admin/desa';
    private $title      = 'Halaman Data Desa';
    protected $mProvinsi;
    protected $mDaerah;
    protected $mKecamatan;
    protected $mDesa;


    public function __construct()
    {
        // Di isi Construct
        $this->mProvinsi    = New ProvinsiModel();
        $this->mDaerah      = New DaerahModel();
        $this->mKecamatan   = New KecamatanModel();
        $this->mDesa        = New DesaModel();
    }

    public function index()
    {
        $desa = $this->mDesa->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Desa',
            'desa'          => $desa
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $provinsi = $this->mProvinsi->get();
        $daerah = $this->mDaerah->get();
        $kecamatan = $this->mKecamatan->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Desa',
            'provinsi'      => $provinsi,
            'daerah'        => $daerah,
            'kecamatan'     => $kecamatan,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataDesa = [
            'idMProvinsi'   => $request->idMProvinsi,
            'idMDaerah'     => $request->idMDaerah,
            'idMKecamatan'  => $request->idMKecamatan,
            'nama'          => $request->nama,
        ];
        $this->mDesa->create($dataDesa);

        return redirect("$this->url")->with('sukses', 'Data Desa berhasil di tambahkan');
    }

    public function show($id)
    {
        $desa       = $this->mDesa->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Desa',
            'Desa'      => $desa,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
         $desa           = $this->mDesa->where('id', $id)->first();
         $provinsi       = $this->mProvinsi->get();
         $daerah         = $this->mDaerah->get();
         $kecamatan      = $this->mKecamatan->get();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Desa',
            'id'        => $id,
            'desa'      => $desa,
            'provinsi'  => $provinsi,
            'daerah'    => $daerah,
            'kecamatan' => $kecamatan,
            
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataDesa       = [
            'nama'      => $request->nama,
        ];
        $this->mDesa->where('id', $id)->update($dataDesa);

        return redirect("$this->url")->with('sukses', 'Data Desa berhasil di edit');
    }

    public function destroy($id)
    {
        $desa      = $this->mDesa->where('id', $id)->first();
        $this->mDesa->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Desa ' . $desa->nama . ' berhasil di hapus');
    }
}
