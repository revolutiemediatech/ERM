@extends( $admin )

@section('css-library')
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
                    <div class="col-lg-6 d-flex justify-content-end">
                        <div class="btn-group">
                            <a href="{{ url("$url/create", []) }}" type="button" class="btn btn-lg btn-primary">
                                <i class="fas fa-plus-square"></i> <b>Ganti PJ</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table text-center">
                    <tbody>
                        @if ($users == null)
                            <tr>
                                <td colspan="3" class="text-center">Penanggung Jawab E-Perkesmas Belum di Set</td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-sm-end"><b>Nama Penanggung Jawab</b></td>
                                    <td>:</td>
                                    <td class="text-sm-start"><b>{{ $user->prefix ?? '' }} {{ $user->nama }}, {{ $user->suffix ?? '' }}</b></td>
                                </tr>
            
                                <tr>
                                    <td class="text-sm-end">No HP Penanggung Jawab</td>
                                    <td>:</td>
                                    <td class="text-sm-start">{{ $user->no_hp ?? '' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- pj per topik --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Penanggung Jawab Topik</h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <div class="btn-group">
                            <a href="{{ url("$url/create", []) }}" type="button" class="btn btn-lg btn-primary">
                                <i class="fas fa-plus-square"></i> <b>Ganti PJ</b>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <table id="basic-1" class="table table-striped thead-primary w-100">
                    <thead>
                        <tr>
                            <th width="50">No.</th>
                            <th>Nama Mitra</th>
                            <th>Nama Topik</th>
                            <th>Penanggung Jawab</th>
                            <th>Status</th>
                            <th width="10%"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topik as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->faskes->nama }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->penanggungjawab->nama ?? 'Penanggung Jawab Belum di Set' }}</td>
                                <td>
                                    @if ($p->status == 1)
                                        <span class="badge badge-success me-auto">Aktif</span>  
                                    @elseif ($p->status == 2)
                                    <span class="badge badge-danger me-auto">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/pj-topik-ePerkesmas/' . $p->id, []) }}/edit"><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                                    {{-- <a href="{{ url("$url/", ['id' => $p->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                    <form id="delete-form-{{ $p->id }}" action="{{ url("$url/", ['id' => $p->id]) }}" method="POST" style="display: none;">@csrf</form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
@endsection