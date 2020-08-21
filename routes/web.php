<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/dasbhoard', 'HomeController@index')->name('home');

Route::get('/appointments/list', 'AppointmentController@list')->name('appointments.list');
Route::get('/bookings/list', 'BookingController@list')->name('bookings.list');
Route::get('/bookings/getList', 'BookingController@Getlist');
Route::get('/bookings/getProductList', 'BookingController@GetProductlist');
Route::post('/bookings/confirm', 'BookingController@confirm')->name('bookings.confirm');
Route::post('/bookings/cancel', 'BookingController@cancel')->name('bookings.cancel');
Route::post('/bookings/prescription', 'BookingController@prescription')->name('bookings.prescription');
Route::get('/patient/visit/{patient_id}/{booking_id}', 'AppointmentController@VisitPatient')->name('patient.visit');
Route::get('/products/low/inventory', 'ProductsController@LowInventoryList')->name('products.low.inventory');
Route::get('/products/all/inventory', 'ProductsController@InventoryList')->name('products.all.inventory');
Route::get('/prescriptions/all', 'PrescriptionController@List')->name('prescriptions.list');
Route::get('/prescriptions/view/{id}/{patient_id}/{doctor_id}', 'PrescriptionController@view')->name('prescriptions.view');
Route::resource('appointments', 'AppointmentController');

Route::get('/{any}', 'HomeController@index')->where('any', '.*');

