@extends($adminRs)

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
                        <h5 class="card-title">Detail Data Pemeriksaan Gigi</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ url('adminRs/pemeriksaan-gigi') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table text-justify">
                        <tbody>
                            <tr>
                                <td class="text-sm-end">Mitra</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $skrining_gigi->faskes->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Sekolah</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $skrining_gigi->sekolah->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Kelas</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $skrining_gigi->kelas }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nama</td>
                                <td>:</td>
                                <td class="text-sm-start">{{ $skrining_gigi->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">NIK</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $skrining_gigi->nik }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Jenis Kelamin</td>
                                <td>:</td>                          
                                {{-- <td class="text-sm-start">{{ $skrining_gigi->jenis_kelamin }}</td> --}}
                                <td class="text-sm-start">
                                    @if ($skrining_gigi->jenis_kelamin = 1)
                                        Laki-Laki
                                    @else
                                        Prempuan
                                    @endif    
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Tanggal Lahir</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $skrining_gigi->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="text-sm-end">Nomor Hp</td>
                                <td>:</td>                          
                                <td class="text-sm-start">{{ $skrining_gigi->no_hp }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">DEF/T</h5>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div>
                    <span>Decay [d]</span>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                    <input type="checkbox" name="D5_5" @if ($skrining_gigi->D5_5 == 'ya') checked disabled @endif>
                                    <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 55 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_4" @if ($skrining_gigi->D5_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 54 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_3" @if ($skrining_gigi->D5_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 53 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_2" @if ($skrining_gigi->D5_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 52 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D5_1" @if ($skrining_gigi->D5_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 51 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_1" @if ($skrining_gigi->D6_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 61 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_2" @if ($skrining_gigi->D6_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 62 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_3" @if ($skrining_gigi->D6_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 63 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_4" @if ($skrining_gigi->D6_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 64 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D6_5" @if ($skrining_gigi->D6_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 65 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_5" @if ($skrining_gigi->D8_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 85 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_4" @if ($skrining_gigi->D8_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 84 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_3" @if ($skrining_gigi->D8_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 83 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_2" @if ($skrining_gigi->D8_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 82 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D8_1" @if ($skrining_gigi->D8_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 81 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_1" @if ($skrining_gigi->D7_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 71 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_2" @if ($skrining_gigi->D7_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 72 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_3" @if ($skrining_gigi->D7_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 73 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_4" @if ($skrining_gigi->D7_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 74 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="D7_5" @if ($skrining_gigi->D7_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 75 </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <span>Kondisi Gigi Berlubang</span>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    @if ($skrining_gigi->def_kgb == 'Gigi berlubang belum mengenai pulpa gigi')
                                        <ul class="ms-list d-flex">
                                            <li class="ms-list-item pl-4">
                                                <label class="ms-checkbox-wrap">
                                                <input type="radio" name="def_kgb" @if ($skrining_gigi->def_kgb == 'Gigi berlubang belum mengenai pulpa gigi')
                                                    checked
                                                @endif>
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> Gigi berlubang belum mengenai pulpa gigi </span>
                                            </li>
                                        </ul>
                                    @elseif($skrining_gigi->def_kgb == 'Gigi berlubang mengenai pulpa gigi')
                                        <ul class="ms-list d-flex">
                                            <li class="ms-list-item pl-4">
                                                <label class="ms-checkbox-wrap">
                                                <input type="radio" name="def_kgb" @if ($skrining_gigi->def_kgb == 'Gigi berlubang mengenai pulpa gigi')
                                                    checked
                                                @endif>
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> Gigi berlubang mengenai pulpa gigi </span>
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="ms-list d-flex">
                                            <li class="ms-list-item pl-4">
                                                <label class="ms-checkbox-wrap">
                                                <input type="radio" name="def_kgb" @if ($skrining_gigi->def_kgb == 'Gigi berlubang tidak bisa dipertahankan')
                                                    checked
                                                @endif>
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> Gigi berlubang tidak bisa dipertahankan </span>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <span>Extraction [e]</span>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_5" @if ($skrining_gigi->E5_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 55 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_4" @if ($skrining_gigi->E5_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 54 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_3" @if ($skrining_gigi->E5_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 53 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_2" @if ($skrining_gigi->E5_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 52 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E5_1" @if ($skrining_gigi->E5_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 51 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_1" @if ($skrining_gigi->E6_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 61 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_2" @if ($skrining_gigi->E6_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 62 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_3" @if ($skrining_gigi->E6_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 63 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_4" @if ($skrining_gigi->E6_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 64 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E6_5" @if ($skrining_gigi->E6_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 65 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_5" @if ($skrining_gigi->E8_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 85 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_4" @if ($skrining_gigi->E8_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 84 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_3" @if ($skrining_gigi->E8_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 83 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_2" @if ($skrining_gigi->E8_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 82 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E8_1" @if ($skrining_gigi->E8_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 81 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_1" @if ($skrining_gigi->E7_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 71 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_2" @if ($skrining_gigi->E7_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 72 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_3" @if ($skrining_gigi->E7_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 73 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_4" @if ($skrining_gigi->E7_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 74 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="E7_5" @if ($skrining_gigi->E7_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 75 </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <span>Filling [f]</span>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_5" @if ($skrining_gigi->F5_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 55 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_4" @if ($skrining_gigi->F5_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 54 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_3" @if ($skrining_gigi->F5_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 53 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_2" @if ($skrining_gigi->F5_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 52 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F5_1" @if ($skrining_gigi->F5_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 51 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_1" @if ($skrining_gigi->F6_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 61 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_2" @if ($skrining_gigi->F6_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 62 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_3" @if ($skrining_gigi->F6_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 63 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_4" @if ($skrining_gigi->F6_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 64 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F6_5" @if ($skrining_gigi->F6_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 65 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_5" @if ($skrining_gigi->F8_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 85 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_4" @if ($skrining_gigi->F8_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 84 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_3" @if ($skrining_gigi->F8_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 83 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_2" @if ($skrining_gigi->F8_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 82 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F8_1" @if ($skrining_gigi->F8_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 81 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_1" @if ($skrining_gigi->F7_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 71 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_2" @if ($skrining_gigi->F7_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 72 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_3" @if ($skrining_gigi->F7_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 73 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_4" @if ($skrining_gigi->F7_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 74 </span>
                            </li>
                            <li class="ms-list-item pl-4" style="margin-right: 20px">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="F7_5" @if ($skrining_gigi->F7_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 75 </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ms-panel">
            <div class="ms-panel-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">DMF/T</h5>
                    </div>
                </div>
            </div>
            <div class="ms-panel-body">
                <div>
                    <span>Decay [D]</span>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_8" @if ($skrining_gigi->dmf_D1_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 18 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_7" @if ($skrining_gigi->dmf_D1_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 17 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_6" @if ($skrining_gigi->dmf_D1_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 16 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_5" @if ($skrining_gigi->dmf_D1_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 15 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_4" @if ($skrining_gigi->dmf_D1_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 14 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_3" @if ($skrining_gigi->dmf_D1_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 13 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_2" @if ($skrining_gigi->dmf_D1_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 12 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D1_1" @if ($skrining_gigi->dmf_D1_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 11 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_1" @if ($skrining_gigi->dmf_D2_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 21 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_2" @if ($skrining_gigi->dmf_D2_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 22 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_3" @if ($skrining_gigi->dmf_D2_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 23 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_4" @if ($skrining_gigi->dmf_D2_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 24 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_5" @if ($skrining_gigi->dmf_D2_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 25 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_6" @if ($skrining_gigi->dmf_D2_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 26 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_7" @if ($skrining_gigi->dmf_D2_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 27 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D2_8" @if ($skrining_gigi->dmf_D2_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 28 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_8" @if ($skrining_gigi->dmf_D4_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 48 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_7" @if ($skrining_gigi->dmf_D4_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 47 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_6" @if ($skrining_gigi->dmf_D4_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 46 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_5" @if ($skrining_gigi->dmf_D4_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 45 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_4" @if ($skrining_gigi->dmf_D4_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 44 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_3" @if ($skrining_gigi->dmf_D4_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 43 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_2" @if ($skrining_gigi->dmf_D4_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 42 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D4_1" @if ($skrining_gigi->dmf_D4_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 41 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_1" @if ($skrining_gigi->dmf_D3_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 31 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_2" @if ($skrining_gigi->dmf_D3_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 32 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_3" @if ($skrining_gigi->dmf_D3_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 33 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_4" @if ($skrining_gigi->dmf_D3_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 34 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_5" @if ($skrining_gigi->dmf_D3_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 35 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_6" @if ($skrining_gigi->dmf_D3_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 36 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_7" @if ($skrining_gigi->dmf_D3_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 37 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_D3_8" @if ($skrining_gigi->dmf_D3_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 38 </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <span>Kondisi Gigi Berlubang</span>
                </div>
                <div class="form-content contact-form-action row">
                    <div class="col-lg-12 responsive-column">
                        <div class="input-box">
                            <div class="form-group select-contain w-100">
                                <div class="dropdown bootstrap-select select-contain-select">
                                    @if ($skrining_gigi->dmf_kgb == 'Gigi berlubang belum mengenai pulpa gigi')
                                        <ul class="ms-list d-flex">
                                            <li class="ms-list-item pl-4">
                                                <label class="ms-checkbox-wrap">
                                                <input type="radio" name="dmf_kgb" @if ($skrining_gigi->dmf_kgb == 'Gigi berlubang belum mengenai pulpa gigi')
                                                    checked
                                                @endif>
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> Gigi berlubang belum mengenai pulpa gigi </span>
                                            </li>
                                        </ul>
                                    @elseif($skrining_gigi->dmf_kgb == 'Gigi berlubang mengenai pulpa gigi')
                                        <ul class="ms-list d-flex">
                                            <li class="ms-list-item pl-4">
                                                <label class="ms-checkbox-wrap">
                                                <input type="radio" name="dmf_kgb" @if ($skrining_gigi->dmf_kgb == 'Gigi berlubang mengenai pulpa gigi')
                                                    checked
                                                @endif>
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> Gigi berlubang mengenai pulpa gigi </span>
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="ms-list d-flex">
                                            <li class="ms-list-item pl-4">
                                                <label class="ms-checkbox-wrap">
                                                <input type="radio" name="dmf_kgb" @if ($skrining_gigi->dmf_kgb == 'Gigi berlubang tidak bisa dipertahankan')
                                                    checked
                                                @endif>
                                                <i class="ms-checkbox-check"></i>
                                                </label>
                                                <span> Gigi berlubang tidak bisa dipertahankan </span>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <span>Missing [M]</span>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_8" @if ($skrining_gigi->dmf_M1_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 18 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_7" @if ($skrining_gigi->dmf_M1_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 17 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_6" @if ($skrining_gigi->dmf_M1_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 16 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_5" @if ($skrining_gigi->dmf_M1_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 15 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_4" @if ($skrining_gigi->dmf_M1_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 14 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_3" @if ($skrining_gigi->dmf_M1_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 13 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_2" @if ($skrining_gigi->dmf_M1_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 12 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M1_1" @if ($skrining_gigi->dmf_M1_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 11 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_1" @if ($skrining_gigi->dmf_M2_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 21 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_2" @if ($skrining_gigi->dmf_M2_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 22 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_3" @if ($skrining_gigi->dmf_M2_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 23 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_4" @if ($skrining_gigi->dmf_M2_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 24 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_5" @if ($skrining_gigi->dmf_M2_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 25 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_6" @if ($skrining_gigi->dmf_M2_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 26 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_7" @if ($skrining_gigi->dmf_M2_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 27 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M2_8" @if ($skrining_gigi->dmf_M2_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 28 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_8" @if ($skrining_gigi->dmf_M4_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 48 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_7" @if ($skrining_gigi->dmf_M4_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 47 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_6" @if ($skrining_gigi->dmf_M4_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 46 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_5" @if ($skrining_gigi->dmf_M4_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 45 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_4" @if ($skrining_gigi->dmf_M4_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 44 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_3" @if ($skrining_gigi->dmf_M4_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 43 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_2" @if ($skrining_gigi->dmf_M4_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 42 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M4_1" @if ($skrining_gigi->dmf_M4_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 41 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_1" @if ($skrining_gigi->dmf_M3_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 31 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_2" @if ($skrining_gigi->dmf_M3_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 32 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_3" @if ($skrining_gigi->dmf_M3_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 33 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_4" @if ($skrining_gigi->dmf_M3_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 34 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_5" @if ($skrining_gigi->dmf_M3_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 35 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_6" @if ($skrining_gigi->dmf_M3_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 36 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_7" @if ($skrining_gigi->dmf_M3_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 37 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_M3_8" @if ($skrining_gigi->dmf_M3_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 38 </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <span>Filling [F]</span>
                </div>
                <div class="form-content contact-form-action row">
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_8" @if ($skrining_gigi->dmf_F1_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 18 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_7" @if ($skrining_gigi->dmf_F1_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 17 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_6" @if ($skrining_gigi->dmf_F1_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 16 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_5" @if ($skrining_gigi->dmf_F1_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 15 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_4" @if ($skrining_gigi->dmf_F1_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 14 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_3" @if ($skrining_gigi->dmf_F1_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 13 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_2" @if ($skrining_gigi->dmf_F1_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 12 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F1_1" @if ($skrining_gigi->dmf_F1_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 11 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_1" @if ($skrining_gigi->dmf_F2_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 21 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_2" @if ($skrining_gigi->dmf_F2_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 22 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_3" @if ($skrining_gigi->dmf_F2_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 23 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_4" @if ($skrining_gigi->dmf_F2_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 24 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_5" @if ($skrining_gigi->dmf_F2_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 25 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_6" @if ($skrining_gigi->dmf_F2_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 26 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_7" @if ($skrining_gigi->dmf_F2_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 27 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F2_8" @if ($skrining_gigi->dmf_F2_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 28 </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="ms-list d-flex">
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_8" @if ($skrining_gigi->dmf_F4_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 48 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_7" @if ($skrining_gigi->dmf_F4_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 47 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_6" @if ($skrining_gigi->dmf_F4_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 46 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_5" @if ($skrining_gigi->dmf_F4_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 45 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_4" @if ($skrining_gigi->dmf_F4_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 44 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_3" @if ($skrining_gigi->dmf_F4_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 43 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_2" @if ($skrining_gigi->dmf_F4_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 42 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F4_1" @if ($skrining_gigi->dmf_F4_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 41 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_1" @if ($skrining_gigi->dmf_F3_1 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 31 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_2" @if ($skrining_gigi->dmf_F3_2 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 32 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_3" @if ($skrining_gigi->dmf_F3_3 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 33 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_4" @if ($skrining_gigi->dmf_F3_4 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 34 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_5" @if ($skrining_gigi->dmf_F3_5 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 35 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_6" @if ($skrining_gigi->dmf_F3_6 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 36 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_7" @if ($skrining_gigi->dmf_F3_7 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 37 </span>
                            </li>
                            <li class="ms-list-item pl-4">
                                <label class="ms-checkbox-wrap">
                                <input type="checkbox" name="dmf_F3_8" @if ($skrining_gigi->dmf_F3_8 == 'ya') checked disabled @endif>
                                <i class="ms-checkbox-check"></i>
                                </label>
                                <span> 38 </span>
                            </li>
                        </ul>
                    </div>
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