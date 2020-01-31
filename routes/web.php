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

Route::get('/', 'valyutaController@index');

Route::get('/exchange', 'valyutaController@exchange');

Route::get('/news', 'valyutaController@news');

Route::get('/home/az','languageController@homeaz');

Route::get('/home/en','languageController@homeen');

Route::get('/home/ru','languageController@homeru');

Route::get('/exchange/ru','languageController@exchru');

Route::get('/exchange/az','languageController@exchaz');

Route::get('/exchange/en','languageController@exchen');

Route::get('/news/ru','languageController@newsru');

Route::get('/news/az','languageController@newsaz');

Route::get('/news/en','languageController@newsen');

Route::get('/admin/ru','languageController@adminru');

Route::get('/admin/az','languageController@adminaz');

Route::get('/admin/en','languageController@adminen');

Route::get('/yenile', 'valyutaController@yenile');

Route::get('/i_am_admin','adminController@index');

Route::group(['prefix' => 'i_am_admin'], function () {

    Auth::routes();

});

Route::post('/news/add', 'xeberController@add');
