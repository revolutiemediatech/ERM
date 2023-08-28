<?php

namespace App\Http\Controllers\Admin\EUks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;

// Model
use App\Models\JawabanSdSmaModel;

class PemeriksaanSdSmaController extends Controller
{
    private $views      = 'admin/eUks/pemeriksaan_sd';
    private $url        = 'admin/pemeriksaan-sd-sma';
    private $title      = 'Data Jawaban Kuesioner';

    public function __construct()
    {
        //
    }

    public function index()
    {
        $jawaban_sd     = JawabanSdSmaModel::whereRaw('idKelas <= 6')->get();
        $jawaban_smp    = JawabanSdSmaModel::whereRaw('idKelas >= 7 and idKelas <= 9')->get();
        $jawaban_sma    = JawabanSdSmaModel::whereRaw('idKelas >= 10 and idKelas <= 12')->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Pemeriksaan SD - SMA',
            'jawaban_sd'        => $jawaban_sd,
            'jawaban_smp'       => $jawaban_smp,
            'jawaban_sma'       => $jawaban_sma,
        ];

        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        // Get Data
        $jawaban_sdSma   = JawabanSdSmaModel::where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'id'                => $id,
            'jawaban_sdSma'     => $jawaban_sdSma,
        ];
        return view("$this->views/show", $data);
    }
}
