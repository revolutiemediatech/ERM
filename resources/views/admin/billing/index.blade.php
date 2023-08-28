@extends( $admin )

@section('css-library')
@endsection

@section('css-custom')
    
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
                                <i class="fas fa-plus-square"></i> <b>Tambah Data Billing</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Mitra</label>
                    <select id="select-mitra" class="form-control" name="idFaskes" aria-label="Default select example" required>
                        <option value="">Pilihan Mitra Sedang di Proses</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Cabang Mitra</label>
                    <select id="select-cabang" class="form-control" name="idLokasiPemeriksaan" aria-label="Default select example" required>
                        <option value="">Pilih Mitra Terlebih Dahulu</option>
                    </select>
                </div>
                <div class="table-responsive" id="tabel-jquery">
                    <table id="isi-tabel" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th width="50">No.</th>
                                <th>Nama Petugas</th>
                                <th>Nama Billing</th>
                                <th>Pembiayaan</th>
                                <th>Harga</th>
                                <th width="10%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- data administrasi --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Data Administrasi</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <div class="btn-group">
                            <a href="{{ url("admin/administrasi/create", []) }}" type="button" class="btn btn-lg btn-primary">
                                <i class="fas fa-plus-square"></i> <b>Tambah Data Administrasi</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Mitra</label>
                    <select id="select-mitra1" class="form-control" name="idFaskes" aria-label="Default select example" required>
                        <option value="">Pilihan Mitra Sedang di Proses</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Cabang Mitra</label>
                    <select id="select-cabang1" class="form-control" name="idLokasiPemeriksaan" aria-label="Default select example" required>
                        <option value="">Pilih Mitra Terlebih Dahulu</option>
                    </select>
                </div>
                <div class="table-responsive" id="tabel-jqueryy">
                    <table id="isi-tabell" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th width="50">No.</th>
                                <th>Nama Petugas</th>
                                <th>Nama</th>
                                <th>Pembiayaan</th>
                                <th>Harga</th>
                                <th width="10%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
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
                        let opt = '<option value="">- Pilih Cabang Mitra-</option>';
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
                        url: baseUrl+'/api/getBilling/' + idLokasiPemeriksaan,
                        method: 'POST',
                    },
                });
            });

        });
    </script>

    <script>
        $(function() {
            $("#isi-tabell").DataTable(); // tambahin ini ki

            let baseUrl     = '{{ url('') }}';
            $('#tabel-jqueryy').hide();

            $.getJSON(baseUrl+'/api/getAllMitra', (result) => {
                if (result.error_code == '0') {
                    let opt = '<option value="">- Pilih -</option>';
                    $.each(result.data, function(i, item) {
                        opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                    });
                    $("#select-mitra1").html(opt);
                }else{
                    let opt = '<option value="">- Tidak Bisa -</option>';
                    $("#select-mitra1").html(opt);
                }
                $("#select-mitra1").select2({
                    placeholder: "Pilih Mitra",
                });
            });

            $('#select-mitra1').on('change', function() {
                var val1 = this.value;
                $.getJSON(baseUrl+'/api/getLokasi/'+val1, (result) => {
                    if (result.error_code == '0') {
                        let opt = '<option value="">- Pilih Cabang Mitra-</option>';
                        $.each(result.data, function(i, item) {
                            opt += '<option value="'+item.id+'">'+item.nama+'</option>';
                        });
                        $("#select-cabang1").html(opt);
                    }else{
                        let opt = '<option value="">- Tidak Bisa -</option>';
                        $("#select-cabang1").html(opt);
                    }
                    $("#select-cabang1").select2({
                        placeholder: "Pilih Cabang Mitra",
                    });
                });
            });

            $('#select-cabang1').on('change', function() {
                $("#isi-tabell").DataTable().clear().destroy(); // tambahin ini ki
                
                $('#tabel-jqueryy').show();
                var idLokasiPemeriksaan = $('#select-cabang1').val();
                // console.log(idPKKode);
                // var val3 = this.value;
                
                $("#isi-tabell").DataTable({
                // $("#tabel-jquery")({
                    language: { // tambahin ini ki
                        emptyTable: "Tidak ada data Administrasi",
                        info: "Total: _TOTAL_ Data Administrasi",
                        infoEmpty: "Menampilkan 0 dari 0 Data Administrasi",
                    },
                    responsive:  true,
                    autoWidth: false,
                    processing: true,
                    ajax: {
                        url: baseUrl+'/api/getAdministrasi/' + idLokasiPemeriksaan,
                        method: 'POST',
                    },
                });
            });

        });
    </script>
@endsection