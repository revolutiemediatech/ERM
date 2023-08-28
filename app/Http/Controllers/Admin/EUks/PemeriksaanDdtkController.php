<?php

namespace App\Http\Controllers\Admin\EUks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;

// Model
use App\Models\JawabanDdtkModel;

class PemeriksaanDdtkController extends Controller
{
    private $views      = 'admin/eUks/pemeriksaan_ddtk';
    private $url        = 'admin/pemeriksaan-ddtk';
    private $title      = 'Data Jawaban Kuesioner';

    public function __construct()
    {
        //
    }

    public function index()
    {
        $jawaban_ddtk     = JawabanDdtkModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Pemeriksaan DDTK',
            'jawaban_ddtk'      => $jawaban_ddtk,
        ];

        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        // Get Data
        $jawaban_ddtk   = JawabanDdtkModel::where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'id'                => $id,
            'jawaban_ddtk'     => $jawaban_ddtk,
        ];
        return view("$this->views/show", $data);
    }
}
