<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', ('AuthController@login'));

// Kuesioner Skrining Siswa Mandiri
Route::get('/e-uks/skrining-kesehatan-siswa', 'Landing\QuestionController@create');
Route::post('/e-uks/skrining-kesehatan-siswa/store/', 'Landing\QuestionController@store');
Route::get('/e-uks/skrining-kesehatan-siswa/thanks', 'Landing\QuestionController@thanks');

// Konsultasi
Route::get('/e-konsultasi/konsultasi', 'Landing\KonsultasiController@create');
Route::post('/e-konsultasi/konsultasi/store/', 'Landing\KonsultasiController@store');
Route::get('/e-konsultasi/konsultasi/thanks', 'Landing\KonsultasiController@thanks');

// Kuesioner Lainnya
Route::prefix('/e-skrining')->group(function () {
    Route::get('/list', 'Landing\PemeriksaanController@list')->middleware(['login', 'admin']);
    Route::get('/{id}', 'Landing\PemeriksaanController@form');
    Route::post('/{id}/store', 'Landing\PemeriksaanController@formSubmit');
    Route::get('/{id}/download', 'Landing\PemeriksaanController@download')->middleware(['login', 'admin']);
});

Route::get('login', ('AuthController@login'));
Route::get('logout', ('AuthController@logout'));
Route::post('loginProses', ('AuthController@loginProses'));
Route::post('registerProses', ('AuthController@registerProses'));
Route::get('register_paksa', ('AuthController@registerPaksa'));
Route::get('/reload-captcha', ('AuthController@reloadCaptcha'));

