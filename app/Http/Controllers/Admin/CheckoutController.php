<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\BillingModel;
use App\Models\PasienModel;
use App\Models\PengajuanObatModel;
use App\Models\PaymentModel;

class CheckoutController extends Controller
{
    private $views      = 'admin/checkout';
    private $url        = 'admin/checkout';
    private $title      = 'Halaman Data Payment';

    protected $mBilling;

    public function __construct()
    {
        // Di isi Construct
        $this->mBilling         = New BillingModel();
        $this->mPasien          = New PasienModel();
        $this->mPengajuanObat   = New PengajuanObatModel();
        $this->mPayment         = New PaymentModel();
    }

    public function index()
    {
        $pasien     = $this->mPasien->where('status', 6)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Payment ',
            'pasien'        => $pasien
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
        $pasien         = $this->mPasien->where('id', $id)->first();
        $pilihanObat    = $this->mPengajuanObat->where('idMPasien', $id)->get();
        $payment        = $this->mPayment->where('idMPasien', $id)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Invoice',
            'pasien'        => $pasien,
            'pilihanObat'   => $pilihanObat,
            'payment'       => $payment,
        ];
        return view($this->views . "/show", $data);
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
