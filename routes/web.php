<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
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

 // front end routes

//Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
// ->namespace('App\Http\Controllers') -> use this namespace in the RouteServiceProvider to avoid having to specify it in each route
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');


// back end routes
// Route::post('product/store','ExtraController@store')->name('extra.store');
// Route::get('product/create', 'ExtraController@create')->name('extras.create');
// Route::get('product/{id}', 'ExtraController@show')->name('extra.show');
// Route::get('product/{id}/edit', 'ExtraController@edit')->name('extra.edit');
// Route::put('product/{id}', 'ExtraController@update')->name('extra.update');
// Route::delete('product/{id}', 'ExtraController@destroy')->name('extra.destroy');