<?php

namespace App\Http\Controllers\Admin\EPerkesmas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KunjunganPerkesmasModel;

class InvalidController extends Controller
{
    private $views      = 'admin/eperkesmas/data_invalid';
    private $url        = 'admin/pasien-invalid-eperkesmas';
    private $title      = 'Halaman Data Pasien E-Homecare Invalid';

    public function index()
    {
        $kunjungan = KunjunganPerkesmasModel::where('status', 2)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pasien Invalid E-Homecare',
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
