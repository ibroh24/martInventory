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

// Route::get('/', function () {
//     return view('login');
// });

// Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    // Inventory crud
    Route::get('/inventory', 'InventoryController@index')->name('inventory.view');
    Route::get('/inventoryupdate', 'InventoryController@lowItems')->name('inventory.viewlowitem');
    Route::get('/inventory/create', 'InventoryController@create')->name('inventory.create');
    Route::post('/inventory/store', 'InventoryController@store')->name('inventory.store');
    Route::get('/inventory/delete/{slug}', 'InventoryController@destroy')->name('inventory.destroy');
    Route::get('/inventory/edit/{slug}', 'InventoryController@edit')->name('inventory.edit');
    Route::post('/inventory/update/{slug}', 'InventoryController@update')->name('inventory.update');

    // sales crud
    Route::get('/sales', 'SalesController@index')->name('sales.view');
    Route::get('/sales/create', 'SalesController@create')->name('sales.create');
    Route::post('/sales/store', 'SalesController@store')->name('sales.store');
    Route::get('/sales/delete/{slug}', 'SalesController@destroy')->name('sales.destroy');
    Route::get('/sales/edit/{id}', 'SalesController@edit')->name('sales.edit');
    Route::get('/sales/returnsales/{id}', 'SalesController@returnsales')->name('sales.returnsales');
    Route::post('/sales/update/{id}', 'SalesController@update')->name('sales.update');
    Route::post('/sales/return/{id}', 'SalesController@return')->name('sales.return');
    

     // category crud
    Route::get('/productcategories', 'CategoryController@index')->name('category.view');
    Route::get('/productcategories/create', 'CategoryController@create')->name('category.create');
    Route::post('/productcategories/store', 'CategoryController@store')->name('category.store');
    Route::get('/productcategories/delete/{slug}', 'CategoryController@destroy')->name('category.destroy');
    Route::get('/productcategories/edit/{slug}', 'CategoryController@edit')->name('category.edit');
    Route::post('/productcategories/update/{slug}', 'CategoryController@update')->name('category.update');

    // UOM crud
    Route::get('/uom', 'MeasurementController@index')->name('measure.view');
    Route::get('/uom/create', 'MeasurementController@create')->name('measure.create');
    Route::post('/uom/store', 'MeasurementController@store')->name('measure.store');
    Route::get('/uom/delete/{slug}', 'MeasurementController@destroy')->name('measure.destroy');
    Route::get('/uom/edit/{slug}', 'MeasurementController@edit')->name('measure.edit');
    Route::post('/uom/update/{slug}', 'MeasurementController@update')->name('measure.update');

    // Supplier crud
    Route::get('/supplier', 'SupplierController@index')->name('supplier.view');
    Route::get('/supplier/create', 'SupplierController@create')->name('supplier.create');
    Route::post('/supplier/store', 'SupplierController@store')->name('supplier.store');
    Route::get('/supplier/delete/{slug}', 'SupplierController@destroy')->name('supplier.destroy');
    Route::get('/supplier/edit/{slug}', 'SupplierController@edit')->name('supplier.edit');
    Route::post('/supplier/update/{slug}', 'SupplierController@update')->name('supplier.update');

    // stock data 
    Route::get('/stockdata', 'StockController@index')->name('stock.view');
    Route::get('/stockshowdata/{slug}', 'StockController@show')->name('stock.show');
    Route::get('/stockprintdata/{slug}', 'StockController@print')->name('stock.print');

     // User crud
     Route::get('/user', 'UserController@index')->name('user.view');
     Route::get('/user/create', 'UserController@create')->name('user.create');
     Route::post('/user/store', 'UserController@store')->name('user.store');
     Route::get('/user/delete/{slug}', 'UserController@destroy')->name('user.destroy');
     Route::get('/user/edit/{slug}', 'UserController@edit')->name('user.edit');
     Route::post('/user/update/{slug}', 'UserController@update')->name('user.update');
 
});

// ajax Calls
Route::get('/getProduct/{selectedCats}', 'SalesController@getProduct');
Route::get('/getProductPrice/{selectedItem}', 'SalesController@getProductPrice');
Route::get('/getProductRemain/{editedProduct}', 'InventoryController@getProductRemain');