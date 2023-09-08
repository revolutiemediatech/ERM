<?php

namespace App\Http\Controllers\Admin\EPerkesmas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KunjunganPerkesmasModel;

class RekapitulasiController extends Controller
{
    private $views      = 'admin/eperkesmas/rekapitulasi';
    private $url        = 'admin/rekapitulasi_E-Home-Care';
    private $title      = 'Halaman Data Pasien E-Homecare';

    public function index()
    {
        $kunjungan = KunjunganPerkesmasModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pasien E-Homecare',
            'kunjungan'     => $kunjungan
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $kunjungan   = KunjunganPerkesmasModel::where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'id'            => $id,
            'kunjungan'     => $kunjungan,
        ];
        return view($this->views . "/show", $data);
    }
}
