<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoldarModel;

class GoldarController extends Controller
{
    
    private $views      = 'admin/master_data/m_golongandarah';
    private $url        = 'admin/goldar';
    private $title      = 'Halaman Golongan Darah';
    protected $mGoldar;

    public function __construct()
    {
        // Di isi Construct
        $this->mGoldar = New GoldarModel();
    }

    public function index()
    {
        $goldar = $this->mGoldar->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Golongan Darah',
            'goldar'        => $goldar
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Golongan Darah',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataGoldar = [
            'nama'      => $request->nama,
        ];
        $this->mGoldar->create($dataGoldar);

        return redirect("$this->url")->with('sukses', 'Data Golongan Darah berhasil di tambahkan');
    }

    public function show($id)
    {
        $goldar       = $this->mGoldar->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Golongan Darah',
            'goldar'    => $goldar,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $goldar       = $this->mGoldar->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Golongan Darah',
            'id'        => $id,
            'goldar'    => $goldar,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataGoldar = [
            'nama'      => $request->nama,
        ];
        $this->mGoldar->where('id', $id)->update($dataGoldar);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Golongan Darah berhasil di edit');
    }

    public function destroy($id)
    {
        $goldar       = $this->mGoldar->where('id', $id)->first();
        $this->mGoldar->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Golongan Darah' . $goldar->nama . ' berhasil di hapus');
    }
}
