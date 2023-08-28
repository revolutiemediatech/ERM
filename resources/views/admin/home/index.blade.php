@extends($admin)

@section('css-library')
@endsection

@section('css-custom')
@endsection

@section('content')
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
@php
  $dokter       = $users->where('idRole', 3)->where('status', 1)->count('idUsers');
  $apoteker     = $users->where('idRole', 4)->where('status', 1)->count('idUsers');
  $perawat      = $users->where('idRole', 5)->where('status', 1)->count('idUsers');
  $mitra        = $mitra->count('id');
  $bidan        = $users->where('idRole', 6)->where('status', 1)->count('idUsers');
  $analisLabor  = $users->where('idRole', 7)->where('status', 1)->count('idUsers');
  $paramedis    = $users->where('idRole', 8)->where('status', 1)->count('idUsers');
  $dokter_gigi  = $users->where('idRole', 9)->where('status', 1)->count('idUsers');

  //pasien
  $pasien_hariIni       = $pasien->count('id');
  $pasien_rawat_jalan   = $pasien->where('idMPerawatan', 1)->count('id');
  $pasien_rawat_inap    = $pasien->where('idMPerawatan', 2)->count('id');
@endphp

<div class="row">
    
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6>Dokter</h6>
              <p class="ms-card-change"> {{ $dokter }}</p>
            </div>
          </div>
          <i class="fas fa-stethoscope ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6>Perawat</h6>
              <p class="ms-card-change"> {{ $perawat }}</p>
            </div>
          </div>
          <i class="fas fa-user ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">Apoteker</h6>
              <p class="ms-card-change"> {{ $apoteker }}</p>
            </div>
          </div>
          <i class="fas fa-user ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">Mitra</h6>
              <p class="ms-card-change"> {{ $mitra }}</p>
            </div>
          </div>
          <i class="fas fa-hospital"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">Bidan</h6>
              <p class="ms-card-change"> {{ $bidan }}</p>
            </div>
          </div>
          <i class="fas fa-user ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">Analis Labor</h6>
              <p class="ms-card-change"> {{ $analisLabor }}</p>
            </div>
          </div>
          <i class="fas fa-user ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">Paramedis</h6>
              <p class="ms-card-change"> {{ $paramedis }}</p>
            </div>
          </div>
          <i class="fas fa-user ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">Dokter Gigi</h6>
              <p class="ms-card-change"> {{ $dokter_gigi }}</p>
            </div>
          </div>
          <i class="fas fa-user ms-icon-mr"></i>
        </div>
      </a>
    </div>


    <div class="col-xl-6 col-lg-6 col-md-12">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6 class="bold">Pasien Hari Ini</h6>
            <h3><strong>{{ $pasien_hariIni }}</strong> <span>Pasien</span></h3>
          </div>
        </div>
      </div>

      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6>Pasien Rawat Jalan</h6>
            <h3><strong>{{ $pasien_rawat_jalan }}</strong> <span>Pasien</span></h3>
          </div>
        </div>
      </div>

      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6>Pasien Rawat Inap</h6>
            <h3><strong>{{ $pasien_rawat_inap }}</strong> <span>Pasien</span></h3>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-6 col-lg-6 col-md-12">
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-body calendar-wedgit">
          <div id="calendar"></div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Patient Total</h6>
        </div>
        <div class="ms-panel-body">
          <canvas id="line-chart"></canvas>
        </div>
      </div>
    </div>


    <div class="col-xl-6 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Patient In</h6>
        </div>
        <div class="ms-panel-body">
          <canvas id="bar-chart-grouped"></canvas>
        </div>
      </div>
    </div>


    <div class="col-xl-8 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Data Mitra</h6>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
            <table class="table table-hover thead-primary">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th scope="col">Nama Mitra</th>
                  <th scope="col">Provinsi</th>
                  <th scope="col">Daerah</th>
                  <th scope="col">Kecamatan</th>
                  <th scope="col">Desa/Kelurahan</th>
                  <th scope="col">Alamat</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($faskes as $f)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $f->nama }}</td>
                    <td>{{ $f->provinsi->nama }}</td>
                    <td>{{ $f->daerah->nama }}</td>
                    <td>{{ $f->kecamatan->nama }}</td>
                    <td>{{ $f->desa->nama }}</td>
                    <td>{{ $f->alamat }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-4 col-md-12">
      <div class="ms-panel ms-panel-fh ms-widget">
        <div class="ms-panel-header ms-panel-custome">
          <h6>List Dokter</h6>
        </div>
        <div class="ms-panel-body p-0">
          <ul class="ms-followers ms-list ms-scrollable">
            @foreach ($dokter1 as $d)
              <li class="ms-list-item media">
                <img src="{{ url("upload\profile") }}\{{ session()->get('gambar') }}" class="ms-img-small ms-img-round" alt="people">
                <div class="media-body mt-1">
                  <h4>{{ $d->nama }}</h4>
                  <span class="fs-12">{{ $d->faskes->nama }}</span>
                </div>
                @if ($d->status == 1)
                    <span class="badge badge-success me-auto">Aktif</span>  
                @elseif ($d->status == 2)
                  <span class="badge badge-danger me-auto">Tidak Aktif</span>
                @endif
                {{-- <button type="button" class="ms-btn-icon btn-success" name="button"><i class="material-icons">check</i> </button> --}}
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

</div>
@endsection

@section('js-library')
@endsection

@section('js-custom')
@endsection