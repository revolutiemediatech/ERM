@extends( 'landing/layout/main' )

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/landing/css/select2.css') }}">
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@endsection

@section('content')
<section class="breadcrumb-area gradient-bg-gray before-none">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading text-left">
                            <h2 class="sec__title">PEMERIKSAAN SISWA</h2>
                            <p class="sec__desc font-weight-regular pb-2">Kuesioner Mengenai Pemeriksaan Siswa {{ $jenis->nama }}</p>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<div class="row justify-content-center pt-4">
    <div class="col-lg-8">
        <form action="{{ url("$url/".$jenis->breadcumb."/store/", []) }}" method="post" class="MultiFile-intercepted">
            @csrf
            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Data Diri</span>
                        <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Nama Lengkap Sesuai KK/KIA (TIDAK DISINGKAT) (JANGAN DI AKHIRI DENGAN SPASI)<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <span class="la la-user form-icon"></span>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Tanggal Lahir<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <span class="la la-user form-icon"></span>
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="tanggal_lahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Jenis Kelamin<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select class="select-contain-select" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">No HP Whatsapp<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <span class="la la-user form-icon"></span>
                                <input type="number" class="form-control" name="no_hp" placeholder="ex : 081123456789" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Provinsi Sekolah<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select id="select-provinsi" class="form-control Select2 form-control-lg" name="idMProvinsi" required>
                                        <option value="">Pilihan Provinsi Sedang di Proses</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Daerah Sekolah<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select id="select-daerah" class="form-control Select2 form-control-lg" name="idMDaerah" required>
                                        <option value="">Pilih Provinsi Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Kecamatan Sekolah<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select id="select-kecamatan" class="form-control Select2 form-control-lg" name="idMKecamatan" required>
                                        <option value="">Pilih Daerah Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Nama Sekolah<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select id="select-sekolah" class="form-control Select2 form-control-lg" name="idSekolah" required>
                                        <option value="">Pilih Kecamatan Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="type-form">
                <div id="type-form-1">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title d-flex align-items-center justify-content-between">
                                <span><i class="la la-briefcase mr-2 text-gray"></i>Kuesioner Siswa {{ $jenis->nama }}</span>
                                <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span>
                            </h3>
                        </div>
                        <div class="form-content contact-form-action row">
                            @foreach ($pertanyaan as $r)
                                <div class="col-lg-12 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text font-weight-bold">{{ $r->pertanyaan }}<span class="text-danger">@if ($r->required==1) * @endif</span></label><br>
                                        @if ($r->keterangan)
                                            <label class="label-text">{{ $r->keterangan }}</label>
                                        @endif

                                        @if ($r->isian == 1)
                                            <div class="form-group select-contain w-100">
                                                <input type="hidden" name="pertanyaanId[{{ $loop->iteration }}]" value="{{ $r->id }}">
                                                <select class="form-control" name="jawaban[{{ $loop->iteration }}]" @if ($r->required==1) required @endif>
                                                    <option value="0">Tidak</option>
                                                    @foreach ($r->pilihan as $rr)
                                                        <option value="{{ $rr->jawaban }}">{{ $rr->jawaban }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @elseif ($r->isian == 0)
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input type="hidden" name="pertanyaanId[{{ $loop->iteration }}]" value="{{ $r->id }}">
                                                <input type="hidden" name="jawaban[{{ $loop->iteration }}]" value="0">
                                                <input type="{{ $r->type }}" class="form-control" name="jawaban[{{ $loop->iteration }}]" placeholder="Isi Disini" @if ($r->required==1) required @endif>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="submit-box mb-3">
                <div class="btn-box pt-2">
                    <button type="submit" class="theme-btn">Kirim <i class="la la-arrow-right ml-1"></i></button>
                </div>
            </div>
        </form>
    </div>
</div><!-- end row -->
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
    <script src="{{ url('assets/landing/js/select2/select2.full.min.js') }}"></script>
@endsection

@section('js-custom')
    <script>
        $(function() {
            // $('.type-form').hide();
            $('#select-kategori').on('change', function() {
                if (this.value == '' || this.value == null) {
                    $('.type-form').hide();
                }
                
                if (this.value == 1) {
                    $('.type-form').show();
                    $('#type-form-1').show();
                    $('#type-form-2').hide();
                }
                
                if (this.value == 2) {
                    $('.type-form').show();
                    $('#type-form-1').hide();
                    $('#type-form-2').show();
                }
            });
        });
    </script>
    <script>
        $(function() {
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
                $.getJSON(baseUrl+'/api/getSekolah/'+val1, (result) => {
                    if (result.error_code == '0') {
                        let opt = '<option value="">- Pilih Sekolah -</option>';
                        // var dataSem = result.data;
                        // dataSem.sort(function(a, b){
                        //     return a.id_semester - b.id_semester;
                        // });
                        $.each(result.data, function(i, item) {
                            opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                        });
                        $("#select-sekolah").html(opt);
                    }else{
                        let opt = '<option value="">- Tidak Bisa -</option>';
                        $("#select-sekolah").html(opt);
                    }
                    $("#select-sekolah").select2({
                        placeholder: "Pilih Sekolah",
                    });
                });
            });

        });
    </script>
@endsection