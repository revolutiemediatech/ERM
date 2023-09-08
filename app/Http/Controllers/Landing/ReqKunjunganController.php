<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Str;

// Model
use App\Models\KunjunganPerkesmasModel;
use App\Models\FaskesModel;
use App\Models\WilayahPerkesmasModel;

class ReqKunjunganController extends Controller
{
    private $views      = 'landing/e_perkesmas';
    private $url        = '/e-perkesmas/request-kunjungan';
    private $title      = "O'RBS MEDICA | E-Perkesmas";

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
        $wilayah    = WilayahPerkesmasModel::all();
        $faskes     = FaskesModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            // 'page'          => 'Tambah Data Konsultasi',
            'wilayah'       => $wilayah,
            'faskes'        => $faskes
        ];

        return view($this->views . "/create", $data);
    }
    public function store(Request $request)
    {
        if (!isset($request->file)) { // ini kalo ga input gambar
            $dataKunjungan = [
                'idFaskes'       => $request->idFaskes,
                'no_bpjs'        => $request->no_bpjs,
                'idWilayah'      => $request->idWilayah,
                'rt'             => $request->rt,
                'rw'             => $request->rw,
                'alamat'         => $request->alamat,
                'keluhan'        => $request->keluhan,
                'kode_unik'      => rand(000000, 999999),
                'status'         => 0,
            ];
            // echo json_encode($dataKunjungan);
            KunjunganPerkesmasModel::insert($dataKunjungan);
        }else{
            if ($request->hasFile('file')) {
                $file       = $request->file('file');
                $fileName   = Str::uuid()."-".time().".".$file->extension();
                $file->move( "upload/kunjungan_EPerkesmas/", $fileName);
            }
            $dataKunjungan = [
                'idFaskes'       => $request->idFaskes,
                'no_bpjs'        => $request->no_bpjs,
                'idWilayah'      => $request->idWilayah,
                'rt'             => $request->rt,
                'rw'             => $request->rw,
                'alamat'         => $request->alamat,
                'keluhan'        => $request->keluhan,
                'file'           => $fileName,
                'kode_unik'      => rand(000000, 999999),
                'status'         => 0, 
            ];
            // echo json_encode($dataKunjungan);
            KunjunganPerkesmasModel::insert($dataKunjungan);
        }
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
