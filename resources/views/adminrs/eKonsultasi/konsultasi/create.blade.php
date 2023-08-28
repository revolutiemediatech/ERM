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
                    <a href="{{ url('adminRs/konsultasi') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke adminRs/daerah , karena pake resource --}}
            <form action="{{ url('adminRs/konsultasi') }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama Lengkap</label>
                        <input name="nama_lengkap" id="nama_lengkap" class="form-control" type="text" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">No WA</label>
                        <input name="no_wa" id="no_wa" class="form-control" type="text" placeholder="No WA">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">No BPJS</label>
                        <input name="no_bpjs" id="no_bpjs" class="form-control" type="text" placeholder="No BPJS">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Topik</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idTopik" required>
                            <option value="">Pilih Topik</option>
                            @foreach ($topik as $tp)
                                <option value="{{ $tp->id }}">{{ $tp->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Pesan</label>
                        <textarea class="form-control" name="pesan" id="pesan" rows="4"></textarea>
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
