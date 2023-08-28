<?php

namespace App\Http\Controllers\Dokter\EUks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;

// Model
use App\Models\QuestionModel;
use App\Models\QuestionTypeModel;
use App\Models\QuestionPenerimaModel;
use App\Models\AnswerModel;
use App\Models\QuestionUserModel;

class Answer extends Controller
{
    private $views      = 'dokter/eUks/answer';
    private $url        = 'dokter/answer';
    private $title      = 'Data Jawaban Kuesioner';

    public function __construct()
    {
        $this->mQuestion            = new QuestionModel();
        $this->mQuestionType        = new QuestionTypeModel();
        $this->mQuestionPenerima    = new QuestionPenerimaModel();
        $this->mAnswer              = new AnswerModel();
        $this->mQuestionUser        = new QuestionUserModel();
    }

    public function index()
    {
        // Get Data
        $questionPenerima   = $this->mQuestionPenerima->all();

        $data = [
            'title'             => $this->title,
            'page'              => 'Data Jawaban',
            'url'               => $this->url,
            'questionPenerima'  => $questionPenerima,
        ];
        return view("$this->views/index", $data);
    }

    public function penjawab($idQUser = null)
    {
        // Get Data
        $answerPenerima     = $this->mQuestionUser->where('idQUser', $idQUser)->get();
        $penerima           = $this->mQuestionPenerima->where('id', $idQUser)->first();

        $data = [
            'title'             => $this->title,
            'page'             => 'Data Pengisi Jenis ' . $penerima->nama,
            'url'               => $this->url,
            'answerPenerima'    => $answerPenerima,
        ];
        // dd()
        return view("$this->views/penjawab", $data);
    }

    public function jawaban($idQUserData = null)
    {
        // Get Data
        $answerUser = $this->mQuestionUser->where('id', $idQUserData)->first();
        $answering  = $this->mQuestionUser->getAnswerQuestion($idQUserData)->get();

        $data = [
            'title'             => $this->title,
            'page'              => 'Detail Jawaban milik ' . $answerUser->nama,
            'url'               => $this->url,
            'idQUserData'       => $idQUserData,
            'answerUser'        => $answerUser,
            'answering'         => $answering,
        ];
        return view("$this->views/jawaban", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
