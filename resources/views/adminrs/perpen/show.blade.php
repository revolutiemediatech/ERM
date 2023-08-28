@extends( $adminRs )

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/select2.css') }}">
@endsection

@section('css-custom')
    
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
                        <span class='btn btn-success'><b>{{ $pasien->jenisPasien->nama }}</b></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-2">
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Nama</label>
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
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">No RM</label>
                                <div class="col-sm-3">
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->no_index }}" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">TTL/Usia</label>
                                <div class="col-sm-3">
                                    <input name="alamat" id="alamat" class="form-control form-control-sm" type="text" value="{{ $pasien->tanggal_lahir }} / {{ $usia}} Tahun" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Pekerjaan</label>
                                <div class="col-sm-3">
                                    <select id="select-pekerjaan" class="form-control" name="pekerjaan1[]" multiple="multiple" disabled>
                                        @foreach ($pilihanPekerjaan as $pk)
                                            <option value="{{ $pk->id }}" selected>{{ $pk->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">NIK</label>
                                <div class="col-sm-3">
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->nik }}" disabled> 
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
                                    <input name="pendidikan" id="pendidikan" class="form-control form-control-sm" type="text" value="{{ $pasien->no_hp }}" disabled> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">{{ $page }}</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <div class="btn-group">
                            <a href='{{ url("$url/" . $pasien->id, []) }}/edit' type="button" class="btn btn-lg btn-primary">
                                <i class="fas fa-plus-square"></i> <b>Tambah Data</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
               <ul class="nav nav-tabs tabs-bordered d-flex nav-justified mb-4" role="tablist">
                  <li role="presentation" ><a href="#tab1" aria-controls="tab1" class="active show" role="tab" data-toggle="tab"> Data Formulir </a></li>
                  <li role="presentation" ><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"> Scan/Upload Dokumen </a></li>
               </ul>
               <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active show fade in" id="tab1">
                        <table id="basic-1" class="table table-striped thead-primary w-100">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Tanggal</th>
                                    <th>Dokter Pembuat Formulir</th>
                                    <th>Diagnosis</th>
                                    <th>Tindakan</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Persetujuan/Penolakan</th>
                                    <th width="10%"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perpen as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->created_at }}</td>
                                        <td>{{ $p->dokter->nama }}</td>
                                        <td>{{ $p->diagnosis }}</td>
                                        <td>{{ $p->nama_tindakan_dokter ?? 'tidak ada tindakan'}}</td>
                                        <td>{{ $p->nama_pj }}</td>
                                        <td>
                                            @if ($p->jenis == 1)
                                                <span class="badge badge-success me-auto">PERSETUJUAN</span>  
                                            @elseif ($p->jenis == 2)
                                                <span class="badge badge-warning me-auto">PENOLAKAN</span>
                                            @elseif ($p->jenis == 3)
                                                <span class="badge badge-danger me-auto">PENOLAKAN RAWAT INAP</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('perpen.destroy', ['id' => $p->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                            <form id="delete-form-{{ $p->id }}" action="{{ route('perpen.destroy', ['id' => $p->id]) }}" method="POST" style="display: none;">@csrf</form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab2">
                        <table id="basic-1" class="table table-striped thead-primary w-100">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Tanggal</th>
                                    <th>Dokter Pembuat Formulir</th>
                                    <th>Judul Dokumen</th>
                                    <th width="15%">Dokumen</th>
                                    <th width="10%"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perpen as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->created_at }}</td>
                                        <td>{{ $p->dokter->nama }}</td>
                                        <td>{{ $p->judul ?? 'File Belum Diupload' }}</td>
                                        @if ($p->dokumen == NULL)
                                            <td>File Belum Diupload</td>
                                        @elseif ($p->dokumen != NULL)
                                            <td>
                                                <a href="{{ url('upload/excel/dokumen/') }}/{{$p->dokumen }}">
                                                    <i class='fa fa-download ms-text-success'></i>
                                                </a>
                                            </td>
                                        @endif
                                        <td>
                                            <a href="{{ route('perpen.destroy', ['id' => $p->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                            <form id="delete-form-{{ $p->id }}" action="{{ route('perpen.destroy', ['id' => $p->id]) }}" method="POST" style="display: none;">@csrf</form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
               </div>
            </div>
        </div>
        {{-- <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Data Formulir</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <div class="btn-group">
                            <a href='{{ url("$url/" . $pasien->id, []) }}/edit' type="button" class="btn btn-lg btn-primary">
                                <i class="fas fa-plus-square"></i> <b>Tambah Data</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-striped thead-primary w-100">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Tanggal</th>
                                <th>Dokter Pembuat Formulir</th>
                                <th>Diagnosis</th>
                                <th>Tindakan</th>
                                <th>Penanggung Jawab</th>
                                <th>Persetujuan/Penolakan</th>
                                <th width="10%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perpen as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->created_at }}</td>
                                    <td>{{ $p->dokter->nama }}</td>
                                    <td>{{ $p->diagnosis }}</td>
                                    <td>{{ $p->nama_tindakan_dokter ?? 'tidak ada tindakan'}}</td>
                                    <td>{{ $p->nama_pj }}</td>
                                    <td>
                                        @if ($p->jenis == 1)
                                            <span class="badge badge-success me-auto">PERSETUJUAN</span>  
                                        @elseif ($p->jenis == 2)
                                            <span class="badge badge-warning me-auto">PENOLAKAN</span>
                                        @elseif ($p->jenis == 3)
                                            <span class="badge badge-danger me-auto">PENOLAKAN RAWAT INAP</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('perpen.destroy', ['id' => $p->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                        <form id="delete-form-{{ $p->id }}" action="{{ route('perpen.destroy', ['id' => $p->id]) }}" method="POST" style="display: none;">@csrf</form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
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
<script>
    $(function() {
        $('#select-pekerjaan').select2({
            tags: true,
        });
    });
</script>
@endsection