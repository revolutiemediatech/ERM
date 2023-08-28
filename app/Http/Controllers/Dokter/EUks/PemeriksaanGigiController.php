<?php

namespace App\Http\Controllers\Admin\EUks;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan\PemeriksaanGigiModel;
use Illuminate\Http\Request;

class PemeriksaanGigiController extends Controller
{
    private $views      = 'admin/eUks/pemeriksaan_gigi';
    private $url        = 'admin/pemeriksaan-gigi';
    private $title      = 'Halaman Data Pemeriksaan';

    public function __construct()
    {
        // 
    }

    public function index()
    {
        $skrining_gigi = PemeriksaanGigiModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Pemeriksaan Gigi',
            'skrining_gigi'     => $skrining_gigi,
        ];

        return view($this->views . "/index", $data);
    }
}
