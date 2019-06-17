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
    if (auth()->user()){
        return redirect('dashboard');
    }
    return redirect('login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('/dealer','DealerController');

Route::resource('/retail','RetailController');

Route::resource('/sreport','ReportController');

Route::resource('/shipping','ShippingController');

Route::get('/shipment/chart', 'HomeController@shippingChart')->name('shippingChart');
Route::get('/compare/chart', 'HomeController@compareChart')->name('compareChart');
Route::get('/transaction/chart', 'HomeController@transactionChart')->name('transactionChart');
