<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisKelaminModel;

class JenisKelaminController extends Controller
{
    private $views      = 'admin/master_data/m_jeniskelamin';
    private $url        = 'admin/jenis-kelamin';
    private $title      = 'Halaman Data Jenis Kelamin';
    protected $mJenisKelamin;

    public function __construct()
    {
        // Di isi Construct
        $this->mJenisKelamin = New JenisKelaminModel();
    }

    public function index()
    {
        $jeniskelamin = $this->mJenisKelamin->get();

        $data = [
            'title'               => $this->title,
            'url'                 => $this->url,
            'page'                => 'Data Jenis Kelamin',
            'jeniskelamin'        => $jeniskelamin
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Jenis Kelamin',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataJenisKelamin = [
            'nama'      => $request->nama,
        ];
        $this->mJenisKelamin->create($dataJenisKelamin);

        return redirect("$this->url")->with('sukses', 'Data Jenis Kelamin');
    }

    public function show($id)
    {
        $jeniskelamin       = $this->mJenisKelamin->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Jenis Kelamin',
            'jeniskelamin'    => $jeniskelamin,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $jeniskelamin       = $this->mJenisKelamin->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Jenis Kelamin',
            'id'        => $id,
            'jeniskelamin'    => $jeniskelamin,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataJenisKelamin = [
            'nama'      => $request->nama,
        ];
        $this->mJenisKelamin->where('id', $id)->update($dataJenisKelamin);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Jenis Kelamin berhasil di edit');
    }

    public function destroy($id)
    {
        $jeniskelamin       = $this->mJenisKelamin->where('id', $id)->first();
        $this->mJenisKelamin->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Jenis Kelamin' . $jeniskelamin->nama . ' berhasil di hapus');
    }
}
