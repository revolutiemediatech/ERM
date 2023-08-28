<?php

namespace App\Http\Controllers\Paramedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FaskesModel;
use App\Models\LokasiModel;
use App\Models\BillingModel;
use App\Models\JenisPasienModel;
use App\Models\AdministrasiModel;


class BillingController extends Controller
{
    private $views      = 'paramedis/billing';
    private $url        = 'paramedis/billing';
    private $title      = 'Halaman Data Billing';

    protected $mBilling;

    public function __construct()
    {
        // Di isi Construct
        $this->mBilling = New BillingModel();
    }

    public function index()
    {
        $billing = $this->mBilling->get();
        $administrasi = AdministrasiModel::all();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Billing',
            'billing'       => $billing,
            'administrasi'  => $administrasi
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $pembiayaan         = JenisPasienModel::all();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Billing',
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'pembiayaan'        => $pembiayaan, 
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataBilling = [
            'nama'                  => $request->nama,
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'idUsers'               => session()->get('users_id'),
            'idPembiayaan'          => $request->idPembiayaan,
            'harga'                 => $request->harga,
        ];
        $this->mBilling->create($dataBilling);

        return redirect("$this->url")->with('sukses', 'Data Billing berhasil di tambahkan');
    }

    public function show($id)
    {
        $billing       = $this->mBilling->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Billing',
            'billing'   => $billing,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $billing       = $this->mBilling->where('id', $id)->first();
        $faskes             = FaskesModel::all();
        $lokasiPemeriksaan  = LokasiModel::all();
        $pembiayaan       = JenisPasienModel::all();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Billing',
            'id'        => $id,
            'billing'   => $billing,
            'faskes'            => $faskes,
            'lokasiPemeriksaan' => $lokasiPemeriksaan,
            'pembiayaan'      => $pembiayaan
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataBilling = [
            'nama'                  => $request->nama,
            'idFaskes'              => session()->get('idFaskes'),
            'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            'idUsers'               => session()->get('users_id'),
            'idPembiayaan'          => $request->idPembiayaan,
            'harga'                 => $request->harga,
        ];
        $this->mBilling->where('id', $id)->update($dataBilling);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Billing berhasil di edit');
    }

    public function destroy($id)
    {
        $billing       = $this->mBilling->where('id', $id)->first();
        $this->mBilling->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Billing' . $billing->nama . ' berhasil di hapus');
    }
}
