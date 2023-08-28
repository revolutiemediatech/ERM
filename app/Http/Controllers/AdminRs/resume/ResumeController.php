<?php

namespace App\Http\Controllers\Admin\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ResumeModel;
use App\Models\FaskesModel;

class ResumeController extends Controller
{
    private $views      = 'admin/resumee/resume';
    private $url        = 'admin/resume';
    private $title      = 'Halaman Data Resume';
    protected $mResume;


    public function __construct()
    {
        // Di isi Construct
        $this->mResume = New ResumeModel();
    }

    public function index()
    {
        $resume = $this->mResume->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data Resume',
            'resume'          => $resume
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data resume',
            'faskes'            => $faskes,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataResume = [
            'idFaskes'          => $request->idFaskes,
            'template_pesan'    => $request->template_pesan,
        ];
        $this->mResume->create($dataResume);

        return redirect("$this->url")->with('sukses', 'Data Resume berhasil di tambahkan');
    }

    // public function show($id)
    // {
        
    // }

    public function edit($id)
    {
        $resume       = $this->mResume->where('id', $id)->first();
        $faskes       = FaskesModel::all();

        $data = [
            'title'      => $this->title,
            'url'        => $this->url,
            'page'       => 'Edit Data Resume',
            'id'         => $id,
            'resume'     => $resume,
            'faskes'     => $faskes,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataResume = [
            'idFaskes'          => $request->idFaskes,
            'template_pesan'    => $request->template_pesan,
        ];
        $this->mResume->where('id', $id)->update($dataResume);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Resume berhasil di edit');
    }

    public function destroy($id)
    {
        $resume       = $this->mResume->where('id', $id)->first();
        $this->mResume->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Resume' . $resume->nama . ' berhasil di hapus');
    }
}
