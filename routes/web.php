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

Route::resource('transport/home', 'HomeController');
Route::resource('transport/confirmation_email', 'ConfirmationEmailController');
Route::resource('transport/password_reset', 'PasswordResetController');
Route::resource('transport/correo_bienvenida', 'CorreoBienvenidaController');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//Nuevos Controladores con URL transport
Route::post('transport/transport-rol/search', 'ControllerTransPorRol@search')->name('transport-rol.search');
Route::resource('transport/transport-rol', 'ControllerTransPorRol');

Route::post('transport/transport-employee/search', 'ControllerTransPorEmployee@search')->name('transport-employee.search');
Route::resource('transport/transport-employee', 'ControllerTransPorEmployee');

Route::post('transport/transport-user/search', 'ControllerTransPorUser@search')->name('transport-user.search');
Route::resource('transport/transport-user', 'ControllerTransPorUser');

Route::post('disprovasa-sa/user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('disprovasa-sa/user-management', 'UserManagementController');

//Recurso por gusto
Route::post('transport/transport-formulario/search', 'ControllerTBFormulario@search')->name('transport-formulario.search');
Route::resource('transport/transport-formulario', 'ControllerTBFormulario');
