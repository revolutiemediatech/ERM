<?php

namespace App\Http\Controllers\AdminRs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisPasienModel;

class JenisPasienController extends Controller
{
    
    private $views      = 'adminRs/jenisPasien';
    private $url        = 'adminRs/jenis-pasien';
    private $title      = 'Halaman Data Pembiayaan';
    protected $mJenisPasien;

    public function __construct()
    {
        // Di isi Construct
        $this->mJenisPasien = New JenisPasienModel();
    }

    public function index()
    {
        $jenis_pasien = $this->mJenisPasien->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Pembiayaan',
            'jenis_pasien'  => $jenis_pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Pembiayaan',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataJenisPasien = [
            'nama'      => $request->nama,
        ];
        $this->mJenisPasien->create($dataJenisPasien);

        return redirect("$this->url")->with('sukses', 'Data Pembiayaan berhasil di tambahkan');
    }

    public function show($id)
    {
        $jenis_pasien       = $this->mJenisPasien->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Pembiayaan',
            'jenis_pasien'    => $jenis_pasien,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $jenis_pasien       = $this->mJenisPasien->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Pembiayaan',
            'id'        => $id,
            'jenis_pasien'    => $jenis_pasien,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataJenisPasien = [
            'nama'      => $request->nama,
        ];
        $this->mJenisPasien->where('id', $id)->update($dataJenisPasien);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Pembiayaan berhasil di edit');
    }

    public function destroy($id)
    {
        $jenis_pasien       = $this->mJenisPasien->where('id', $id)->first();
        $this->mJenisPasien->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Pembiayaan' . $jenis_pasien->nama . ' berhasil di hapus');
    }
}
