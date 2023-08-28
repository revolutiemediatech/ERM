@extends( $admin )

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/select2.css') }}">
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@endsection

@section('content')
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
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">{{ $page }}</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <div class="btn-group">
                            <a href="{{ url("$url/create", []) }}" type="button" class="btn btn-lg btn-primary">
                                <i class="fas fa-plus-square"></i> <b>Tambah Data Desa</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Provinsi</label>
                    <select id="select-provinsi" class="form-control" name="idMProvinsi" aria-label="Default select example" required>
                        <option value="">Pilihan Provinsi Sedang di Proses</option>
                        {{-- @foreach ($provinsi as $r) 
                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Daerah</label>
                    <select id="select-daerah" class="form-control" name="idMDaerah" aria-label="Default select example" required>
                        <option value="">Pilih Provinsi Terlebih Dahulu</option>
                        {{-- @foreach ($sekolah as $r) 
                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Kecamatan</label>
                    <select id="select-kecamatan" class="form-control" name="idMKecamatan" aria-label="Default select example" required>
                        <option value="">Pilih Daerah Terlebih Dahulu</option>
                        {{-- @foreach ($sekolah as $r) 
                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="table-responsive" id="tabel-jquery">
                    <table id="isi-tabel" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                    <thead>
                        <tr>
                            <th width="50">No.</th>
                            <th>Nama Provinsi</th>
                            <th>Nama Daerah</th>
                            <th>Nama Kecamatan</th>
                            <th>Nama Desa</th>
                            <th width="10%"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- fitur di laravel --}}
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
    <script src="{{ url('assets/js/select2/select2.full.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>

@endsection

@section('js-custom')
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

            $('#select-kecamatan').on('change', function() {
                $("#isi-tabel").DataTable().clear().destroy(); // tambahin ini ki
                
                $('#tabel-jquery').show();
                var idMKecamatan = $('#select-kecamatan').val();
                // console.log(idPKKode);
                // var val3 = this.value;
                
                $("#isi-tabel").DataTable({
                // $("#tabel-jquery")({
                    language: { // tambahin ini ki
                        emptyTable: "Tidak ada data Desa",
                        info: "Total: _TOTAL_ Data Desa",
                        infoEmpty: "Menampilkan 0 dari 0 Data Desa",
                    },
                    responsive:  true,
                    autoWidth: false,
                    processing: true,
                    ajax: {
                        url: baseUrl+'/api/daerahkhusus/getDesa/' +idMKecamatan,
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