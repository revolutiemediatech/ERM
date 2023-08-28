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
    <form action="{{ url('adminRs/rawat-jalan/perpen') }}/{{ $id }}" method="POST" enctype="multipart/form-data">
    {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
        @csrf 
        @method('PUT')
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title">Form Persetujuan/Penolakan</h5>
                        </div>
                        <div class="col-lg-6 fle d-flex justify-content-end">
                            <a href='{{ url('adminRs/rawat-jalan/perpen') }}/{{ $id }}' class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3" id="jenis">
                            <div class="col-form-label">Jenis</div>
                            <select id="select-jenis" class="form-control Select2" id="exampleFormControlSelect1"  name="jenis" required>
                            <option value="">Pilih Jenis</option>
                                    <option value="1">PERSETUJUAN</option>
                                    <option value="2">PENOLAKAN</option>
                                    <option value="3">PENOLAKAN RAWAT INAP</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3" id="dokumen">
                            <div class="col-form-label">Judul</div>
                            <input name="judul" id="judul" class="form-control form-control-lg" type="text" placeholder="Masukkan Judul Dokumen">
                            <div class="col-form-label">Upload Dokumen</div>
                            <input class="form-control" name="dokumen" type="file" accept=".csv, .xls, .xlsx, .pdf">
                            <span class="form-text fs-6 text-muted">File csv, xls, xlsx, dan pdf Max 1 Mb</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <br>
                            <label class="col-form-label pt-0" for="exampleInputEmail1">Sudah Memiliki Dokument?</label><br>
                            <input id="doc" name="doc" type="checkbox" value="1" style="height: 20px; width: 20px;">
                        </div>
                    </div>
                    <div class="type-form">
                        <div id="type-form-1">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="col-form-label">Nama Dokter</div>
                                    <select class="form-control Select2" id="exampleFormControlSelect1"  name="idUsers" required>
                                        <option value="">Pilih Nama Dokter</option>
                                        @foreach ($users as $u)
                                            <option value="{{ $u->idUsers}}">{{ $u->prefix }} {{ $u->nama }}, {{ $u->suffix }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="col-form-label">Nama Pemberi Informan</div>
                                    <select id="" class="form-control Select2" name="idFaskes" aria-label="Default select example">
                                        <option value="">Dokter</option>
                                        <option value="">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="alamat">Diagnosis</label>
                                    <textarea class="form-control" name="diagnosis" id="diagnosis" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="alamat">Dasar Diagnosis</label>
                                    <textarea class="form-control" name="dasar_diagnosis" id="dasar_diagnosis" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Nama Tindakan Kedokteran</label>
                                    <input name="nama_tindakan_dokter" id="nama_tindakan_dokter" class="form-control form-control-lg" type="text" placeholder="Nama Tindakan Dokter">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Indikasi Tindakan</label>
                                    <input name="indikasi_tindakan" id="indikasi_tindakan" class="form-control form-control-lg" type="text" placeholder="Indikasi Tindakan">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Tata Cara</label>
                                    <input name="tata_cara" id="tata_cara" class="form-control form-control-lg" type="text" placeholder="Tata Cara">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Tujuan</label>
                                    <input name="tujuan" id="tujuan" class="form-control form-control-lg" type="text" placeholder="Tujuan">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Risiko</label>
                                    <input name="risiko" id="risiko" class="form-control form-control-lg" type="text" placeholder="Risiko">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Komplikasi</label>
                                    <input name="komplikasi" id="komplikasi" class="form-control form-control-lg" type="text" placeholder="Komplikasi">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Prognosis</label>
                                    <input name="prognosis" id="prognosis" class="form-control form-control-lg" type="text" placeholder="Prognosis">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Alternatif dan Risiko</label>
                                    <input name="alternatif" id="alternatif" class="form-control form-control-lg" type="text" placeholder="Alternatif dan Risiko">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Lain-Lain</label>
                                    <input name="lain" id="lain" class="form-control form-control-lg" type="text" placeholder="Lain-Lain">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Nama PJ</label>
                                <input name="nama_pj" id="nama_pj" class="form-control form-control-lg" type="text" placeholder="Nama PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Tanggal Lahir PJ</label>
                                <input name="usia" id="usia" class="form-control form-control-lg" type="date" placeholder="Tanggal Lahir PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Jenis Kelamin PJ</label>
                                <select id="select-mitra" class="form-control Select2" name="jenis_kelamin" aria-label="Default select example">
                                    <option value="">Pilihan Jenis Kelamin</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Alamat PJ</label>
                                <input name="alamat" id="alamat" class="form-control form-control-lg" type="text" placeholder="Alamat PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">No HP/WA</label>
                                <input name="nomor_hp" id="nomor_hp" class="form-control form-control-lg" type="text" placeholder="Nomor HP/WA">
                            </div>
                        </div>
                        <div id="type-form-2">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="col-form-label">Nama Dokter</div>
                                    <select class="form-control Select2" id="exampleFormControlSelect1"  name="idUsers" required>
                                        <option value="">Pilih Nama Dokter</option>
                                        @foreach ($users as $u)
                                            <option value="{{ $u->idUsers}}">{{ $u->prefix }} {{ $u->nama }}, {{ $u->suffix }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="col-form-label">Nama Pemberi Informan</div>
                                    <select id="" class="form-control Select2" name="idFaskes" aria-label="Default select example">
                                        <option value="">Dokter</option>
                                        <option value="">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="alamat">Diagnosis</label>
                                    <textarea class="form-control" name="diagnosis" id="diagnosis" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="alamat">Dasar Diagnosis</label>
                                    <textarea class="form-control" name="dasar_diagnosis" id="dasar_diagnosis" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Nama Tindakan Kedokteran</label>
                                    <input name="nama_tindakan_dokter" id="nama_tindakan_dokter" class="form-control form-control-lg" type="text" placeholder="Nama Tindakan Dokter">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Indikasi Tindakan</label>
                                    <input name="indikasi_tindakan" id="indikasi_tindakan" class="form-control form-control-lg" type="text" placeholder="Indikasi Tindakan">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Tata Cara</label>
                                    <input name="tata_cara" id="tata_cara" class="form-control form-control-lg" type="text" placeholder="Tata Cara">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Tujuan</label>
                                    <input name="tujuan" id="tujuan" class="form-control form-control-lg" type="text" placeholder="Tujuan">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Risiko</label>
                                    <input name="risiko" id="risiko" class="form-control form-control-lg" type="text" placeholder="Risiko">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Komplikasi</label>
                                    <input name="komplikasi" id="komplikasi" class="form-control form-control-lg" type="text" placeholder="Komplikasi">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Prognosis</label>
                                    <input name="prognosis" id="prognosis" class="form-control form-control-lg" type="text" placeholder="Prognosis">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Alternatif dan Risiko</label>
                                    <input name="alternatif" id="alternatif" class="form-control form-control-lg" type="text" placeholder="Alternatif dan Risiko">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label pt-0" for="username">Lain-Lain</label>
                                    <input name="lain" id="lain" class="form-control form-control-lg" type="text" placeholder="Lain-Lain">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Nama PJ</label>
                                <input name="nama_pj" id="nama_pj" class="form-control form-control-lg" type="text" placeholder="Nama PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Tanggal Lahir PJ</label>
                                <input name="usia" id="usia" class="form-control form-control-lg" type="date" placeholder="Tanggal Lahir PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Jenis Kelamin PJ</label>
                                <select id="select-mitra" class="form-control Select2" name="jenis_kelamin" aria-label="Default select example">
                                    <option value="">Pilihan Jenis Kelamin</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Alamat PJ</label>
                                <input name="alamat" id="alamat" class="form-control form-control-lg" type="text" placeholder="Alamat PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">No HP/WA</label>
                                <input name="nomor_hp" id="nomor_hp" class="form-control form-control-lg" type="text" placeholder="Nomor HP/WA">
                            </div>
                        </div>
                        <div id="type-form-3">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Nama PJ</label>
                                <input name="nama_pj" id="nama_pj" class="form-control form-control-lg" type="text" placeholder="Nama PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Tanggal Lahir PJ</label>
                                <input name="usia" id="usia" class="form-control form-control-lg" type="date" placeholder="Tanggal Lahir PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Jenis Kelamin PJ</label>
                                <select id="select-mitra" class="form-control Select2" name="jenis_kelamin" aria-label="Default select example">
                                    <option value="">Pilihan Jenis Kelamin</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Alamat PJ</label>
                                <input name="alamat" id="alamat" class="form-control form-control-lg" type="text" placeholder="Alamat PJ">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">No HP/WA</label>
                                <input name="nomor_hp" id="nomor_hp" class="form-control form-control-lg" type="text" placeholder="Nomor HP/WA">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Alasan Pulang</label>
                                <input name="alasan_pulang" id="alasan_pulang" class="form-control form-control-lg" type="text" placeholder="Alasan Pulang">
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
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
    <script>
        $('#dokumen').hide();
        $(document).ready(function() {
            $('#doc').change(function() {
                if ($(this).is(':checked')) {
                    $('#dokumen').show();
                    $('#jenis').hide();
                } else {
                    $('#dokumen').hide();
                    $('#jenis').show();
                }
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
                    $('#type-form-1').show();
                    $('#type-form-2').hide();
                    $('#type-form-3').hide();
                }
                
                if (this.value == 2) {
                    $('.type-form').show();
                    $('#type-form-1').hide();
                    $('#type-form-2').show();
                    $('#type-form-3').hide();
                }

                if (this.value == 3) {
                    $('.type-form').show();
                    $('#type-form-1').hide();
                    $('#type-form-2').hide();
                    $('#type-form-3').show();
                }
            });
        });
    </script>
@endsection
