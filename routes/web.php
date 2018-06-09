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
    return view('layouts.user');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'member', 'middleware'=>['auth','role:member']],function(){

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin']],function(){
Route::get('/',function(){
return view ('admin.index');
});
Route::resource('artikel','ArtikelController');
Route::resource('eskul','EskulController');
Route::resource('fasilitas','FasilitasController');
Route::resource('galeri','GaleriController');
Route::resource('guru','GuruController');
Route::resource('kategoriartikel','KategoriArtikelController');
Route::resource('kategorigaleri','KategoriGaleriController');
Route::resource('kurikulum','KurikulumController');
Route::resource('prestasi','PrestasiController');
Route::resource('profile','ProfileController');
Route::resource('staf','StafController');    
});
