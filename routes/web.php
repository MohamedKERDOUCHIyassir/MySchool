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

Route::get('/guest', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('profile/{id}',[
    'uses'  => 'HomeController@profile',
    'as'    => 'profile'
]);

Route::post('/publication/store',[
    'uses'  => 'PublicationController@store',
    'as'    => 'publication.store'
]);

Route::get('/publication/create',[
    'uses'  => 'PublicationController@create',
    'as'    => 'publication.create'
]);