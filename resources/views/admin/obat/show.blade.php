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
                        <h5 class="card-title">Detail Data Obat</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('admin/obat') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end">Nama Obat</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $obat->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Stok Awal</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $obat->stok_awal }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Stok Akhir</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $obat->stok_akhir }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Satuan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $obat->satuan }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Dosis Sediaan Obat</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $obat->dosis_sediaan_obat ?? '-' }} | {{ $obat->satuan_dso ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Dosis per BB Batas Bawah</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $obat->dosis_perBB_bawah ?? '-' }} | {{ $obat->ket_dbb ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Dosis per BB Batas Atas</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $obat->dosis_perBB_atas ?? '-' }} | {{ $obat->ket_dba ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Harga</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $obat->harga }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Tanggal Expired</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $obat->expired }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Pembiayaan</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $obat->pembiayaann->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Status</td>
                                <td>:</td>                          
                                @if ($obat->status == 1)
                                    <td class="text-sm-start"><span class="badge badge-success me-auto">Tersedia</span></td>
                                @elseif ($obat->status == 1)
                                    <td class="text-sm-start"><span class="badge badge-danger me-auto">Habis</span></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-sm-end">Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $obat->faskes->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Cabang Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $obat->lokasiPemeriksaan->nama }}</td>
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