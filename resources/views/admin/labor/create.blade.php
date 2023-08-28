@extends($admin)

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
                    <a href="{{ url('admin/labor') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url('admin/labor') }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="mb-3">
                        <div class="col-form-label">Mitra</div>
                        <select id="select-mitra" class="form-control form-control-lg Select2" name="idFaskes" aria-label="Default select example">
                            <option value="">Pilihan Mitra Sedang di Proses</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="col-form-label">Cabang Mitra</div>
                        <select id="select-lokasi" class="form-control form-control-lg Select2" name="idLokasiPemeriksaan" aria-label="Default select example" required>
                            <option value="">Pilih Mitra Terlebih Dahulu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama</label>
                        <input name="nama" id="nama" class="form-control form-control-lg" type="text" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Satuan</label>
                        <input name="satuan" id="satuan" class="form-control form-control-lg" type="text" placeholder="Satuan">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Batas Bawah</label>
                        <input name="batas_bawah" id="batas_bawah" class="form-control form-control-lg" type="text" placeholder="Batas Bawah">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Batas Atas</label>
                        <input name="batas_atas" id="batas_atas" class="form-control form-control-lg" type="text" placeholder="Batas Atas">
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
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Stok Awal</label>
                        <input name="stok_awal" id="stok_awal" class="form-control form-control-lg" type="text" placeholder="Stok Awal">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Stok Akhir</label>
                        <input name="stok_akhir" id="stok_akhir" class="form-control form-control-lg" type="text" placeholder="Stok Akhir">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Satuan Stock</label>
                        <input name="satuan_stock" id="satuan_stock" class="form-control form-control-lg" type="text" placeholder="Satuan Stock">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Kapasitas Per Stock</label>
                        <input name="kapasitas_stock" id="kapasitas_stock" class="form-control form-control-lg" type="text" placeholder="Kapasitas Per Stock">
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
@endsection
