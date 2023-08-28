@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    {{-- Tempat Ngoding isi web --}}
<div class="content-wrapper">
    <!-- Alerts-->
    @if (session()->has('sukses'))
    <div class="alert alert-success dark alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
    </div>
    @elseif (session()->has('gagal'))
    <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
        {{ session('gagal') }}
    </div>
    @endif
    <!-- End of Alerts-->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">{{ $page }}</h5>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <a href="{{ url('admin/autofill-custom') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url("admin/autofill-custom")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $autofill->id }}">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama</label>
                        <input name="nama" id="nama" class="form-control form-control-lg" type="text" value="{{ $autofill->nama}}">
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
                                <input name="eye" id="eye" class="form-control form-control-sm" type="text" value="{{ $autofill->eye }}"> 
                            </div>
                            <label for="colFormLabel" class="ml-3 mt-1">V</label>
                            <div class="col-sm-1">
                                <input name="verbal" id="verbal" class="form-control form-control-sm" type="text" value="{{ $autofill->verbal }}">
                            </div>
                            <label for="colFormLabel" class="ml-3 mt-1">M</label>
                            <div class="col-sm-1">
                                <input name="motorik" id="motorik" class="form-control form-control-sm" type="text" value="{{ $autofill->motorik }}">
                            </div>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Keadaan Umum</label>
                            <div class="col-sm-3">
                                <input name="keadaan_umum" id="keadaan_umum" class="form-control form-control-sm" type="text" value="{{ $autofill->keadaan_umum }}"> 
                            </div>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Tekanan Darah</label>
                            <div class="col-sm-1">
                                <input name="td1" id="td1" class="form-control form-control-sm" type="text" value="{{ $autofill->td1 }}"> 
                            </div>
                            <label for="colFormLabel" class="mt-1">/</label>
                            <div class="col-sm-1">
                                <input name="td2" id="td2" class="form-control form-control-sm" type="text" value="{{ $autofill->td2 }}">
                            </div>
                            <label for="colFormLabel">mmHg</label>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Denyut Nadi</label>
                            <div class="col-sm-1">
                                <input name="hr" id="hr" class="form-control form-control-sm" type="text" value="{{ $autofill->hr }}"> 
                            </div>
                            <label for="colFormLabel">x/Menit</label>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Laju Pernafasan</label>
                            <div class="col-sm-1">
                                <input name="rr" id="rr" class="form-control form-control-sm" type="text" value="{{ $autofill->rr }}"> 
                            </div>
                            <label for="colFormLabel">x/Menit</label>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label-sm">Suhu</label>
                            <div class="col-sm-1">
                                <input name="suhu" id="suhu" class="form-control form-control-sm" type="text" value="{{ $autofill->suhu }}"> 
                            </div>
                            <label for="colFormLabel">&degC</label>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label-sm">SpO2</label>
                            <div class="col-sm-1">
                                <input name="spo2" id="spo2" class="form-control form-control-sm" type="text" value="{{ $autofill->spo2 }}"> 
                            </div>
                            <label for="colFormLabel">%</label>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label-sm">BB</label>
                            <div class="col-sm-1">
                                <input name="bb" id="bb" class="form-control form-control-sm" type="text" value="{{ $autofill->bb }}"> 
                            </div>
                            <label for="colFormLabel">Kg</label>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label-sm">TB</label>
                            <div class="col-sm-1">
                                <input name="tb" id="tb" class="form-control form-control-sm" type="text" value="{{ $autofill->tb }}"> 
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
                                            <input name="ca1" id="ca1" class="form-control form-control-sm" type="text" value="{{ $autofill->ca1 }}"> 
                                        </div>
                                        <label for="colFormLabel" class="mt-1">/</label>
                                        <div class="col-sm-1">
                                            <input name="ca2" id="ca2" class="form-control form-control-sm" type="text" value="{{ $autofill->ca2 }}">
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">SI</label>
                                        <div class="col-sm-1">
                                            <input name="si1" id="si1" class="form-control form-control-sm" type="text" value="{{ $autofill->si1 }}"> 
                                        </div>
                                        <label for="colFormLabel" class="mt-1">/</label>
                                        <div class="col-sm-1">
                                            <input name="si2" id="si2" class="form-control form-control-sm" type="text" value="{{ $autofill->si2 }}">
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">RC</label>
                                        <div class="col-sm-1">
                                            <input name="rc1" id="rc1" class="form-control form-control-sm" type="text" value="{{ $autofill->rc1 }}"> 
                                        </div>
                                        <label for="colFormLabel" class="mt-1">/</label>
                                        <div class="col-sm-1">
                                            <input name="rc2" id="rc2" class="form-control form-control-sm" type="text" value="{{ $autofill->rc2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-3">
                                        <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Cor</label>
                                        <label for="colFormLabel" class="ml-3 mt-1">S1-2</label>
                                        <div class="col-sm-2">
                                            <input name="s1_2" id="s1-2" class="form-control form-control-sm" type="text" value="{{ $autofill->s1_2}}"> 
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">Murmur</label>
                                        <div class="col-sm-1">
                                            <input name="murmur1" id="murmur1" class="form-control form-control-sm" type="text" value="{{ $autofill->murmur1 }}"> 
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="murmur2" id="murmur2" class="form-control form-control-sm" type="text" value="{{ $autofill->murmur2 }}">
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">Gallop</label>
                                        <div class="col-sm-1">
                                            <input name="gallop1" id="gallop1" class="form-control form-control-sm" type="text" value="{{ $autofill->gallop1 }}"> 
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="gallop2" id="gallop2" class="form-control form-control-sm" type="text" value="{{ $autofill->gallop2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-3">
                                        <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Pulmonal</label>
                                        <label for="colFormLabel" class="ml-3 mt-1">SDV</label>
                                        <div class="col-sm-1">
                                            <input name="sdv1" id="sdv1" class="form-control form-control-sm" type="text" value="{{ $autofill->sdv1 }}"> 
                                        </div>
                                        <label for="colFormLabel" class="mt-1">/</label>
                                        <div class="col-sm-1">
                                            <input name="sdv2" id="sdv2" class="form-control form-control-sm" type="text" value="{{ $autofill->sdv2 }}">
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">RH</label>
                                        <div class="col-sm-1">
                                            <input name="rh1" id="rh1" class="form-control form-control-sm" type="text" value="{{ $autofill->rh1 }}"> 
                                        </div>
                                        <label for="colFormLabel" class="mt-1">/</label>
                                        <div class="col-sm-1">
                                            <input name="rh2" id="rh2" class="form-control form-control-sm" type="text" value="{{ $autofill->rh2 }}">
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">WH</label>
                                        <div class="col-sm-1">
                                            <input name="wh1" id="wh1" class="form-control form-control-sm" type="text" value="{{ $autofill->wh1 }}"> 
                                        </div>
                                        <label for="colFormLabel" class="mt-1">/</label>
                                        <div class="col-sm-1">
                                            <input name="wh2" id="wh2" class="form-control form-control-sm" type="text" value="{{ $autofill->wh2 }}">
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">Retraksi</label>
                                        <div class="col-sm-1">
                                            <input name="retraksi1" id="retraksi1" class="form-control form-control-sm" type="text" value="{{ $autofill->retraksi1 }}"> 
                                        </div>
                                        <div class="col-sm-1">
                                            <input name="retraksi2" id="retraksi2" class="form-control form-control-sm" type="text" value="{{ $autofill->retraksi2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-3">
                                        <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Abdomen</label>
                                        <label for="colFormLabel" class="ml-3 mt-1">Kontur</label>
                                        <div class="col-sm-1">
                                            <input name="kontur" id="kontur" class="form-control form-control-sm" type="text" value="{{ $autofill->kontur}}"> 
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">Defans</label>
                                        <div class="col-sm-1">
                                            <input name="defans" id="defans" class="form-control form-control-sm" type="text" value="{{ $autofill->defans }}"> 
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">BU</label>
                                        <div class="col-sm-1">
                                            <input name="bu1" id="bu1" class="form-control form-control-sm" type="text" value="{{ $autofill->bu1}}"> 
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="bu2" id="bu2" class="form-control form-control-sm" type="text" value="{{ $autofill->bu2}}">
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">NT</label>
                                        <div class="col-sm-1">
                                            <input name="nt1" id="nt1" class="form-control form-control-sm" type="text" value="{{ $autofill->nt1 }}"> 
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="nt2" id="nt2" class="form-control form-control-sm" type="text" value="{{ $autofill->nt2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-3">
                                        <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Ekstremitas</label>
                                        <label for="colFormLabel" class="ml-3 mt-1">Crt</label>
                                        <div class="col-sm-1">
                                            <input name="crt" id="crt" class="form-control form-control-sm" type="text" value="{{ $autofill->crt }}"> 
                                        </div>
                                        <label for="colFormLabel" class="mt-1">Detik</label>
                                        <div class="verikal_center ml-2"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">Akral</label>
                                        <div class="col-sm-1">
                                            <input name="akral" id="akral" class="form-control form-control-sm" type="text" value="{{ $autofill->akral }}"> 
                                        </div>
                                        <div class="verikal_center"></div>
                                        <label for="colFormLabel" class="ml-3 mt-1">Edema</label>
                                        <div class="col-sm-1">
                                            <input name="edema1" id="edema1" class="form-control form-control-sm" type="text" value="{{ $autofill->edema1 }}"> 
                                        </div>
                                        <label for="colFormLabel" class="mt-1">/</label>
                                        <div class="col-sm-1">
                                            <input name="edema2" id="edema2" class="form-control form-control-sm" type="text" value="{{ $autofill->edema2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-3">
                                        <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Status Lokalis</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" name="status_lokalis" id="exampleTextarea1" rows="4">{{ $autofill->status_lokalis }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Status</label>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-0">
                                <label class="ms-checkbox-wrap">
                                <input type="radio" name="status" value="1">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> Aktif </span>
                            </li>
                            <li class="ms-list-item">
                                <label class="ms-checkbox-wrap">
                                <input type="radio" name="status" value="2">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> Tidak Aktif </span>
                            </li>
                        </ul>
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
@endsection