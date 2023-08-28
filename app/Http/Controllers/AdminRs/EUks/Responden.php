<?php

namespace App\Http\Controllers\AdminRs\EUks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use DB;

// Model
use App\Models\QuestionPenerimaModel;

class Responden extends Controller
{
    private $views      = 'adminRs/responden';
    private $url        = 'adminRs/responden';
    private $title      = 'Halaman Data Responden';

    public function __construct()
    {
        $this->mQuestionPenerima    = new QuestionPenerimaModel();
    }

    public function index()
    {
        // Get Data
        $respondens          = $this->mQuestionPenerima->all();

        $data = [
            'title'         => $this->title,
            'page'          => 'Data Responden',
            'url'           => $this->url,
            'respondens'    => $respondens,
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
            'title'         => $this->title,
            'page'          => 'Tambah Responden',
            'url'           => $this->url,
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
            // 'respondenname' => 'required',
            // 'password' => 'required',
            // 'role' => 'required',
            // 'status' => 'required',
        ]);

        // Table responden
        $dataRespondens = [
            'idFaskes'   => session()->get('idFaskes'),
            'nama'       => $request->nama,
            'versi'      => $request->versi,
            'status'     => $request->status,
        ];
        $this->mQuestionPenerima->create($dataRespondens);

        // Response
        // return redirect("$this->url")->with('sukses', 'Responden Berhasil Ditambahkan');
        return redirect("/admin/question")->with('sukses', 'Responden Berhasil Ditambahkan');
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
        $respondens          = $this->mQuestionPenerima->where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'page'          => 'Edit Responden',
            'url'           => $this->url,
            'id'            => $id,
            'respondens'    => $respondens,
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
            // 'respondenname' => 'required',
            // 'password' => 'required',
            // 'role' => 'required',
            // 'status' => 'required',
        ]);

        // Table responden
        $dataRespondens = [
            'nama'       => $request->nama,
            'versi'      => $request->versi,
            'status'     => $request->status,
        ];
        $this->mQuestionPenerima->where('id', $id)->update($dataRespondens);

        // Response
        // return redirect("$this->url")->with('sukses', 'Responden Berhasil Diubah');
        return redirect("/admin/question")->with('sukses', 'Responden Berhasil di Edit');
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