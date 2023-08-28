<?php

namespace App\Http\Controllers\AdminRs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
use App\Models\RhesusModel;

class PasienController extends Controller
{
    private $views      = 'adminRs/pasien';
    private $url        = 'adminRs/pasienn';
    private $title      = 'Halaman Registrasi Data Pasien';
    protected $mFaskes;
    protected $mPasien;
    protected $mUsers;

    public function __construct()
    {
        // Di isi Construct
        $this->mPasien  = New PasienModel();
        $this->mUsers   = New UserModel();
        $this->mLokasi  = New LokasiModel();
        $this->mPekerjaan   = New PekerjaanModel();
    }

    public function index()
    {
        $wherenyaa = [
            'idFaskes'      => session()->get('idFaskes'),
            'idMPerawatan'  => 1
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Pasien',
            'pasien'        => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $provinsi           = ProvinsiModel::all();
        $daerah             = DaerahModel::all();
        $kecamatan          = KecamatanModel::all();
        $desa               = DesaModel::all();
        $lokasiPemeriksaan  = $this->mLokasi->where('idFaskes', session()->get('idFaskes'))->get();
        $perawatan          = PerawatanModel::all();
        $unitPelayanan      = UnitPelayananModel::all();
        $kunjunganSakit     = KunjunganModel::all();
        $jenisPasien        = JenisPasienModel::all();
        $jenisKelamin       = JenisKelaminModel::all();
        $golonganDarah      = GoldarModel::all();
        $pendidikan         = PendidikanModel::all();
        $pekerjaan          = PekerjaanModel::all();
        $kamar              = KamarModel::all();
        $bed                = BedModel::all();
        $rhesus             = RhesusModel::all();
        $pasienn            = PasienModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Request Form Registrasi Pasien',
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
            'kamar'             => $kamar,
            'bed'               => $bed,
            'rhesus'            => $rhesus,
            'pasienn'            => $pasienn,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'rt'          => 'required|numeric|digits_between:1,3',
            'rw'          => 'required|numeric|digits_between:1,3',
        ]);
        
        $dataPasien = [
            'tanggal'                   => $request->tanggal,
            'idUsers'                   => session()->get('users_id'),
            'idLokasiPemeriksaan'       => $request->idLokasiPemeriksaan,
            'idMPerawatan'              => $request->idMPerawatan,
            'idMUnitPelayanan'          => $request->idMUnitPelayanan,
            'idMKunjunganSakit'         => $request->idMKunjunganSakit,
            'idMJenisKel'               => $request->idMJenisKel,
            'idMGoldar'                 => $request->idMGoldar,
            'idMPendidikan'             => $request->idMPendidikan,
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
            'idKamar'                   => $request->idKamar,
            'idBed'                     => $request->idBed,
            'status'                    => 1
        ];
        // echo json_encode($dataPasien); die();
        $pasien = $this->mPasien->create($dataPasien);
        
        if ($request->has('pekerjaan1')) {
            for ($i = 0; $i < count($request->pekerjaan1); $i++) {
                $dataPekerjaan[] = [
                    'nama'          => $request->pekerjaan1[$i],
                    'idMPasien'     => $pasien->id,
                ];
            }
            // echo json_encode($dataPekerjaan); die;
            DB::table('m_pekerjaan')->insert($dataPekerjaan);
        }

        return redirect("$this->url/create")->with('sukses', 'Data Pasien berhasil di tambahkan');
    }

    public function show($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $dokter             = $this->mPasien->where('idUsers', $id)->first();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Pasien',
            'pasien'            => $pasien,
            'dokter'            => $dokter,
            'pilihanPekerjaan'  => $pilihanPekerjaan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();
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
        $rhesus             = RhesusModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Pasien',
            'id'                => $id,
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
            'pilihanPekerjaan'  => $pilihanPekerjaan,
            'rhesus'            => $rhesus,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $validasi = $request->validate([
            'rt'          => 'required|numeric|digits_between:1,3',
            'rw'          => 'required|numeric|digits_between:1,3',
        ]);
        $pasien = $this->mPasien->where('id', $request->id)->first();
        $dataPasien = [
            'tanggal'                   => date('Y-m-d', strtotime($request->tanggal)),
            'idUsers'                   => session()->get('users_id'),
            'idLokasiPemeriksaan'       => $pasien->idLokasiPemeriksaan,
            'idMPerawatan'              => $pasien->idMPerawatan,
            'idMUnitPelayanan'          => $pasien->idMUnitPelayanan,
            'idMKunjunganSakit'         => $pasien->idMKunjunganSakit,
            // 'idMJenisKun'               => $request->idMJenisKun,
            'idMJenisKel'               => $request->idMJenisKel,
            'idMGoldar'                 => $request->idMGoldar,
            'idRhesus'                  => $request->idRhesus,
            'idMPendidikan'             => $request->idMPendidikan,
            'idMProvinsi'               => $request->idMProvinsi,
            'idMDaerah'                 => $request->idMDaerah,
            'idMKecamatan'              => $request->idMKecamatan,
            'idMDesa'                   => $request->idMDesa,
            'idMJenisPas'               => $pasien->idMJenisPas,
            'idFaskes'                  => $pasien->idFaskes,
            'nama'                      => $request->nama,
            'no_index'                  => $request->no_index,
            'no_kk'                     => $request->no_kk,
            'nik'                       => $request->nik,
            'no_ks'                     => $request->no_ks,
            'nama_kk'                   => $request->nama_kk,
            'no_hp'                     => $request->no_hp,
            'tanggal_lahir'             => date('Y-m-d', strtotime($request->tanggal_lahir)),
            'alamat'                    => $request->alamat,
            'rt'                        => $request->rt,
            'rw'                        => $request->rw,
            'kode'                      => $request->kode,
        ];
        // echo json_encode($dataPasien); die;
        $pasien = $this->mPasien->where('id', $id)->update($dataPasien);
        if ($request->has('pekerjaan1')) {
            DB::table('m_pekerjaan')->where('idMPasien', $id)->delete();
            for ($i = 0; $i < count($request->pekerjaan1); $i++) {
                $dataPekerjaan[] = [
                    'nama'          => $request->pekerjaan1[$i],
                    'idMPasien'     => $id,
                ];
            }
            // echo json_encode($dataPekerjaan); die;
            DB::table('m_pekerjaan')->insert($dataPekerjaan);
        }

        return redirect("$this->url")->with('sukses', 'Data Pasien berhasil di edit');
    }

    public function destroy($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();
        $this->mPasien->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Pasien' . $pasien->nama . ' berhasil di hapus');
    }
}
