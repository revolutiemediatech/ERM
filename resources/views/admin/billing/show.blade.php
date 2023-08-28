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
                        <h5 class="card-title">Detail Data Billing</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('admin/billing') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end">Nama Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $billing->faskes->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nama Cabang</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $billing->lokasiPemeriksaan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nama Billing</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $billing->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Pembiayaan</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $billing->pembiayaan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Harga</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $billing->harga }}</td>
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