<?php

namespace App\Http\Controllers\Admin\EPerkesmas;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\PJPerkesmasModel;
use App\Http\Controllers\Controller;
use App\Models\WilayahEPerkesmasModel;

class PJTopik extends Controller
{
    private $views      = 'admin/ePerkesmas/pj_topik';
    private $home      = 'admin/ePerkesmas/PJ';
    private $url        = 'admin/pj-topik-ePerkesmas';
    private $title      = 'Halaman Data Penanggung Jawab Topik E-Perkesmas';


    public function __construct()
    {
        // Di isi Construct
    }
    public function index()
    {
        $where = [
            'status'    => 1,
            'idFaskes'  => session()->get('idFaskes'),
        ];
        $penanggung_jawab = PJPerkesmasModel::where($where)->first(); // cari kepsek yg statusnya 1
        if (isset($penanggung_jawab)) {
            $users = UserModel::where('id', $penanggung_jawab['idUsers'])->get(); // tampilkan data guru sebagai kepsek
        } else {
            $users = null;
        }
        $topik = WilayahEPerkesmasModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Penanggung Jawab E-Perkesmas',
            'users'             => $users,
            'topik'             => $topik,
        ];

        $suksesMessage = session('sukses'); // Retrieve the 'sukses' message from the session

        return view($this->home . "/index", $data)->with('sukses', $suksesMessage);
    }

    public function edit($id)
    {
        $topik      = WilayahEPerkesmasModel::where('id', $id)->first();
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
        WilayahEPerkesmasModel::where('id', $id)->update($dataTopik);

        return redirect('admin/pj-topik-ePerkesmas')->with('sukses', 'Data PJ Topik E-Perkesmas berhasil di edit');
    }
}
