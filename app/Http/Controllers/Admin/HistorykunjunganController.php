<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PasienModel;
use App\Models\PekerjaanModel;
use App\Models\PengajuanAssesmentModel;
use App\Models\PengajuanTindakanModel;
use App\Models\PenyakitDahuluModel;
use App\Models\RiwayatAlergiModel;

class HistorykunjunganController extends Controller
{
    private $views      = 'admin/history';
    private $url        = 'admin/rawat-jalan/history';
    private $title      = 'Halaman Data History Kunjungan';
    protected $mPasien;

    public function __construct()
    {
        // Di isi Construct
        $this->mPasien              = New PasienModel();
        $this->mPekerjaan           = New PekerjaanModel();
    }

    public function show($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $penyakitDahulu     = PenyakitDahuluModel::where('idMPasien', $id)->get();
        $riwayatAlergi      = RiwayatAlergiModel::where('idMPasien', $id)->get();
        $pilihanAssesment   = PengajuanAssesmentModel::where('idMPasien', $id)->get();
        $pilihanTinMed      = PengajuanTindakanModel::where('idMPasien', $id)->get();
        $birthDate          = new \DateTime($tanggal_lahir);
        $today = new \DateTime("today");
        if ($birthDate > $today) {
            return "0 tahun 0 bulan 0 hari";
        }
        $y = $today->diff($birthDate)->y;
        // dd($y);
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        $HPasien = $this->mPasien->where('nama', $pasien['nama'])->get();
        // echo json_encode($HPasien); die;
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data History Kunjungan',
            'id'                => $id,
            'pasien'            => $pasien,
            'usia'              => $y,
            'HPasien'           => $HPasien,
            'pilihanPekerjaan'  => $pilihanPekerjaan,
            'pilihanAssesment'  => $pilihanAssesment,
            'pilihanTinMed'     => $pilihanTinMed,
            'penyakitDahulu'    => $penyakitDahulu,
            'riwayatAlergi'     => $riwayatAlergi
        ];
        return view($this->views . "/show", $data);
    }
}
