<?php

namespace App\Http\Controllers\AdminRs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LokasiModel;

class LokasiController extends Controller
{
    private $views      = 'adminRs/m_lokasipemeriksaan';
    private $url        = 'adminRs/lokasi-pemeriksaan';
    private $title      = 'Halaman Data Lokasi Pemeriksan';
    protected $mLokasi;

    public function __construct()
    {
        // Di isi Construct
        $this->mLokasi = New LokasiModel();
    }

    public function index()
    {
        $lokasi = $this->mLokasi->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Lokasi Pemeriksan',
            'lokasi'        => $lokasi
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Lokasi Pemeriksan',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataLokasi = [
            'nama'      => $request->nama,
            'idFaskes'  => session()->get('idFaskes'),
        ];
        $this->mLokasi->create($dataLokasi);

        return redirect("$this->url")->with('sukses', 'Data Lokasi Pemeriksan berhasil di tambahkan');
    }

    public function show($id)
    {
        $lokasi       = $this->mLokasi->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Lokasi Pemeriksan',
            'lokasi'    => $lokasi,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $lokasi       = $this->mLokasi->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Lokasi Pemeriksan',
            'id'        => $id,
            'lokasi'    => $lokasi,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataLokasi = [
            'nama'      => $request->nama,
            'idFaskes'  => session()->get('idFaskes'),
        ];
        $this->mLokasi->where('id', $id)->update($dataLokasi);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Lokasi Pemeriksan berhasil di edit');
    }

    public function destroy($id)
    {
        $lokasi       = $this->mLokasi->where('id', $id)->first();
        $this->mLokasi->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Lokasi Pemeriksan' . $lokasi->nama . ' berhasil di hapus');
    }
}
