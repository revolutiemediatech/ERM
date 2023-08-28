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
                        <h5 class="card-title">Detail Data Tindakan Medis</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('admin/tindakan-medis') }}" class="btn btn-sm btn-primary">Kembali</a>
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
                                <td class="text-sm-start">{{ $tindakan_medis->faskes->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Cabang Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $tindakan_medis->lokasiPemeriksaan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nama</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $tindakan_medis->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Jenis</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $tindakan_medis->jenis }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Harga</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $tindakan_medis->harga }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Pembiayaan</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $tindakan_medis->pembiayaann->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Status</td>
                                <td>:</td>                          
                                @if ($tindakan_medis->status == 1)
                                    <td class="text-sm-start"><span class="badge badge-success me-auto">Tersedia</span></td>
                                @elseif ($tindakan_medis->status == 2)
                                    <td class="text-sm-start"><span class="badge badge-danger me-auto">Tidak Tersedia</span></td>
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