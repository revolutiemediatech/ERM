<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
  <!-- Logo -->
  <div class="logo-sn ms-d-block-lg">
    <a class="pl-0 ml-0 text-center" href="{{ url('paramedis/home') }}"> <h4 style="color:white">O'RBS MEDICA</h4> </a>
    <a href="#" class="text-center ms-logo-img-link"> 
      @if (session()->get('gambar') == NULL)
        <img class="img-profile rounded-circle avatar" src="{{ url('') }}/assets/img/logo.jpg" alt="logo">
      @else
        <img class="img-profile rounded-circle avatar" src="{{ url("upload\profile") }}\{{ session()->get('gambar') }}"/>
      @endif
      {{-- <img src="{{ url('') }}/assets/img/logo.jpg" alt="logo"> --}}
    </a>
    <h5 class="text-center text-white mt-2">{{ session()->get('nama') }}</h5>
    <h6 class="text-center text-white mb-3">Paramedis</h6>
  </div>
  <!-- Navigation -->
  <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      <span style="color: #ffff">General</span>
    </div>
    <!-- Dashboard -->
    {{-- <li class="menu-item">
      <a href="{{ url('paramedis/home') }}">
        <span><i class="fas fa-home"></i>Home</span>
      </a>
    </li> --}}
    <!-- /Dashboard -->

    <!-- Profile -->
    <li class="menu-item">
      <a href="{{ url('paramedis/profile') }}">
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

    <!-- /billing -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#billing" aria-expanded="false" aria-controls="billing">
        <span><i class="fas fa-user"></i>billing</span>
      </a>
      <ul id="billing" class="collapse" aria-labelledby="billing" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('paramedis/billing') }}">Data Billing</a></li>
      </ul>
    </li>
    <!-- /billing -->
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- /administrasi -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#administrasi" aria-expanded="false" aria-controls="administrasi">
        <span><i class="fas fa-user"></i>Administrasi</span>
      </a>
      <ul id="administrasi" class="collapse" aria-labelledby="administrasi" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('paramedis/pasienn') }}">Data Pasien</a></li>
        <li> <a href="{{ url('paramedis/pasienn/create') }}">Registrasi Pasien</a></li>
      </ul>
    </li>
    <!-- /administrasi -->
    
    <!-- Divider -->
    <hr class="sidebar-divider">
  </ul>
</aside>