<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Super Admin
    //provinsi, daerah, dll
    Route::any('getAllProvinsi/', 'Api\DaerahController@getAllProvinsi');
    Route::any('getDaerah/{idMprovinsi}', 'Api\DaerahController@getDaerah');
    Route::any('getKecamatan/{idMdaerah}', 'Api\DaerahController@getKecamatan');
    Route::any('getDesa/{idMkecamatan}', 'Api\DaerahController@getDesa');
    Route::any('getDataPasSA/{no_kk}', 'Api\DaerahController@getDataPasSA');
    Route::any('getCustom/{custom}', 'Api\DaerahController@getCustom');
    Route::any('getSekolah/{idMkecamatan}', 'Api\DaerahController@getSekolah');

    // get data sekolah
    Route::any('daerahkhusus/getSekolah/{idMKecamatan}', 'Api\DaerahTabelController@getSekolah');

    Route::any('daerahkhusus/getDesa/{idMKecamatan}', 'Api\DaerahTabelController@getDesa');
    Route::any('daerahkhusus/getKecamatan/{idMDaerah}', 'Api\DaerahTabelController@getKecamatan');
    Route::any('daerahkhusus/getDaerah/{idMProvinsi}', 'Api\DaerahTabelController@getDaerah');

    //tabel mitra
    Route::any('tabelkhusussemua/getTabelMitra/{idMDesa}', 'Api\TabelKhususSemua@getTabelMitra');
    Route::any('getTabelKamarSA/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelKamarSA');
    Route::any('getTabelBedSA/{idKamar}', 'Api\TabelKhususSemua@getTabelBedSA');
    Route::any('getTabelPasienSA/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelPasienSA');
    Route::any('getTabelPasienRujuk/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelPasienRujuk');
    Route::any('getObat/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getObat');
    Route::any('getPasien/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getPasien');
    Route::any('getLabor/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getLabor');
    Route::any('getPenunjang/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getPenunjang');
    Route::any('getBilling/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getBilling');
    Route::any('getAdministrasi/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getAdministrasi');
    Route::any('tabelkhusussemua/getSekolah/{idMkecamatan}', 'Api\TabelKhususSemua@getSekolah');

    //data pengajuan labor rawat jalan
    Route::any('getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelPengajuanLabor');
    
    //data pengajuan labor rawat inap
    Route::any('getTabelPengajuanLaborInap/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelPengajuanLaborInap');

    //data pengajuan penunjang rawat jalan
    Route::any('getTabelPengajuanPenunjang/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelPengajuanPenunjang');

    //data pengajuan penunjang rawat inap
    Route::any('getTabelPengajuanPenunjangInap/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelPengajuanPenunjangInap');
    
    //pengajuan obat rajal
    Route::any('getTabelPengajuanObatRajal/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelPengajuanObatRajal');

    //pengajuan obat ranap
    Route::any('getTabelPengajuanObatRanap/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelPengajuanObatRanap');

    //kamar dan bed
    Route::any('getAllKamar/', 'Api\kamarController@getAllKamar');
    Route::any('getKamar/{idLokasiPemeriksaan}', 'Api\kamarController@getKamar');
    Route::any('getBed/{idKamar}', 'Api\kamarController@getBed');

    //mitra
    Route::any('getAllMitra/', 'Api\MitraController@getAllMitra');
    Route::any('getLokasi/{idFaskes}', 'Api\MitraController@getLokasi');

    //rawat jalan
    Route::any('getTabelUmum/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelUmum');
    Route::any('getTabelLansia/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelLansia');
    Route::any('getTabelUgd/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelUgd');
    Route::any('getTabelGigi/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelGigi');
    Route::any('getTabelKia/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelKia');
    Route::any('getTabelGizi/{idLokasiPemeriksaan}', 'Api\TabelKhususSemua@getTabelGizi');

