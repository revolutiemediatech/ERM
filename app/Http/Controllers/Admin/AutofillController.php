<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\AutofillModel;
use App\Models\AutofillSelect;

class AutofillController extends Controller
{
    private $views      = 'admin/autofill_custom';
    private $url        = 'admin/autofill-custom';
    private $title      = 'Halaman Data Auto Fill Custom';
    protected $mBed;
    protected $mKamar;
    protected $mAutofill;
    protected $mASelect;

    public function __construct()
    {
        // Di isi Construct
        $this->mAutofill = New AutofillModel();
        $this->mASelect        = New AutofillSelect();
    }

    public function index()
    {
        $autofill = $this->mAutofill->where('idMUsers', session()->get('users_id'))->get();
        $autofillfull           = $this->mAutofill->where('idMUsers', session()->get('users_id'))->pluck('urut');
        $count= count($autofillfull);
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Auto Fill Custom',
            'autofill'      => $autofill,
            'count'         => $count
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $autofill           = $this->mAutofill->where('idMUsers', session()->get('users_id'))->pluck('urut');
        $count= count($autofill);
        if(isset($autofill)){
            $select = $this->mASelect->whereNotIn('id', $autofill)->get();
        }else{
            $select = $this->mASelect->get();
        }

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Auto Fill Custom',
            'select'            => $select,
            'count'             => $count,
        ];
        // echo json_encode($count); die;
        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataAutofill = [
            'nama'                  => $request->nama,
            'urut'                  => $request->urut,
            'idMUsers'              => session()->get('users_id'),
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
            'status'                => $request->status,
        ];
        // echo json_encode($dataAutofill); die();
        $this->mAutofill->create($dataAutofill);

        return redirect("$this->url")->with('sukses', 'Data Auto Fill Custom berhasil di tambahkan');
    }

    public function show($id)
    {
        $autofill       = $this->mAutofill->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Auto Fill Custom',
            'autofill'       => $autofill,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $autofill       = $this->mAutofill->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Auto Fill Custom',
            'id'        => $id,
            'autofill'       => $autofill,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataAutofill = [
            'nama'                  => $request->nama,
            'idMUsers'              => session()->get('users_id'),
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
            'status'                => $request->status,
        ];
        $this->mAutofill->where('id', $id)->update($dataAutofill);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Auto Fill Custom berhasil di edit');
    }

    public function destroy($id)
    {
        $autofill       = $this->mAutofill->where('id', $id)->first();
        $this->mAutofill->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Auto Fill Custom' . $autofill->nama . ' berhasil di hapus');
    }
}
