<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RhesusModel;
use App\Models\GoldarModel;

class RhesusController extends Controller
{
    private $views      = 'admin/master_data/m_rhesus';
    private $url        = 'admin/rhesus';
    private $title      = 'Halaman Data Rhesus';


    public function __construct()
    {
        // Di isi Construct
        $this->mRhesus = New RhesusModel();
    }

    public function index()
    {
        $rhesus = $this->mRhesus->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Rhesus',
            'rhesus'       => $rhesus
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $golonganDarah      = GoldarModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Rhesus',
            'golonganDarah'     => $golonganDarah,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataRhesus = [
            'nama'      => $request->nama,
        ];
        $this->mRhesus->create($dataRhesus);

        return redirect("$this->url")->with('sukses', 'Data Rhesus berhasil di tambahkan');
    }

    public function show($id)
    {
        $rhesus       = $this->mRhesus->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Rhesus',
            'rhesus'  => $rhesus,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $rhesus             = $this->mRhesus->where('id', $id)->first();
        $golonganDarah      = GoldarModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Rhesus',
            'id'                => $id,
            'rhesus'            => $rhesus,
            'golonganDarah'     => $golonganDarah,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataRhesus = [
            'nama'      => $request->nama,
        ];
        $this->mRhesus->where('id', $id)->update($dataRhesus);

        return redirect("$this->url")->with('sukses', 'Data Rhesus berhasil di edit');
    }

    public function destroy($id)
    {
        $rhesus       = $this->mRhesus->where('id', $id)->first();
        $this->mRhesus->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Rhesus' . $rhesus->nama . ' berhasil di hapus');
    }
}
