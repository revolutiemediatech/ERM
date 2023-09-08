<?php

namespace App\Http\Controllers\Admin\EAduan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AduanModel;

class AduanController extends Controller
{
    private $views      = 'admin/eAduan/data_aduan';
    private $url        = 'admin/data-aduan';
    private $title      = 'Halaman Data Aduan E-Aduan';


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

    public function show($id)
    {
        $aduan   = AduanModel::where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Aduan',
            'id'        => $id,
            'aduan'     => $aduan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $aduan   = AduanModel::where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Aduan',
            'id'        => $id,
            'aduan'     => $aduan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $data_aduan = [
            'status'            => 1,
            'respon'            => $request->respon,
            'rencana'           => $request->rencana,
            'idUsers'           => session()->get('users_id'),
        ];
        AduanModel::where('id', $id)->update($data_aduan);

        return redirect("$this->url")->with('sukses', 'Data Aduan E-Aduan berhasil ditambahkan respon');
    }

    public function destroy($id)
    {
        //
    }
}
