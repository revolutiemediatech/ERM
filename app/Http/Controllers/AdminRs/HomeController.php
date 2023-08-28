<?php

namespace App\Http\Controllers\AdminRs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserModel;
use App\Models\ObatModel;
use App\Models\FaskesModel;
use App\Models\PasienModel;

class HomeController extends Controller
{
    private $views      = 'adminRs/home';
    private $url        = 'adminRs/home';
    private $title      = 'Halaman Dashboard';
    protected $mUsers;
    protected $mFaskes;

    public function __construct()
    {
        // Di isi Construct
        $this->mUsers           = new UserModel();
        $this->mObat           = new ObatModel();
        $this->mFaskes      = new FaskesModel();
        $this->mPasien      = New PasienModel();
    }

    public function index()
    {
        $users          = $this->mUsers->get();
        $mitra          = $this->mFaskes->get();
        $dokter1        = $this->mUsers->where('idRole', 3)->get();
        $faskes         = $this->mFaskes->get();
        $rawat_jalan    = $this->mPasien->where('idMPerawatan', 1)->get();
        $rawat_inap     = $this->mPasien->where('idMPerawatan', 2)->get();

        $wherenyaa = [
            'tanggal'   => date('y-m-d', time()),
            'idFaskes'  => session()->get('idFaskes')
        ];
        $pasien         = $this->mPasien->where($wherenyaa)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Dashboard',
            'users'         => $users,
            'mitra'         => $mitra,
            'dokter1'       => $dokter1,
            'faskes'        => $faskes,
            'rawat_jalan'   => $rawat_jalan,
            'rawat_inap'    => $rawat_inap,
            'pasien'        => $pasien,
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {   
        //
    }

    public function destroy($id)
    {
        //
    }
}
