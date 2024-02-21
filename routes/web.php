<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//**  FRONTEND ROUTES  */

// ->namespace('App\Http\Controllers') -> use this namespace in the RouteServiceProvider to avoid having to specify it in each route
Route::get('/', 'PagesController@index')->name('index');
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/products/{product}', [PagesController::class, 'product_info'])->name('product_info');
Route::post('/add_to_cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cartlist', [CartController::class, 'cartList'])->name('cartlist');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/admin', 'HomeController@index')->name('admin');

//**  BACKEND ROUTES  */
Route::group(['middleware' => 'auth'], function () {
    // Your routes here
});

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin/dashboard', 'SliderController@index')->name('slider.index');

    //Sliders && Categories with a resource controller
    Route::resource('admin/sliders', 'SliderController')->names('admin.sliders');
    Route::resource('admin/categories', 'CategoryController')->names('admin.categories');
    Route::resource('admin/subcategories', 'SubcategoryController')->names('admin.subcategories');

    // Page with separated routes
    Route::get('admin/pages', 'PageController@index')->name('page.index');
    Route::get('admin/page/create', 'PageController@create')->name('page.create');
    Route::post('admin/page/store', 'PageController@store')->name('page.store');
    Route::get('admin/page/{id}', 'PageController@show')->name('page.show');
    Route::get('admin/page/{id}/edit', 'PageController@edit')->name('page.edit');
    Route::put('admin/page/{id}', 'PageController@update')->name('page.update');
    Route::delete('admin/page/{page}', 'PageController@destroy')->name('page.destroy');

    Route::get('admin/products', 'ProductController@index')->name('product.index');
    Route::get('admin/product/create', 'ProductController@create')->name('product.create');
    Route::post('admin/product/store', 'ProductController@store')->name('product.store');
    Route::get('admin/product/{id}', 'ProductController@show')->name('product.show');
    Route::get('admin/product/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::put('admin/product/{id}', 'ProductController@update')->name('product.update');
    Route::delete('admin/product/{product}', 'ProductController@destroy')->name('product.destroy');

    //delete a single product image from products_images table
    Route::delete('admin/product/image/{image}', 'ProductController@deleteImage')->name('delete.image');
});
