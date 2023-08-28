<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PasienModel;
use App\Models\PekerjaanModel;

class HistorykunjunganController extends Controller
{
    private $views      = 'dokter/history';
    private $url        = 'dokter/rawat-jalan/history';
    private $title      = 'Halaman Data History Kunjungan';
    protected $mPasien;

    public function __construct()
    {
        // Di isi Construct
        $this->mPasien              = New PasienModel();
    }

    public function show($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanPekerjaan   = PekerjaanModel::where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
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
        ];
        return view($this->views . "/show", $data);
    }
}
