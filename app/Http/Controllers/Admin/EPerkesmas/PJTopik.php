<?php

namespace App\Http\Controllers\Admin\EPerkesmas;

use App\Models\UserModel;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\TopikEPerkesmasModel;

class PJTopik extends Controller
{
    private $views      = 'admin/ePerkesmas/pj_topik';
    private $url        = 'admin/pj-topik-eperkesmas';
    private $title      = 'Halaman Data Penanggung Jawab Topik E-Perkesmas';


    public function __construct()
    {
        // Di isi Construct
    }

    public function edit($id)
    {
        $topik      = TopikEPerkesmasModel::where('id', $id)->first();
        $users      = UserModel::all();

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
        TopikEPerkesmasModel::where('id', $id)->update($dataTopik);

        return redirect("$this->url")->with('sukses', 'Data PJ Topik E-Perkesmas berhasil di edit');
    }
}
