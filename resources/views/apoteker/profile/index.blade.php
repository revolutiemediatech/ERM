@extends($apoteker)

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
<div class="ms-profile-overview">
  <div class="ms-profile-cover">
    <img class="ms-profile-img" src="{{ url('') }}/assets/img/dashboard/doctor-4.jpg" alt="people">
    <div class="ms-profile-user-info">
      <h3 class="ms-profile-username text-white">{{ $user->nama }}</h3>
      <h6 class="ms-profile-role text-white">{{ $user->role->nama }}</h6>
    </div>
  </div>
  <ul class="ms-profile-navigation nav nav-tabs tabs-bordered" role="tablist">
   <li role="presentation"><a href="#tab1" aria-controls="tab1" class="active show" role="tab" data-toggle="tab"> Data Diri </a></li>
  </ul>
  <div class="tab-content">
     <div class="tab-pane" id="tab1">
     </div>
     <div class="tab-pane" id="tab2">
     </div>
     <div class="tab-pane" id="tab3">
     </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-7 col-md-12">
     <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-body">
           <h2 class="section-title">About Me 
            <div class="btn-group float-right">
              <a href="{{ url("apoteker/profile/" . $user->id, []) }}/edit" ><i class="fas fa-pencil-alt ms-text-primary"></i></a>
            </div>
          </h2>
           <p style="text-align: justify">{{ $user->deskripsi ?? '-'}}</p>
        </div>
     </div>
  </div>
  <div class="col-xl-5 col-md-12">
     <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-body">
           <h2 class="section-title">Basic Information
            <div class="btn-group float-right">
              <a href="{{ url("apoteker/profile/" . $user->id, []) }}/edit" ><i class="fas fa-pencil-alt ms-text-primary"></i></a>
            </div>
           </h2>
           <table class="table ms-profile-information">
              <tbody>
                 <tr>
                    <th scope="row">Nama</th>
                    <td>{{ $user->nama }}</td>
                 </tr>
                 <tr>
                    <th scope="row">Username</th>
                    <td>{{ $user->username }}</td>
                 </tr>
                 <tr>
                    <th scope="row">Role</th>
                    <td>{{ $user->role->nama }}</td>
                 </tr>
                 <tr>
                    <th scope="row">Mitra Faskes</th>
                    <td>{{ $user->faskes->nama }}</td>
                 </tr>
                 <tr>
                    <th scope="row">No HP</th>
                    <td>{{ $user->no_hp ?? '-'}}</td>
                 </tr>
                 <tr>
                    <th scope="row">Alamat</th>
                    <td>{{ $user->alamat ?? '-'}}</td>
                 </tr>
              </tbody>
           </table>
        </div>
     </div>
  </div>
</div>
@endsection

@section('js-library')
@endsection

@section('js-custom')
@endsection