<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SoundController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KalimatBijakController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuruTerbaikController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\JenisFormulirController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PembayaranFormulirController;
use App\Http\Controllers\UangPangkalController;
use App\Http\Controllers\PemberkasanController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\FormulirPembayaranController;
use App\Http\Controllers\LogAktivityController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\MitraPerusahaanController;
use UniSharp\LaravelFilemanager\Lfm;

// Frontend
Route::get('/', [IndexController::class, 'index']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', function(){ return abort(404); });
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('backend.index');

Route::get('/berita', [IndexController::class, 'berita']);
Route::get('/event', [IndexController::class, 'event']);
Route::get('/gallery', [IndexController::class, 'gallery']);
Route::get('/search', [IndexController::class, 'search']);
Route::get('/forum', [IndexController::class, 'forum']);

Route::get('forum/{slug}', [IndexController::class, 'showForum']);
Route::get('page/{slug}', [IndexController::class, 'showPage']);
Route::get('berita/{slug}', [IndexController::class, 'showBerita']);
Route::get('event/{slug}', [IndexController::class, 'showEvent']);
Route::get('kategori/{slug}', [IndexController::class, 'showKategori']);
Route::post('komentar/{id}', [IndexController::class, 'komentar']);

Route::get('/agenda', [IndexController::class, 'agenda']);
Route::get('tamu', [IndexController::class, 'tamu']);
Route::post('tamu', [IndexController::class, 'tamuStore']);

// PPDB
Route::get('ppdb', [PpdbController::class, 'index']);
Route::post('ppdb', [PpdbController::class, 'store']);

// BKK
Route::get('bkk', function() {
    return view('frontend.bkk');
});

// Laravel Filemanager (lama)
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

// Alexusmai File Manager (baru)
require base_path('vendor/alexusmai/laravel-file-manager/src/routes.php');

// Halaman File Manager
Route::get('file-manager', function () {
    return view('file-manager');
})->middleware(['web', 'auth']);

Route::get('fasilitas', [IndexController::class, 'fasilitas']);
Route::get('fasilitas/{id}', [IndexController::class, 'showFasilitas']);
Route::get('ekstrakurikuler', [IndexController::class, 'ekstrakurikuler']);
Route::get('ekstrakurikuler/{id}', [IndexController::class, 'showEkstrakurikuler']);
Route::get('jurusan', [IndexController::class, 'jurusanList']);
Route::get('jurusan/{id}', [IndexController::class, 'showJurusan']);

// Admin
Route::group(['prefix' => 'admin'], function(){
    Route::get('users', [UserController::class, 'index']);
    Route::post('users/store', [UserController::class, 'store']);
    Route::get('users/update/{id}', [UserController::class, 'edit']);
    Route::patch('users/update/{id}', [UserController::class, 'update']);
    Route::get('users/delete/{id}', [UserController::class, 'delete']);

    Route::get('aplikasi', [AplikasiController::class, 'index']);
    Route::post('aplikasi', [AplikasiController::class, 'store']);

    Route::get('banner', [BannerController::class, 'index']);
    Route::post('banner/store', [BannerController::class, 'store']);
    Route::get('banner/update/{id}', [BannerController::class, 'edit']);
    Route::patch('banner/update/{id}', [BannerController::class, 'update']);
    Route::get('banner/delete/{id}', [BannerController::class, 'delete']);

    Route::get('menu', [MenuController::class, 'index']);
    Route::post('menu/store', [MenuController::class, 'storeMenu']);
    Route::post('submenu/store', [MenuController::class, 'storeSubMenu']);
    Route::post('subsubmenu/store', [MenuController::class, 'storeSubSubMenu']);
    Route::post('menu/update', [MenuController::class, 'updateMenu']);
    Route::post('submenu/update', [MenuController::class, 'updateSubMenu']);
    Route::post('subsubmenu/update', [MenuController::class, 'updateSubSubMenu']);
    Route::get('menu/delete/{id}', [MenuController::class, 'delete']);

    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('kategori/store', [KategoriController::class, 'store']);
    Route::get('kategori/update/{id}', [KategoriController::class, 'edit']);
    Route::patch('kategori/update/{id}', [KategoriController::class, 'update']);
    Route::get('kategori/delete/{id}', [KategoriController::class, 'delete']);

    Route::get('forum', [ForumController::class, 'index'])->name('admin.forum.index');
    Route::get('forum/create', [ForumController::class, 'create']);
    Route::post('forum/create', [ForumController::class, 'store']);
    Route::get('forum/show/{id}', [ForumController::class, 'show']);
    Route::get('forum/update/{id}', [ForumController::class, 'edit']);
    Route::patch('forum/update/{id}', [ForumController::class, 'update']);
    Route::get('forum/delete/{id}', [ForumController::class, 'delete']);

    Route::get('posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostController::class, 'create']);
    Route::post('posts/create', [PostController::class, 'store']);
    Route::get('posts/show/{id}', [PostController::class, 'show']);
    Route::get('posts/update/{id}', [PostController::class, 'edit']);
    Route::patch('posts/update/{id}', [PostController::class, 'update']);
    Route::get('posts/delete/{id}', [PostController::class, 'delete']);

    Route::get('sound', [SoundController::class, 'index'])->name('admin.sound.index');
    Route::get('sound/create', [SoundController::class, 'create']);
    Route::post('sound/create', [SoundController::class, 'store']);
    Route::get('sound/show/{id}', [SoundController::class, 'show']);
    Route::get('sound/update/{id}', [SoundController::class, 'edit']);
    Route::patch('sound/update/{id}', [SoundController::class, 'update']);
    Route::get('sound/delete/{id}', [SoundController::class, 'delete']);

    Route::get('dokumen', [DokumenController::class, 'index'])->name('admin.dokumen.index');
    Route::get('dokumen/create', [DokumenController::class, 'create']);
    Route::post('dokumen/create', [DokumenController::class, 'store']);
    Route::get('dokumen/show/{id}', [DokumenController::class, 'show']);
    Route::get('dokumen/update/{id}', [DokumenController::class, 'edit']);
    Route::patch('dokumen/update/{id}', [DokumenController::class, 'update']);
    Route::get('dokumen/delete/{id}', [DokumenController::class, 'delete']);

    Route::get('jurusan', [JurusanController::class, 'index']);
    Route::get('jurusan/create', [JurusanController::class, 'create']);
    Route::post('jurusan/create', [JurusanController::class, 'store']);
    Route::get('jurusan/update/{id}', [JurusanController::class, 'edit']);
    Route::patch('jurusan/update/{id}', [JurusanController::class, 'update']);
    Route::get('jurusan/delete/{id}', [JurusanController::class, 'delete']);

    Route::get('kalimat', [KalimatBijakController::class, 'index']);
    Route::post('kalimat/store', [KalimatBijakController::class, 'store']);
    Route::get('kalimat/update/{id}', [KalimatBijakController::class, 'edit']);
    Route::patch('kalimat/update/{id}', [KalimatBijakController::class, 'update']);
    Route::get('kalimat/delete/{id}', [KalimatBijakController::class, 'delete']);

    Route::get('gallery', [GalleryController::class, 'index']);
    Route::post('gallery/store', [GalleryController::class, 'store']);
    Route::get('gallery/update/{id}', [GalleryController::class, 'edit']);
    Route::patch('gallery/update/{id}', [GalleryController::class, 'update']);
    Route::get('gallery/delete/{id}', [GalleryController::class, 'delete']);

    Route::get('guruterbaik', [GuruTerbaikController::class, 'index']);
    Route::post('guruterbaik/store', [GuruTerbaikController::class, 'store']);
    Route::get('guruterbaik/update/{id}', [GuruTerbaikController::class, 'edit']);
    Route::patch('guruterbaik/update/{id}', [GuruTerbaikController::class, 'update']);
    Route::get('guruterbaik/delete/{id}', [GuruTerbaikController::class, 'delete']);

    Route::get('timeline', [TimelineController::class, 'index']);
    Route::post('timeline/store', [TimelineController::class, 'store']);
    Route::get('timeline/update/{id}', [TimelineController::class, 'edit']);
    Route::patch('timeline/update/{id}', [TimelineController::class, 'update']);
    Route::get('timeline/delete/{id}', [TimelineController::class, 'delete']);

    Route::get('komentar', [KomentarController::class, 'index']);
    Route::get('komentar/aktif/{id}', [KomentarController::class, 'aktif']);
    Route::get('komentar/delete/{id}', [KomentarController::class, 'delete']);

    Route::get('agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::post('agenda/store', [AgendaController::class, 'store']);
    Route::get('agenda/update/{id}', [AgendaController::class, 'edit']);
    Route::patch('agenda/update/{id}', [AgendaController::class, 'update']);
    Route::get('agenda/delete/{id}', [AgendaController::class, 'delete']);

    Route::get('acara', [AcaraController::class, 'index'])->name('acara.index');
    Route::post('acara/store', [AcaraController::class, 'store']);
    Route::get('acara/update/{id}', [AcaraController::class, 'edit']);
    Route::patch('acara/update/{id}', [AcaraController::class, 'update']);
    Route::get('acara/delete/{id}', [AcaraController::class, 'delete']);
    Route::get('tamu', [TamuController::class, 'index']);

    Route::get('jenis-formulir', [JenisFormulirController::class, 'index']);
    Route::get('jenis-formulir/api', [JenisFormulirController::class, 'api']);
    Route::get('jenis-formulir/create', [JenisFormulirController::class, 'create']);
    Route::post('jenis-formulir/create', [JenisFormulirController::class, 'store']);
    Route::get('jenis-formulir/delete/{id}', [JenisFormulirController::class, 'delete']);
    Route::post('jenis-formulir/deleteSelected', [JenisFormulirController::class, 'deleteSelected']);
    Route::get('jenis-formulir/edit/{id}', [JenisFormulirController::class, 'edit']);
    Route::post('jenis-formulir/edit/{id}', [JenisFormulirController::class, 'update']);

    Route::get('pendaftar', [PendaftarController::class, 'index']);
    Route::get('pendaftar/api', [PendaftarController::class, 'api']);
    Route::get('pendaftar/reset-password/{id}', [PendaftarController::class, 'reset_password']);
    Route::post('pendaftar/deleteSelected', [PendaftarController::class, 'deleteSelected']);
    Route::get('pendaftar/excel', [PendaftarController::class, 'exportExcel']);

    Route::get('pembayaran-formulir', [PembayaranFormulirController::class, 'index']);
    Route::get('pembayaran-formulir/api', [PembayaranFormulirController::class, 'api']);
    Route::get('pembayaran-formulir/diterima/{id}', [PembayaranFormulirController::class, 'diterima']);
    Route::get('pembayaran-formulir/ditolak/{id}', [PembayaranFormulirController::class, 'ditolak']);
    Route::post('pembayaran-formulir/diterimaSelected', [PembayaranFormulirController::class, 'diterimaSelected']);
    Route::get('pembayaran-formulir/laporan', [PembayaranFormulirController::class, 'laporan']);
    Route::get('pembayaran-formulir/laporan/excel', [PembayaranFormulirController::class, 'laporanExcel']);

    Route::get('pembayaran-uang-pangkal', [UangPangkalController::class, 'index']);
    Route::get('pembayaran-uang-pangkal/apiCicilan1', [UangPangkalController::class, 'apiCicilan1']);
    Route::get('pembayaran-uang-pangkal/apiCicilan2', [UangPangkalController::class, 'apiCicilan2']);
    Route::get('pembayaran-uang-pangkal/apiCicilan3', [UangPangkalController::class, 'apiCicilan3']);
    Route::get('pembayaran-uang-pangkal/laporan', [UangPangkalController::class, 'laporan']);
    Route::get('pembayaran-uang-pangkal/laporan/excel', [UangPangkalController::class, 'laporanExcel']);
    Route::get('pembayaran-uang-pangkal/cicilan1/diterima/{id}', [UangPangkalController::class, 'terimaCicilan1']);
    Route::get('pembayaran-uang-pangkal/cicilan1/ditolak/{id}', [UangPangkalController::class, 'tolakCicilan1']);
    Route::get('pembayaran-uang-pangkal/cicilan2/diterima/{id}', [UangPangkalController::class, 'terimaCicilan2']);
    Route::get('pembayaran-uang-pangkal/cicilan2/ditolak/{id}', [UangPangkalController::class, 'tolakCicilan2']);
    Route::get('pembayaran-uang-pangkal/cicilan3/diterima/{id}', [UangPangkalController::class, 'terimaCicilan3']);
    Route::get('pembayaran-uang-pangkal/cicilan3/ditolak/{id}', [UangPangkalController::class, 'tolakCicilan3']);

    Route::get('fasilitas', [FasilitasController::class, 'index']);
    Route::post('fasilitas/store', [FasilitasController::class, 'store']);
    Route::get('fasilitas/update/{id}', [FasilitasController::class, 'edit']);
    Route::patch('fasilitas/update/{id}', [FasilitasController::class, 'update']);
    Route::get('fasilitas/delete/{id}', [FasilitasController::class, 'delete']);

    Route::get('ekstrakurikuler', [EkstrakurikulerController::class, 'index']);
    Route::post('ekstrakurikuler/store', [EkstrakurikulerController::class, 'store']);
    Route::get('ekstrakurikuler/update/{id}', [EkstrakurikulerController::class, 'edit']);
    Route::patch('ekstrakurikuler/update/{id}', [EkstrakurikulerController::class, 'update']);
    Route::get('ekstrakurikuler/delete/{id}', [EkstrakurikulerController::class, 'delete']);

    Route::get('berkas-calon-siswa', [PemberkasanController::class, 'index']);
    Route::get('berkas-calon-siswa/api', [PemberkasanController::class, 'api']);

    Route::get('formulir/siswa', [FormulirController::class, 'index']);
    Route::get('formulir/siswa/api', [FormulirController::class, 'api']);
    Route::get('formulir/siswa/excel', [FormulirController::class, 'exportExcel']);

    Route::get('logaktifitas/api', [LogAktivityController::class, 'api']);
    Route::get('logaktifitas', [LogAktivityController::class, 'index']);

    Route::get('mitra', [MitraPerusahaanController::class, 'index']);
    Route::post('mitra/store', [MitraPerusahaanController::class, 'store']);
    Route::get('mitra/update/{id}', [MitraPerusahaanController::class, 'edit']);
    Route::patch('mitra/update/{id}', [MitraPerusahaanController::class, 'update']);
    Route::get('mitra/delete/{id}', [MitraPerusahaanController::class, 'delete']);
    
    Route::post('upload-file', [App\Http\Controllers\UploadController::class, 'upload']);

});

// Pendaftar
Route::group(['prefix' => 'pendaftar'], function(){
    Route::get('biodata', [FormulirPembayaranController::class, 'biodata_index']);
    Route::post('biodata', [FormulirPembayaranController::class, 'biodata_store']);
    Route::get('pembayaran-formulir', [FormulirPembayaranController::class, 'index']);
    Route::post('pembayaran-formulir', [FormulirPembayaranController::class, 'store']);
    Route::get('pembayaran-formulir/kwitansi', [FormulirPembayaranController::class, 'formulir_kwitansi']);
    Route::get('formulir', [FormulirPembayaranController::class, 'formulir_index']);
    Route::post('formulir', [FormulirPembayaranController::class, 'formulir_store']);
    Route::get('pembayaran-uang-pangkal', [FormulirPembayaranController::class, 'uang_pangkal_index']);
    Route::post('pembayaran-uang-pangkal', [FormulirPembayaranController::class, 'uang_pangkal_store']);
    Route::get('pembayaran-uang-pangkal/kwitansi/{cicilan}', [FormulirPembayaranController::class, 'uang_pangkal_kwitansi']);
    Route::get('pemberkasan', [FormulirPembayaranController::class, 'pemberkasan_index']);
    Route::post('pemberkasan', [FormulirPembayaranController::class, 'pemberkasan_store']);
});

Route::get('/arman/clear', function(){
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'sukses';
});