<?php

namespace App\Http\Controllers\Admin\EPerkesmas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KunjunganPerkesmasModel;

class KunjunganController extends Controller
{
    private $views      = 'admin/eperkesmas/validasi';
    private $url        = 'admin/validasi-kunjungan-eperkesmas';
    private $title      = 'Halaman Data Validasi Kunjungan E-Perkesmas';


    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $kunjungan = KunjunganPerkesmasModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Kunjungan',
            'kunjungan'         => $kunjungan
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kunjungan   = KunjunganPerkesmasModel::where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Kunjungan',
            'id'        => $id,
            'kunjungan'   => $kunjungan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataValidasi = [
            'status'            => $request->status,
            'hari_kunjungan'    => $request->hari_kunjungan,
            'jadwal_kunjungan'  => $request->jadwal_kunjungan,
            'alasan'            => $request->alasan,
            'anjuran'           => $request->anjuran,
        ];
        KunjunganPerkesmasModel::where('id', $id)->update($dataValidasi);

        return redirect("$this->url")->with('sukses', 'Data Kunjungan E-Perkesmas berhasil divalidasi');
    }

    public function destroy($id)
    {
        //
    }
}
