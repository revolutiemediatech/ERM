<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PekerjaanModel;

class PekerjaanController extends Controller
{
    
    private $views      = 'admin/master_data/m_pekerjaan';
    private $url        = 'admin/pekerjaan';
    private $title      = 'Halaman Pekerjaan';
    protected $mPekerjaan;

    public function __construct()
    {
        // Di isi Construct
        $this->mPekerjaan = New PekerjaanModel();
    }

    public function index()
    {
        $pekerjaan = $this->mPekerjaan->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data Pekerjaan',
            'pekerjaan'       => $pekerjaan
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Pekerjaan',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataPekerjaan = [
            'nama'      => $request->nama,
        ];
        $this->mPekerjaan->create($dataPekerjaan);

        return redirect("$this->url")->with('sukses', 'Data Pekerjaan berhasil di tambahkan');
    }

    public function show($id)
    {
        $pekerjaan       = $this->mPekerjaan->where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Pekerjaan',
            'pekerjaan'   => $pekerjaan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pekerjaan       = $this->mPekerjaan->where('id', $id)->first();

        $data = [
            'title'      => $this->title,
            'url'        => $this->url,
            'page'       => 'Edit Data Pekerjaan',
            'id'         => $id,
            'pekerjaan'  => $pekerjaan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataPekerjaan = [
            'nama'      => $request->nama,
        ];
        $this->mPekerjaan->where('id', $id)->update($dataPekerjaan);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Pekerjaan berhasil di edit');
    }

    public function destroy($id)
    {
        $pekerjaan       = $this->mPekerjaan->where('id', $id)->first();
        $this->mPekerjaan->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Pekerjaan' . $pekerjaan->nama . ' berhasil di hapus');
    }
}
