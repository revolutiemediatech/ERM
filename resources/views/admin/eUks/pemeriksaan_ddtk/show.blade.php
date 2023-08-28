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
                        <h5 class="card-title">Detail Data Pemeriksaan DDTK</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('admin/pemeriksaan-ddtk') }}" class="btn btn-sm btn-primary">Kembali</a>
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
                                <td class="text-sm-start"><b>{{ $jawaban_ddtk->nama }}</b></td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $jawaban_ddtk->faskes->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Sekolah</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $jawaban_ddtk->sekolah->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kelas</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $jawaban_ddtk->kelas }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Jenis Kelamin</td>
                                <td>:</td>                          
                                {{-- <td class="text-sm-start">{{ $skrining_gigi->jenis_kelamin }}</td> --}}
                                <td class="text-sm-start">
                                    @if ($jawaban_ddtk->jenis_kelamin = 1)
                                        Laki-Laki
                                    @else
                                        Prempuan
                                    @endif    
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Tanggal Lahir</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $jawaban_ddtk->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nomor Hp</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $jawaban_ddtk->no_hp }}</td>
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
                                <td>{{ $jawaban_ddtk->berat_badan }} Kg</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tinggi Badan</td>
                                <td>{{ $jawaban_ddtk->tinggi_badan }} cm</td>
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
                        <h5 class="card-title">Jawaban <b>Kuesioner Pemeriksaan Kesehatan Gigi</b></h5>
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
                                <td>Apakah kamu memiliki hal dibawah ini?</td>
                                <td>{{ $jawaban_ddtk->karies_peristen }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>KARIES ODONTOGRAM GIGI SUSU </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>55 </td>
                                <td>{{ $jawaban_ddtk->D5_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>54 </td>
                                <td>{{ $jawaban_ddtk->D5_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>53 </td>
                                <td>{{ $jawaban_ddtk->D5_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>52 </td>
                                <td>{{ $jawaban_ddtk->D5_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>51 </td>
                                <td>{{ $jawaban_ddtk->D5_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>61 </td>
                                <td>{{ $jawaban_ddtk->D6_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>62 </td>
                                <td>{{ $jawaban_ddtk->D6_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>63 </td>
                                <td>{{ $jawaban_ddtk->D6_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>64 </td>
                                <td>{{ $jawaban_ddtk->D6_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>65 </td>
                                <td>{{ $jawaban_ddtk->D6_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>85 </td>
                                <td>{{ $jawaban_ddtk->D8_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>84 </td>
                                <td>{{ $jawaban_ddtk->D8_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>83 </td>
                                <td>{{ $jawaban_ddtk->D8_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>82 </td>
                                <td>{{ $jawaban_ddtk->D8_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>81 </td>
                                <td>{{ $jawaban_ddtk->D8_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>71 </td>
                                <td>{{ $jawaban_ddtk->D7_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>72 </td>
                                <td>{{ $jawaban_ddtk->D7_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>73 </td>
                                <td>{{ $jawaban_ddtk->D7_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>74 </td>
                                <td>{{ $jawaban_ddtk->D7_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>75 </td>
                                <td>{{ $jawaban_ddtk->D7_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>KARIES ODONTOGRAM GIGI TETAP </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>18 </td>
                                <td>{{ $jawaban_ddtk->dmf_D1_8 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>17 </td>
                                <td>{{ $jawaban_ddtk->dmf_D1_7 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>16 </td>
                                <td>{{ $jawaban_ddtk->dmf_D1_6 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>15 </td>
                                <td>{{ $jawaban_ddtk->dmf_D1_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>14 </td>
                                <td>{{ $jawaban_ddtk->dmf_D1_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>13 </td>
                                <td>{{ $jawaban_ddtk->dmf_D1_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>12 </td>
                                <td>{{ $jawaban_ddtk->dmf_D1_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>11 </td>
                                <td>{{ $jawaban_ddtk->dmf_D1_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>21 </td>
                                <td>{{ $jawaban_ddtk->dmf_D2_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>22 </td>
                                <td>{{ $jawaban_ddtk->dmf_D2_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>23 </td>
                                <td>{{ $jawaban_ddtk->dmf_D2_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>24 </td>
                                <td>{{ $jawaban_ddtk->dmf_D2_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>25 </td>
                                <td>{{ $jawaban_ddtk->dmf_D2_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>26 </td>
                                <td>{{ $jawaban_ddtk->dmf_D2_6 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>27 </td>
                                <td>{{ $jawaban_ddtk->dmf_D2_7 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>28 </td>
                                <td>{{ $jawaban_ddtk->dmf_D2_8 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>48 </td>
                                <td>{{ $jawaban_ddtk->dmf_D4_8 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>47 </td>
                                <td>{{ $jawaban_ddtk->dmf_D4_7 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>46 </td>
                                <td>{{ $jawaban_ddtk->dmf_D4_6 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>45 </td>
                                <td>{{ $jawaban_ddtk->dmf_D4_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>44 </td>
                                <td>{{ $jawaban_ddtk->dmf_D4_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>43 </td>
                                <td>{{ $jawaban_ddtk->dmf_D4_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>42 </td>
                                <td>{{ $jawaban_ddtk->dmf_D4_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>41 </td>
                                <td>{{ $jawaban_ddtk->dmf_D4_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>31 </td>
                                <td>{{ $jawaban_ddtk->dmf_D3_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>32 </td>
                                <td>{{ $jawaban_ddtk->dmf_D3_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>33 </td>
                                <td>{{ $jawaban_ddtk->dmf_D3_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>34 </td>
                                <td>{{ $jawaban_ddtk->dmf_D3_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>35 </td>
                                <td>{{ $jawaban_ddtk->dmf_D3_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>36 </td>
                                <td>{{ $jawaban_ddtk->dmf_D3_6 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>37 </td>
                                <td>{{ $jawaban_ddtk->dmf_D3_7 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>38 </td>
                                <td>{{ $jawaban_ddtk->dmf_D3_8 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>PERSISTENSI ODONTOGRAM GIGI TETAP </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>18 </td>
                                <td>{{ $jawaban_ddtk->dmf_M1_8 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>17 </td>
                                <td>{{ $jawaban_ddtk->dmf_M1_7 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>16 </td>
                                <td>{{ $jawaban_ddtk->dmf_M1_6 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>15 </td>
                                <td>{{ $jawaban_ddtk->dmf_M1_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>14 </td>
                                <td>{{ $jawaban_ddtk->dmf_M1_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>13 </td>
                                <td>{{ $jawaban_ddtk->dmf_M1_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>12 </td>
                                <td>{{ $jawaban_ddtk->dmf_M1_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>11 </td>
                                <td>{{ $jawaban_ddtk->dmf_M1_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>21 </td>
                                <td>{{ $jawaban_ddtk->dmf_M2_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>22 </td>
                                <td>{{ $jawaban_ddtk->dmf_M2_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>23 </td>
                                <td>{{ $jawaban_ddtk->dmf_M2_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>24 </td>
                                <td>{{ $jawaban_ddtk->dmf_M2_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>25 </td>
                                <td>{{ $jawaban_ddtk->dmf_M2_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>26 </td>
                                <td>{{ $jawaban_ddtk->dmf_M2_6 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>27 </td>
                                <td>{{ $jawaban_ddtk->dmf_M2_7 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>28 </td>
                                <td>{{ $jawaban_ddtk->dmf_M2_8 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>48 </td>
                                <td>{{ $jawaban_ddtk->dmf_M4_8 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>47 </td>
                                <td>{{ $jawaban_ddtk->dmf_M4_7 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>46 </td>
                                <td>{{ $jawaban_ddtk->dmf_M4_6 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>45 </td>
                                <td>{{ $jawaban_ddtk->dmf_M4_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>44 </td>
                                <td>{{ $jawaban_ddtk->dmf_M4_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>43 </td>
                                <td>{{ $jawaban_ddtk->dmf_M4_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>42 </td>
                                <td>{{ $jawaban_ddtk->dmf_M4_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>41 </td>
                                <td>{{ $jawaban_ddtk->dmf_M4_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>31 </td>
                                <td>{{ $jawaban_ddtk->dmf_M3_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>32 </td>
                                <td>{{ $jawaban_ddtk->dmf_M3_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>33 </td>
                                <td>{{ $jawaban_ddtk->dmf_M3_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>34 </td>
                                <td>{{ $jawaban_ddtk->dmf_M3_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>35 </td>
                                <td>{{ $jawaban_ddtk->dmf_M3_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>36 </td>
                                <td>{{ $jawaban_ddtk->dmf_M3_6 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>37 </td>
                                <td>{{ $jawaban_ddtk->dmf_M3_7 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>38 </td>
                                <td>{{ $jawaban_ddtk->dmf_M3_8 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>PERSISTENSI ODONTOGRAM GIGI SUSU </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>55 </td>
                                <td>{{ $jawaban_ddtk->E5_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>54 </td>
                                <td>{{ $jawaban_ddtk->E5_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>53 </td>
                                <td>{{ $jawaban_ddtk->E5_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>52 </td>
                                <td>{{ $jawaban_ddtk->E5_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>51 </td>
                                <td>{{ $jawaban_ddtk->E5_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>61 </td>
                                <td>{{ $jawaban_ddtk->E6_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>62 </td>
                                <td>{{ $jawaban_ddtk->E6_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>63 </td>
                                <td>{{ $jawaban_ddtk->E6_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>64 </td>
                                <td>{{ $jawaban_ddtk->E6_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>65 </td>
                                <td>{{ $jawaban_ddtk->E6_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>85 </td>
                                <td>{{ $jawaban_ddtk->E8_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>84 </td>
                                <td>{{ $jawaban_ddtk->E8_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>83 </td>
                                <td>{{ $jawaban_ddtk->E8_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>82 </td>
                                <td>{{ $jawaban_ddtk->E8_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>81 </td>
                                <td>{{ $jawaban_ddtk->E8_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>71 </td>
                                <td>{{ $jawaban_ddtk->E7_1 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>72 </td>
                                <td>{{ $jawaban_ddtk->E7_2 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>73 </td>
                                <td>{{ $jawaban_ddtk->E7_3 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>74 </td>
                                <td>{{ $jawaban_ddtk->E7_4 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>75 </td>
                                <td>{{ $jawaban_ddtk->E7_5 ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>KESEHATAN UMUM </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>SERUMEN KANAN </td>
                                <td>{{ $jawaban_ddtk->serumen_kanan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>SERUMEN KIRI </td>
                                <td>{{ $jawaban_ddtk->serumen_kiri ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>TONSILITIS KANAN </td>
                                <td>{{ $jawaban_ddtk->tonsilitis_kanan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>TONSILITIS KIRI </td>
                                <td>{{ $jawaban_ddtk->tonsilitis_kiri ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>KELAINAN REFRAKSI KANAN </td>
                                <td>{{ $jawaban_ddtk->kelainan_refraksi_kanan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>KELAINAN REFRAKSI KIRI </td>
                                <td>{{ $jawaban_ddtk->kelainan_refraksi_kiri ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>OTITIS KIRI </td>
                                <td>{{ $jawaban_ddtk->otitis_kanan ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>OTITIS KIRI </td>
                                <td>{{ $jawaban_ddtk->otitis_kiri ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>CHECKLIST DIBAWAH INI YANG ADA </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>SKABIES </td>
                                <td>{{ $jawaban_ddtk->skabies ?? 'Tidak' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>ANEMIA </td>
                                <td>{{ $jawaban_ddtk->anemia ?? 'Tidak' }}</td>
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