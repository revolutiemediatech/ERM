@extends($dokter)

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
        <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">{{ $page }}</h5>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke dokter/daerah , karena pake resource --}}
            <form action="{{ url("$url/update")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label>Jenis Responden</label>
                        <select id="select-idQUser" class="form-control" name="idQUser">
                            <option value="">Pilih</option>
                            @foreach ($penerima as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $questions->idQUser ? 'selected' : '' }} >{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Tipe Soal</label>
                        <select id="select-idQSTipe" class="form-control" name="" disabled>
                            <option value="">Pilih</option>
                            @foreach ($tipe as $tipes)
                                <option value="{{ $tipes->id }}" {{ $tipes->id == $questions->idQSTipe ? 'selected' : '' }} >{{ $tipes->namaTipe }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input type="text" id="i-pertanyaan" class="form-control" name="pertanyaan" value="{{ $questions->pertanyaan }}" required>
                    </div>

                    <div class="type-form">
                        {{-- <div id="type-form-1">
                            <div class="form-group">
                                <label>Jawaban Singkat</label>
                                <input type="text" id="i-jasin" class="form-control" name="namaPilihan1">
                            </div>
                        </div> --}}
                        <div id="type-form-2">
                            <div class="form-group">
                                <label>Pilihan Jawaban</label>
                                <select id="select-piljaw" class="form-control" name="namaPilihan2[]" multiple="multiple">
                                    @foreach ($pilihanJawaban as $pj)
                                        <option value="{{ $pj->namaPilihan }}" selected>{{ $pj->namaPilihan }}</option>
                                    @endforeach
                                </select>
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
    <script src="{{ url('assets/js/select2/select2.full.min.js') }}"></script>
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
    <script>
        $(function() {
            $('.type-form').hide();
            @if ($questions->idQSTipe == '2')
                $('.type-form').show();
                $('#type-form-2').show();
    
                // Dropdown
                $('#select-piljaw').select2({
                    tags: true,
                }).val([
                    'Ya', 'Tidak'
                ]);
            @endif
    
        });
    </script>
@endsection