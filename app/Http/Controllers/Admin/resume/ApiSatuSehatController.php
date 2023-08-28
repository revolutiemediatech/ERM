<?php

namespace App\Http\Controllers\Admin\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ApiSatuSehatModel;
use App\Models\FaskesModel;

class ApiSatuSehatController extends Controller
{
    private $views      = 'admin/resumee/api_satu_sehat';
    private $url        = 'admin/api-satu-sehat';
    private $title      = 'Halaman Data API Satu Sehat';

    public function __construct()
    {
        // Di isi Construct
        $this->mApiSatuSehat = New ApiSatuSehatModel();
    }

    public function index()
    {
        $api_satuSehat = $this->mApiSatuSehat->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data API Satu Sehat',
            'api_satuSehat'   => $api_satuSehat
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data API Satu Sehat',
            'faskes'            => $faskes,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataApiSatuSehat = [
            'idFaskes'          => $request->idFaskes,
            'idMUsers'          => session()->get('users_id'),
            'api'               => $request->api,
        ];
        $this->mApiSatuSehat->create($dataApiSatuSehat);

        return redirect("$this->url")->with('sukses', 'Data API Satu Sehat berhasil di tambahkan');
    }

    // public function show($id)
    // {
        
    // }

    public function edit($id)
    {
        $api_satuSehat      = $this->mApiSatuSehat->where('id', $id)->first();
        $faskes             = FaskesModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data API WA',
            'id'            => $id,
            'api_satuSehat' => $api_satuSehat,
            'faskes'        => $faskes,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataApiSatuSehat = [
            'idFaskes'          => $request->idFaskes,
            'idMUsers'          => session()->get('users_id'),
            'api'               => $request->api,
        ];
        $this->mApiSatuSehat->where('id', $id)->update($dataApiSatuSehat);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data API Satu Sehat berhasil di edit');
    }

    public function destroy($id)
    {
        $api_satuSehat       = $this->mApiSatuSehat->where('id', $id)->first();
        $this->mApiSatuSehat->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data API Satu Sehat' . $api_satuSehat->nama . ' berhasil di hapus');
    }
}
