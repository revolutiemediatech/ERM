<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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

class PasienRujukanController extends Controller
{
    private $views      = 'admin/pasien_rujukan';
    private $url        = 'admin/rujukan';
    private $title      = 'Halaman Data Pasien Alih Rawat Inap';
    protected $mDiagnosa;
    protected $mPasien;
    protected $mBed;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mPasien      = New PasienModel();
        $this->mBed         = New BedModel();
        $this->mPekerjaan   = New PekerjaanModel();
    }

    public function index()
    {
        $pasien = $this->mPasien->where('idTinLan', 2)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Pasien Alih Rawat Inap',
            'pasien'      => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    public function edit($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
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
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Pasien Alih Rawat Inap',
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
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        if ($request->idMPerawatan == 2) {
            $dataStatus = [
                'status'                => 7
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        };
        $pasien = $this->mPasien->where('id', $request->id)->first();
        $dataPasien = [
            'tanggal'                   => $pasien->tanggal,
            'idUsers'                   => session()->get('users_id'),
            'idLokasiPemeriksaan'       => $pasien->idLokasiPemeriksaan,
            'idMPerawatan'              => $request->idMPerawatan,
            'idMUnitPelayanan'          => $pasien->idMUnitPelayanan,
            'idMKunjunganSakit'         => $pasien->idMKunjunganSakit,
            // 'idMJenisKun'               => $pasien->idMJenisKun,
            'idMJenisKel'               => $pasien->idMJenisKel,
            'idMGoldar'                 => $pasien->idMGoldar,
            'idMPendidikan'             => $pasien->idMPendidikan,
            'idMPekerjaan'              => $pasien->idMPekerjaan,
            'idMProvinsi'               => $pasien->idMProvinsi,
            'idMDaerah'                 => $pasien->idMDaerah,
            'idMKecamatan'              => $pasien->idMKecamatan,
            'idMDesa'                   => $pasien->idMDesa,
            'idMJenisPas'               => $pasien->idMJenisPas,
            'idFaskes'                  => $pasien->idFaskes,
            'nama'                      => $pasien->nama,
            'no_index'                  => $pasien->no_index,
            'no_kk'                     => $pasien->no_kk,
            'nik'                       => $pasien->nik,
            'no_ks'                     => $pasien->no_ks,
            'nama_kk'                   => $pasien->nama_kk,
            'no_hp'                     => $pasien->no_hp,
            'tanggal_lahir'             => date('Y-m-d', strtotime($pasien->tanggal_lahir)),
            'idKamar'                   => $request->idKamar,
            'idBed'                     => $request->idBed,
            'alamat'                    => $pasien->alamat,
            'rt'                        => $pasien->rt,
            'rw'                        => $pasien->rw,
            'kode'                      => $pasien->kode,
            'status'                    => 4
        ];
        $pasien = $this->mPasien->where('id', $id)->create($dataPasien);

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
        $dataBed = [
            'idPasien'  => $id,
        ];
        $bed = $this->mBed->where('id', $dataPasien['idBed'])->update($dataBed);

        return redirect("$this->url")->with('sukses', 'Data Pasien berhasil di Tambahkan');
    }

}
