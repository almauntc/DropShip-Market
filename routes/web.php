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
    return view('welcome');
});


/*



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']],function(){
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

	Route::get('/admin/supplier-management/supplier','AdminController@supplier');
	Route::get('/admin/supplier-management/supplier/newSupplier','AdminController@newSupplier');

	Route::get('/admin/supplier-management/products','AdminController@products');
	Route::get('/admin/supplier-management/products/newProducts','AdminController@newProducts');

	Route::get('/admin/customer-management/customer','AdminController@customer');
	Route::get('/admin/customer-management/customer/newCustomer','AdminController@newCustomer');
	
	Route::get('/admin/customer-management/order','AdminController@order');
	Route::get('/admin/customer-management/order/newOrder','AdminController@newOrder');

	Route::get('/admin/sales','AdminController@sales');
	Route::get('/admin/sales/newSales','AdminController@newSales');

	Route::get('/admin/comission','AdminController@comission');


});

Route::get('/logout','AdminController@logout');
