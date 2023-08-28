<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DataLaborModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;
use App\Models\JenisPasienModel;

class DataLaborController extends Controller
{
    private $views      = 'bidan/labor';
    private $url        = 'bidan/labor';
    private $title      = 'Halaman Data Labor';
    protected $mDiagnosa;
    protected $mPasien;
    protected $mLabor;


    public function __construct()
    {
        // Di isi Construct
        $this->mLabor = New DataLaborModel();
    }

    public function index()
    {
        $labor = $this->mLabor->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data Labor',
            'labor'           => $labor
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
            'page'              => 'Tambah Data Labor',
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'jenis_pasien'      => $jenis_pasien
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataLabor = [
            'nama'                  => $request->nama,
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'satuan'                => $request->satuan,
            'batas_bawah'           => $request->batas_bawah,
            'batas_atas'            => $request->batas_atas,
            'harga'                 => $request->harga,
            'pembiayaan'            => $request->pembiayaan,
            'stok_awal'             => $request->stok_awal,
            'stok_akhir'            => $request->stok_akhir,
            'satuan_stock'          => $request->satuan_stock,
            'kapasitas_stock'       => $request->kapasitas_stock,
            'status'                => $request->status,
        ];
        // echo json_encode($dataLabor); die();
        $this->mLabor->create($dataLabor);

        return redirect("$this->url")->with('sukses', 'Data Labor berhasil di tambahkan');
    }

    public function show($id)
    {
        $labor       = $this->mLabor->where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Labor',
            'labor'             => $labor,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $labor              = $this->mLabor->where('id', $id)->first();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $jenis_pasien       = JenisPasienModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Labor',
            'id'                => $id,
            'labor'             => $labor,
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'jenis_pasien'      => $jenis_pasien
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataLabor = [
            'nama'                  => $request->nama,
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'satuan'                => $request->satuan,
            'batas_bawah'           => $request->batas_bawah,
            'batas_atas'            => $request->batas_atas,
            'harga'                 => $request->harga,
            'pembiayaan'            => $request->pembiayaan,
            'stok_awal'             => $request->stok_awal,
            'stok_akhir'            => $request->stok_akhir,
            'satuan_stock'          => $request->satuan_stock,
            'kapasitas_stock'       => $request->kapasitas_stock,
            'status'                => $request->status,
        ];
        $this->mLabor->where('id', $id)->update($dataLabor);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Labor berhasil di edit');
    }

    public function destroy($id)
    {
        $labor       = $this->mLabor->where('id', $id)->first();
        $this->mLabor->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Labor' . $labor->nama . ' berhasil di hapus');
    }
}
