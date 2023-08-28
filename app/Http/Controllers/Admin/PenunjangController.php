<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PenunjangModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;
use App\Models\JenisPasienModel;

class PenunjangController extends Controller
{
    
    private $views      = 'admin/penunjang';
    private $url        = 'admin/penunjang';
    private $title      = 'Halaman Data Penunjang';
    protected $mPenunjang;


    public function __construct()
    {
        // Di isi Construct
        $this->mPenunjang = New PenunjangModel();
    }

    public function index()
    {
        $penunjang = $this->mPenunjang->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data Penunjang',
            'penunjang'            => $penunjang
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $jenis_pasien       = JenisPasienModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Penunjang',
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'jenis_pasien'      => $jenis_pasien
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataPenunjang = [
            'idFaskes'              => $request->idFaskes,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'nama'                  => $request->nama,
            'harga'                 => $request->harga,
            'pembiayaan'            => $request->pembiayaan,
            'status'                => $request->status,
        ];
        $this->mPenunjang->create($dataPenunjang);

        return redirect("$this->url")->with('sukses', 'Data Penunjang berhasil di tambahkan');
    }

    public function show($id)
    {
        $penunjang       = $this->mPenunjang->where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Penunjang',
            'penunjang'              => $penunjang,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $penunjang          = $this->mPenunjang->where('id', $id)->first();
        $lokasiPemeriksaan  = LokasiModel::all();
        $jenis_pasien       = JenisPasienModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Penunjang',
            'id'                => $id,
            'penunjang'         => $penunjang,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'jenis_pasien'      => $jenis_pasien
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataPenunjang = [
            'idFaskes'              => $request->idFaskes,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'nama'                  => $request->nama,
            'harga'                 => $request->harga,
            'pembiayaan'            => $request->pembiayaan,
            'status'                => $request->status,
        ];
        $this->mPenunjang->where('id', $id)->update($dataPenunjang);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Penunjang berhasil di edit');
    }

    public function destroy($id)
    {
        $penunjang       = $this->mPenunjang->where('id', $id)->first();
        $this->mPenunjang->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Penunjang' . $penunjang->nama . ' berhasil di hapus');
    }
}
