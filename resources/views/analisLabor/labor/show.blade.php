@extends($analisLabor)

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
                        <h5 class="card-title">{{ $page }}</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('analisLabor/labor') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end">Nama Pemeriksaan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $labor->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Satuan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $labor->satuan }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Batas Bawah</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $labor->batas_bawah }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Batas Atas</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $labor->batas_atas }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Harga</td>
                                <td>:</td>                          
                                <td class="text-sm-start">Rp {{ $labor->harga }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Pembiayaan</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $labor->pembiayaann->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Stok Awal</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $labor->stok_awal }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Stok Akhir</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $labor->stok_akhir }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Satuan Stock</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $labor->satuan_stock ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kapasitas Per Stock</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $labor->kapasitas_stock ?? '-' }} Orang</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Status</td>
                                <td>:</td>               
                                @if ($labor->status == 1)
                                    <td class="text-sm-start"><span class='badge badge-success me-auto'>Tersedia</span></td>
                                @elseif ($labor->status == 2)
                                    <td class="text-sm-start"><span class='badge badge-danger me-auto'>Habis</span></td>
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