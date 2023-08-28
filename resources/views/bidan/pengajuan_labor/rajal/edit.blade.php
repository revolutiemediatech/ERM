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
        <div class="ms-panel mb-3">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Detail Data Pasien <b>{{ $pasien->nama }}</b></h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('dokter/pengajuan-labor') }}/{{ $id }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input name="nama" id="nama" class="form-control form-control" type="text" value="{{ $pasien->nama }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">No Rekam Medis</label>
                                <div class="col-sm-9">
                                    <input name="no_index" id="no_index" class="form-control form-control" type="text" value="{{ $pasien->no_index }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input name="nik" id="nik" class="form-control form-control" type="text" value="{{ $pasien->nik }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Diagnosis</label>
                                <div class="col-sm-9">
                                    <input name="nik" id="nik" class="form-control form-control" type="text" value="{{ $pasien->assesment }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">{{ $page }}</h5>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke dokter/daerah , karena pake resource --}}
            <form action="{{ url("dokter/pengajuan-labor")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $diagnosa->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama Pemeriksaan</label>
                            <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama Pemeriksaan">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Hasil</label>
                            <input name="hasil" id="hasil" class="form-control" type="text" placeholder="Hasil">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Satuan</label>
                            <input name="satuan" id="satuan" class="form-control" type="text" placeholder="Satuan">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Batas Bawah</label>
                            <input name="batas_bawah" id="batas_bawah" class="form-control" type="text" placeholder="Batas Bawah">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Batas Atas</label>
                            <input name="batas_atas" id="batas_atas" class="form-control" type="text" placeholder="Batas Atas">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Harga</label>
                            <input name="harga" id="harga" class="form-control" type="text" placeholder="Harga">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Tercover Asuransi</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="tercover" required>
                                <option value="">Pilih Jenis Cover Asuransi</option>
                                <option value="BPJS">BPJS</option>
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