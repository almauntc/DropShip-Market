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
Route::get('/contact', 'DropshipperController@contact');
Route::get('/login', 'DropshipperController@login');
Route::match(['get','post'],'/loginPost', 'DropshipperController@loginPost');
Route::get('/register', 'DropshipperController@register');
Route::get('/registerPost', 'DropshipperController@registerPost');


Route::get('/logouthome', 'DropshipperController@logout');
// Cek Pembayaran
Route::get('/penjualan-produk', 'DropshipperController@sale');
Route::match(['get','post'],'/tambah-penjualan', 'DropshipperController@addsale');
Route::get('/penjualan-produk/delete-product/{id}','DropshipperController@deleteSale');
Route::match(['get','post'],'/editRekening/{id}', 'DropshipperController@editRekening');

// Chart
Route::get('/profit-chart', 'DropshipperController@ProfitChart');

//Add to Produk Saya
Route::match(['get','post'],'/tambah-produk', 'DropshipperController@addtocart');
Route::match(['get','post'],'/produk-saya', 'DropshipperController@cart');

//Tambah Customer
Route::match(['get','post'],'/tambah-customer', 'CustomerController@addCustomers');
Route::match(['get','post'],'/data-customer/{id}', 'CustomerController@customer');
Route::match(['get','post'],'/edit-customer/{id}', 'CustomerController@editCustomers');


//Pembayaran
Route::match(['get','post'],'/info-bayar/{id}', 'CustomerController@payment');
Route::match(['get','post'],'/kwitansi', 'DropshipperController@kwitansi');
Route::match(['get','post'],'/print_info/{id}', 'CustomerController@print_info');
Route::match(['get','post'],'/ongkir', 'DropshipperController@ongkir');
Route::match(['get','post'],'/cek_kabupaten', 'DropshipperController@kabupaten');
Route::match(['get','post'],'/cek_ongkir', 'DropshipperController@cek_ongkir');
Route::match(['get','post'],'/upload_bukti','CustomerController@upload_bukti');
Route::get('/admin/delete_image/{id}','CustomerController@deleteTransferImage');




//Delete Product from Produk Saya
Route::get('/produk-saya/delete-product/{id}','DropshipperController@deleteCartProduct');

//Update Product Quantity in Produk Saya
Route::get('/produk-saya/update-quantity/{id}/{quantity}','DropshipperController@updateCartQuantity');

//Category/Listing Page
Route::get('/products/{url}','ProductsController@listproducts');

//Category Detail Product
Route::get('/product/{id}', 'ProductsController@product');

//Get Product Attribute Price
Route::get('/get-product-price','ProductsController@getProductPrice');


//Admin
Route::match(['get','post'],'/admin','AdminController@login');

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

	//Customer Route
	Route::get('/admin/customer','CustomerController@customerlist');
	Route::get('/admin/customer_info/{id}','CustomerController@customer_info');
	Route::match(['get', 'post'],'/admin/customer/delCustomer/{id}','CustomerController@delCustomerlist');

	//Product Ruoute (Admin)
	Route::get('/admin/products','ProductsController@products');
	Route::match(['get','post'],'/admin/products/newProducts','ProductsController@newProducts');
	Route::match(['get', 'post'],'/admin/products/editProducts/{id}','ProductsController@editProducts');
	Route::get('/admin/products/deleteProducts/{id}','ProductsController@deleteProducts');
	Route::get('/admin/products/deleteProducts-image/{id}','ProductsController@deleteProductsImage');

	//Dropshipper Route (Admin)
	Route::get('/admin/dropshipper-management/dropshipper','DropshipperController@dropshipper');
	Route::get('/admin/dropshipper-management/dropshipper/editProduct/{id}','DropshipperController@editProduct');
	Route::match(['get', 'post'], '/admin/dropshipper-management/dropshipper/editStatus/{id}','DropshipperController@editStatus');
	Route::get('/admin/dropshipper-management/dropshipper/deleteStatus/{id}','DropshipperController@deleteStatus');
	Route::get('/admin/dropshipper-management/dropshipper/deleteDropship/{id}','DropshipperController@deleteDropship');
	
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
	Route::match(['get', 'post'], '/admin/product-attributes/editAtrributes/{id}','ProductsController@editAttributes');
	Route::get('/admin/products-attributes/deleteAttributes/{id}','ProductsController@deleteAttributes');
});

Route::get('/logout','AdminController@logout');