//Admin Faskes

    //tabel mitra
    Route::any('adminrs/tabelkhusussemua/getTabelMitra/{idMDesa}', 'Api\adminRs\TabelKhususSemua@getTabelMitra');
    Route::any('adminrs/getTabelKamarSA/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelKamarSA');
    Route::any('adminrs/getTabelBedSA/{idKamar}', 'Api\adminRs\TabelKhususSemua@getTabelBedSA');
    Route::any('adminrs/getTabelPasienSA/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPasienSA');
    Route::any('adminrs/getTabelPasienRujuk/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPasienRujuk');
    Route::any('adminrs/getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPengajuanLabor');
    Route::any('adminrs/getTabelPengajuanObat/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPengajuanObat');
    Route::any('adminrs/getObat/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getObat');
    Route::any('adminrs/getPasien/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getPasien');
    
    //rawat jalan
    Route::any('adminrs/getTabelUmum/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelUmum');
    Route::any('adminrs/getTabelLansia/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelLansia');
    Route::any('adminrs/getTabelUgd/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelUgd');
    Route::any('adminrs/getTabelGigi/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelGigi');
    Route::any('adminrs/getTabelKia/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelKia');
    Route::any('adminrs/getTabelGizi/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelGizi');
    Route::any('adminrs/getTabelPengajuanObatRajal/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPengajuanObatRajal');
    Route::any('adminrs/getTabelPengajuanObatRanap/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPengajuanObatRanap');

    //labor
    Route::any('adminrs/getTabelPengajuanLaborInap/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPengajuanLaborInap');
    Route::any('adminrs/getLabor/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getLabor');
    Route::any('adminrs/getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPengajuanLabor');

    //penunjang
    Route::any('adminrs/getPenunjang/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getPenunjang');
    Route::any('adminrs/getPengajuanPenunjang/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getPengajuanPenunjang');
    Route::any('adminrs/getTabelPengajuanPenunjangInap/{idLokasiPemeriksaan}', 'Api\adminRs\TabelKhususSemua@getTabelPengajuanPenunjangInap');


// Dokter
    // Tabel Pasien
    Route::any('dokter/getPasienDokter/{idKamar}', 'Api\dokter\TabelKhususSemua@getPasienDokter');
    Route::any('dokter/getPasienDokter/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getPasienDokter');
    Route::any('dokter/getTabelPengajuanObat/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelPengajuanObat');
    Route::any('dokter/getPasien/{idLokasiPemeriksaan}', 'Api\labor\TabelKhususSemua@getPasien');
    
    // Obat
    Route::any('dokter/getObatDokter/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getObatDokter');

    // penunjang
    Route::any('dokter/getPenunjang/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getPenunjang');

    //data pengajuan penunjang rawat jalan
    Route::any('dokter/getTabelPengajuanPenunjang/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelPengajuanPenunjang');

    //data pengajuan penunjang rawat inap
    Route::any('dokter/getTabelPengajuanPenunjangInap/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelPengajuanPenunjangInap');
    
    //pengajuan obat rajal
    Route::any('dokter/getTabelPengajuanObatRajal/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelPengajuanObatRajal');

    //pengajuan obat ranap
    Route::any('dokter/getTabelPengajuanObatRanap/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelPengajuanObatRanap');

    //data pengajuan labor rawat jalan
    Route::any('dokter/getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelPengajuanLabor');
    
    //data pengajuan labor rawat inap
    Route::any('dokter/getTabelPengajuanLaborInap/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelPengajuanLaborInap');
    
    Route::any('dokter/getLabor/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getLabor');
    
    //rawat jalan
    Route::any('dokter/getTabelUmum/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelUmum');
    Route::any('dokter/getTabelLansia/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelLansia');
    Route::any('dokter/getTabelUgd/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelUgd');
    Route::any('dokter/getTabelGigi/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelGigi');
    Route::any('dokter/getTabelKia/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelKia');
    Route::any('dokter/getTabelGizi/{idLokasiPemeriksaan}', 'Api\dokter\TabelKhususSemua@getTabelGizi');

//Paramedis

    //tabel mitra
    Route::any('paramedis/getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\paramedis\TabelKhususSemua@getTabelPengajuanLabor');
    Route::any('paramedis/getTabelPengajuanObat/{idLokasiPemeriksaan}', 'Api\paramedis\TabelKhususSemua@getTabelPengajuanObat');
    Route::any('paramedis/getObat/{idLokasiPemeriksaan}', 'Api\paramedis\TabelKhususSemua@getObat');
    Route::any('paramedis/getPasien/{idLokasiPemeriksaan}', 'Api\paramedis\TabelKhususSemua@getPasien');
    Route::any('paramedis/getKamar/{idLokasiPemeriksaan}', 'Api\paramedis\kamarController@getKamar');
    Route::any('paramedis/getBilling/{idLokasiPemeriksaan}', 'Api\paramedis\TabelKhususSemua@getBilling');
    Route::any('paramedis/getAdministrasi/{idLokasiPemeriksaan}', 'Api\paramedis\TabelKhususSemua@getAdministrasi');

