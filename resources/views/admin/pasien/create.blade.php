@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/select2.css') }}">
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <form action="{{ url('admin/pasienn') }}" method="POST">
    {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
    @csrf 
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title">Data Pasien</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Pasien Terdaftar</div>
                            <select class="form-control Select2 form-control-lg" id="pasiennn" name="idMPendidikan">
                                <option value="">Pilih Pasien</option>
                                @foreach ($pasienn as $ps)
                                    <option value="{{ $ps->id }}" data-nokk="{{ $ps->no_kk }}" data-nama="{{ $ps->nama }}" data-jenisKel="{{ $ps->jenisKel }}" data-statusKel="{{ $ps->idStatusKel }}" data-noindex="{{ $ps->no_index }}" data-nik="{{ $ps->nik }}" data-noks="{{ $ps->no_ks }}" data-namakk="{{ $ps->nama_kk }}" data-nohp="{{ $ps->no_hp }}" data-tanggallahir="{{ $ps->tanggal_lahir }}" data-alamat="{{ $ps->alamat }}" data-rt="{{ $ps->rt }}" data-rw="{{ $ps->rw }}">
                                        {{ $ps->no_kk }} - {{ $ps->nama }} - {{ $ps->faskes->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label" for="username">No KK</label>
                            <input name="no_kk" id="no_kk" class="form-control form-control-lg" type="text" placeholder="No KK">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label" for="username">Tanggal</label>
                            <input name="tanggal" id="tanggal" class="form-control form-control-lg" type="date" placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label" for="nama">Nama Pasien</label>
                            <input name="nama" id="nama" class="form-control form-control-lg" type="text" placeholder="Nama Pasien">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label" for="username">No Rekam Medis</label>
                            <input name="no_index" id="no_index" class="form-control form-control-lg" type="text" placeholder="No Rekam Medis">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input type="button" class="btn btn-primary form-control-lg" value="Generate New">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label" for="username">NIK</label>
                            <input name="nik" id="nik" class="form-control form-control-lg" type="text" placeholder="NIK">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input type="button" class="btn btn-primary form-control-lg" value="Verifikasi BPJS">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label pt-0" for="username">No JKN</label>
                            <input name="no_ks" id="no_ks" class="form-control form-control-lg" type="text" placeholder="No JKN">
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="button" class="btn btn-primary form-control-lg" value="Verifikasi BPJS">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label pt-0" for="username">Nama KK</label>
                            <input name="nama_kk" id="nama_kk" class="form-control form-control-lg" type="text" placeholder="Nama KK">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label" for="username">No HP</label>
                            <input name="no_hp" id="no_hp" class="form-control form-control-lg" type="text" placeholder="No HP">
                        </div>
                        <div class="col-md-6 mb-3">
                            <br>
                            <label class="col-form-label pt-0" for="exampleInputEmail1">Aktif</label><br>
                            <input id="hp_aktif" name="hp_aktif" type="checkbox" value="1" style="height: 20px; width: 20px;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label" for="username">Tanggal Lahir</label>
                            <input name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-lg" type="date" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Status Keluarga</div>
                            <select class="form-control Select2 form-control-lg" id="exampleFormControlSelect1"  name="idMPendidikan" required>
                                <option value="">Pilih Status Keluarga</option>
                                @foreach ($status_keluarga as $sdk)
                                    <option value="{{ $sdk->id }}">{{ $sdk->kode }} - {{ $sdk->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Jenis Kelamin</div>
                            <ul class="ms-list d-flex">
                                @foreach ($jenisKelamin as $jk)
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="radio" name="idMJenisKel" value="{{ $jk->id }}" required>
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> {{ $jk->nama }} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Golongan Darah</div>
                            <ul class="ms-list d-flex">
                                @foreach ($golonganDarah as $gd)
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="checkbox" name="idMGoldar" value="{{ $gd->id }}">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> {{ $gd->nama }} </span>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="ms-list d-flex">
                                @foreach ($rhesus as $r)
                                    <li class="ms-list-item pl-0">
                                        <label class="ms-checkbox-wrap">
                                        <input type="checkbox" name="idRhesus" value="{{ $r->id }}">
                                        <i class="ms-checkbox-check"></i>
                                        </label>
                                        <span> {{ $r->nama }} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Pendidikan</div>
                            <select class="form-control Select2 form-control-lg" id="exampleFormControlSelect1"  name="idMPendidikan" required>
                                <option value="">Pilih Pendidikan</option>
                                @foreach ($pendidikan as $pd)
                                    <option value="{{ $pd->id }}">{{ $pd->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Pekerjaan</div>
                            <select id="select-pekerjaan" class="form-control" name="pekerjaan1[]" multiple="multiple">
                                
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
                            <select id="select-provinsi" class="form-control Select2 form-control-lg" name="idMProvinsi" aria-label="Default select example">
                                <option value="">Pilihan Provinsi Sedang di Proses</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-sm-3 col-form-label">Daerah</label>
                            <select id="select-daerah" class="form-control Select2 form-control-lg" name="idMDaerah" aria-label="Default select example" required>
                                <option value="">Pilih Provinsi Terlebih Dahulu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <select id="select-kecamatan" class="form-control Select2 form-control-lg" name="idMKecamatan" aria-label="Default select example" required>
                                <option value="">Pilih Daerah Terlebih Dahulu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="col-sm-3 col-form-label">Desa</label>
                            <select id="select-desa" class="form-control Select2 form-control-lg" name="idMDesa" aria-label="Default select example" required>
                                <option value="">Pilih Kecamatan Terlebih Dahulu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div id="rt" class="col-md-3 mb-3">
                            <label class="col-form-label" for="nama">RT</label>
                            <input name="rt" id="rtIn" class="form-control form-control-lg @error('rt') is-invalid @enderror" type="text" placeholder="RT" required>
                            @error('rt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="rw" class="col-md-3 mb-3">
                            <label class="col-form-label" for="nama">RW</label>
                            <input name="rw" id="rwIn" class="form-control form-control-lg @error('rw') is-invalid @enderror" type="text" placeholder="RW" required>
                            @error('rw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="4"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <br>
                            <label class="col-form-label pt-0" for="exampleInputEmail1">Aktif</label><br>
                            <input id="alamat_aktif" name="alamat_aktif" type="checkbox" value="1" style="height: 20px; width: 20px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title">Data Kunjungan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Perawatan</div>
                            <select id="select-jenis" class="form-control Select2" id="exampleFormControlSelect1"  name="idMPerawatan" required>
                                <option value="">Pilih Perawatan</option>
                                @foreach ($perawatan as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="type-form">
                        {{-- <div id="type-form-1">
                            <div class="form-group">
                                <label>Jawaban Singkat</label>
                                <input type="text" id="i-jasin" class="form-control" name="namaPilihan1">
                            </div>
                        </div> --}}
                        <div id="type-form-2">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Kamar</div>
                                <select id="select-kamar" class="form-control Select2" name="idKamar" aria-label="Default select example">
                                    <option value="">Pilihan Kamar Sedang di Proses</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Bed</div>
                                <select id="select-bed" class="form-control Select2" name="idBed" aria-label="Default select example">
                                    <option value="">Pilih Kamar Terlebih Dahulu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Unit Pelayanan</div>
                            <select class="form-control Select2" id="exampleFormControlSelect1"  name="idMUnitPelayanan" required>
                                <option value="">Pilih Unit Pelayanan</option>
                                @foreach ($unitPelayanan as $up)
                                    <option value="{{ $up->id }}">{{ $up->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Mitra</div>
                            <select id="select-mitra" class="form-control Select2" name="idFaskes" aria-label="Default select example">
                                <option value="">Pilihan Mitra Sedang di Proses</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Cabang Mitra</div>
                            <select id="select-lokasi" class="form-control Select2" name="idLokasiPemeriksaan" aria-label="Default select example" required>
                                <option value="">Pilih Mitra Terlebih Dahulu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Kunjungan Sakit</div>
                            <select class="form-control Select2" id="exampleFormControlSelect1"  name="idMKunjunganSakit" required>
                                <option value="">Pilih Kunjungan Sakit</option>
                                @foreach ($kunjunganSakit as $ks)
                                    <option value="{{ $ks->id }}">{{ $ks->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="col-form-label">Jenis Pembiayaan</div>
                            <select class="form-control Select2" id="exampleFormControlSelect1"  name="idMJenisPas" required>
                                <option value="">Pilih Jenis Pembiayaan</option>
                                @foreach ($jenisPasien as $jp)
                                    <option value="{{ $jp->id }}">{{ $jp->nama }}</option>
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
        </div>
    </form>
</div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
    <script src="{{ url('assets/js/select2/select2.full.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
    <script>
        $(document).ready(function() {
            $('#hp_aktif').change(function() {
                if ($(this).is(':checked')) {
                    $('#no_hp').prop('readonly', true);
                } else {
                    $('#no_hp').prop('readonly', false);
                }
            });
        });
        $(document).ready(function() {
            $('#alamat_aktif').change(function() {
                if ($(this).is(':checked')) {
                    $('#alamat').prop('readonly', true);
                } else {
                    $('#alamat').prop('readonly', false);
                }
            });
        });
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
                    let opt = '<option value="">- Pilih -</option>';
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
    <script>
        $(function() {
            $('.type-form').hide();
            $('#select-jenis').on('change', function() {
                if (this.value == '' || this.value == null) {
                    $('.type-form').hide();
                }
                
                if (this.value == 1) {
                    $('.type-form').show();
                    $('#type-form-2').hide();
                    // $('#type-form-1').show();
                }
                
                if (this.value == 2) {
                    $('.type-form').show();
                    $('#type-form-1').hide();
                    $('#type-form-2').show();
                }
            });
        
            $('#select-pilihan').select2({
                tags: true,
            });
        });
    </script>
    <script>
        $(function() {
            let baseUrl     = '{{ url('') }}';
            $('#tabel-jquery').hide();

            $.getJSON(baseUrl+'/api/getAllKamar', (result) => {
                if (result.error_code == '0') {
                    let opt = '<option value="">- Pilih -</option>';
                    $.each(result.data, function(i, item) {
                        opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                    });
                    $("#select-kamar").html(opt);
                }else{
                    let opt = '<option value="">- Tidak Bisa -</option>';
                    $("#select-kamar").html(opt);
                }
                $("#select-kamar").select2({
                    placeholder: "Pilih Kamar",
                });
            });

            $('#select-kamar').on('change', function() {
                var val1 = this.value;
                $.getJSON(baseUrl+'/api/getBed/'+val1, (result) => {
                    if (result.error_code == '0') {
                        let opt = '<option value="">- Pilih Bed -</option>';
                        // var dataSem = result.data;
                        // dataSem.sort(function(a, b){
                        //     return a.id_semester - b.id_semester;
                        // });
                        $.each(result.data, function(i, item) {
                            opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                        });
                        $("#select-bed").html(opt);
                    }else{
                        let opt = '<option value="">- Tidak Bisa -</option>';
                        $("#select-bed").html(opt);
                    }
                    $("#select-bed").select2({
                        placeholder: "Pilih Bed",
                    });
                });
            });

        });
    </script>
    <script>
        $(function() {
            let baseUrl     = '{{ url('') }}';
            $('#tabel-jquery').hide();

            $.getJSON(baseUrl+'/api/getAllMitra', (result) => {
                if (result.error_code == '0') {
                    let opt = '<option value="">- Pilih -</option>';
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
                        let opt = '<option value="">- Pilih Cabang Mitra -</option>';
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
    <script>
        $(document).ready(function() {
            // Mendapatkan tanggal hari ini dalam format ISO (yyyy-mm-dd)
            var today = new Date().toISOString().slice(0, 10);
    
            // Set nilai tanggal input menjadi tanggal hari ini
            $('#tanggal').val(today);
        });
    </script>
    <script>
        $(function() {
            let baseUrl = '{{ url('') }}';
            $('#tabel-jquery').hide();

            $('#pasiennn').on('change', function() {
                var selectedOption = $(this).find(':selected');
                var noKK = selectedOption.data('nokk');
                var nama = selectedOption.data('nama');
                var noIndex = selectedOption.data('noindex');
                var nik = selectedOption.data('nik');
                var noKS = selectedOption.data('noks');
                var namaKK = selectedOption.data('namakk');
                var noHP = selectedOption.data('nohp');
                var tanggalLahir = selectedOption.data('tanggallahir');
                var alamat = selectedOption.data('alamat');
                var rt = selectedOption.data('rt');
                var rw = selectedOption.data('rw');
                var statusKel = selectedOption.data('idStatusKel');
                var jenisKel = selectedOption.data('jenisKel');
                var todayy = moment(tanggalLahir).format('YYYY-MM-DD');

                $('#no_kk').val(noKK);
                $('#nama').val(nama);
                $('#no_index').val(noIndex);
                $('#nik').val(nik);
                $('#no_ks').val(noKS);
                $('#nama_kk').val(namaKK);
                $('#no_hp').val(noHP);
                $('#tanggal_lahir').val(todayy);
                $('#alamat').val(alamat);
                $('#rtIn').val(rt);
                $('#rwIn').val(rw);
                $('#statusKel').val(statusKel);
                $('#jenisKel').val(jenisKel);
            });
        });
    </script>
    {{-- <script>
        $(function() {
            let baseUrl     = '{{ url('') }}';
            $('#tabel-jquery').hide();

            $('#no_kk').on('change', function() {
                var no_kk = this.value;
                $.getJSON(baseUrl+'/api/getDataPasSA/'+no_kk, (result) => {
                    if (result.error_code == '0') {
                        $('#nama').val(result.data.nama);
                        $('#no_index').val(result.data.no_index);
                        $('#nik').val(result.data.nik);
                        $('#no_ks').val(result.data.no_ks);
                        $('#nama_kk').val(result.data.nama_kk);
                        $('#no_hp').val(result.data.no_hp);
                        $('#tanggal_lahir').val(result.data.tanggal_lahir);
                        $('#alamat').val(result.data.alamat);
                        $('#rtIn').val(result.data.rt);
                        $('#rwIn').val(result.data.rw);
                    } else {
                        $('#nama').val('');
                        $('#no_index').val('');
                        $('#nik').val('');
                        $('#no_ks').val('');
                        $('#nama_kk').val('');
                        $('#no_hp').val('');
                        $('#tanggal_lahir').val('');
                        $('#alamat').val('');
                        $('#rt').val('');
                        $('#rw').val('');
                    }
                });
            });
        });
    </script> --}}
@endsection
