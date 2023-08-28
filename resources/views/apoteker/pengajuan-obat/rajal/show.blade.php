@extends($apoteker)

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
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">{{ $page }} Pengajuan Obat</h5>
                    </div>
                    <div class="col-lg-6 fle d-flex justify-content-end">
                        <span class='btn btn-success'><b>{{ $pasien->jenisPasien->nama }}</b></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-2">
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Nama Lengkap</label>
                                <div class="col-sm-2">
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->nama }}" disabled> 
                                </div>
                                <div class="col-sm-1">
                                    @if ($pasien->idMJenisKel == 1)
                                        <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-sm text-center" type="text" value="P" disabled>
                                    @elseif ($pasien->idMJenisKel == 2)
                                    <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-sm text-center" type="text" value="L" disabled>
                                    @endif
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Alamat</label>
                                <div class="col-sm-3">
                                    <input name="alamat" id="alamat" class="form-control form-control-sm" type="text" value="{{ $pasien->alamat }}" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Pendidikan</label>
                                <div class="col-sm-3">
                                    <input name="pendidikan" id="pendidikan" class="form-control form-control-sm" type="text" value="{{ $pasien->pendidikan->nama }}" disabled> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">No Rekam Medis</label>
                                <div class="col-sm-3">
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->no_index }}" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Tanggal Lahir/Usia</label>
                                <div class="col-sm-3">
                                    <input name="alamat" id="alamat" class="form-control form-control-sm" type="text" value="{{ $pasien->tanggal_lahir }} / {{ $usia}} Tahun" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Pekerjaan</label>
                                <div class="col-sm-3">
                                    <select id="select-pekerjaan" class="form-control form-control-sm" name="pekerjaan1[]" multiple="multiple" disabled>
                                        @foreach ($pilihanPekerjaan as $pk)
                                            <option value="{{ $pk->id }}" selected>{{ $pk->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">NIK</label>
                                <div class="col-sm-3">
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->nik }}" disabled> 
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">Golongan Darah</label>
                                <div class="col-sm-2">
                                    <input name="nama" id="nama" class="form-control form-control-sm" type="text" value="{{ $pasien->goldar->nama }}" disabled> 
                                </div>
                                <div class="col-sm-1">
                                    <input name="idMJenisKel" id="idMJenisKel" class="form-control form-control-sm" type="text" value="{{ $pasien->rhesus->nama ?? '' }}" disabled>
                                </div>
                                <label for="colFormLabel" class="col-sm-1 col-form-label-sm">No Hp</label>
                                <div class="col-sm-3">
                                    <input name="no_hp" id="no_hp" class="form-control form-control-sm" type="text" value="{{ $pasien->no_hp }}" disabled> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 flex d-flex justify-content-center">
                        <div class="btn-group">
                            <a href='#pempenunModalTambah' type="button" class="btn btn-lg btn-primary" data-toggle="modal">
                                <i class="fas fa-plus-square"></i> <b>Tambah Data</b>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ms-panel-body mb-3">
                            <div class="table-responsive">
                                <table id="basic-1" class="table table-striped thead-primary w-100">
                                    <thead>
                                        <tr>
                                        <th width="50">No</th>
                                        <th>Nama Obat</th>
                                        <th>Dosis</th>
                                        <th>Jumlah</th>
                                        <th>Racikan(Jumlah)</th>
                                        <th>Harga</th>
                                        <th>Pembiayaan</th>
                                        <th>Keterangan</th>
                                        <th width="10%"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pilihanObat as $po)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $po->obat->nama }}</td>
                                            <td>{{ $po->dosis ?? 'belum diinput hasil' }}</td>
                                            <td>{{ $po->jumlah }}</td>
                                            <td></td>
                                            <td>Rp {{ $po->obat->harga }}</td>
                                            <td>{{ $po->obat->pembiayaann->nama ?? '-' }}</td>
                                            <td>{{ $po->keterangan }}</td>
                                            <td>
                                                <a href="#pempenunModal" data-toggle="modal"><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals-and-toasts')
    <!-- Modal -->
    <div class="modal fade" id="pempenunModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Edit Data Pengajuan Obat</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-header">
                                <h6>Informasi Pasien</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation" action="{{ url("apoteker/pengajuan-obat-rajal")}}/{{ $id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Nama</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom01" value="{{ $pasien->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">No Rekam Medis</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom02" value="{{ $pasien->no_index }}" disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">NIK</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom03" value="{{ $pasien->nik }}" disabled>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Data Obat</b></label>
                                            <select id="select-namaObat" class="form-control form-control-sm" name="nama_obat[]" multiple="multiple">
                                                <option value="">Pilih Obat</option>
                                                @foreach ($pilihanObat as $po)
                                                    <option value="{{ $po->idObat }}" selected>{{ $po->obat->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Dosis</b></label>
                                            <select id="select-dosisObat" class="form-control form-control-sm" name="dosis[]" multiple="multiple">
                                                @foreach ($pilihanObat as $po)
                                                    <option value="{{ $po->dosis }}" selected>{{ $po->dosis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Jumlah</b></label>
                                            <select id="select-jumlahObat" class="form-control form-control-sm" name="jumlah[]" multiple="multiple">
                                                @foreach ($pilihanObat as $po)
                                                    <option value="{{ $po->jumlah }}" selected>{{ $po->jumlah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Keterangan</b></label>
                                            <select id="select-keteranganObat" class="form-control form-control-sm" name="keterangan[]" multiple="multiple">
                                                @foreach ($pilihanObat as $po)
                                                    <option value="{{ $po->keterangan }}" selected>{{ $po->keterangan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @php
                                        $pilihanObat == $po
                                    @endphp
                                    @if ($po->tepat_pasien == 0 && $po->tepat_obat == 0 && $po->tepat_waktu_pemberian == 0 && $po->tepat_cara_pemberian == 0 && 
                                    $po->tepat_indikasi == 0 && $po->tidak_ada_polifarmasi == 0 && $po->sediaan_nama_obat == 0 && $po->dosis_unlock == 0 && $po->cara_pemakaian == 0 && 
                                    $po->indikasi == 0 && $po->kontra_indikasi == 0 && $po->efek_samping == 0 && $po->penyimpanan == 0 && $po->alergi_obat == 0)
                                        <a href="#checklisUnlock" data-toggle="modal" class="btn btn-warning">Checklist</a>
                                        {{-- <input type="submit" class="btn btn-warning" value="Checklist"> --}}
                                    @elseif ($po->sediaan_nama_obat == 0 && $po->dosis_unlock == 0 && $po->cara_pemakaian == 0 && 
                                    $po->indikasi == 0 && $po->kontra_indikasi == 0 && $po->efek_samping == 0 && $po->penyimpanan == 0 && $po->alergi_obat == 0)
                                        <a href="#checklisUnlock" data-toggle="modal" class="btn btn-warning">Checklist</a>
                                        {{-- <input type="submit" class="btn btn-warning" value="Checklist"> --}}
                                    @else
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                    @endif
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal checklist Unlock -->
    <div class="modal fade" id="checklisUnlock" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Checklist Data Pengajuan Obat</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-header">
                                <h6>Informasi Pasien</h6>
                            </div>
                            <div class="ms-panel-body">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Nama</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom01" value="{{ $pasien->nama }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">No Rekam Medis</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom02" value="{{ $pasien->no_index }}" disabled>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">NIK</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom03" value="{{ $pasien->nik }}" disabled>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-panel-header">
                                <h6>Informasi Obat</h6>
                            </div>
                            <div class="ms-panel-body">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Data Obat</b></label>
                                            <select id="select-namaObat2" class="form-control form-control-sm" name="nama_obat[]" multiple="multiple" disabled>
                                                <option value="">Pilih Obat</option>
                                                @foreach ($pilihanObat as $po)
                                                    <option value="{{ $po->idObat }}" selected>{{ $po->obat->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Dosis</b></label>
                                            <select id="select-dosisObat2" class="form-control form-control-sm" name="dosis[]" multiple="multiple" disabled>
                                                @foreach ($pilihanObat as $po)
                                                    <option value="{{ $po->dosis }}" selected>{{ $po->dosis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Jumlah</b></label>
                                            <select id="select-jumlahObat2" class="form-control form-control-sm" name="jumlah[]" multiple="multiple" disabled>
                                                @foreach ($pilihanObat as $po)
                                                    <option value="{{ $po->jumlah }}" selected>{{ $po->jumlah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Keterangan</b></label>
                                            <select id="select-keteranganObat2" class="form-control form-control-sm" name="keterangan[]" multiple="multiple" disabled>
                                                @foreach ($pilihanObat as $po)
                                                    <option value="{{ $po->keterangan }}" selected>{{ $po->keterangan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="ms-panel-header">
                                <h6>Checklist</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation" action="{{ url("apoteker/pengajuan-obat-rajal")}}/{{ $id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <h6 style="color: #009EFB">Telaah Resep</h6>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Tepat Pasien</b></label>
                                            <ul class="ms-list d-flex">
                                                @if ($po->tepat_pasien == 1)
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_pasien" value="{{ $po->tepat_pasien }}" checked>
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> 
                                                        @if ($po->tepat_pasien == 1 )
                                                            Ya
                                                        @else
                                                            Tidak
                                                        @endif
                                                    </span>
                                                </li>
                                                @else
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_pasien" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_pasien" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Tepat Obat</b></label>
                                            <ul class="ms-list d-flex">
                                                @if ($po->tepat_obat == 1 )
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_obat" value="{{ $po->tepat_obat }}" checked>
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> 
                                                        @if ($po->tepat_pasien == 1 )
                                                            Ya
                                                        @else
                                                            Tidak
                                                        @endif
                                                    </span>
                                                </li>
                                                @else
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_obat" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_obat" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Tepat Waktu Pemberian</b></label>
                                            <ul class="ms-list d-flex">
                                                @if ($po->tepat_waktu_pemberian == 1 )
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_waktu_pemberian" value="{{ $po->tepat_waktu_pemberian }}" checked>
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> 
                                                        @if ($po->tepat_pasien == 1 )
                                                            Ya
                                                        @else
                                                            Tidak
                                                        @endif
                                                    </span>
                                                </li>
                                                @else
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_waktu_pemberian" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_waktu_pemberian" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Tepat Cara Pemberian</b></label>
                                            <ul class="ms-list d-flex">
                                                @if ($po->tepat_cara_pemberian == 1 )
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_cara_pemberian" value="{{ $po->tepat_cara_pemberian }}" checked>
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> 
                                                        @if ($po->tepat_pasien == 1 )
                                                            Ya
                                                        @else
                                                            Tidak
                                                        @endif
                                                    </span>
                                                </li>
                                                @else
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_cara_pemberian" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_cara_pemberian" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Tepat Indikasi</b></label>
                                            <ul class="ms-list d-flex">
                                                @if ($po->tepat_indikasi == 1 )
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_indikasi" value="{{ $po->tepat_indikasi }}" checked>
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> 
                                                        @if ($po->tepat_pasien == 1 )
                                                            Ya
                                                        @else
                                                            Tidak
                                                        @endif
                                                    </span>
                                                </li>
                                                @else
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_indikasi" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tepat_indikasi" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Tidak Ada Polifarmasi</b></label>
                                            <ul class="ms-list d-flex">
                                                @if ($po->tidak_ada_polifarmasi == 1 )
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tidak_ada_polifarmasi" value="{{ $po->tidak_ada_polifarmasi }}" checked>
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> 
                                                        @if ($po->tepat_pasien == 1 )
                                                            Ya
                                                        @else
                                                            Tidak
                                                        @endif
                                                    </span>
                                                </li>
                                                @else
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tidak_ada_polifarmasi" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="tidak_ada_polifarmasi" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 style="color: #009EFB">Pemberian Infomasi Obat</h6>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Sediaan Nama Obat</b></label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="sediaan_nama_obat" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="sediaan_nama_obat" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Dosis</b></label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="dosis_unlock" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="dosis_unlock" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Cara Pemakaian</b></label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="cara_pemakaian" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="cara_pemakaian" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Indikasi</b></label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="indikasi" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="indikasi" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Kontra Indikasi</b></label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="kontra_indikasi" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="kontra_indikasi" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Efek Samping</b></label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="efek_samping" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="efek_samping" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Penyimpanan</b></label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="penyimpanan" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="penyimpanan" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Alergi Obat</b></label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="alergi_obat" value="1">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Ya </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                    <input type="radio" name="alergi_obat" value="0">
                                                    <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Tidak </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="pempenunModalTambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Tambah Pengajuan Obat</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-header">
                                <h6>Informasi Pasien</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation" action="{{ url("apoteker/pengajuan-obat-rajal")}}/{{ $id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Nama</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom01" value="{{ $pasien->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">No Rekam Medis</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom02" value="{{ $pasien->no_index }}" disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">NIK</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom03" value="{{ $pasien->nik }}" disabled>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Data Obat</b></label>
                                            <select id="select-namaObat1" class="form-control form-control-sm" name="nama_obat[]" multiple="multiple">
                                                <option value="">Pilih Obat</option>
                                                @foreach ($obat as $ob)
                                                    <option value="{{ $ob->id }}">{{ $ob->nama}} (Stok = {{ $ob->stok_akhir}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Dosis</b></label>
                                            <select id="select-dosisObat1" class="form-control form-control-sm" name="dosis[]" multiple="multiple">
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Jumlah</b></label>
                                            <select id="select-jumlahObat1" class="form-control form-control-sm" name="jumlah[]" multiple="multiple">
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="col-form-label pt-0" for="penyakit"><b>Keterangan</b></label>
                                            <select id="select-keteranganObat1" class="form-control form-control-sm" name="keterangan[]" multiple="multiple">
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endpush

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
    {{-- Tempat Ngoding Meletakkan js custom --}}
    <script>
        $(function() {
            $('#select-namaObat').select2({
                tags: true,
            });
            $('#select-dosisObat').select2({
                tags: true,
            });
            $('#select-jumlahObat').select2({
                tags: true,
            });
            $('#select-keteranganObat').select2({
                tags: true,
            });
            $('#select-namaObat1').select2({
                tags: true,
            });
            $('#select-dosisObat1').select2({
                tags: true,
            });
            $('#select-jumlahObat1').select2({
                tags: true,
            });
            $('#select-keteranganObat1').select2({
                tags: true,
            });
            $('#select-pekerjaan').select2({
                tags: true,
            });
        });
        </script>
@endsection