// Laboran
    // tabel lpengajuan
    Route::any('labor/getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\labor\TabelKhususSemua@getTabelPengajuanLabor');
    Route::any('labor/getPasien/{idLokasiPemeriksaan}', 'Api\labor\TabelKhususSemua@getPasien');

     //data pengajuan labor rawat jalan
     Route::any('labor/getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\labor\TabelKhususSemua@getTabelPengajuanLabor');
    
     //labor
     Route::any('labor/getLabor/{idLokasiPemeriksaan}', 'Api\labor\TabelKhususSemua@getLabor');

     //data pengajuan labor rawat inap
    Route::any('labor/getTabelPengajuanLaborInap/{idLokasiPemeriksaan}', 'Api\labor\TabelKhususSemua@getTabelPengajuanLaborInap');
    
// Perawat
    // Tabel Pasien
    Route::any('perawat/getPasien/{idKamar}', 'Api\perawat\TabelKhususSemua@getPasien');
    Route::any('perawat/getTabelPengajuanObat/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelPengajuanObat');
    
    //rawat jalan
    Route::any('perawat/getTabelUmum/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelUmum');
    Route::any('perawat/getTabelLansia/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelLansia');
    Route::any('perawat/getTabelUgd/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelUgd');
    Route::any('perawat/getTabelGigi/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelGigi');
    Route::any('perawat/getTabelKia/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelKia');
    Route::any('perawat/getTabelGizi/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelGizi');
    
    //pengajuan obat rajal
    Route::any('perawat/getTabelPengajuanObatRajal/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelPengajuanObatRajal');

    //pengajuan obat ranap
    Route::any('perawat/getTabelPengajuanObatRanap/{idLokasiPemeriksaan}', 'Api\perawat\TabelKhususSemua@getTabelPengajuanObatRanap');

//Bidan

    //tabel mitra
    Route::any('bidan/getTabelPasienSA/{idKamar}', 'Api\bidan\TabelKhususSemua@getTabelPasienSA');
    Route::any('bidan/getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getTabelPengajuanLabor');
    Route::any('bidan/getTabelPengajuanObat/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getTabelPengajuanObat');
    Route::any('bidan/getObat/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getObat');
    Route::any('bidan/getPasien/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getPasien');
    
    //rawat jalan
    Route::any('bidan/getTabelKia/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getTabelKia');

    //pengajuan obat rajal
    Route::any('bidan/getTabelPengajuanObatRajal/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getTabelPengajuanObatRajal');

    //pengajuan obat ranap
    Route::any('bidan/getTabelPengajuanObatRanap/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getTabelPengajuanObatRanap');

    Route::any('bidan/getLabor/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getLabor');
    
    //data pengajuan labor rawat inap
    Route::any('bidan/getTabelPengajuanLaborInap/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getTabelPengajuanLaborInap');
    
    // penunjang
    Route::any('bidan/getPenunjang/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getPenunjang');

    //data pengajuan penunjang rawat jalan
    Route::any('bidan/getTabelPengajuanPenunjang/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getTabelPengajuanPenunjang');

    //data pengajuan penunjang rawat inap
    Route::any('bidan/getTabelPengajuanPenunjangInap/{idLokasiPemeriksaan}', 'Api\bidan\TabelKhususSemua@getTabelPengajuanPenunjangInap');
    
//Apoteker

    //tabel mitra
    Route::any('apoteker/getTabelPengajuanLabor/{idLokasiPemeriksaan}', 'Api\apoteker\TabelKhususSemua@getTabelPengajuanLabor');
    Route::any('apoteker/getTabelPengajuanObat/{idLokasiPemeriksaan}', 'Api\apoteker\TabelKhususSemua@getTabelPengajuanObat');
    Route::any('apoteker/getObat/{idLokasiPemeriksaan}', 'Api\apoteker\TabelKhususSemua@getObat');

    //pengajuan obat rajal
    Route::any('apoteker/getTabelPengajuanObatRajal/{idLokasiPemeriksaan}', 'Api\apoteker\TabelKhususSemua@getTabelPengajuanObatRajal');

    //pengajuan obat ranap
    Route::any('apoteker/getTabelPengajuanObatRanap/{idLokasiPemeriksaan}', 'Api\apoteker\TabelKhususSemua@getTabelPengajuanObatRanap');
