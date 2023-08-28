<?php

namespace App\Http\Controllers\Paramedis;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\FaskesModel;
use App\Models\LokasiModel;
use App\Models\AdministrasiModel;
use App\Models\JenisPasienModel;
class AdministrasiController extends Controller
{
    private $views      = 'paramedis/administrasi';
    private $url        = 'paramedis/administrasi';
    private $title      = 'Halaman Data Administrasi';
    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $pembiayaan         = JenisPasienModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Administrasi',
            'faskes'            => $faskes,
            'pembiayaan'        => $pembiayaan,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataBed = [
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'nama'                  => 'Administrasi',
            'harga'                 => $request->harga,
            'idPembiayaan'          => $request->idPembiayaan,
            'idUsers'               => session()->get('users_id'),
        ];
        AdministrasiModel::create($dataBed);

        return redirect("paramedis/billing")->with('sukses', 'Data Administrasi berhasil di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $administrasi       = AdministrasiModel::where('id', $id)->first();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $pembiayaan         = JenisPasienModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Administrasi',
            'id'                => $id,
            'administrasi'      => $administrasi,
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'pembiayaan'        => $pembiayaan
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataHarga = [
            'harga'                 => $request->harga,
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'idUsers'               => session()->get('users_id'),
            'idPembiayaan'          => $request->idPembiayaan,
        ];
        AdministrasiModel::where('id', $id)->update($dataHarga);
        // echo json_encode($dataUserRole); die;

        return redirect("paramedis/billing")->with('sukses', 'Data Administrasi berhasil di edit');
    }

    public function destroy($id)
    {
        $administrasi       = AdministrasiModel::where('id', $id)->first();
        AdministrasiModel::destroy($id);

        return redirect("paramedis/billing")->with('sukses', 'Data Administrasi Rp' . $administrasi->harga . ' berhasil di hapus');
    }
}
