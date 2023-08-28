<?php

namespace App\Http\Controllers\AdminRs\PengajuanLabor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\PengajuanLaborModel;
use App\Models\DataLaborModel;

class PengajuanLaborController extends Controller
{
    private $views      = 'adminRs/pengajuan_labor/rajal';
    private $url        = 'adminRs/pengajuan-labor';
    private $title      = 'Halaman Data Pasien Pegajuan Labor Rawat Jalan';
    protected $mDiagnosa;
    protected $mPasien;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa            = New DiagnosaModel();
        $this->mPasien              = New PasienModel();
        $this->mPengajuanLabor      = New PengajuanLaborModel();
        $this->mLabor               = New DataLaborModel();
    }

    public function index()
    {
        $wherenyaa = [
            'idFaskes'      => session()->get('idFaskes'),
            'status'        => 2
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pasien Pengajuan Labor Rawat Jalan',
            'pasien'        => $pasien,
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanDiagnosa    = $this->mPengajuanLabor->where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $birthDate          = new \DateTime($tanggal_lahir);
        $labor              = $this->mLabor->where('status', 1)->get();
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
            'page'              => 'Pengajuan Laboratorium',
            'id'                => $id,
            'pasien'            => $pasien,
            'usia'              => $y,
            'pilihanDiagnosa'   => $pilihanDiagnosa,
            'labor'             => $labor,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanDiagnosa    = $this->mPengajuanLabor->where('idMPasien', $id)->get();
        $labor              = $this->mLabor->where('status', 1)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Pengajuan Labor Rawat Jalan',
            'id'                => $id,
            'pasien'            => $pasien,
            'labor'             => $labor,
            'pilihanDiagnosa'   => $pilihanDiagnosa,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        
        if ($request->hasil_labor) {
            $dataStatus = [
                'status'                => 1
            ];
            DB::table('pasien')->where('id', $id)->update($dataStatus);
        };

        if ($request->has('daftar_labor')) {
            for ($i = 0; $i < count($request->daftar_labor); $i++) {
                $dataPengLabor[] = [
                    'idLabor'       => $request->daftar_labor[$i],
                    'hasil_labor'   => $request->hasil_labor[$i],
                    'idMPasien'     => $id
                ];
                // echo json_encode($dataPengLabor); die;
                DB::table('pengajuan_labor')->where('idLabor', $request->daftar_labor[$i])->update(['hasil_labor' => $dataPengLabor[$i]['hasil_labor']]);
            }
        } elseif ($request->has('daftar_labor1')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->daftar_labor1); $i++) {
                $dataPengLabor[] = [
                    'idLabor'       => $request->daftar_labor1[$i],
                    'hasil_labor'   => $request->hasil_labor1[$i],
                    'idMPasien'     => $id
                ];
                // echo json_encode($dataPengLabor); die;
                DB::table('pengajuan_labor')->insert($dataPengLabor);
            }
        }

        return redirect("$this->url/". $id)->with('sukses', 'Data Pengajuan Labor Rawat Jalan berhasil di Tambahkan');
    }
    
    public function destroy($id)
    {
        $pengajuan_labor      = $this->mPengajuanLabor->where('id', $id)->first();
        $this->mPengajuanLabor->destroy($id);

        return redirect("$this->url/". $id)->with('sukses', 'Data Pengajuan Labor Rawat Jalan ' . $pengajuan_labor->nama . ' berhasil di hapus');
    }
}