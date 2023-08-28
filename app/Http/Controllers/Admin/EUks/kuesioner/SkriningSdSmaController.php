<?php

namespace App\Http\Controllers\Admin\EUks\kuesioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Library
use Illuminate\Support\Facades\Hash;

// Model
use App\Models\FaskesModel;

class SkriningSdSmaController extends Controller
{
    private $views      = 'admin/kuesioner/pemeriksaan_sd';
    private $url        = 'admin/e-uks/pemeriksaan-sd-sma';
    private $title      = "O'RBS MEDICA | E-UKS";

    public function index()
    {
        //
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'faskes'           => $faskes
        ];
        return view("$this->views/create", $data);
    }

    public function store(Request $request)
    {
        // echo json_encode($request->all()); die();
        $dataUserData = [				
            'nama' 					=> $request->nama,	
            'idFaskes' 				=> $request->idFaskes,
            'tanggal_lahir' 		=> $request->tanggal_lahir,
            'jenis_kelamin' 		=> $request->jenis_kelamin,
            'no_hp' 				=> $request->no_hp,
            'idSekolah' 			=> $request->idSekolah,
            'idKelas' 				=> $request->idKelas,
            'berat_badan' 			=> $request->berat_badan,
            'tinggi_badan' 			=> $request->tinggi_badan,
            'ap_kam_hal_dib_in'     => $request->ap_kam_hal_dib_in,
            'ram_ber' 				=> $request->ram_ber,
            'mas_kulit' 			=> $request->mas_kulit,
            'mas_kuku' 				=> $request->mas_kuku,
            'inf_mata_kan' 			=> $request->inf_mata_kan,
            'inf_mata_kir' 			=> $request->inf_mata_kir,
            'kel_ref_matKan' 		=> $request->kel_ref_matKan,
            'low_vis_matKan' 		=> $request->low_vis_matKan,
            'keb_matKan' 			=> $request->keb_matKan,
            'kac_matKan' 			=> $request->kac_matKan,
            'kel_ref_matKir' 		=> $request->kel_ref_matKir,
            'low_vis_matKir' 		=> $request->low_vis_matKir,
            'keb_matKir' 			=> $request->keb_matKir,
            'kac_matKir' 			=> $request->kac_matKir,
            'but_war' 				=> $request->but_war,
            'ott_med_telKan' 		=> $request->ott_med_telKan,
            'ott_eks_telKan' 		=> $request->ott_eks_telKan,
            'ser_telKan' 			=> $request->ser_telKan,
            'ott_med_telKir' 		=> $request->ott_med_telKir,
            'ott_eks_telKir' 		=> $request->ott_eks_telKir,
            'ser_telKir' 			=> $request->ser_telKir,
            'gang_telKan' 			=> $request->gang_telKan,
            'gang_telKir' 			=> $request->gang_telKir,
            'cel_bib' 				=> $request->cel_bib,
            'luk_sud_mul' 			=> $request->luk_sud_mul,
            'sariawan' 				=> $request->sariawan,
            'lid_kot' 				=> $request->lid_kot,
            'luka_lain' 			=> $request->luka_lain,
            'gig_berlub' 			=> $request->gig_berlub,
            'gus_mud_darah' 		=> $request->gus_mud_darah,
            'gus_beng' 				=> $request->gus_beng,
            'gig_kot' 				=> $request->gig_kot,
            'kar_gigi' 				=> $request->kar_gigi,
            'sus_gig_dep_tTeratur' 	=> $request->sus_gig_dep_tTeratur,
            'keb_jas' 				=> $request->keb_jas,
            'peng_alBan' 			=> $request->peng_alBan,
            'td_sys' 				=> $request->td_sys,
            'td_dias' 				=> $request->td_dias,
            'deny_nad' 				=> $request->deny_nad,
            'suhu' 					=> $request->suhu,
            'bis_jan' 				=> $request->bis_jan,
            'bis_par' 				=> $request->bis_par,
            'ruj_pus' 				=> $request->ruj_pus,
            'pem_ttd' 				=> $request->pem_ttd,
            'pem_obCac' 			=> $request->pem_obCac,
            'kep_bukRapSehat' 		=> $request->kep_bukRapSehat,
        ];
        // echo json_encode($dataUserData); die;
        DB::table('answer_sdSma')->insert($dataUserData);

        // kirim wa dulu gag sih
        waThanksSD($request->no_hp, $request->nama);

        // // Response
        return redirect("$this->url/thanks")->with('sukses', 'Terima Kasih telah Memberikan Jawaban');
    }

    public function thanks()
    {
        // Get Data

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
        ];
        return view("$this->views/thanks", $data);
    }

    public function show($id)
    {
        // Get Data
        $penerima   = DB::table('answer_gigi')->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'id'        => $id,
            'penerima'  => $penerima,
        ];
        return view("$this->views/show", $data);
    }
}
