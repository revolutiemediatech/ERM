@extends($perawat)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    {{-- Tempat Ngoding isi web --}}
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- Alerts-->
        @if (session()->has('sukses'))
        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('gagal'))
        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
            {{ session('gagal') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- End of Alerts-->
        <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">{{ $page }}</h5>
                </div>
                <div class="col-lg-6 fle d-flex justify-content-end">
                    <a href="{{ url('perawat/kia') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke perawat/kia , karena pake resource --}}
            <form action="{{ url("perawat/kia")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="idMPasien" value="{{ $pasien->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama Pasien</label>
                            <input name="idMPasien" id="idMPasien" class="form-control" type="text" value="{{ $pasien->nama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">No Identitas</label>
                            <input name="nik" id="nik" class="form-control" type="text" value="{{ $pasien->nik }}" disabled>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Mitra</div>
                            <select id="select-mitra" class="form-control Select2" name="idFaskes" aria-label="Default select example">
                            <option value="{{$pasien->idFaskes}}">{{$pasien->faskes->nama}}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Cabang Mitra</div>
                            <select id="select-lokasi" class="form-control Select2" name="idLokasiPemeriksaan" aria-label="Default select example">
                            <option value="{{$pasien->idLokasiPemeriksaan}}">{{$pasien->lokasiPemeriksaan->nama}}</option>
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama Obat</label>
                            <select id="select-role" class="form-control" name="idMObat" required>
                                <option value="">Pilih Obat</option>
                                @foreach ($obat as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Subjective</label>
                            {{-- <input name="penyakit" id="penyakit" class="form-control" type="text" > --}}
                            <textarea class="form-control" name="subjective" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Objective</label>
                            {{-- <input name="penyakit" id="penyakit" class="form-control" type="text" > --}}
                            <textarea class="form-control" name="objective" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="penyakit">Assesment</label>
                            {{-- <input name="penyakit" id="penyakit" class="form-control" type="text" > --}}
                            <textarea class="form-control" name="assesment" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Tindakan Lanjutan</div>
                            <ul class="ms-list d-flex">
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input type="radio" name="idTinLanjutan" value="1" required>
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> Tidak Ada </span>
                                </li>
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input type="radio" name="idTinLanjutan" value="2" required>
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> Rawat Inap </span>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Pemeriksaan Penunjang</div>
                            <ul class="ms-list d-flex">
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input type="radio" name="idPemPenunjang" value="1" required>
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> Tidak Ada </span>
                                </li>
                                <li class="ms-list-item pl-0">
                                    <label class="ms-checkbox-wrap">
                                    <input type="radio" name="idPemPenunjang" value="2" required>
                                    <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span> Labor </span>
                                </li>
                            </ul>
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
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}

    <script>
        $(function() {
            let baseUrl     = '{{ url('') }}';
            $('#tabel-jquery').hide();

            $.getJSON(baseUrl+'/api/getAllMitra', (result) => {
                if (result.error_code == '0') {
                    let opt = '<option value="{{$pasien->idFaskes}}">{{$pasien->faskes->nama}}</option>';
                    $.each(result.data, function(i, item) {
                        opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                    });
                    $("#select-mitra").html(opt);
                }else{
                    let opt = '<option value="">- Tidak Bisa -</option>';
                    $("#select-mitra").html(opt);
                }
                $("#select-mitra").select2({
                    placeholder: "Pilih Mitra",
                });
            });

            $('#select-mitra').on('change', function() {
                var val1 = this.value;
                $.getJSON(baseUrl+'/api/getLokasi/'+val1, (result) => {
                    if (result.error_code == '0') {
                        let opt = '<option value="{{$pasien->idLokasiPemeriksaan}}">{{$pasien->lokasiPemeriksaan->nama}}</option>';
                        // var dataSem = result.data;
                        // dataSem.sort(function(a, b){
                        //     return a.id_semester - b.id_semester;
                        // });
                        $.each(result.data, function(i, item) {
                            opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                        });
                        $("#select-lokasi").html(opt);
                    }else{
                        let opt = '<option value="">- Tidak Bisa -</option>';
                        $("#select-lokasi").html(opt);
                    }
                    $("#select-lokasi").select2({
                        placeholder: "Pilih Cabang Mitra",
                    });
                });
            });

        });
    </script>
@endsection