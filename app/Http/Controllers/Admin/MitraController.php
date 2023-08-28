<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FaskesModel;

class MitraController extends Controller
{
    
    private $views      = 'admin/master_data/m_mitrafaskes';
    private $url        = 'admin/mitra';
    private $title      = 'Halaman Mitra Fasilitas Kesehatan';
    protected $mFaskes;

    public function __construct()
    {
        // Di isi Construct
        $this->mFaskes = New FaskesModel();
    }

    public function index()
    {
        $faskes = $this->mFaskes->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Mitra Fasilitas Kesehatan',
            'faskes'        => $faskes
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Mitra Fasilitas Kesehatan',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataMitra = [
            'nama'              => $request->nama,
            'idMProvinsi'       => $request->idMProvinsi,
            'idMDaerah'         => $request->idMDaerah,
            'idMKecamatan'      => $request->idMKecamatan,
            'idMDesa'           => $request->idMDesa,
            'alamat'            => $request->alamat,
            'email'             => $request->email,
            'no_hp'             => $request->no_hp,
        ];
        // echo json_encode($dataMitra); die();
        $this->mFaskes->create($dataMitra);

        return redirect("$this->url")->with('sukses', 'Data Mitra Fasilitas Kesehatan berhasil di Tambahkan');
    }

    public function show($id)
    {
        $faskes       = $this->mFaskes->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Mitra Fasilitas Kesehatan',
            'faskes'    => $faskes,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $faskes       = $this->mFaskes->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Mitra Fasilitas Kesehatan',
            'id'        => $id,
            'faskes'    => $faskes,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataMitra = [
            'nama'              => $request->nama,
            'idMProvinsi'       => $request->idMProvinsi,
            'idMDaerah'         => $request->idMDaerah,
            'idMKecamatan'      => $request->idMKecamatan,
            'idMDesa'           => $request->idMDesa,
            'alamat'            => $request->alamat,
            'email'             => $request->email,
            'no_hp'             => $request->no_hp,
        ];
        $this->mFaskes->where('id', $id)->update($dataMitra);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Mitra Fasilitas Kesehatan berhasil di edit');
    }

    public function destroy($id)
    {
        $faskes       = $this->mFaskes->where('id', $id)->first();
        $this->mFaskes->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Mitra Fasilitas Kesehatan' . $faskes->nama . ' berhasil di hapus');
    }
}
