<?php

namespace App\Http\Controllers\Admin\EKonsultasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserModel;
use App\Models\FaskesModel;
use App\Models\PJKonsultasiModel;
use App\Models\TopikEKonsultasiModel;

class PJKonsultasi extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/eKonsultasi/pj';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/penanggungjawab-eKonsultasi';
    
    // Title head
    private $title      = 'Halaman Data Penanggung Jawab E-Konsultasi';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas

    }

    public function index()
    {
        $where = [
            'status'    => 1,
            'idFaskes'  => session()->get('idFaskes'),
        ]; 
        $penanggung_jawab = PJKonsultasiModel::where($where)->first(); // cari kepsek yg statusnya 1
        if(isset($penanggung_jawab)){
            $users = UserModel::where('id', $penanggung_jawab['idUsers'])->get(); // tampilkan data guru sebagai kepsek
        }else{
            $users = null;
        }
        $topik = TopikEKonsultasiModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Penanggung Jawab E-Konsultasi',
            'users'             => $users,
            'topik'             => $topik,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
    }

    public function create()
    {
        $users  = UserModel::all();
        $faskes = FaskesModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Penanggung Jawab E-Konsultasi',
            'users'         => $users,
            'faskes'        => $faskes
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataUser = [
            'idUsers'           => $request->idUsers,
            'idFaskes'          => $request->idFaskes,
        ];
        // echo json_encode($dataUser); die;
        PJKonsultasiModel::create($dataUser);

        // untuk update semua status jadi 0
        $where = [
            'idFaskes'  => session()->get('idFaskes'),
            'status'    => 1, // update semua statusya jadi 0
        ];
        $dataStatus = [
            'status'    => 0 // update semua statusya jadi 0
        ];
        // cari yang statusnya 1, terus semua diupdate jadi 0
        PJKonsultasiModel::where($where)->update($dataStatus);

        // cek ada guru yg sama di tabel kepsek tidak
        $where2 = [
            'idFaskes'=> session()->get('idFaskes'),
            'idUsers' => $request->idUsers
        ];
        $penanggung_jawab = PJKonsultasiModel::where($where2)->first();
        if (isset($penanggung_jawab)){ // kalo ada, update status. bukan tambah data guru di tabel kepsek
            $where1 = [
                'idFaskes'=> session()->get('idFaskes'),
                'idUsers' => $request->idUsers
            ];
            $dataStatus1 = [
                'status'    => 1 // update status guru tsb di tabel kepsek jadi 1
            ];
            PJKonsultasiModel::where($where1)->update($dataStatus1);
        }else{ // kalo data guru tsb di tabel kepsek tidak ada, baru tambah baru. jadi gag ada nama yg sama di tabel kepsek
            // tambah data sekaligus aktifkan jadi status 1
            $dataPj = [
                // 'idPSekolah'      => $request->idPSekolah,
                'idFaskes'      => session()->get('idFaskes'),
                'idUsers'       => $request->idUsers,
                'status'        => 1
            ];
            PJKonsultasiModel::create($dataPj);
        }

        return redirect("$this->url")->with('sukses', 'Data Penanggung Jawab E-Konsultasi berhasil di tambahkan');
    }

    public function edit($id)
    {
        // Get Data
        $penanggung_jawab   = PJKonsultasiModel::where('id', $id)->first();
        $users              = UserModel::all();
        $faskes             = FaskesModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Penanggung Jawab E-Konsultasi',
            'id'                => $id,
            'penanggung_jawab'  => $penanggung_jawab,
            'users'             => $users,
            'faskes'            => $faskes
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'id' => 'required',
            'idFaskes' => 'required',
        ]);
        
        $dataPj = [
            'idFaskes'  => $request->idFaskes,    
            'idUsers'   => $request->idUsers,
        ];
        PJKonsultasiModel::where('id', $request->id)->update($dataPj);

        // Response
        return redirect("$this->url")->with('sukses', 'Data Penanggung Jawab E-Konsultasi berhasil di edit');
        // dd($request->all());
    }
}
