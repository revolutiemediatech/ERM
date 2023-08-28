@extends($adminRs)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/select2.css') }}">
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
                    <div class="col-lg-6 flex d-flex justify-content-end">
                        <span class='btn btn-success'><b>{{ $pasien->jenisPasien->nama }}</b></span>
                        <a href="{{ url('adminRs/rawat-jalan/bp-umum') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 flex d-flex justify-content-center">
                        <a href="{{ url('adminRs/rawat-jalan/history/'. $pasien->id) }}" type="button" class="btn btn-primary">History Kunjungan</a>
                        <a href="{{ url('adminRs/gallery/'. $pasien->id) }}" type="button" class="btn btn-lg btn-primary">Gallery Pasien</a>
                        <a href="{{ url('#') }}" type="button" class="btn btn-lg btn-primary">Grafik Kesehatan</a>
                        <a href="{{ url('adminRs/rawat-jalan/perpen/'. $pasien->id) }}" type="button" class="btn btn-lg btn-primary">Print Perstujuan/Penolakan</a>
                        <a href="{{ url('#') }}" type="button" class="btn btn-lg btn-primary">Draft Resume</a>
                    </div>
                    <div class="col-lg-12 mt-3">
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
                            <div class="col-sm-3">
                                <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->goldar->nama }}" disabled> 
                            </div>
                            <div class="col-sm-2">
                                <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-sm" type="text" value="{{ $pasien->rhesus->nama ?? '' }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <select id="select-pekerjaan" class="form-control" name="pekerjaan1[]" multiple="multiple" disabled>
                                    @foreach ($pilihanPekerjaan as $pk)
                                        <option value="{{ $pk->id }}" selected>{{ $pk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Pendidikan</label>
                            <div class="col-sm-9">
                                <input name="pendidikan" id="pendidikan" class="form-control form-control" type="text" value="{{ $pasien->pendidikan->nama }}" disabled>
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
                </div>
            </div>
            {{-- otomatis masuk ke adminRs/bp-umum , karena pake resource --}}
            <form action="{{ url("adminRs/rawat-inap/pasien/")}}/{{ $id }}/proses_tambah" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group"> 
                        <input type="hidden" id="i-nama" class="form-control" name="idMPasien" value="{{ $pasien->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Subjective</label>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Keluhan Utama</label>
                                <div class="col-sm-10">
                                    <input name="keluhan_utama" id="keluhan_utama" class="form-control form-control-sm" type="text"> 
                                </div>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Riwayat Penyakit Sekarang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="riwayat_penyakit_sekarang" name="riwayat_penyakit_sekarang" id="exampleTextarea1" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Riwayat Penyakit Dahulu</label>
                                <div class="col-sm-10">
                                    <select id="select-penyakitDahulu" class="form-control form-control-sm" name="riwayat_penyakit_dahulu[]" multiple="multiple" disabled>
                                        @foreach ($penyakitDahulu as $penDa)
                                            <option value="{{ $penDa->nama }}" selected>{{ $penDa->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Riwayat Penggunaan Obat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="riwayat_penggunaan_obat" name="riwayat_penggunaan_obat" id="exampleTextarea1" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Riwayat Alergi</label>
                                <div class="col-sm-10">
                                    <select id="select-riwayatAlergi" class="form-control form-control-sm" name="riwayat_alergi[]" multiple="multiple" disabled>
                                        @foreach ($riwayatAlergi as $riwAl)
                                            <option value="{{ $riwAl->nama }}" selected>{{ $riwAl->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                <div class="col-lg-12">
                                    <div class="form-group row ml-2">
                                        <label for="colFormLabel"><b>Pemeriksaan Fisik Khusus</b></label>
                                        <ul class="ms-list d-flex">
                                            <li class="ms-list-item pl-0">
                                                <br>
                                                <label class="ms-checkbox-wrap">
                                                <input id="saraf" type="checkbox" style="height: 20px; width: 20px;">
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> <b>Saraf</b> </span>
                                            </li>
                                            <li class="ms-list-item pl-0">
                                                <br>
                                                <label class="ms-checkbox-wrap">
                                                <input id="saraf" type="checkbox" style="height: 20px; width: 20px;">
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> <b>Mata</b> </span>
                                            </li>
                                            <li class="ms-list-item pl-0">
                                                <br>
                                                <label class="ms-checkbox-wrap">
                                                <input id="saraf" type="checkbox" style="height: 20px; width: 20px;">
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> <b>Bedah</b> </span>
                                            </li>
                                            <li class="ms-list-item pl-0">
                                                <br>
                                                <label class="ms-checkbox-wrap">
                                                <input id="saraf" type="checkbox" style="height: 20px; width: 20px;">
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> <b>Obgyn</b> </span>
                                            </li>
                                            <li class="ms-list-item pl-0">
                                                <br>
                                                <label class="ms-checkbox-wrap">
                                                <input id="saraf" type="checkbox" style="height: 20px; width: 20px;">
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> <b>Kulit</b> </span>
                                            </li>
                                            <li class="ms-list-item pl-0">
                                                <br>
                                                <label class="ms-checkbox-wrap">
                                                <input id="saraf" type="checkbox" style="height: 20px; width: 20px;">
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> <b>THT</b> </span>
                                            </li>
                                            <li class="ms-list-item pl-0">
                                                <br>
                                                <label class="ms-checkbox-wrap">
                                                <input id="saraf" type="checkbox" style="height: 20px; width: 20px;">
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> <b>Contoh AutoFill</b> </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group row ml-3">
                                        <div class="col-sm-11">
                                            <textarea class="form-control" id="khusus" name="fisik_khusus" id="exampleTextarea1" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label pt-0" for="penyakit"><b>Pemeriksaan Penunjang</b></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5">
                                <select id="select-namaPenunjang" class="form-control form-control-sm" name="nama_penunjang[]" multiple="multiple">
                                    <option value="">Pilih Penunjang</option>
                                    @foreach ($penunjang as $pnj)
                                        <option value="{{ $pnj->id }}">{{ $pnj->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Tambah">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ms-panel-body mb-3">
                            <div class="table-responsive">
                               <table class="table table-bordered thead-primary">
                                  <thead>
                                     <tr>
                                        <th width="50">No</th>
                                        <th>Nama Pemeriksaan</th>
                                        <th>Hasil</th>
                                        <th>Harga</th>
                                        <th>Tercover Asuransi</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($pilihanPenunjang as $pnj)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pnj->penunjang->nama }}</td>
                                            <td>{{ $pnj->hasil_penunjang ?? 'belum diinput hasil' }}</td>
                                            <td>Rp {{ $pnj->penunjang->harga }}</td>
                                            <td>{{ $pnj->penunjang->pembiayaan }}</td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                               </table>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label pt-0" for="penyakit"><b>Laboratorium</b></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5">
                                <select id="select-labor" class="form-control form-control-sm" name="daftar_labor[]" multiple="multiple">
                                    <option value="">Pilih Layanan Labor</option>
                                    @foreach ($labor as $lb)
                                        <option value="{{ $lb->id }}">{{ $lb->nama}} (Stok = {{ $lb->stok_akhir}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Tambah">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ms-panel-body mb-3">
                            <div class="table-responsive">
                               <table class="table table-bordered thead-primary">
                                  <thead>
                                     <tr>
                                        <th width="50">No</th>
                                        <th>Nama Pemeriksaan</th>
                                        <th>Hasil</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Tercover Asuransi</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($pilihanDiagnosa as $pj)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pj->labor->nama }}</td>
                                            <td>{{ $pj->hasil_labor ?? 'belum diinput hasil' }}</td>
                                            <td>{{ $pj->labor->satuan }}</td>
                                            <td>Rp {{ $pj->labor->harga }}</td>
                                            <td>{{ $pj->labor->pembiayaan }}</td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                               </table>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-5">
                                <label class="col-form-label pt-0" for="penyakit"><b>Assesment</b></label>
                                <select id="select-icdTen" class="form-control form-control-sm" name="assesment[]" multiple="multiple">
                                    @foreach ($icdTen as $pit)
                                        <option value="{{ $pit->id }}">{{ $pit->kode_spf}} - {{ $pit->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-7 mt-3">
                                <ul class="ms-list d-flex">
                                    <li class="ms-list-item pl-0">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <input type="submit" class="btn btn-sm btn-primary" value="Tambah">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="radio" name="assesment1" value="Utama">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> Utama </span>
                                    </li>
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="radio" name="assesment1" value="Sekunder">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> Sekunder </span>
                                    </li>
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="radio" name="assesment1" value="Komplikasi">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> Komplikasi </span>
                                    </li>
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="radio" name="assesment1" value="Lainnya">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> Lainnya </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ms-panel-body mb-3">
                            <div class="table-responsive">
                               <table class="table table-bordered thead-primary">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Kode Diagnosis</th>
                                            <th>Diagnosis</th>
                                            <th>DX Utama/Sek/Kom/Lainnya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pilihanAssesment as $pj)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pj->icdTen->kode }}</td>
                                                <td>{{ $pj->icdTen->deskripsi }}</td>
                                                <td>{{ $pj->pilihan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                               </table>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Instruksi Dokter</label>
                            {{-- <input name="penyakit" id="penyakit" class="form-control" type="text" > --}}
                            <textarea class="form-control" name="instruksi_dokter" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-form-label pt-0" for="penyakit"><b>Data Obat</b></label>
                                <select id="select-namaObat" class="form-control form-control-sm" name="nama_obat[]" multiple="multiple">
                                    <option value="">Pilih Obat</option>
                                    @foreach ($obat as $ob)
                                        <option value="{{ $ob->id }}">{{ $ob->nama}} - (Stok = {{ $ob->stok_akhir}}) - {{ $ob->pembiayaann->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label class="col-form-label pt-0" for="penyakit"><b>Dosis</b></label>
                                <select id="select-dosisObat" class="form-control form-control-sm" name="dosis[]" multiple="multiple">
                                    
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label class="col-form-label pt-0" for="penyakit"><b>Jumlah</b></label>
                                <select id="select-jumlahObat" class="form-control form-control-sm" name="jumlah[]" multiple="multiple">
                                    
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label pt-0" for="penyakit"><b>Keterangan</b></label>
                                <select id="select-keteranganObat" class="form-control form-control-sm" name="keterangan[]" multiple="multiple">
                                    
                                </select>
                            </div>
                            <div class="col-sm-3 mt-4">
                                <ul class="ms-list d-flex">
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input id="racikan" type="checkbox" style="height: 20px; width: 20px;">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> <b>Racikan</b> </span>
                                    </li>
                                    <li>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <input type="submit" class="btn btn-sm btn-primary" value="Tambah">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div  class="form-group row" id="racikann" >
                            <div class="col-sm-3">
                                <label class="col-form-label pt-0" for="penyakit"><b>Data Racikan Obat</b></label>
                                <select id="namaObat" class="form-control form-control-sm" name="nama_obat[]" multiple="multiple">
                                    <option value="">Pilih Obat</option>
                                    @foreach ($obat as $ob)
                                        <option value="{{ $ob->id }}">{{ $ob->nama}} - (Stok = {{ $ob->stok_akhir}}) - {{ $ob->pembiayaann->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label class="col-form-label pt-0" for="penyakit"><b>Dosis</b></label>
                                <select id="dosisObat" class="form-control form-control-sm" name="dosis[]" multiple="multiple">
                                    
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label class="col-form-label pt-0" for="penyakit"><b>Jumlah</b></label>
                                <select id="jumlahObat" class="form-control form-control-sm" name="jumlah[]" multiple="multiple">
                                    
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label pt-0" for="penyakit"><b>Keterangan</b></label>
                                <select id="keteranganObat" class="form-control form-control-sm" name="keterangan[]" multiple="multiple">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="ms-panel-body mb-3">
                            <div class="table-responsive">
                               <table class="table table-bordered thead-primary">
                                  <thead>
                                     <tr>
                                        <th width="50">No</th>
                                        <th>Nama Obat</th>
                                        <th>Dosis</th>
                                        <th>Jumlah</th>
                                        <th>Racikan(Jumlah)</th>
                                        <th>Harga</th>
                                        <th>Pembiayaan</th>
                                        <th>Keterangan</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($pilihanObat as $po)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $po->obat->nama }}</td>
                                            <td>{{ $po->dosis ?? 'belum diinput hasil' }}</td>
                                            <td>{{ $po->jumlah }}</td>
                                            <td></td>
                                            <td>Rp {{ $po->obat->harga }}</td>
                                            <td>{{ $po->obat->pembiayaann->nama ?? '-' }}</td>
                                            <td>{{ $po->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                               </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5">
                                <label class="col-form-label pt-0" for="penyakit"><b>Data Tindakan</b></label>
                                <select id="namaTindakan" class="form-control form-control-sm" name="nama_tindakan[]" multiple="multiple">
                                    <option value="">Pilih Tindakan</option>
                                    @foreach ($tindakan_medis as $tm)
                                        <option value="{{ $tm->id }}">{{ $tm->nama}} - {{ $tm->jenis}} - {{ $tm->pembiayaann->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label pt-0" for="penyakit"><b>Jumlah</b></label>
                                <select id="select-jumlahTindakan" class="form-control form-control-sm" name="jumlah_tindakan[]" multiple="multiple">
                                    
                                </select> 
                            </div>
                            <div class="col-sm-3">
                                <label class="col-form-label pt-0" for="penyakit"><b>Keterangan</b></label>
                                <select id="select-keteranganTindakan" class="form-control form-control-sm" name="keterangan_tindakan[]" multiple="multiple">
                                    
                                </select> 
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Tambah">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ms-panel-body mb-3">
                            <div class="table-responsive">
                               <table class="table table-bordered thead-primary">
                                  <thead>
                                     <tr>
                                        <th width="50">No</th>
                                        <th>Nama Tindakan</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Pembiayaan</th>
                                        <th>Keterangan</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($pilihanTinMed as $ptm)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ptm->tindakanMedis->nama }}</td>
                                            <td>{{ $ptm->jumlah ?? '' }}</td>
                                            <td>Rp {{ $ptm->tindakanMedis->harga }}</td>
                                            <td>{{ $ptm->tindakanMedis->pembiayaann->nama ?? '-' }}</td>
                                            <td>{{ $ptm->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                               </table>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-5">
                                <label class="col-form-label pt-0" for="penyakit"><b>Advice Dokter</b></label>
                                <div class="form-group row">
                                    <div class="col-sm-11">
                                        <textarea class="form-control" name="advice" id="exampleTextarea1" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 mt-2">
                                <div class="form-group row">
                                    <div class="col-sm-11">
                                        <span> <b>Tindakan Lanjutan</b> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <ul class="ms-list d-flex">
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="radio" name="idTinLan" value="1">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> BLPL / Pulang </span>
                                    </li>
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="radio" name="idTinLan" value="2">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> Rujuk IGD RS </span>
                                    </li>
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="radio" name="idTinLan" value="3">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> Meninggal </span>
                                    </li>
                                </ul>
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
    <script src="{{ url('assets/js/select2/select2.full.min.js') }}"></script>
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
    
    <script>
        $(document).ready(function() {
            $('#racikann').hide();
            $('#racikan').change(function() {
                if ($(this).is(':checked')) {
                    $('#racikann').show();
                } else {
                    $('#racikann').hide();
                }
            });
        });
        $(function() {
            $('#select-labor').select2({
                tags: true,
            });
            $('#select-icdTen').select2({
                tags: true,
            });
            $('#select-pekerjaan').select2({
                tags: true,
            });
            $('#namaObat').select2({
                tags: true,
            });
            $('#jumlahObat').select2({
                tags: true,
            });
            $('#dosisObat').select2({
                tags: true,
            });
            $('#keteranganObat').select2({
                tags: true,
            });
            $('#select-namaObat').select2({
                tags: true,
            });
            $('#select-dosisObat').select2({
                tags: true,
            });
            $('#select-jumlahObat').select2({
                tags: true,
            });
            $('#select-keteranganObat').select2({
                tags: true,
            });
            $('#select-namaPenunjang').select2({
                tags: true,
            });
            $('#select-penyakitDahulu').select2({
                tags: true,
            });
            $('#select-riwayatAlergi').select2({
                tags: true,
            });
            $('#namaTindakan').select2({
                tags: true,
            });
            $('#select-jumlahTindakan').select2({
                tags: true,
            });
            $('#select-keteranganTindakan').select2({
                tags: true,
            });
        });
        $(document).ready(function() {
            $('#saraf').change(function() {
                if ($(this).is(':checked')) {
                    $("#khusus").val(`
        Tanda Rangsang Meninggal 
                Kaku Kuduk - 
                Brudzinski Neck Sign - 
                Brudzinski Contralateral Reflex Sign - 

        Nervus Kranialis
                N 1 : Penghidu dbn / dbn
                N 2 : 
                    Visus dbn / dbn 
                    Lapang Pandang dbn / dbn 
                    Nistagmus - 
                N 3,4,6 
                    Pupil 3mm / 3mm , Isokor , Bulat
                    RC direk + / +
                    RC Indirek + / +
                    R Akomodasi + / + Konvergensi +
                    Gerak Bola Mata Simetris
                            Hambatan - / -
                            Ptosis - / -
                N 7 
                    Simetris 
                    Motorik
                            Dahi dbn / dbn
                            Menutup mata dbn / dbn
                            Mengembungkan pipi dbn / dbn
                            Senyum dbn / dbn
                            Mulut terbukadbn / dbn
                            Menjulurkan lidah dbn / dbn
                            Mencium dbn / dbn
                    Gerakan Involunter -
                N 12 
                    Kekuatan Lidah dbn / dbn

        Kekuatan Motorik Umum
                Trofi Otot - / - // - / -
                Tonus Otot dbn / dbn
                Kekuatan 555 / 555 // 555 / 555

        Sensoris Umum
                Sentuhan dbn / dbn
                Nyeri dbn / dbn
                Suhu dbn / dbn
                Getar dbn / dbn

        Reflek Fisiologis
                Bisep + / +
                Trisep + / +
                Patela + / +
                Achilles + / +

        Reflek Patologis
                Babinski - / -
                Chaddock - / -
                Oppenheim - / -
                Schaffer - / -

        Keseimbangan & Koordinasi
                Romberg : Normal
                Romberg Dipertajam : Normal
                Fukuda Stepping Test : Normal
                Past Pointing Test : Normal
                Nose Pointing Test : Normal
                Heel to Knee to Toe Test : Normal
                Rapid Alternating Movement Test : Normal
                Rebound Test : Normal`);
                return false;
                }else{
                    $("#khusus").val("");
                }
            });
        });
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