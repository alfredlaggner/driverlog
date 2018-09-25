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

Route::get('/', array('as' => 'make_manifest', 'uses' => 'FileController@Start'));
Route::post('make_manifest', array('as' => 'make_manifest', 'uses' => 'FileController@makeManifest'));
Route::get('import-customers', array('as' => 'import-customers', 'uses' => 'FileController@importCustomersIntoDB'));
Route::get('import-products', array('as' => 'import-products', 'uses' => 'FileController@importProductsIntoDB'));
Route::get('import-invoice', array('as' => 'import-invoice', 'uses' => 'FileController@importInvoiceIntoDB'));
Route::get('import-units', array('as' => 'import-units', 'uses' => 'FileController@importUnitsIntoDB'));
Route::get('import-contacts', array('as' => 'import-contacts', 'uses' => 'FileController@importContactsIntoDB'));

Route::get('invoice', array('as' => 'invoice', 'uses' => 'FileController@testInvoice'));

Route::resource('vehicles', 'VehicleController');
Route::resource('drivers', 'DriverController');
Route::resource('businesses', 'BusinessController');
Route::get('driver-edit', array('as' => 'driver-edit', 'uses' => 'DriverController@index'));
Route::get('vehicle-edit', array('as' => 'vehicle-edit', 'uses' => 'VehicleController@index'));
Route::get('additional', array('as' => 'additional', 'uses' => 'FileController@additional'));
Route::get('go-home', array('as' => 'go-home', 'uses' => 'FileController@Start'));

