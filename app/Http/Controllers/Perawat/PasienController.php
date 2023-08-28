<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class PasienController extends Controller
{
    private $views      = 'perawat/pasien';
    private $url        = 'perawat/pasienn';
    private $title      = 'Halaman Data Pasien';
    protected $mFaskes;
    protected $mPasien;
    protected $mUsers;

    public function __construct()
    {
        // Di isi Construct
        $this->mPasien = New PasienModel();
        $this->mUsers = New UserModel();
    }

    public function index()
    {
        $pasien = $this->mPasien->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Pasien',
            'pasien'        => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    // public function create()
    // {
    //     $faskes             = FaskesModel::all();
    //     $provinsi           = ProvinsiModel::all();
    //     $daerah             = DaerahModel::all();
    //     $kecamatan          = KecamatanModel::all();
    //     $desa               = DesaModel::all();
    //     $perawatan          = PerawatanModel::all();
    //     $unitPelayanan      = UnitPelayananModel::all();
    //     $kunjunganSakit     = KunjunganModel::all();
    //     $jenisPasien        = JenisPasienModel::all();
    //     $jenisKelamin       = JenisKelaminModel::all();
    //     $golonganDarah      = GoldarModel::all();
    //     $pendidikan         = PendidikanModel::all();
    //     $pekerjaan          = PekerjaanModel::all();

    //     $data = [
    //         'title'             => $this->title,
    //         'url'               => $this->url,
    //         'page'              => 'Request Form Registrasi Pasien',
    //         'provinsi'          => $provinsi,
    //         'daerah'            => $daerah,
    //         'kecamatan'         => $kecamatan,
    //         'desa'              => $desa,
    //         'perawatan'         => $perawatan,
    //         'unitPelayanan'     => $unitPelayanan,
    //         'kunjunganSakit'    => $kunjunganSakit,
    //         'jenisPasien'       => $jenisPasien,
    //         'jenisKelamin'      => $jenisKelamin,
    //         'golonganDarah'     => $golonganDarah,
    //         'pendidikan'        => $pendidikan,
    //         'pekerjaan'         => $pekerjaan, 
    //     ];

    //     return view($this->views . "/create", $data);
    // }

    public function store(Request $request)
    {

        $dataPasien = [
            'tanggal'                   => $request->tanggal,
            'idUsers'                   => session()->get('users_id'),
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
            'idFaskes'                  => session()->get('idFaskes'),
            'nama'                      => $request->nama,
            'no_index'                  => $request->no_index,
            'no_kk'                     => $request->no_kk,
            'nik'                       => $request->nik,
            'no_ks'                     => $request->no_ks,
            'nama_kk'                   => $request->nama_kk,
            'no_hp'                     => $request->no_hp,
            'tanggal_lahir'             => $request->tanggal_lahir,
            'alamat'                    => $request->alamat,
            'rt'                        => $request->rt,
            'rw'                        => $request->rw,
            'kode'                      => $request->kode,
        ];
        $this->mPasien->create($dataPasien);

        return redirect("$this->url")->with('sukses', 'Data Pasien berhasil ditambahkan');
    }

    public function show($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Pasien',
            'pasien'    => $pasien,
        ];
        return view($this->views . "/show", $data);
    }

    // public function edit($id)
    // {
    //     $pasien       = $this->mPasien->where('id', $id)->first();
    //     $faskes             = FaskesModel::all();
    //     $provinsi           = ProvinsiModel::all();
    //     $daerah             = DaerahModel::all();
    //     $kecamatan          = KecamatanModel::all();
    //     $desa               = DesaModel::all();
    //     $lokasiPemeriksaan  = LokasiModel::all();
    //     $perawatan          = PerawatanModel::all();
    //     $unitPelayanan      = UnitPelayananModel::all();
    //     $kunjunganSakit     = KunjunganModel::all();
    //     $jenisPasien        = JenisPasienModel::all();
    //     $jenisKelamin       = JenisKelaminModel::all();
    //     $golonganDarah      = GoldarModel::all();
    //     $pendidikan         = PendidikanModel::all();
    //     $pekerjaan          = PekerjaanModel::all();

    //     $data = [
    //         'title'             => $this->title,
    //         'url'               => $this->url,
    //         'page'              => 'Edit Data Pasien',
    //         'id'                => $id,
    //         'pasien'            => $pasien,
    //         'faskes'            => $faskes,
    //         'provinsi'          => $provinsi,
    //         'daerah'            => $daerah,
    //         'kecamatan'         => $kecamatan,
    //         'desa'              => $desa,
    //         'lokasiPemeriksaan' => $lokasiPemeriksaan,
    //         'perawatan'         => $perawatan,
    //         'unitPelayanan'     => $unitPelayanan,
    //         'kunjunganSakit'    => $kunjunganSakit,
    //         'jenisPasien'       => $jenisPasien,
    //         'jenisKelamin'      => $jenisKelamin,
    //         'golonganDarah'     => $golonganDarah,
    //         'pendidikan'        => $pendidikan,
    //         'pekerjaan'         => $pekerjaan,
    //     ];
    //     return view($this->views . "/edit", $data);
    // }

    public function update(Request $request, $id)
    {   
        $dataPasien = [
            'tanggal'                   => $request->tanggal,
            'idUsers'                   => $request->idUsers,
            'idLokasiPemeriksaan'       => $request->idLokasiPemeriksaan,
            'idMPerawatan'              => $request->idMPerawatan,
            'idMUnitPelayanan'          => $request->idMUnitPelayanan,
            'idMKunjunganSakit'         => $request->idMKunjunganSakit,
            'idMJenisKun'               => $request->idMJenisKun,
            'idMJenisKel'               => $request->idMJenisKel,
            'idMGoldar'                 => $request->idMGoldar,
            'idMPendidikan'             => $request->idMPendidikan,
            'idMPekerjaan'              => $request->idMPekerjaan,
            'idMProvinsi'               => $request->idMProvinsi,
            'idMDaerah'                 => $request->idMDaerah,
            'idMKecamatan'              => $request->idMKecamatan,
            'idMDesa'                   => $request->idMDesa,
            'idMJenisPas'               => $request->idMJenisPas,
            'idMFaskes'                 => $request->idMFaskes,
            'nama'                      => $request->nama,
            'no_index'                  => $request->no_index,
            'no_kk'                     => $request->no_kk,
            'nik'                       => $request->nik,
            'no_ks'                     => $request->no_ks,
            'nama_kk'                   => $request->nama_kk,
            'no_hp'                     => $request->no_hp,
            'tanggal_lahir'             => $request->tanggal_lahir,
            'alamat'                    => $request->alamat,
            'rt'                        => $request->rt,
            'rw'                        => $request->rw,
            'kode'                      => $request->kode,
        ];
        $this->mPasien->where('id', $id)->update($dataPasien);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Pasien berhasil diedit');
    }

    public function destroy($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();
        $this->mPasien->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Pasien' . $pasien->nama . ' berhasil dihapus');
    }
}