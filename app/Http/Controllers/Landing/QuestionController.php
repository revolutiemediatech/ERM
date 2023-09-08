<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;

// Model
use App\Models\QuestionModel;
use App\Models\QuestionTypeModel;
use App\Models\QuestionPenerimaModel;
use App\Models\AnswerModel;
use App\Models\GoldarModel;
use App\Models\RhesusModel;
use App\Models\SekolahModel;
use App\Models\FaskesModel;

class QuestionController extends Controller
{    private $views      = 'landing/skrining_siswa';
    private $url        = '/e-uks/skrining-kesehatan-siswa';
    private $title      = "O'RBS MEDICA | E-UKS";

    public function __construct()
    {
        $this->mQuestion            = new QuestionModel();
        $this->mQuestionType        = new QuestionTypeModel();
        $this->mQuestionPenerima    = new QuestionPenerimaModel();
        $this->mAnswer              = new AnswerModel();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        // Get Data
        $questionPenerima   = $this->mQuestionPenerima->where('status', 1)->get();
        $penerima           = DB::table('question_user')->get();
        $questions          = $this->mQuestion->where('idQUser', 1)->get();
        $question1          = $this->mQuestion->where('idQUser', 2)->get();
        $golonganDarah      = GoldarModel::all();
        $rhesus             = RhesusModel::all();
        $sekolah            = SekolahModel::all();
        $faskes             = FaskesModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'type'              => $questionPenerima,
            'penerima'          => $penerima,
            'questions'         => $questions,
            'question1'         => $question1,
            'golonganDarah'     => $golonganDarah,
            'rhesus'            => $rhesus,
            'sekolah'           => $sekolah,
            'faskes'            => $faskes
        ];
        return view("$this->views/create", $data);
    }

    public function show($id)
    {
        // Get Data
        $penerima   = DB::table('question_user')->where('id', $id)->first();
        $questions  = $this->mQuestion->where('idQUser', $id)->get();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'id'        => $id,
            'penerima'  => $penerima,
            'questions' => $questions,
        ];
        return view("$this->views/show", $data);
    }

    public function store(Request $request)
    {
        // Validation
        // dd($request->all());

        // Get Data
        // $questions  = $this->mQuestion->selectRaw('id, idQSTipe')->where('idQUser', $id)->get();
        // dd($questions);

        // Table question_userData
        $dataUserData = [
            // 'idQUser'           => $id,
            'nama'              => $request->nama,
            'nik'               => $request->nik,
            'idFaskes'          => $request->idFaskes,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'no_hp'             => $request->no_hp,
            'idSekolah'         => $request->idSekolah,
            'idkelas'           => $request->kelas,
            'idQUser'           => $request->idQUser,
            'kki1'              => $request->kki1,
            'kki2'              => $request->kki2,
            'kki3'              => $request->kki3,
            'kki4'              => $request->kki4,
            'kki5'              => $request->kki5,
            'kki6'              => $request->kki6,
            'kki7'              => $request->kki7,
            'kki8'              => $request->kki8,
            'kki9'              => $request->kki9,
            'kki10'             => $request->kki10,
            'kki11'             => $request->kki11,
            'kki12'             => $request->kki12,
            'kki13'             => $request->kki13,
            'kki14'             => $request->kki14,
            'kki15'             => $request->kki15,
            'kki16'             => $request->kki16,
            'kki17'             => $request->kki17,
            'kki18'             => $request->kki18,
            'kki19'             => $request->kki19,
            'kki20'             => $request->kki20,
            'kki21'             => $request->kki21,
            'kki22'             => $request->kki22,
            'kki23'             => $request->kki23,
            'kki24'             => $request->kki24,
            'kki_do1'           => $request->kki_do1,
            'kki_do2'           => $request->kki_do2,
            'kki_do3'           => $request->kki_do3,
            'kki_do4'           => $request->kki_do4,
            'kki_do5'           => $request->kki_do5,
            'kki_do6'           => $request->kki_do6,
            'kki_do7'           => $request->kki_do7,
            'kki_do8'           => $request->kki_do8,
            'kki_do9'           => $request->kki_do9,
            'kki_do10'          => $request->kki_do10,
            'kki_do11'          => $request->kki_do11,
            'kki_do12'          => $request->kki_do12,
            'kki_do13'          => $request->kki_do13,
            'kki_do14'          => $request->kki_do14,
            'kki_do15'          => $request->kki_do15,
            'kki_do16'          => $request->kki_do16,
            'kki_do17'          => $request->kki_do17,
            'kki_do18'          => $request->kki_do18,
            'kki_do19'          => $request->kki_do19,
            'kki_do20'          => $request->kki_do20,
            'idMGoldar'         => $request->idMGoldar,
            'idRhesus'          => $request->idRhesus,
            'jenDis'            => $request->jenDis,
            'riwImDas'          => $request->riwImDas,
            'apKamSar'          => $request->apKamSar,
            'apKamJajSek'       => $request->apKamJajSek,
            'apOrtuMer'         => $request->apOrtuMer,
            'apKamMer'          => $request->apKamMer,
            'apOrAl'            => $request->apOrAl,
            'kesRep'            => $request->kesRep,
        ];
        DB::table('question_userData')->insert($dataUserData);
        $idUserData = DB::getPdo()->lastInsertId();
        
        // Table question_jawaban
        for ($i = 0; $i < count($request->piljaw); $i++)
        {
            $dataQuestion[] = [
                'idQUserData' => $idUserData,
                'idQUser' => $request->idQUser,
                'idQSoal' => $request->idQSoal[$i],
                'idQSTipe' => $request->idQSTipe[$i],
                'namaJawaban' => $request->piljaw[$i],
            ];
        }
        $this->mAnswer->insert($dataQuestion);

        // kirim wa dulu gag sih
        waThanksSD($request->no_hp, $request->nama);
        analisisSD($dataUserData, $dataQuestion);

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
}
