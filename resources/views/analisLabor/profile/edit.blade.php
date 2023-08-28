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
                    <a href="{{ url('analisLabor/profile') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke analisLabor/daerah , karena pake resource --}}
            <form action="{{ url("analisLabor/profile")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $user->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="no_hp">No HP</label>
                            <input name="no_hp" id="Email" class="form-control" type="text" value="{{ $user->no_hp }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleTextarea1">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="exampleTextarea1" rows="4">{{ $user->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleTextarea1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="exampleTextarea1" rows="4">{{ $user->alamat }}</textarea>
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