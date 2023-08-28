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
                                <i class="fas fa-plus-square"></i> <b>Tambah Data Sekolah</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Pilih Provinsi</label>
                    <select id="select-provinsi" class="form-control Select2" name="idMProvinsi" aria-label="Default select example">
                        <option value="">Pilihan Provinsi Sedang di Proses</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Pilih Kota/Kabupaten</label>
                    <select id="select-daerah" class="form-control Select2" name="idMDaerah" aria-label="Default select example" required>
                        <option value="">Pilih Provinsi Terlebih Dahulu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Pilih Kecamatan</label>
                    <select id="select-kecamatan" class="form-control Select2" name="idMKecamatan" aria-label="Default select example" required>
                        <option value="">Pilih Kota/Kabupaten Terlebih Dahulu</option>
                    </select>
                </div>
                <div class="table-responsive" id="tabel-jquery">
                    <table id="isi-tabel" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Daerah</th>
                                <th>Kecamatan</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat</th>
                                <th width="10%"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($sekolah as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->daerah->nama ?? '' }}</td>
                                    <td>{{ $p->kecamatan->nama ?? '' }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td>
                                        <a href='{{ url("$url/" . $p->id, []) }}/edit'><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                                        <a href="{{ url("$url", ['id' => $p->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();"><i class='far fa-trash-alt ms-text-danger'></i></a>
                                        <form id="delete-form-{{ $p->id }}" action="{{ url("$url", ['id' => $p->id]) }}" method="POST" style="display: none;">@csrf</form>
                                    </td>
                                </tr>
                            @endforeach --}}
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
    <script src="{{ url('assets/js/select2/select2.full.min.js') }}"></script>

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
                $("#isi-tabel").DataTable().clear().destroy(); // tambahin ini ki
                
                $('#tabel-jquery').show();
                var idMKecamatan = $('#select-kecamatan').val();
                // console.log(idPKKode);
                // var val3 = this.value;
                
                $("#isi-tabel").DataTable({
                // $("#tabel-jquery")({
                    language: { // tambahin ini ki
                        emptyTable: "Tidak ada data Sekolah",
                        info: "Total: _TOTAL_ Data Sekolah",
                        infoEmpty: "Menampilkan 0 dari 0 Data Sekolah",
                    },
                    responsive:  true,
                    autoWidth: false,
                    processing: true,
                    ajax: {
                        url: baseUrl+'/api/tabelkhusussemua/getSekolah/' +idMKecamatan,
                        method: 'POST',
                    },
                    // dom: 'Bfrtip',
                });
            });

        });
    </script>
@endsection