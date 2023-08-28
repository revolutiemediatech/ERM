@extends($bidan)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/select2.css') }}">
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
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
                    <a href="{{ url('bidan/penunjang') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke bidan/daerah , karena pake resource --}}
            <form action="{{ url('bidan/penunjang') }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="mb-3">
                        <div class="col-form-label">Cabang Mitra</div>
                        <select id="select-cabang" class="form-control form-control-lg Select2" name="idLokasiPemeriksaan" aria-label="Default select example" required>
                            <option value="">Pilihan Mitra Sedang di Proses</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama Penunjang</label>
                        <input name="nama" id="nama" class="form-control form-control-lg" type="text" placeholder="Nama Penunjang">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Harga</label>
                        <input name="harga" id="harga" class="form-control form-control-lg" type="text" placeholder="Ex 500000">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Pembiayaan</label>
                        <select class="form-control form-control-lg Select2" id="select2" name="pembiayaan">
                            <option value="">Pilih Jenis Pembiayaan</option>
                            @foreach ($jenis_pasien as $jp)
                                <option value="{{ $jp->id }}">{{ $jp->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">Status</div>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Tersedia</option>
                            <option value="2">Habis</option>
                        </select>
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
            let baseUrl     = '{{ url('') }}';
            let idFaskes = "{{ session()->get('idFaskes') }}";
            $('#tabel-jquery').hide();

            $.getJSON(baseUrl+'/api/getLokasi/'+idFaskes, (result) => {
                if (result.error_code == '0') {
                    let opt = '<option value="">- Pilih Cabang Mitra -</option>';
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
