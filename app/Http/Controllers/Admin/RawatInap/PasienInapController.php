<?php

namespace App\Http\Controllers\Admin\RawatInap;

use App\Http\Controllers\Controller;
use App\Models\AutofillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\BedModel;
use App\Models\KamarModel;
use App\Models\FaskesModel;
use App\Models\LokasiModel;
use App\Models\DiagnosaModel;
use App\Models\PasienModel;
use App\Models\ObatModel;
use App\Models\UnitPelayananModel;
use App\Models\PengajuanLaborModel;
use App\Models\PengajuanObatModel;
use App\Models\PengajuanPenunjangModel;
use App\Models\DataLaborModel;
use App\Models\PenunjangModel;
use App\Models\PekerjaanModel;
use App\Models\PenyakitDahuluModel;
use App\Models\RiwayatAlergiModel;
use App\Models\TindakanMedisModel;
use App\Models\PengajuanTindakanModel;
use App\Models\IcdTenModel;
use App\Models\PengajuanAssesmentModel;

class PasienInapController extends Controller
{
    private $views      = 'admin/rawat_inap';
    private $url        = 'admin/rawat-inap/pasien';
    private $title      = 'Halaman Data Pasien Rawat Inap';
    protected $mDiagnosa;
    protected $mObat;
    protected $mPasien;
    protected $mBed;
    protected $mKamar;
    protected $mLokasi;
    protected $mFaskes;


    public function __construct()
    {
        // Di isi Construct
        $this->mBed                 = New BedModel();
        $this->mKamar               = New KamarModel();
        $this->mFaskes              = New FaskesModel();
        $this->mLokasi              = New LokasiModel();
        $this->mDiagnosa            = New DiagnosaModel();
        $this->mPasien              = New PasienModel();
        $this->mObat                = New ObatModel();
        $this->mUnitPelayanan       = New UnitPelayananModel();
        $this->mPengajuanLabor      = New PengajuanLaborModel();
        $this->mPengajuanObat       = New PengajuanObatModel();
        $this->mPengajuanPenunjang  = New PengajuanPenunjangModel();
        $this->mLabor               = New DataLaborModel();
        $this->mPenunjang           = New PenunjangModel();
        $this->mPekerjaan           = New PekerjaanModel();
    }

