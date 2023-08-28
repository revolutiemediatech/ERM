<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;

// Model
use App\Models\Pemeriksaan\PemeriksaanModel;
use App\Models\Pemeriksaan\PemeriksaanJawabanModel;
use App\Models\Pemeriksaan\PemeriksaanJenisModel;
use App\Models\Pemeriksaan\PemeriksaanPertanyaanModel;
use App\Models\Pemeriksaan\PemeriksaanPilihanModel;

class PemeriksaanController extends Controller
{   
    private $views      = 'landing/pemeriksaan';
    private $url        = '/e-skrining';
    private $title      = "O'RBS MEDICA | E-UKS";

    public function __construct()
    {
        $this->mPemeriksaan         = new PemeriksaanModel();
        $this->mPemeriksaanJawaban  = new PemeriksaanJawabanModel();
        $this->mPemeriksaanJenis    = new PemeriksaanJenisModel();
        $this->mPemeriksaanPertanyaan   = new PemeriksaanPertanyaanModel();
        $this->mPemeriksaanPilihan  = new PemeriksaanPilihanModel();
    }

    public function form($id=null)
    {
        $jenis      = $this->mPemeriksaanJenis->where('breadcumb', $id)->first(['id', 'nama', 'breadcumb']);
        if(!$jenis){
            return redirect('/');
        }
        $pertanyaan = $this->mPemeriksaanPertanyaan->where('pemeriksaan_jenis_id', $jenis->id)->get(['id', 'pertanyaan', 'keterangan', 'required', 'isian', 'type']);

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'jenis'             => $jenis,
            'pertanyaan'        => $pertanyaan
        ];
        return view("$this->views/form", $data);
    }

    public function formSubmit($id=null, Request $request)
    {
        $jenis      = $this->mPemeriksaanJenis->where('breadcumb', $id)->first(['id']);

        $dataPengisi = [
            'pemeriksaan_jenis_id'  => $jenis->id,
            'nama'              => $request->nama,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'no_hp'             => $request->no_hp,
            'idSekolah'         => $request->idSekolah,
        ];
        $pengisi = $this->mPemeriksaan->create($dataPengisi);
        
        for($x=1; $x<=count($request->pertanyaanId); $x++){
            $pertanyaan = $this->mPemeriksaanPertanyaan->where('id', $request->pertanyaanId[$x])->first(['id', 'isian']);

            if($pertanyaan->isian == 0){ // essay
                $pilihanId  = 0;
                $jawaban    = $request->jawaban[$x];
            }else if($pertanyaan->isian == 1){ // pilgan
                $pilihanId  = $request->jawaban[$x];

                $pilihan    = $this->mPemeriksaanPilihan->where('id', $request->jawaban[$x])->first(['id', 'jawaban']);
                $jawaban    = $pilihan->jawaban ?? 0;
            }

            $dataJawaban = [
                'pemeriksaan_id'    => $pengisi->id,
                'pemeriksaan_pertanyaan_id'     => $request->pertanyaanId[$x],
                'pemeriksaan_pilihan_id'        => $pilihanId,
                'jawaban'           => $jawaban
            ];
            $this->mPemeriksaanJawaban->create($dataJawaban);
        }
        
        // kirim wa dulu gag sih
        waThanksSD($request->no_hp, $request->nama);

        return redirect('/')->with('success', 'Terima kasih atas pengisiannya '.$request->nama);
    }

    public function list()
    {
        $jenis      = $this->mPemeriksaanJenis->get(['id', 'nama', 'breadcumb']);
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Skrinning',
            'jenis'         => $jenis
        ];
        
        return view($this->views . "/list", $data);
    }

    public function download($id=null)
    {
        $pemeriksaanJenis   = $this->mPemeriksaanJenis->where('breadcumb', $id)->first();
        $pertanyaan         = $this->mPemeriksaanPertanyaan->where('pemeriksaan_jenis_id', $pemeriksaanJenis->id)->get();
        $responden          = $this->mPemeriksaan->where('pemeriksaan_jenis_id', $pemeriksaanJenis->id)->get();
        // echo json_encode($responden); die;

        $data = [
            'title'         => 'Hasil Responden Skrining '.$pemeriksaanJenis->nama,
            'url'           => $this->url,
            'page'          => 'Halaman Data Skrinning',
            'pemeriksaanJenis'   => $pemeriksaanJenis,
            'pertanyaan'    => $pertanyaan,
            'responden'     => $responden
        ];
        
        return view($this->views . "/download", $data);
    }
}