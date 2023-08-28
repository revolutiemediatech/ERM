@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Data Kop</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('admin/kop') }}" class="btn btn-sm btn-primary">Kembali</a>
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
                                <td class="text-sm-start">{{ $kop->faskes->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Cabang Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $kop->lokasiPemeriksaan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kop Surat</td>
                                <td>:</td>
                                @if ($kop->logo == Null)
                                    <td>Kop Surat belum ada</td>
                                @else
                                    <td>
                                        <img width="500px" src="{{ url("upload\kop") }}\{{ $kop->logo }}" alt="" align="left">
                                    </td>
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
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
@endsection