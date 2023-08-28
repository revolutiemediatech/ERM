<?php

namespace App\Http\Controllers\Api\apoteker;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\DiagnosaModel;
use App\Models\FaskesModel;
use App\Models\DesaModel;
use App\Models\KecamatanModel;
use App\Models\DaerahModel;
use App\Models\KamarModel;
use App\Models\BedModel;
use App\Models\PasienModel;
use App\Models\ObatModel;

class TabelKhususSemua extends Controller
{
    private $url1      = 'apoteker/pengajuan-labor';
    private $url2      = 'apoteker/pengajuan-obat-rajal';
    private $url3      = 'apoteker/obat';
    private $url4      = 'apoteker/pengajuan-obat-ranap';
    protected $mFaskes;
    protected $mDesa;
    protected $mKecamatan;
    protected $mDaerah;
    protected $mKamar;
    protected $mBed;
    protected $mPasien;

    public function __construct()
    {
        $this->mFaskes      = New FaskesModel();
        $this->mDesa        = new DesaModel();
        $this->mKecamatan   = new KecamatanModel();
        $this->mDaerah      = new DaerahModel();
        $this->mKamar       = new KamarModel();
        $this->mBed         = new BedModel();
        $this->mPasien      = new PasienModel();
        $this->mObat        = new ObatModel();
    
    }

    function getTabelPengajuanLabor($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idPemPenunjang'        => 2,
        ];
        $diagnosa = $this->mDiagnosa->where($wherenyaa)->get();

        $i = 1;
        foreach ($diagnosa as $row)
        {

            // $btnDetail = "<a href='".url($this->url."/".$row->id)."'><button type='button' class='btn btn-primary btn-sm' title='Detail Data'>Detail</button></a>";
            $btnEdit = "<a href='".url($this->url1."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->pasien->tanggal;
            $tbody[]    = $row->pasien->nama;
            $tbody[]    = $row->pasien->no_index;
            $tbody[]    = $row->lokasipemeriksaan->nama;
            $tbody[]    = $btnEdit;

            $data[]     = $tbody;
        }

        // if ($pasien != null)
        if (count($diagnosa) > 0)
        {
            $response = [
                'data'      => $data,
            ];
            echo json_encode($response);
        }else{
            $response = [
                'data'      => '',
            ];
            echo json_encode($response);
        }
    }

    function getTabelPengajuanObatRajal($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,

        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url2."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url14."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->nama;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->perawatan->nama;
            if ($row->status == 1) {
                $tbody[]    = "<span class='badge badge-pill badge-warning'>Sedang Diperiksa Dokter</span>";
            } elseif ($row->status == 2) {
                $tbody[]    = "<span class='badge badge-pill badge-warning'>Sedang Pemeriksaan Labor</span>";
            } elseif ($row->status == 3) {
                $tbody[]    = "<span class='badge badge-pill badge-warning'>Sedang Pengajuan Rawat Inap</span>";
            } elseif ($row->status == 4) {
                $tbody[]    = "<span class='badge badge-pill badge-warning'>Sedang Perawatan Inap</span>";
            } elseif ($row->status == 5) {
                $tbody[]    = "<span class='badge badge-pill badge-secondary'>Sedang Menunggu Obat</span>";
            } elseif ($row->status == 6) {
                $tbody[]    = "<span class='badge badge-pill badge-info'>Sedang Menunggu Pembayaran</span>";
            } elseif ($row->status == 7) {
                $tbody[]    = "<span class='badge badge-pill badge-success'>Selesai</span>";
            } elseif ($row->status == 8) {
                $tbody[]    = "<span class='badge badge-pill badge-info'>Sedang Pemeriksaan Penunjang</span>";
            }
            $tbody[]    = $btnDetail;

            $data[]     = $tbody;
        }

        // if ($pasien != null)
        if (count($pasien) > 0)
        {
            $response = [
                'data'      => $data,
            ];
            echo json_encode($response);
        }else{
            $response = [
                'data'      => '',
            ];
            echo json_encode($response);
        }
    }
    function getTabelPengajuanObatRanap($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 2,

        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url4."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url14."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->nama;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->perawatan->nama;
            if ($row->status == 1) {
                $tbody[]    = "<span class='badge badge-pill badge-warning'>Sedang Diperiksa Dokter</span>";
            } elseif ($row->status == 2) {
                $tbody[]    = "<span class='badge badge-pill badge-warning'>Sedang Pemeriksaan Labor</span>";
            } elseif ($row->status == 3) {
                $tbody[]    = "<span class='badge badge-pill badge-warning'>Sedang Pengajuan Rawat Inap</span>";
            } elseif ($row->status == 4) {
                $tbody[]    = "<span class='badge badge-pill badge-warning'>Sedang Perawatan Inap</span>";
            } elseif ($row->status == 5) {
                $tbody[]    = "<span class='badge badge-pill badge-secondary'>Sedang Menunggu Obat</span>";
            } elseif ($row->status == 6) {
                $tbody[]    = "<span class='badge badge-pill badge-info'>Sedang Menunggu Pembayaran</span>";
            } elseif ($row->status == 7) {
                $tbody[]    = "<span class='badge badge-pill badge-success'>Selesai</span>";
            } elseif ($row->status == 8) {
                $tbody[]    = "<span class='badge badge-pill badge-info'>Sedang Pemeriksaan Penunjang</span>";
            }
            $tbody[]    = $btnDetail;

            $data[]     = $tbody;
        }

        // if ($pasien != null)
        if (count($pasien) > 0)
        {
            $response = [
                'data'      => $data,
            ];
            echo json_encode($response);
        }else{
            $response = [
                'data'      => '',
            ];
            echo json_encode($response);
        }
    }

    function getObat($idLokasiPemeriksaan = null){
        
        $obat = $this->mObat->where('idLokasiPemeriksaan', $idLokasiPemeriksaan)->get();

        $i = 1;
        foreach ($obat as $row)
        {

            $btnDetail = "<a href='".url($this->url3."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url3."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->nama;
            $tbody[]    = $row->stok_awal;
            $tbody[]    = $row->satuan;
            $tbody[]    = 'Rp' . $row->harga;
            if ($row->status == 1) {
                $tbody[]    = "<span class='badge badge-success me-auto'>Tersedia</span>";
            } elseif ($row->status == 2) {
                $tbody[]    = "<span class='badge badge-danger me-auto'>Habis</span>";
            }
            $tbody[]    = $btn;

            $data[]     = $tbody;
        }

        // if ($obat != null)
        if (count($obat) > 0)
        {
            $response = [
                'data'      => $data,
            ];
            echo json_encode($response);
        }else{
            $response = [
                'data'      => '',
            ];
            echo json_encode($response);
        }
    }

}
