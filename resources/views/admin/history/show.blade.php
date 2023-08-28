@extends( $admin )

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
                        <a href='{{ url("admin/rawat-jalan/bp-umum") }}/{{ $pasien->id }}/edit' class="btn btn-primary">Kembali</a>                    
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
                    <div class="col-lg-6 fle d-flex justify-content-end">
                        <a href='{{ url("admin/rawat-inap/pasien/") }}/{{ $pasien->id }}/tambah_cppt' class="btn btn-primary"><i class='fas fa-plus-square' title='Tambah CPPT'></i> Buat CPPT</a>                    
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="accordion has-gap ms-accordion-chevron" id="accordionExample2">
                    @foreach ($HPasien as  $p)
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" role="button" data-target="#rapt{{$p->id}}" aria-expanded="true" aria-controls="rapt{{$p->id}}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span> 
                                            @if ($p->idMPerawatan == 1)
                                                <td>RAPT {{ $loop->iteration }} - {{ $p->created_at }}</td>
                                            @elseif ($p->idMPerawatan == 2)
                                                <td>CPPT {{ $loop->iteration - 1 }} - {{ $p->created_at }}</td>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col-lg-6 flex d-flex justify-content-end">
                                        @if ($p->idMPerawatan == 2)
                                            <a href='{{ url("admin/rawat-inap/pasien/" . $p->id, []) }}/edit'><i class='fas fa-pencil-alt ms-text-primary' title='Input CPPT'></i></a>
                                        @endif                    
                                    </div>
                                </div>
                            </div>
                            <div id="rapt{{$p->id}}" class="collapse" data-parent="#accordionExample2">
                                <div class="card-body">
                                    <table id="datatable" class="table text-justify">
                                        <tbody>
                                            <tr>
                                                <td class="text-sm-end">1</td>
                                                <td><b>Subjective</b></td>
                                                <td class="text-sm-start">
                                                    {{ $pasien->keluhan_utama ?? '-' }}, {{ $pasien->riwayat_penyakit_sekarang ?? '-' }},
                                                    @foreach ($penyakitDahulu as $penDa)
                                                        <option value="{{ $penDa->nama }}" selected>{{ $penDa->nama }}</option>,
                                                    @endforeach
                                                    {{ $pasien->riwayat_penggunaan_obat ?? '-' }},
                                                    @foreach ($riwayatAlergi as $riwAl)
                                                        <option value="{{ $riwAl->nama }}" selected>{{ $riwAl->nama }}</option>
                                                    @endforeach
                                                </td>  
                                            </tr>
                                            <tr>
                                                <td class="text-sm-end">2</td>
                                                <td width="30%"><b>Objective</b></td>
                                                <td class="text-sm-start" width="70%">
                                                    {{ $pasien->keadaan_umum ?? '-' }}, E {{ $pasien->eye ?? '-' }} | V {{ $pasien->verbal ?? '-' }} | M {{ $pasien->motorik ?? '-' }}, TD {{ $pasien->td1 ?? '-' }}/{{ $pasien->td1 ?? '-' }} mmHg,
                                                    Suhu {{ $pasien->suhu ?? '-' }} <label for="colFormLabel">&degC</label>, HR {{ $pasien->hr ?? '-' }} <label for="colFormLabel">x/Menit</label>, RR {{ $pasien->rr ?? '-' }} <label for="colFormLabel">x/Menit</label>,
                                                    SpO2 {{ $pasien->spo2 ?? '-' }} <label for="colFormLabel">%</label>, CA {{ $pasien->ca1 ?? '-' }}/{{ $pasien->ca2 ?? '-' }} | SI {{ $pasien->si1 ?? '-' }}/{{ $pasien->si2 ?? '-' }} | RC {{ $pasien->rc1 ?? '-' }}/{{ $pasien->rc2 ?? '-' }},
                                                    SDV {{ $pasien->sdv1 ?? '-' }}/{{ $pasien->sdv2 ?? '-' }} | RH {{ $pasien->rh1 ?? '-' }}/{{ $pasien->rh2 ?? '-' }} | WH {{ $pasien->wh1 ?? '-' }}/{{ $pasien->wh2 ?? '-' }}, BU {{ $pasien->bu1 ?? '-' }}/{{ $pasien->bu2 ?? '-' }} | NT {{ $pasien->nt1 ?? '-' }}/{{ $pasien->nt2 ?? '-' }},
                                                    Akral {{ $pasien->akral ?? '-' }} | Edema {{ $pasien->edema1 ?? '-' }}/{{ $pasien->edema2 ?? '-' }}
                                                </td>  
                                            </tr>
                                            <tr>
                                                <td class="text-sm-end">3</td>
                                                <td><b>Assesment</b></td>
                                                <td class="text-sm-start">
                                                    @foreach ($pilihanAssesment as $pj)
                                                        {{ $pj->icdTen->kode_spf }} - {{ $pj->icdTen->nama }}
                                                    @endforeach
                                                </td>  
                                            </tr>
                                            <tr>
                                                <td class="text-sm-end">4</td>
                                                <td><b>Plan</b></td>
                                                <td class="text-sm-start">
                                                    @foreach ($pilihanTinMed as $ptm)
                                                        {{ $ptm->tindakanMedis->nama }}
                                                    @endforeach
                                                </td>  
                                            </tr>
                                            <tr>
                                                <td class="text-sm-end">5</td>
                                                <td><b>Instruksi Dokter</b></td>
                                                <td class="text-sm-start">{{ $pasien->instruksi_dokter ?? '-' }}</td>  
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
            $('#select-assesment').select2({
                tags: true,
            });
            $('#select-plan').select2({
                tags: true,
            });
        });
    </script>
@endsection