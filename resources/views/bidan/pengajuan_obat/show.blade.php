@extends($bidan)

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
                            <a href="{{ url('bidan/pengajuan-obat') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
                {{-- otomatis masuk ke admin/bp-umum , karena pake resource --}}
                <div class="card-body">
                    <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $diagnosa->id }}">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama Pasien</label>
                        <input name="nama" id="nama" class="form-control" type="text" value="{{ $diagnosa->pasien->nama}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">No Rekam Medis</label>
                        <input name="nama" id="nama" class="form-control" type="text" value="{{ $diagnosa->pasien->no_index}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Diagnosis</label>
                        <input name="nama" id="nama" class="form-control" type="text" value="{{ $diagnosa->assesment}}" disabled>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label pt-0" for="nama">Obat</label>
                            <input name="nama" id="nama" class="form-control" type="text" value="{{ $diagnosa->obat->nama}}" disabled>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="col-form-label pt-0" for="nama">Satuan</label>
                            <input name="nama" id="nama" class="form-control" type="text" value="{{ $diagnosa->obat->satuan}}" disabled>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="col-form-label pt-0" for="nama">Harga</label>
                            <input name="nama" id="nama" class="form-control" type="text" value="Rp {{ $diagnosa->obat->harga}}" disabled>
                        </div>
                    </div>
                </div>
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