Route::middleware(['login'])->group(function () {

    Route::middleware(['admin'])->group(function () {
        //dashboard
        Route::resource('admin/home', ('Admin\HomeController'));

        //profile
        Route::resource('admin/profile', ('Admin\ProfileController'));

        //medical record
        Route::resource('admin/medical_record', ('Admin\MedicalRecordController'));
        Route::post('admin/medical_record/delete/{id}', ('Admin\MedicalRecordController@destroy'))->name('medical_record.destroy');

        //mitra
        Route::resource('admin/mitra', ('Admin\MitraController'));
        Route::post('admin/mitra/delete/{id}', ('Admin\MitraController@destroy'))->name('mitra.destroy');

        //data cabang mitra
        Route::resource('admin/lokasi-pemeriksaan', ('Admin\LokasiController'));
        Route::post('admin/lokPemeriksaan/delete/{id}', ('Admin\LokasiController@destroy'))->name('lokPemeriksaan.destroy');

        //Data Sekolah
        Route::resource('admin/sekolah', ('Admin\SekolahController'));
        Route::post('admin/sekolah/delete/{id}', ('Admin\SekolahController@destroy'))->name('sekolah.destroy');

        //data users
        Route::resource('admin/users', ('Admin\UsersController'));
        Route::post('admin/users/delete/{id}', ('Admin\UsersController@destroy'))->name('karyawan.destroy');

        //data role
        Route::resource('admin/role', ('Admin\UserRoleController'));
        Route::post('admin/role/delete/{id}', ('Admin\UserRoleController@destroy'))->name('role.destroy');

        //data kamar
        Route::resource('admin/kamar', ('Admin\KamarController'));
        Route::post('admin/kamar/delete/{id}', ('Admin\KamarController@destroy'))->name('kamar.destroy');

        //data bed
        Route::resource('admin/bed', ('Admin\BedController'));
        Route::post('admin/bed/delete/{id}', ('Admin\BedController@destroy'))->name('bed.destroy');

        //data administrasi
        Route::resource('admin/administrasi', ('Admin\AdministrasiController'));
        Route::post('admin/administrasi/delete/{id}', ('Admin\AdministrasiController@destroy'))->name('administrasi.destroy');

        // Master Data
        Route::resource('admin/provinsi', ('Admin\ProvinsiController'));
        Route::resource('admin/daerah', ('Admin\DaerahController'));
        Route::resource('admin/kecamatan', ('Admin\KecamatanController'));
        Route::resource('admin/pendidikan', ('Admin\PendidikanController'));
        Route::resource('admin/jenis-pasien', ('Admin\JenisPasienController'));
        Route::resource('admin/goldar', ('Admin\GoldarController'));
        Route::resource('admin/kunjungan-sakit', ('Admin\KunjunganController'));
        Route::resource('admin/pekerjaan', ('Admin\PekerjaanController'));
        Route::resource('admin/jenis-kelamin', ('Admin\JenisKelaminController'));
        Route::resource('admin/perawatan', ('Admin\PerawatanController'));
        Route::resource('admin/unit-pelayanan', ('Admin\UnitPelayananController'));
        Route::resource('admin/desa', ('Admin\DesaController'));

        //Delete Master Data
        Route::post('admin/provinsi/delete/{id}', ('Admin\ProvinsiController@destroy'))->name('provinsi.destroy');
        Route::post('admin/daerah/delete/{id}', ('Admin\DaerahController@destroy'))->name('daerah.destroy');
        Route::post('admin/desa/delete/{id}', ('Admin\DesaController@destroy'))->name('desa.destroy');
        Route::post('admin/kecamatan/delete/{id}', ('Admin\KecamatanController@destroy'))->name('kecamatan.destroy');
        Route::post('admin/goldar/delete/{id}', ('Admin\GoldarController@destroy'))->name('goldar.destroy');
        Route::post('admin/jeniskel/delete/{id}', ('Admin\JenisKelaminController@destroy'))->name('jeniskel.destroy');
        Route::post('admin/jenispas/delete/{id}', ('Admin\JenisPasienController@destroy'))->name('jenispas.destroy');
        Route::post('admin/kunjunganSakit/delete/{id}', ('Admin\KunjunganController@destroy'))->name('kunjunganSakit.destroy');
        Route::post('admin/pekerjaan/delete/{id}', ('Admin\PekerjaanController@destroy'))->name('pekerjaan.destroy');
        Route::post('admin/pendidikan/delete/{id}', ('Admin\PendidikanController@destroy'))->name('pendidikan.destroy');
        Route::post('admin/perawatan/delete/{id}', ('Admin\PerawatanController@destroy'))->name('perawatan.destroy');
        Route::post('admin/unitPel/delete/{id}', ('Admin\UnitPelayananController@destroy'))->name('unitPel.destroy');

        // Pasien
        Route::resource('admin/pasienn', ('Admin\PasienController'));
        Route::post('admin/pasien/delete/{id}', ('Admin\PasienController@destroy'))->name('pasien.destroy');

        //Rujukan
        Route::resource('admin/rujukan', ('Admin\PasienRujukanController'));

        // data obat
        Route::resource('admin/obat', ('Admin\ObatController'));
        Route::post('admin/obat/delete/{id}', ('Admin\ObatController@destroy'))->name('obat.destroy');

        //farmasi pengajuan obat rajal
        Route::resource('admin/pengajuan-obat-rajal', ('Admin\PengajuanObat\RawatJalanController'));
        Route::resource('admin/pengajuan-obat-rajal', ('Admin\PengajuanObat\RawatJalanController'));
        Route::post('admin/pengajuan-obat-rajal/delete/{id}', ('Admin\PengajuanObat\RawatJalanController@destroy'))->name('admin/pengajuan-obat-rajal.destroy');

        //farmasi pengajuan obat ranap
        Route::resource('admin/pengajuan-obat-ranap', ('Admin\PengajuanObat\RawatInapController'));
        Route::resource('admin/pengajuan-obat-ranap', ('Admin\PengajuanObat\RawatInapController'));

        // Data Penunjang
        Route::resource('admin/penunjang', ('Admin\PenunjangController'));
        Route::post('admin/penunjang/delete/{id}', ('Admin\PenunjangController@destroy'))->name('penunjang.destroy');

        // Data Pengajuan Penunjang
        Route::resource('admin/pengajuan-penunjang', ('Admin\pengajuanPenunjang\PengajuanPenunjangController'));
        Route::post('admin/pengajuan-penunjang/delete/{id}', ('Admin\pengajuanPenunjang\PengajuanPenunjangController@destroy'))->name('admin/pengajuan-penunjang.destroy');

        // Data Pengajuan Penunjang Rawat Inap
        Route::resource('admin/pengajuan-penunjang-inap', ('Admin\pengajuanPenunjang\PengajuanPenunjangInapCOntroller'));
        Route::post('admin/pengajuan-penunjang-inap/delete/{id}', ('Admin\pengajuanPenunjang\PengajuanPenunjangInapCOntroller@destroy'))->name('admin/pengajuan-penunjang-inap.destroy');

        //labor
        Route::resource('admin/labor', ('Admin\DataLaborController'));
        Route::post('admin/labor/delete/{id}', ('Admin\DataLaborController@destroy'))->name('labor.destroy');

        //pengajuan labor rawat jalan
        Route::resource('admin/pengajuan-labor', ('Admin\PengajuanLabor\PengajuanLaborController'));
        Route::post('admin/pengajuan-labor/delete/{id}', ('Admin\PengajuanLabor\PengajuanLaborController@destroy'))->name('pengajuan-labor.destroy');

        //pengajuan labor rawat inap
        Route::resource('admin/pengajuan-labor-inap', ('Admin\PengajuanLabor\PengajuanLaborInapController'));
        Route::post('admin/pengajuan-labor-inap/delete/{id}', ('Admin\PengajuanLabor\PengajuanLaborInapController@destroy'))->name('pengajuan-labor-inap.destroy');

        // rawat jalan
        Route::resource('admin/diagnosa', ('Admin\DiagnosaController'));
        Route::resource('admin/rawat-jalan/bp-umum', ('Admin\RawatJalan\BpUmumController'));
        Route::resource('admin/rawat-jalan/bp-gigi', ('Admin\RawatJalan\BpGigiController'));
        Route::resource('admin/rawat-jalan/infeksi', ('Admin\RawatJalan\GiziController'));
        Route::resource('admin/rawat-jalan/lansia', ('Admin\RawatJalan\LansiaController'));
        Route::resource('admin/rawat-jalan/laborat', ('Admin\RawatJalan\LaboratController'));
        Route::resource('admin/rawat-jalan/ugd', ('Admin\RawatJalan\UGDController'));
        Route::resource('admin/rawat-jalan/kia', ('Admin\RawatJalan\KIAController'));

        //delete rawat jalan
        Route::post('admin/rawat-jalan/bp-umum/delete/{id}', ('Admin\RawatJalan\BpUmumController@destroy'))->name('bp-umum.destroy');
        Route::post('admin/rawat-jalan/bp-gigi/delete/{id}', ('Admin\RawatJalan\BpGigiController@destroy'))->name('bp-gigi.destroy');
        Route::post('admin/rawat-jalan/infeksi/delete/{id}', ('Admin\RawatJalan\GiziController@destroy'))->name('infeksi.destroy');
        Route::post('admin/rawat-jalan/lansia/delete/{id}', ('Admin\RawatJalan\LansiaController@destroy'))->name('lansia.destroy');
        Route::post('admin/rawat-jalan/laborat/delete/{id}', ('Admin\RawatJalan\LaboratController@destroy'))->name('laborat.destroy');
        Route::post('admin/rawat-jalan/ugd/delete/{id}', ('Admin\RawatJalan\UGDController@destroy'))->name('ugd.destroy');
        Route::post('admin/rawat-jalan/kia/delete/{id}', ('Admin\RawatJalan\KIAController@destroy'))->name('kia.destroy');

        //Data Rhesus
        Route::resource('admin/rhesus', ('Admin\RhesusController'));
        Route::post('admin/rhesus/delete/{id}', ('Admin\RhesusController@destroy'))->name('rhesus.destroy');

        // rawat inap
        Route::resource('admin/rawat-inap/pasien', ('Admin\RawatInap\PasienInapController'));
        Route::get('admin/rawat-inap/pasien/{id}/tambah_cppt', ('Admin\RawatInap\PasienInapController@tambah_cppt'));
        Route::post('admin/rawat-inap/pasien/{id}/proses_tambah', ('Admin\RawatInap\PasienInapController@proses_tambah'));

        //autofill
        Route::resource('admin/autofill-custom', ('Admin\AutofillController'));

        // data kop
        Route::resource('admin/kop', ('Admin\KopController'));

        //persetujuan dan penolakan
        Route::resource('admin/rawat-jalan/perpen', ('Admin\PerPenController'));
        Route::post('admin/rawat-jalan/perpen/delete/{id}', ('Admin\PerPenController@destroy'))->name('perpen.destroy');

        //list resume
        Route::resource('admin/resume', ('Admin\Resume\ResumeController'));
        Route::post('admin/resume/delete/{id}', ('Admin\Resume\ResumeController@destroy'))->name('resume.destroy');

        //api wa
        Route::resource('admin/api-wa', ('Admin\Resume\ApiWaController'));
        Route::post('admin/api-wa/delete/{id}', ('Admin\Resume\ApiWaController@destroy'))->name('api-wa.destroy');

        //api bpjs
        Route::resource('admin/api-bpjs', ('Admin\Resume\ApiBPJSController'));
        Route::post('admin/api-bpjs/delete/{id}', ('Admin\Resume\ApiBPJSController@destroy'))->name('api-bpjs.destroy');

        //api satu sehat
        Route::resource('admin/api-satu-sehat', ('Admin\Resume\ApiSatuSehatController'));
        Route::post('admin/api-satu-sehat/delete/{id}', ('Admin\Resume\ApiSatuSehatController@destroy'))->name('api-satu-sehat.destroy');

        //history kunjungan
        Route::resource('admin/rawat-jalan/history', ('Admin\HistorykunjunganController'));

        //tindakan medis
        Route::resource('admin/tindakan-medis', ('Admin\TindakanMedisController'));

        //billing
        Route::resource('admin/billing', ('Admin\BillingController'));

        //checkout
        Route::resource('admin/checkout', ('Admin\CheckoutController'));

        //gallery pasien
        Route::resource('admin/gallery', ('Admin\GalleryPasien'));
        Route::post('admin/gallery/delete/{id}', ('Admin\GalleryPasien@destroy'))->name('gallery.destroy');

        //Family Folder
        Route::resource('admin/status_keluarga', ('Admin\StatusKeluargaController'));
        Route::post('admin/status_keluarga/delete/{id}', ('Admin\StatusKeluargaController@destroy'))->name('status_keluarga.destroy');

        //Penanggung Jawab E-Uks
        Route::resource('admin/penanggungjawab-eUks', ('Admin\EUks\PJUksController'));

        // Responden
        Route::get('/admin/responden', 'Admin\EUks\Responden@index');
        Route::get('/admin/responden/create', 'Admin\EUks\Responden@create');
        Route::post('/admin/responden/store', 'Admin\EUks\Responden@store');
        Route::get('/admin/responden/edit/{id?}', 'Admin\EUks\Responden@edit');
        Route::put('/admin/responden/update/{id?}', 'Admin\EUks\Responden@update');
        Route::post('/admin/responden/destroy/{id?}', 'Admin\EUks\Responden@destroy');

        // Question
        Route::get('/admin/question', 'Admin\EUks\Question@index');
        Route::get('/admin/question/pertanyaan/{id?}', 'Admin\EUks\Question@pertanyaan');
        Route::get('/admin/question/create', 'Admin\EUks\Question@create');
        Route::post('/admin/question/store', 'Admin\EUks\Question@store');
        Route::get('/admin/question/edit/{id?}', 'Admin\EUks\Question@edit');
        Route::put('/admin/question/update/{id?}', 'Admin\EUks\Question@update');
        Route::post('/admin/question/destroy/{id?}', 'Admin\EUks\Question@destroy');

        // Question Type
        Route::get('/admin/question-type', 'Admin\EUks\QuestionType@index');
        Route::get('/admin/question-type/create', 'Admin\EUks\QuestionType@create');
        Route::post('/admin/question-type/store', 'Admin\EUks\QuestionType@store');
        Route::get('/admin/question-type/edit/{id?}', 'Admin\EUks\QuestionType@edit');
        Route::put('/admin/question-type/update/{id?}', 'Admin\EUks\QuestionType@update');
        Route::post('/admin/question-type/destroy/{id?}', 'Admin\EUks\QuestionType@destroy');

        // Answer
        Route::get('/admin/answer', 'Admin\EUks\Answer@index');
        Route::get('/admin/answer/penjawab/{id?}', 'Admin\EUks\Answer@penjawab');
        Route::get('/admin/answer/jawaban/{id?}', 'Admin\EUks\Answer@jawaban');
        Route::get('/admin/answer/create', 'Admin\EUks\Answer@create');
        Route::post('/admin/answer/store', 'Admin\EUks\Answer@store');
        Route::get('/admin/answer/edit/{id?}', 'Admin\EUks\Answer@edit');
        Route::put('/admin/answer/update/{id?}', 'Admin\EUks\Answer@update');
        Route::post('/admin/answer/destroy/{id?}', 'Admin\EUks\Answer@destroy');

        // skrining gigi
        Route::resource('admin/pemeriksaan-gigi', ('Admin\EUks\PemeriksaanGigiController'));

        // skrining SD - SMA
        Route::resource('admin/pemeriksaan-sd-sma', ('Admin\EUks\PemeriksaanSdSmaController'));

        // skrining DDTK
        Route::resource('admin/pemeriksaan-ddtk', ('Admin\EUks\PemeriksaanDdtkController'));

        // Kuesioner Skrining DDTK
        Route::get('admin/e-uks/pemeriksaan-ddtk', 'Admin\EUks\kuesioner\SkriningDdtkController@create');
        Route::post('admin/e-uks/pemeriksaan-ddtk/store/', 'Admin\EUks\kuesioner\SkriningDdtkController@store');
        Route::get('admin/e-uks/pemeriksaan-ddtk/thanks', 'Admin\EUks\kuesioner\SkriningDdtkController@thanks');

        // Kuesioner Skrining Gigi
        Route::get('admin/e-uks/pemeriksaan-gigi', 'Admin\EUks\kuesioner\SkriningGigiController@create');
        Route::post('admin/e-uks/pemeriksaan-gigi/store/', 'Admin\EUks\kuesioner\SkriningGigiController@store');
        Route::get('admin/e-uks/pemeriksaan-gigi/thanks', 'Admin\EUks\kuesioner\SkriningGigiController@thanks');

        // Kuesioner Skrining SD - SMA
        Route::get('admin/e-uks/pemeriksaan-sd-sma', 'Admin\EUks\kuesioner\SkriningSdSmaController@create');
        Route::post('admin/e-uks/pemeriksaan-sd-sma/store/', 'Admin\EUks\kuesioner\SkriningSdSmaController@store');
        Route::get('admin/e-uks/pemeriksaan-sd-sma/thanks', 'Admin\EUks\kuesioner\SkriningSdSmaController@thanks');

        //Penanggung Jawab E-Konsultasi
        Route::resource('admin/penanggungjawab-eKonsultasi', ('Admin\EKonsultasi\PJKonsultasi'));

        //Topik E-Konsultasi
        Route::resource('admin/topik-eKonsultasi', ('Admin\EKonsultasi\TopikEKonsultasiController'));
        Route::post('admin/topik-eKonsultasi/delete/{id}', ('Admin\EKonsultasi\TopikEKonsultasiController@destroy'))->name('topik-eKonsultasi.destroy');

        //PJ TOpik E-Konsultasi
        Route::resource('admin/pj-topik-eKonsultasi', ('Admin\EKonsultasi\PJTopik'));

        //Konsultasi E-Konsultasi
        Route::resource('admin/konsultasi', ('Admin\EKonsultasi\KonsultasiController'));
        Route::post('admin/konsultasi/delete/{id}', ('Admin\EKonsultasi\KonsultasiController@destroy'))->name('konsultasi.destroy');

        //E-perkesmas
        Route::resource('admin/penanggungjawab-ePerkesmas', ('Admin\EPerkesmas\PJPerkesmas'));
        Route::resource('admin/pj-topik-ePerkesmas', ('Admin\EPerkesmas\PJTopik'));
        Route::post('admin/pj-topik-ePerkesmas/{id}', 'Admin\EPerkesmas\PJTopik@update')->name('admin.pj-topik-ePerkesmas.update');

        //Wilayah E-Perkesmas
        Route::resource('admin/wilayah-ePerkesmas', ('Admin\EPerkesmas\WilayahController'));
        Route::post('admin/wilayah-ePerkesmas/delete/{id}', ('Admin\EPerkesmas\WilayahController@destroy'))->name('wilayah-ePerkesmas.destroy');

        //E-Aduan Nama Grup
        Route::resource('admin/namaGrup-eAduan', ('Admin\EAduan\AduanGrup'));
        Route::post('admin/namaGrup-eAduan/delete/{id}', ('Admin\EAduan\AduanGrup@destroy'))->name('namaGrup-eAduan.destroy');
    });

    Route::middleware(['adminRs'])->group(function () {
        Route::resource('adminRs/home', ('AdminRs\HomeController'));

        //Data Sekolah
        Route::resource('adminRs/sekolah', ('AdminRs\SekolahController'));
        Route::post('adminRs/sekolah/delete/{id}', ('AdminRs\SekolahController@destroy'))->name('sekolah.destroy');

        //profile
        Route::resource('adminRs/profile', ('AdminRs\ProfileController'));

        //medical record
        Route::resource('adminRs/medical_record', ('AdminRs\MedicalRecordController'));
        Route::post('adminRs/medical_record/delete/{id}', ('AdminRs\MedicalRecordController@destroy'))->name('medical_record.destroy');

        // Pasien
        Route::resource('adminRs/pasienn', ('AdminRs\PasienController'));
        Route::resource('adminRs/rujukan', ('AdminRs\PasienRujukanController'));

        //delete Data Pasien
        Route::post('adminRs/pasien/delete/{id}', ('AdminRs\PasienController@destroy'))->name('pasien.destroy');

        // farmasi
        Route::resource('adminRs/obat', ('AdminRs\ObatController'));
        Route::resource('adminRs/pengajuan-obat', ('AdminRs\PengajuanObatController'));

        //history kunjungan
        Route::resource('adminRs/rawat-jalan/history', ('AdminRs\HistoryKunjunganController'));

        //mitra
        Route::resource('adminRs/users', ('AdminRs\UsersController'));
        Route::resource('adminRs/mitra', ('AdminRs\MitraController'));
        Route::resource('adminRs/lokasi-pemeriksaan', ('AdminRs\LokasiController'));
        Route::resource('adminRs/kamar', ('AdminRs\KamarController'));
        Route::resource('adminRs/bed', ('AdminRs\BedController'));

        //data role
        Route::resource('adminRs/role', ('AdminRs\UserRoleController'));
        Route::post('adminRs/role/delete/{id}', ('AdminRs\UserRoleController@destroy'))->name('role.destroy');

        //delete data mitra
        Route::post('adminRs/kamar/delete/{id}', ('AdminRs\KamarController@destroy'))->name('kamar.destroy');
        Route::post('adminRs/bed/delete/{id}', ('AdminRs\BedController@destroy'))->name('bed.destroy');
        Route::post('adminRs/users/delete/{id}', ('AdminRs\UsersController@destroy'))->name('karyawan.destroy');
        Route::post('adminRs/lokasi-pemeriksaan/delete/{id}', ('AdminRs\LokasiController@destroy'))->name('lokasi.destroy');
        Route::resource('adminRs/jenis-pasien', ('AdminRs\JenisPasienController'));

        // Rawat Jalan
        Route::resource('adminRs/rawat-jalan/bp-umum', ('AdminRs\RawatJalan\BpUmumController'));
        Route::resource('adminRs/rawat-jalan/bp-gigi', ('AdminRs\RawatJalan\BpGigiController'));
        Route::resource('adminRs/rawat-jalan/gizi', ('AdminRs\RawatJalan\GiziController'));
        Route::resource('adminRs/rawat-jalan/diagnosa', ('AdminRs\RawatJalan\DiagnosaController'));
        Route::resource('adminRs/rawat-jalan/lansia', ('AdminRs\RawatJalan\LansiaController'));
        Route::resource('adminRs/rawat-jalan/laborat', ('AdminRs\RawatJalan\LaboratController'));
        Route::resource('adminRs/rawat-jalan/ugd', ('AdminRs\RawatJalan\UGDController'));
        Route::resource('adminRs/rawat-jalan/kia', ('AdminRs\RawatJalan\KIAController'));

        // rawat inap
        Route::resource('adminRs/rawat-inap/pasien', ('AdminRs\RawatInap\PasienInapController'));
        Route::get('adminRs/rawat-inap/pasien/{id}/tambah_cppt', ('AdminRs\RawatInap\PasienInapController@tambah_cppt'));
        Route::post('adminRs/rawat-inap/pasien/{id}/proses_tambah', ('AdminRs\RawatInap\PasienInapController@proses_tambah'));

        //Rujukan
        Route::resource('adminRs/rujukan', ('adminRs\PasienRujukanController'));

        // data obat
        Route::resource('adminRs/obat', ('adminRs\ObatController'));
        Route::post('adminRs/obat/delete/{id}', ('adminRs\ObatController@destroy'))->name('obat.destroy');

        //farmasi pengajuan obat rajal
        Route::resource('adminRs/pengajuan-obat-rajal', ('adminRs\PengajuanObat\RawatJalanController'));
        Route::resource('adminRs/pengajuan-obat-rajal', ('adminRs\PengajuanObat\RawatJalanController'));

        //farmasi pengajuan obat ranap
        Route::resource('adminRs/pengajuan-obat-ranap', ('adminRs\PengajuanObat\RawatInapController'));
        Route::resource('adminRs/pengajuan-obat-ranap', ('adminRs\PengajuanObat\RawatInapController'));

        // Data Penunjang
        Route::resource('adminRs/penunjang', ('adminRs\PenunjangController'));
        Route::post('adminRs/penunjang/delete/{id}', ('adminRs\PenunjangController@destroy'))->name('penunjang.destroy');

        // Data Pengajuan Penunjang
        Route::resource('adminRs/pengajuan-penunjang', ('adminRs\pengajuanPenunjang\PengajuanPenunjangController'));
        Route::post('adminRs/pengajuan-penunjang/delete/{id}', ('adminRs\pengajuanPenunjang\PengajuanPenunjangController@destroy'))->name('pengajuan-penunjang.destroy');

        // Data Pengajuan Penunjang Rawat Inap
        Route::resource('adminRs/pengajuan-penunjang-inap', ('adminRs\pengajuanPenunjang\PengajuanPenunjangInapCOntroller'));
        Route::post('adminRs/pengajuan-penunjang-inap/delete/{id}', ('adminRs\pengajuanPenunjang\PengajuanPenunjangInapCOntroller@destroy'))->name('pengajuan-penunjang-inap.destroy');

        //labor
        Route::resource('adminRs/labor', ('adminRs\DataLaborController'));
        Route::post('adminRs/labor/delete/{id}', ('adminRs\DataLaborController@destroy'))->name('labor.destroy');

        //pengajuan labor rawat jalan
        Route::resource('adminRs/pengajuan-labor', ('adminRs\PengajuanLabor\PengajuanLaborController'));
        Route::post('adminRs/pengajuan-labor/delete/{id}', ('adminRs\PengajuanLabor\PengajuanLaborController@destroy'))->name('pengajuan-labor.destroy');

        //pengajuan labor rawat inap
        Route::resource('adminRs/pengajuan-labor-inap', ('adminRs\PengajuanLabor\PengajuanLaborInapController'));
        Route::post('adminRs/pengajuan-labor-inap/delete/{id}', ('adminRs\PengajuanLabor\PengajuanLaborInapController@destroy'))->name('pengajuan-labor-inap.destroy');

        // rawat inap
        Route::resource('adminRs/rawat-inap/pasien', ('AdminRs\RawatInap\PasienInapController'));

        //autofill
        Route::resource('adminRs/autofill-custom', ('AdminRs\AutofillController'));

        // data kop
        Route::resource('adminRs/kop', ('AdminRs\KopController'));

        //persetujuan dan penolakan
        Route::resource('adminRs/rawat-jalan/perpen', ('AdminRs\PerPenController'));
        Route::post('adminRs/rawat-jalan/perpen/delete/{id}', ('AdminRs\PerPenController@destroy'))->name('perpen.destroy');

        //api wa
        Route::resource('adminRs/api-wa', ('AdminRs\Resume\ApiWaController'));
        Route::post('adminRs/api-wa/delete/{id}', ('AdminRs\Resume\ApiWaController@destroy'))->name('api-wa.destroy');

        //api bpjs
        Route::resource('adminRs/api-bpjs', ('AdminRs\Resume\ApiBPJSController'));
        Route::post('adminRs/api-bpjs/delete/{id}', ('AdminRs\Resume\ApiBPJSController@destroy'))->name('api-bpjs.destroy');

        //api satu sehat
        Route::resource('adminRs/api-satu-sehat', ('AdminRs\Resume\ApiSatuSehatController'));
        Route::post('adminRs/api-satu-sehat/delete/{id}', ('AdminRs\Resume\ApiSatuSehatController@destroy'))->name('api-satu-sehat.destroy');

        //tindakan medis
        Route::resource('adminRs/tindakan-medis', ('AdminRs\TindakanMedisController'));

        //Family Folder
        Route::resource('adminRs/status_keluarga', ('AdminRs\StatusKeluargaController'));
        Route::post('adminRs/status_keluarga/delete/{id}', ('AdminRs\StatusKeluargaController@destroy'))->name('status_keluarga.destroy');

        //checkout
        Route::resource('adminRs/checkout', ('AdminRs\CheckoutController'));

        //billing
        Route::resource('adminRs/billing', ('AdminRs\BillingController'));

        //data administrasi
        Route::resource('adminRs/administrasi', ('AdminRs\AdministrasiController'));
        Route::post('adminRs/administrasi/delete/{id}', ('AdminRs\AdministrasiController@destroy'))->name('administrasi.destroy');

        //gallery pasien
        Route::resource('adminRs/gallery', ('AdminRs\GalleryPasien'));
        Route::post('adminRs/gallery/delete/{id}', ('AdminRs\GalleryPasien@destroy'));

        //Penanggung Jawab E-Uks
        Route::resource('adminRs/penanggungjawab-eUks', ('AdminRs\EUks\PJUksController'));

        // Responden
        Route::get('/adminRs/responden', 'AdminRs\EUks\Responden@index');
        Route::get('/adminRs/responden/create', 'AdminRs\EUks\Responden@create');
        Route::post('/adminRs/responden/store', 'AdminRs\EUks\Responden@store');
        Route::get('/adminRs/responden/edit/{id?}', 'AdminRs\EUks\Responden@edit');
        Route::put('/adminRs/responden/update/{id?}', 'AdminRs\EUks\Responden@update');
        Route::post('/adminRs/responden/destroy/{id?}', 'AdminRs\EUks\Responden@destroy');

        // Question
        Route::get('/adminRs/question', 'AdminRs\EUks\Question@index');
        Route::get('/adminRs/question/pertanyaan/{id?}', 'AdminRs\EUks\Question@pertanyaan');
        Route::get('/adminRs/question/create', 'AdminRs\EUks\Question@create');
        Route::post('/adminRs/question/store', 'AdminRs\EUks\Question@store');
        Route::get('/adminRs/question/edit/{id?}', 'AdminRs\EUks\Question@edit');
        Route::put('/adminRs/question/update/{id?}', 'AdminRs\EUks\Question@update');
        Route::post('/adminRs/question/destroy/{id?}', 'AdminRs\EUks\Question@destroy');

        // Question Type
        Route::get('/adminRs/question-type', 'AdminRs\EUks\QuestionType@index');
        Route::get('/adminRs/question-type/create', 'AdminRs\EUks\QuestionType@create');
        Route::post('/adminRs/question-type/store', 'AdminRs\EUks\QuestionType@store');
        Route::get('/adminRs/question-type/edit/{id?}', 'AdminRs\EUks\QuestionType@edit');
        Route::put('/adminRs/question-type/update/{id?}', 'AdminRs\EUks\QuestionType@update');
        Route::post('/adminRs/question-type/destroy/{id?}', 'AdminRs\EUks\QuestionType@destroy');

        // Answer
        Route::get('/adminRs/answer', 'AdminRs\EUks\Answer@index');
        Route::get('/adminRs/answer/penjawab/{id?}', 'AdminRs\EUks\Answer@penjawab');
        Route::get('/adminRs/answer/jawaban/{id?}', 'AdminRs\EUks\Answer@jawaban');
        Route::get('/adminRs/answer/create', 'AdminRs\EUks\Answer@create');
        Route::post('/adminRs/answer/store', 'AdminRs\EUks\Answer@store');
        Route::get('/adminRs/answer/edit/{id?}', 'AdminRs\EUks\Answer@edit');
        Route::put('/admin/answer/update/{id?}', 'AdminRs\EUks\Answer@update');
        Route::post('/adminRs/answer/destroy/{id?}', 'AdminRs\EUks\Answer@destroy');

        // skrining gigi
        Route::resource('adminRs/pemeriksaan-gigi', ('AdminRs\EUks\PemeriksaanGigiController'));

        // skrining SD - SMA
        Route::resource('adminRs/pemeriksaan-sd-sma', ('AdminRs\EUks\PemeriksaanSdSmaController'));

        // skrining DDTK
        Route::resource('adminRs/pemeriksaan-ddtk', ('AdminRs\EUks\PemeriksaanDdtkController'));

        // Kuesioner Skrining DDTK
        Route::get('adminRs/e-uks/pemeriksaan-ddtk', 'AdminRs\EUks\kuesioner\SkriningDdtkController@create');
        Route::post('adminRs/e-uks/pemeriksaan-ddtk/store/', 'AdminRs\EUks\kuesioner\SkriningDdtkController@store');
        Route::get('adminRs/e-uks/pemeriksaan-ddtk/thanks', 'AdminRs\EUks\kuesioner\SkriningDdtkController@thanks');

        // Kuesioner Skrining Gigi
        Route::get('adminRs/e-uks/pemeriksaan-gigi', 'AdminRs\EUks\kuesioner\SkriningGigiController@create');
        Route::post('adminRs/e-uks/pemeriksaan-gigi/store/', 'AdminRs\EUks\kuesioner\SkriningGigiController@store');
        Route::get('adminRs/e-uks/pemeriksaan-gigi/thanks', 'AdminRs\EUks\kuesioner\SkriningGigiController@thanks');

        // Kuesioner Skrining SD - SMA
        Route::get('adminRs/e-uks/pemeriksaan-sd-sma', 'AdminRs\EUks\kuesioner\SkriningSdSmaController@create');
        Route::post('adminRs/e-uks/pemeriksaan-sd-sma/store/', 'AdminRs\EUks\kuesioner\SkriningSdSmaController@store');
        Route::get('adminRs/e-uks/pemeriksaan-sd-sma/thanks', 'AdminRs\EUks\kuesioner\SkriningSdSmaController@thanks');

        //Penanggung Jawab E-Konsultasi
        Route::resource('adminRs/penanggungjawab-eKonsultasi', ('AdminRs\EKonsultasi\PJKonsultasi'));

        //Topik E-Konsultasi
        Route::resource('adminRs/topik-eKonsultasi', ('AdminRs\EKonsultasi\TopikEKonsultasiController'));
        Route::post('adminRs/topik-eKonsultasi/delete/{id}', ('AdminRs\EKonsultasi\TopikEKonsultasiController@destroy'))->name('topik-eKonsultasi.destroy');

        //PJ TOpik E-Konsultasi
        Route::resource('adminRs/pj-topik-eKonsultasi', ('AdminRs\EKonsultasi\PJTopik'));

        //Konsultasi E-Konsultasi
        Route::resource('adminRs/konsultasi', ('AdminRs\EKonsultasi\KonsultasiController'));
        Route::post('adminRs/konsultasi/delete/{id}', ('AdminRs\EKonsultasi\KonsultasiController@destroy'))->name('konsultasi.destroy');
    });

    Route::middleware(['dokter'])->group(function () {
        // Profile
        Route::resource('dokter/profile', ('Dokter\ProfileController'));

        //history kunjungan
        Route::resource('dokter/rawat-jalan/history', ('Dokter\HistoryKunjunganController'));

        //persetujuan dan penolakan
        Route::resource('dokter/rawat-jalan/perpen', ('Dokter\PerPenController'));
        Route::post('dokter/rawat-jalan/perpen/delete/{id}', ('Dokter\PerPenController@destroy'))->name('perpen.destroy');

        //gallery pasien
        Route::resource('dokter/gallery', ('Dokter\GalleryPasien'));
        Route::post('dokter/gallery/delete/{id}', ('Dokter\GalleryPasien@destroy'))->name('gallery.destroy');

        // Data Penunjang
        Route::resource('dokter/penunjang', ('Dokter\PenunjangController'));
        Route::post('dokter/penunjang/delete/{id}', ('Dokter\PenunjangController@destroy'))->name('penunjang.destroy');

        // Data Pengajuan Penunjang
        Route::resource('dokter/pengajuan-penunjang', ('Dokter\pengajuanPenunjang\PengajuanPenunjangController'));
        Route::post('dokter/pengajuan-penunjang/delete/{id}', ('Dokter\pengajuanPenunjang\PengajuanPenunjangController@destroy'))->name('dokter/pengajuan-penunjang.destroy');

        // Data Pengajuan Penunjang Rawat Inap
        Route::resource('dokter/pengajuan-penunjang-inap', ('Dokter\pengajuanPenunjang\PengajuanPenunjangInapCOntroller'));
        Route::post('dokter/pengajuan-penunjang-inap/delete/{id}', ('Dokter\pengajuanPenunjang\PengajuanPenunjangInapCOntroller@destroy'))->name('dokter/pengajuan-penunjang-inap.destroy');

        // Obat
        Route::resource('dokter/obat', ('Dokter\ObatController'));
        Route::resource('dokter/pengajuan-obat', ('Dokter\PengajuanObatController'));

        //labor
        Route::resource('dokter/labor', ('Dokter\DataLaborController'));
        Route::post('dokter/labor/delete/{id}', ('Dokter\DataLaborController@destroy'))->name('labor.destroy');

        //pengajuan labor rawat jalan
        Route::resource('dokter/pengajuan-labor', ('Dokter\PengajuanLabor\PengajuanLaborController'));
        Route::post('dokter/pengajuan-labor/delete/{id}', ('Dokter\PengajuanLabor\PengajuanLaborController@destroy'))->name('pengajuan-labor.destroy');

        //pengajuan labor rawat inap
        Route::resource('dokter/pengajuan-labor-inap', ('Dokter\PengajuanLabor\PengajuanLaborInapController'));
        Route::post('dokter/pengajuan-labor-inap/delete/{id}', ('Dokter\PengajuanLabor\PengajuanLaborInapController@destroy'))->name('pengajuan-labor-inap.destroy');

        //farmasi pengajuan obat rajal
        Route::resource('dokter/pengajuan-obat-rajal', ('Dokter\PengajuanObat\RawatJalanController'));
        Route::resource('dokter/pengajuan-obat-rajal', ('Dokter\PengajuanObat\RawatJalanController'));
        Route::post('dokter/pengajuan-obat-rajal/delete/{id}', ('Dokter\PengajuanObat\RawatJalanController@destroy'))->name('dokter/pengajuan-obat-rajal.destroy');

        //farmasi pengajuan obat ranap
        Route::resource('dokter/pengajuan-obat-ranap', ('Dokter\PengajuanObat\RawatInapController'));
        Route::resource('dokter/pengajuan-obat-ranap', ('Dokter\PengajuanObat\RawatInapController'));

        // Pasien
        Route::resource('dokter/pasienn', ('Dokter\PasienController'));
        Route::resource('dokter/rawat-inap/pasien', ('Dokter\RawatInap\PasienInapController'));

        // Diagnosa
        Route::resource('dokter/diagnosa', ('Dokter\DiagnosaController'));

        // Diagnosa
        Route::resource('dokter/diagnosa', ('Dokter\RawatJalan\DiagnosaController'));
        Route::resource('dokter/bp-umum', ('Dokter\RawatJalan\BpUmumController'));
        Route::resource('dokter/bp-gigi', ('Dokter\RawatJalan\BpGigiController'));
        Route::resource('dokter/gizi', ('Dokter\RawatJalan\GiziController'));
        Route::resource('dokter/lansia', ('Dokter\RawatJalan\LansiaController'));
        Route::resource('dokter/laborat', ('Dokter\RawatJalan\LaboratController'));
        Route::resource('dokter/ugd', ('Dokter\RawatJalan\UGDController'));
        Route::resource('dokter/kia', ('Dokter\RawatJalan\KIAController'));

        //Penanggung Jawab E-Uks
        Route::resource('dokter/penanggungjawab-eUks', ('Dokter\EUks\PJUksController'));

        // Answer
        Route::get('/dokter/answer', 'Dokter\EUks\Answer@index');
        Route::get('/dokter/answer/penjawab/{id?}', 'Dokter\EUks\Answer@penjawab');
        Route::get('/dokter/answer/jawaban/{id?}', 'Dokter\EUks\Answer@jawaban');
        Route::get('/dokter/answer/create', 'Dokter\EUks\Answer@create');
        Route::post('/dokter/answer/store', 'Dokter\EUks\Answer@store');
        Route::get('/dokter/answer/edit/{id?}', 'Dokter\EUks\Answer@edit');
        Route::put('/dokter/answer/update/{id?}', 'Dokter\EUks\Answer@update');
        Route::post('/dokter/answer/destroy/{id?}', 'Dokter\EUks\Answer@destroy');
    });

    Route::middleware(['apoteker'])->group(function () {
        // Profile
        Route::resource('apoteker/profile', ('Apoteker\ProfileController'));

        // Obat
        Route::resource('apoteker/obat', ('Apoteker\ObatController'));

        // Delete Obat
        Route::post('apoteker/obat/delete/{id}', ('Apoteker\ObatController@destroy'))->name('apoteker.destroy');

        //farmasi pengajuan obat rajal
        Route::resource('apoteker/pengajuan-obat-rajal', ('Apoteker\PengajuanObat\RawatJalanController'));
        Route::post('apoteker/pengajuan-obat-rajal/delete/{id}', ('Apoteker\PengajuanObat\RawatJalanController@destroy'))->name('apoteker/pengajuan-obat-rajal.destroy');

        //farmasi pengajuan obat ranap
        Route::resource('apoteker/pengajuan-obat-ranap', ('Apoteker\PengajuanObat\RawatInapController'));
        Route::resource('apoteker/pengajuan-obat-ranap', ('Apoteker\PengajuanObat\RawatInapController'));
    });

    Route::middleware(['perawat'])->group(function () {
        // Profile
        Route::resource('perawat/profile', ('Perawat\ProfileController'));
        // Pasien
        Route::resource('perawat/pasienn', ('Perawat\PasienController'));
        Route::resource('perawat/rawat-inap/pasien', ('Perawat\RawatInap\PasienInapController'));

        //farmasi pengajuan obat rajal
        Route::resource('perawat/pengajuan-obat-rajal', ('Perawat\PengajuanObat\RawatJalanController'));
        Route::post('perawat/pengajuan-obat-rajal/delete/{id}', ('Perawat\PengajuanObat\RawatJalanController@destroy'))->name('perawat/pengajuan-obat-rajal.destroy');

        //farmasi pengajuan obat ranap
        Route::resource('perawat/pengajuan-obat-ranap', ('Perawat\PengajuanObat\RawatInapController'));
        Route::resource('perawat/pengajuan-obat-ranap', ('Perawat\PengajuanObat\RawatInapController'));

        // Diagnosa
        Route::resource('perawat/diagnosa', ('Perawat\DiagnosaController'));

        // Diagnosa
        Route::resource('perawat/bp-umum', ('Perawat\RawatJalan\BpUmumController'));
        Route::resource('perawat/bp-gigi', ('Perawat\RawatJalan\BpGigiController'));
        Route::resource('perawat/gizi', ('Perawat\RawatJalan\GiziController'));
        Route::resource('perawat/diagnosa', ('Perawat\RawatJalan\DiagnosaController'));
        Route::resource('perawat/lansia', ('Perawat\RawatJalan\LansiaController'));
        Route::resource('perawat/laborat', ('Perawat\RawatJalan\LaboratController'));
        Route::resource('perawat/ugd', ('Perawat\RawatJalan\UGDController'));
        Route::resource('perawat/kia', ('Perawat\RawatJalan\KIAController'));
    });

    Route::middleware(['bidan'])->group(function () {
        // Profile
        Route::resource('bidan/profile', ('Bidan\ProfileController'));
        // Pasien
        Route::resource('bidan/pasienn', ('Bidan\PasienController'));
        Route::resource('bidan/rawat-inap/pasien', ('Bidan\RawatInap\PasienInapController'));
        // Obat
        Route::resource('bidan/obat', ('Bidan\ObatController'));
        Route::resource('bidan/pengajuan-obat', ('Bidan\PengajuanObatController'));
        // Diagnosa
        Route::resource('bidan/diagnosa', ('Bidan\RawatJalan\DiagnosaController'));
        // Rawat jalan
        Route::resource('bidan/rawat-jalan/kia', ('Bidan\RawatJalan\KIAController'));

        //farmasi pengajuan obat rajal
        Route::resource('bidan/pengajuan-obat-rajal', ('Bidan\PengajuanObat\RawatJalanController'));
        Route::resource('bidan/pengajuan-obat-rajal', ('Bidan\PengajuanObat\RawatJalanController'));
        Route::post('bidan/pengajuan-obat-rajal/delete/{id}', ('Bidan\PengajuanObat\RawatJalanController@destroy'))->name('bidan/pengajuan-obat-rajal.destroy');

        //farmasi pengajuan obat ranap
        Route::resource('bidan/pengajuan-obat-ranap', ('Bidan\PengajuanObat\RawatInapController'));
        Route::resource('bidan/pengajuan-obat-ranap', ('Bidan\PengajuanObat\RawatInapController'));

        //labor
        Route::resource('bidan/labor', ('Bidan\DataLaborController'));
        Route::post('bidan/labor/delete/{id}', ('Bidan\DataLaborController@destroy'))->name('labor.destroy');

        //pengajuan labor rawat jalan
        Route::resource('bidan/pengajuan-labor', ('Bidan\PengajuanLabor\PengajuanLaborController'));
        Route::post('bidan/pengajuan-labor/delete/{id}', ('Bidan\PengajuanLabor\PengajuanLaborController@destroy'))->name('pengajuan-labor.destroy');

        //pengajuan labor rawat inap
        Route::resource('bidan/pengajuan-labor-inap', ('Bidan\PengajuanLabor\PengajuanLaborInapController'));
        Route::post('bidan/pengajuan-labor-inap/delete/{id}', ('Bidan\PengajuanLabor\PengajuanLaborInapController@destroy'))->name('pengajuan-labor-inap.destroy');

        // Data Penunjang
        Route::resource('bidan/penunjang', ('Bidan\PenunjangController'));
        Route::post('bidan/penunjang/delete/{id}', ('Bidan\PenunjangController@destroy'))->name('penunjang.destroy');

        // Data Pengajuan Penunjang
        Route::resource('bidan/pengajuan-penunjang', ('Bidan\pengajuanPenunjang\PengajuanPenunjangController'));
        Route::post('bidan/pengajuan-penunjang/delete/{id}', ('Bidan\pengajuanPenunjang\PengajuanPenunjangController@destroy'))->name('bidan/pengajuan-penunjang.destroy');

        // Data Pengajuan Penunjang Rawat Inap
        Route::resource('bidan/pengajuan-penunjang-inap', ('Bidan\pengajuanPenunjang\PengajuanPenunjangInapController'));
        Route::post('bidan/pengajuan-penunjang-inap/delete/{id}', ('Bidan\pengajuanPenunjang\PengajuanPenunjangInapController@destroy'))->name('bidan/pengajuan-penunjang-inap.destroy');

        // Route::resource('bidan/bp-umum', ('Bidan\RawatJalan\BpUmumController'));
        // Route::resource('bidan/bp-gigi', ('Bidan\RawatJalan\BpGigiController'));
        // Route::resource('bidan/gizi', ('Bidan\RawatJalan\GiziController'));
        // Route::resource('bidan/lansia', ('Bidan\RawatJalan\LansiaController'));
        // Route::resource('bidan/laborat', ('Bidan\RawatJalan\LaboratCOntroller'));
        // Route::resource('bidan/ugd', ('Bidan\RawatJalan\UGDController'));
    });

    Route::middleware(['analisLabor'])->group(function () {
        // Profile
        Route::resource('analisLabor/profile', ('AnalisLabor\ProfileController'));

        // Pasien
        Route::resource('analisLabor/pasienn', ('AnalisLabor\PasienController'));

        // Pasien
        Route::resource('analisLabor/pengajuan-labor', ('AnalisLabor\PengajuanLaborController'));

        //labor
        Route::resource('analisLabor/labor', ('AnalisLabor\DataLaborController'));
        Route::post('analisLabor/labor/delete/{id}', ('AnalisLabor\DataLaborController@destroy'))->name('AnalisLabor.destroy');

        //pengajuan labor rawat jalan
        Route::resource('analisLabor/pengajuan-labor', ('AnalisLabor\PengajuanLabor\PengajuanLaborController'));
        Route::post('analisLabor/pengajuan-labor/delete/{id}', ('AnalisLabor\PengajuanLabor\PengajuanLaborController@destroy'))->name('pengajuan-labor.destroy');

        //pengajuan labor rawat inap
        Route::resource('analisLabor/pengajuan-labor-inap', ('AnalisLabor\PengajuanLabor\PengajuanLaborInapController'));
        Route::post('analisLabor/pengajuan-labor-inap/delete/{id}', ('AnalisLabor\PengajuanLabor\PengajuanLaborInapController@destroy'))->name('pengajuan-labor-inap.destroy');
    });

    Route::middleware(['paramedis'])->group(function () {
        // Profile
        Route::resource('paramedis/profile', ('Paramedis\ProfileController'));

        // Pasien
        Route::resource('paramedis/pasienn', ('Paramedis\PasienController'));

        // Farmasi
        Route::resource('paramedis/obat', ('Paramedis\ObatController'));
        Route::resource('paramedis/pengajuan-obat', ('Paramedis\PengajuanObatController'));

        // Farmasi
        Route::resource('paramedis/pengajuan-labor', ('Paramedis\PengajuanLaborController'));

        //billing
        Route::resource('paramedis/billing', ('Paramedis\BillingController'));

        //data administrasi
        Route::resource('paramedis/administrasi', ('Paramedis\AdministrasiController'));
        Route::post('paramedis/administrasi/delete/{id}', ('Paramedis\AdministrasiController@destroy'))->name('administrasi.destroy');
    });
});
