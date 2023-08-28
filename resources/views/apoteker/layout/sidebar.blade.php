<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
  <!-- Logo -->
  <div class="logo-sn ms-d-block-lg">
    <a class="pl-0 ml-0 text-center" href="{{ url('apoteker/profile') }}"> <h4 style="color:white">O'RBS MEDICA</h4> </a>
    <a href="#" class="text-center ms-logo-img-link"> 
      @if (session()->get('gambar') == NULL)
        <img class="img-profile rounded-circle avatar" src="{{ url('') }}/assets/img/logo.jpg" alt="logo">
      @else
        <img class="img-profile rounded-circle avatar" src="{{ url("upload\profile") }}\{{ session()->get('gambar') }}"/>
      @endif
      {{-- <img src="{{ url('') }}/assets/img/logo.jpg" alt="logo"> --}}
    </a>
    <h5 class="text-center text-white mt-2">{{ session()->get('nama') }}</h5>
    <h6 class="text-center text-white mb-3">Apoteker</h6>
  </div>
  <!-- Navigation -->
  <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- /obat -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#farmasi" aria-expanded="false" aria-controls="farmasi">
        <span><i class="fas fa-briefcase-medical ms-icon-mr"></i>Farmasi</span>
      </a>
      <ul id="farmasi" class="collapse" aria-labelledby="farmasi" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('apoteker/obat') }}">Data Obat</a></li>
        <li> <a href="{{ url('apoteker/pengajuan-obat-rajal') }}">Obat Pasien Rawat Jalan</a></li>
        <li> <a href="{{ url('apoteker/pengajuan-obat-ranap') }}">Obat Pasien Rawat Inap</a></li>
      </ul>
    </li>
    <!-- /obat -->
  </ul>
</aside>