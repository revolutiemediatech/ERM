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
    {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
    <form action="{{ url("admin/pasienn")}}/{{ $id }}" method="post">
    @csrf
    @method('PUT')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Data Pasien</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('admin/pasienn') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $pasien->id }}">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="username">Tanggal</label>
                        <input name="tanggal" id="tanggal" class="form-control form-control-lg" type="date" value="{{ $pasien->tanggal }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="nama">Nama Pasien</label>
                        <input name="nama" id="nama" class="form-control form-control-lg" type="text" value="{{ $pasien->nama }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="username">No Rekam Medis</label>
                        <input name="no_index" id="no_index" class="form-control form-control-lg" type="text" value="{{ $pasien->no_index }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="username">NIK</label>
                        <input name="nik" id="nik" class="form-control form-control-lg" type="text" value="{{ $pasien->nik }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="username">No JKN</label>
                        <input name="no_ks" id="no_ks" class="form-control form-control-lg" type="text" value="{{ $pasien->no_ks }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="username">No KK</label>
                        <input name="no_kk" id="no_kk" class="form-control form-control-lg" type="text" value="{{ $pasien->no_kk }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="username">Nama KK</label>
                        <input name="nama_kk" id="nama_kk" class="form-control form-control-lg" type="text" value="{{ $pasien->nama_kk }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="username">No HP</label>
                        <input name="no_hp" id="no_hp" class="form-control form-control-lg" type="text" value="{{ $pasien->no_hp }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="col-form-label" for="username">Tanggal Lahir</label>
                        <input name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-lg" type="text" value="{{ $pasien->tanggal_lahir }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="col-form-label">Status Keluarga</div>
                        <select class="form-control form-control-lg Select2" id="select2" name="status_keluarga">
                            @if ($pasien->status_keluarga ==  1)
                                <option value="{{ $pasien->status_keluarga }}" selected>Kepala Keluarga</option>
                            @elseif ($pasien->status_keluarga ==  2)
                                <option value="{{ $pasien->status_keluarga }}" selected>Ibu</option>
                            @elseif ($pasien->status_keluarga ==  3)
                                <option value="{{ $pasien->status_keluarga }}" selected>Anak</option>
                            @endif
                            <option value="">Pilih Status Keluarga</option>
                            <option value="1">Kepala Keluarga</option>
                            <option value="2">Ibu</option>
                            <option value="3">Anak</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="col-form-label">Jenis Kelamin</div>
                        <select class="form-control form-control-lg Select2" id="select2" name="idMJenisKel">
                            <option value="{{ $pasien->jenisKelamin->id }}" selected>{{ $pasien->jenisKelamin->nama }}</option>
                            <option value="">Pilih Jenis Kelamin</option>
                            @foreach ($jenisKelamin as $jk)
                                <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="col-form-label">Golongan Darah</div>
                        <select class="form-control form-control-lg Select2" id="select2" name="idMGoldar">
                            <option value="{{ $pasien->goldar->id }}" selected>{{ $pasien->goldar->nama }}</option>
                            <option value="">Pilih Golongan Darah</option>
                            @foreach ($golonganDarah as $gd)
                                <option value="{{ $gd->id }}">{{ $gd->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="col-form-label">Pendidikan</div>
                        <select class="form-control form-control-lg Select2" id="select2" name="idMPendidikan">
                            <option value="{{ $pasien->pendidikan->id }}" selected>{{ $pasien->pendidikan->nama }}</option>
                            <option value="">Pilih Pendidikan</option>
                            @foreach ($pendidikan as $pd)
                                <option value="{{ $pd->id }}">{{ $pd->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="col-form-label">Pekerjaan</div>
                        <select id="select-pekerjaan" class="form-control" name="pekerjaan1[]" multiple="multiple">
                            @foreach ($pilihanPekerjaan as $pk)
                                <option value="{{ $pk->nama }}" selected>{{ $pk->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Data Alamat</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="col-sm-3 col-form-label">Provinsi</label>
                        <select id="select-provinsi" class="form-control Select2" name="idMProvinsi" aria-label="Default select example">
                            <option value="{{$pasien->idMProvinsi}}">{{$pasien->provinsi->nama}}</option>
                            <option value="">Pilihan Provinsi Sedang di Proses</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="col-sm-3 col-form-label">Daerah</label>
                        <select id="select-daerah" class="form-control Select2" name="idMDaerah" aria-label="Default select example">
                            <option value="{{$pasien->idMDaerah}}">{{$pasien->daerah->nama}}</option>
                            <option value="">Pilih Provinsi Terlebih Dahulu</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="col-sm-3 col-form-label">Kecamatan</label>
                        <select id="select-kecamatan" class="form-control Select2" name="idMKecamatan" aria-label="Default select example">
                            <option value="{{$pasien->idMKecamatan}}">{{$pasien->kecamatan->nama}}</option>
                            <option value="">Pilih Daerah Terlebih Dahulu</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="col-sm-3 col-form-label">Desa</label>
                        <select id="select-desa" class="form-control Select2 form-control-lg" name="idMDesa" aria-label="Default select example" required>
                            <option value="{{$pasien->idMDesa}}">{{$pasien->desa->nama}}</option>
                            <option value="">Pilih Kecamatan Terlebih Dahulu</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label class="col-form-label" for="nama">RT</label>
                        <input name="rt" id="rt" class="form-control" type="text" placeholder="RT" value="{{ $pasien->rt }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="col-form-label" for="nama">RW</label>
                        <input name="rw" id="rw" class="form-control" type="text" placeholder="RW" value="{{ $pasien->rw }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleTextarea1">Alamat</label>
                        <textarea class="form-control" name="alamat" id="exampleTextarea1" rows="4">{{ $pasien->alamat }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Simpan">
            <input type="reset" class="btn btn-secondary" value="Cancel">
        </div>
        </div>
    </div>
    </form>
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
    <script>
        $(function() {
            $("#isi-tabel").DataTable(); // tambahin ini ki

            let baseUrl     = '{{ url('') }}';
            $('#tabel-jquery').hide();

            $.getJSON(baseUrl+'/api/getAllProvinsi', (result) => {
                if (result.error_code == '0') {
                    let opt = '<option value="{{ $pasien->idMProvinsi }}">{{ $pasien->provinsi->nama }}</option>';
                    $.each(result.data, function(i, item) {
                        opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                    });
                    $("#select-provinsi").html(opt);
                }else{
                    let opt = '<option value="">- Tidak Bisa -</option>';
                    $("#select-provinsi").html(opt);
                }
                $("#select-provinsi").select2({
                    placeholder: "Pilih Provinsi",
                });
            });

            $('#select-provinsi').on('change', function() {
                var val1 = this.value;
                $.getJSON(baseUrl+'/api/getDaerah/'+val1, (result) => {
                    if (result.error_code == '0') {
                        let opt = '<option value="">- Pilih Daerah -</option>';
                        // var dataSem = result.data;
                        // dataSem.sort(function(a, b){
                        //     return a.id_semester - b.id_semester;
                        // });
                        $.each(result.data, function(i, item) {
                            opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                        });
                        $("#select-daerah").html(opt);
                    }else{
                        let opt = '<option value="">- Tidak Bisa -</option>';
                        $("#select-daerah").html(opt);
                    }
                    $("#select-daerah").select2({
                        placeholder: "Pilih Daerah",
                    });
                });
            });

            $('#select-daerah').on('change', function() {
                var val1 = this.value;
                $.getJSON(baseUrl+'/api/getKecamatan/'+val1, (result) => {
                    if (result.error_code == '0') {
                        let opt = '<option value="">- Pilih Kecamatan -</option>';
                        // var dataSem = result.data;
                        // dataSem.sort(function(a, b){
                        //     return a.id_semester - b.id_semester;
                        // });
                        $.each(result.data, function(i, item) {
                            opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                        });
                        $("#select-kecamatan").html(opt);
                    }else{
                        let opt = '<option value="">- Tidak Bisa -</option>';
                        $("#select-kecamatan").html(opt);
                    }
                    $("#select-kecamatan").select2({
                        placeholder: "Pilih Kecamatan",
                    });
                });
            });

            $('#select-kecamatan').on('change', function() {
                var val1 = this.value;
                $.getJSON(baseUrl+'/api/getDesa/'+val1, (result) => {
                    if (result.error_code == '0') {
                        let opt = '<option value="">- Pilih Desa -</option>';
                        // var dataSem = result.data;
                        // dataSem.sort(function(a, b){
                        //     return a.id_semester - b.id_semester;
                        // });
                        $.each(result.data, function(i, item) {
                            opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                        });
                        $("#select-desa").html(opt);
                    }else{
                        let opt = '<option value="">- Tidak Bisa -</option>';
                        $("#select-desa").html(opt);
                    }
                    $("#select-desa").select2({
                        placeholder: "Pilih Desa",
                    });
                });
            });
        });
    </script>
@endsection