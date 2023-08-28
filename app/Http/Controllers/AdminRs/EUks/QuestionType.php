<?php

namespace App\Http\Controllers\AdminRs\EUks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;

// Model
use App\Models\QuestionTypeModel;

class QuestionType extends Controller
{
    private $views      = 'adminRs/eUks/question_type';
    private $url        = 'adminRs/question-type';
    private $title      = 'Halaman Data Tipe Pertanyaan';

    public function __construct()
    {
        $this->mQuestionType    = new QuestionTypeModel();
    }

    public function index()
    {
        // Get Data
        $questionTypes          = $this->mQuestionType->all();

        $data = [
            'title'             => $this->title,
            'page'              => 'Data Question Type',
            'url'               => $this->url,
            'questionTypes'     => $questionTypes,
        ];
        return view("$this->views/index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get Data

        $data = [
            'title'     => $this->title,
            'page'      => 'Tambah Question Type',
            'url'       => $this->url,
        ];
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
            'namaTipe' => 'required',
        ]);

        // Table role
        $dataQuestionTypes = [
            'namaTipe'      => $request->namaTipe,
        ];
        $this->mQuestionType->create($dataQuestionTypes);

        // Response
        return redirect("$this->url")->with('sukses', 'Jenis Jawaban Berhasil Ditambahkan');
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
        $questionTypes          = $this->mQuestionType->where('id', $id)->first();

        $data = [
            'title'     => 'Edit Question Type',
            'url'       => $this->url,
            'id'        => $id,
            'questionTypes'     => $questionTypes,
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
        $request->validate([
            'namaTipe' => 'required',
        ]);

        // Table role
        $dataQuestionTypes = [
            'namaTipe'      => $request->namaTipe,
        ];
        $this->mQuestionType->where('id', $id)->update($dataQuestionTypes);

        // Response
        return redirect("$this->url")->with('sukses', 'Question Type Berhasil Diubah');
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