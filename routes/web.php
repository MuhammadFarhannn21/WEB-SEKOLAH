<?php

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

Route::get('/', 'IndexController@index');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
Route::get('/logout', function(){ return abort(404); });
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('backend.index');

Route::get('/berita', 'IndexController@berita');
Route::get('/event', 'IndexController@event');
Route::get('/gallery', 'IndexController@gallery');
Route::get('/search', 'IndexController@search');
Route::get('/forum', 'IndexController@forum');

Route::get('forum/{slug}', 'IndexController@showForum');
Route::get('page/{slug}', 'IndexController@showPage');
Route::get('berita/{slug}', 'IndexController@showBerita');
Route::get('event/{slug}', 'IndexController@showEvent');
Route::get('kategori/{slug}', 'IndexController@showKategori');
Route::post('komentar/{id}', 'IndexController@komentar');

Route::get('/agenda', 'IndexController@agenda');

Route::get('tamu', 'IndexController@tamu');
Route::post('tamu', 'IndexController@tamuStore');

// bagian ppdb
Route::get('ppdb','PpdbController@index');
Route::post('ppdb','PpdbController@store');

Route::group(['prefix'	=> 'admin'], function(){
	// bagian users
	Route::get('users', 'UserController@index');
	Route::post('users/store', 'UserController@store');
	Route::get('users/update/{id}', 'UserController@edit');
	Route::patch('users/update/{id}', 'UserController@update');
	Route::get('users/delete/{id}', 'UserController@delete');

	// bagian aplikasi
	Route::get('aplikasi', 'AplikasiController@index');
	Route::post('aplikasi', 'AplikasiController@store');

	// bagian banner
	Route::get('banner', 'BannerController@index');
	Route::post('banner/store', 'BannerController@store');
	Route::get('banner/update/{id}', 'BannerController@edit');
	Route::patch('banner/update/{id}', 'BannerController@update');
	Route::get('banner/delete/{id}', 'BannerController@delete');

	// bagian menu
	Route::get('menu', 'MenuController@index');
	Route::post('menu/store', 'MenuController@storeMenu');
	Route::post('submenu/store', 'MenuController@storeSubMenu');
	Route::post('subsubmenu/store', 'MenuController@storeSubSubMenu');
	Route::post('menu/update', 'MenuController@updateMenu');
	Route::post('submenu/update', 'MenuController@updateSubMenu');
	Route::post('subsubmenu/update', 'MenuController@updateSubSubMenu');
	Route::get('menu/delete/{id}', 'MenuController@delete');

	// bagian kategori berita
	Route::get('kategori', 'KategoriController@index')->name('kategori.index');
	Route::post('kategori/store', 'KategoriController@store');
	Route::get('kategori/update/{id}', 'KategoriController@edit');
	Route::patch('kategori/update/{id}', 'KategoriController@update');
	Route::get('kategori/delete/{id}', 'KategoriController@delete');

	Route::get('forum', 'ForumController@index')->name('admin.forum.index');
	Route::get('forum/create', 'ForumController@create');
	Route::post('forum/create', 'ForumController@store');
	Route::get('forum/show/{id}', 'ForumController@show');
	Route::get('forum/update/{id}', 'ForumController@edit');
	Route::patch('forum/update/{id}', 'ForumController@update');
	Route::get('forum/delete/{id}', 'ForumController@delete');

	// bagian berita/event/pages
	Route::get('posts', 'PostController@index')->name('admin.posts.index');
	Route::get('posts/create', 'PostController@create');
	Route::post('posts/create', 'PostController@store');
	Route::get('posts/show/{id}', 'PostController@show');
	Route::get('posts/update/{id}', 'PostController@edit');
	Route::patch('posts/update/{id}', 'PostController@update');
	Route::get('posts/delete/{id}', 'PostController@delete');

	// bagian sound
	Route::get('sound', 'SoundController@index')->name('admin.sound.index');
	Route::get('sound/create', 'SoundController@create');
	Route::post('sound/create', 'SoundController@store');
	Route::get('sound/show/{id}', 'SoundController@show');
	Route::get('sound/update/{id}', 'SoundController@edit');
	Route::patch('sound/update/{id}', 'SoundController@update');
	Route::get('sound/delete/{id}', 'SoundController@delete');

	// bagian dokumen
	Route::get('dokumen', 'DokumenController@index')->name('admin.dokumen.index');
	Route::get('dokumen/create', 'DokumenController@create');
	Route::post('dokumen/create', 'DokumenController@store');
	Route::get('dokumen/show/{id}', 'DokumenController@show');
	Route::get('dokumen/update/{id}', 'DokumenController@edit');
	Route::patch('dokumen/update/{id}', 'DokumenController@update');
	Route::get('dokumen/delete/{id}', 'DokumenController@delete');

	// bagian jurusan
	Route::get('jurusan', 'JurusanController@index');
	Route::get('jurusan/create', 'JurusanController@create');
	Route::post('jurusan/create', 'JurusanController@store');
	Route::get('jurusan/update/{id}', 'JurusanController@edit');
	Route::patch('jurusan/update/{id}', 'JurusanController@update');
	Route::get('jurusan/delete/{id}', 'JurusanController@delete');

	// bagian kalimat
	Route::get('kalimat', 'KalimatBijakController@index');
	Route::post('kalimat/store', 'KalimatBijakController@store');
	Route::get('kalimat/update/{id}', 'KalimatBijakController@edit');
	Route::patch('kalimat/update/{id}', 'KalimatBijakController@update');
	Route::get('kalimat/delete/{id}', 'KalimatBijakController@delete');

	// bagian gallery
	Route::get('gallery', 'GalleryController@index');
	Route::post('gallery/store', 'GalleryController@store');
	Route::get('gallery/update/{id}', 'GalleryController@edit');
	Route::patch('gallery/update/{id}', 'GalleryController@update');
	Route::get('gallery/delete/{id}', 'GalleryController@delete');

	// bagian guru terbaik
	Route::get('guruterbaik', 'GuruTerbaikController@index');
	Route::post('guruterbaik/store', 'GuruTerbaikController@store');
	Route::get('guruterbaik/update/{id}', 'GuruTerbaikController@edit');
	Route::patch('guruterbaik/update/{id}', 'GuruTerbaikController@update');
	Route::get('guruterbaik/delete/{id}', 'GuruTerbaikController@delete');

	// bagian timeline videos
	Route::get('timeline', 'TimelineController@index');
	Route::post('timeline/store', 'TimelineController@store');
	Route::get('timeline/update/{id}', 'TimelineController@edit');
	Route::patch('timeline/update/{id}', 'TimelineController@update');
	Route::get('timeline/delete/{id}', 'TimelineController@delete');

	// bagian komentar
	Route::get('komentar','KomentarController@index');
	Route::get('komentar/aktif/{id}','KomentarController@aktif');
	Route::get('komentar/delete/{id}','KomentarController@delete');

	// bagian agenda
	Route::get('agenda', 'AgendaController@index')->name('agenda.index');
	Route::post('agenda/store', 'AgendaController@store');
	Route::get('agenda/update/{id}', 'AgendaController@edit');
	Route::patch('agenda/update/{id}', 'AgendaController@update');
	Route::get('agenda/delete/{id}', 'AgendaController@delete');

	// bagian kategori berita
	Route::get('acara', 'AcaraController@index')->name('acara.index');
	Route::post('acara/store', 'AcaraController@store');
	Route::get('acara/update/{id}', 'AcaraController@edit');
	Route::patch('acara/update/{id}', 'AcaraController@update');
	Route::get('acara/delete/{id}', 'AcaraController@delete');
	Route::get('tamu', 'TamuController@index');

	// bagian ppdb
	// bagian jenis formulir
	Route::get('jenis-formulir', 'JenisFormulirController@index');
	Route::get('jenis-formulir/api', 'JenisFormulirController@api');
	Route::get('jenis-formulir/create', 'JenisFormulirController@create');
	Route::post('jenis-formulir/create', 'JenisFormulirController@store');
	Route::get('jenis-formulir/delete/{id}', 'JenisFormulirController@delete');
	Route::post('jenis-formulir/deleteSelected', 'JenisFormulirController@deleteSelected');
	Route::get('jenis-formulir/edit/{id}', 'JenisFormulirController@edit');
	Route::post('jenis-formulir/edit/{id}', 'JenisFormulirController@update');

	Route::get('pendaftar', 'PendaftarController@index');
	Route::get('pendaftar/api', 'PendaftarController@api');
	Route::get('pendaftar/reset-password/{id}', 'PendaftarController@reset_password');
	Route::post('pendaftar/deleteSelected', 'PendaftarController@deleteSelected');
	Route::get('pendaftar/excel', 'PendaftarController@exportExcel');

	Route::get('pembayaran-formulir', 'PembayaranFormulirController@index');
	Route::get('pembayaran-formulir/api', 'PembayaranFormulirController@api');
	Route::get('pembayaran-formulir/diterima/{id}', 'PembayaranFormulirController@diterima');
	Route::get('pembayaran-formulir/ditolak/{id}', 'PembayaranFormulirController@ditolak');
	Route::post('pembayaran-formulir/diterimaSelected', 'PembayaranFormulirController@diterimaSelected');
	Route::get('pembayaran-formulir/laporan', 'PembayaranFormulirController@laporan');
	Route::get('pembayaran-formulir/laporan/excel', 'PembayaranFormulirController@laporanExcel');

	Route::get('pembayaran-uang-pangkal', 'UangPangkalController@index');
	Route::get('pembayaran-uang-pangkal/apiCicilan1', 'UangPangkalController@apiCicilan1');
	Route::get('pembayaran-uang-pangkal/apiCicilan2', 'UangPangkalController@apiCicilan2');
	Route::get('pembayaran-uang-pangkal/apiCicilan3', 'UangPangkalController@apiCicilan3');
	Route::get('pembayaran-uang-pangkal/laporan', 'UangPangkalController@laporan');
	Route::get('pembayaran-uang-pangkal/laporan/excel', 'UangPangkalController@laporanExcel');

	Route::get('pembayaran-uang-pangkal/cicilan1/diterima/{id}', 'UangPangkalController@terimaCicilan1');
	Route::get('pembayaran-uang-pangkal/cicilan1/ditolak/{id}', 'UangPangkalController@tolakCicilan1');

	Route::get('pembayaran-uang-pangkal/cicilan2/diterima/{id}', 'UangPangkalController@terimaCicilan2');
	Route::get('pembayaran-uang-pangkal/cicilan2/ditolak/{id}', 'UangPangkalController@tolakCicilan2');

	Route::get('pembayaran-uang-pangkal/cicilan3/diterima/{id}', 'UangPangkalController@terimaCicilan3');
	Route::get('pembayaran-uang-pangkal/cicilan3/ditolak/{id}', 'UangPangkalController@tolakCicilan3');

	Route::get('berkas-calon-siswa', 'PemberkasanController@index');
	Route::get('berkas-calon-siswa/api', 'PemberkasanController@api');

	Route::get('formulir/siswa', 'FormulirController@index');
	Route::get('formulir/siswa/api', 'FormulirController@api');
	Route::get('formulir/siswa/excel', 'FormulirController@exportExcel');

	Route::get('logaktifitas/api', 'LogAktivityController@api');
	Route::get('logaktifitas', 'LogAktivityController@index');
});

