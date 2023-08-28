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
                        <h5 class="card-title">Jawaban Pemeriksaan SD</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-striped thead-primary w-100">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Lahir</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas</th>
                                <th width="10%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jawaban_sd as $ap)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ap->nama }}</td>
                                    <td>{{ $ap->tanggal_lahir }}</td>
                                    <td>{{ $ap->sekolah->nama }}</td>
                                    <td>
                                        @if ($ap->idKelas == 1)
                                            1 SD
                                        @elseif ($ap->idKelas == 2)
                                            2 SD
                                        @elseif ($ap->idKelas == 3)
                                            3 SD
                                        @elseif ($ap->idKelas == 4)
                                            4 SD
                                        @elseif ($ap->idKelas == 5)
                                            5 SD
                                        @elseif ($ap->idKelas == 6)
                                            6 SD
                                        @elseif ($ap->idKelas == 7)
                                            1 SMP
                                        @elseif ($ap->idKelas == 8)
                                            2 SMP
                                        @elseif ($ap->idKelas == 9)
                                            3 SMP
                                        @elseif ($ap->idKelas == 10)
                                            1 SMA
                                        @elseif ($ap->idKelas == 11)
                                            2 SMA
                                        @elseif ($ap->idKelas == 12)
                                            3 SMA
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href='{{ url("adminRs/responden/edit/" . $ap->id, []) }}'><i class='fas fa-pencil-alt ms-text-primary'></i></a> --}}
                                        <a href='{{ url("$url/" . $ap->id, []) }}'><i class='fas fa-eye ms-text-primary'></i></a>
                                    </td>
                                </tr>
                            @endforeach
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
                        <h5 class="card-title">Jawaban Pemeriksaan SMP</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="basic-2" class="table table-striped thead-primary w-100">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Lahir</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas</th>
                                <th width="10%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jawaban_smp as $ap1)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ap1->nama }}</td>
                                    <td>{{ $ap1->tanggal_lahir }}</td>
                                    <td>{{ $ap1->sekolah->nama }}</td>
                                    <td>
                                        @if ($ap1->idKelas == 1)
                                            1 SD
                                        @elseif ($ap1->idKelas == 2)
                                            2 SD
                                        @elseif ($ap1->idKelas == 3)
                                            3 SD
                                        @elseif ($ap1->idKelas == 4)
                                            4 SD
                                        @elseif ($ap1->idKelas == 5)
                                            5 SD
                                        @elseif ($ap1->idKelas == 6)
                                            6 SD
                                        @elseif ($ap1->idKelas == 7)
                                            1 SMP
                                        @elseif ($ap1->idKelas == 8)
                                            2 SMP
                                        @elseif ($ap1->idKelas == 9)
                                            3 SMP
                                        @elseif ($ap1->idKelas == 10)
                                            1 SMA
                                        @elseif ($ap1->idKelas == 11)
                                            2 SMA
                                        @elseif ($ap1->idKelas == 12)
                                            3 SMA
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href='{{ url("adminRs/responden/edit/" . $ap->id, []) }}'><i class='fas fa-pencil-alt ms-text-primary'></i></a> --}}
                                        <a href='{{ url("$url/" . $ap1->id, []) }}'><i class='fas fa-eye ms-text-primary'></i></a>
                                    </td>
                                </tr>
                            @endforeach
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
                        <h5 class="card-title">Jawaban Pemeriksaan SMA</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="basic-3" class="table table-striped thead-primary w-100">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Lahir</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas</th>
                                <th width="10%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jawaban_sma as $ap2)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ap2->nama }}</td>
                                    <td>{{ $ap2->tanggal_lahir }}</td>
                                    <td>{{ $ap2->sekolah->nama }}</td>
                                    <td>
                                        @if ($ap2->idKelas == 1)
                                            1 SD
                                        @elseif ($ap2->idKelas == 2)
                                            2 SD
                                        @elseif ($ap2->idKelas == 3)
                                            3 SD
                                        @elseif ($ap2->idKelas == 4)
                                            4 SD
                                        @elseif ($ap2->idKelas == 5)
                                            5 SD
                                        @elseif ($ap2->idKelas == 6)
                                            6 SD
                                        @elseif ($ap2->idKelas == 7)
                                            1 SMP
                                        @elseif ($ap2->idKelas == 8)
                                            2 SMP
                                        @elseif ($ap2->idKelas == 9)
                                            3 SMP
                                        @elseif ($ap2->idKelas == 10)
                                            1 SMA
                                        @elseif ($ap2->idKelas == 11)
                                            2 SMA
                                        @elseif ($ap2->idKelas == 12)
                                            3 SMA
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href='{{ url("adminRs/responden/edit/" . $ap->id, []) }}'><i class='fas fa-pencil-alt ms-text-primary'></i></a> --}}
                                        <a href='{{ url("$url/" . $ap2->id, []) }}'><i class='fas fa-eye ms-text-primary'></i></a>
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