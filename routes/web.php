<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControlle;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionnaireController; 
use App\Http\Controllers\QuestionController; 
use App\Http\Controllers\SurveyController; 



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

Auth::routes();
Route::get('/', 'Front\HomeController@beranda')->name('beranda');

/* Route ambil database  tentang kami halama depan
-------------------*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tentang-kami/riwayat-singkat', 'Front\HomeController@riwayatSingkat')->name('riwayat-singkat');
Route::get('/tentang-kami/visi-misi', 'Front\HomeController@visiMisi')->name('visi-misi');
Route::get('/tentang-kami/struktur-organisasi', 'Front\HomeController@strukturOrganisasi')->name('struktur-organisasi');
Route::get('/tentang-kami/pimpinan', 'Front\HomeController@lihatPimpinan')->name('pimpinan-info');
Route::get('/tentang-kami/kependudukan', 'Front\HomeController@Kependudukan')->name('kependudukan');
Route::get('/berita-dan-informasi', 'Front\HomeController@cariBerita')->name('berita');
Route::get('/aduan', 'Front\HomeController@kontak')->name('aduan');
Route::get('/chart', 'Front\HomeController@piechart')->name('piechart');
Route::post('/aduan/kirim-email', 'MailController@index')->name('KirimEmail');
Route::get('/berita-dan-informasi/detail/{id}', 'Front\HomeController@detailBerita')->name('detailBerita');
Route::get('/pimpinan/detail/{id}', 'Front\HomeController@lihatPimpinandetail')->name('detailPimpinan');

Route::get('/Informasi/publikasi-kinerja', 'Front\HomeController@cariKinerja')->name('publikasi-kinerja');
Route::get('/Informasi/publikasi-kinerja/detail/{id}', 'Front\HomeController@detailKinerja')->name('detailKinerja');

Route::get('/Informasi/opd', 'Front\HomeController@opd')->name('info-opd');
Route::get('/Informasi/pengumuman', 'Front\HomeController@infoPengumuman')->name('info-pengumuman');

Route::get('/Potensi-Daerah/info-umkm', 'Front\HomeController@infoUmkm')->name('info-umkm');
Route::get('/Potensi-Daerah/info-umkm/detail/{id}', 'Front\HomeController@detailUmkm')->name('detailUmkm');

/* route pimpinan front */

/* Route Berita dan Informasi dashboard
-------------------*/
Route::get('/company/berita-dan-informasi', 'HomeController@beritaInformasi')->name('berita-dan-informasi');
Route::post('/company/berita-dan-informasi/add-berita', 'HomeController@addBerita')->name('addBerita');
Route::patch('/company/berita-dan-informasi/update-berita', 'HomeController@updateBerita')->name('updateBerita');
Route::get('/company/bisnis/berita-dan-informasi/delete/{id}', 'HomeController@deleteBerita')->name('deleteBerita');

/* Route pimpinan dashboard
-------------------*/
Route::get('/company/pimpinan', 'HomeController@infoPimpinan')->name('pimpinan');
Route::post('/company/pimpinan-info/add-pimpinan', 'HomeController@addPimpinan')->name('addPimpinan');
Route::patch('/company/pimpinan-info/update-pimpinan', 'HomeController@updatePimpinan')->name('updatePimpinan');
Route::get('/company/pimpinan-info/delete/{id}', 'HomeController@deletePimpinan')->name('deletePimpinan');

/* Route Tentang dashboard
-------------------*/
Route::get('/company/tentang', 'HomeController@tentangKecamatan')->name('tentang');
Route::post('/company/tentang/add-tentang', 'HomeController@addKecamatan')->name('addKecamatan');
Route::patch('/company/tentang/update-tentang', 'HomeController@updateKecamatan')->name('updateKecamatan');



/* Route kirim  aduan
-------------------*/

Route::get('/aduan', 'ContactController@contactForm')->name('aduan');
Route::post('/aduan', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');

/* route kinerja dashboard -------------------*/
Route::get('/company/kinerja', 'HomeController@infoKinerja')->name('kinerja');
Route::post('/company/kinerja-info/add-kinerja', 'HomeController@addKinerja')->name('addKinerja');
Route::patch('/company/kinerja-info/update-kinerja', 'HomeController@updateKinerja')->name('updateKinerja');
Route::get('/company/kinerja-info/delete/{id}', 'HomeController@deleteKinerja')->name('deleteKinerja');


Route::get('/pengumuman', 'HomeController@infoPengumuman')->name('pengumuman');
Route::post('/pengumuman/add-pengumuman', 'HomeController@addPengumuman')->name('addPengumuman');
Route::patch('/pengumuman/update-pengumuman', 'HomeController@updatePengumuman')->name('updatePengumuman');
Route::get('/pengumuman/delete/{id}', 'HomeController@deletePengumuman')->name('deletePengumuman');

Route::get('/Umkm', 'HomeController@infoUmkm')->name('umkm');
Route::post('/Umkm/add-umkm', 'HomeController@addUmkm')->name('addUmkm');
Route::patch('/Umkm/update-umkm', 'HomeController@updateUmkm')->name('updateUmkm');
Route::get('/Umkm/delete/{id}', 'HomeController@deleteUmkm')->name('deleteUmkm');

Route::get('/Wisata', 'HomeController@infoWisata')->name('wisata');
Route::post('/Wisata/add-wisata', 'HomeController@addWisata')->name('addWisata');
Route::patch('/Wisata/update-wisata', 'HomeController@updateWisata')->name('updateWisata');
Route::get('/Wisata/delete/{id}', 'HomeController@deleteWisata')->name('deleteWisata');




/* Route kuesioner dashboard
-------------------*/
Route::get('/kuesioner', 'HomeController@tentangKuesioner')->name('kuesioner');
Route::get('/questionnaires/create','QuestionnaireController@create');
Route::post('/questionnaires','QuestionnaireController@stores');
Route::get('/questionnaires/{questionnaire}','QuestionnaireController@show');


Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@stores');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');



// route lihat survei  jawaban

Route::get('/survey/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/survey/{questionnaire}-{slug}', 'SurveyController@store');

/* Route kirim  aduan
-------------------*/

Route::get('/aduan','ContactController@contactForm')->name('aduan');
Route::post('/aduan', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');


Route::get('logout', function () {
    \Auth::logout();

    return redirect('/');
});
