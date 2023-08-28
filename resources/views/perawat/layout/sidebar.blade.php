<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="{{ url('perawat/profile') }}"> <h4 style="color:white">O'RBS MEDICA</h4> </a>
      <a href="#" class="text-center ms-logo-img-link"> 
        @if (session()->get('gambar') == NULL)
          <img class="img-profile rounded-circle avatar" src="{{ url('') }}/assets/img/logo.jpg" alt="logo">
        @else
          <img class="img-profile rounded-circle avatar" src="{{ url("upload\profile") }}\{{ session()->get('gambar') }}"/>
        @endif
        {{-- <img src="{{ url('') }}/assets/img/logo.jpg" alt="logo"> --}}
      </a>
      <h5 class="text-center text-white mt-2">{{ session()->get('nama') }}</h5>
      <h6 class="text-center text-white mb-3">Perawat</h6>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Heading -->
      <div class="sidebar-heading">
        <span style="color: #ffff">General</span>
      </div>
      <!-- Profile -->
      <li class="menu-item">
        <a href="{{ url('perawat/profile') }}">
          <span><i class="fas fa-user"></i>Profile</span>
        </a>
      </li>
      <!-- /Profile -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <span style="color: #ffff">Pasien</span>
      </div>
      
      <!-- Pasien -->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#patient" aria-expanded="false" aria-controls="patient">
          <span><i class="fas fa-user"></i>Administrasi</span>
        </a>
        <ul id="patient" class="collapse" aria-labelledby="patient" data-parent="#side-nav-accordion">
          <li> <a href="{{ url('perawat/pasienn') }}">Data Pasien</a></li>
        </ul>
      </li>
      <!-- /Pasien -->
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <span style="color: #ffff">Pelayanan</span>
      </div>

      <!-- /Farmasi -->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Farmasi" aria-expanded="false" aria-controls="Farmasi">
          <span><i class="fas fa-briefcase-medical ms-icon-mr"></i>Farmasi</span>
        </a>
        <ul id="Farmasi" class="collapse" aria-labelledby="Farmasi" data-parent="#side-nav-accordion">
          <li> <a href="{{ url('perawat/pengajuan-obat-rajal') }}">Obat Pasien Rawat Jalan</a></li>
          <li> <a href="{{ url('perawat/pengajuan-obat-ranap') }}">Obat Pasien Rawat Inap</a></li>
        </ul>
      </li>
      <!-- /Farmasi -->
        <!-- Diagnosa -->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#diagnosa" aria-expanded="false" aria-controls="diagnosa">
          <span><i class="fas fa-user"></i>Rawat Jalan</span>
        </a>
        <ul id="diagnosa" class="collapse" aria-labelledby="diagnosa" data-parent="#side-nav-accordion">
          <li> <a href="{{ url('perawat/rawat-jalan/bp-umum') }}">BP.Umum</a></li>
          <li> <a href="{{ url('perawat/rawat-jalan/lansia') }}">Lansia</a></li>
          <li> <a href="{{ url('perawat/rawat-jalan/ugd') }}">UGD</a></li>
          <li> <a href="{{ url('perawat/rawat-jalan/bp-gigi') }}">BP. Gigi</a></li>
          <li> <a href="{{ url('perawat/rawat-jalan/kia') }}">KIA, Imunisasi dan KB</a></li>
          <li> <a href="{{ url('perawat/rawat-jalan/infeksi') }}">Infeksi</a></li>
        </ul>
      </li>
      <!-- /Diagnosa -->
      <!-- /Rawat_Inap -->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Rawat_Inap" aria-expanded="false" aria-controls="Rawat_Inap">
          <span><i class="fas fa-user"></i>Rawat Inap</span>
        </a>
        <ul id="Rawat_Inap" class="collapse" aria-labelledby="Rawat_Inap" data-parent="#side-nav-accordion">
          <li> <a href="{{ url('perawat/rawat-inap/pasien') }}">Data Pasien</a></li>
        </ul>
      </li>
      <!-- /Rawat_Inap -->
    </ul>
  </aside>