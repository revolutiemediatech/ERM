@extends( $admin )

@section('css-library')
@endsection

@section('css-custom')
    
@endsection

@section('content')
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
        <div class="ms-panel">
            <div class="ms-panel-header header-mini">
               <div class="d-flex justify-content-between">
                  <h6>{{ $page }}</h6>
                  <span class='btn btn-sm btn-success'><b>{{ $pasien->jenisPasien->nama }}</b></span>
               </div>
            </div>
            <div class="ms-panel-body">
               <!-- Invoice To -->
               <div class="row align-items-center">
                  <div class="col-md-6">
                     <div class="invoice-address">
                        <h3>Reciever: </h3>
                        <h5>{{ $pasien->nama }}</h5>
                        <p>{{ $pasien->faskes->nama }} - {{ $pasien->lokasiPemeriksaan->nama }} - {{ $pasien->no_index}}</p>
                        <p class="mb-0">{{ $pasien->alamat }}</p>
                        <p class="mb-0">{{ $pasien->daerah->nama}}, {{ $pasien->provinsi->nama }}</p>
                     </div>
                  </div>
                  <div class="col-md-6 text-md-right">
                     <ul class="invoice-date">
                        <li><span id="tanggalwaktu"></span></li>
                     </ul>
                  </div>
               </div>
               <!-- Invoice Table -->
               <div class="ms-invoice-table table-responsive mt-5">
                  <table class="table table-hover text-right thead-light">
                     <thead>
                        <tr class="text-capitalize">
                           <th class="text-center w-5">No</th>
                           <th class="text-left">Rincian Biaya</th>
                           <th>Perawatan</th>
                           <th>QTY</th>
                           <th>total</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php
                           $totalCost = 0; $no=1;
                        @endphp
                        <tr>
                              <td class="text-center">{{ $no++ }}</td>
                              <td class="text-left">Administrasi</td>
                              <td>{{ $pasien->perawatan->nama }}</td>
                              <td>1</td>
                              <td>{{ rupiah($pasien->jenisAdmin->harga) }}</td>
                        </tr>
                        @php
                           $totalCost += $pasien->jenisAdmin->harga;
                        @endphp
                        @foreach ($pasien->biayaLabor as $pb)
                           <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td class="text-left">Hasil Labor {{ $pb->labor->nama }}</td>
                                 <td>{{ $pasien->perawatan->nama }}</td>
                                 <td>1</td>
                                 <td>{{ rupiah($pb->harga) }}</td>
                           </tr>
                           @php
                              $totalCost += $pb->harga;
                           @endphp
                        @endforeach
                        @foreach ($pasien->biayaPenunjang as $pp)
                           <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td class="text-left">Penunjang {{ $pp->penunjang->nama }}</td>
                                 <td>{{ $pasien->perawatan->nama }}</td>
                                 <td>1</td>
                                 <td>{{ rupiah($pp->harga) }}</td>
                           </tr>
                           @php
                              $totalCost += $pp->harga;
                           @endphp
                        @endforeach
                        {{-- @foreach ($pasien->biayaAssesment as $pp)
                           <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td class="text-left">Assesment {{ $pp->icdTen->nama }}</td>
                                 <td>{{ $pasien->perawatan->nama }}</td>
                                 <td>1</td>
                                 <td>{{ $pp->harga }}</td>
                           </tr>
                           @php
                              $totalCost += $po->obat->harga;
                           @endphp
                        @endforeach --}}
                        @foreach ($pasien->biayaTindakan as $pp)
                           <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td class="text-left">Tindakan {{ $pp->tindakanMedis->nama }}</td>
                                 <td>{{ $pasien->perawatan->nama }}</td>
                                 <td>1</td>
                                 <td>{{ rupiah($pp->tindakanMedis->harga) }}</td>
                           </tr>
                           @php
                              $totalCost += $pp->tindakanMedis->harga;
                           @endphp
                        @endforeach
                        @isset($pasien->kamar)
                           <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td class="text-left">Kamar {{ $pasien->kamar->nama }}</td>
                                 <td>{{ $pasien->perawatan->nama }}</td>
                                 <td>1</td>
                                 {{-- <td>Rp {{ $pp->harga }}</td> --}}
                                 <td>{{ rupiah($pasien->kamar->harga) }}</td>
                           </tr>
                           @php
                              $totalCost += $pasien->kamar->harga;
                           @endphp
                        @endisset
                        @foreach ($pilihanObat as $po)
                           <tr>
                              <td class="text-center">{{ $no++ }}</td>
                              <td class="text-left">Obat : {{ $po->obat->nama}}</td>
                              <td>{{ $po->pasien->perawatan->nama  }}</td>
                              <td>{{ $po->jumlah }}</td>
                              <td>{{ rupiah($po->obat->harga) }}</td>
                           </tr>
                           @php
                              $totalCost += $po->obat->harga;
                           @endphp
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <td colspan="4">Total Cost: </td>
                           <td>{{ rupiah($totalCost) }}</td>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <div class="invoice-buttons text-right">
                  <a href="#" class="btn btn-primary mr-2">Print Invoice</a>
                  <a href="#" class="btn btn-primary">Send Invoice</a>
               </div>
            </div>
         </div>
    </div>
</div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}

    <!-- Required datatable js -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>

@endsection

@section('js-custom')
    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
        else (a=tw.getTime());
        tw.setTime(a);
        var tahun= tw.getFullYear ();
        var hari= tw.getDay ();
        var bulan= tw.getMonth ();
        var tanggal= tw.getDate ();
        var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
        var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
        document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun+" "+((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes();
    </script>
@endsection