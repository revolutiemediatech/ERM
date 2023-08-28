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
                    <a href="{{ url('dokter/pasienn') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke dokter/daerah , karena pake resource --}}
            <form action="{{ url("dokter/pasienn")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $pasien->id }}">
                        <div class="mb-3">
                            <label class="col-form-label" for="username">Tanggal</label>
                            <input name="tanggal" id="tanggal" class="form-control form-control-lg" type="date" value="{{ $pasien->tanggal }}" placeholder="Tanggal">
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Perawatan</div>
                                @foreach ($perawatan as $p)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="idMPerawatan" id="optionsRadios1" value="{{ $p->id }}" 
                                            {{ ($p->id == $pasien->idMPerawatan) ? 'checked' : '' }}>
                                            {{ $p->nama }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Lokasi Pemeriksaan</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idLokasiPemeriksaan" required>
                                    <option value="{{ $pasien->idLokasiPemeriksaan }}">{{ $pasien->lokasiPemeriksaan->nama ?? '' }}</option>
                                    <option value="">Pilih Lokasi Pemeriksaan</option>
                                    @foreach ($lokasiPemeriksaan as $lp)
                                        <option value="{{ $lp->id }}">{{ $lp->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Unit Pelayanan</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMUnitPelayanan" required>
                                    <option value="{{ $pasien->idMUnitPelayanan }}">{{ $pasien->unitPelayanan->nama ?? '' }}</option>
                                    <option value="">Pilih Unit Pelayanan</option>
                                    @foreach ($unitPelayanan as $up)
                                        <option value="{{ $up->id }}">{{ $up->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Kunjungan Sakit</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMKunjunganSakit" required>
                                    <option value="{{ $pasien->idMKunjunganSakit }}">{{ $pasien->kunjunganSakit->nama ?? '' }}</option>
                                    <option value="">Pilih Kunjungan Sakit</option>
                                    @foreach ($kunjunganSakit as $ks)
                                        <option value="{{ $ks->id }}">{{ $ks->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="nama">Nama Pasien</label>
                                <input name="nama" id="nama" class="form-control" type="text" value="{{ $pasien->nama }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">NIK</label>
                                <input name="nik" id="nik" class="form-control" type="text" value="{{ $pasien->nik }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">No Rekam Medis</label>
                                <input name="no_index" id="no_index" class="form-control" type="text" value="{{ $pasien->no_index }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">No KK</label>
                                <input name="no_kk" id="no_kk" class="form-control" type="text" value="{{ $pasien->no_kk }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">Nama KK</label>
                                <input name="nama_kk" id="nama_kk" class="form-control" type="text" value="{{ $pasien->nama_kk }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label pt-0" for="username">No KS</label>
                                <input name="no_ks" id="no_ks" class="form-control" type="text" value="{{ $pasien->no_ks }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">No HP</label>
                                <input name="no_hp" id="no_hp" class="form-control" type="text" value="{{ $pasien->no_hp }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="username">Tanggal Lahir</label>
                                <input name="tanggal_lahir" id="tanggal_lahir" class="form-control" type="date" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Jenis Pasien</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMJenisPas" required>
                                    <option value="{{ $pasien->idMJenisPas }}">{{ $pasien->jenisPasien->nama ?? '' }}</option>
                                    <option value="">Pilih Jenis Pasien</option>
                                    @foreach ($jenisPasien as $jp)
                                        <option value="{{ $jp->id }}">{{ $jp->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Mitra</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idFaskes" required>
                                    <option value="{{ $pasien->idFaskes }}">{{ $pasien->faskes->nama ?? '' }}</option>
                                    <option value="">Pilih Mitra</option>
                                    @foreach ($faskes as $faskes)
                                        <option value="{{ $faskes->id }}">{{ $faskes->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Jenis Kelamin</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMJenisKel" required>
                                    <option value="{{ $pasien->idMJenisKel }}">{{ $pasien->jenisKelamin->nama ?? '' }}</option>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    @foreach ($jenisKelamin as $jk)
                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Golongan Darah</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMGoldar" required>
                                    <option value="{{ $pasien->idMGoldar }}">{{ $pasien->goldar->nama ?? '' }}</option>
                                    <option value="">Pilih Golongan Darah</option>
                                    @foreach ($golonganDarah as $gd)
                                        <option value="{{ $gd->id }}">{{ $gd->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Pendidikan</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMPendidikan" required>
                                    <option value="{{ $pasien->idMPendidikan }}">{{ $pasien->pendidikan->nama ?? '' }}</option>
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach ($pendidikan as $pd)
                                        <option value="{{ $pd->id }}">{{ $pd->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Pekerjaan</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMPekerjaan" required>
                                    <option value="{{ $pasien->idMPekerjaan }}">{{ $pasien->pekerjaan->nama ?? '' }}</option>
                                    <option value="">Pilih Pekerjaan</option>
                                    @foreach ($pekerjaan as $pkr)
                                        <option value="{{ $pkr->id }}">{{ $pkr->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Provinsi</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMProvinsi" required>
                                    <option value="{{ $pasien->idMProvinsi }}">{{ $pasien->provinsi->nama ?? '' }}</option>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsi as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Daerah</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMDaerah" required>
                                    <option value="{{ $pasien->idMDaerah }}">{{ $pasien->daerah->nama ?? '' }}</option>
                                    <option value="">Pilih Daerah</option>
                                    @foreach ($daerah as $daerah)
                                        <option value="{{ $daerah->id }}">{{ $daerah->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Kecamatan</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMKecamatan" required>
                                    <option value="{{ $pasien->idMKecamatan }}">{{ $pasien->kecamatan->nama ?? '' }}</option>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-form-label">Desa/Kelurahan</div>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idMDesa" required>
                                    <option value="{{ $pasien->idMDesa }}">{{ $pasien->desa->nama ?? '' }}</option>
                                    <option value="">Pilih Desa/Kelurahan</option>
                                    @foreach ($desa as $desa)
                                        <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleTextarea1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="exampleTextarea1" rows="4">{{ $pasien->alamat }}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="nama">RT</label>
                                <input name="rt" id="rt" class="form-control" type="text" value="{{ $pasien->rt }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="nama">RW</label>
                                <input name="rw" id="rw" class="form-control" type="text" value="{{ $pasien->rw }}">
                            </div>
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