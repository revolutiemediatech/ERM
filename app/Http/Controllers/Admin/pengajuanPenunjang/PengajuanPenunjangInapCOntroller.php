<?php

namespace App\Http\Controllers\Admin\pengajuanPenunjang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\PengajuanPenunjangModel;
use App\Models\PenunjangModel;
use App\Models\PekerjaanModel;

class PengajuanPenunjangInapCOntroller extends Controller
{
    private $views      = 'admin/pengajuan_penunjang/ranap';
    private $url        = 'admin/admin/pengajuan-penunjang-inap';
    private $title      = 'Halaman Data Pegajuan Penunjang Rawat Inap';
    protected $mDiagnosa;
    protected $mPasien;
    protected $mPengajuanPenunjang;
    protected $mPenunjang;
    protected $mPekerjaan;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa            = New DiagnosaModel();
        $this->mPasien              = New PasienModel();
        $this->mPengajuanPenunjang  = New PengajuanPenunjangModel();
        $this->mPenunjang           = New PenunjangModel();
        $this->mPekerjaan           = New PekerjaanModel();
    }

    public function index()
    {
        $pasien   = $this->mPasien->where('status', 8)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pengajuan Penunjang Rawat Inap',
            'pasien'        => $pasien,
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanPenunjang   = $this->mPengajuanPenunjang->where('idMPasien', $id)->get();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $birthDate          = new \DateTime($tanggal_lahir);
        $labor              = $this->mPenunjang->where('status', 1)->get();
        $today = new \DateTime("today");
        if ($birthDate > $today) {
            return "0 tahun 0 bulan 0 hari";
        }
        $y = $today->diff($birthDate)->y;
        // dd($y);
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Pengajuan Penunjang Rawat Inap',
            'id'                => $id,
            'pasien'            => $pasien,
            'usia'              => $y,
            'pilihanPenunjang'  => $pilihanPenunjang,
            'labor'             => $labor,
            'pilihanPekerjaan'  => $pilihanPekerjaan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanPenunjang   = $this->mPengajuanPenunjang->where('idDiagnosa', $id)->get();
        $penunjang          = $this->mPenunjang->where('status', 1)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Pengajuan Penunjang Rawat Inap',
            'id'                => $id,
            'pasien'            => $pasien,
            'penunjang'         => $penunjang,
            'pilihanPenunjang'  => $pilihanPenunjang,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        if ($request->hasil_labor) {
            $dataStatus = [
                'status'                => 4
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        };

        if ($request->has('nama_penunjang')) {
            for ($i = 0; $i < count($request->nama_penunjang); $i++) {
                $dataPengPenun[] = [
                    'idPenunjang'       => $request->nama_penunjang[$i],
                    'hasil_penunjang'   => $request->hasil_penunjang[$i],
                    'idMPasien'         => $id
                ];
            }
            // echo json_encode($dataPengPenun); die;
            DB::table('pengajuan_penunjang')->where('idPenunjang', $request->hasil_penunjang[$i])->update(['hasil_penunjang' => $dataPengPenun[$i]['hasil_penunjang']]);
        } elseif ($request->has('nama_penunjang1')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->nama_penunjang1); $i++) {
                $dataPengPenun[] = [
                    'idPenunjang'       => $request->nama_penunjang1[$i],
                    'hasil_penunjang'   => $request->hasil_penunjang1[$i],
                    'idMPasien'         => $id
                ];
            }
            // echo json_encode($dataPengPenun); die;
            DB::table('pengajuan_penunjang')->insert($dataPengPenun);
        }

        return redirect("$this->url/". $id)->with('sukses', 'Data Pengajuan Penunjang Rawat Inap berhasil di Tambahkan');
    }
    
    public function destroy($id)
    {
        $pengajuan_penunjang      = $this->mPengajuanPenunjang->where('id', $id)->first();
        $this->mPengajuanPenunjang->destroy($id);

        return redirect("$this->url/". $id)->with('sukses', 'Data Pengajuan Penunjang Rawat Inap ' . $pengajuan_penunjang->nama . ' berhasil di hapus');
    }
}
