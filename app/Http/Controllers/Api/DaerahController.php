<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProvinsiModel;
use App\Models\DaerahModel;
use App\Models\KecamatanModel;
use App\Models\DesaModel;
use App\Models\PasienModel;
use App\Models\AutofillModel;
use App\Models\SekolahModel;

class DaerahController extends Controller
{
    protected $mProvinsi;
    protected $mDaerah;
    protected $mKecamatan;
    protected $mDesa;
    protected $mPasien;
    protected $mAutofill;

    public function __construct()
    {
        $this->mProvinsi           = new ProvinsiModel();
        $this->mDaerah             = new DaerahModel();
        $this->mKecamatan          = new KecamatanModel();
        $this->mDesa               = new DesaModel();
        $this->mPasien             = new PasienModel();
        $this->mAutofill           = new AutofillModel();
    }

    public function getAllProvinsi()
    {
        $provinsi = $this->mProvinsi->get();
        $data = [
            'error_code'    => 0,
            'data'          => $provinsi,
        ];
        echo json_encode($data);
    }

    public function getDaerah($idMprovinsi = null)
    {
        $daerah = $this->mDaerah->where('idMprovinsi', $idMprovinsi)->get();
        $data = [
            'error_code'    => 0,
            'data'          => $daerah,
        ];
        echo json_encode($data);
    }

    public function getKecamatan($idMdaerah = null)
    {
        $kecamatan = $this->mKecamatan->where('idMdaerah', $idMdaerah)->get();
        $data = [
            'error_code'    => 0,
            'data'          => $kecamatan,
        ];
        echo json_encode($data);
    }

    public function getDesa($idMkecamatan = null)
    {
        $desa = $this->mDesa->where('idMkecamatan', $idMkecamatan)->get();
        $data = [
            'error_code'    => 0,
            'data'          => $desa,
        ];
        echo json_encode($data);
    }

    public function getSekolah($idMkecamatan = null)
    {
        $sekolah = SekolahModel::where('idMkecamatan', $idMkecamatan)->get();
        $data = [
            'error_code'    => 0,
            'data'          => $sekolah,
        ];
        echo json_encode($data);
    }

    public function getDataPasSA($no_kk = null)
    {
        $pasien = $this->mPasien->where('no_kk', $no_kk)->first();
        if ($pasien) {
            $data = [
                'error_code'    => 0,
                'data'          => [
                    'nama'          => $pasien->nama,
                    'alamat'        => $pasien->alamat,
                    'tanggal_lahir' => $pasien->tanggal_lahir,
                    'no_index'      => $pasien->no_index,
                    'nik'           => $pasien->nik,
                    'no_ks'         => $pasien->no_ks,
                    'nama_kk'       => $pasien->nama_kk,
                    'no_hp'         => $pasien->no_hp,
                    'rt'            => $pasien->rt,
                    'rw'            => $pasien->rw,
                ],
            ];
        } else {
            $data = [
                'error_code' => 1,
                'data' => null,
            ];
        }
        echo json_encode($data);
    }

    public function getCustom($custom = null)
    {
        $autofill = $this->mAutofill->where('urut', $custom)->first();
        if ($autofill) {
            $data = [
                'error_code'    => 0,
                'data'          => [
                        'eye'               => $autofill->eye, 
                        'verbal'            => $autofill->verbal, 
                        'motorik'           => $autofill->motorik, 
                        'keadaan_umum'      => $autofill->keadaan_umum, 
                        'rr'                => $autofill->rr, 
                        'suhu'              => $autofill->suhu, 
                        'spo2'              => $autofill->spo2, 
                        'ca1'               => $autofill->ca1, 
                        'ca2'               => $autofill->ca2,
                        'si1'               => $autofill->si1,
                        'si2'               => $autofill->si2,
                        'rc1'               => $autofill->rc1,
                        'rc2'               => $autofill->rc2,
                        's1_2'              => $autofill->s1_2,
                        'murmur1'           => $autofill->murmur1,
                        'murmur2'           => $autofill->murmur2,
                        'gallop1'           => $autofill->gallop1,
                        'gallop2'           => $autofill->gallop2,
                        'sdv1'              => $autofill->sdv1,
                        'sdv2'              => $autofill->sdv2,
                        'rh1'               => $autofill->rh1,
                        'rh2'               => $autofill->rh2,
                        'wh1'               => $autofill->wh1,
                        'wh2'               => $autofill->wh2,
                        'retraksi1'         => $autofill->retraksi1,
                        'retraksi2'         => $autofill->retraksi2,
                        'kontur'            => $autofill->kontur,
                        'defans'            => $autofill->defans,
                        'bu1'               => $autofill->bu1,
                        'bu2'               => $autofill->bu2,
                        'nt1'               => $autofill->nt1,
                        'nt2'               => $autofill->nt2,
                        'crt'               => $autofill->crt,
                        'akral'             => $autofill->akral,
                        'edema1'            => $autofill->edema1,
                        'edema2'            => $autofill->edema2,
                ],
            ];
        } else {
            $data = [
                'error_code' => 1,
                'data' => null,
            ];
        }
        echo json_encode($data);
    }
}
