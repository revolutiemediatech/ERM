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
                    <a href="{{ url('admin/lansia') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/lansia , karena pake resource --}}
            <form action="{{ url('admin/lansia') }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama Pasien</label>
                        <select id="select-role" class="form-control" name="idMPasien" required>
                            <option value="">Nama Pasien</option>
                            @foreach ($pasien as $r)
                                <option value="{{ $r->id }}">{{ $r->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama Obat</label>
                        <select id="select-role" class="form-control" name="idMObat" required>
                            <option value="">Pilih Obat</option>
                            @foreach ($obat as $r)
                                <option value="{{ $r->id }}">{{ $r->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama Mitra</label>
                        <select id="select-role" class="form-control" name="idFaskes" required>
                            <option value="">Pilih Mitra</option>
                            @foreach ($faskes as $faskes)
                            <option value="{{ $faskes->id }}">{{ $faskes->nama }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama Cabang Mitra</label>
                        <select id="select-role" class="form-control" name="idMUnitPelayanan" required>
                            <option value="">Pilih Cabang Mitra</option>
                            @foreach ($lokasiPemeriksaan as $lp)
                                <option value="{{ $lp->id }}">{{ $lp->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="penyakit">Penyakit</label>
                        <input name="penyakit" id="penyakit" class="form-control" type="text" placeholder="Nama Penyakit">
                    </div>
                    <div class="mb-3">
                        <div class="col-form-label">Tindakan Lanjutan</div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-0">
                                <label class="ms-checkbox-wrap">
                                <input type="radio" name="idTinLanjutan" value="1" required>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> Tidak Ada </span>
                            </li>
                            <li class="ms-list-item pl-0">
                                <label class="ms-checkbox-wrap">
                                <input type="radio" name="idTinLanjutan" value="2" required>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> Rawat Inap </span>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <div class="col-form-label">Pemeriksaan Penunjang</div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-0">
                                <label class="ms-checkbox-wrap">
                                <input type="radio" name="idPemPenunjang" value="1" required>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> Tidak Ada </span>
                            </li>
                            <li class="ms-list-item pl-0">
                                <label class="ms-checkbox-wrap">
                                <input type="radio" name="idPemPenunjang" value="2" required>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> Labor </span>
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
