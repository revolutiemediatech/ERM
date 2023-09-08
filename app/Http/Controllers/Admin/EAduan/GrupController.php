<?php

namespace App\Http\Controllers\Admin\EAduan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\GrupModel;
use App\Models\FaskesModel;

class GrupController extends Controller
{
    private $views      = 'admin/eAduan/grup';
    private $url        = 'admin/grup-EAduan';
    private $title      = 'Halaman Data Penanggung Jawab Wilayah E-Perkesmas';


    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $grup = GrupModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Grup E-Aduan',
            'grup'              => $grup,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
    }

    public function create()
    {
        $faskes = FaskesModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Grup E-Aduan',
            'faskes'        => $faskes
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataGrup = [
            'idFaskes'      => $request->idFaskes,
            'idUsers'       => session()->get('users_id'),
            'nama'          => $request->nama,
            'status'        => 1,
        ];
        // echo json_encode($dataGrup); die();
        GrupModel::create($dataGrup);

        return redirect("$this->url")->with('sukses', 'Data Grup E-Aduan berhasil di tambahkan');
    }

    public function edit($id)
    {
        // Get Data
        $grup   = GrupModel::where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Grup E-Aduan',
            'id'                => $id,
            'grup'              => $grup,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataGrup = [
            'nama'          => $request->nama,
            'status'        => $request->status,
        ];
        GrupModel::where('id', $id)->update($dataGrup);

        return redirect("$this->url")->with('sukses', 'Data Grup E-Aduan berhasil di edit');
    }
}
