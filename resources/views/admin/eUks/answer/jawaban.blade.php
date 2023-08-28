@extends($admin)

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
                        <h5 class="card-title">{{ $page }}</h5>
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
                                <td class="text-sm-end"><b>Nama Lengkap</b></td>
                                <td>:</td>
                                <td class="text-sm-start"><b>{{ $answerUser->nama }}</b></td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Tanggal Lahir</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $answerUser->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Asal Sekolah</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $answerUser->sekolah->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kelas</td>
                                <td>:</td>
                                <td class="text-sm-start">
                                    @if ($answerUser->idKelas == 1)
                                        1 SD
                                    @elseif ($answerUser->idKelas == 2)
                                        2 SD
                                    @elseif ($answerUser->idKelas == 3)
                                        3 SD
                                    @elseif ($answerUser->idKelas == 4)
                                        4 SD
                                    @elseif ($answerUser->idKelas == 5)
                                        5 SD
                                    @elseif ($answerUser->idKelas == 6)
                                        6 SD
                                    @elseif ($answerUser->idKelas == 7)
                                        1 SMP
                                    @elseif ($answerUser->idKelas == 8)
                                        2 SMP
                                    @elseif ($answerUser->idKelas == 9)
                                        3 SMP
                                    @elseif ($answerUser->idKelas == 10)
                                        1 SMA
                                    @elseif ($answerUser->idKelas == 11)
                                        2 SMA
                                    @elseif ($answerUser->idKelas == 12)
                                        3 SMA
                                    @endif
                                </td>
                            </tr>
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
                        <h5 class="card-title">Jawaban <b>Kuesioner {{ $answerUser->kategori->nama }}</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($answering as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->nama_pertanyaan }}</td>
                                    <td>{{ $a->nama_jawaban }}</td>
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
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Kesehatan Intelegensia (Modalitas Belajar)</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('admin.eUks.answer.jawaban_kki')
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
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Kesehatan Intelegensia (Dominasi Otak)</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('admin.eUks.answer.jawaban_kki_do')
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
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Kesehatan</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Golongan Darah</td>
                                <td>{{ $answerUser->goldar->nama }} {{ $answerUser->rhesus->nama ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jenis Disabilitas</td>
                                <td>{{ $answerUser->jenDis ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Riwayat Imunisasi Dasar</td>
                                <td>{{ $answerUser->riwImDas ?? '-' }}</td>
                            </tr>
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
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Perilaku Beresiko</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Apakah kamu sarapan?</td>
                                <td>{{ $answerUser->apKamSar ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Apakah kamu jajan di sekolah?</td>
                                <td>{{ $answerUser->apKamJajSek ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Apakah orangtua / keluarga ada yang Merokok?</td>
                                <td>{{ $answerUser->apOrtuMer ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Apakah Kamu Pernah Merokok?</td>
                                <td>{{ $answerUser->apKamMer ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Apakah orangtua / keluarga ada yang Minum Alkohol?</td>
                                <td>{{ $answerUser->apOrAl ?? '-' }}</td>
                            </tr>
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
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Kesehatan Reproduksi</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Apakah kamu memiliki hal dibawah ini?</td>
                                <td>{{ $answerUser->kesRep ?? '-' }}</td>
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