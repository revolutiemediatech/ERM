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
                        <h5 class="card-title">Data Aduan <b>{{ $aduan->nama }}</b></h5>
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
                                <td class="text-sm-end">Kode E-Ticket</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->kode_unik ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Keluhan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->keluhan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Respon</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->respon ?? 'belum ada respon' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Rencana Tindak Lanjut</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->rencana ?? 'belum ada respon' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Direspon Oleh</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->users->nama ?? 'belum ada respon' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Direspon Pada</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $aduan->updated_at ?? 'belum ada respon' }}</td>
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