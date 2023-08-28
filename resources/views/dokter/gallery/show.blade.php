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
                        <h5 class="card-title">Data Pasien</h5>
                    </div>
                    <div class="col-lg-6 flex d-flex justify-content-end">
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
                        <h5 class="card-title">Data Pasien</h5>
                    </div>
                    {{-- <div class="col-lg-6 flex d-flex justify-content-end">
                        <a href='{{ url("dokter/gallery") }}/{{ $pasien->id }}/edit' class="btn btn-primary">Upload</a>                    
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-striped thead-primary w-100">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Tanggal</th>
                                <th>Dokumen</th>
                                {{-- <th width="15%"><i class="fas fa-cog"></i></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $gl)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gl->created_at }}</td>
                                    @if ($gl->photo == NULL)
                                        <td>Gambar belum ada</td>
                                    @else
                                        <td>
                                            <img width="500px" src="{{ url("upload/gallery")}}/{{$gl->photo }}" alt="" align="left">
                                        </td>
                                    @endif
                                    {{-- <td>
                                        <a href="{{ url("dokter/gallery/delete", ['id' => $gl->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $gl->id }}').submit();"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                        <form id="delete-form-{{ $gl->id }}" action="{{ url("dokter/gallery/delete", ['id' => $gl->id]) }}" method="POST" style="display: none;">@csrf</form>
                                    </td> --}}
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