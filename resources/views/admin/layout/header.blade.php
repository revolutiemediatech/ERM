<nav class="navbar ms-navbar">
  <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
    <span class="ms-toggler-bar bg-white"></span>
    <span class="ms-toggler-bar bg-white"></span>
    <span class="ms-toggler-bar bg-white"></span>
  </div>
  <div class="logo-sn logo-sm ms-d-block-sm">
    <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="{{ url('') }}/admin/home"><img src="{{ url('') }}/assets/img/logo.jpg" alt="logo" style="width:40%;height:40%;"> </a>
  </div>
  <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">

      <li class="ms-nav-item ms-nav-user dropdown">
        <a href="{{ url('logout') }}"> <img src="{{ url('assets/img/logout.png')}}" width="30px"> </a>
      </li>
  </ul>
  <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
    <span class="ms-toggler-bar bg-white"></span>
    <span class="ms-toggler-bar bg-white"></span>
    <span class="ms-toggler-bar bg-white"></span>
  </div>
</nav>