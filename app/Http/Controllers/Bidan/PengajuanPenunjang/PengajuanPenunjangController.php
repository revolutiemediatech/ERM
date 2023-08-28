<?php

namespace App\Http\Controllers\Bidan\PengajuanPenunjang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\PengajuanPenunjangModel;
use App\Models\PekerjaanModel;
use App\Models\PenunjangModel;

class PengajuanPenunjangController extends Controller
{
    private $views      = 'bidan/pengajuan_penunjang/rajal';
    private $url        = 'bidan/pengajuan-penunjang';
    private $title      = 'Halaman Data Pegajuan Penunjang Rawat Jalan';
    protected $mDiagnosa;
    protected $mPasien;
    protected $mPengajuanPenunjang;
    protected $mPenunjang;
    protected $mPekerjaan;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa            = new DiagnosaModel();
        $this->mPasien              = new PasienModel();
        $this->mPengajuanPenunjang  = new PengajuanPenunjangModel();
        $this->mPenunjang           = new PenunjangModel();
        $this->mPekerjaan           = new PekerjaanModel();
    }

    public function index()
    {
        $where      = [
            'status'    => 8,
            'idFaskes'  => session()->get('idFaskes')
        ];
        $pasien   = $this->mPasien->where($where)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pengajuan Penunjang Rawat Jalan',
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
            'page'              => 'Pengajuan Penunjang Rawat Jalan',
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
        $where      = [
            'status'    => 1,
            'idFaskes'  => session()->get('idFaskes')
        ];
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanPenunjang   = $this->mPengajuanPenunjang->where('idDiagnosa', $id)->get();
        $penunjang          = $this->mPenunjang->where($where)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Pengajuan Penunjang Rawat Jalan',
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
                'status'                => 1
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
                // echo json_encode($dataPengPenun); die;
                DB::table('pengajuan_penunjang')->where('idPenunjang', $request->nama_penunjang[$i])->update(['hasil_penunjang' => $dataPengPenun[$i]['hasil_penunjang']]);
            }
        } elseif ($request->has('nama_penunjang1')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->nama_penunjang1); $i++) {
                $dataPengPenun[] = [
                    'idPenunjang'       => $request->nama_penunjang1[$i],
                    'hasil_penunjang'   => $request->hasil_penunjang1[$i],
                    'idMPasien'         => $id
                ];
                // echo json_encode($dataPengPenun); die;
                DB::table('pengajuan_penunjang')->insert($dataPengPenun);
            }
        }

        return redirect("$this->url/" . $id)->with('sukses', 'Data Pengajuan Penunjang Rawat Jalan berhasil di Tambahkan');
    }

    public function destroy($id)
    {
        $pengajuan_penunjang      = $this->mPengajuanPenunjang->where('id', $id)->first();
        $this->mPengajuanPenunjang->destroy($id);

        return redirect("$this->url/". $id)->with('sukses', 'Data Pengajuan Penunjang Rawat Jalan ' . $pengajuan_penunjang->penunjang->nama . ' berhasil di hapus');
    }
}
