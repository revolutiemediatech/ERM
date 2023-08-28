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
                    <a href="{{ url('adminRs/tindakan-medis') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke adminRs/daerah , karena pake resource --}}
            <form action="{{ url('adminRs/tindakan-medis') }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama</label>
                        <input name="nama" id="nama" class="form-control form-control-lg" type="text" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Jenis</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="jenis">
                            <option value="">Pilih Jenis</option>
                            <option value="Non ICD9">Non ICD9</option>
                            <option value="ICD9">ICD9</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Harga</label>
                        <input name="harga" id="harga" class="form-control form-control-lg" type="text" placeholder="Harga">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Pembiayaan</label>
                        <select class="form-control form-control-lg Select2" id="select2" name="pembiayaan">
                            <option value="">Pilih Jenis Pembiayaan</option>
                            @foreach ($pembiayaan as $jp)
                                <option value="{{ $jp->id }}">{{ $jp->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">Status</div>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Tersedia</option>
                            <option value="2">Tidak Tersedia</option>
                        </select>
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
