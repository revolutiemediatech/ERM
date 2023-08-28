<?php

namespace App\Http\Controllers\AdminRs\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ApiBPJSModel;
use App\Models\FaskesModel;

class ApiBPJSController extends Controller
{
    private $views      = 'adminRs/resumee/api_bpjs';
    private $url        = 'adminRs/api-bpjs';
    private $title      = 'Halaman Data API BPJS';

    public function __construct()
    {
        // Di isi Construct
        $this->mApiBpjs = New ApiBPJSModel();
    }

    public function index()
    {
        $api_bpjs = $this->mApiBpjs->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data API BPJS',
            'api_bpjs'          => $api_bpjs
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data API BPJS',
            'faskes'            => $faskes,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataApiBPJS = [
            'idFaskes'          => $request->idFaskes,
            'idMUsers'          => session()->get('users_id'),
            'api'               => $request->api,
        ];
        $this->mApiBpjs->create($dataApiBPJS);

        return redirect("$this->url")->with('sukses', 'Data API BPJS berhasil di tambahkan');
    }

    // public function show($id)
    // {
        
    // }

    public function edit($id)
    {
        $api_bpjs       = $this->mApiBpjs->where('id', $id)->first();
        $faskes       = FaskesModel::all();

        $data = [
            'title'      => $this->title,
            'url'        => $this->url,
            'page'       => 'Edit Data API WA',
            'id'         => $id,
            'api_bpjs'     => $api_bpjs,
            'faskes'     => $faskes,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataApiBPJS = [
            'idFaskes'          => $request->idFaskes,
            'idMUsers'          => session()->get('users_id'),
            'api'               => $request->api,
        ];
        $this->mApiBpjs->where('id', $id)->update($dataApiBPJS);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data API BPJS berhasil di edit');
    }

    public function destroy($id)
    {
        $api_bpjs       = $this->mApiBpjs->where('id', $id)->first();
        $this->mApiBpjs->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data API BPJS' . $api_bpjs->nama . ' berhasil di hapus');
    }
}
