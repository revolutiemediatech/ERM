<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ObatModel;
use App\Models\FaskesModel;

class ObatController extends Controller
{
    private $views      = 'perawat/obat';
    private $url        = 'perawat/obat';
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

    // public function store(Request $request)
    // {
    //     $dataObat = [
    //         'nama'      => $request->nama,
    //         'idFaskes'  => session()->get('idFaskes'),
    //         'stok_awal' => $request->stok_awal,
    //         'satuan'    => $request->satuan,
    //         'harga'     => $request->harga,
    //         'status'    => $request->status,
    //     ];
    //     $this->mObat->create($dataObat);

    //     return redirect("$this->url")->with('sukses', 'Data Obat berhasil ditambahkan');
    // }

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

    // public function update(Request $request, $id)
    // {   
    //     $dataObat = [
    //         'nama'      => $request->nama,
    //         'idFaskes'  => session()->get('idFaskes'),
    //         'stok_awal' => $request->stok_awal,
    //         'satuan'    => $request->satuan,
    //         'harga'     => $request->harga,
    //         'status'    => $request->status,
    //     ];
    //     $this->mObat->where('id', $id)->update($dataObat);

    //     return redirect("$this->url")->with('sukses', 'Data Obat berhasil diedit');
    // }

    // public function destroy($id)
    // {
    //     $obat       = $this->mObat->where('id', $id)->first();
    //     $this->mObat->destroy($id);

    //     return redirect("$this->url")->with('sukses', 'Data Obat' . $obat->nama . ' berhasil dihapus');
    // }
}