@extends( 'landing/layout/main' )

@section('css-library')
    
@endsection

@section('css-custom')
    
@endsection

@section('content')
<div class="row text-center">
    <div class="col-sm-12 text-center">
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="title">Terima Kasih</h3>
                <h5>Silahkan menekan tombol dibawah untuk kembali ke halaman lainnya.</h5>
            </div>
        </div>
        <div class="btn-box pb-4">
            <a href="{{ url('/e-uks/pemeriksaan-sd-sma', []) }}" class="theme-btn mb-2 mr-2">Halaman Utama</a>
        </div>
    </div>
</div>
@endsection

@section('js-library')
    
@endsection

@section('js-custom')
    
@endsection