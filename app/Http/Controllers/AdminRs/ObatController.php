<?php

namespace App\Http\Controllers\AdminRs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ObatModel;
use App\Models\FaskesModel;

class ObatController extends Controller
{
    
    private $views      = 'adminRs/obat';
    private $url        = 'adminRs/obat';
    private $title      = 'Halaman Data Obat';
    protected $mObat;


    public function __construct()
    {
        // Di isi Construct
        $this->mObat = New ObatModel();
    }

    public function index()
    {
        $obat = $this->mObat->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'           => $this->title,
            'url'             => $this->url,
            'page'            => 'Data Obat',
            'obat'            => $obat
        ];
        
        return view($this->views . "/index", $data);
    }

    public function show($id)
    {
        $obat       = $this->mObat->where('id', $id)->first();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Obat',
            'obat'              => $obat,
        ];
        return view($this->views . "/show", $data);
    }

}
