<?php

namespace App\Http\Controllers\AdminRs\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ApiWaModel;
use App\Models\FaskesModel;

class ApiWaController extends Controller
{
    private $views      = 'adminRs/resumee/api_wa';
    private $url        = 'adminRs/api-wa';
    private $title      = 'Halaman Data API WA';

    public function __construct()
    {
        // Di isi Construct
        $this->mApiWa = New ApiWaModel();
    }

    public function index()
    {
        $api_wa = $this->mApiWa->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data API WA',
            'api_wa'          => $api_wa
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data API WA',
            'faskes'            => $faskes,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataApiWa = [
            'idFaskes'          => $request->idFaskes,
            'idMUsers'          => session()->get('users_id'),
            'api'               => $request->api,
        ];
        $this->mApiWa->create($dataApiWa);

        return redirect("$this->url")->with('sukses', 'Data API WA berhasil di tambahkan');
    }

    // public function show($id)
    // {
        
    // }

    public function edit($id)
    {
        $api_wa       = $this->mApiWa->where('id', $id)->first();
        $faskes       = FaskesModel::all();

        $data = [
            'title'      => $this->title,
            'url'        => $this->url,
            'page'       => 'Edit Data API WA',
            'id'         => $id,
            'api_wa'     => $api_wa,
            'faskes'     => $faskes,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataApiWa = [
            'idFaskes'          => $request->idFaskes,
            'idMUsers'          => session()->get('users_id'),
            'api'               => $request->api,
        ];
        $this->mApiWa->where('id', $id)->update($dataApiWa);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data API WA berhasil di edit');
    }

    public function destroy($id)
    {
        $api_wa       = $this->mApiWa->where('id', $id)->first();
        $this->mApiWa->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data API WA' . $api_wa->nama . ' berhasil di hapus');
    }
}
