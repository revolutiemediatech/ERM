<?php

namespace App\Http\Controllers\AdminRs;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Str;

use App\Models\PasienModel;
use App\Models\GalleryModel;
use App\Models\PekerjaanModel;

class GalleryPasien extends Controller
{
    private $views      = 'adminRs/gallery';
    private $url        = 'adminRs/gallery';
    private $title      = 'Halaman Data Gallery Pasien';
    protected $mPasien;

    public function __construct()
    {
        // Di isi Construct
    }

    public function show($id)
    {
        $pasien             = PasienModel::where('id', $id)->first();
        $gallery            = GalleryModel::where('idMPasien', $id)->get();
        $pilihanPekerjaan   = PekerjaanModel::where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $birthDate          = new \DateTime($tanggal_lahir);
        $today = new \DateTime("today");
        if ($birthDate > $today) {
            return "0 tahun 0 bulan 0 hari";
        }
        $y = $today->diff($birthDate)->y;
        // dd($y);
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        // echo json_encode($HPasien); die;
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Gallery',
            'id'                => $id,
            'pasien'            => $pasien,
            'usia'              => $y,
            'gallery'           => $gallery,
            'pilihanPekerjaan'  => $pilihanPekerjaan
        ];
        return view($this->views . "/show", $data);
    }
    
    public function edit($id)
    {
        $pasien             = PasienModel::where('id', $id)->first();
        $gallery            = GalleryModel::where('idMPasien', $id)->get();
        $pilihanPekerjaan   = PekerjaanModel::where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $birthDate          = new \DateTime($tanggal_lahir);
        $today = new \DateTime("today");
        if ($birthDate > $today) {
            return "0 tahun 0 bulan 0 hari";
        }
        $y = $today->diff($birthDate)->y;

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Upload Gallery',
            'id'        => $id,
            'pasien'    => $pasien,
            'usia'      => $y,
            'gallery'   => $gallery,
            'pilihanPekerjaan'  => $pilihanPekerjaan
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $pasien             = PasienModel::where('id', $id)->first();
        if (isset($request->photo)) {
            if ($request->hasFile('photo')) {
                $file       = $request->file('photo');
                $fileName   = Str::uuid()."-".time().".".$file->extension();
                $file->move( "upload/gallery/", $fileName);
            }
            $dataGaleery = [
                'photo'         => $fileName,
                'judul'         => $request->judul,
                'idMPasien'     => $pasien->id
            ];
            GalleryModel::where('id', $id)->insert($dataGaleery);
            return redirect("$this->url/". $pasien->id)->with('sukses', 'Data Gallery berhasil di edit');
            // echo json_encode($dataGaleery); die;
        }
    }

    public function destroy($id)
    {
        $gallery            = GalleryModel::where('idMPasien', $id)->first();
        GalleryModel::destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Gallery Pasien ' . $gallery->pasien->nama . ' berhasil di hapus');
    }
}
