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
})->middleware('auth');

Auth::routes();

Route::get('/{id}', 'MunicipalitysController@getMunicipalitys');

Route::resource('disprovasa-sa/home', 'HomeController');
Route::resource('disprovasa-sa/confirmation_email', 'ConfirmationEmailController');
Route::resource('disprovasa-sa/password_reset', 'PasswordResetController');
Route::resource('disprovasa-sa/correo_bienvenida', 'CorreoBienvenidaController');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('disprovasa-sa/user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('disprovasa-sa/user-management', 'UserManagementController');
