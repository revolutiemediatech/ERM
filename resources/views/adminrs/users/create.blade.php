@extends($adminRs)

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
                    <a href="{{ url('adminRs/users') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke adminRs/daerah , karena pake resource --}}
            <form action="{{ url('adminRs/users') }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Gelar Depan</label>
                        <input name="prefix" id="prefix" class="form-control" type="text" placeholder="Gelar Depan">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama</label>
                        <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Gelar Belakang</label>
                        <input name="suffix" id="suffix" class="form-control" type="text" placeholder="Gelar Belakang">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="username">Email</label>
                        <input name="username" id="Email" class="form-control" type="text" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="no_hp">No HP</label>
                        <input name="no_hp" id="Email" class="form-control" type="number" placeholder="No HP">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="no_wa">No WA</label>
                        <input name="no_wa" id="no_wa" class="form-control" type="number" placeholder="No WA">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="password">Password</label>
                        <input name="password" id="password" class="form-control" type="text" placeholder="password">
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">Role</div>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="idRole" required>
                            <option value="">Pilih Role</option>
                            @foreach ($userRole as $role)
                                <option value="{{ $role->id }}">{{ $role->nama }}</option>
                            @endforeach
                        </select>
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
