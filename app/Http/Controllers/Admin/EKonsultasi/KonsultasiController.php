<?php

namespace App\Http\Controllers\Admin\EKonsultasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KonsultasiModel;
use App\Models\TopikEKonsultasiModel;

class KonsultasiController extends Controller
{
    private $views      = 'admin/eKonsultasi/konsultasi';
    private $url        = 'admin/konsultasi';
    private $title      = 'Halaman Data Konsultasi';


    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $konsultasi = KonsultasiModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Konsultasi',
            'konsultasi'         => $konsultasi
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $topik = TopikEKonsultasiModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Konsultasi',
            'topik'         => $topik
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataKonsultasi = [
            'idFaskes'       => session()->get('idFaskes'),
            'nama_lengkap'   => $request->nama_lengkap,
            'no_bpjs'        => $request->no_bpjs,
            'no_wa'          => $request->no_wa,
            'idTopik'        => $request->idTopik,
            'pesan'          => $request->pesan,
            'status'         => 1,
        ];
        // echo json_encode($dataKonsultasi); die();
        KonsultasiModel::create($dataKonsultasi);

        return redirect("$this->url")->with('sukses', 'Data Konsultasi E-Konsultasi berhasil di tambahkan');
    }

    public function show($id)
    {
        $konsultasi   = KonsultasiModel::where('id', $id)->first();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Detail Data Konsultasi ' . $konsultasi->nama_lengkap,
            'id'            => $id,
            'konsultasi'    => $konsultasi
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $konsultasi   = KonsultasiModel::where('id', $id)->first();
        $topik = TopikEKonsultasiModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Konsultasi',
            'id'            => $id,
            'konsultasi'    => $konsultasi,
            'topik'         => $topik
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataKonsultasi = [
            'idUsers'       => session()->get('users_id'),
            'respon'        => $request->respon,
            'status'        => 2,
        ];
        KonsultasiModel::where('id', $id)->update($dataKonsultasi);

        return redirect("$this->url")->with('sukses', 'Data Konsultasi E-Konsultasi berhasil ditambahkan Respon');
    }

    public function destroy($id)
    {
        $konsultasi      = KonsultasiModel::where('id', $id)->first();
        KonsultasiModel::destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Konsultasi E-Konsultasi ' . $konsultasi->nama . ' berhasil di hapus');
    }
}
