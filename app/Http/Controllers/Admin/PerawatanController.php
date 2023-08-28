<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PerawatanModel;

class PerawatanController extends Controller
{
    private $views      = 'admin/master_data/m_perawatan';
    private $url        = 'admin/perawatan';
    private $title      = 'Halaman Data Perawatan';
    protected $mPerawatan;

    public function __construct()
    {
        // Di isi Construct
        $this->mPerawatan = New PerawatanModel();
    }

    public function index()
    {
        $perawatan = $this->mPerawatan->get();

        $data = [
            'title'            => $this->title,
            'url'              => $this->url,
            'page'             => 'Data Perawatan',
            'perawatan'        => $perawatan
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Perawatan',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataPerawatan = [
            'nama'      => $request->nama,
        ];
        $this->mPerawatan->create($dataPerawatan);

        return redirect("$this->url")->with('sukses', 'Data Perawatan berhasil di tambahkan');
    }

    public function show($id)
    {
        $perawatan       = $this->mPerawatan->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Perawatan',
            'perawatan' => $perawatan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $perawatan       = $this->mPerawatan->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Perawatan',
            'id'        => $id,
            'perawatan' => $perawatan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataPerawatan = [
            'nama'      => $request->nama,
        ];
        $this->mPerawatan->where('id', $id)->update($dataPerawatan);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Perawatan berhasil di edit');
    }

    public function destroy($id)
    {
        $perawatan       = $this->mPerawatan->where('id', $id)->first();
        $this->mPerawatan->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Perawatan' . $perawatan->nama . ' berhasil di hapus');
    }
}