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
                            <h2 class="sec__title">Aduan</h2>
                            <p class="sec__desc font-weight-regular pb-2">Kuesioner Mengenai Layanan Aduan</p>
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
        <form action="{{ url("/e-aduan/aduan/store/", []) }}" method="post" enctype="multipart/form-data">
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
                            <label class="label-text">Nama Lengkap(Optional)</label>
                            <div class="form-group">
                                <span class="la la-user form-icon"></span>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">No HP<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <span class="la la-user form-icon"></span>
                                <input type="number" class="form-control" name="no_hp" placeholder="No HP" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Faskes<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select class="select-contain-select" name="idFaskes" required>
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
                            <label class="label-text">Bagian Pelayanan<span class="text-danger">*</span></label>
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    <select class="select-contain-select" name="bagian_pelayanan" required>
                                        <option value="">Pilih Bagian Pelayanan</option>
                                        <option value="Pendaftaran">Pendaftaran</option>
                                        <option value="Poli Umum">Poli Umum</option>
                                        <option value="Tindakan Gawat Darurat">Tindakan Gawat Darurat</option>
                                        <option value="KIA,KB dan Imunisasi">KIA,KB dan Imunisasi</option>
                                        <option value="Poli Infeksius">Poli Infeksius</option>
                                        <option value="Poli Gigi dan Mulut">Poli Gigi dan Mulut</option>
                                        <option value="Komunikasi & Edukasi">Komunikasi & Edukasi</option>
                                        <option value="Laboratorium">Laboratorium</option>
                                        <option value="Farmasi">Farmasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-column">
                        <div class="input-box">
                            <label class="label-text">Keluhan<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <span class="la la-user form-icon"></span>
                                <textarea class="form-control" name="keluhan" id="keluhan" rows="4" required></textarea>
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
@endsection