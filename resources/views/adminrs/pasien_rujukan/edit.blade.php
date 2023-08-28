@extends($adminRs)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
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
        {{-- otomatis masuk ke adminRs/daerah , karena pake resource --}}
        <form action="{{ url("adminRs/rujukan")}}/{{ $id }}" method="POST">
        {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
        @csrf 
        @method('PUT')
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Detail Pasien Rujukan</h5>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <a href="{{ url('adminRs/rujukan') }}" class="btn btn-sm btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table text-justify">
                                <tbody>
                                    <tr>
                                        <td class="text-sm-end">Nama Pasien</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pasien->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">No Rekam Medis</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pasien->no_index }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Diagnosa</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pasien->assesment ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Rujukan</td>
                                        <td>:</td>
                                        @if ($pasien->idTinLan == 1)
                                            <td class="text-sm-start">Rawat Jalan</td> 
                                        @elseif ($pasien->idTinLan == 2)
                                            <td class="text-sm-start">Alih Rawat Inap</td>
                                        @elseif ($pasien->idTinLan == 3)
                                            <td class="text-sm-start">Rujuk Poli SP</td>
                                        @elseif ($pasien->idTinLan == 4)
                                            <td class="text-sm-start">Rujuk IGD RS</td>
                                        @elseif ($pasien->idTinLan == 5)
                                            <td class="text-sm-start">Meninggal</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Data Pasien</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $pasien->id }}">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">Tanggal</label>
                                <input name="tanggal" id="tanggal" class="form-control form-control-lg" type="date" value="{{ $pasien->tanggal }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="nama">Nama Pasien</label>
                                <input name="nama" id="nama" class="form-control form-control-lg" type="text" value="{{ $pasien->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">No Rekam Medis</label>
                                <input name="no_index" id="no_index" class="form-control form-control-lg" type="text" value="{{ $pasien->no_index }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">NIK</label>
                                <input name="nik" id="nik" class="form-control form-control-lg" type="text" value="{{ $pasien->nik }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">No JKN</label>
                                <input name="no_ks" id="no_ks" class="form-control form-control-lg" type="text" value="{{ $pasien->no_ks }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">No KK</label>
                                <input name="no_kk" id="no_kk" class="form-control form-control-lg" type="text" value="{{ $pasien->no_kk }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">Nama KK</label>
                                <input name="nama_kk" id="nama_kk" class="form-control form-control-lg" type="text" value="{{ $pasien->nama_kk }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">No HP</label>
                                <input name="no_hp" id="no_hp" class="form-control form-control-lg" type="text" value="{{ $pasien->no_hp }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">Tanggal Lahir</label>
                                <input name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-lg" type="text" value="{{ $pasien->tanggal_lahir }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Jenis Kelamin</div>
                                <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-lg" type="text" value="{{ $pasien->jenisKelamin->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Golongan Darah</div>
                                <input name="idMGoldar" id="idMGoldar" class="form-control form-control-lg" type="text" value="{{ $pasien->goldar->nama }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Pendidikan</div>
                                <input name="idMPendidikan" id="idMPendidikan" class="form-control form-control-lg" type="text" value="{{ $pasien->pendidikan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Pekerjaan</div>
                                <select id="select-pekerjaan" class="form-control" name="pekerjaan1[]" multiple="multiple" disabled>
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
                                <input name="idMProvinsi" id="idMProvinsi" class="form-control form-control-lg" type="text" value="{{ $pasien->provinsi->nama }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-sm-3 col-form-label">Daerah</label>
                                <input name="idMDaerah" id="idMDaerah" class="form-control form-control-lg" type="text" value="{{ $pasien->daerah->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                <input name="idMKecamatan" id="idMKecamatan" class="form-control form-control-lg" type="text" value="{{ $pasien->kecamatan->nama }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-sm-3 col-form-label">Desa</label>
                                <input name="idMDesa" id="idMDesa" class="form-control form-control-lg" type="text" value="{{ $pasien->desa->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label class="col-form-label" for="nama">RT</label>
                                <input name="rt" id="rt" class="form-control" type="text" placeholder="RT" value="{{ $pasien->rt }}" disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="col-form-label" for="nama">RW</label>
                                <input name="rw" id="rw" class="form-control" type="text" placeholder="RW" value="{{ $pasien->rw }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleTextarea1">Alamat</label>
                                <textarea class="form-control" name="alamat" id="exampleTextarea1" rows="4" disabled>{{ $pasien->alamat }}</textarea>
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
                                <select id="select-jenis" class="form-control Select2 form-control-lg" id="exampleFormControlSelect1"  name="idMPerawatan" required>
                                    <option value="">Pilih Perawatan</option>
                                    @foreach ($perawatan as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Unit Pelayanan</div>
                                <input name="idMUnitPelayanan" id="idMUnitPelayanan" class="form-control form-control-lg" type="text" value="{{ $pasien->unitPelayanan->nama }}" disabled>
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
                                    <select id="select-bed" class="form-control Select2" name="idBed" aria-label="Default select example" required>
                                        <option value="">Pilih Kamar Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Mitra</div>
                                <input name="idFaskes" id="idFaskes" class="form-control form-control-lg" type="text" value="{{ $pasien->faskes->nama }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Cabang Mitra</div>
                                <input name="idLokasiPemeriksaan" id="idLokasiPemeriksaan" class="form-control form-control-lg" type="text" value="{{ $pasien->lokasiPemeriksaan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Kunjungan Sakit</div>
                                <input name="idMKunjunganSakit" id="idMKunjunganSakit" class="form-control form-control-lg" type="text" value="{{ $pasien->kunjunganSakit->nama }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Jenis Pasien</div>
                                <input name="idMJenisPas" id="idMJenisPas" class="form-control form-control-lg" type="text" value="{{ $pasien->jenisPasien->nama }}" disabled>
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
            let idFaskes = "{{ session()->get('idFaskes') }}";
            $('#tabel-jquery').hide();

            $.getJSON(baseUrl+'/api/getLokasi/'+idFaskes, (result) => {
                if (result.error_code == '0') {
                    let opt = '<option value="">- Pilih Cabang Mitra -</option>';
                    // var dataSem = result.data;
                    // dataSem.sort(function(a, b){
                    //     return a.id_semester - b.id_semester;
                    // });
                    $.each(result.data, function(i, item) {
                        opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                    });
                    $("#select-cabang").html(opt);
                }else{
                    let opt = '<option value="">- Tidak Bisa -</option>';
                    $("#select-cabang").html(opt);
                }
                $("#select-cabang").select2({
                    placeholder: "Pilih Cabang Mitra",
                });
            });

        });
    </script>
@endsection
