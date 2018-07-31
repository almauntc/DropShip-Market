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

Auth::routes();

Route::get('/home', 'DropshipperController@index');
Route::get('/login', 'DropshipperController@login');
Route::match(['get','post'],'/loginPost', 'DropshipperController@loginPost');
Route::get('/register', 'DropshipperController@register');
Route::get('/registerPost', 'DropshipperController@registerPost');

Route::group(['middleware'=>['auth']],function(){
//Route::get('/home', 'HomeController@index')->name('home');


});
Route::get('/logouthome', 'DropshipperController@logout');



//Admin
Route::match(['get','post'],'/admin','AdminController@login');

//Category/Listing Page
Route::get('products/{url}','ProductsController@products');

//Category Detail Product
Route::get('/product/{id}', 'ProductsController@product');

Route::group(['middleware' => ['auth']],function(){
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

	//Supplier Route (Admin)
	Route::get('/admin/supplier-management/supplier','SupplierController@supplier');
	Route::match(['get','post'],'/admin/supplier-management/supplier/newSupplier','SupplierController@newSupplier');
	Route::match(['get', 'post'],'/admin/supplier-management/supplier/editSupplier/{id}','SupplierController@editSupplier');
	Route::match(['get', 'post'],'/admin/supplier-management/supplier/deleteSupplier/{id}','SupplierController@deleteSupplier');

	//Product Ruoute (Admin)
	Route::get('/admin/products','ProductsController@products');
	Route::match(['get','post'],'/admin/products/newProducts','ProductsController@newProducts');
	Route::match(['get', 'post'],'/admin/products/editProducts/{id}','ProductsController@editProducts');
	Route::get('/admin/products/deleteProducts/{id}','ProductsController@deleteProducts');
	Route::get('/admin/products/deleteProducts-image/{id}','ProductsController@deleteProductsImage');

	//Dropshipper Route (Admin)
	Route::get('/admin/dropshipper-management/dropshipper','DropshipperController@dropshipper');
	Route::get('/admin/dropshipper-management/dropshipper/newDropshipper','DropshipperController@newDropshipper');
	
	//Transactions Route (Admin)
	Route::get('/admin/dropshipper-management/transactions','AdminController@transactions');
	Route::get('/admin/dropshipper-management/transactons/newTransaksi','AdminController@newTransactions');


	//Category Route (Admin)
	Route::get('/admin/category','CategoryController@category');
	Route::match(['get','post'], '/admin/category/newCategory', 'CategoryController@newCategory');
	Route::match(['get', 'post'],'/admin/category/editCategory/{id}','CategoryController@editCategory');
	Route::match(['get', 'post'],'/admin/category/deleteCategory/{id}','CategoryController@deleteCategory');

	//Products Attributes Route
	Route::get('/admin/product-attributes','ProductsController@attributes');
	Route::match(['get', 'post'], '/admin/product-attributes/newAtrributes/{id}','ProductsController@newAttributes');
	Route::get('/admin/products-attributes/deleteAttributes/{id}','ProductsController@deleteAttributes');
});

Route::get('/logout','AdminController@logout');
