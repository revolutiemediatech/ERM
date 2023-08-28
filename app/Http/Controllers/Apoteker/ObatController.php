<?php

namespace App\Http\Controllers\Apoteker;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\ObatModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;
use App\Models\JenisPasienModel;

class ObatController extends Controller
{
    
    private $views      = 'apoteker/obat';
    private $url        = 'apoteker/obat';
    private $title      = 'Halaman Data Obat';
    protected $mObat;
    protected $mLokasi;



    public function __construct()
    {
        // Di isi Construct
        $this->mObat = New ObatModel();
        $this->mLokasi = New LokasiModel();
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
        $lokasiPemeriksaan  = $this->mLokasi->where('idFaskes', session()->get('idFaskes'))->get();
        $faskes             = FaskesModel::all(); 
        $jenis_pasien       = JenisPasienModel::all();
        
        $data=[
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Obat',
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'jenis_pasien'      => $jenis_pasien
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataObat = [
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'nama'                  => $request->nama,
            'stok_awal'             => $request->stok_awal,
            'stok_akhir'            => $request->stok_akhir,
            'satuan'                => $request->satuan,
            'dosis_sediaan_obat'    => $request->dosis_sediaan_obat,
            'satuan_dso'            => $request->satuan_dso,
            'dosis_perBB_bawah'     => $request->dosis_perBB_bawah,
            'ket_dbb'               => $request->ket_dbb,
            'dosis_perBB_atas'      => $request->dosis_perBB_atas,
            'ket_dba'               => $request->ket_dba,
            'expired'               => $request->expired,
            'harga'                 => $request->harga,
            'pembiayaan'            => $request->pembiayaan,
            'status'                => $request->status,
        ];
        $this->mObat->create($dataObat);

        return redirect("$this->url")->with('sukses', 'Data Obat berhasil di tambahkan');
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

    public function edit($id)
    {
        $obat       = $this->mObat->where('id', $id)->first();
        $lokasiPemeriksaan  = $this->mLokasi->where('idFaskes', session()->get('idFaskes'))->get();
        $jenis_pasien       = JenisPasienModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Obat',
            'id'                => $id,
            'obat'              => $obat,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'jenis_pasien'      => $jenis_pasien
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataObat = [
            'idFaskes'  => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'nama'                  => $request->nama,
            'stok_awal'             => $request->stok_awal,
            'stok_akhir'            => $request->stok_akhir,
            'satuan'                => $request->satuan,
            'dosis_sediaan_obat'    => $request->dosis_sediaan_obat,
            'satuan_dso'            => $request->satuan_dso,
            'dosis_perBB_bawah'     => $request->dosis_perBB_bawah,
            'ket_dbb'               => $request->ket_dbb,
            'dosis_perBB_atas'      => $request->dosis_perBB_atas,
            'ket_dba'               => $request->ket_dba,
            'expired'               => $request->expired,
            'harga'                 => $request->harga,
            'pembiayaan'            => $request->pembiayaan,
            'status'                => $request->status,
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