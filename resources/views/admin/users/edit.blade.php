@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    {{-- Tempat Ngoding isi web --}}
<div class="content-wrapper">
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
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">{{ $page }}</h5>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <a href="{{ url('admin/users') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url("admin/users")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $user->id }}">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Gelar Depan</label>
                            <input name="prefix" id="prefix" class="form-control" type="text" value="{{ $user->prefix }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Nama</label>
                            <input name="nama" id="nama" class="form-control" type="text" value="{{ $user->nama }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Gelar Belakang</label>
                            <input name="suffix" id="suffix" class="form-control" type="text" value="{{ $user->suffix }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="username">Email</label>
                            <input name="username" id="Email" class="form-control" type="text" value="{{ $user->username }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idRole" required>
                                    <option value="{{ $user->idRole }}" selected>{{ $user->role->nama }}</option>
                                    <option value="">Pilih Role</option>
                                    @foreach ($userRole as $role)
                                        <option value="{{ $role->id }}">{{ $role->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Mitra</label>
                                <input name="idFaskes" id="idFaskes" class="form-control" type="text" value="{{ $user->faskes->nama }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="status" required>
                                    <option value="{{ $user->status }}" selected>
                                        @if($user->status == 1)
                                            Aktif
                                        @elseif ($user->status == 2)
                                            Tidak Aktif
                                        @endif
                                    </option>
                                    <option value="">Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Password</label>
                            <input name="password" id="password" class="form-control" type="text" value="{{ $user->sandi }}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Verifikasi Password</label>
                            <input name="verifikasi" id="password" class="form-control" type="text" value="{{ $user->sandi }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" class="btn btn-secondary" value="Cancel">
                </div>
            </form>
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