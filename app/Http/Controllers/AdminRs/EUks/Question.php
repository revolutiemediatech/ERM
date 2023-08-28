<?php

namespace App\Http\Controllers\AdminRs\EUks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;

// Model
use App\Models\QuestionModel;
use App\Models\QuestionTypeModel;
use App\Models\QuestionPenerimaModel;

class Question extends Controller
{
    private $views      = 'adminRs/eUks/question';
    private $url        = 'adminRs/question';
    private $title      = 'Data Jenis Reponden';

    public function __construct()
    {
        $this->mQuestion            = new QuestionModel();
        $this->mQuestionType        = new QuestionTypeModel();
        $this->mQuestionPenerima    = new QuestionPenerimaModel();
    }

    public function index()
    {
        // Get Data
        // $questions          = $this->mQuestion->getQuestion();
        $questionPenerima   = $this->mQuestionPenerima->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'                 => $this->title,
            'page'                  => 'Data Jenis Responden',
            'url'                   => $this->url,
            'questionPenerima'      => $questionPenerima,
        ];
        return view("$this->views/index", $data);
    }

    public function pertanyaan($idQUser = null)
    {
        // Get Data
        $questions      = $this->mQuestion->getQuestionTipe($idQUser)->get();

        $data = [
            'title'     => $this->title,
            'page'      => 'Data Pertanyaan',
            'url'       => $this->url,
            'idQUser'   => $idQUser,
            'questions' => $questions,
        ];
        return view("$this->views/pertanyaan", $data);
    }

    public function create()
    {
        // Get Data

        $data = [
            'title'     => $this->title,
            'page'      => 'Tambah Pertanyaan',
            'url'       => $this->url,
            'penerima'  => $this->mQuestionPenerima->all(),
            'tipe'      => $this->mQuestionType->all(),
        ];
        // dd($data);
        return view("$this->views/create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'idQUser' => 'required',
            'idQSTipe' => 'required',
            'pertanyaan' => 'required',
        ]);

        // Table question_soal
        $dataQuestions = [
            'idQUser' => $request->idQUser,
            'idQSTipe' => $request->idQSTipe,
            'pertanyaan' => $request->pertanyaan,
        ];
        $idQuestions = $this->mQuestion->create($dataQuestions);

        if ($request->has('namaPilihan2')) {
            for ($i = 0; $i < count($request->namaPilihan2); $i++) {
                $dataPilJaw[] = [
                    'idQUser' => $request->idQUser,
                    'idQSoal' => $idQuestions->id,
                    'idQSTipe' => $request->idQSTipe,
                    'namaPilihan' => $request->namaPilihan2[$i],
                ];
            }
            DB::table('question_jawabanPilihan')->insert($dataPilJaw);
        }

        // Response
        return redirect("$this->url")->with('sukses', 'Pertanyaan Berhasil Ditambahkan');
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
        // Get Data
        $questions          = $this->mQuestion->where('id', $id)->first();
        $pilihanJawaban     = DB::table('question_jawabanPilihan')->where('idQSoal', $id)->get();

        $data = [
            'title'             => $this->title,
            'page'              => 'Edit Pertanyaan',
            'url'               => $this->url,
            'id'                => $id,
            'questions'         => $questions,
            'penerima'          => $this->mQuestionPenerima->all(),
            'tipe'              => $this->mQuestionType->all(),
            'pilihanJawaban'    => $pilihanJawaban,
        ];
        return view("$this->views/edit", $data);
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
        // Validasi

        // Table question_soal
        $dataQuestions = [
            'idQUser' => $request->idQUser,
            'idQSTipe' => $request->idQSTipe,
            'pertanyaan' => $request->pertanyaan,
        ];
        $idQuestions = $this->mQuestion->where('id', $id)->update($dataQuestions);

        if ($request->has('namaPilihan2')) {
            DB::table('question_jawabanPilihan')->where('idQSoal', $id)->delete();
            for ($i = 0; $i < count($request->namaPilihan2); $i++) {
                $dataPilJaw[] = [
                    'idQUser' => $request->idQUser,
                    'idQSoal' => $id,
                    'idQSTipe' => $request->idQSTipe,
                    'namaPilihan' => $request->namaPilihan2[$i],
                ];
            }
            DB::table('question_jawabanPilihan')->insert($dataPilJaw);
        }

        // Response
        return redirect("$this->url")->with('sukses', 'Pertanyaan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions          = $this->mQuestion->where('id', $id)->first();
        $this->mQuestion->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Karyawan ' . $questions->nama . ' berhasil di hapus');
    }
}