<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use File;

use App\Models\PersetujuanPenolakanModel;
use App\Models\PasienModel;
use App\Models\UserModel;
use App\Models\PekerjaanModel;

class PerPenController extends Controller
{
    private $views      = 'dokter/perpen';
    private $url        = 'dokter/rawat-jalan/perpen';
    private $title      = 'Halaman Form Persetujuan/Penolakan';
   
    protected $mPasien;
    protected $mPerpen;
    protected $mUsers;


    public function __construct()
    {
        // Di isi Construct
        $this->mPerpen    = New PersetujuanPenolakanModel();
        $this->mPasien    = New PasienModel();
        $this->mUsers     = New UserModel();
    }

    public function show($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();
        $perpen         = $this->mPerpen->get();
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

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Halaman Form Persetujuan/Penolakan',
            'pasien'    => $pasien,
            'perpen'    => $perpen,
            'usia'      => $y,
            'pilihanPekerjaan'  => $pilihanPekerjaan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();
        $perpen       = $this->mPerpen->where('id', $id)->first();
        $users        = $this->mUsers->where('idRole',3)->get();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Halaman Form Persetujuan/Penolakan',
            'id'        => $id,
            'pasien'    => $pasien,
            'perpen'    => $perpen,
            'users'     => $users,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $pasien       = $this->mPasien->where('id', $id)->first();

        if ($request->hasFile('dokumen')) {
            $file       = $request->file('dokumen');
            $fileName   = Str::uuid()."-".time().".".$file->extension();
            $file->move( "upload/excel/dokumen/", $fileName);
        }

        $dataPerpen = [
            'dokumen'               => $fileName,
            'idMPasien'             => $pasien->id,
            'idUsers'               => session()->get('users_id'),
            'diagnosis'             => $request->diagnosis,
            'dasar_diagnosis'       => $request->dasar_doagnosis,
            'nama_tindakan_dokter'  => $request->nama_tindakan_dokter,
            'indikasi_tindakan'     => $request->indikasi_tindakan,
            'tata_cara'             => $request->tata_cara,
            'tujuan'                => $request->tujuan,
            'risiko'                => $request->risiko,
            'komplikasi'            => $request->komplikasi,
            'prognosis'             => $request->prognosis,
            'alternatif'            => $request->alternatif,
            'lain'                  => $request->lain,
            'nama_pj'               => $request->nama_pj,
            'usia'                  => $request->usia,
            'alamat'                => $request->alamat,
            'nomor_hp'              => $request->nomor_hp,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'jenis'                 => $request->jenis,
            'alasan_pulang'         => $request->alasan_pulang,
        ];
        echo json_encode($dataPerpen); die();
        // $this->mPerpen->where('id', $id)->create($dataPerpen);

        // return redirect("$this->url/". $pasien->id)->with('sukses', 'Form Persetujuan/Penolakan berhasil di Tambahkan');
    }

    public function destroy($id)
    {
        $perpen       = $this->mPerpen->where('id', $id)->first();
        $pasien       = $this->mPasien->where('id', $id)->first();
        $this->mPerpen->destroy($id);

        return redirect("$this->url/". $pasien->id)->with('sukses', 'Data Persetujuan/Penolakan' . $perpen->nama . ' berhasil di hapus');
    }
}
