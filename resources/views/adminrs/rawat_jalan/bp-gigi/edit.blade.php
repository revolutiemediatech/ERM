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
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- Alerts-->
        @if (session()->has('sukses'))
        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('gagal'))
        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
            {{ session('gagal') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- End of Alerts-->
        <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">{{ $page }}</h5>
                </div>
                <div class="col-lg-6 fle d-flex justify-content-end">
                    <a href="{{ url('admin/bp-gigi') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/bp-gigi , karena pake resource --}}
            <form action="{{ url("admin/bp-gigi")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $diagnosa->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama Pasien</label>
                            <input name="idMPasien" id="idMProvinsi" class="form-control" type="text" value="{{ $diagnosa->pasien->nama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama Obat</label>
                            <select id="select-role" class="form-control" name="idMObat" required>
                                <option value="{{ $diagnosa->idMObat }}">{{ $diagnosa->obat->nama }}</option>
                                @foreach ($obat as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Penyakit</label>
                            <input name="penyakit" id="penyakit" class="form-control" type="text" value="{{ $diagnosa->penyakit }}">
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