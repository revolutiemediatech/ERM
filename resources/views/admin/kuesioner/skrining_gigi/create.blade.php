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
                            <h2 class="sec__title">DEF-T/DMF-T</h2>
                            <p class="sec__desc font-weight-regular pb-2">Kuesioner Mengenai Skrining Pemeriksaan Gigi</p>
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
        <form action="{{ url("$url/store/", []) }}" method="post" class="MultiFile-intercepted">
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
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">NIK<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <span class="la la-user form-icon"></span>
                                <input type="number" class="form-control" name="nik" placeholder="NIK">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Faskes<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select class="select-contain-select" name="idFaskes">
                                        <option value="">Pilih Faskes</option>
                                        @foreach ($faskes as $f)
                                            <option value="{{ $f->id }}">{{ $f->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Tanggal Lahir<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <span class="la la-user form-icon"></span>
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="tanggal_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Jenis Kelamin<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select class="select-contain-select" name="jenis_kelamin">
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
                                <input type="number" class="form-control" name="no_hp" placeholder="ex : 081123456789">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Asal Sekolah<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select class="select-contain-select" name="idSSekolah">
                                        <option value="">Please Select</option>
                                        @foreach ($sekolah as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Provinsi Sekolah<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select id="select-provinsi" class="form-control Select2 form-control-lg" name="idMProvinsi">
                                        <option value="">Pilihan Provinsi Sedang di Proses</option>
                                        {{-- @foreach ($sekolah as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                        @endforeach --}}
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
                                    <select id="select-daerah" class="form-control Select2 form-control-lg" name="idMDaerah">
                                        <option value="">Pilih Provinsi Terlebih Dahulu</option>
                                        {{-- @foreach ($sekolah as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                        @endforeach --}}
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
                                    <select id="select-kecamatan" class="form-control Select2 form-control-lg" name="idMKecamatan">
                                        <option value="">Pilih Daerah Terlebih Dahulu</option>
                                        {{-- @foreach ($sekolah as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                        @endforeach --}}
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
                                    <select id="select-sekolah" class="form-control Select2 form-control-lg" name="idSekolah">
                                        <option value="">Pilih Kecamatan Terlebih Dahulu</option>
                                        {{-- @foreach ($sekolah as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Kelas<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select class="select-contain-select" name="kelas">
                                        <option value="">Pilih Kelas</option>
                                        <option value="PAUD">PAUD</option>
                                        <option value="TK A">TK A</option>
                                        <option value="TK B">TK B</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Odontogram</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <div class="form-group">
                                <img class="ms-profile-img" src="{{ url('') }}/assets/img/odontogram.jpeg" width="100%" alt="people">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>DEF-T</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <div class="form-group">
                                <input type="text" class="form-control" Value="Decay-Extration-Filling" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div>
            
            <div class="form-box"> --}}
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Decay [d]</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 55 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 54 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 53 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 52 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 51 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 61 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 62 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 63 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 64 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 65 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 85 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 84 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 83 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 82 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 81 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 71 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 72 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 73 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 74 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 75 </span>
                            </li>
                        </ul>
                    </div>
                </div>
            {{-- </div>
            
            <div class="form-box"> --}}
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Kondisi Gigi Berlubang</span>
                        <span class="font-size-13 text-gray"><span class="text-danger">*</span> Jika tidak ada dapat dikosongkan</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="def_kgb" value="Gigi berlubang belum mengenai pulpa gigi">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gigi berlubang belum mengenai pulpa gigi </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="def_kgb" value="Gigi berlubang mengenai pulpa gigi">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gigi berlubang mengenai pulpa gigi </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="def_kgb" value="Gigi berlubang tidak bisa dipertahankan">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gigi berlubang tidak bisa dipertahankan </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div>

            <div class="form-box"> --}}
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Extraction [e]</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 55 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 54 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 53 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 52 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 51 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 61 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 62 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 63 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 64 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 65 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 85 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 84 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 83 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 82 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 81 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 71 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 72 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 73 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 74 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 75 </span>
                            </li>
                        </ul>
                    </div>
                </div>
            {{-- </div>

            <div class="form-box"> --}}
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Filling [f]</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 55 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 54 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 53 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 52 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 51 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 61 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 62 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 63 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 64 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 65 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 85 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 84 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 83 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 82 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 81 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 71 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 72 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 73 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 74 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 75 </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>DMF-T</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <div class="form-group">
                                <input type="text" class="form-control" Value="Decay-Missing-Filling" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div>
            
            <div class="form-box"> --}}
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Decay [D]</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 18 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 17 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 16 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 15 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 14 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 13 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 12 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 11 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 21 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 22 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 23 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 24 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 25 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 26 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 27 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 28 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 48 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 47 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 46 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 45 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 44 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 43 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 42 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 41 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 31 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 32 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 33 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 34 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 35 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 36 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 37 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 38 </span>
                            </li>
                        </ul>
                    </div>
                </div>
            {{-- </div>
            
            <div class="form-box"> --}}
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Kondisi Gigi Berlubang</span>
                        <span class="font-size-13 text-gray"><span class="text-danger">*</span> Jika tidak ada dapat dikosongkan</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="dmf_kgb" value="Gigi berlubang belum mengenai pulpa gigi">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gigi berlubang belum mengenai pulpa gigi </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="dmf_kgb" value="Gigi berlubang mengenai pulpa gigi">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gigi berlubang mengenai pulpa gigi </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="dmf_kgb" value="Gigi berlubang tidak bisa dipertahankan">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gigi berlubang tidak bisa dipertahankan </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div>

            <div class="form-box"> --}}
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Missing [M]</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 18 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 17 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 16 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 15 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 14 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 13 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 12 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 11 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 21 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 22 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 23 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 24 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 25 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 26 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 27 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 28 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 48 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 47 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 46 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 45 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 44 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 43 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 42 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 41 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 31 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 32 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 33 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 34 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 35 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 36 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 37 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 38 </span>
                            </li>
                        </ul>
                    </div>
                </div>
            {{-- </div>

            <div class="form-box"> --}}
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>Filling [F]</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 18 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 17 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 16 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 15 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 14 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 13 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 12 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 11 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 21 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 22 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 23 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 24 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 25 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 26 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 27 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 28 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 48 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 47 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 46 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 45 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 44 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 43 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 42 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 41 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_1" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 31 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_2" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 32 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_3" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 33 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_4" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 34 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_5" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 35 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_6" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 36 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_7" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 37 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_8" value="ya">
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 38 </span>
                            </li>
                        </ul>
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
            $('.type-form').hide();
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
            $("#isi-tabel").DataTable(); // tambahin ini ki

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
                        let opt = '<option value="">- Pilih Cabang -</option>';
                        $.each(result.data, function(i, item) {
                            opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                        });
                        $("#select-cabang").html(opt);
                    }else{
                        let opt = '<option value="">- Tidak Bisa -</option>';
                        $("#select-cabang").html(opt);
                    }
                    $("#select-cabang").select2({
                        placeholder: "Pilih Cabang",
                    });
                });
            });

            $('#select-cabang').on('change', function() {
                $("#isi-tabel").DataTable().clear().destroy(); // tambahin ini ki
                
                $('#tabel-jquery').show();
                var idLokasiPemeriksaan = $('#select-cabang').val();
                // console.log(idPKKode);
                // var val3 = this.value;
                
                $("#isi-tabel").DataTable({
                // $("#tabel-jquery")({
                    language: { // tambahin ini ki
                        emptyTable: "Tidak ada data Pasien",
                        info: "Total: _TOTAL_ Data Pasien",
                        infoEmpty: "Menampilkan 0 dari 0 Data Pasien",
                    },
                    responsive:  true,
                    autoWidth: false,
                    processing: true,
                    ajax: {
                        url: baseUrl+'/api/getPasien/' + idLokasiPemeriksaan,
                        method: 'POST',
                    },
                });
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