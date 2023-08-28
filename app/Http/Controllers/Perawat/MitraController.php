<?php

namespace App\Http\Controllers\Perawat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FaskesModel;

class MitraController extends Controller
{
    
    private $views      = 'perawat/m_mitrafaskes';
    private $url        = 'perawat/mitra';
    private $title      = 'Halaman Mitra Fasilitas Kesehatan';
    protected $mFaskes;

    public function __construct()
    {
        // Di isi Construct
        $this->mFaskes = New FaskesModel();
    }

    public function index()
    {
        $faskes = $this->mFaskes->where('idFaskes', session()->get('idFaskes'))->get();

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
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
        ];
        $this->mFaskes->create($dataMitra);

        return redirect("$this->url")->with('sukses', 'Data Mitra Fasilitas Kesehatan berhasil di tambahkan');
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
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
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
