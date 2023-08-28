<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KunjunganModel;

class KunjunganController extends Controller
{
    
    private $views      = 'admin/master_data/m_kunjungansakit';
    private $url        = 'admin/kunjungan-sakit';
    private $title      = 'Halaman Kunjungan Sakit';
    protected $mKunjungan;

    public function __construct()
    {
        // Di isi Construct
        $this->mKunjungan = New KunjunganModel();
    }

    public function index()
    {
        $kunjungan_sakit = $this->mKunjungan->get();

        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Data Kunjungan Sakit',
            'kunjungan_sakit'       => $kunjungan_sakit
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Kunjungan Sakit',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataKunjungan = [
            'nama'      => $request->nama,
        ];
        $this->mKunjungan->create($dataKunjungan);

        return redirect("$this->url")->with('sukses', 'Data Kunjungan Sakit berhasil di tambahkan');
    }

    public function show($id)
    {
        $kunjungan_sakit       = $this->mKunjungan->where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Kunjungan Sakit',
            'kunjungan_sakit'   => $kunjungan_sakit,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $kunjungan_sakit       = $this->mKunjungan->where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Kunjungan Sakit',
            'id'                => $id,
            'kunjungan_sakit'   => $kunjungan_sakit,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataKunjungan = [
            'nama'      => $request->nama,
        ];
        $this->mKunjungan->where('id', $id)->update($dataKunjungan);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Kunjungan Sakit berhasil di edit');
    }

    public function destroy($id)
    {
        $kunjungan_sakit       = $this->mKunjungan->where('id', $id)->first();
        $this->mKunjungan->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Kunjungan Sakit' . $kunjungan_sakit->nama . ' berhasil di hapus');
    }
}
