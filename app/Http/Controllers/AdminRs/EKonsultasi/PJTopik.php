<?php

namespace App\Http\Controllers\AdminRs\EKonsultasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TopikEKonsultasiModel;
use App\Models\UserModel;

class PJTopik extends Controller
{
    private $views      = 'adminRs/eKonsultasi/pj_topik';
    private $url        = 'adminRs/pj-topik-eKonsultasi';
    private $title      = 'Halaman Data Penanggung Jawab Topik E-Konsultasi';


    public function __construct()
    {
        // Di isi Construct
    }

    public function edit($id)
    {
        $topik   = TopikEKonsultasiModel::where('id', $id)->first();
        $users   = UserModel::where('idFaskes', session()->get('idFaskes'),); 

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Tambah Data PJ Topik',
            'id'        => $id,
            'topik'     => $topik,
            'users'     => $users
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataTopik = [
            'idPenanggungJawab'          => $request->idPenanggungJawab,
        ];
        TopikEKonsultasiModel::where('id', $id)->update($dataTopik);

        return redirect("$this->url")->with('sukses', 'Data PJ Topik E-Konsultasi berhasil di Tambahkan');
    }
}