Route::group(['prefix'	=> 'pendaftar'], function(){
	Route::get('biodata', 'FormulirPembayaranController@biodata_index');
	Route::post('biodata', 'FormulirPembayaranController@biodata_store');

	Route::get('pembayaran-formulir', 'FormulirPembayaranController@index');
	Route::post('pembayaran-formulir', 'FormulirPembayaranController@store');
	Route::get('pembayaran-formulir/kwitansi', 'FormulirPembayaranController@formulir_kwitansi');

	Route::get('formulir', 'FormulirPembayaranController@formulir_index');
	Route::post('formulir', 'FormulirPembayaranController@formulir_store');


	Route::get('pembayaran-uang-pangkal', 'FormulirPembayaranController@uang_pangkal_index');
	Route::post('pembayaran-uang-pangkal', 'FormulirPembayaranController@uang_pangkal_store');
	Route::get('pembayaran-uang-pangkal/kwitansi/{cicilan}', 'FormulirPembayaranController@uang_pangkal_kwitansi');

	Route::get('pemberkasan', 'FormulirPembayaranController@pemberkasan_index');
	Route::post('pemberkasan', 'FormulirPembayaranController@pemberkasan_store');
});

Route::get('/arman/clear',function(){
    $exitCode1  = Artisan::call('config:cache');
    $exitCode2  = Artisan::call('route:clear');
    $exitCode3  = Artisan::call('view:clear');
    return 'sukses';
});