@extends($perawat)

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
                    <a href="{{ url('perawat/obat') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke perawat/daerah , karena pake resource --}}
            <form action="{{ url('perawat/obat') }}" method="POST">
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
                        <div class="col-form-label">Mitra</div>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idFaskes" required>
                            <option value="">Pilih Mitra</option>
                            @foreach ($faskes as $faskes)
                                <option value="{{ $faskes->id }}">{{ $faskes->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Stok Awal</label>
                        <input name="stok_awal" id="stok_awal" class="form-control form-control-lg" type="text" placeholder="Stok Awal">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Satuan</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="satuan" required>
                            <option value="">Pilih Satuan</option>
                            <option value="Biji">Biji</option>
                            <option value="Kap">Kaplet</option>
                            <option value="Tab">Tablet</option>
                            <option value="Btl">Botol</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Harga</label>
                        <input name="harga" id="harga" class="form-control form-control-lg" type="text" placeholder="Harga">
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">Status</div>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Tersedia</option>
                            <option value="2">Habis</option>
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
