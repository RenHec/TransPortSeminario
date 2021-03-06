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

Auth::routes();

Route::get('/{id}', 'MunicipalitysController@getMunicipalitys');
Route::get('/employee/{id}', 'MunicipalitysController@getEmployees');
Route::get('/rol/{id}', 'MunicipalitysController@getRols');
Route::get('/machinary/{id}', 'MunicipalitysController@getMachinarys');

Route::resource('transport/home', 'HomeController');
Route::resource('/', 'ControllerTransPortCatalogo');
Route::resource('transport/confirmation_email', 'ConfirmationEmailController');
Route::resource('transport/password_reset', 'PasswordResetController');
Route::resource('transport/correo_bienvenida', 'CorreoBienvenidaController');
Route::resource('transport/cliente', 'ControllerCustomer');
Route::resource('transport/nuevo', 'ControllerCustomerCreate');
Route::resource('transport/rent', 'ControllerTransPorRent');

//Nuevos Controladores con URL transport
Route::post('transport/transport-rol/search', 'ControllerTransPorRol@search')->name('transport-rol.search');
Route::resource('transport/transport-rol', 'ControllerTransPorRol');

Route::post('transport/transport-employee/search', 'ControllerTransPorEmployee@search')->name('transport-employee.search');
Route::resource('transport/transport-employee', 'ControllerTransPorEmployee');

Route::post('transport/transport-user/search', 'ControllerTransPorUser@search')->name('transport-user.search');
Route::resource('transport/transport-user', 'ControllerTransPorUser');

Route::post('transport/transport-sales/search', 'ControllerTransSaleCost@search')->name('transport-sales.search');
Route::resource('transport/transport-sales', 'ControllerTransSaleCost');

Route::post('transport/transport-category/search', 'ControllerTransCategory@search')->name('transport-category.search');
Route::resource('transport/transport-category', 'ControllerTransCategory');

Route::post('transport/transport-unit/search', 'ControllerTransUnit@search')->name('transport-unit.search');
Route::resource('transport/transport-unit', 'ControllerTransUnit');

Route::post('transport/transport-typeoperator/search', 'ControllerTransTypeOperator@search')->name('transport-typeoperator.search');
Route::resource('transport/transport-typeoperator', 'ControllerTransTypeOperator');

Route::post('transport/transport-measurement/search', 'ControllerTransUnitMeasurement@search')->name('transport-measurement.search');
Route::resource('transport/transport-measurement', 'ControllerTransUnitMeasurement');

Route::post('transport/transport-statesubject/search', 'ControllerTransStateSubjest@search')->name('transport-statesubject.search');
Route::resource('transport/transport-statesubject', 'ControllerTransStateSubjest');

Route::post('transport/transport-customer/search', 'ControllerTransPorCustomer@search')->name('transport-customer.search');
Route::resource('transport/transport-customer', 'ControllerTransPorCustomer');

Route::post('transport/transport-typeextraction/search', 'ControllerTransPorTypeExtraction@search')->name('transport-typeextraction.search');
Route::resource('transport/transport-typeextraction', 'ControllerTransPorTypeExtraction');

Route::post('transport/transport-commoditieunit/search', 'ControllerTransPorCommoditieUnit@search')->name('transport-commoditieunit.search');
Route::resource('transport/transport-commoditieunit', 'ControllerTransPorCommoditieUnit');

Route::post('transport/transport-machinary/search', 'ControllerTransPorMachinery@search')->name('transport-machinary.search');
Route::resource('transport/transport-machinary', 'ControllerTransPorMachinery');

Route::post('transport/transport-operator/search', 'ControllerTransPorOperator@search')->name('transport-operator.search');
Route::resource('transport/transport-operator', 'ControllerTransPorOperator');

Route::post('transport/transport-extraction/search', 'ControllerTransPorExtraction@search')->name('transport-extraction.search');
Route::resource('transport/transport-extraction', 'ControllerTransPorExtraction');

Route::post('transport/transport-transportmateria/search', 'ControllerTransPorTransportMateria@search')->name('transport-transportmateria.search');
Route::resource('transport/transport-transportmateria', 'ControllerTransPorTransportMateria');

Route::post('transport/transport-warehousesubject/search', 'ControllerTransPortWarehouseSubject@search')->name('transport-warehousesubject.search');
Route::resource('transport/transport-warehousesubject', 'ControllerTransPortWarehouseSubject');

Route::post('transport/transport-warehousemachinary/search', 'ControllerTransPortWarehouseMachinary@search')->name('transport-warehousemachinary.search');
Route::resource('transport/transport-warehousemachinary', 'ControllerTransPortWarehouseMachinary');

//Recurso por gusto
Route::post('transport/transport-formulario/search', 'ControllerTBFormulario@search')->name('transport-formulario.search');
Route::resource('transport/transport-formulario', 'ControllerTBFormulario');
