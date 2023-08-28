@extends( $dokter )

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
                        <h5 class="card-title">{{ $page }}</h5>
                    </div>
                    <div class="col-lg-6 fle d-flex justify-content-end">
                        <a href='{{ url("dokter/bp-umum") }}/{{ $pasien->id }}/edit' class="btn btn-primary">Kembali</a>                    
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-2">
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Nama Lengkap</label>
                                <div class="col-sm-2">
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->nama }}" disabled> 
                                </div>
                                <div class="col-sm-1">
                                    @if ($pasien->idMJenisKel == 1)
                                        <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-sm text-center" type="text" value="P" disabled>
                                    @elseif ($pasien->idMJenisKel == 2)
                                    <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-sm text-center" type="text" value="L" disabled>
                                    @endif
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Alamat</label>
                                <div class="col-sm-3">
                                    <input name="alamat" id="alamat" class="form-control form-control-sm" type="text" value="{{ $pasien->alamat }}" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Pendidikan</label>
                                <div class="col-sm-3">
                                    <input name="pendidikan" id="pendidikan" class="form-control form-control-sm" type="text" value="{{ $pasien->pendidikan->nama }}" disabled> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">No Rekam Medis</label>
                                <div class="col-sm-3">
                                    <input name="no_index" id="no_index" class="form-control form-control-sm" type="text" value="{{ $pasien->no_index }}" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Tanggal Lahir/Usia</label>
                                <div class="col-sm-3">
                                    <input name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm" type="text" value="{{ $pasien->tanggal_lahir }} / {{ $usia}} Tahun" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Pekerjaan</label>
                                <div class="col-sm-3">
                                    <select id="select-pekerjaan" class="form-control" name="daftar_labor[]" multiple="multiple" disabled>
                                        @foreach ($pilihanPekerjaan as $pk)
                                            <option value="{{ $pk->id }}" selected>{{ $pk->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">NIK</label>
                                <div class="col-sm-3">
                                    <input name="nik" id="nik" class="form-control form-control-sm" type="text" value="{{ $pasien->nik }}" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Golongan Darah</label>
                                <div class="col-sm-2">
                                    <input name="goldar" id="goldar" class="form-control form-control-sm" type="text" value="{{ $pasien->goldar->nama }}" disabled> 
                                </div>
                                <div class="col-sm-1">
                                    <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-sm" type="text" value="{{ $diagnosa->pasien->rhesus->nama ?? '' }}" disabled>
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">No Hp</label>
                                <div class="col-sm-3">
                                    <input name="no_hp" id="no_hp" class="form-control form-control-sm" type="text" value="{{ $pasien->no_hp }}" disabled> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">{{ $page }}</h5>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-striped thead-primary w-100">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>No Rekam Medis</th>
                                <th>Jenis Perawatan</th>
                                <th>Status</th>
                                <th width="15%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($HPasien as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($p->idMPerawatan == 1)
                                        <td>RAPT {{ $loop->iteration }}</td>
                                    @elseif ($p->idMPerawatan == 2)
                                        <td>CPPT {{ $loop->iteration - 1 }}</td>
                                    @endif
                                    <td>{{ $p->created_at }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->no_index }}</td>
                                    <td>
                                        @if ($p->idMPerawatan == 1)
                                            Rawat Jalan
                                        @else
                                            Rawat Inap
                                        @endif
                                    </td>
                                    <td>
                                        @if ($p->status == 1)
                                            <span class='badge badge-pill badge-warning'>Sedang Diperiksa Dokter</span>
                                        @elseif ($p->status == 2)
                                            <span class='badge badge-pill badge-warning'>Sedang Pemeriksaan Labor</span>
                                        @elseif ($p->status == 3)
                                            <span class='badge badge-pill badge-warning'>Sedang Pengajuan Rawat Inap</span>
                                        @elseif ($p->status == 4)
                                            <span class='badge badge-pill badge-warning'>Sedang Perawatan Inap</span>
                                        @elseif ($p->status == 5)
                                            <span class='badge badge-pill badge-secondary'>Sedang Menunggu Obat</span>
                                        @elseif ($p->status == 6)
                                            <span class='badge badge-pill badge-info'>Sedang Menunggu Pembayaran</span>
                                        @elseif ($p->status == 7)
                                            <span class='badge badge-pill badge-success'>Selesai</span>
                                        @elseif ($p->status == 8)
                                            <span class='badge badge-pill badge-info'>Sedang Pemeriksaan Penunjang</span>
                                        @endif    
                                    </td>
                                    <td>
                                        @if ($p->idMPerawatan == 2)
                                            <a href='{{ url("dokter/rawat-inap/pasien/" . $p->id, []) }}/edit'><i class='fas fa-pencil-alt ms-text-primary' title='Tambah CPPT'></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}

    <!-- Required datatable js -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('assets/js/select2/select2.full.min.js') }}"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>

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