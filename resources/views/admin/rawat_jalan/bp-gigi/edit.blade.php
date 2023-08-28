@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
    <style>
        .verikal_center{
         /*mengatur border bagian kiri tag div */
         border-left: 6px solid black;
         /* mengatur tinggi tag div*/
         height: 30px;
         /*mengatur lebar tag div*/
         width : 2px;
        }
    </style>
@endsection

@section('content')
    {{-- Tempat Ngoding isi web --}}
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel mb-3">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Detail Data Pasien</h5>
                    </div>
                    <div class="col-lg-6 fle d-flex justify-content-end">
                        <span class='btn btn-success'><b>{{ $pasien->jenisPasien->nama }}</b></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input name="nama" id="nama" class="form-control form-control" type="text" value="{{ $pasien->nama }}" disabled>
                            </div>
                            <div class="col-sm-1">
                                    @if ($pasien->idMJenisKel == 1)
                                        <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control" type="text" value="P" disabled>
                                    @elseif ($pasien->idMJenisKel == 2)
                                    <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control" type="text" value="L" disabled>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">No Rekam Medis</label>
                            <div class="col-sm-9">
                                <input name="no_index" id="no_index" class="form-control form-control" type="text" value="{{ $pasien->no_index }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input name="nik" id="nik" class="form-control form-control" type="text" value="{{ $pasien->nik }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Tanggal Lahir / Usia</label>
                            <div class="col-sm-9">
                                <input name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control" type="text" value="{{ $pasien->tanggal_lahir }} / {{ $usia}} Tahun" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input name="alamat" id="alamat" class="form-control form-control" type="text" value="{{ $pasien->alamat }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">No Hp</label>
                            <div class="col-sm-9">
                                <input name="no_hp" id="no_hp" class="form-control form-control" type="text" value="{{ $pasien->no_hp }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Nama KK</label>
                            <div class="col-sm-9">
                                <input name="nama_kk" id="nama_kk" class="form-control form-control" type="text" value="{{ $pasien->nama_kk }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Golongan Darah</label>
                            <div class="col-sm-9">
                                <input name="goldar" id="goldar" class="form-control form-control" type="text" value="{{ $pasien->goldar->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input name="pekerjaan" id="pekerjaan" class="form-control form-control" type="text" value="{{ $pasien->pekerjaan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Pendidikan</label>
                            <div class="col-sm-9">
                                <input name="pendidikan" id="pendidikan" class="form-control form-control" type="text" value="{{ $pasien->pendidikan->nama }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-row">
                            <div class="col-md-6 mb-5">
                                <a href="{{ url('#') }}" type="button" class="btn btn-lg btn-primary">History Kunjungan</a>
                            </div>
                        </div><div class="form-row">
                            <div class="col-md-6 mb-5">
                                <a href="{{ url('#') }}" type="button" class="btn btn-lg btn-primary">Gallery Pasien</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-5">
                                <a href="{{ url('#') }}" type="button" class="btn btn-lg btn-primary">Grafik Kesehatan</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-5">
                                <a href="{{ url('#') }}" type="button" class="btn btn-lg btn-primary">Print Perstujuan/Penolakan</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-5">
                                <a href="{{ url('#') }}" type="button" class="btn btn-lg btn-primary">Draft Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">{{ $page }}</h5>
                    </div>
                    <div class="col-lg-6 fle d-flex justify-content-end">
                        <a href="{{ url('admin/rawat-jalan/bp-gigi') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            {{-- otomatis masuk ke admin/bp-gigi , karena pake resource --}}
            <form action="{{ url("admin/rawat-jalan/bp-gigi")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="idMPasien" value="{{ $pasien->id }}">
                        <div class="mb-3">
                            <div class="col-form-label">Mitra</div>
                            <select id="select-mitra" class="form-control Select2" name="idFaskes" aria-label="Default select example">
                            <option value="{{$pasien->idFaskes}}">{{$pasien->faskes->nama}}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Cabang Mitra</div>
                            <select id="select-lokasi" class="form-control Select2" name="idLokasiPemeriksaan" aria-label="Default select example">
                            <option value="{{$pasien->idLokasiPemeriksaan}}">{{$pasien->lokasiPemeriksaan->nama}}</option>
                            </select>
                        </div>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama Obat</label>
                            <select id="select-role" class="form-control" name="idMObat" required>
                                <option value="">Pilih Obat</option>
                                @foreach ($obat as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Subjective</label>
                            {{-- <input name="penyakit" id="penyakit" class="form-control" type="text" > --}}
                            <textarea class="form-control" name="subjective" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Objective</label>
                            <ul class="ms-list d-flex">
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input id="normal" type="checkbox" style="height: 20px; width: 20px;">
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> <b>Auto Fill Normal</b> </span>
                                </li>
                                @foreach ($ACustom as $item)
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input id="Acustom{{ $item->urut }}" type="checkbox" value="{{ $item->urut }}" style="height: 20px; width: 20px;">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> <b>{{ $item->nama }}</b> </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Objective</label>
                            <div class="form-group row ml-2">
                                <label for="colFormLabel"><b>Vital Sign</b></label>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">GCS</label>
                                <label for="colFormLabel" class="ml-3 mt-1">E</label>
                                <div class="col-sm-1">
                                    <input name="eye" id="eye" class="form-control form-control-sm" type="text"> 
                                </div>
                                <label for="colFormLabel" class="ml-3 mt-1">V</label>
                                <div class="col-sm-1">
                                    <input name="verbal" id="verbal" class="form-control form-control-sm" type="text">
                                </div>
                                <label for="colFormLabel" class="ml-3 mt-1">M</label>
                                <div class="col-sm-1">
                                    <input name="motorik" id="motorik" class="form-control form-control-sm" type="text">
                                </div>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Keadaan Umum</label>
                                <div class="col-sm-3">
                                    <input name="keadaan_umum" id="keadaan_umum" class="form-control form-control-sm" type="text"> 
                                </div>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Tekanan Darah</label>
                                <div class="col-sm-1">
                                    <input name="td1" id="td1" class="form-control form-control-sm" type="text"> 
                                </div>
                                <label for="colFormLabel" class="mt-1">/</label>
                                <div class="col-sm-1">
                                    <input name="td2" id="td2" class="form-control form-control-sm" type="text">
                                </div>
                                <label for="colFormLabel">mmHg</label>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Denyut Nadi</label>
                                <div class="col-sm-1">
                                    <input name="hr" id="hr" class="form-control form-control-sm" type="text"> 
                                </div>
                                <label for="colFormLabel">x/Menit</label>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Laju Pernafasan</label>
                                <div class="col-sm-1">
                                    <input name="rr" id="rr" class="form-control form-control-sm" type="text"> 
                                </div>
                                <label for="colFormLabel">x/Menit</label>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Suhu</label>
                                <div class="col-sm-1">
                                    <input name="suhu" id="suhu" class="form-control form-control-sm" type="text"> 
                                </div>
                                <label for="colFormLabel">&degC</label>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">SpO2</label>
                                <div class="col-sm-1">
                                    <input name="spo2" id="spo2" class="form-control form-control-sm" type="text"> 
                                </div>
                                <label for="colFormLabel">%</label>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">BB</label>
                                <div class="col-sm-1">
                                    <input name="bb" id="bb" class="form-control form-control-sm" type="text"> 
                                </div>
                                <label for="colFormLabel">Kg</label>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">TB</label>
                                <div class="col-sm-1">
                                    <input name="tb" id="tb" class="form-control form-control-sm" type="text"> 
                                </div>
                                <label for="colFormLabel">cm</label>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="form-group row ml-2">
                                            <label for="colFormLabel"><b>Pemeriksaan Fisik Umum</b></label>
                                        </div>
                                        <div class="form-group row ml-3">
                                            <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Kapala</label>
                                            <label for="colFormLabel" class="ml-3 mt-1">CA</label>
                                            <div class="col-sm-1">
                                                <input name="ca1" id="ca1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <label for="colFormLabel" class="mt-1">/</label>
                                            <div class="col-sm-1">
                                                <input name="ca2" id="ca2" class="form-control form-control-sm" type="text">
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">SI</label>
                                            <div class="col-sm-1">
                                                <input name="si1" id="si1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <label for="colFormLabel" class="mt-1">/</label>
                                            <div class="col-sm-1">
                                                <input name="si2" id="si2" class="form-control form-control-sm" type="text">
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">RC</label>
                                            <div class="col-sm-1">
                                                <input name="rc1" id="rc1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <label for="colFormLabel" class="mt-1">/</label>
                                            <div class="col-sm-1">
                                                <input name="rc2" id="rc2" class="form-control form-control-sm" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-3">
                                            <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Cor</label>
                                            <label for="colFormLabel" class="ml-3 mt-1">S1-2</label>
                                            <div class="col-sm-2">
                                                <input name="s1_2" id="s1_2" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">Murmur</label>
                                            <div class="col-sm-1">
                                                <input name="murmur1" id="murmur1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="col-sm-2">
                                                <input name="murmur2" id="murmur2" class="form-control form-control-sm" type="text">
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">Gallop</label>
                                            <div class="col-sm-1">
                                                <input name="gallop1" id="gallop1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="col-sm-2">
                                                <input name="gallop2" id="gallop2" class="form-control form-control-sm" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-3">
                                            <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Pulmonal</label>
                                            <label for="colFormLabel" class="ml-3 mt-1">SDV</label>
                                            <div class="col-sm-1">
                                                <input name="sdv1" id="sdv1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <label for="colFormLabel" class="mt-1">/</label>
                                            <div class="col-sm-1">
                                                <input name="sdv2" id="sdv2" class="form-control form-control-sm" type="text">
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">RH</label>
                                            <div class="col-sm-1">
                                                <input name="rh1" id="rh1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <label for="colFormLabel" class="mt-1">/</label>
                                            <div class="col-sm-1">
                                                <input name="rh2" id="rh2" class="form-control form-control-sm" type="text">
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">WH</label>
                                            <div class="col-sm-1">
                                                <input name="wh1" id="wh1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <label for="colFormLabel" class="mt-1">/</label>
                                            <div class="col-sm-1">
                                                <input name="wh2" id="wh2" class="form-control form-control-sm" type="text">
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">Retraksi</label>
                                            <div class="col-sm-1">
                                                <input name="retraksi1" id="retraksi1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="col-sm-1">
                                                <input name="retraksi2" id="retraksi2" class="form-control form-control-sm" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-3">
                                            <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Abdomen</label>
                                            <label for="colFormLabel" class="ml-3 mt-1">Kontur</label>
                                            <div class="col-sm-1">
                                                <input name="kontur" id="kontur" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">Defans</label>
                                            <div class="col-sm-1">
                                                <input name="defans" id="defans" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">BU</label>
                                            <div class="col-sm-1">
                                                <input name="bu1" id="bu1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="col-sm-2">
                                                <input name="bu2" id="bu2" class="form-control form-control-sm" type="text">
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">NT</label>
                                            <div class="col-sm-1">
                                                <input name="nt1" id="nt1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="col-sm-2">
                                                <input name="nt2" id="nt2" class="form-control form-control-sm" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-3">
                                            <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Ekstremitas</label>
                                            <label for="colFormLabel" class="ml-3 mt-1">Crt</label>
                                            <div class="col-sm-1">
                                                <input name="crt" id="crt" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <label for="colFormLabel" class="mt-1">Detik</label>
                                            <div class="verikal_center ml-2"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">Akral</label>
                                            <div class="col-sm-1">
                                                <input name="akral" id="akral" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <div class="verikal_center"></div>
                                            <label for="colFormLabel" class="ml-3 mt-1">Edema</label>
                                            <div class="col-sm-1">
                                                <input name="edema1" id="edema1" class="form-control form-control-sm" type="text"> 
                                            </div>
                                            <label for="colFormLabel" class="mt-1">/</label>
                                            <div class="col-sm-1">
                                                <input name="edema2" id="edema2" class="form-control form-control-sm" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-3">
                                            <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Status Lokalis</label>
                                            <div class="col-sm-11">
                                                <textarea class="form-control" name="status_lokalis" id="exampleTextarea1" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group row ml-2">
                                        <label for="colFormLabel"><b>Pemeriksaan Fisik Khusus</b></label>
                                    </div>
                                    <div class="form-group row ml-3">
                                        <div class="col-sm-11">
                                            <textarea class="form-control" name="fisik_khusus" id="exampleTextarea1" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-4">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item">
                                            <a href="{{ url('#') }}" type="button" class="btn btn-sm btn-primary">Saraf</a>
                                        </li>
                                        <li class="ms-list-item">
                                            <a href="{{ url('#') }}" type="button" class="btn btn-sm btn-primary">Mata</a>
                                        </li>
                                        <li class="ms-list-item">
                                            <a href="{{ url('#') }}" type="button" class="btn btn-sm btn-primary">Bedah</a>
                                        </li>
                                        <li class="ms-list-item">
                                            <a href="{{ url('#') }}" type="button" class="btn btn-sm btn-primary">Obgyn</a>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item">
                                            <a href="{{ url('#') }}" type="button" class="btn btn-sm btn-primary">Kulit</a>
                                        </li>
                                        <li class="ms-list-item">
                                            <a href="{{ url('#') }}" type="button" class="btn btn-sm btn-primary">THT</a>
                                        </li>
                                        <li class="ms-list-item">
                                            <a href="{{ url('#') }}" type="button" class="btn btn-sm btn-primary">Contoh Auto Fill</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Plan</label>
                            {{-- <input name="penyakit" id="penyakit" class="form-control" type="text" > --}}
                            <textarea class="form-control" name="assesment" id="exampleTextarea1" rows="4" placeholder="Intruksi Dokter"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Tindakan Lanjutan</div>
                            <ul class="ms-list d-flex">
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input type="radio" name="idTinLanjutan" value="1" required>
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> Tidak Ada </span>
                                </li>
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input type="radio" name="idTinLanjutan" value="2" required>
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> Rawat Inap </span>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Pemeriksaan Penunjang</div>
                            <ul class="ms-list d-flex">
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input type="radio" name="idPemPenunjang" value="1" required>
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> Tidak Ada </span>
                                </li>
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input type="radio" name="idPemPenunjang" value="2" required>
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> Labor </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" class="btn btn-secondary" value="Cancel">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
    <script>
        $(document).ready(function() {
            $('#normal').change(function() {
                if ($(this).is(':checked')) {
                    $("#eye").val("4");
                    $("#verbal").val("5");
                    $("#motorik").val("6");
                    $("#keadaan_umum").val("Baik");
                    $("#rr").val("20");
                    $("#suhu").val("36.7");
                    $("#spo2").val("99");
                    $("#ca1").val("-");
                    $("#ca2").val("-");
                    $("#si1").val("-");
                    $("#si2").val("-");
                    $("#rc1").val("+");
                    $("#rc2").val("+");
                    $("#s1_2").val("Reguler");
                    $("#murmur1").val("-");
                    $("#murmur2").val("-");
                    $("#gallop1").val("-");
                    $("#gallop2").val("-");
                    $("#sdv1").val("+");
                    $("#sdv2").val("+");
                    $("#rh1").val("-");
                    $("#rh2").val("-");
                    $("#wh1").val("-");
                    $("#wh2").val("-");
                    $("#retraksi1").val("-");
                    $("#retraksi2").val("-");
                    $("#kontur").val("Datar");
                    $("#defans").val("-");
                    $("#bu1").val("+");
                    $("#bu2").val("Normal");
                    $("#nt1").val("-");
                    $("#nt2").val("-");
                    $("#crt").val("2");
                    $("#akral").val("Hangat");
                    $("#edema1").val("-");
                    $("#edema2").val("-");
                }else{
                    $("#eye").val("");
                    $("#verbal").val("");
                    $("#motorik").val("");
                    $("#keadaan_umum").val("");
                    $("#rr").val("");
                    $("#suhu").val("");
                    $("#spo2").val("");
                    $("#ca1").val("");
                    $("#ca2").val("");
                    $("#si1").val("");
                    $("#si2").val("");
                    $("#rc1").val("");
                    $("#rc2").val("");
                    $("#s1_2").val("");
                    $("#murmur1").val("");
                    $("#murmur2").val("");
                    $("#gallop1").val("");
                    $("#gallop2").val("");
                    $("#sdv1").val("");
                    $("#sdv2").val("");
                    $("#rh1").val("");
                    $("#rh2").val("");
                    $("#wh1").val("");
                    $("#wh2").val("");
                    $("#retraksi1").val("");
                    $("#retraksi2").val("");
                    $("#kontur").val("");
                    $("#defans").val("");
                    $("#bu1").val("");
                    $("#bu2").val("");
                    $("#nt1").val("");
                    $("#nt2").val("");
                    $("#crt").val("");
                    $("#akral").val("");
                    $("#edema1").val("");
                    $("#edema2").val("");
                }
            });
        });
        $(function() {
            let baseUrl     = '{{ url('') }}';
            $('#Acustom1').click(function() {
                var custom = this.value;
                $.getJSON(baseUrl+'/api/getCustom/'+custom, (result) => {
                    if ($(this).is(':checked')) {
                        $("#eye").val(result.data.eye);
                        $("#verbal").val(result.data.verbal);
                        $("#motorik").val(result.data.motorik);
                        $("#keadaan_umum").val(result.data.keadaan_umum);
                        $("#rr").val(result.data.rr);
                        $("#suhu").val(result.data.suhu);
                        $("#spo2").val(result.data.spo2);
                        $("#ca1").val(result.data.ca1);
                        $("#ca2").val(result.data.ca2);
                        $("#si1").val(result.data.si1);
                        $("#si2").val(result.data.si2);
                        $("#rc1").val(result.data.rc1);
                        $("#rc2").val(result.data.rc2);
                        $("#s1_2").val(result.data.s1_2);
                        $("#murmur1").val(result.data.murmur1);
                        $("#murmur2").val(result.data.murmur2);
                        $("#gallop1").val(result.data.gallop1);
                        $("#gallop2").val(result.data.gallop2);
                        $("#sdv1").val(result.data.sdv1);
                        $("#sdv2").val(result.data.sdv2);
                        $("#rh1").val(result.data.rh1);
                        $("#rh2").val(result.data.rh2);
                        $("#wh1").val(result.data.wh1);
                        $("#wh2").val(result.data.wh2);
                        $("#retraksi1").val(result.data.retraksi1);
                        $("#retraksi2").val(result.data.retraksi2);
                        $("#kontur").val(result.data.kontur);
                        $("#defans").val(result.data.defans);
                        $("#bu1").val(result.data.bu1);
                        $("#bu2").val(result.data.bu2);
                        $("#nt1").val(result.data.nt1);
                        $("#nt2").val(result.data.nt2);
                        $("#crt").val(result.data.crt);
                        $("#akral").val(result.data.akral);
                        $("#edema1").val(result.data.edema1);
                        $("#edema2").val(result.data.edema2);
                    }else{
                        $("#eye").val("");
                        $("#verbal").val("");
                        $("#motorik").val("");
                        $("#keadaan_umum").val("");
                        $("#rr").val("");
                        $("#suhu").val("");
                        $("#spo2").val("");
                        $("#ca1").val("");
                        $("#ca2").val("");
                        $("#si1").val("");
                        $("#si2").val("");
                        $("#rc1").val("");
                        $("#rc2").val("");
                        $("#s1_2").val("");
                        $("#murmur1").val("");
                        $("#murmur2").val("");
                        $("#gallop1").val("");
                        $("#gallop2").val("");
                        $("#sdv1").val("");
                        $("#sdv2").val("");
                        $("#rh1").val("");
                        $("#rh2").val("");
                        $("#wh1").val("");
                        $("#wh2").val("");
                        $("#retraksi1").val("");
                        $("#retraksi2").val("");
                        $("#kontur").val("");
                        $("#defans").val("");
                        $("#bu1").val("");
                        $("#bu2").val("");
                        $("#nt1").val("");
                        $("#nt2").val("");
                        $("#crt").val("");
                        $("#akral").val("");
                        $("#edema1").val("");
                        $("#edema2").val("");
                    }
                });
            });
        });
        $(function() {
            let baseUrl     = '{{ url('') }}';
            $('#Acustom2').click(function() {
                var custom = this.value;
                $.getJSON(baseUrl+'/api/getCustom/'+custom, (result) => {
                    if ($(this).is(':checked')) {
                        $("#eye").val(result.data.eye);
                        $("#verbal").val(result.data.verbal);
                        $("#motorik").val(result.data.motorik);
                        $("#keadaan_umum").val(result.data.keadaan_umum);
                        $("#rr").val(result.data.rr);
                        $("#suhu").val(result.data.suhu);
                        $("#spo2").val(result.data.spo2);
                        $("#ca1").val(result.data.ca1);
                        $("#ca2").val(result.data.ca2);
                        $("#si1").val(result.data.si1);
                        $("#si2").val(result.data.si2);
                        $("#rc1").val(result.data.rc1);
                        $("#rc2").val(result.data.rc2);
                        $("#s1_2").val(result.data.s1_2);
                        $("#murmur1").val(result.data.murmur1);
                        $("#murmur2").val(result.data.murmur2);
                        $("#gallop1").val(result.data.gallop1);
                        $("#gallop2").val(result.data.gallop2);
                        $("#sdv1").val(result.data.sdv1);
                        $("#sdv2").val(result.data.sdv2);
                        $("#rh1").val(result.data.rh1);
                        $("#rh2").val(result.data.rh2);
                        $("#wh1").val(result.data.wh1);
                        $("#wh2").val(result.data.wh2);
                        $("#retraksi1").val(result.data.retraksi1);
                        $("#retraksi2").val(result.data.retraksi2);
                        $("#kontur").val(result.data.kontur);
                        $("#defans").val(result.data.defans);
                        $("#bu1").val(result.data.bu1);
                        $("#bu2").val(result.data.bu2);
                        $("#nt1").val(result.data.nt1);
                        $("#nt2").val(result.data.nt2);
                        $("#crt").val(result.data.crt);
                        $("#akral").val(result.data.akral);
                        $("#edema1").val(result.data.edema1);
                        $("#edema2").val(result.data.edema2);
                    }else{
                        $("#eye").val("");
                        $("#verbal").val("");
                        $("#motorik").val("");
                        $("#keadaan_umum").val("");
                        $("#rr").val("");
                        $("#suhu").val("");
                        $("#spo2").val("");
                        $("#ca1").val("");
                        $("#ca2").val("");
                        $("#si1").val("");
                        $("#si2").val("");
                        $("#rc1").val("");
                        $("#rc2").val("");
                        $("#s1_2").val("");
                        $("#murmur1").val("");
                        $("#murmur2").val("");
                        $("#gallop1").val("");
                        $("#gallop2").val("");
                        $("#sdv1").val("");
                        $("#sdv2").val("");
                        $("#rh1").val("");
                        $("#rh2").val("");
                        $("#wh1").val("");
                        $("#wh2").val("");
                        $("#retraksi1").val("");
                        $("#retraksi2").val("");
                        $("#kontur").val("");
                        $("#defans").val("");
                        $("#bu1").val("");
                        $("#bu2").val("");
                        $("#nt1").val("");
                        $("#nt2").val("");
                        $("#crt").val("");
                        $("#akral").val("");
                        $("#edema1").val("");
                        $("#edema2").val("");
                    }
                });
            });
        });
        $(function() {
            let baseUrl     = '{{ url('') }}';
            $('#Acustom3').click(function() {
                var custom = this.value;
                $.getJSON(baseUrl+'/api/getCustom/'+custom, (result) => {
                    if ($(this).is(':checked')) {
                        $("#eye").val(result.data.eye);
                        $("#verbal").val(result.data.verbal);
                        $("#motorik").val(result.data.motorik);
                        $("#keadaan_umum").val(result.data.keadaan_umum);
                        $("#rr").val(result.data.rr);
                        $("#suhu").val(result.data.suhu);
                        $("#spo2").val(result.data.spo2);
                        $("#ca1").val(result.data.ca1);
                        $("#ca2").val(result.data.ca2);
                        $("#si1").val(result.data.si1);
                        $("#si2").val(result.data.si2);
                        $("#rc1").val(result.data.rc1);
                        $("#rc2").val(result.data.rc2);
                        $("#s1_2").val(result.data.s1_2);
                        $("#murmur1").val(result.data.murmur1);
                        $("#murmur2").val(result.data.murmur2);
                        $("#gallop1").val(result.data.gallop1);
                        $("#gallop2").val(result.data.gallop2);
                        $("#sdv1").val(result.data.sdv1);
                        $("#sdv2").val(result.data.sdv2);
                        $("#rh1").val(result.data.rh1);
                        $("#rh2").val(result.data.rh2);
                        $("#wh1").val(result.data.wh1);
                        $("#wh2").val(result.data.wh2);
                        $("#retraksi1").val(result.data.retraksi1);
                        $("#retraksi2").val(result.data.retraksi2);
                        $("#kontur").val(result.data.kontur);
                        $("#defans").val(result.data.defans);
                        $("#bu1").val(result.data.bu1);
                        $("#bu2").val(result.data.bu2);
                        $("#nt1").val(result.data.nt1);
                        $("#nt2").val(result.data.nt2);
                        $("#crt").val(result.data.crt);
                        $("#akral").val(result.data.akral);
                        $("#edema1").val(result.data.edema1);
                        $("#edema2").val(result.data.edema2);
                    }else{
                        $("#eye").val("");
                        $("#verbal").val("");
                        $("#motorik").val("");
                        $("#keadaan_umum").val("");
                        $("#rr").val("");
                        $("#suhu").val("");
                        $("#spo2").val("");
                        $("#ca1").val("");
                        $("#ca2").val("");
                        $("#si1").val("");
                        $("#si2").val("");
                        $("#rc1").val("");
                        $("#rc2").val("");
                        $("#s1_2").val("");
                        $("#murmur1").val("");
                        $("#murmur2").val("");
                        $("#gallop1").val("");
                        $("#gallop2").val("");
                        $("#sdv1").val("");
                        $("#sdv2").val("");
                        $("#rh1").val("");
                        $("#rh2").val("");
                        $("#wh1").val("");
                        $("#wh2").val("");
                        $("#retraksi1").val("");
                        $("#retraksi2").val("");
                        $("#kontur").val("");
                        $("#defans").val("");
                        $("#bu1").val("");
                        $("#bu2").val("");
                        $("#nt1").val("");
                        $("#nt2").val("");
                        $("#crt").val("");
                        $("#akral").val("");
                        $("#edema1").val("");
                        $("#edema2").val("");
                    }
                });
            });
        });
    </script>
@endsection