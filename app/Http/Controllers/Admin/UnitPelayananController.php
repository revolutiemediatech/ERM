<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UnitPelayananModel;

class UnitPelayananController extends Controller
{
      
    private $views      = 'admin/master_data/m_unitpelayanan';
    private $url        = 'admin/unit-pelayanan';
    private $title      = 'Halaman Unit Pelayanan';
    protected $mUnitPelayanan;

    public function __construct()
    {
        // Di isi Construct
        $this->mUnitPelayanan = New UnitPelayananModel();
    }

    public function index()
    {
        $unitpelayanan = $this->mUnitPelayanan->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Unit Pelayanan',
            'unitpelayanan'     => $unitpelayanan
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Unit Pelayanan',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataUnitPelayanan = [
            'nama'      => $request->nama,
        ];
        $this->mUnitPelayanan->create($dataUnitPelayanan);

        return redirect("$this->url")->with('sukses', 'Unit Pelayanan berhasil di tambahkan');
    }

    public function show($id)
    {
        $unitpelayanan       = $this->mUnitPelayanan->where('id', $id)->first();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Detail Data Unit Pelayanan',
            'unitpelayanan'  => $unitpelayanan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $unitpelayanan       = $this->mUnitPelayanan->where('id', $id)->first();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Edit Data Unit Pelayanan',
            'id'              => $id,
            'unitpelayanan'  => $unitpelayanan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataUnitPelayanan = [
            'nama'      => $request->nama,
        ];
        $this->mUnitPelayanan->where('id', $id)->update($dataUnitPelayanan);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Unit Pelayanan berhasil di edit');
    }

    public function destroy($id)
    {
        $unitpelayanan       = $this->mUnitPelayanan->where('id', $id)->first();
        $this->mUnitPelayanan->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Unit Pelayanan' . $unitpelayanan->nama . ' berhasil di hapus');
    }
}
