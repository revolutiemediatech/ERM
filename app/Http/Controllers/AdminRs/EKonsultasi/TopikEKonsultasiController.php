<?php

namespace App\Http\Controllers\AdminRs\EKonsultasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TopikEKonsultasiModel;

class TopikEKonsultasiController extends Controller
{
    private $views      = 'adminRs/eKonsultasi/topik';
    private $url        = 'adminRs/topik-eKonsultasi';
    private $title      = 'Halaman Data Topik E-Konsultasi';


    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $where = [
            'idFaskes'  => session()->get('idFaskes')
        ];
        $topik = TopikEKonsultasiModel::where($where)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Topik',
            'topik'         => $topik
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Topik',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataTopik = [
            'idFaskes'      => session()->get('idFaskes'),
            'idUsers'       => session()->get('users_id'),
            'nama'          => $request->nama,
            'status'        => 1,
        ];
        // echo json_encode($dataTopik); die();
        TopikEKonsultasiModel::create($dataTopik);

        return redirect("$this->url")->with('sukses', 'Data Topik E-Konsultasi berhasil di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $topik   = TopikEKonsultasiModel::where('id', $id)->first();
        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Topik',
            'id'        => $id,
            'topik'     => $topik
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataTopik = [
            'nama'          => $request->nama,
            'status'        => $request->status,
        ];
        TopikEKonsultasiModel::where('id', $id)->update($dataTopik);

        return redirect("$this->url")->with('sukses', 'Data Topik E-Konsultasi berhasil di edit');
    }

    public function destroy($id)
    {
        $topik      = TopikEKonsultasiModel::where('id', $id)->first();
        TopikEKonsultasiModel::destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Topik E-Konsultasi ' . $topik->nama . ' berhasil di hapus');
    }
}
