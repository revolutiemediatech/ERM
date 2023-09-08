<?php

namespace App\Http\Controllers\Admin\EAduan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AduanModel;
use App\Models\TopikEKonsultasiModel;

class AduanController extends Controller
{
    private $views      = 'admin/eAduan/aduan';
    private $url        = 'admin/aduan';
    private $title      = 'Halaman Data Aduan';


    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $aduan = AduanModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Aduan',
            'aduan'         => $aduan
        ];

        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $topik = TopikEKonsultasiModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Aduan',
            'topik'         => $topik
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataAduan = [
            'idFaskes'       => session()->get('idFaskes'),
            'nama_lengkap'   => $request->nama_lengkap,
            'no_bpjs'        => $request->no_bpjs,
            'no_wa'          => $request->no_wa,
            'idTopik'        => $request->idTopik,
            'pesan'          => $request->pesan,
            'status'         => 1,
        ];
        // echo json_encode($dataKonsultasi); die();
        AduanModel::create($dataAduan);

        return redirect("$this->url")->with('sukses', 'Data Aduan E-Aduan berhasil di tambahkan');
    }

    public function show($id)
    {
        $aduan   = AduanModel::where('id', $id)->first();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Detail Data Aduan ' . $aduan->nama_lengkap,
            'id'            => $id,
            'aduan'    => $aduan
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $aduan   = AduanModel::where('id', $id)->first();
        $topik = TopikEKonsultasiModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Konsultasi',
            'id'            => $id,
            'aduan'    => $aduan,
            'topik'         => $topik
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        $dataAduan = [
            'idUsers'       => session()->get('users_id'),
            'respon'        => $request->respon,
            'status'        => 2,
        ];
        AduanModel::where('id', $id)->update($dataAduan);

        return redirect("$this->url")->with('sukses', 'Data Aduan E-Aduan berhasil ditambahkan Respon');
    }

    public function destroy($id)
    {
        $aduan      = AduanModel::where('id', $id)->first();
        AduanModel::destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Aduan E-Aduan ' . $aduan->nama . ' berhasil di hapus');
    }
}
