<?php

namespace App\Http\Controllers\AdminRs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TindakanMedisModel;
use App\Models\JenisPasienModel;

class TindakanMedisController extends Controller
{
    
    private $views      = 'adminRs/tindakan_medis';
    private $url        = 'adminRs/tindakan-medis';
    private $title      = 'Halaman Data Tindakan Medis';
    protected $mTindakanMedis;

    public function __construct()
    {
        // Di isi Construct
        $this->mTindakanMedis = New TindakanMedisModel();
    }

    public function index()
    {
        $tindakan_medis = $this->mTindakanMedis->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Tindakan Medis',
            'tindakan_medis'  => $tindakan_medis
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $pembiayaan       = JenisPasienModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Tindakan Medis',
            'pembiayaan'    => $pembiayaan

        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataTindakanMedis = [
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'nama'                  => $request->nama,
            'jenis'                 => $request->jenis,
            'harga'                 => $request->harga,
            'pembiayaan'            => $request->pembiayaan,
            'status'                => $request->status,
        ];
        $this->mTindakanMedis->create($dataTindakanMedis);

        return redirect("$this->url")->with('sukses', 'Data Tindakan Medis berhasil di tambahkan');
    }

    public function show($id)
    {
        $tindakan_medis       = $this->mTindakanMedis->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Tindakan Medis',
            'tindakan_medis'    => $tindakan_medis,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $tindakan_medis       = $this->mTindakanMedis->where('id', $id)->first();
        $pembiayaan       = JenisPasienModel::all();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Tindakan Medis',
            'id'        => $id,
            'tindakan_medis'    => $tindakan_medis,
            'pembiayaan'      => $pembiayaan

        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataTindakanMedis = [
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'nama'                  => $request->nama,
            'jenis'                 => $request->jenis,
            'harga'                 => $request->harga,
            'pembiayaan'            => $request->pembiayaan,
            'status'                => $request->status,
        ];
        $this->mTindakanMedis->where('id', $id)->update($dataTindakanMedis);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Tindakan Medis berhasil di edit');
    }

    public function destroy($id)
    {
        $tindakan_medis       = $this->mTindakanMedis->where('id', $id)->first();
        $this->mTindakanMedis->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Tindakan Medis' . $tindakan_medis->nama . ' berhasil di hapus');
    }
}
