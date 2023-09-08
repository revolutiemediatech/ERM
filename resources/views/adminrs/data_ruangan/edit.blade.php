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
                    <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke adminRs/daerah , karena pake resource --}}
            <form action="{{ url("$url")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $ruangan->id }}">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Mitra</label>
                        <input name="idFaskes" id="idFaskes" class="form-control" type="text" value="{{ $ruangan->faskes->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <div class="col-form-label">Nama Unit/Ruangan</div>
                        <select class="form-control Select2" id="exampleFormControlSelect1"  name="nama" required>
                            <option value="{{ $ruangan->nama }}">{{ $ruangan->nama }}</option>
                            <option value="">Pilih Unit/Ruangan</option>
                            <option value="Ruang Pendaftaran dan Rekam Medis">Ruang Pendaftaran dan Rekam Medis</option>
                            <option value="Ruang Pemeriksaan Umum">Ruang Pemeriksaan Umum</option>
                            <option value="Ruang Tindakan dan Gawat Darurat">Ruang Tindakan dan Gawat Darurat</option>
                            <option value="Ruang KIA, KB dan Imunisasi">Ruang KIA, KB dan Imunisasi</option>
                            <option value="Ruang Pemeriksaan Khusus">Ruang Pemeriksaan Khusus</option>
                            <option value="Ruang Kesehatan Gigi dan Mulut">Ruang Kesehatan Gigi dan Mulut</option>
                            <option value="Ruang Komunikasi dan Edukasi (KIE)">Ruang Komunikasi dan Edukasi (KIE)</option>
                            <option value="Ruang Farmasi">Ruang Farmasi</option>
                            <option value="Ruang Persalinan">Ruang Persalinan</option>
                            <option value="Ruang Pasca Persalinan Normal">Ruang Pasca Persalinan Normal</option>
                            <option value="RUang Laboratorium">RUang Laboratorium</option>
                            <option value="Ruang Administrasi">Ruang Administrasi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="status" required>
                                <option value="{{ $ruangan->status }}" selected>
                                    @if($ruangan->status == 1)
                                        Aktif
                                    @elseif ($ruangan->status == 2)
                                        Tidak Aktif
                                    @endif
                                </option>
                                <option value="">Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
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