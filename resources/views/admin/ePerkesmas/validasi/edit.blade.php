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
                        <h5 class="card-title">Data Pribadi Pasien</h5>
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
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $kunjungan->id }}">
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Validasi</label>
                                <select id="select-status" class="form-control form-control-lg" id="exampleFormControlSelect1"  name="status" required>
                                    <option value="{{ $kunjungan->status }}" selected>
                                        @if($kunjungan->status == 0)
                                            Menunggu Validasi
                                        @elseif ($kunjungan->status == 1)
                                            Valid
                                        @elseif ($kunjungan->status == 2)
                                            Invalid
                                        @endif
                                    </option>
                                    <option value="">Pilih Validasi</option>
                                    <option value="1">Valid</option>
                                    <option value="2">Invalid</option>
                                </select>
                            </div>
                        </div>
                        <div class="type-form">
                            <div id="type-form-1">
                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="nama">Hari Kunjungan</label>
                                    <input name="hari_kunjungan" id="hari_kunjungan" class="form-control" type="date" placeholder="Hari Kunjungan">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="nama">Jadwal Kunjungan</label>
                                    <input type="time" id="i-jasin" class="form-control" name="jadwal_kunjungan">
                                </div>
                            </div>
                            <div id="type-form-2">
                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="nama">Alasan</label>
                                    <input name="alasan" id="alasan" class="form-control" type="text" placeholder="Alasan">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="nama">Anjuran</label>
                                    <input name="anjuran" id="anjuran" class="form-control" type="text" placeholder="Anjuran">
                                </div>
                            </div>
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
    <script>
        $('.type-form').hide();
        $('#select-status').on('change', function() {
            if (this.value == '' || this.value == null) {
                $('.type-form').hide();
            }

            if (this.value == 1) {
                $('.type-form').show();
                $('#type-form-1').show();
                $('#type-form-2').hide();
            }
            
            if (this.value == 2) {
                $('.type-form').show();
                $('#type-form-1').hide();
                $('#type-form-2').show();
            }
        });
    </script>
@endsection
