<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ObatModel;

class ObatController extends Controller
{
    private $views      = 'dokter/obat';
    private $url        = 'dokter/obat';
    private $title      = 'Halaman Data Obat';
    protected $mObat;


    public function __construct()
    {
        // Di isi Construct
        $this->mObat = New ObatModel();
    }

    public function index()
    {
        $obat = $this->mObat->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data Obat',
            'obat'            => $obat
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        // 
    }

    public function show($id)
    {
        $obat       = $this->mObat->where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Obat',
            'obat'              => $obat,
        ];
        return view($this->views . "/show", $data);
    }

    // public function edit($id)
    // {
    //     $obat       = $this->mObat->where('id', $id)->first();

    //     $data = [
    //         'title'      => $this->title,
    //         'url'        => $this->url,
    //         'page'       => 'Edit Data Obat',
    //         'id'         => $id,
    //         'obat'       => $obat,
    //     ];
    //     return view($this->views . "/edit", $data);
    // }

    public function update(Request $request, $id)
    {   
        $dataObat = [
            'nama'      => $request->nama,
            'status'    => $request->status,
        ];
        $this->mObat->where('id', $id)->update($dataObat);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Obat berhasil di edit');
    }

    public function destroy($id)
    {
        $obat       = $this->mObat->where('id', $id)->first();
        $this->mObat->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Obat' . $obat->nama . ' berhasil di hapus');
    }
}
