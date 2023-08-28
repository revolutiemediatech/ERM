<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesaModel;
use App\Models\KecamatanModel;
use App\Models\DaerahModel;
use App\Models\SekolahModel;

class DaerahTabelController extends Controller
{
    private $url        = 'admin/desa';
    private $url2       = 'admin/kecamatan';
    private $url3       = 'admin/daerah';
    protected $mDesa;
    protected $mKecamatan;
    protected $mDaerah;
    public function __construct()
    {
        $this->mDesa               = new DesaModel();
        $this->mKecamatan               = new KecamatanModel();
        $this->mDaerah               = new DaerahModel();
    
    }

    function getSekolah($idMKecamatan = null){
        $sekolah = SekolahModel::where('idMKecamatan', $idMKecamatan)->get();

        $i = 1;
        foreach ($sekolah as $row)
        {

            $btnDetail = "<a href='".url($this->url."/".$row->id)."'><button type='button' class='btn btn-primary btn-sm' title='Detail Data'>Detail</button></a>";
            $btnEdit = "<a href='".url($this->url."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->provinsi->nama;
            $tbody[]    = $row->daerah->nama;
            $tbody[]    = $row->kecamatan->nama;
            $tbody[]    = $row->nama;
            $tbody[]    = $row->alamat;
            // $tbody[]    = $btnEdit;

            $data[]     = $tbody;
        }

        // if ($siswa != null)
        if (count($sekolah) > 0)
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

    function getDesa($idMKecamatan = null){
        $desa = $this->mDesa->where('idMKecamatan', $idMKecamatan)->get();

        $i = 1;
        foreach ($desa as $row)
        {

            $btnDetail = "<a href='".url($this->url."/".$row->id)."'><button type='button' class='btn btn-primary btn-sm' title='Detail Data'>Detail</button></a>";
            $btnEdit = "<a href='".url($this->url."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->provinsi->nama;
            $tbody[]    = $row->daerah->nama;
            $tbody[]    = $row->kecamatan->nama;
            $tbody[]    = $row->nama;
            $tbody[]    = $btnEdit;

            $data[]     = $tbody;
        }

        // if ($siswa != null)
        if (count($desa) > 0)
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

    function getKecamatan($idMDaerah = null){
        $kecamatan = $this->mKecamatan->where('idMDaerah', $idMDaerah)->get();

        $i = 1;
        foreach ($kecamatan as $row)
        {

            $btnDetail = "<a href='".url($this->url3."/".$row->id)."'><button type='button' class='btn btn-primary btn-sm' title='Detail Data'>Detail</button></a>";
            $btnEdit = "<a href='".url($this->url3."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->provinsi->nama;
            $tbody[]    = $row->daerah->nama;
            $tbody[]    = $row->nama;
            $tbody[]    = $btnEdit;

            $data[]     = $tbody;
        }

        // if ($siswa != null)
        if (count($kecamatan) > 0)
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

    function getDaerah($idMProvinsi = null){
        $daerah = $this->mDaerah->where('idMProvinsi', $idMProvinsi)->get();

        $i = 1;
        foreach ($daerah as $row)
        {

            $btnDetail = "<a href='".url($this->url3."/".$row->id)."'><button type='button' class='btn btn-primary btn-sm' title='Detail Data'>Detail</button></a>";
            $btnEdit = "<a href='".url($this->url3."/".$row->id)."/edit"."'><i class='fas fa-pencil-alt ms-text-primary'></i></a>";
            $btn = $btnDetail.' '.$btnEdit;

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->provinsi->nama;
            $tbody[]    = $row->nama;
            $tbody[]    = $btnEdit;

            $data[]     = $tbody;
        }

        // if ($siswa != null)
        if (count($daerah) > 0)
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
