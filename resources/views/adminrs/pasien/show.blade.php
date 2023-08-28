@extends($adminRs)

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
                        <h5 class="card-title">Data Pribadi Pasien</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('adminRs/pasienn') }}" class="btn btn-sm btn-primary">Kembali</a>
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
                                <td><a href="{{ url('adminRs/rawat-jalan/history/'. $pasien->id) }}" type="button" class="btn btn-sm btn-primary">History Kunjungan</a></td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">NIK</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->nik }}</td>
                                <td><a href="{{ url('#') }}" type="button" class="btn btn-sm btn-primary">Gallery Pasien</a></td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">No KK</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->no_kk }}</td>
                                <td><a href="{{ url('adminRs/rawat-jalan/perpen/'. $pasien->id) }}" type="button" class="btn btn-sm btn-primary">Print Perstujuan/Penolakan</a></td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nama KK</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $pasien->nama_kk }}</td>
                                <td></td>
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
                                <td class="text-sm-start">
                                    <select id="select-pekerjaan" class="form-control" name="daftar_labor[]" multiple="multiple" disabled>
                                        @foreach ($pilihanPekerjaan as $pk)
                                            <option value="{{ $pk->id }}" selected>{{ $pk->nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
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
                            <tr>
                                <td class="text-sm-end">Alamat</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">RT / RW</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $pasien->rt }} / {{ $pasien->rw }}</td>
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