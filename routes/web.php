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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']], function(){
	Route::resource('mapel','MapelController');
	Route::resource('guru', 'GuruController');
	Route::resource('siswa', 'SiswaController');
	Route::resource('kelas','KelasController');
	Route::resource('jurusan','JurusanController');
	//Route::resource('nilai','NilaiController');
});
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');
Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');

  Route::group(['prefix'=>'Guru','middleware'=>['auth','role:Guru']], function(){
      

 });

  Route::resource('logguru','LoginguruController');

 Route::get('/nilai', function () {
        return view('nilai.index');
    });

 Route::get('/rekayasa', function () {
        return view('nilai.rekperlun.kelass');
    });

 Route::get('/jenmapel', function () {
        return view('nilai.rekperlun.pelajaran.pelajaran_xii_3');
    });
 Route::get('/score', function () {
        return view('loginguru.score_xii_3');
    });
 Route::get('/bio', function () {
        return view('nilai.rekperlun.biodata.biodata_xii_3');
    });
 Route::get('/guru', function () {
        return view('loginguru.index');
    });
  Route::get('/cretscore', function () {
         return view('loginguru.createnilai');
    });
 Route::get('/biosis', function () {
        return view('logguru.biodata_xii_3');
    });
  Route::get('/isbiosis', function () {
        return view('logguru.isbiosiswa');
    });
 Route::get('/siswa', function () {
        return view('loginsiswa.index');
    });