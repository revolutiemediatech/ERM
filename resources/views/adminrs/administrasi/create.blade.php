@extends($adminRs)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
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
                    <a href="{{ url('adminRs/billing') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url('adminRs/administrasi') }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Cabang Mitra</label>
                        <select id="select-cabang" class="form-control" name="idLokasiPemeriksaan" aria-label="Default select example" required>
                            <option value="">Pilih Mitra Terlebih Dahulu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama</label>
                        <input name="nama" id="nama" class="form-control form-control-lg" type="text" placeholder="Administrasi" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Pembiayaan</label>
                        <select id="select-pembiayaan" class="form-control" name="idPembiayaan" aria-label="Default select example" required>
                        <option value="">Pilih Pembiayaan</option>
                        @foreach ($pembiayaan as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach                        
                        </select> 
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Harga</label>
                        <input name="harga" id="harga" class="form-control form-control-lg" type="text" placeholder="Harga">
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
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
    <script>
        $(function() {
            $("#isi-tabel").DataTable(); // tambahin ini ki

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

            $('#select-cabang').on('change', function() {
                $("#isi-tabel").DataTable().clear().destroy(); // tambahin ini ki
                
                $('#tabel-jquery').show();
                var idLokasiPemeriksaan = $('#select-cabang').val();
                // console.log(idPKKode);
                // var val3 = this.value;
                
                $("#isi-tabel").DataTable({
                // $("#tabel-jquery")({
                    language: { // tambahin ini ki
                        emptyTable: "Tidak ada data Billing",
                        info: "Total: _TOTAL_ Data Billing",
                        infoEmpty: "Menampilkan 0 dari 0 Data Billing",
                    },
                    responsive:  true,
                    autoWidth: false,
                    processing: true,
                    ajax: {
                        url: baseUrl+'/api/getBilling/' +idLokasiPemeriksaan,
                        method: 'POST',
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'colvis'
                    ]
                });
            });

        });
    </script>
@endsection
