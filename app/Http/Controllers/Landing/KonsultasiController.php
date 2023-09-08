<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;

// Model
use App\Models\KonsultasiModel;
use App\Models\FaskesModel;
use App\Models\TopikEKonsultasiModel;

class KonsultasiController extends Controller
{    
    private $views      = 'landing/e_konsultasi';
    private $url        = '/e-konsultasi/konsultasi';
    private $title      = "O'RBS MEDICA | E-Konsultasi";

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
        $topik  = TopikEKonsultasiModel::all();
        $faskes = FaskesModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            // 'page'          => 'Tambah Data Konsultasi',
            'topik'         => $topik,
            'faskes'        => $faskes
        ];

        return view($this->views . "/create", $data);
    }
    public function store(Request $request)
    {
        // Validation
        $dataKonsultasi = [
            'idFaskes'       => $request->idFaskes,
            'nama_lengkap'   => $request->nama_lengkap,
            'no_bpjs'        => $request->no_bpjs,
            'no_wa'          => $request->no_wa,
            'idTopik'        => $request->idTopik,
            'pesan'          => $request->pesan,
            'status'         => 1,
        ];
        // echo json_encode($dataKonsultasi); die();
        KonsultasiModel::insert($dataKonsultasi);

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
