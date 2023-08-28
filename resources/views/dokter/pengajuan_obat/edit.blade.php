@extends($dokter)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    {{-- Tempat Ngoding isi web --}}
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- Alerts-->
        @if (session()->has('sukses'))
        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('gagal'))
        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
            {{ session('gagal') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- End of Alerts-->
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Detail Pasien</h5>
                    </div>
                    <div class="col-lg-6 fle d-flex justify-content-end">
                        <a href="{{ url('admin/pengajuan-obat') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end">Nama Pasien</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $diagnosa->pasien->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">No Rekam Medis</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $diagnosa->pasien->no_index }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Diagnosa</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $diagnosa->assesment }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">{{ $page }}</h5>
                    </div>
                </div>
            </div>
            {{-- otomatis masuk ke admin/bp-umum , karena pake resource --}}
            <form action="{{ url("admin/pengajuan-obat")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $diagnosa->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama Obat</label>
                            <select id="select-role" class="form-control" name="idMObat" required>
                                <option value="">Pilih Obat</option>
                                @foreach ($obat as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                        </div>
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