<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PendidikanModel;

class PendidikanController extends Controller
{
    private $views      = 'admin/master_data/m_pendidikan';
    private $url        = 'admin/pendidikan';
    private $title      = 'Halaman Data Pendidikan';
    protected $mFaskes;
    protected $mPendidikan;

    public function __construct()
    {
        // Di isi Construct
        $this->mPendidikan = New PendidikanModel();
    }

    public function index()
    {
        $pendidikan = $this->mPendidikan->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Pendidikan',
            'pendidikan'        => $pendidikan
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Pendidikan',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataPendidikan = [
            'nama'      => $request->nama,
        ];
        $this->mPendidikan->create($dataPendidikan);

        return redirect("$this->url")->with('sukses', 'Data Pendidikan berhasil di tambahkan');
    }

    public function show($id)
    {
        $pendidikan       = $this->mPendidikan->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Pendidikan',
            'pendidikan'    => $pendidikan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pendidikan       = $this->mPendidikan->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Pendidikan',
            'id'        => $id,
            'pendidikan'    => $pendidikan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataPendidikan = [
            'nama'      => $request->nama,
        ];
        $this->mPendidikan->where('id', $id)->update($dataPendidikan);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Pendidikan berhasil di edit');
    }

    public function destroy($id)
    {
        $pendidikan       = $this->mPendidikan->where('id', $id)->first();
        $this->mPendidikan->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Pendidikan' . $pendidikan->nama.  ' berhasil di hapus');
    }
}
