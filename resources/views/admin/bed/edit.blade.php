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
                    <a href="{{ url('admin/bed') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url("admin/bed")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $bed->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama</label>
                            <input name="nama" id="nama" class="form-control" type="text" value="{{ $bed->nama }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama Kamar</label>
                            <input name="idKamar" id="idKamar" class="form-control" type="text" value="{{ $bed->kamar->nama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Mitra</label>
                            <input name="idFaskes" id="idFaskes" class="form-control" type="text" value="{{ $bed->faskes->nama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Cabang Mitra</label>
                            <input name="idLokasiPemeriksaan" id="idLokasiPemeriksaan" class="form-control" type="text" value="{{ $bed->lokasipemeriksaan->nama }}" disabled>
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