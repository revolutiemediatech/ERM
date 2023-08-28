@extends( $adminRs )

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
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-striped thead-primary w-100">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Tanggal</th>
                                <th>NIK</th>
                                <th>No KK</th>
                                <th>Nama</th>
                                <th>Cabang Mitra</th>
                                <th width="15%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->tanggal }}</td>
                                    <td>{{ $p->nik }}</td>
                                    <td>{{ $p->no_kk }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->lokasiPemeriksaan->nama ?? '-' }}</td>
                                    <td>
                                        <a href='{{ url("$url")}}/{{ $p->id }}'><i class='fas fa-eye ms-text-primary'></i></a>
                                        {{-- <a href='{{ url("$url/" . $p->id, []) }}/edit'><i class='fas fa-pencil-alt ms-text-primary'></i></a> --}}
                                        {{-- <a href="{{ route('pasien.destroy', ['id' => $p->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                        <form id="delete-form-{{ $p->id }}" action="{{ route('pasien.destroy', ['id' => $p->id]) }}" method="POST" style="display: none;">@csrf</form> --}}
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