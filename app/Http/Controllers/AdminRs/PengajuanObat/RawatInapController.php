<?php

namespace App\Http\Controllers\AdminRs\PengajuanObat;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\ObatModel;
use App\Models\PengajuanObatModel;

class RawatInapController extends Controller
{
    private $views      = 'adminRs/pengajuan_obat/ranap';
    private $url        = 'adminRs/pengajuan-obat-ranap';
    private $title      = 'Halaman Data Pegajuan Obat Rawat Inap';
    protected $mDiagnosa;
    protected $mPasien;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mObat        = New ObatModel();
        $this->mPasien      = New PasienModel();
        $this->mPengajuanObat  = New PengajuanObatModel();
    }

    public function index()
    {
        $wherenyaa = [
            'idFaskes'      => session()->get('idFaskes'),
            'status'        => 5
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data Pengajuan Obat Rawat Inap',
            'pasien'        => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanObat        = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();
        $obat               = $this->mObat->where('status', 1)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $birthDate          = new \DateTime($tanggal_lahir);
        $today = new \DateTime("today");
        if ($birthDate > $today) {
            return "0 tahun";
        }
        $y = $today->diff($birthDate)->y;

        //checkbox unlock
        $tepat_pasien                   = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $tepat_obat                     = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $tepat_waktu_pemberian          = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $tepat_cara_pemberian           = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $tepat_indikasi                 = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $tidak_ada_polifarmasi          = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $sediaan_nama_obat              = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $dosis_unlock                   = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $cara_pemakaian                 = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $indikasi                       = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $kontra_indikasi                = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $efek_samping                   = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $penyimpanan                    = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $alergi_obat                    = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Pasien',
            'id'                => $id,
            'pasien'            => $pasien,
            'usia'              => $y,
            'pilihanObat'       => $pilihanObat,
            'obat'              => $obat,
            'pilihanPekerjaan'  => $pilihanPekerjaan,
            'tepat_pasien'      => $tepat_pasien,
            'tepat_obat'      => $tepat_obat,
            'tepat_waktu_pemberian'      => $tepat_waktu_pemberian,
            'tepat_cara_pemberian'      => $tepat_cara_pemberian,
            'tepat_indikasi'      => $tepat_indikasi,
            'tidak_ada_polifarmasi'      => $tidak_ada_polifarmasi,
            'sediaan_nama_obat'      => $sediaan_nama_obat,
            'dosis_unlock'      => $dosis_unlock,
            'cara_pemakaian'      => $cara_pemakaian,
            'indikasi'      => $indikasi,
            'kontra_indikasi'      => $kontra_indikasi,
            'efek_samping'      => $efek_samping,
            'penyimpanan'      => $penyimpanan,
            'alergi_obat'      => $alergi_obat,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $obat               = $this->mObat->where('status', 1)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Input Obat Pasien',
            'id'                => $id,
            'pasien'            => $pasien,
            'obat'              => $obat,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        if ($request->has('nama_obat')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            DB::table('pengajuan_obat')->where('idMPasien', $id)->delete();
            for ($i = 0; $i < count($request->nama_obat); $i++) {
                $dataPengObat[] = [
                    'idObat'        => $request->nama_obat[$i],
                    'dosis'         => $request->dosis[$i],
                    'jumlah'        => $request->jumlah[$i],
                    'keterangan'    => $request->keterangan[$i],
                    'idMPerawatan'  => $pasien->idMPerawatan,
                    'idMPasien'     => $pasien->id
                ];
            }
            // echo json_encode($dataPengObat); die;
            DB::table('pengajuan_obat')->insert($dataPengObat);
            return redirect("$this->url")->with('sukses', 'Data Obat berhasil di Tambahkan');
        } elseif($request->has('tepat_pasien') && $request->has('tepat_obat') && $request->has('tepat_waktu_pemberian') && $request->has('tepat_cara_pemberian') &&
            $request->has('tepat_indikasi') && $request->has('tidak_ada_polifarmasi') && $request->has('sediaan_nama_obat') && $request->has('dosis_unlock') && 
            $request->has('cara_pemakaian') && $request->has('indikasi') && $request->has('kontra_indikasi') && $request->has('efek_samping') && $request->has('penyimpanan') && $request->has('alergi_obat')){
            
                $dataDiagnosa = [
                'status'                => 6
            ];
            // echo json_encode($dataDiagnosa); die();
            $this->mPasien->where('id', $id)->update($dataDiagnosa);

            $pasien             = $this->mPasien->where('id', $id)->first();
            $dataChecklist = [
                'idMPasien'             => $pasien->id,
                'tepat_pasien'          => $request->tepat_pasien,
                'tepat_obat'            => $request->tepat_obat,
                'tepat_waktu_pemberian' => $request->tepat_waktu_pemberian,
                'tepat_cara_pemberian'  => $request->tepat_cara_pemberian,
                'tepat_indikasi'        => $request->tepat_indikasi,
                'tidak_ada_polifarmasi' => $request->tidak_ada_polifarmasi,
                'sediaan_nama_obat'     => $request->sediaan_nama_obat,
                'dosis_unlock'          => $request->dosis_unlock,
                'cara_pemakaian'        => $request->cara_pemakaian,
                'indikasi'              => $request->indikasi,
                'kontra_indikasi'       => $request->kontra_indikasi,
                'efek_samping'          => $request->efek_samping,
                'penyimpanan'           => $request->penyimpanan,
                'alergi_obat'           => $request->alergi_obat
            ];
            DB::table('pengajuan_obat')->where('idMPasien', $id)->update($dataChecklist);
            return redirect("$this->url")->with('sukses', 'Data Checklist berhasil di Tambahkan');
        } elseif($request->has('tepat_pasien') && $request->has('tepat_obat') && $request->has('tepat_waktu_pemberian') && $request->has('tepat_cara_pemberian') &&
        $request->has('tepat_indikasi') && $request->has('tidak_ada_polifarmasi')){
            $pasien             = $this->mPasien->where('id', $id)->first();
            $dataChecklist = [
                'idMPasien'             => $pasien->id,
                'tepat_pasien'          => $request->tepat_pasien,
                'tepat_obat'            => $request->tepat_obat,
                'tepat_waktu_pemberian' => $request->tepat_waktu_pemberian,
                'tepat_cara_pemberian'  => $request->tepat_cara_pemberian,
                'tepat_indikasi'        => $request->tepat_indikasi,
                'tidak_ada_polifarmasi' => $request->tidak_ada_polifarmasi,
                'sediaan_nama_obat'     => 0,
                'dosis_unlock'          => 0,
                'cara_pemakaian'        => 0,
                'indikasi'              => 0,
                'kontra_indikasi'       => 0,
                'efek_samping'          => 0,
                'penyimpanan'           => 0,
                'alergi_obat'           => 0
            ];
            DB::table('pengajuan_obat')->where('idMPasien', $id)->update($dataChecklist);
            return redirect("$this->url")->with('sukses', 'Data Checklist berhasil di Tambahkan');
        }
    }
}
