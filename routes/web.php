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

Route::get('/Servicios', function () {
    return view('partials.Servicios');
})->name('phone.Servicios');

Route::get('/ServiciosPagados', 'PhoneController@ServiciosPagados')->name('phone.ServiciosPagados');
Route::get('/ServiciosPagados/{payeerItem}', 'PhoneController@DestroyServicioPagado')->name('phone.destroyServicio');

// Route::get('/FormPay', function () {
//     return view('partials.paypalForm');
// })->name('phone.FormPay');

Route::get('/paypal/pay', 'paymentController@payWithPayPal')->name('phone.PaywithPaypal');
Route::get('/paypal/status', 'PaymentController@payPalStatus')->name('phone.paystatus');

Route::get('/', 'PhoneController@index')->name('phone.index');
Route::post('/CrearStatus', 'PhoneController@store')->name('phone.store');
Route::get('/Eliminar/{PhoneItem}', 'PhoneController@destroy')->name('phone.destroy');
Route::get('/Phone/{PhoneItem}/editar', 'PhoneController@show')->name('phone.edit');
Route::patch('/Phone/update/{PhoneItem}', 'PhoneController@update')->name('phone.update');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
