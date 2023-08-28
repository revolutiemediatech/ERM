@extends($adminRs)

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
                    <a href="{{ url('adminRs/billing') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url("adminRs/administrasi")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $administrasi->id }}">
                        <div class="mb-3">
                            <div class="col-form-label">Mitra</div>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idFaskes" required>
                                <option value="{{$administrasi->idFaskes}}"><b>{{$administrasi->faskes->nama}}</b></option>
                                <option value="">Pilih Mitra</option>
                                @foreach ($faskes as $faskes)
                                    <option value="{{ $faskes->id }}">{{ $faskes->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Cabang Mitra</div>
                            <select class="form-control Select2" id="exampleFormControlSelect1"  name="idLokasiPemeriksaan" required>
                                <option value="{{$administrasi->idLokasiPemeriksaan}}"><b>{{$administrasi->lokasiPemeriksaan->nama}}</b></option>
                                <option value="">Pilih Cabang Mitra</option>
                                @foreach ($lokasiPemeriksaan as $lp)
                                    <option value="{{ $lp->id }}">{{ $lp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama</label>
                            <input name="nama" id="nama" class="form-control form-control-lg" type="text" value="{{ $administrasi->nama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Pembiayaan</label>
                            <select class="form-control form-control-lg Select2" id="select2" name="idPembiayaan">
                                <option value="{{ $administrasi->idPembiayaan }}">{{ $administrasi->pembiayaan->nama }}</option>
                                <option value="">Pilih Jenis Pembiayaan</option>
                                @foreach ($pembiayaan as $jp)
                                    <option value="{{ $jp->id }}">{{ $jp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Harga</label>
                            <input name="harga" id="harga" class="form-control form-control-lg" type="text" value="{{ $administrasi->harga }}">
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
@endsection