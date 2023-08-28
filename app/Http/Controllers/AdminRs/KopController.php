<?php

namespace App\Http\Controllers\AdminRs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\KopModel;

class KopController extends Controller
{
    private $views      = 'adminRs/kop';
    private $url        = 'adminRs/kop';
    private $title      = 'Halaman Data Kop';
    protected $mKop;

    public function __construct()
    {
        // Di isi Construct
        $this->mKop = New KopModel();
    }

    public function index()
    {
        $kop = $this->mKop->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Kop',
            'kop'           => $kop
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $kop    = $this->mKop->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Kop',
            'kop'           => $kop,
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        if (!isset($request->photo)) { // ini kalo ga input gambar
            $dataKop = [
                'idFaskes'              => $request->idFaskes,
                'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            ];
            // echo json_encode($dataKop); die;
            $this->mKop->create($dataKop);
        } else { // ini kalo dia input foto
            // masuk sini hasil form create
            if ($request->hasFile('photo')) {
                $file       = $request->file('photo');
                $fileName   = Str::uuid()."-".time().".".$file->extension();
                $file->move( "upload/kop/", $fileName);
            }
            $dataKop = [
                'idFaskes'              => $request->idFaskes,
                'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
                'logo'                  => $fileName,
            ];
            // echo json_encode($dataKop); die;
            $this->mKop->create($dataKop);
        }

        return redirect("$this->url")->with('sukses', 'Kop berhasil di tambahkan');
    }

    public function show($id)
    {
        $kop       = $this->mKop->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Kop',    
            'kop'       => $kop,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $kop       = $this->mKop->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Kop',
            'id'        => $id,
            'kop'       => $kop,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        if (!isset($request->photo)) { // ini kalo ga input gambar
            $dataKop = [
                'idFaskes'              => $request->idFaskes,
                'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
            ];
            // echo json_encode($dataKop); die;
            $this->mKop->where('id', $request->id)->update($dataKop);
        } else { // ini kalo dia input foto
            // masuk sini hasil form create
            if ($request->hasFile('photo')) {
                $file       = $request->file('photo');
                $fileName   = Str::uuid()."-".time().".".$file->extension();
                $file->move( "upload/kop/", $fileName);
            }
            $dataKop = [
                'idFaskes'              => $request->idFaskes,
                'idLokasiPemeriksaan'   => $request->idLokasiPemeriksaan,
                'logo'                  => $fileName,
            ];
            // echo json_encode($dataKop); die;
            $this->mKop->where('id', $request->id)->update($dataKop);
        }

        return redirect("$this->url")->with('sukses', 'Data Kop berhasil di edit');
    }

    public function destroy($id)
    {
        $kop       = $this->mKop->where('id', $id)->first();
        $this->mKop->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Kop' . $kop->nama . ' berhasil di hapus');
    }
}
