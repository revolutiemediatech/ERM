<?php

namespace App\Http\Controllers\Api\bidan;
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
use App\Models\DataLaborModel;
use App\Models\PenunjangModel;

class TabelKhususSemua extends Controller
{
    private $url       = 'bidan/rawat-inap/pasien';
    private $url1      = 'bidan/pengajuan-labor';
    private $urll2     = 'bidan/pengajuan-obat';
    private $url3      = 'bidan/rawat-jalan/kia';
    private $url4      = 'bidan/pasienn';
    private $url5      = 'bidan/pengajuan-obat-rajal';
    private $url23     = 'bidan/pengajuan-obat-ranap';
    private $url6      = 'bidan/labor';
    private $url19     = 'bidan/pengajuan-labor-inap';
    private $url16     = 'bidan/penunjang';
    private $url17     = 'bidan/pengajuan-penunjang';
    private $url20     = 'bidan/pengajuan-penunjang-inap';
    protected $mFaskes;
    protected $mDesa;
    protected $mKecamatan;
    protected $mDaerah;
    protected $mKamar;
    protected $mBed;
    protected $mPasien;
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

    function getTabelPasienSA($idKamar = null){
        
        $pasien = $this->mPasien->where('idKamar', $idKamar)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            // $btnDetail = "<a href='".url($this->url."/".$row->id)."'><button type='button' class='btn btn-primary btn-sm' title='Detail Data'>Detail</button></a>";
            $btnEdit = "<a href='".url($this->url."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->tanggal;
            $tbody[]    = $row->nama;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->kamar->nama . "&nbsp;&nbsp; - &nbsp;&nbsp;" . $row->bed->nama;
            $tbody[]    = $row->lokasipemeriksaan->nama;
            $tbody[]    = $btnEdit;

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

            $btnDetail = "<a href='".url($this->url1."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
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

            $btnDetail = "<a href='".url($this->url2."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
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

            $btnDetail = "<a href='".url($this->url3."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            $btnEdit = "<a href='".url($this->url3."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->tanggal;
            $tbody[]    = $row->no_index;
            $tbody[]    = $row->nama;
            $tbody[]    = $row->lokasipemeriksaan->nama;
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

    function getObat($idLokasiPemeriksaan = null){
        
        $obat = $this->mObat->where('idLokasiPemeriksaan', $idLokasiPemeriksaan)->get();

        $i = 1;
        foreach ($obat as $row)
        {

            // $btnDetail = "<a href='".url($this->url."/".$row->id)."'><button type='button' class='btn btn-primary btn-sm' title='Detail Data'>Detail</button></a>";
            // $btnEdit = "<a href='".url($this->url2."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            // $btnDelete = "<a href='".url("$url/delete", ['id' => $p->id])" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"'><i class='far fa-trash-alt ms-text-danger'></i></a>";
            // $btn = $btnEdit.' '.$btnDelete;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->nama;
            $tbody[]    = $row->stok_awal;
            $tbody[]    = $row->satuan;
            $tbody[]    = $row->harga;
            $tbody[]    = $row->lokasipemeriksaan->nama;
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

    function getPasien($idLokasiPemeriksaan = null){
        
        $wherenyaa = [
            'idLokasiPemeriksaan'   => $idLokasiPemeriksaan,
            'idMPerawatan'          => 1,
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();

        $i = 1;
        foreach ($pasien as $row)
        {

            $btnDetail = "<a href='".url($this->url4."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
            // $btnEdit = "<a href='".url($this->url2."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
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

        // if ($obat != null)
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

            $btnDetail = "<a href='".url($this->url5."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
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

    function getLabor($idLokasiPemeriksaan = null){
        
        $labor = DataLaborModel::where('idLokasiPemeriksaan', $idLokasiPemeriksaan)->get();

        $i = 1;
        foreach ($labor as $row)
        {

            $btnDetail = "<a href='".url($this->url6."/".$row->id)."'><i class='fas fa-eye ms-text-primary'></i></a>";
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
    }

    function getTabelPengajuanPenunjang($idLokasiPemeriksaan = null){
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
}
