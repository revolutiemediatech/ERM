<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\MedicalRecordModel;
use App\Models\StatusKeluargaModel;

class MedicalRecordController extends Controller
{
    private $views      = 'admin/medical_record';
    private $url        = 'admin/medical_record';
    private $title      = 'Halaman Data Medical Record';


    public function index()
    {
        $medical_rep        = MedicalRecordModel::get();
        $status_keluarga    = StatusKeluargaModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Medical Record',
            'medical_rep'       => $medical_rep,
            'status_keluarga'   => $status_keluarga
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Medical Record',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $medical_rep = [
            'jenis'                 => 'Family Folder',
            'idFaskes'              => $request->idFaskes,
            'idMDesa'               => $request->idMDesa,
            'kode_wilayah'          => $request->kode_wilayah,
        ];
        // echo json_encode($medical_rep); die();
        MedicalRecordModel::create($medical_rep);

        return redirect("$this->url")->with('sukses', 'Data Medical Record berhasil di tambahkan');
    }

    public function edit($id)
    {
        $medical_rec = MedicalRecordModel::where('id', $id)->first();
        // echo json_encode($medical_rec); die;
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Lokasi Pemeriksan',
            'id'            => $id,
            'medical_rec'   => $medical_rec,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $medical_rec = [
            'kode_wilayah'          => $request->kode_wilayah,
        ];
        MedicalRecordModel::where('id', $id)->update($medical_rec);

        return redirect("$this->url")->with('sukses', 'Data Medical Record berhasil di edit');
    }
    
    public function destroy($id)
    {
        $medical_rec       = MedicalRecordModel::where('id', $id)->first();
        MedicalRecordModel::destroy($id);

        return redirect("admin/medical_record")->with('sukses', 'Data Kode Wilayah' . $medical_rec->kode_wilayah . ' berhasil di hapus');
    }
}
