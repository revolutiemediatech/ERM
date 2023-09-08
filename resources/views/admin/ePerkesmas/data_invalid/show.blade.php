@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/select2.css') }}">
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Data Pasien E-Homecare</h5>
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
                                <td class="text-sm-start">{{ $kunjungan->faskes->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Wilayah</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->wilayah->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nama Pasien</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">No BPJS</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->no_bpjs ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">RT / RW</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->rt ?? '-' }} / {{ $kunjungan->rw ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Alamat</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Keluhan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->keluhan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kode E-Ticket</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->kode_unik ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Foto Kondisi Pasien</td>
                                <td>:</td>
                                @if ($kunjungan->file == null)
                                    <td class="text-sm-start">Gambar Belum Diinputkan</td>
                                @else
                                    <td class="text-sm-start"><img class="ms-profile-img" src="{{ url("upload\kunjungan_EPerkesmas") }}\{{ $kunjungan->file }}" alt="people"></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-sm-end">Alasan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->alasan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Anjuran</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kunjungan->anjuran ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Status</td>
                                <td>:</td>
                                @if ($kunjungan->status == 0)
                                    <td><span class="badge badge-warning me-auto">Menunggu Validasi</span></td>
                                @elseif($kunjungan->status == 1)
                                    <td><span class="badge badge-success me-auto">Valid</span> </td> 
                                @elseif($kunjungan->status == 2)
                                    <td><span class="badge badge-danger me-auto">Invalid</span> </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
    <script src="{{ url('assets/js/select2/select2.full.min.js') }}"></script>
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('#select-pekerjaan').select2({
                tags: true,
            });
        });
    </script>
@endsection