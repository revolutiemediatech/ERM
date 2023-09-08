<?php

namespace App\Http\Controllers\Admin\EPerkesmas;

use App\Models\UserModel;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\WilayahPerkesmasModel;

class PJWilayah extends Controller
{
    private $views      = 'admin/ePerkesmas/pj_wilayah';
    private $url        = 'admin/pj-wilayah-eperkesmas';
    private $title      = 'Halaman Data Penanggung Jawab Wilayah E-Perkesmas';


    public function __construct()
    {
        // Di isi Construct
    }

    public function edit($id)
    {
        $wilayah      = WilayahPerkesmasModel::where('id', $id)->first();
        $users      = UserModel::all();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Tambah Data PJ Wilayah',
            'id'        => $id,
            'wilayah'   => $wilayah,
            'users'     => $users
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        $dataWilayah = [
            'idPenanggungJawab'          => $request->idPenanggungJawab,
        ];
        WilayahPerkesmasModel::where('id', $id)->update($dataWilayah);

        return redirect("$this->url")->with('sukses', 'Data PJ Wilayah E-Perkesmas berhasil di edit');
    }
}
