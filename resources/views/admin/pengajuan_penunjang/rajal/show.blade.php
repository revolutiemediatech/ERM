@extends( $admin )

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
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->no_index }}" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Tanggal Lahir/Usia</label>
                                <div class="col-sm-3">
                                    <input name="alamat" id="alamat" class="form-control form-control-sm" type="text" value="{{ $pasien->tanggal_lahir }} / {{ $usia}} Tahun" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Pekerjaan</label>
                                <div class="col-sm-3">
                                    <select id="select-pekerjaan" class="form-control form-control-sm" name="pekerjaan1[]" multiple="multiple" disabled>
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
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->goldar->nama }}" disabled> 
                                </div>
                                <div class="col-sm-1">
                                    <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-sm" type="text" value="{{ $pasien->rhesus->nama ?? '' }}" disabled>
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">No Hp</label>
                                <div class="col-sm-3">
                                    <input name="no_hp" id="no_hp" class="form-control form-control-sm" type="text" value="{{ $pasien->no_hp }}" disabled> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 flex d-flex justify-content-center">
                        <div class="btn-group">
                            <a href='#pempenunModalTambah' type="button" class="btn btn-lg btn-primary" data-toggle="modal">
                                <i class="fas fa-plus-square"></i> <b>Tambah Data</b>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ms-panel-body mb-3">
                        <div class="table-responsive">
                           <table id="basic-1" class="table table-striped thead-primary w-100">
                              <thead>
                                 <tr>
                                    <th width="50">No.</th>
                                    <th>Nama</th>
                                    <th>Hasil</th>
                                    <th>Harga</th>
                                    <th>Pembiayaan</th>
                                    <th>Status</th>
                                    <th width="10%"><i class="fas fa-cog"></i></th>
                                 </tr>
                              </thead>
                              <tbody>
                                @foreach ($pilihanPenunjang as $pnj)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pnj->penunjang->nama }}</td>
                                        <td>{{ $pnj->hasil_penunjang ?? 'belum diinput hasil' }}</td>
                                        <td>Rp {{ $pnj->penunjang->harga }}</td>
                                        <td>{{ $pnj->penunjang->pembiayaann->nama }}</td>
                                        <td>
                                            @if ($pnj->penunjang->status == 1)
                                                <span class="badge badge-success me-auto">Tersedia</span>
                                            @elseif ($pnj->penunjang->status == 2)
                                                <span class="badge badge-danger me-auto">Habis</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#pempenunModal" data-toggle="modal"><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                                            <a href="{{ url("admin/pengajuan-penunjang/delete", ['id' => $pnj->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $pnj->id }}').submit();"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                            <form id="delete-form-{{ $pnj->id }}" action="{{ url("admin/pengajuan-penunjang/delete", ['id' => $pnj->id]) }}" method="POST" style="display: none;">@csrf</form>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals-and-toasts')
    <!-- Modal -->
    <div class="modal fade" id="pempenunModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Tambah Hasil Pengajuan Penunjang</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-header">
                                <h6>Informasi Pasien</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation" action="{{ url("admin/pengajuan-penunjang")}}/{{ $id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Nama</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom01" value="{{ $pasien->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">No Rekam Medis</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom02" value="{{ $pasien->no_index }}" disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">NIK</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom03" value="{{ $pasien->nik }}" disabled>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom07">Nama Penunjang</label>
                                            <div class="input-group">
                                                <select id="select-daftar" class="form-control" name="nama_penunjang[]" multiple="multiple">
                                                    @foreach ($pilihanPenunjang as $pnj)
                                                        <option value="{{ $pnj->idPenunjang }}" selected>{{ $pnj->penunjang->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom08">Hasil</label>
                                            <div class="input-group">
                                                <select id="select-hasil" class="form-control" name="hasil_penunjang[]" multiple="multiple">
                                                    @foreach ($pilihanPenunjang as $pnj)
                                                        <option value="{{ $pnj->hasil_penunjang }}" selected>{{ $pnj->hasil_penunjang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom08">Harga</label>
                                            <div class="input-group">
                                                <select id="select-harga" class="form-control" multiple="multiple" disabled>
                                                    @foreach ($pilihanPenunjang as $pnj)
                                                        <option value="{{ $pnj->idPenunjang }}" selected>{{ $pnj->penunjang->harga }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="validationCustom08">Tercover Asuransi</label>
                                            <select id="select-pembiayaan" class="form-control" multiple="multiple" disabled>
                                                @foreach ($pilihanPenunjang as $pnj)
                                                    <option value="{{ $pnj->idPenunjang }}" selected>{{ $pnj->penunjang->pembiayaann->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="col-form-label pt-0">Upload Pengajuan Penunjang</label>
                                        <input class="form-control" type="file" id="photo" name="photo" multiple>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="pempenunModalTambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Tambah Pengajuan Penunjang</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-header">
                                <h6>Informasi Pasien</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation" action="{{ url("admin/pengajuan-penunjang")}}/{{ $id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Nama</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom01" value="{{ $pasien->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">No Rekam Medis</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom02" value="{{ $pasien->no_index }}" disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">NIK</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom03" value="{{ $pasien->nik }}" disabled>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom07">Nama Penunjang</label>
                                            <div class="input-group">
                                                <select id="select-daftar1" class="form-control" name="nama_penunjang1[]" multiple="multiple">
                                                    @foreach ($pilihanPenunjang as $pnj)
                                                        <option value="{{ $pnj->idPenunjang }}" selected>{{ $pnj->penunjang->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom08">Hasil</label>
                                            <div class="input-group">
                                                <select id="select-hasil1" class="form-control" name="hasil_penunjang[]" multiple="multiple">
                                                    @foreach ($pilihanPenunjang as $pnj)
                                                        <option value="{{ $pnj->hasil_penunjang }}" selected>{{ $pnj->hasil_penunjang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endpush

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
        $(function() {
            $('#select-daftar').select2({
                tags: true,
            });
            $('#select-hasil').select2({
                tags: true,
            });
            $('#select-daftar1').select2({
                tags: true,
            });
            $('#select-hasil1').select2({
                tags: true,
            });
            $('#select-satuan').select2({
                tags: true,
            });
            $('#select-batasBawah').select2({
                tags: true,
            });
            $('#select-batasAtas').select2({
                tags: true,
            });
            $('#select-harga').select2({
                tags: true,
            });
            $('#select-pembiayaan').select2({
                tags: true,
            });
            $('#select-pekerjaan').select2({
                tags: true,
            });
        });
        </script>
@endsection