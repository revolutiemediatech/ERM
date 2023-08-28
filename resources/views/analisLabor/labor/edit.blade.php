@extends($analisLabor)

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
                    <a href="{{ url('analisLabor/labor') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke analisLabor/daerah , karena pake resource --}}
            <form action="{{ url("analisLabor/labor")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $labor->id }}">
                        <div class="mb-3">
                            <div class="col-form-label">Mitra</div>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idFaskes" required>
                                <option value="{{$labor->idFaskes}}"><b>{{$labor->faskes->nama}}</b></option>
                                <option value="">Pilih Mitra</option>
                                @foreach ($faskes as $faskes)
                                    <option value="{{ $faskes->id }}">{{ $faskes->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Cabang Mitra</div>
                            <select class="form-control Select2" id="exampleFormControlSelect1"  name="idLokasiPemeriksaan" required>
                                <option value="{{$labor->idLokasiPemeriksaan}}"><b>{{$labor->lokasiPemeriksaan->nama}}</b></option>
                                <option value="">Pilih Cabang Mitra</option>
                                @foreach ($lokasiPemeriksaan as $lp)
                                    <option value="{{ $lp->id }}">{{ $lp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama</label>
                            <input name="nama" id="nama" class="form-control" type="text" value="{{ $labor->nama }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Satuan</label>
                            <input name="satuan" id="satuan" class="form-control form-control-lg" type="text" value="{{ $labor->satuan }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Batas Bawah</label>
                            <input name="batas_bawah" id="batas_bawah" class="form-control form-control-lg" type="text" value="{{ $labor->batas_bawah }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Batas Atas</label>
                            <input name="batas_atas" id="batas_atas" class="form-control form-control-lg" type="text" value="{{ $labor->batas_atas }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Harga</label>
                            <input name="harga" id="harga" class="form-control form-control-lg" type="text" value="{{ $labor->harga }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Pembiayaan</label>
                            <select class="form-control form-control-lg Select2" id="select2" name="pembiayaan">
                                <option value="{{ $labor->pembiayaan }}">{{ $labor->pembiayaann->nama }}</option>
                                <option value="">Pilih Jenis Pembiayaan</option>
                                @foreach ($jenis_pasien as $jp)
                                    <option value="{{ $jp->id }}">{{ $jp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Stok Awal</label>
                            <input name="stok_awal" id="stok_awal" class="form-control form-control-lg" type="text" value="{{ $labor->stok_awal }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Stok Akhir</label>
                            <input name="stok_akhir" id="stok_akhir" class="form-control form-control-lg" type="text" value="{{ $labor->stok_akhir }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Satuan Stock</label>
                            <input name="satuan_stock" id="satuan_stock" class="form-control form-control-lg" type="text" value="{{ $labor->satuan_stock }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Kapasitas Per Stock</label>
                            <input name="kapasitas_stock" id="kapasitas_stock" class="form-control form-control-lg" type="text" value="{{ $labor->kapasitas_stock }}">
                        </div>
                        <div class="mb-2">
                            <div class="col-form-label">Status</div>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="status" required>
                                <option value="{{ $labor->status }}"> 
                                @if ($labor->status == 1)
                                    Tersedia
                                @elseif ($labor->status == 2)
                                    Habis
                                @endif
                                </option>
                                <option value="">Pilih Status</option>
                                <option value="1">Tersedia</option>
                                <option value="2">Habis</option>
                            </select>
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