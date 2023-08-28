<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
  <!-- Logo -->
  <div class="logo-sn ms-d-block-lg">
    <a class="pl-0 ml-0 text-center" href="{{ url('dokter/home') }}"> <h4 style="color:white">O'RBS MEDICA</h4> </a>
    <a href="#" class="text-center ms-logo-img-link"> 
      @if (session()->get('gambar') == NULL)
        <img class="img-profile rounded-circle avatar" src="{{ url('') }}/assets/img/logo.jpg" alt="logo">
      @else
        <img class="img-profile rounded-circle avatar" src="{{ url("upload\profile") }}\{{ session()->get('gambar') }}"/>
      @endif
      {{-- <img src="{{ url('') }}/assets/img/logo.jpg" alt="logo"> --}}
    </a>
    <h5 class="text-center text-white mt-2">{{ session()->get('nama') }}</h5>
    <h6 class="text-center text-white mb-3">Dokter</h6>
  </div>
  <!-- Navigation -->
  <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      <span style="color: #ffff">General</span>
    </div>

    <!-- Profile -->
    <li class="menu-item">
      <a href="{{ url('dokter/profile') }}">
        <span><i class="fas fa-user"></i>Profile</span>
      </a>
    </li>
    <!-- /Profile -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      <span style="color: #ffff">Master Data</span>
    </div>

    <!-- /administrasi -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#administrasi" aria-expanded="false" aria-controls="administrasi">
        <span><i class="fas fa-user"></i>Administrasi</span>
      </a>
      <ul id="administrasi" class="collapse" aria-labelledby="administrasi" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('dokter/pasienn') }}">Data Pasien</a></li>
      </ul>
    </li>
    <!-- /administrasi -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      <span style="color: #ffff">Pelayanan</span>
    </div>

    <!-- /Farmasi -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages">
        <span><i class="fas fa-briefcase-medical ms-icon-mr"></i>Farmasi</span>
      </a>
      <ul id="pages" class="collapse" aria-labelledby="pages" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('dokter/obat') }}">Obat</a></li>
        <li> <a href="{{ url('dokter/pengajuan-obat-rajal') }}">Obat Pasien Rawat Jalan</a></li>
        <li> <a href="{{ url('dokter/pengajuan-obat-ranap') }}">Obat Pasien Rawat Inap</a></li>
      </ul>
    </li>
    <!-- /Farmasi -->
    <!-- Labor -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#labor" aria-expanded="false" aria-controls="labor">
        <span><i class="fas fa-briefcase-medical ms-icon-mr"></i>Labor</span>
      </a>
      <ul id="labor" class="collapse" aria-labelledby="labor" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('dokter/labor') }}">Data Labor</a></li>
        <li> <a href="{{ url('dokter/pengajuan-labor') }}">Pengajuan Rawat Jalan</a></li>
        <li> <a href="{{ url('dokter/pengajuan-labor-inap') }}">Pengajuan Rawat Inap</a></li>
      </ul>
    </li>
    <!-- /Labor -->
  <!-- Penunjang -->
  <li class="menu-item">
    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#penunjang" aria-expanded="false" aria-controls="penunjang">
      <span><i class="fas fa-briefcase-medical ms-icon-mr"></i>Penunjang</span>
    </a>
    <ul id="penunjang" class="collapse" aria-labelledby="penunjang" data-parent="#side-nav-accordion">
      <li> <a href="{{ url('dokter/penunjang') }}">Data Penunjang</a></li>
      <li> <a href="{{ url('dokter/pengajuan-penunjang') }}">Pengajuan Rawat Jalan</a></li>
      <li> <a href="{{ url('dokter/pengajuan-penunjang-inap') }}">Pengajuan Rawat Inap</a></li>
    </ul>
  </li>
  <!-- /Penunjang -->
    <!-- /Rawat_Jalan -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Rawat_Jalan" aria-expanded="false" aria-controls="Rawat_Jalan">
        <span><i class="fas fa-user"></i>Rawat Jalan</span>
      </a>
      <ul id="Rawat_Jalan" class="collapse" aria-labelledby="Rawat_Jalan" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('dokter/bp-umum') }}">BP.Umum</a></li>
        <li> <a href="{{ url('dokter/lansia') }}">Lansia</a></li>
        <li> <a href="{{ url('dokter/ugd') }}">UGD</a></li>
        <li> <a href="{{ url('dokter/bp-gigi') }}">BP. Gigi</a></li>
        <li> <a href="{{ url('dokter/kia') }}">KIA, Imunisasi dan KB</a></li>
        {{-- <li> <a href="{{ url('dokter/laborat') }}">Laborat</a></li> --}}
        <li> <a href="{{ url('dokter/gizi') }}">Infeksi</a></li>
      </ul>
    </li>
    <!-- /Rawat_Jalan -->
    <!-- /Rawat_Inap -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Rawat_Inap" aria-expanded="false" aria-controls="Rawat_Inap">
        <span><i class="fas fa-user"></i>Rawat Inap</span>
      </a>
      <ul id="Rawat_Inap" class="collapse" aria-labelledby="Rawat_Inap" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('dokter/rawat-inap/pasien') }}">Data Pasien</a></li>
      </ul>
    </li>
    <!-- /Rawat_Inap -->
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      <span style="color: #ffff">E-Health</span>
    </div>

    <!-- E-Uks -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eUks" aria-expanded="false" aria-controls="eUks">
        <span><i class="fas fa-stethoscope"></i>E-UKS</span>
      </a>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('dokter/penanggungjawab-eUks') }}">Penanggung Jawab</a></li>
      </ul>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#screeningKes" aria-expanded="false" aria-controls="screeningKes">Screening Kesehatan Siswa Mandiri</a>
          <ul id="screeningKes" class="collapse" aria-labelledby="screeningKes" data-parent="#pages">
            <li> <a href="{{ url('/dokter/answer')}}">Jawaban</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pemfisUm" aria-expanded="false" aria-controls="pemfisUm">Pemeriksaan Fisik Umum</a>
          <ul id="pemfisUm" class="collapse" aria-labelledby="pemfisUm" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Pemeriksaan SD-SMA</a> </li>
            <li> <a href="{{ url('#')}}">Pemeriksaan DDTK</a> </li>
            <li> <a href="{{ url('#')}}">Pemeriksaan UKS Gigi</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#analisisUks" aria-expanded="false" aria-controls="analisisUks">Analisis</a>
          <ul id="analisisUks" class="collapse" aria-labelledby="analisisUks" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Penjaringan</a> </li>
            <li> <a href="{{ url('#')}}">Berkala</a> </li>
            <li> <a href="{{ url('#')}}">DDTK (TK)</a> </li>
            <li> <a href="{{ url('#')}}">DEF DMF (KB)</a> </li>
            <li> <a href="{{ url('#')}}">Laporan Identitas Salah</a> </li>
          </ul>
        </li>
      </ul>
    </li>
    <!-- /E-Uks -->
  </ul>
</aside>