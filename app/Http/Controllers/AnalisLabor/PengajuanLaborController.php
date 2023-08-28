<?php

namespace App\Http\Controllers\AnalisLabor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\FaskesModel;
use App\Models\DaerahModel;
use App\Models\DesaModel;
use App\Models\KecamatanModel;
use App\Models\ProvinsiModel;
use App\Models\UserModel;
use App\Models\LokasiModel;
use App\Models\GoldarModel;
use App\Models\JenisKelaminModel;
use App\Models\JenisPasienModel;
use App\Models\KunjunganModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikanModel;
use App\Models\PerawatanModel;
use App\Models\UnitPelayananModel;
use App\Models\BedModel;
use App\Models\KamarModel;

class PengajuanLaborController extends Controller
{
    private $views      = 'analisLabor/pengajuan_labor';
    private $url        = 'analisLabor/pengajuan-labor';
    private $title      = 'Halaman Data Pasien Pegajuan Labor';
    protected $mDiagnosa;
    protected $mPasien;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mPasien      = New PasienModel();
    }

    public function index()
    {
        $diagnosa = $this->mDiagnosa->where('idPemPenunjang', 2)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pasien Pengajuan Labor',
            'diagnosa'      => $diagnosa
        ];
        
        return view($this->views . "/index", $data);
    }

    public function edit($id)
    {
        $diagnosa           = $this->mDiagnosa->where('id', $id)->first();
        $pasien             = PasienModel::all();
        $faskes             = FaskesModel::all();
        $provinsi           = ProvinsiModel::all();
        $daerah             = DaerahModel::all();
        $kecamatan          = KecamatanModel::all();
        $desa               = DesaModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $perawatan          = PerawatanModel::all();
        $unitPelayanan      = UnitPelayananModel::all();
        $kunjunganSakit     = KunjunganModel::all();
        $jenisPasien        = JenisPasienModel::all();
        $jenisKelamin       = JenisKelaminModel::all();
        $golonganDarah      = GoldarModel::all();
        $pendidikan         = PendidikanModel::all();
        $pekerjaan          = PekerjaanModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Pasien',
            'id'                => $id,
            'diagnosa'          => $diagnosa,
            'pasien'            => $pasien,
            'faskes'            => $faskes,
            'provinsi'          => $provinsi,
            'daerah'            => $daerah,
            'kecamatan'         => $kecamatan,
            'desa'              => $desa,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'perawatan'         => $perawatan,
            'unitPelayanan'     => $unitPelayanan,
            'kunjunganSakit'    => $kunjunganSakit,
            'jenisPasien'       => $jenisPasien,
            'jenisKelamin'      => $jenisKelamin,
            'golonganDarah'     => $golonganDarah,
            'pendidikan'        => $pendidikan,
            'pekerjaan'         => $pekerjaan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $validasi = $request->validate([
            'rt'          => 'required|numeric|digits_between:1,3',
            'rw'          => 'required|numeric|digits_between:1,3',
        ]);
        $dataPasien = [
            'tanggal'                   => $request->tanggal,
            'idUsers'                   => $request->idUsers,
            'idLokasiPemeriksaan'       => $request->idLokasiPemeriksaan,
            'idMPerawatan'              => $request->idMPerawatan,
            'idMUnitPelayanan'          => $request->idMUnitPelayanan,
            'idMKunjunganSakit'         => $request->idMKunjunganSakit,
            'idMJenisKel'               => $request->idMJenisKel,
            'idMGoldar'                 => $request->idMGoldar,
            'idMPendidikan'             => $request->idMPendidikan,
            'idMPekerjaan'              => $request->idMPekerjaan,
            'idMProvinsi'               => $request->idMProvinsi,
            'idMDaerah'                 => $request->idMDaerah,
            'idMKecamatan'              => $request->idMKecamatan,
            'idMDesa'                   => $request->idMDesa,
            'idMJenisPas'               => $request->idMJenisPas,
            'idFaskes'                  => $request->idFaskes,
            'nama'                      => $request->nama,
            'no_index'                  => $request->no_index,
            'no_kk'                     => $request->no_kk,
            'nik'                       => $request->nik,
            'no_ks'                     => $request->no_ks,
            'nama_kk'                   => $request->nama_kk,
            'no_hp'                     => $request->no_hp,
            'tanggal_lahir'             => $request->tanggal_lahir,
            'idKamar'                   => $request->idKamar,
            'idBed'                     => $request->idBed,
            'alamat'                    => $request->alamat,
            'rt'                        => $request->rt,
            'rw'                        => $request->rw,
            'kode'                      => $request->kode,
        ];
        // echo json_encode($dataPasien); die;
        $this->mPasien->where('id', $id)->create($dataPasien);

        return redirect("$this->url")->with('sukses', 'Data Pasien berhasil di Tambahkan');
    }
}
