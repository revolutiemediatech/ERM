<?php

namespace App\Http\Controllers\Admin\EPerkesmas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KunjunganPerkesmasModel;

class ValidController extends Controller
{
    private $views      = 'admin/eperkesmas/data_valid';
    private $url        = 'admin/pasien-valid-eperkesmas';
    private $title      = 'Halaman Data Pasien E-Homecare Valid';

    public function index()
    {
        $kunjungan = KunjunganPerkesmasModel::where('status', 1)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pasien Valid E-Homecare',
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
