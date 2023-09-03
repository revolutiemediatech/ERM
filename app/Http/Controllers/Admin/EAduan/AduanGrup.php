<?php

namespace App\Http\Controllers\Admin\EAduan;

use App\Http\Controllers\Controller;
use App\Models\PJAduanModel;
use App\Models\FaskesModel;
use Illuminate\Http\Request;

class AduanGrup extends Controller
{
    private $views      = 'admin/eAduan/namaGrup';
    private $url        = 'admin/namaGrup-eAduan';
    private $title      = 'Halaman Data Grup Aduan';


    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $aduanGrup = PJAduanModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Grup',
            'aduanGrup'     => $aduanGrup
        ];

        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes = FaskesModel::all();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Grup',
            'faskes'        => $faskes
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataGrup = [
            'idFaskes'      => $request->idFaskes,
            'idUsers'       => session()->get('users_id'),
            'nama'          => $request->nama,
            'status'        => 1,
        ];
        // echo json_encode($dataWilayah); die();
        PJAduanModel::create($dataGrup);

        return redirect("$this->url")->with('sukses', 'Data Grup E-Aduan berhasil di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $aduanGrup   = PJAduanModel::where('id', $id)->first();
        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Grup',
            'id'        => $id,
            'aduanGrup'     => $aduanGrup
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        $dataGrup = [
            'nama'          => $request->nama,
            'status'        => $request->status,
        ];
        PJAduanModel::where('id', $id)->update($dataGrup);

        return redirect("$this->url")->with('sukses', 'Data Grup E-Aduan berhasil di edit');
    }

    public function destroy($id)
    {
        $aduanGrup      = PJAduanModel::where('id', $id)->first();
        PJAduanModel::destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Wilayah E-Perkesmas ' . $aduanGrup->nama . ' berhasil di hapus');
    }
}
