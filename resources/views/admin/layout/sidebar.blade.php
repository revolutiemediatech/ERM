<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
  <!-- Logo -->
  <div class="logo-sn ms-d-block-lg">
    <a class="pl-0 ml-0 text-center" href="{{ url('admin/home') }}"> <h4 style="color:white">O'RBS MEDICA</h4> </a>
    <a href="#" class="text-center ms-logo-img-link"> 
      @if (session()->get('gambar') == NULL)
        <img class="img-profile rounded-circle avatar" src="{{ url('') }}/assets/img/logo.jpg" alt="logo">
      @else
        <img class="img-profile rounded-circle avatar" src="{{ url("upload\profile") }}\{{ session()->get('gambar') }}"/>
      @endif
      {{-- <img src="{{ url('') }}/assets/img/logo.jpg" alt="logo"> --}}
    </a>
    <h5 class="text-center text-white mt-2">{{ session()->get('nama') }}</h5>
    <h6 class="text-center text-white mb-3">Super Admin</h6>
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
    <li class="menu-item">
      <a href="{{ url('admin/home') }}">
        <span><i class="fas fa-home"></i>Home</span>
      </a>
    </li>
    <!-- /Dashboard -->

    <!-- Profile -->
    <li class="menu-item">
      <a href="{{ url('admin/profile') }}">
        <span><i class="fas fa-user"></i>Profile</span>
      </a>
    </li>
    <!-- /Profile -->

    <!-- settings -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settings" aria-expanded="false" aria-controls="settings">
        <span><i class="fas fa-cog ms-icon-mr"></i>Settings</span>
      </a>
      <ul id="settings" class="collapse" aria-labelledby="settings" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/autofill-custom') }}">Auto Fill Custom</a></li>
        <li> <a href="{{ url('admin/kop') }}">Data Kop</a></li>
        <li> <a href="{{ url('admin/medical_record') }}">Medical Record</a></li>
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#resume" aria-expanded="false" aria-controls="resume">Data Resume</a>
          <ul id="resume" class="collapse" aria-labelledby="resume" data-parent="#pages">
              <li> <a href="{{ url('admin/api-wa') }}">API WA</a> </li>
              <li> <a href="{{ url('admin/api-bpjs') }}">API BPJS</a> </li>
              <li> <a href="{{ url('admin/api-satu-sehat') }}">API Satu Sehat</a> </li>
          </ul>
        </li>
      </ul>
    </li>
    <!-- /settings -->

    <!-- Payment -->
    <li class="menu-item">
      <a href="{{ url('admin/checkout') }}">
        <span><i class="fas fa-credit-card"></i>Payment List</span>
      </a>
    </li>
    <!-- /Payment -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      <span style="color: #ffff">Master Data</span>
    </div>

    <!-- Karyawan -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#karyawan" aria-expanded="false" aria-controls="karyawan">
        <span><i class="fas fa-users"></i>Mitra</span>
      </a>
      <ul id="karyawan" class="collapse" aria-labelledby="karyawan" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/users') }}">Data Karyawan</a></li>
        <li> <a href="{{ url('admin/sekolah') }}">Data Sekolah</a></li>
        <li> <a href="{{ url('admin/role') }}">Data Role</a></li>
        <li> <a href="{{ url('admin/mitra') }}">Data Mitra</a></li>
        <li> <a href="{{ url('admin/lokasi-pemeriksaan') }}">Data Cabang Mitra</a></li>
        <li> <a href="{{ url('admin/kamar') }}">Data Kamar</a></li>
        <li> <a href="{{ url('admin/bed') }}">Data Bed Kamar</a></li>
        <li> <a href="{{ url('admin/tindakan-medis') }}">Data Tindakan Medis</a></li>
        <li> <a href="{{ url('admin/billing') }}">Data Billing</a></li>
        <li> <a href="{{ url('admin/jenis-pasien') }}">Data Pembiayaan</a></li>
      </ul>
    </li>
    <!-- /Karyawan -->
    <!-- master_data -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#master_data" aria-expanded="false" aria-controls="master_data">
        <span><i class="fas fa-sitemap"></i>Master Data</span>
      </a>
      <ul id="master_data" class="collapse" aria-labelledby="master_data" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/provinsi') }}">Data Provinsi</a></li>
        <li> <a href="{{ url('admin/daerah') }}">Data Daerah</a></li>
        <li> <a href="{{ url('admin/kecamatan') }}">Data Kecamatan</a></li>
        <li> <a href="{{ url('admin/desa') }}">Data Desa</a></li>
        <li> <a href="{{ url('admin/pekerjaan') }}">Data Pekerjaan</a></li>
        <li> <a href="{{ url('admin/goldar') }}">Data Golongan Darah</a></li>
        <li> <a href="{{ url('admin/rhesus') }}">Data Rhesus Goldar</a></li>
        <li> <a href="{{ url('admin/kunjungan-sakit') }}">Data Kunjungan Sakit</a></li>
        <li> <a href="{{ url('admin/unit-pelayanan') }}">Data Unit Pelayanan</a></li>
        <li> <a href="{{ url('admin/jenis-kelamin') }}">Data Jenis Kelamin</a></li>
        <li> <a href="{{ url('admin/perawatan') }}">Data Perawatan</a></li>
        <li> <a href="{{ url('admin/pendidikan') }}">Data Pendidikan</a></li>
      </ul>
    </li>
    <!-- master_data -->
    <!-- Pasien -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#patient" aria-expanded="false" aria-controls="patient">
        <span><i class="fas fa-user"></i>Administrasi</span>
      </a>
      <ul id="patient" class="collapse" aria-labelledby="patient" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/pasienn') }}">Data Pasien</a></li>
        <li> <a href="{{ url('admin/pasienn/create') }}">Registrasi Pasien</a></li>
        <li> <a href="{{ url('admin/rujukan') }}">Pasien Alih Rawat Inap</a></li>
        {{-- <li> <a href="{{ url('admin/cari-pasien') }}">Cari Pasien</a></li> --}}
      </ul>
    </li>
    <!-- /Pasien -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      <span style="color: #ffff">Pelayanan</span>
    </div>

    <!-- Farmasi -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages">
        <span><i class="fas fa-briefcase-medical ms-icon-mr"></i>Farmasi</span>
      </a>
      <ul id="pages" class="collapse" aria-labelledby="pages" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/obat') }}">Data Obat</a></li>
        <li> <a href="{{ url('admin/pengajuan-obat-rajal') }}">Obat Pasien Rawat Jalan</a></li>
        <li> <a href="{{ url('admin/pengajuan-obat-ranap') }}">Obat Pasien Rawat Inap</a></li>
      </ul>
    </li>
    <!-- /Farmasi -->
    <!-- Labor -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#labor" aria-expanded="false" aria-controls="labor">
        <span><i class="fas fa-briefcase-medical ms-icon-mr"></i>Labor</span>
      </a>
      <ul id="labor" class="collapse" aria-labelledby="labor" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/labor') }}">Data Labor</a></li>
        <li> <a href="{{ url('admin/pengajuan-labor') }}">Pengajuan Rawat Jalan</a></li>
        <li> <a href="{{ url('admin/pengajuan-labor-inap') }}">Pengajuan Rawat Inap</a></li>
      </ul>
    </li>
    <!-- /Labor -->
    <!-- Penunjang -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#penunjang" aria-expanded="false" aria-controls="penunjang">
        <span><i class="fas fa-briefcase-medical ms-icon-mr"></i>Penunjang</span>
      </a>
      <ul id="penunjang" class="collapse" aria-labelledby="penunjang" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/penunjang') }}">Data Penunjang</a></li>
        <li> <a href="{{ url('admin/pengajuan-penunjang') }}">Pengajuan Rawat Jalan</a></li>
        <li> <a href="{{ url('admin/pengajuan-penunjang-inap') }}">Pengajuan Rawat Inap</a></li>
      </ul>
    </li>
    <!-- /Penunjang -->

    <!-- Rawat Jalan -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#rawat_jalan" aria-expanded="false" aria-controls="rawat_jalan">
        <span><i class="fas fa-user"></i>Rawat Jalan</span>
      </a>
      <ul id="rawat_jalan" class="collapse" aria-labelledby="rawat_jalan" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/rawat-jalan/bp-umum') }}">BP.Umum</a></li>
        <li> <a href="{{ url('admin/rawat-jalan/lansia') }}">Lansia</a></li>
        <li> <a href="{{ url('admin/rawat-jalan/ugd') }}">UGD</a></li>
        <li> <a href="{{ url('admin/rawat-jalan/bp-gigi') }}">BP. Gigi</a></li>
        <li> <a href="{{ url('admin/rawat-jalan/kia') }}">KIA, Imunisasi dan KB</a></li>
        {{-- <li> <a href="{{ url('admin/rawat-jalan/laborat') }}">Laborat</a></li> --}}
        <li> <a href="{{ url('admin/rawat-jalan/infeksi') }}">Infeksi</a></li>
        {{-- <li> <a href="{{ url('admin/cari-pasien') }}">Cari Pasien</a></li> --}}
      </ul>
    </li>
    <!-- /Rawat Jalan -->
    
    <!-- Rawat Inap -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#rawat_inap" aria-expanded="false" aria-controls="rawat_inap">
        <span><i class="fas fa-user"></i>Rawat Inap</span>
      </a>
      <ul id="rawat_inap" class="collapse" aria-labelledby="rawat_inap" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('admin/rawat-inap/pasien') }}">Data Pasien</a></li>
      </ul>
    </li>
    <!-- /Rawat Inap -->
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      <span style="color: #ffff">E-Health</span>
    </div>

    <!-- E-Uks -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eUks" aria-expanded="false" aria-controls="eUks">
        <span><i class="fas fa-stethoscope"></i>E-UKS</span>
      </a>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#setPjUks" aria-expanded="false" aria-controls="setPjUks">Setting</a>
          <ul id="setPjUks" class="collapse" aria-labelledby="setPjUks" data-parent="#pages">
            {{-- <li> <a href="{{ url('#')}}">Data Screening</a> </li> --}}
            <li> <a href="{{ url('admin/penanggungjawab-eUks')}}">Penanggung Jawab</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-targetF="#screeningKes" aria-expanded="false" aria-controls="screeningKes">Screening Kesehatan Siswa Mandiri</a>
          <ul id="screeningKes" class="collapse" aria-labelledby="screeningKes" data-parent="#pages">
            {{-- <li> <a href="{{ url('#')}}">Data Screening</a> </li> --}}
            <li> <a href="{{ url('/admin/question')}}">Pertanyaan</a> </li>
            <li> <a href="{{ url('/admin/answer')}}">Jawaban</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pemfisSdSma" aria-expanded="false" aria-controls="pemfisSdSma">Pemeriksaan Fisik SD - SMA</a>
          <ul id="pemfisSdSma" class="collapse" aria-labelledby="pemfisSdSma" data-parent="#pages">
            <li> <a href="{{ url('admin/e-uks/pemeriksaan-sd-sma')}}" target="_blank">Kuesioner</a> </li>
            <li> <a href="{{ url('admin/pemeriksaan-sd-sma')}}">Data Pemeriksaan</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pemfisDdtk" aria-expanded="false" aria-controls="pemfisDdtk">Pemeriksaan Fisik DDTK</a>
          <ul id="pemfisDdtk" class="collapse" aria-labelledby="pemfisDdtk" data-parent="#pages">
            <li> <a href="{{ url('admin/e-uks/pemeriksaan-ddtk')}}" target="_blank">Kuesioner</a> </li>
            <li> <a href="{{ url('admin/pemeriksaan-ddtk')}}">Data Pemeriksaan</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pemfisGigi" aria-expanded="false" aria-controls="pemfisGigi">Pemeriksaan Fisik UKS Gigi</a>
          <ul id="pemfisGigi" class="collapse" aria-labelledby="pemfisGigi" data-parent="#pages">
            <li> <a href="{{ url('admin/e-uks/pemeriksaan-gigi')}}" target="_blank">Kuesioner</a> </li>
            <li> <a href="{{ url('admin/pemeriksaan-gigi')}}">Data Pemeriksaan</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eUks" class="collapse" aria-labelledby="eUks" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#analisisUks" aria-expanded="false" aria-controls="analisisUks">Analisis</a>
          <ul id="analisisUks" class="collapse" aria-labelledby="analisisUks" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Penjaringan</a> </li>
            <li> <a href="{{ url('#')}}">Berkala</a> </li>
            <li> <a href="{{ url('#')}}">DDTK (TK)</a> </li>
            <li> <a href="{{ url('#')}}">DEF DMF (KB)</a> </li>
            <li> <a href="{{ url('#')}}">Laporan Identitas Salah</a> </li>
          </ul>
        </li>
      </ul>
    </li>
    <!-- /E-Uks -->

    <!-- E-Munisasi -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eMunisasi" aria-expanded="false" aria-controls="eMunisasi">
        <span><i class="fas fa-stethoscope"></i>E-Munisasi</span>
      </a>
      <ul id="eMunisasi" class="collapse" aria-labelledby="eMunisasi" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#SettingMunisasi" aria-expanded="false" aria-controls="SettingMunisasi">Setting</a>
          <ul id="SettingMunisasi" class="collapse" aria-labelledby="SettingMunisasi" data-parent="#pages">
            <li> <a href="{{ url('#')}}">PJ E-Munisasi</a> </li>
            <li> <a href="{{ url('#')}}">PJ KIPI</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eMunisasi" class="collapse" aria-labelledby="eMunisasi" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#jenisMunisasi" aria-expanded="false" aria-controls="jenisMunisasi">Jenis Imunisasi</a>
          <ul id="jenisMunisasi" class="collapse" aria-labelledby="jenisMunisasi" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Bayi</a> </li>
            <li> <a href="{{ url('#')}}">Anak</a> </li>
            <li> <a href="{{ url('#')}}">WUS/CATEN</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eMunisasi" class="collapse" aria-labelledby="eMunisasi" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#rekapMunisasi" aria-expanded="false" aria-controls="rekapMunisasi">Rekapitulasi</a>
          <ul id="rekapMunisasi" class="collapse" aria-labelledby="rekapMunisasi" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Kohort E-Munisasi</a> </li>
            <li> <a href="{{ url('#')}}">Raport Kesehatan E-Munisasi</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eMunisasi" class="collapse" aria-labelledby="eMunisasi" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#kipiMunisasi" aria-expanded="false" aria-controls="kipiMunisasi">KIPI</a>
          <ul id="kipiMunisasi" class="collapse" aria-labelledby="kipiMunisasi" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Data KIPI</a> </li>
            <li> <a href="{{ url('#')}}">Rekapitulasi</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eMunisasi" class="collapse" aria-labelledby="eMunisasi" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#vaksinMunisasi" aria-expanded="false" aria-controls="vaksinMunisasi">Vaksin</a>
          <ul id="vaksinMunisasi" class="collapse" aria-labelledby="vaksinMunisasi" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Data Stock</a> </li>
            <li> <a href="{{ url('#')}}">Analisis</a> </li>
          </ul>
        </li>
      </ul>
    </li>
    <!-- /E-Munisasi -->

    <!-- E-Pendaftaran -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#ePendaftaran" aria-expanded="false" aria-controls="ePendaftaran">
        <span><i class="fas fa-stethoscope"></i>E-Pendaftaran</span>
      </a>
      <ul id="ePendaftaran" class="collapse" aria-labelledby="ePendaftaran" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingPendaf" aria-expanded="false" aria-controls="settingPendaf">Setting</a>
          <ul id="settingPendaf" class="collapse" aria-labelledby="settingPendaf" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Data Petugas</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="ePendaftaran" class="collapse" aria-labelledby="ePendaftaran" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#bpjsPendaf" aria-expanded="false" aria-controls="bpjsPendaf">BPJS</a>
          <ul id="bpjsPendaf" class="collapse" aria-labelledby="bpjsPendaf" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Pasien Pernah Berobat</a> </li>
            <li> <a href="{{ url('#')}}">Pasien Belum Pernah Berobat</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="ePendaftaran" class="collapse" aria-labelledby="ePendaftaran" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#umumPendaf" aria-expanded="false" aria-controls="umumPendaf">Umum</a>
          <ul id="umumPendaf" class="collapse" aria-labelledby="umumPendaf" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Pasien Pernah Berobat</a> </li>
            <li> <a href="{{ url('#')}}">Pasien Belum Pernah Berobat</a> </li>
            <li> <a href="{{ url('#')}}">Validasi Pasien Belum Pernah Berobat</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="ePendaftaran" class="collapse" aria-labelledby="ePendaftaran" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">CheckIn</a></li>
      </ul>
    </li>
    <!-- /E-Pendaftaran -->
    
    <!-- E-Konsultasi -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eKonsultasi" aria-expanded="false" aria-controls="eKonsultasi">
        <span><i class="fas fa-stethoscope"></i>E-Konsultasi</span>
      </a>
      <ul id="eKonsultasi" class="collapse" aria-labelledby="eKonsultasi" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingKonsul" aria-expanded="false" aria-controls="settingKonsul">Setting</a>
          <ul id="settingKonsul" class="collapse" aria-labelledby="settingKonsul" data-parent="#pages">
            <li> <a href="{{ url('admin/penanggungjawab-eKonsultasi')}}">Penanggung Jawab</a> </li>
            <li> <a href="{{ url('admin/topik-eKonsultasi')}}">Topik</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eKonsultasi" class="collapse" aria-labelledby="eKonsultasi" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#dataKonsultasi" aria-expanded="false" aria-controls="dataKonsultasi">Konsultasi</a>
          <ul id="dataKonsultasi" class="collapse" aria-labelledby="dataKonsultasi" data-parent="#pages">
            <li> <a href="{{ url('e-konsultasi/konsultasi')}}" target="_blank">Kuesioner</a> </li>
            <li> <a href="{{ url('admin/konsultasi')}}">Data Konsultasi</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eKonsultasi" class="collapse" aria-labelledby="eKonsultasi" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Respon</a></li>
      </ul>
    </li>
    <!-- /E-Konsultasi -->
    
    <!-- E-Mutu -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eMutu" aria-expanded="false" aria-controls="eMutu">
        <span><i class="fas fa-stethoscope"></i>E-Mutu</span>
      </a>
      <ul id="eMutu" class="collapse" aria-labelledby="eMutu" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingMutu" aria-expanded="false" aria-controls="settingMutu">Setting</a>
          <ul id="settingMutu" class="collapse" aria-labelledby="settingMutu" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Topik</a> </li>
            <li> <a href="{{ url('#')}}">PJ Topik</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eMutu" class="collapse" aria-labelledby="eMutu" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#RegistrasiMutu" aria-expanded="false" aria-controls="RegistrasiMutu">Registrasi</a>
          <ul id="RegistrasiMutu" class="collapse" aria-labelledby="RegistrasiMutu" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Data Cabang</a> </li>
            <li> <a href="{{ url('#')}}">Data Karakteristik</a> </li>
            <li> <a href="{{ url('#')}}">Index Nasional Mutu</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eMutu" class="collapse" aria-labelledby="eMutu" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Analisis</a></li>
      </ul>
      <ul id="eMutu" class="collapse" aria-labelledby="eMutu" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Respon</a></li>
      </ul>
    </li>
    <!-- /E-Mutu -->
    
    <!-- E-Aduan -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eAduan" aria-expanded="false" aria-controls="eAduan">
        <span><i class="fas fa-stethoscope"></i>E-Aduan</span>
      </a>
      <ul id="eAduan" class="collapse" aria-labelledby="eAduan" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingAduan" aria-expanded="false" aria-controls="settingAduan">Setting</a>
          <ul id="settingAduan" class="collapse" aria-labelledby="settingAduan" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Nama Grup</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eAduan" class="collapse" aria-labelledby="eAduan" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Data Aduan</a></li>
      </ul>
      <ul id="eAduan" class="collapse" aria-labelledby="eAduan" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Respon</a></li>
      </ul>
    </li>
    <!-- /E-Aduan -->

    <!-- E-Prolanis -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eProlanis" aria-expanded="false" aria-controls="eProlanis">
        <span><i class="fas fa-stethoscope"></i>E-Prolanis</span>
      </a>
      {{-- <ul id="eProlanis" class="collapse" aria-labelledby="eProlanis" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingAduan" aria-expanded="false" aria-controls="settingAduan">Setting</a>
          <ul id="settingAduan" class="collapse" aria-labelledby="settingAduan" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Nama Grup</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eProlanis" class="collapse" aria-labelledby="eProlanis" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Data Aduan</a></li>
      </ul>
      <ul id="eProlanis" class="collapse" aria-labelledby="eProlanis" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Respon</a></li>
      </ul> --}}
    </li>
    <!-- E-Prolanis -->

    <!-- E-Messenger -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eMessenger" aria-expanded="false" aria-controls="eMessenger">
        <span><i class="fas fa-stethoscope"></i>E-Messenger</span>
      </a>
      {{-- <ul id="eMessenger" class="collapse" aria-labelledby="eMessenger" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingAduan" aria-expanded="false" aria-controls="settingAduan">Setting</a>
          <ul id="settingAduan" class="collapse" aria-labelledby="settingAduan" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Nama Grup</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eMessenger" class="collapse" aria-labelledby="eMessenger" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Data Aduan</a></li>
      </ul>
      <ul id="eMessenger" class="collapse" aria-labelledby="eMessenger" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Respon</a></li>
      </ul> --}}
    </li>
    <!-- E-Messenger -->

    <!-- E-Database -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eDatabase" aria-expanded="false" aria-controls="eDatabase">
        <span><i class="fas fa-stethoscope"></i>E-Database</span>
      </a>
      {{-- <ul id="eDatabase" class="collapse" aria-labelledby="eDatabase" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingAduan" aria-expanded="false" aria-controls="settingAduan">Setting</a>
          <ul id="settingAduan" class="collapse" aria-labelledby="settingAduan" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Nama Grup</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eDatabase" class="collapse" aria-labelledby="eDatabase" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Data Aduan</a></li>
      </ul>
      <ul id="eDatabase" class="collapse" aria-labelledby="eDatabase" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Respon</a></li>
      </ul> --}}
    </li>
    <!-- E-Database -->

    <!-- E-Screening -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eScreening" aria-expanded="false" aria-controls="eScreening">
        <span><i class="fas fa-stethoscope"></i>E-Screening</span>
      </a>
      {{-- <ul id="eScreening" class="collapse" aria-labelledby="eScreening" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingAduan" aria-expanded="false" aria-controls="settingAduan">Setting</a>
          <ul id="settingAduan" class="collapse" aria-labelledby="settingAduan" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Nama Grup</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eScreening" class="collapse" aria-labelledby="eScreening" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Data Aduan</a></li>
      </ul>
      <ul id="eScreening" class="collapse" aria-labelledby="eScreening" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Respon</a></li>
      </ul> --}}
    </li>
    <!-- E-Screening -->

    <!-- E-Perkesmas -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#ePerkesmas" aria-expanded="false" aria-controls="ePerkesmas">
        <span><i class="fas fa-stethoscope"></i>E-Perkesmas</span>
      </a>
      <ul id="ePerkesmas" class="collapse" aria-labelledby="ePerkesmas" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingPerkesmas" aria-expanded="false" aria-controls="settingPerkesmas">Setting</a>
          <ul id="settingPerkesmas" class="collapse" aria-labelledby="settingPerkesmas" data-parent="#pages">
            <li> <a href="{{ url('admin/wilayah-ePerkesmas')}}">Data Wilayah</a> </li>
            <li> <a href="{{ url('admin/penanggungjawab-ePerkesmas')}}">Penanggung Jawab</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="ePerkesmas" class="collapse" aria-labelledby="ePerkesmas" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#validasiPerkesmas" aria-expanded="false" aria-controls="validasiPerkesmas">Validasi</a>
          <ul id="validasiPerkesmas" class="collapse" aria-labelledby="validasiPerkesmas" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Data Valid</a> </li>
            <li> <a href="{{ url('#')}}">Data Invalid</a> </li>
            <li> <a href="{{ url('#')}}">Rekapitulasi</a> </li>
          </ul>
        </li>
      </ul>
    </li>
    <!-- E-Perkesmas -->

    <!-- E-Jiwa -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#eJiwa" aria-expanded="false" aria-controls="eJiwa">
        <span><i class="fas fa-stethoscope"></i>E-Jiwa</span>
      </a>
      {{-- <ul id="eJiwa" class="collapse" aria-labelledby="eJiwa" data-parent="#side-nav-accordion">
        <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#settingAduan" aria-expanded="false" aria-controls="settingAduan">Setting</a>
          <ul id="settingAduan" class="collapse" aria-labelledby="settingAduan" data-parent="#pages">
            <li> <a href="{{ url('#')}}">Nama Grup</a> </li>
          </ul>
        </li>
      </ul>
      <ul id="eJiwa" class="collapse" aria-labelledby="eJiwa" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Data Aduan</a></li>
      </ul>
      <ul id="eJiwa" class="collapse" aria-labelledby="eJiwa" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('#') }}">Respon</a></li>
      </ul> --}}
    </li>
    <!-- E-Jiwa -->
  </ul>
</aside>