    public function index()
    {
        $pasien             = $this->mPasien->where('idMPerawatan', 2)->get();
        $kamar              = KamarModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        // $diagnosa = $this->mDiagnosa->where('idMUnitPelayanan', 1)->get();
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Halaman Data Pasien Rawat Inap',
            'pasien'            => $pasien,
            'kamar'             => $kamar,
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
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
        $pasien       = $this->mPasien->where('id', $id)->first();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Pasien',
            'pasien'    => $pasien,
            'pilihanPekerjaan'  => $pilihanPekerjaan,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanDiagnosa    = $this->mPengajuanLabor->where('idMPasien', $id)->get();
        $pilihanObat        = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $pilihanPenunjang   = $this->mPengajuanPenunjang->where('idMPasien', $id)->get();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();
        $penyakitDahulu     = PenyakitDahuluModel::where('idMPasien', $id)->get();
        $riwayatAlergi      = RiwayatAlergiModel::where('idMPasien', $id)->get();
        $tindakan_medis     = TindakanMedisModel::where('status', 1)->get();
        $icdTen             = IcdTenModel::all();
        $pilihanAssesment   = PengajuanAssesmentModel::where('idMPasien', $id)->get();
        $pilihanTinMed      = PengajuanTindakanModel::where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $labor              = $this->mLabor->where('status', 1)->get();
        $obat               = $this->mObat->where('status', 1)->get();
        $penunjang          = $this->mPenunjang->where('status', 1)->get();
        $birthDate          = new \DateTime($tanggal_lahir);
        $today = new \DateTime("today");
        if ($birthDate > $today) {
            return "0 tahun 0 bulan 0 hari";
        }
        $y = $today->diff($birthDate)->y;
        $obat               = $this->mObat->get();
        $unitPelayanan      = UnitPelayananModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $ACustom            = AutofillModel::where('idMUsers', session()->get('users_id'),)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah CPPT Baru',
            'id'                => $id,
            'pasien'            => $pasien,
            'obat'              => $obat,
            'faskes'            => $faskes,
            'unitPelayanan'     => $unitPelayanan,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'usia'              => $y,
            'labor'             => $labor,
            'ACustom'           => $ACustom,
            'pilihanDiagnosa'   => $pilihanDiagnosa,
            'pilihanPekerjaan'  => $pilihanPekerjaan,
            'pilihanObat'       => $pilihanObat,
            'pilihanPenunjang'  => $pilihanPenunjang,
            'penunjang'         => $penunjang,
            'penyakitDahulu'    => $penyakitDahulu,
            'riwayatAlergi'     => $riwayatAlergi,
            'tindakan_medis'    => $tindakan_medis,
            'pilihanTinMed'     => $pilihanTinMed,
            'icdTen'            => $icdTen,
            'pilihanAssesment'  => $pilihanAssesment
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        if ($request->has('daftar_labor')) {
            $dataStatus = [
                'status'                => 2
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif ($request->has('nama_obat')) {
            $dataStatus = [
                'status'                => 5
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif ($request->has('nama_penunjang')) {
            $dataStatus = [
                'status'                => 8
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif ($request->idTinLan == 1) {
            $dataStatus = [
                'status'                => 6
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif ($request->idTinLan == 2) {
            $dataStatus = [
                'status'                => 3
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        }; 

        $dataDiagnosa = [
            'idMUsers'              => session()->get('users_id'),
            'idFaskes'              => $request->idFaskes,
            // 'idMObat'               => $request->idMObat,
            'idMUnitPelayanan'      => 1,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
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
            's1-2'                  => $request->s1_2,
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
            'idTinLan'              => $request->idTinLan
        ];
        
        $this->mPasien->where('id', $id)->update($dataDiagnosa);
        
        if ($request->has('riwayat_penyakit_dahulu') && $request->has('riwayat_alergi') && $request->has('daftar_labor') && $request->has('nama_obat') && $request->has('nama_penunjang') && $request->has('nama_tindakan') && $request->has('assesment')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            //riwayat penyakit dahulu
            for ($i = 0; $i < count($request->riwayat_penyakit_dahulu); $i++) {
                $dataPenyakitDahulu[] = [
                    'nama_riwayat'  => $request->riwayat_penyakit_dahulu[$i],
                    'idMPasien'     => $pasien->id,
                ];
            }
            // echo json_encode($dataPenyakitDahulu); die;
            DB::table('penyakit_dahulu')->insert($dataPenyakitDahulu);

            //riwayat alergi
            for ($i = 0; $i < count($request->riwayat_alergi); $i++) {
                $dataAlergi[] = [
                    'nama_riwayat'  => $request->riwayat_alergi[$i],
                    'idMPasien'     => $pasien->id,
                ];
            }
            // echo json_encode($dataAlergi); die;
            DB::table('riwayat_alergi')->insert($dataAlergi);

            //Daftar Labor
            for ($i = 0; $i < count($request->daftar_labor); $i++) {
                $dataPengLabor[] = [
                    'idLabor'       => $request->daftar_labor[$i],
                    'idMPasien'     => $pasien->id,
                    'idMPerawatan'  => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataPengLabor); die;
            DB::table('pengajuan_labor')->insert($dataPengLabor);

            //Nama Obat
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

            //Nama Penunjang
            for ($i = 0; $i < count($request->nama_penunjang); $i++) {
                $dataPengPenun[] = [
                    'idPenunjang'       => $request->nama_penunjang[$i],
                    'idMPasien'         => $pasien->id,
                    'idMPerawatan'      => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataPengPenun); die;
            DB::table('pengajuan_penunjang')->insert($dataPengPenun);

            //nama tindakan
            for ($i = 0; $i < count($request->nama_tindakan); $i++) {
                $dataTinMedis[] = [
                    'idTinMed'          => $request->nama_tindakan[$i],
                    'jumlah'            => $request->jumlah_tindakan[$i],
                    'keterangan'        => $request->keterangan_tindakan[$i],
                    'idMPasien'         => $pasien->id,
                    'idMPerawatan'      => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataTinMedis); die;
            DB::table('pengajuan_tindakan')->insert($dataTinMedis);
            
            //Assesment
            for ($i = 0; $i < count($request->assesment); $i++) {
                $dataIcdTen[] = [
                    'idIcdTen'          => $request->assesment[$i],
                    'idMPasien'         => $pasien->id,
                    'pilihan'           => $request->assesment1,
                ];
            }
            // echo json_encode($dataIcdTen); die;
            DB::table('pengajuan_assesment')->insert($dataIcdTen);
        } elseif ($request->has('nama_obat')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->nama_obat); $i++) {
                $dataPengObat[] = [
                    'idMObat'       => $request->nama_obat[$i],
                    'dosis'         => $request->dosis[$i],
                    'jumlah'        => $request->jumlah[$i],
                    'keterangan'    => $request->keterangan[$i],
                    'idMPasien'     => $pasien->id,
                    'idMPerawatan'  => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataPengObat); die;
            DB::table('pengajuan_obat')->insert($dataPengObat);
        } elseif ($request->has('nama_penunjang')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->nama_penunjang); $i++) {
                $dataPengPenun[] = [
                    'idPenunjang'       => $request->nama_penunjang[$i],
                    'idMPasien'         => $pasien->id,
                    'idMPerawatan'      => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataPengPenun); die;
            DB::table('pengajuan_penunjang')->insert($dataPengPenun);
        } elseif ($request->has('nama_tindakan')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->nama_tindakan); $i++) {
                $dataTinMedis[] = [
                    'idTinMed'          => $request->nama_tindakan[$i],
                    'jumlah'            => $request->jumlah_tindakan[$i],
                    'keterangan'        => $request->keterangan_tindakan[$i],
                    'idMPasien'         => $pasien->id,
                    'idMPerawatan'      => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataTinMedis); die;
            DB::table('pengajuan_tindakan')->insert($dataTinMedis);
        } elseif ($request->has('assesment')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->assesment); $i++) {
                for ($i = 0; $i < count($request->assesment); $i++) {
                    $dataIcdTen[] = [
                        'idIcdTen'          => $request->assesment[$i],
                        'idMPasien'         => $pasien->id,
                        'pilihan'           => $request->assesment1,
                    ];
                }
            }
            // echo json_encode($dataIcdTen); die;
            DB::table('pengajuan_assesment')->insert($dataIcdTen);
        }

        // echo json_encode($dataDiagnosa); die();
        return redirect("$this->url/" . $id . "/edit")->with('sukses', 'Data CPPT berhasil di dibuat');
    }

    public function tambah_cppt($id)
    {
        $pasien             = $this->mPasien->where('id', $id)->first();
        $pilihanDiagnosa    = $this->mPengajuanLabor->where('idMPasien', $id)->get();
        $pilihanObat        = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $pilihanPenunjang   = $this->mPengajuanPenunjang->where('idMPasien', $id)->get();
        $pilihanPekerjaan   = $this->mPekerjaan->where('idMPasien', $id)->get();
        $penyakitDahulu     = PenyakitDahuluModel::where('idMPasien', $id)->get();
        $riwayatAlergi      = RiwayatAlergiModel::where('idMPasien', $id)->get();
        $tindakan_medis     = TindakanMedisModel::where('status', 1)->get();
        $icdTen             = IcdTenModel::all();
        $pilihanAssesment   = PengajuanAssesmentModel::where('idMPasien', $id)->get();
        $pilihanTinMed      = PengajuanTindakanModel::where('idMPasien', $id)->get();
        $tanggal_lahir      = date('Y-m-d', strtotime($pasien->tanggal_lahir));
        $labor              = $this->mLabor->where('status', 1)->get();
        $obat               = $this->mObat->where('status', 1)->get();
        $penunjang          = $this->mPenunjang->where('status', 1)->get();
        $birthDate          = new \DateTime($tanggal_lahir);
        $today = new \DateTime("today");
        if ($birthDate > $today) {
            return "0 tahun 0 bulan 0 hari";
        }
        $y = $today->diff($birthDate)->y;
        $obat               = $this->mObat->get();
        $unitPelayanan      = UnitPelayananModel::all();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $ACustom            = AutofillModel::where('idMUsers', session()->get('users_id'),)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah CPPT Baru',
            'id'                => $id,
            'pasien'            => $pasien,
            'obat'              => $obat,
            'faskes'            => $faskes,
            'unitPelayanan'     => $unitPelayanan,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'usia'              => $y,
            'labor'             => $labor,
            'ACustom'           => $ACustom,
            'pilihanDiagnosa'   => $pilihanDiagnosa,
            'pilihanPekerjaan'  => $pilihanPekerjaan,
            'pilihanObat'       => $pilihanObat,
            'pilihanPenunjang'  => $pilihanPenunjang,
            'penunjang'         => $penunjang,
            'penyakitDahulu'    => $penyakitDahulu,
            'riwayatAlergi'     => $riwayatAlergi,
            'tindakan_medis'    => $tindakan_medis,
            'pilihanTinMed'     => $pilihanTinMed,
            'icdTen'            => $icdTen,
            'pilihanAssesment'  => $pilihanAssesment
        ];
        return view($this->views . "/create", $data);
    }

    public function proses_tambah(Request $request, $id)
    {   
        if ($request->has('daftar_labor')) {
            $dataStatus = [
                'status'                => 2
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif ($request->has('nama_obat')) {
            $dataStatus = [
                'status'                => 5
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif ($request->has('nama_penunjang')) {
            $dataStatus = [
                'status'                => 8
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif ($request->idTinLan == 1) {
            $dataStatus = [
                'status'                => 6
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        } elseif ($request->idTinLan == 2) {
            $dataStatus = [
                'status'                => 3
            ];
            // echo json_encode($dataStatus); die();
            $this->mPasien->where('id', $id)->update($dataStatus);
        }; 

        $dataDiagnosa = [
            'idMUsers'              => session()->get('users_id'),
            'idFaskes'              => $request->idFaskes,
            // 'idMObat'               => $request->idMObat,
            'idMUnitPelayanan'      => 1,
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
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
            's1-2'                  => $request->s1_2,
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
            'idTinLan'              => $request->idTinLan
        ];
        
        $this->mPasien->where('id', $id)->insert($dataDiagnosa);
        
        if ($request->has('riwayat_penyakit_dahulu') && $request->has('riwayat_alergi') && $request->has('daftar_labor') && $request->has('nama_obat') && $request->has('nama_penunjang') && $request->has('nama_tindakan') && $request->has('assesment')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            //riwayat penyakit dahulu
            for ($i = 0; $i < count($request->riwayat_penyakit_dahulu); $i++) {
                $dataPenyakitDahulu[] = [
                    'nama_riwayat'  => $request->riwayat_penyakit_dahulu[$i],
                    'idMPasien'     => $pasien->id,
                ];
            }
            // echo json_encode($dataPenyakitDahulu); die;
            DB::table('penyakit_dahulu')->insert($dataPenyakitDahulu);

            //riwayat alergi
            for ($i = 0; $i < count($request->riwayat_alergi); $i++) {
                $dataAlergi[] = [
                    'nama_riwayat'  => $request->riwayat_alergi[$i],
                    'idMPasien'     => $pasien->id,
                ];
            }
            // echo json_encode($dataAlergi); die;
            DB::table('riwayat_alergi')->insert($dataAlergi);

            //Daftar Labor
            for ($i = 0; $i < count($request->daftar_labor); $i++) {
                $dataPengLabor[] = [
                    'idLabor'       => $request->daftar_labor[$i],
                    'idMPasien'     => $pasien->id,
                    'idMPerawatan'  => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataPengLabor); die;
            DB::table('pengajuan_labor')->insert($dataPengLabor);

            //Nama Obat
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

            //Nama Penunjang
            for ($i = 0; $i < count($request->nama_penunjang); $i++) {
                $dataPengPenun[] = [
                    'idPenunjang'       => $request->nama_penunjang[$i],
                    'idMPasien'         => $pasien->id,
                    'idMPerawatan'      => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataPengPenun); die;
            DB::table('pengajuan_penunjang')->insert($dataPengPenun);

            //nama tindakan
            for ($i = 0; $i < count($request->nama_tindakan); $i++) {
                $dataTinMedis[] = [
                    'idTinMed'          => $request->nama_tindakan[$i],
                    'jumlah'            => $request->jumlah_tindakan[$i],
                    'keterangan'        => $request->keterangan_tindakan[$i],
                    'idMPasien'         => $pasien->id,
                    'idMPerawatan'      => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataTinMedis); die;
            DB::table('pengajuan_tindakan')->insert($dataTinMedis);
            
            //Assesment
            for ($i = 0; $i < count($request->assesment); $i++) {
                $dataIcdTen[] = [
                    'idIcdTen'          => $request->assesment[$i],
                    'idMPasien'         => $pasien->id,
                    'pilihan'           => $request->assesment1,
                ];
            }
            // echo json_encode($dataIcdTen); die;
            DB::table('pengajuan_assesment')->insert($dataIcdTen);
        } elseif ($request->has('nama_obat')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->nama_obat); $i++) {
                $dataPengObat[] = [
                    'idMObat'       => $request->nama_obat[$i],
                    'dosis'         => $request->dosis[$i],
                    'jumlah'        => $request->jumlah[$i],
                    'keterangan'    => $request->keterangan[$i],
                    'idMPasien'     => $pasien->id,
                    'idMPerawatan'  => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataPengObat); die;
            DB::table('pengajuan_obat')->insert($dataPengObat);
        } elseif ($request->has('nama_penunjang')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->nama_penunjang); $i++) {
                $dataPengPenun[] = [
                    'idPenunjang'       => $request->nama_penunjang[$i],
                    'idMPasien'         => $pasien->id,
                    'idMPerawatan'      => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataPengPenun); die;
            DB::table('pengajuan_penunjang')->insert($dataPengPenun);
        } elseif ($request->has('nama_tindakan')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->nama_tindakan); $i++) {
                $dataTinMedis[] = [
                    'idTinMed'          => $request->nama_tindakan[$i],
                    'jumlah'            => $request->jumlah_tindakan[$i],
                    'keterangan'        => $request->keterangan_tindakan[$i],
                    'idMPasien'         => $pasien->id,
                    'idMPerawatan'      => $pasien->idMPerawatan
                ];
            }
            // echo json_encode($dataTinMedis); die;
            DB::table('pengajuan_tindakan')->insert($dataTinMedis);
        } elseif ($request->has('assesment')) {
            $pasien             = $this->mPasien->where('id', $id)->first();
            for ($i = 0; $i < count($request->assesment); $i++) {
                for ($i = 0; $i < count($request->assesment); $i++) {
                    $dataIcdTen[] = [
                        'idIcdTen'          => $request->assesment[$i],
                        'idMPasien'         => $pasien->id,
                        'pilihan'           => $request->assesment1,
                    ];
                }
            }
            // echo json_encode($dataIcdTen); die;
            DB::table('pengajuan_assesment')->insert($dataIcdTen);
        }

        // echo json_encode($dataDiagnosa); die();
        return redirect("$this->url/" . $id . "/create")->with('sukses', 'Data CPPT berhasil di Tambahkan');
    }
}
