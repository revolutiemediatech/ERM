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
                            <h2 class="sec__title">SD - SMA</h2>
                            <p class="sec__desc font-weight-regular pb-2">Kuesioner Mengenai Skrining Pemeriksaan SD - SMA</p>
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
                                    <select class="select-contain-select" name="idKelas">
                                        <option value="">Pilih Kelas</option>
                                        <option value="1">1 SD</option>
                                        <option value="2">2 SD</option>
                                        <option value="3">3 SD</option>
                                        <option value="4">4 SD</option>
                                        <option value="5">5 SD</option>
                                        <option value="6">6 SD</option>
                                        <option value="7">1 SMP</option>
                                        <option value="8">2 SMP</option>
                                        <option value="9">3 SMP</option>
                                        <option value="10">1 SMA</option>
                                        <option value="11">2 SMA</option>
                                        <option value="12">3 SMA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
            
            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>PEMERIKSAAN STATUS GIZI</span>
                        <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span>
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box"><label class="label-text font-weight-bold">Berat Badan<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <input type="text" class="form-control" name="berat_badan" placeholder="ex : 33.4">
                                </div>
                            </div>
                        </div>
                        <div class="input-box"><label class="label-text font-weight-bold">Tinggi Badan<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <input type="text" class="form-control" name="tinggi_badan" placeholder="ex : 147.2">
                                </div>
                            </div>
                        </div>
                        <div class="input-box"><label class="label-text font-weight-bold">Apakah Ditemukan Hal Dibawah ini? (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ap_kam_hal_dib_in" value="Kelopak mata dalam pucat">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kelopak mata dalam pucat </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ap_kam_hal_dib_in" value="Bibir pucat">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Bibir pucat </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ap_kam_hal_dib_in" value="Lidah pucat">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Lidah pucat </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ap_kam_hal_dib_in" value="Telapak tangan pucat">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Telapak tangan pucat </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>PEMERIKSAAN KEBERSIHAN DIRI</span>
                        {{-- <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span> --}}
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Rambut BERMASALAH? (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ram_ber" value="TIDAK SEHAT">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> TIDAK SEHAT </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Ditemukan Hal Dibawah Ini?  (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="mas_kulit" value="Kulit Bersisik">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kulit Bersisik </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="mas_kulit" value="Kulit Ada Memar">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kulit Ada Memar </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="mas_kulit" value="Kulit Ada Luka Sayatan">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kulit Ada Luka Sayatan </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="mas_kulit" value="Kulit Ada Koreng">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kulit Ada Koreng </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="mas_kulit" value="Kulit Ada Koreng Yang Sukar Sembuh">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kulit Ada Koreng Yang Sukar Sembuh </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="mas_kulit" value="Kulit Ada Bekas Suntikan">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kulit Ada Bekas Suntikan </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Kuku Bermasalah? (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="mas_kuku" value="TIDAK SEHAT">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> TIDAK SEHAT </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>PEMERIKSAAN KESEHATAN PENGLIHATAN</span>
                        {{-- <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span> --}}
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Mata Luar Ada Masalah?  (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        Mata Kanan
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="inf_mata_kan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Infeksi </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        Mata Kiri
                                        <li class="ms-list-item pl-5">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="inf_mata_kir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Infeksi </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Tajam Penglihatan Bermasalah??  (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        Mata Kanan
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="kel_ref_matKan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kelainan Refraksi </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="low_vis_matKan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Low Vision </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="keb_matKan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kebutaan </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="kac_matKan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kacamata </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        Mata Kiri
                                        <li class="ms-list-item pl-5">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="kel_ref_matKir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kelainan Refraksi </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="low_vis_matKir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Low Vision </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="keb_matKir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kebutaan </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="kac_matKir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kacamata </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Buta Warna?  (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="but_war" value="Ya">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> BUTA WARNA </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>PEMERIKSAAN KESEHATAN PENDENGARAN</span>
                        {{-- <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span> --}}
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Ditemukan Hal Berikut? (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        Telinga Luar Kanan
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ott_med_telKan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> OTITIS MEDIA </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ott_eks_telKan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> OTITIS EKSTERNA </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ser_telKan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> SERUMEN </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        Telinga Luar Kiri
                                        <li class="ms-list-item pl-5">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ott_med_telKir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> OTITIS MEDIA </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ott_eks_telKir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> OTITIS EKSTERNA </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ser_telKir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> SERUMEN </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Ada Gangguan Pendengaran?  (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="gang_telKan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Telinga Kanan </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="gang_telKir" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Telinga Kiri </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>PEMERIKSAAN KESEHATAN GIGI DAN MULUT</span>
                        {{-- <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span> --}}
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Pada Rongga Mulut Ditemukan Hal Dibawah Ini?  (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="cel_bib" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Celah Bibir/Langit Langit </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="luk_sud_mul" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Luka Pada Sudut Mulut </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="sariawan" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Sariawan </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="lid_kot" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Lidah Kotor </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="luka_lain" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Luka Lainnya </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Pada Gigi Dan Gusi Ditemukan Hal Dibawah Ini?  (Checklist jika "IYA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="gig_berlub" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gigi Berlubang/Karies </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="gus_mud_darah" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gusi Mudah Berdarah </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="gus_beng" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gusi Bengkak </span>
                                        </li>
                                    </ul>
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="gig_kot" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Gigi Kotor </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="kar_gigi" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Karang Gigi </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="sus_gig_dep_tTeratur" value="1">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Susunan Gigi Depan Tidak Teratur </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>KEBUGARAN JASMANI</span>
                        {{-- <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span> --}}
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text font-weight-bold">KEBUGARAN JASMANI<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="keb_jas" value="BAIK SEKALI">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> BAIK SEKALI </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="keb_jas" value="BAIK">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> BAIK </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="keb_jas" value="CUKUP">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> CUKUP </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="keb_jas" value="KURANG">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> KURANG </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="keb_jas" value="KURANG SEKALI">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> KURANG SEKALI </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>PENGGUNAAN ALAT BANTU</span>
                        {{-- <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span> --}}
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text font-weight-bold">PENGGUNAAN ALAT BANTU (Checklist jika "ADA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="peng_alBan" value="Penglihatan/Loupe">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Penglihatan/Loupe </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="peng_alBan" value="Pendengaran">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Pendengaran </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="peng_alBan" value="Kursi Roda">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kursi Roda </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="peng_alBan" value="Tongkat/Kruk">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Tongkat/Kruk </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="peng_alBan" value="Kaki/Tangan/Mata Protese">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Kaki/Tangan/Mata Protese </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>PEMERIKSAAN TANDA VITAL</span>
                        {{-- <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span> --}}
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Tekanan Darah Systole</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <input type="text" class="form-control" name="td_sys" placeholder="Masukkan Jawaban">
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Tekanan Darah Diastole</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <input type="text" class="form-control" name="td_dias" placeholder="Masukkan Jawaban">
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Denyut Nadi / Menit (Angkanya Saja)</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <input type="text" class="form-control" name="deny_nad" placeholder="Masukkan Jawaban">
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Suhu<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <input type="text" class="form-control" name="suhu" placeholder="ex : 36.7">
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Apakah Ditemukan Hal Dibawah Ini? (Checklist jika "IYA", Kosongkan jika "Tidak")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="bis_jan" value="Bising Jantung">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Bising Jantung </span>
                                        </li>
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="bis_par" value="Bising Paru">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Bising Paru </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title d-flex align-items-center justify-content-between">
                        <span><i class="la la-briefcase mr-2 text-gray"></i>TINDAK LANJUT</span>
                        {{-- <span class="font-size-13 text-gray"><span class="text-danger">*</span> Required</span> --}}
                    </h3>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Rujuk Puskesmas  (Checklist Jika "YA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="ruj_pus" value="Ya">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Ya </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Pemberian TTD  (Checklist Jika "YA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="pem_ttd" value="Ya">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Ya </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Pemberian Obat Cacing   (Checklist Jika "YA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="pem_obCac" value="Ya">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Ya </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text font-weight-bold">Kepemilikan Buku Rapor Kesehatan   (Checklist Jika "YA", Kosongkan jika "TIDAK")</label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-4">
                                            <label class="ms-checkbox-wrap">
                                            <input type="checkbox" name="kep_bukRapSehat" value="Ya">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Ya </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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