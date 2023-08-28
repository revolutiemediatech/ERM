@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Detail Data Pemeriksaan SD - SMA</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('admin/pemeriksaan-gigi') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end"><b>Nama</b></td>
                                <td>:</td>
                                <td class="text-sm-start"><b>{{ $jawaban_sdSma->nama }}</b></td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $jawaban_sdSma->faskes->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Sekolah</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $jawaban_sdSma->sekolah->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kelas</td>
                                <td>:</td>
                                <td class="text-sm-start">
                                    @if ($jawaban_sdSma->idKelas == 1)
                                        1 SD
                                    @elseif ($jawaban_sdSma->idKelas == 2)
                                        2 SD
                                    @elseif ($jawaban_sdSma->idKelas == 3)
                                        3 SD
                                    @elseif ($jawaban_sdSma->idKelas == 4)
                                        4 SD
                                    @elseif ($jawaban_sdSma->idKelas == 5)
                                        5 SD
                                    @elseif ($jawaban_sdSma->idKelas == 6)
                                        6 SD
                                    @elseif ($jawaban_sdSma->idKelas == 7)
                                        1 SMP
                                    @elseif ($jawaban_sdSma->idKelas == 8)
                                        2 SMP
                                    @elseif ($jawaban_sdSma->idKelas == 9)
                                        3 SMP
                                    @elseif ($jawaban_sdSma->idKelas == 10)
                                        1 SMA
                                    @elseif ($jawaban_sdSma->idKelas == 11)
                                        2 SMA
                                    @elseif ($jawaban_sdSma->idKelas == 12)
                                        3 SMA
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Jenis Kelamin</td>
                                <td>:</td>                          
                                {{-- <td class="text-sm-start">{{ $skrining_gigi->jenis_kelamin }}</td> --}}
                                <td class="text-sm-start">
                                    @if ($jawaban_sdSma->jenis_kelamin = 1)
                                        Laki-Laki
                                    @else
                                        Prempuan
                                    @endif    
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Tanggal Lahir</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $jawaban_sdSma->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nomor Hp</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $jawaban_sdSma->no_hp }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Status Gizi</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Berat Badan</td>
                                <td>{{ $jawaban_sdSma->berat_badan }} Kg</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tinggi Badan</td>
                                <td>{{ $jawaban_sdSma->tinggi_badan }} cm</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Apakah Ditemukan Hal Dibawah ini?</td>
                                <td>{{ $jawaban_sdSma->ap_kam_hal_dib_in ?? 'Tidak' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Kebersihan Diri</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Apakah Rambut Bermasalah?</td>
                                <td>{{ $jawaban_sdSma->ram_ber }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Apakah Ditemukan Hal Dibawah Ini? </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kulit Bersisik </td>
                                <td>{{ $jawaban_sdSma->mas_kulit ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kulit Ada Memar </td>
                                <td>{{ $jawaban_sdSma->mas_kulit ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kulit Ada Luka Sayatan </td>
                                <td>{{ $jawaban_sdSma->mas_kulit ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kulit Ada Koreng </td>
                                <td>{{ $jawaban_sdSma->mas_kulit ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kulit Ada Koreng Yang Sukar Sembuh </td>
                                <td>{{ $jawaban_sdSma->mas_kulit ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kulit Ada Bekas Suntikan </td>
                                <td>{{ $jawaban_sdSma->mas_kulit ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Apakah Kuku Bermasalah? </td>
                                <td>{{ $jawaban_sdSma->mas_kuku ?? 'Sehat' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Kesehatan Penglihatan</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Apakah Mata Luar Ada Masalah?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Infeksi Mata Kanan</td>
                                <td>{{ $jawaban_sdSma->inf_mata_kan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Infeksi Mata Kiri</td>
                                <td>{{ $jawaban_sdSma->inf_mata_kir ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tajam Penglihatan Bermasalah? </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Mata Kanan => </b>Kelainan Refraksi</td>
                                <td>{{ $jawaban_sdSma->kel_ref_matKan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Mata Kanan => </b>Low Vision </td>
                                <td>{{ $jawaban_sdSma->low_vis_matKan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Mata Kanan => </b>Kebutaan </td>
                                <td>{{ $jawaban_sdSma->keb_matKan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Mata Kanan => </b>Kacamata</td>
                                <td>{{ $jawaban_sdSma->kac_matKan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Mata Kiri => </b>Kelainan Refraksi </td>
                                <td>{{ $jawaban_sdSma->kel_ref_matKir ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Mata Kiri => </b>Low Vision </td>
                                <td>{{ $jawaban_sdSma->low_vis_matKir ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Mata Kiri => </b>Kebutaan </td>
                                <td>{{ $jawaban_sdSma->keb_matKir ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Mata Kiri => </b>Kacamata</td>
                                <td>{{ $jawaban_sdSma->kac_matKir ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Apakah Buta Warna? </td>
                                <td>{{ $jawaban_sdSma->but_war ?? 'Sehat' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Kesehatan Pendengaran</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Apakah Ditemukan Hal Berikut?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Telinga Luar Kanan => </b>Otitis Media</td>
                                <td>{{ $jawaban_sdSma->ott_med_telKan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Telinga Luar Kanan => </b>Otitis Eksterna </td>
                                <td>{{ $jawaban_sdSma->ott_eks_telKan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Telinga Luar Kanan => </b>Serumen </td>
                                <td>{{ $jawaban_sdSma->ser_telKan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Telinga Luar Kiri => </b>Otitis Media </td>
                                <td>{{ $jawaban_sdSma->kel_ref_matKir ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Telinga Luar Kiri => </b>Otitis Eksterna </td>
                                <td>{{ $jawaban_sdSma->ott_med_telKir ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><b>Telinga Luar Kiri => </b>Serumen </td>
                                <td>{{ $jawaban_sdSma->ott_eks_telKir ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Apakah Ada Gangguan Pendengaran?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Telinga Kanan </td>
                                <td>{{ $jawaban_sdSma->gang_telKan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Telinga Kiri </td>
                                <td>{{ $jawaban_sdSma->gang_telKir ?? 'Tidak' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Kesehatan Gigi dan Mulut</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Apakah Pada Rongga Mulut Ditemukan Hal Dibawah Ini</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Celah Bibir/Langit Langit</td>
                                <td>{{ $jawaban_sdSma->cel_bib ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Luka Pada Sudut Mulut </td>
                                <td>{{ $jawaban_sdSma->luk_sud_mul ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Sariawan </td>
                                <td>{{ $jawaban_sdSma->sariawan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Lidah Kotor </td>
                                <td>{{ $jawaban_sdSma->lid_kot ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Luka Lainnya </td>
                                <td>{{ $jawaban_sdSma->luka_lain ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Apakah Pada Gigi Dan Gusi Ditemukan Hal Dibawah Ini?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Gigi Berlubang/Karies </td>
                                <td>{{ $jawaban_sdSma->gig_berlub ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Gusi Mudah Berdarah </td>
                                <td>{{ $jawaban_sdSma->gus_mud_darah ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Gusi Bengkak </td>
                                <td>{{ $jawaban_sdSma->gus_beng ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Gigi Kotor </td>
                                <td>{{ $jawaban_sdSma->gig_kot ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Karang Gigi </td>
                                <td>{{ $jawaban_sdSma->kar_gigi ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Susunan Gigi Depan Tidak Teratur </td>
                                <td>{{ $jawaban_sdSma->sus_gig_dep_tTeratur ?? 'Tidak' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Kebugaran Jasmani</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kebugaran Jasmani</td>
                                <td>{{ $jawaban_sdSma->keb_jas ?? 'Tidak' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Alat Bantu</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Penggunaan Alat Bantu</td>
                                <td>{{ $jawaban_sdSma->peng_alBan ?? 'Tidak' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Tanda Vital</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tekanan Darah Systole</td>
                                <td>{{ $jawaban_sdSma->td_sys ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tekanan Darah Diastole</td>
                                <td>{{ $jawaban_sdSma->td_dias ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Denyut Nadi / Menit (Angkanya Saja)</td>
                                <td>{{ $jawaban_sdSma->deny_nad ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Suhu</td>
                                <td>{{ $jawaban_sdSma->suhu ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Apakah Ditemukan Hal Dibawah Ini</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Bising Jantung</td>
                                <td>{{ $jawaban_sdSma->bis_jan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Bising Paru</td>
                                <td>{{ $jawaban_sdSma->bis_par ?? 'Tidak' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Tindak Lanjut</b></h5>
                    </div>
                    {{-- <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url("$url") }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div> --}}
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Pertanyaan</th>
                                <th width="15%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rujuk Puskesmas</td>
                                <td>{{ $jawaban_sdSma->ruj_pus ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pemberian TTD</td>
                                <td>{{ $jawaban_sdSma->pem_ttd ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pemberian Obat Cacing</td>
                                <td>{{ $jawaban_sdSma->pem_obCac ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kepemilikan Buku Rapor Kesehatan</td>
                                <td>{{ $jawaban_sdSma->kep_bukRapSehat ?? 'Tidak' }}</td>
                            </tr>
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
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
@endsection