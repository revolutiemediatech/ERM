@extends('auth/layout/main')

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper ms-auth">
        
        <div class="ms-auth-container">
           <div class="ms-auth-col">
              <div class="ms-auth-bg"></div>
           </div>
            <div class="ms-auth-col">
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
                <div class="ms-auth-form">
                    <form class="needs-validation" action="{{ url('loginProses') }}" method="POST">
                        @csrf
                        <h1>Login to Account</h1>
                        <p>Please enter your email and password to continue</p>
                        
                        <div class="mb-3">
                            <label class="col-sm-3 col-form-label">Mitra</label>
                            <select class="form-control" name="idFaskes" aria-label="Default select example" required>
                                <option value="">Pilih Faskes</option>
                                @foreach ($faskes as $f)
                                    <option value="{{ $f->id }}">{{ $f->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom08">Email Address</label>
                            <div class="input-group">
                                <input type="email" name="username" class="form-control" id="validationCustom08" placeholder="Email Address" required="">
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="validationCustom09">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="validationCustom09" placeholder="Password" required="">
                                <div class="invalid-feedback">
                                    Please provide a password.
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-group mt-2 mb-2">
                                <div class="captcha">
                                    <span>{!! captcha_img() !!}</span><br>
                                    <a href="#" id="reload">Refresh Captcha</a>
                                    {{-- <button type="button" class="btn btn-danger reload" id="reload">
                                        &#x21bb;
                                    </button> --}}
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control"  name="captcha" placeholder="Input Captcha" required>
                            </div>
                            <div class="invalid-feedback">
                                Please provide a captcha.
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="d-block mt-3"><a href="#" class="btn-link" data-toggle="modal" data-target="#modal-12">Forgot Password?</a></label>
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-primary mt-4 d-block w-100" type="submit">Login</button>
                        </div>
                    </form>
              </div>
           </div>
        </div>
     </div>
     <!-- Forgot Password Modal -->
     <div class="modal fade" id="modal-12" tabindex="-1" role="dialog" aria-labelledby="modal-12">
        <div class="modal-dialog modal-dialog-centered modal-min" role="document">
           <div class="modal-content">
              <div class="modal-body text-center">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <i class="flaticon-secure-shield d-block"></i>
                 <h1>Forgot Password?</h1>
                 <p> Enter your email to recover your password </p>
                 <form method="post">
                    <div class="ms-form-group has-icon">
                       <input type="text" placeholder="Email Address" class="form-control" name="forgot-password" value="">
                       <i class="material-icons">email</i>
                    </div>
                    <button type="submit" class="btn btn-primary shadow-none">Reset Password</button>
                 </form>
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
<script>
    $('#reload').click(function(){
        $.ajax({
            type:'GET',
            url:'reload-captcha',
            success:function(data){
                $(".captcha span").html(data.captcha)
            }
        });
    });
</script>
@endsection