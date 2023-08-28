@extends($paramedis)

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
                        <h5 class="card-title">Data Pribadi Pasien</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('paramedis/pasienn') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end">Nama Pasien</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">NIK</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->nik }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">No KK</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->no_kk }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nama KK</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->nama_kk }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">No KS</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->no_ks }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">No HP</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->no_hp }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Tanggal Lahir</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Golongan Darah</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->goldar->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Jenis Kelamin</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->jenisKelamin->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Pendidikan</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->pendidikan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Pekerjaan</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->pekerjaan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Provinsi</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->provinsi->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Daerah</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->daerah->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kecamatan</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->kecamatan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Desa / Kelurahan</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->desa->nama }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Data Medis</h5>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end">Tanggal Registrasi</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->tanggal }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">No Rekam Medis</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->no_index }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Perawatan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->perawatan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Unit Pelayanan</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->unitPelayanan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kunjungan Sakit</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->kunjunganSakit->nama }}</td>
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