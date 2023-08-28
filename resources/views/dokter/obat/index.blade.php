@extends( $dokter )

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
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="col-sm-3 col-form-label">Cabang Mitra</label>
                    <select id="select-cabang" class="form-control" name="idLokasiPemeriksaan" aria-label="Default select example" required>
                        <option value="">Pilihan Cabang Mitra Sedang Proses</option>
                    </select>
                </div>
                <div class="table-responsive" id="tabel-jquery">
                    <table id="isi-tabel" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>Stok Awal</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Status</th>
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
    {{-- <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">{{ $page }}</h5>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-striped thead-primary w-100">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama</th>
                                <th>Mitra</th>
                                <th>Cabang Mitra</th>
                                <th>Stok Awal</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $ob)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ob->nama }}</td>
                                    <td>{{ $ob->faskes->nama }}</td>
                                    <td>{{ $ob->lokasiPemeriksaan->nama }}</td>
                                    <td>{{ $ob->stok_awal }}</td>
                                    <td>{{ $ob->satuan }}</td>
                                    <td>{{ $ob->harga }}</td>
                                    <td>
                                        @if ($ob->status == 1)
                                            <span class="badge badge-success me-auto">Tersedia</span> 
                                        @elseif ($ob->status == 2)
                                            <span class="badge badge-danger me-auto">Habis</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </table>
        </div>
        </div>
    </div> --}}
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
            $("#isi-tabel").DataTable();

            let baseUrl     = '{{ url('') }}';
            let idFaskes = "{{ session()->get('idFaskes') }}";
            $('#tabel-jquery').hide();

            $.getJSON(baseUrl+'/api/getLokasi/'+idFaskes, (result) => {
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

            $('#select-cabang').on('change', function() {
                $("#isi-tabel").DataTable().clear().destroy(); 
                
                $('#tabel-jquery').show();
                var idLokasiPemeriksaan = $('#select-cabang').val();
                $("#isi-tabel").DataTable({
                    language: { 
                        emptyTable: "Tidak ada data Obat",
                        info: "Total: _TOTAL_ Data Obat",
                        infoEmpty: "Menampilkan 0 dari 0 Data Obat",
                    },
                    responsive:  true,
                    autoWidth: false,
                    processing: true,
                    ajax: {
                        url: baseUrl+'/api/dokter/getObatDokter/' + idLokasiPemeriksaan,
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