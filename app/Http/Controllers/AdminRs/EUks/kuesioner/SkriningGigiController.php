<?php

namespace App\Http\Controllers\AdminRs\EUks\kuesioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Library
use Illuminate\Support\Facades\Hash;

// Model
use App\Models\FaskesModel;


class SkriningGigiController extends Controller
{
    private $views      = 'adminRs/kuesioner/skrining_gigi';
    private $url        = 'adminRs/e-uks/pemeriksaan-gigi';
    private $title      = "O'RBS MEDICA | E-UKS";

    public function index()
    {
        //
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'faskes'           => $faskes
        ];
        return view("$this->views/create", $data);
    }

    public function store(Request $request)
    {
        // echo json_encode($request->all()); die();
        $dataUserData = [				
            'nama' 					=> $request->nama,	
            'nik' 					=> $request->nik,
            'idFaskes' 				=> $request->idFaskes,
            'tanggal_lahir' 		=> $request->tanggal_lahir,
            'jenis_kelamin' 		=> $request->jenis_kelamin,
            'no_hp' 				=> $request->no_hp,
            'idSekolah' 			=> $request->idSekolah,
            'kelas' 				=> $request->kelas,
            'D8_1' 					=> $request->D8_1,
            'D5_1' 					=> $request->D5_1,
            'D6_1' 					=> $request->D6_1,
            'D7_1' 					=> $request->D7_1,
            'D8_2' 					=> $request->D8_2,
            'D5_2' 					=> $request->D5_2,
            'D6_2' 					=> $request->D6_2,
            'D7_2' 					=> $request->D7_2,
            'D8_3' 					=> $request->D8_3,
            'D5_3' 					=> $request->D5_3,
            'D6_3' 					=> $request->D6_3,
            'D7_3' 					=> $request->D7_3,
            'D8_4' 					=> $request->D8_4,
            'D5_4' 					=> $request->D5_4,
            'D6_4' 					=> $request->D6_4,
            'D7_4' 					=> $request->D7_4,
            'D8_5' 					=> $request->D8_5,
            'D5_5' 					=> $request->D5_5,
            'D6_5' 					=> $request->D6_5,
            'D7_5' 					=> $request->D7_5,
            'E8_1' 					=> $request->E8_1,
            'E5_1' 					=> $request->E5_1,
            'E6_1' 					=> $request->E6_1,
            'E7_1' 					=> $request->E7_1,
            'E8_2' 					=> $request->E8_2,
            'E5_2' 					=> $request->E5_2,
            'E6_2' 					=> $request->E6_2,
            'E7_2' 					=> $request->E7_2,
            'E8_3' 					=> $request->E8_3,
            'E5_3' 					=> $request->E5_3,
            'E6_3' 					=> $request->E6_3,
            'E7_3' 					=> $request->E7_3,
            'E8_4' 					=> $request->E8_4,
            'E5_4' 					=> $request->E5_4,
            'E6_4' 					=> $request->E6_4,
            'E7_4' 					=> $request->E7_4,
            'E8_5' 					=> $request->E8_5,
            'E5_5' 					=> $request->E5_5,
            'E6_5' 					=> $request->E6_5,
            'E7_5' 					=> $request->E7_5,
            'F8_1' 					=> $request->F8_1,
            'F5_1' 					=> $request->F5_1,
            'F6_1' 					=> $request->F6_1,
            'F7_1' 					=> $request->F7_1,
            'F8_2' 					=> $request->F8_2,
            'F5_2' 					=> $request->F5_2,
            'F6_2' 					=> $request->F6_2,
            'F7_2' 					=> $request->F7_2,
            'F8_3' 					=> $request->F8_3,
            'F5_3' 					=> $request->F5_3,
            'F6_3' 					=> $request->F6_3,
            'F7_3' 					=> $request->F7_3,
            'F8_4' 					=> $request->F8_4,
            'F5_4' 					=> $request->F5_4,
            'F6_4' 					=> $request->F6_4,
            'F7_4' 					=> $request->F7_4,
            'F8_5' 					=> $request->F8_5,
            'F5_5' 					=> $request->F5_5,
            'F6_5' 					=> $request->F6_5,
            'F7_5' 					=> $request->F7_5,
            'def_kgb'  				=> $request->def_kgb,
            'dmf_D4_1' 				=> $request->dmf_D4_1,
            'dmf_D1_1' 				=> $request->dmf_D1_1,
            'dmf_D2_1' 				=> $request->dmf_D2_1,
            'dmf_D3_1' 				=> $request->dmf_D3_1,
            'dmf_D4_2' 				=> $request->dmf_D4_2,
            'dmf_D1_2' 				=> $request->dmf_D1_2,
            'dmf_D2_2' 				=> $request->dmf_D2_2,
            'dmf_D3_2' 				=> $request->dmf_D3_2,
            'dmf_D4_3' 				=> $request->dmf_D4_3,
            'dmf_D1_3' 				=> $request->dmf_D1_3,
            'dmf_D2_3' 				=> $request->dmf_D2_3,
            'dmf_D3_3' 				=> $request->dmf_D3_3,
            'dmf_D4_4' 				=> $request->dmf_D4_4,
            'dmf_D1_4' 				=> $request->dmf_D1_4,
            'dmf_D2_4' 				=> $request->dmf_D2_4,
            'dmf_D3_4' 				=> $request->dmf_D3_4,
            'dmf_D4_5' 				=> $request->dmf_D4_5,
            'dmf_D1_5' 				=> $request->dmf_D1_5,
            'dmf_D2_5' 				=> $request->dmf_D2_5,
            'dmf_D3_5' 				=> $request->dmf_D3_5,
            'dmf_D4_6' 				=> $request->dmf_D4_6,
            'dmf_D1_6' 				=> $request->dmf_D1_6,
            'dmf_D2_6' 				=> $request->dmf_D2_6,
            'dmf_D3_6' 				=> $request->dmf_D3_6,
            'dmf_D4_7' 				=> $request->dmf_D4_7,
            'dmf_D1_7' 				=> $request->dmf_D1_7,
            'dmf_D2_7' 				=> $request->dmf_D2_7,
            'dmf_D3_7' 				=> $request->dmf_D3_7,
            'dmf_D4_8'              => $request->dmf_D4_8,
            'dmf_D1_8'              => $request->dmf_D1_8,
            'dmf_D2_8'              => $request->dmf_D2_8,
            'dmf_D3_8'              => $request->dmf_D3_8,
            'dmf_M4_1' 				=> $request->dmf_M4_1,
            'dmf_M1_1' 				=> $request->dmf_M1_1,
            'dmf_M2_1' 				=> $request->dmf_M2_1,
            'dmf_M3_1' 				=> $request->dmf_M3_1,
            'dmf_M4_2' 				=> $request->dmf_M4_2,
            'dmf_M1_2' 				=> $request->dmf_M1_2,
            'dmf_M2_2' 				=> $request->dmf_M2_2,
            'dmf_M3_2' 				=> $request->dmf_M3_2,
            'dmf_M4_3' 				=> $request->dmf_M4_3,
            'dmf_M1_3' 				=> $request->dmf_M1_3,
            'dmf_M2_3' 				=> $request->dmf_M2_3,
            'dmf_M3_3' 				=> $request->dmf_M3_3,
            'dmf_M4_4' 				=> $request->dmf_M4_4,
            'dmf_M1_4' 				=> $request->dmf_M1_4,
            'dmf_M2_4' 				=> $request->dmf_M2_4,
            'dmf_M3_4' 				=> $request->dmf_M3_4,
            'dmf_M4_5' 				=> $request->dmf_M4_5,
            'dmf_M1_5' 				=> $request->dmf_M1_5,
            'dmf_M2_5' 				=> $request->dmf_M2_5,
            'dmf_M3_5' 				=> $request->dmf_M3_5,
            'dmf_M4_6' 				=> $request->dmf_M4_6,
            'dmf_M1_6' 				=> $request->dmf_M1_6,
            'dmf_M2_6' 				=> $request->dmf_M2_6,
            'dmf_M3_6' 				=> $request->dmf_M3_6,
            'dmf_M4_7' 				=> $request->dmf_M4_7,
            'dmf_M1_7' 				=> $request->dmf_M1_7,
            'dmf_M2_7' 				=> $request->dmf_M2_7,
            'dmf_M3_7' 				=> $request->dmf_M3_7,
            'dmf_M4_8'              => $request->dmf_M4_8,
            'dmf_M1_8'              => $request->dmf_M1_8,
            'dmf_M2_8'              => $request->dmf_M2_8,
            'dmf_M3_8'              => $request->dmf_M3_8,
            'dmf_kgb' 				=> $request->dmf_kgb,
            'dmf_F4_1' 				=> $request->dmf_F4_1,
            'dmf_F1_1' 				=> $request->dmf_F1_1,
            'dmf_F2_1' 				=> $request->dmf_F2_1,
            'dmf_F3_1' 				=> $request->dmf_F3_1,
            'dmf_F4_2' 				=> $request->dmf_F4_2,
            'dmf_F1_2' 				=> $request->dmf_F1_2,
            'dmf_F2_2' 				=> $request->dmf_F2_2,
            'dmf_F3_2' 				=> $request->dmf_F3_2,
            'dmf_F4_3' 				=> $request->dmf_F4_3,
            'dmf_F1_3' 				=> $request->dmf_F1_3,
            'dmf_F2_3' 				=> $request->dmf_F2_3,
            'dmf_F3_3' 				=> $request->dmf_F3_3,
            'dmf_F4_4' 				=> $request->dmf_F4_4,
            'dmf_F1_4' 				=> $request->dmf_F1_4,
            'dmf_F2_4' 				=> $request->dmf_F2_4,
            'dmf_F3_4' 				=> $request->dmf_F3_4,
            'dmf_F4_5' 				=> $request->dmf_F4_5,
            'dmf_F1_5' 				=> $request->dmf_F1_5,
            'dmf_F2_5' 				=> $request->dmf_F2_5,
            'dmf_F3_5' 				=> $request->dmf_F3_5,
            'dmf_F4_6' 				=> $request->dmf_F4_6,
            'dmf_F1_6' 				=> $request->dmf_F1_6,
            'dmf_F2_6' 				=> $request->dmf_F2_6,
            'dmf_F3_6' 				=> $request->dmf_F3_6,
            'dmf_F4_7' 				=> $request->dmf_F4_7,
            'dmf_F1_7' 				=> $request->dmf_F1_7,
            'dmf_F2_7' 				=> $request->dmf_F2_7,
            'dmf_F3_7' 				=> $request->dmf_F3_7,
            'dmf_F4_8'              => $request->dmf_F4_8,
            'dmf_F1_8'              => $request->dmf_F1_8,
            'dmf_F2_8'              => $request->dmf_F2_8,
            'dmf_F3_8'              => $request->dmf_F3_8,
        ];
        // echo json_encode($dataUserData); die;
        DB::table('answer_gigi')->insert($dataUserData);

        // kirim wa dulu gag sih
        waThanksSD($request->no_hp, $request->nama);
        
        // Response
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

    public function show($id)
    {
        // Get Data
        $penerima   = DB::table('answer_gigi')->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'id'        => $id,
            'penerima'  => $penerima,
        ];
        return view("$this->views/show", $data);
    }
}
