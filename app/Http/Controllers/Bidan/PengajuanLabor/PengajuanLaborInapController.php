<?php

namespace App\Http\Controllers\Bidan\PengajuanLabor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\PengajuanLaborModel;
use App\Models\DataLaborModel;
use App\Models\PekerjaanModel;

class PengajuanLaborInapController extends Controller
{
    private $views      = 'bidan/pengajuan_labor/ranap';
    private $url        = 'bidan/pengajuan-labor-inap';
    private $title      = 'Halaman Data Pasien Pegajuan Labor Rawat Inap';
    protected $mDiagnosa;
    protected $mPasien;
    protected $mLabor;
    protected $mPengajuanLabor;
    protected $mPekerjaan;



    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa            = New DiagnosaModel();
        $this->mPasien              = New PasienModel();
        $this->mPengajuanLabor      = New PengajuanLaborModel();
        $this->mLabor               = New DataLaborModel();
        $this->mPekerjaan           = New PekerjaanModel();
    }

    public function index()
    {
        $pasien   = $this->mPasien->where('status', 2)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pasien Pengajuan Labor Rawat Inap',
            'pasien'        => $pasien,
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $where      = [
            'status'        => 1,
            'idFaskes'      => session()->get('idFaskes')
        ];
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanDiagnosa    = $this->mPengajuanLabor->where('idMPasien', $id)->get();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $birthDate          = new \DateTime($tanggal_lahir);
        $labor              = $this->mLabor->where($where)->get();
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
            'pilihanPekerjaan'  => $pilihanPekerjaan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $where      = [
            'status'        => 1,
            'idFaskes'      => session()->get('idFaskes')
        ];
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanDiagnosa    = $this->mPengajuanLabor->where('idMPasien', $id)->get();
        $labor              = $this->mLabor->where($where)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Pengajuan Labor Rawat Inap',
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
                'status'                => 4
            ];
            DB::table('pasien')->where('id', $id)->update($dataStatus);
        };

        if ($request->has('daftar_labor')) {
            $pasien = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->daftar_labor); $i++) {
                $dataPengLabor[] = [
                    'idLabor'       => $request->daftar_labor[$i],
                    'hasil_labor'   => $request->hasil_labor[$i],
                    'idMPasien'     => $id,
                    'idMPerawatan'  => $pasien->idMPerawatan
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
                    'idMPasien'     => $id,
                    'idMPerawatan'  => $pasien->idMPerawatan
                ];
                // echo json_encode($dataPengLabor); die;
                DB::table('pengajuan_labor')->insert($dataPengLabor);
            }
        }

        return redirect("$this->url/". $id)->with('sukses', 'Data Pengajuan Labor Rawat Inap berhasil di Tambahkan');
    }
    
    public function destroy($id)
    {
        $pengajuan_labor      = $this->mPengajuanLabor->where('id', $id)->first();
        $this->mPengajuanLabor->destroy($id);

        return redirect("$this->url/". $id)->with('sukses', 'Data Pengajuan Labor Rawat Inap ' . $pengajuan_labor->nama . ' berhasil di hapus');
    }
}
