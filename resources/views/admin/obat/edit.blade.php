@extends($admin)

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
                    <a href="{{ url('admin/obat') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url("admin/obat")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $obat->id }}">
                        <div class="mb-3">
                            <div class="col-form-label">Mitra</div>
                            <select id="select-mitra" class="form-control form-control-lg Select2" name="idFaskes" aria-label="Default select example">
                                <option value="{{ $obat->idFaskes }}">{{ $obat->faskes->nama }}</option>
                                <option value="">Pilihan Mitra Sedang di Proses</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Cabang Mitra</div>
                            <select id="select-lokasi" class="form-control form-control-lg Select2" name="idLokasiPemeriksaan" aria-label="Default select example" required>
                                <option value="{{ $obat->idLokasiPemeriksaan }}">{{ $obat->lokasiPemeriksaan->nama }}</option>
                                <option value="">Pilih Mitra Terlebih Dahulu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama</label>
                            <input name="nama" id="nama" class="form-control" type="text" value="{{ $obat->nama }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Stok Awal</label>
                            <input name="stok_awal" id="stok_awal" class="form-control form-control-lg" type="text" value="{{ $obat->stok_awal }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Satuan</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="satuan" required>
                                <option value="{{ $obat->satuan }}  {{ old('satuan', $obat->satuan) == $obat->satuan ? 'selected' : '' }}">{{ $obat->satuan }}</option>
                                <option value="">Pilih Satuan</option>
                                <option value="Biji">Biji</option>
                                <option value="Kap">Kaplet</option>
                                <option value="Tab">Tablet</option>
                                <option value="Btl">Botol</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Dosis Sediaan Obat</label>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input name="dosis_sediaan_obat" id="dosis_sediaan_obat" class="form-control form-control-lg" type="text" value="{{ $obat->dosis_sediaan_obat }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control form-control-lg Select2" name="satuan_dso">
                                        <option value="{{ $obat->satuan_dso }}">{{ $obat->satuan_dso }}</option>
                                        <option value="">Pilih Satuan</option>
                                        <option value="Miligram">Miligram</option>
                                        <option value="Mikrogram">Mikrogram</option>
                                        <option value="Gram">Gram</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Dosis per BB Batas Bawah</label>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <select class="form-control form-control-lg Select2" name="dosis_perBB_bawah">
                                        <option value="{{ $obat->dosis_perBB_bawah }}">{{ $obat->dosis_perBB_bawah }}</option>
                                        <option value="">Pilih Satuan</option>
                                        <option value="0,1">0,1</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control form-control-lg Select2" name="ket_dbb">
                                        <option value="{{ $obat->ket_dbb }}">{{ $obat->ket_dbb }}</option>
                                        <option value="">Pilih Keterangan</option>
                                        <option value="per Menit">per Menit</option>
                                        <option value="per Jam">per Jam</option>
                                        <option value="per 6 Jam">per 6 Jam</option>
                                        <option value="per 8 Jam">per 8 Jam</option>
                                        <option value="per 12 Jam">per 12 Jam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Dosis per BB Batas Atas</label>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <select class="form-control form-control-lg Select2" name="dosis_perBB_atas">
                                        <option value="{{ $obat->dosis_perBB_atas }}">{{ $obat->dosis_perBB_atas }}</option>
                                        <option value="">Pilih Satuan</option>
                                        <option value="0,1">0,1</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control form-control-lg Select2" name="ket_dba">
                                        <option value="{{ $obat->ket_dba }}">{{ $obat->ket_dba }}</option>
                                        <option value="">Pilih Keterangan</option>
                                        <option value="per Menit">per Menit</option>
                                        <option value="per Jam">per Jam</option>
                                        <option value="per 6 Jam">per 6 Jam</option>
                                        <option value="per 8 Jam">per 8 Jam</option>
                                        <option value="per 12 Jam">per 12 Jam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Harga</label>
                            <input name="harga" id="harga" class="form-control form-control-lg" type="text" value="{{ $obat->harga }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Tanggal Expired</label>
                            <input name="expired" id="expired" class="form-control form-control-lg" type="date" placeholder="Tanggal Expired">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Pembiayaan</label>
                            <select class="form-control form-control-lg Select2" id="select2" name="pembiayaan">
                                <option value="{{ $obat->pembiayaan }}">{{ $obat->pembiayaann->nama }}</option>
                                <option value="">Pilih Jenis Pembiayaan</option>
                                @foreach ($jenis_pasien as $jp)
                                    <option value="{{ $jp->id }}">{{ $jp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <div class="col-form-label">Status<span class="small text-danger">*</span></div>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="status" required>
                                <option value="{{ $obat->status }}">
                                    @if ( $obat->status == 1 )
                                        Tersedia
                                    @elseif ( $obat->status == 2 )
                                        Habis
                                    @endif
                                </option>
                                <option value="">Pilih Status</option>
                                <option value="1">Tersedia</option>
                                <option value="2">Habis</option>
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
@endsection