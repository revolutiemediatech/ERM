<?php

namespace App\Http\Controllers\Api\dokter;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\DiagnosaModel;
use App\Models\FaskesModel;
use App\Models\DesaModel;
use App\Models\KecamatanModel;
use App\Models\DaerahModel;
use App\Models\KamarModel;
use App\Models\BedModel;
use App\Models\DataLaborModel;
use App\Models\PasienModel;
use App\Models\ObatModel;
use App\Models\PenunjangModel;

class TabelKhususSemua extends Controller
{
    private $url3       = 'dokter/labor';
    private $url4       = 'dokter/pasienn';
    private $url5       = 'dokter/rawat-inap/pasien';
    private $url6       = 'dokter/pengajuan-obat';
    private $url7       = 'dokter/bp-umum';
    private $url8       = 'dokter/lansia';
    private $url9       = 'dokter/ugd';
    private $url10      = 'dokter/bp-gigi';
    private $url11      = 'dokter/kia';
    private $url12      = 'dokter/gizi';
    private $url14      = 'dokter/pengajuan-obat-rajal';
    private $url15      = 'dokter/pengajuan-labor';
    private $url16      = 'dokter/penunjang';
    private $url17      = 'dokter/pengajuan-penunjang';
    private $url19      = 'dokter/pengajuan-labor-inap';
    private $url20      = 'dokter/pengajuan-penunjang-inap';
    private $url23      = 'dokter/pengajuan-obat-ranap';
    protected $mFaskes;
    protected $mDesa;
    protected $mKecamatan;
    protected $mDaerah;
    protected $mKamar;
    protected $mBed;
    protected $mPasien;
    protected $mDiagnosa;
    protected $mObat;

    public function __construct()
    {
        $this->mDiagnosa    = New DiagnosaModel();
        $this->mFaskes      = New FaskesModel();
        $this->mDesa        = new DesaModel();
        $this->mKecamatan   = new KecamatanModel();
        $this->mDaerah      = new DaerahModel();
        $this->mKamar       = new KamarModel();
        $this->mBed         = new BedModel();
        $this->mPasien      = new PasienModel();
        $this->mObat        = new ObatModel();
    
    }

    function getObatDokter($idLokasiPemeriksaan = null){
        
        $obat = $this->mObat->where('idLokasiPemeriksaan', $idLokasiPemeriksaan)->get();

        $i = 1;
        foreach ($obat as $row)
        {

            // $btnDetail = "<a href='".url($this->url."/".$row->id)."'><button type='button' class='btn btn-primary btn-sm' title='Detail Data'>Detail</button></a>";
            // $btnEdit = "<a href='".url($this->url5."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->nama;
            $tbody[]    = $row->stok_awal;
            $tbody[]    = $row->satuan;
            $tbody[]    = 'Rp ' . $row->harga;
            if ($row->status == 1) {
                $tbody[]    = "<span class='badge badge-success me-auto'>Tersedia</span>";
            } elseif ($row->status == 2) {
                $tbody[]    = "<span class='badge badge-danger me-auto'>Habis</span>";
            }
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

    function getTabelPengajuanObat($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idPemPenunjang'        => 1,
            'idTinLanjutan'         => 1,
        ];
        $diagnosa = $this->mDiagnosa->where($wherenyaa)->get();

        $i = 1;
        foreach ($diagnosa as $row)
        {

            $btnDetail = "<a href='".url($this->url6."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url6."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->pasien->tanggal;
            $tbody[]    = $row->pasien->nama;
            $tbody[]    = $row->pasien->no_index;
            $tbody[]    = $row->lokasipemeriksaan->nama;
            $tbody[]    = $btnDetail;

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

    function getPasienDokter($idLokasiPemeriksaan = null){
        
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 2,
            'status'                => 4
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();
        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url5."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url5."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnEdit.' '.$btnDetail;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->nama;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->kamar->nama . "&nbsp; - &nbsp;" . $row->bed->nama;
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
            $tbody[]    = $btn;

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

    function getTabelUmum($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
            'idMUnitPelayanan'      => 1
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url7."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url7."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->nama;
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
            $tbody[]    = $btn;

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

    function getTabelLansia($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
            'idMUnitPelayanan'      => 2
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url8."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url8."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->nama;
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
            $tbody[]    = $btn;

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

    function getTabelUgd($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
            'idMUnitPelayanan'      => 3
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url9."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url9."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->nama;
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
            $tbody[]    = $btn;

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

    function getTabelGigi($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
            'idMUnitPelayanan'      => 4
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url10."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url10."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->nama;
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
            $tbody[]    = $btn;

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

    function getTabelKia($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
            'idMUnitPelayanan'      => 5
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url11."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url11."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->nama;
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
            $tbody[]    = $btn;

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

    function getTabelGizi($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
            'idMUnitPelayanan'      => 7
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url12."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url12."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->nama;
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
            $tbody[]    = $btn;

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

    function getPasien($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url4."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url5."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->nik;
            $tbody[]    = $row->no_kk;
            $tbody[]    = $row->nama;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->lokasipemeriksaan->nama;
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

    function getPenunjang($idLokasiPemeriksaan = null){
        
        $penunjang = PenunjangModel::where('idLokasiPemeriksaan', $idLokasiPemeriksaan)->get();

        $i = 1;
        foreach ($penunjang as $row)
        {
            $btnDetail = "<a href='".url($this->url16."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url16."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->nama;
            $tbody[]    = 'Rp' . $row->harga;
            $tbody[]    = $row->pembiayaan;
            if ($row->status == 1) {
                $tbody[]    = "<span class='badge badge-success me-auto'>Tersedia</span>";
            } elseif ($row->status == 2) {
                $tbody[]    = "<span class='badge badge-danger me-auto'>Habis</span>";
            }
            $tbody[]    = $btn;

            $data[]     = $tbody;
        }

        // if ($penunjang != null)
        if (count($penunjang) > 0)
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
    }function getTabelPengajuanPenunjang($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url17."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url5."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

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
    function getTabelPengajuanPenunjangInap($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 2,
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url20."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url5."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

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

    function getTabelPengajuanObatRajal($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,

        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url14."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
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

            $btnDetail = "<a href='".url($this->url23."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
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

    function getTabelPengajuanLabor($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url15."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url5."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

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

    function getTabelPengajuanLaborInap($idLokasiPemeriksaan = null){
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 2,
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url19."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url5."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

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

    function getLabor($idLokasiPemeriksaan = null){
        
        $labor = DataLaborModel::where('idLokasiPemeriksaan', $idLokasiPemeriksaan)->get();

        $i = 1;
        foreach ($labor as $row)
        {

            $btnDetail = "<a href='".url($this->url3."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url3."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $row->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->nama;
            $tbody[]    = $row->satuan;
            $tbody[]    = $row->batas_bawah;
            $tbody[]    = $row->batas_atas;
            $tbody[]    = 'Rp'. $row->harga;
            $tbody[]    = $row->pembiayaan;
            if ($row->status == 1) {
                $tbody[]    = "<span class='badge badge-success me-auto'>Tersedia</span>";
            } elseif ($row->status == 2) {
                $tbody[]    = "<span class='badge badge-danger me-auto'>Habis</span>";
            }
            $tbody[]    = $btnDetail;

            $data[]     = $tbody;
        }

        // if ($labor != null)
        if (count($labor) > 0)
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
