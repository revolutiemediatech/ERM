<?php

namespace App\Http\Controllers\Admin\RawatJalan;

use App\Http\Controllers\Controller;
use App\Models\AutofillModel;
use Illuminate\Http\Request;
use App\Models\DiagnosaModel;
use App\Models\ObatModel;
use App\Models\PasienModel;
use App\Models\UnitPelayananModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;

class BpGigiController extends Controller
{
    private $views      = 'admin/rawat_jalan/bp-gigi';
    private $url        = 'admin/rawat-jalan/bp-gigi';
    private $title      = 'Halaman Data BP.Gigi';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;
    protected $mUnitPelayanan;


    public function __construct()
    {
        // Di isi Construct
        $this->mDiagnosa        = New DiagnosaModel();
        $this->mObat            = New ObatModel();
        $this->mPasien          = New PasienModel();
        $this->mUnitPelayanan   = New UnitPelayananModel();
    }

    public function index()
    {
        $wherenyaa  = [
            'idMPerawatan'      => 1,
            'idMUnitPelayanan'  => 4
        ];
        $pasien = $this->mPasien->where($wherenyaa)->get();
        // $diagnosa = $this->mDiagnosa->where('idMUnitPelayanan', 4)->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Data BP Gigi',
            'pasien'        => $pasien
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
       // $obat               = $this->mObat->get();
        //$pasien             = $this->mPasien->where('idMUnitPelayanan', 4)->get();
        //$unitPelayanan      = UnitPelayananModel::all();
        //$faskes             = FaskesModel::all();
        
        //$data = [
         //   'title'         => $this->title,
         //   'url'           => $this->url,
         //   'page'          => 'Tambah Data Diagnosa',
         //   'pasien'        => $pasien,
          //  'obat'          => $obat,
          //  'unitPelayanan'     => $unitPelayanan,
         //   'faskes'            => $faskes,
      //  ];

       // return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
       // $dataDiagnosa = [
           // 'idMPasien'   => $request->idMPasien,
           // 'idMUsers'    => session()->get('users_id'),
           // 'idFaskes'    => $request->idFaskes,
           // 'idMObat'     => $request->idMObat,
            //'idMUnitPelayanan'     => $request->idMUnitPelayanan,
           // 'penyakit'    => $request->penyakit,
       // ];
       // $this->mDiagnosa->create($dataDiagnosa);

        //return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil di tambahkan');
    }

    public function show($id)
    {
        $pasien       = $this->mPasien->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Pasien',
            'pasien'    => $pasien,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $birthDate          = new \DateTime($tanggal_lahir);
        $today = new \DateTime("today");
        if ($birthDate > $today) {
            return "0 tahun 0 bulan 0 hari";
        }
        $y = $today->diff($birthDate)->y;
        // dd($y);
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        $obat               = $this->mObat->get();
        $unitPelayanan      = UnitPelayananModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $ACustom            = AutofillModel::where('idMUsers', session()->get('users_id'),)->get();


        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah RAPT Baru',
            'id'                => $id,
            'pasien'            => $pasien,
            'obat'              => $obat,
            'faskes'            => $faskes,
            'unitPelayanan'     => $unitPelayanan,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'usia'              => $y,
            'ACustom'           => $ACustom,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        if($request->idTinLanjutan == 1 && $request->idPemPenunjang == 1){
            $dataStatus =[
                'status' => 5
            ];

            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif($request->idTinLanjutan == 2) {
            $dataStatus = [
                'status' => 3
            ];
            $this->mPasien->where('id', $id)->update($dataStatus);
        }elseif($request->idPemPenunjang == 2) {
            $dataStatus = [
                'status' => 2
            ];
            $this->mPasien->where('id', $id)->update($dataStatus);
        };
        
        $dataDiagnosa = [
            'idMPasien'             => $request->idMPasien,
            'idMUsers'              => session()->get('users_id'),
            'idFaskes'              => $request->idFaskes,
            //'idMObat'             => $request->idMObat,
            'idMUnitPelayanan'      => 4,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'idTinLanjutan'         => $request->idTinLanjutan,
            'idPemPenunjang'        => $request->idPemPenunjang,
            'subjective'            => $request->subjective,
            'assesment'             => $request->assesment,
            'eye'                   => $request->eye, 
            'verbal'                => $request->verbal,
            'motorik'               => $request->motorik,
            'keadaan_umum'          => $request->keadaan_umum,
            'td1'                   => $request->td1,
            'td2'                   => $request->td2,
            'hr'                    => $request->hr,
            'rr'                    => $request->rr,
            'suhu'                  => $request->suhu,
            'spo2'                  => $request->spo2,
            'bb'                    => $request->bb,
            'tb'                    => $request->tb,
            'ca1'                   => $request->ca1,
            'ca2'                   => $request->ca2,     
            'si1'                   => $request->si1,
            'si2'                   => $request->si2,
            'rc1'                   => $request->rc1,
            'rc2'                   => $request->rc2,
            's1_2'                  => $request->s1_2,
            'murmur1'               => $request->murmur1,
            'murmur2'               => $request->murmur2,
            'gallop1'               => $request->gallop1,
            'gallop2'               => $request->gallop2,
            'sdv1'                  => $request->sdv1,
            'sdv2'                  => $request->sdv2,
            'rh1'                   => $request->rh1,
            'rh2'                   => $request->rh2,
            'wh1'                   => $request->wh1,
            'wh2'                   => $request->wh2,
            'retraksi1'             => $request->retraksi1,
            'retraksi2'             => $request->retraksi2,
            'kontur'                => $request->kontur,
            'defans'                => $request->defans,
            'bu1'                   => $request->bu1,
            'bu2'                   => $request->bu2,
            'nt1'                   => $request->nt1,
            'nt2'                   => $request->nt2,
            'crt'                   => $request->crt,
            'akral'                 => $request->akral,
            'edema1'                => $request->edema1,
            'edema2'                => $request->edema2,
            'status_lokalis'        => $request->status_lokalis,
            'fisik_khusus'          => $request->fisik_khusus,
        ];
        $this->mDiagnosa->where('id', $id)->create($dataDiagnosa);
        // echo json_encode($dataDiagnosa); die();
        return redirect("$this->url")->with('sukses', 'Data Diagnosa berhasil di edit');
    }

    public function destroy($id)
    {
        $diagnosa       = $this->mDiagnosa->where('id', $id)->first();
        $this->mDiagnosa->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Diagnosa' . $diagnosa->nama . ' berhasil di hapus');
    }
}
