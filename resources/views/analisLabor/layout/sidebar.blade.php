<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
  <!-- Logo -->
  <div class="logo-sn ms-d-block-lg">
    <a class="pl-0 ml-0 text-center" href="{{ url('analisLabor/profile') }}"> <h4 style="color:white">O'RBS MEDICA</h4> </a>
    <a href="#" class="text-center ms-logo-img-link"> <img src="{{ url('') }}/assets/img/logo.jpg" alt="logo"></a>
    <h5 class="text-center text-white mt-2">{{ session()->get('nama') }}</h5>
    <h6 class="text-center text-white mb-3">Analis Labor</h6>
  </div>
  <!-- Navigation -->
  <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- /administrasi -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#administrasi" aria-expanded="false" aria-controls="administrasi">
        <span><i class="fas fa-user"></i>Administrasi</span>
      </a>
      <ul id="administrasi" class="collapse" aria-labelledby="administrasi" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('analisLabor/pasienn') }}">Data Pasien</a></li>
      </ul>
    </li>
    <!-- /administrasi -->
    <!-- /labor -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#labor" aria-expanded="false" aria-controls="labor">
        <span><i class="fas fa-user"></i>Labor</span>
      </a>
      <ul id="labor" class="collapse" aria-labelledby="labor" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('analisLabor/labor') }}">Data Labor</a></li>
        <li> <a href="{{ url('analisLabor/pengajuan-labor') }}">Pengajuan Rawat Jalan</a></li>
        <li> <a href="{{ url('analisLabor/pengajuan-labor-inap') }}">Pengajuan Rawat Inap</a></li>
      </ul>
    </li>
    <!-- /labor -->
  </ul>
</aside>