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
                    <a href="{{ url('adminRs/medical_record') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url('adminRs/medical_record')}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-2">
                        <div class="col-form-label">
                            <label class="col-sm-3 col-form-label">Desa/Kelurahan</label>
                            <input name="idMDesa" class="form-control" type="text" value="{{ $medical_rec->desa->nama }}" disabled>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">Mitra</div>
                        <input name="idFaskes" class="form-control" type="text" value="{{ $medical_rec->faskes->nama }}" disabled>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">
                            <label class="col-sm-3 col-form-label">Jenis</label>
                            <input name="jenis" class="form-control" type="text" value="Family Folder" disabled>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-form-label">
                            <label class="col-sm-3 col-form-label" for="kode_wilayah">Kode Wilayah</label>
                            <input name="kode_wilayah" class="form-control" type="number" value="{{ $medical_rec->kode_wilayah }}">
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
    <script>
        $(document).ready(function() {
            // Menyembunyikan input "Kode Wilayah" saat halaman dimuat
            var jenis = '{{ $medical_rec["jenis"] }}';
            if (jenis == 'individual') {
                $('#kode_wilayah').hide();
                $('#kode_keluarga').hide();
            } else {
                $('#kode_wilayah').show();
                $('#kode_keluarga').show();
            }
            
            // Menambahkan event listener untuk perubahan pada dropdown "Jenis"
            $('#jenis').change(function() {
                // Mendapatkan nilai yang dipilih pada dropdown "Jenis"
                var selectedOption = $(this).val();
            
                // Memeriksa apakah pilihan adalah "family"
                if (selectedOption === 'family') {
                // Jika pilihan adalah "family", tampilkan input "Kode Wilayah"
                $('#kode_wilayah').show();
                $('#kode_keluarga').show();
                } else {
                // Jika pilihan bukan "family", sembunyikan input "Kode Wilayah"
                $('#kode_wilayah').hide();
                $('#kode_keluarga').hide();
                }
            });
        });
    </script>
@endsection