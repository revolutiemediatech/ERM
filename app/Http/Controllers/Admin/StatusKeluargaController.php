<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\StatusKeluargaModel;
use App\Models\FaskesModel;

class StatusKeluargaController extends Controller
{
    private $views      = 'admin/status_keluarga';
    private $url        = 'admin/status_keluarga';
    private $title      = 'Halaman Data Family Record';

    protected $mBilling;

    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $faskes             = FaskesModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Family Folder',
            'faskes'            => $faskes,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataFamFol = [
            'idFaskes'  => $request->idFaskes,
            'kode'      => $request->kode,
            'nama'      => $request->nama,
        ];
        // echo json_encode($dataFamFol); die();
        StatusKeluargaModel::create($dataFamFol);

        return redirect("admin/medical_record")->with('sukses', 'Data Family Folder berhasil di tambahkan');
    }

    public function show($id)
    {
        $status_keluarga    = StatusKeluargaModel::where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Family Folder',
            'status_keluarga'   => $status_keluarga,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $status_keluarga    = StatusKeluargaModel::where('id', $id)->first();
        $faskes             = FaskesModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Family Folder',
            'id'                => $id,
            'status_keluarga'   => $status_keluarga,
            'faskes'            => $faskes,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataFamFol = [
            'idFaskes'  => $request->idFaskes,
            'kode'      => $request->kode,
            'nama'      => $request->nama,
        ];
        StatusKeluargaModel::where('id', $id)->update($dataFamFol);
        // echo json_encode($dataUserRole); die;

        return redirect("admin/medical_record")->with('sukses', 'Data Family Folder berhasil di edit');
    }

    public function destroy($id)
    {
        $status_keluarga       = StatusKeluargaModel::where('id', $id)->first();
        StatusKeluargaModel::destroy($id);

        return redirect("admin/medical_record")->with('sukses', 'Data Family Folder' . $status_keluarga->nama . ' berhasil di hapus');
    }
}
