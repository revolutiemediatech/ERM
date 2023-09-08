<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;

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
        $faskes = FaskesModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            // 'page'          => 'Tambah Data Aduan',
            'faskes'        => $faskes
        ];

        return view($this->views . "/create", $data);
    }
    public function store(Request $request)
    {
        // Validation
        $dataAduan = [
            'idFaskes'       => $request->idFaskes,
            'nama'           => $request->nama,
            'no_hp'          => $request->no_hp,
            'keluhan'        => $request->keluhan,
            'status'         => 1,
        ];
        // echo json_encode($dataAduan); die();
        AduanModel::insert($dataAduan);

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
