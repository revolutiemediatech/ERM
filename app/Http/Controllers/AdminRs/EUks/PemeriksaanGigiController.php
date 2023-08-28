<?php

namespace App\Http\Controllers\AdminRs\EUks;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan\PemeriksaanGigiModel;
use Illuminate\Http\Request;

class PemeriksaanGigiController extends Controller
{
    private $views      = 'adminRs/eUks/pemeriksaan_gigi';
    private $url        = 'adminRs/pemeriksaan-gigi';
    private $title      = 'Halaman Data Pemeriksaan';

    public function __construct()
    {
        // 
    }

    public function index()
    {
        $skrining_gigi_paud = PemeriksaanGigiModel::where('kelas', 'PAUD')->get();
        $skrining_gigi_tk = PemeriksaanGigiModel::where('kelas', 'TK')->get();

        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Data Pemeriksaan Gigi',
            'skrining_gigi_paud'    => $skrining_gigi_paud,
            'skrining_gigi_tk'      => $skrining_gigi_tk,
        ];

        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        // Get Data
        $skrining_gigi   = PemeriksaanGigiModel::where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'id'                => $id,
            'skrining_gigi'     => $skrining_gigi,
        ];
        return view("$this->views/show", $data);
    }
}
