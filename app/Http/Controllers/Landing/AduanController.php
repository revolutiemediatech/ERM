<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Str;

// Model
use App\Models\AduanModel;
use App\Models\FaskesModel;

class AduanController extends Controller
{
    private $views      = 'landing/e_aduan';
    private $url        = '/e-aduan/aduan';
    private $title      = "O'RBS MEDICA | E-Aduan";

    public function __construct()
    {
        //
    }

    public function index()
    {
        //
    }

    public function create()
    {
        // Get Data
        $faskes     = FaskesModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            // 'page'          => 'Tambah Data Konsultasi',
            'faskes'        => $faskes
        ];

        return view($this->views . "/create", $data);
    }
    public function store(Request $request)
    {
        $dataKunjungan = [
            'idFaskes'          => $request->idFaskes,
            'no_hp'             => $request->no_hp,
            'nama'              => $request->nama,
            'bagian_pelayanan'  => $request->bagian_pelayanan,
            'keluhan'           => $request->keluhan,
            'kode_unik'         => rand(000000, 999999),
            'status'            => 0, 
        ];
        // echo json_encode($dataKunjungan);
        AduanModel::insert($dataKunjungan);
        return redirect("$this->url/thanks")->with('sukses', 'Terima Kasih telah Memberikan Jawaban');
    }
    
    public function thanks()
    {
        // Get Data

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
        ];
        return view("$this->views/thanks", $data);
    }
}
