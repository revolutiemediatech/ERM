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
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Data Aduan</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end">Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->faskes->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nama</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Keluhan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->keluhan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kode E-Ticket</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->kode_unik ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Status</td>
                                <td>:</td>
                                @if ($aduan->status == 0)
                                    <td><span class="badge badge-warning me-auto">Menunggu Respon</span></td>
                                @elseif($aduan->status == 1)
                                    <td><span class="badge badge-success me-auto">Sudah di Respon</span> </td> 
                                @endif
                            </tr>
                        </tbody>
                    </table>
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
                {{-- <div class="col-lg-6 d-flex justify-content-end">
                    <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                </div> --}}
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url("$url") }}/{{ $id }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                @method('PUT')
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $aduan->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Respon</label>
                            <textarea class="form-control" name="respon" id="respon" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Rencana Tindak Lanjut</label>
                            <textarea class="form-control" name="rencana" id="rencana" rows="4"></textarea>
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
