<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Auth\Events\Verified;
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

 // ->namespace('App\Http\Controllers') -> use this namespace in the RouteServiceProvider to avoid having to specify it in each route
Route::get('/', 'PagesController@index')->name('index');
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/admin', 'HomeController@index')->name('admin');

// back end routes
Route::get('/dashboard',function () { return view('admin.admin' ); })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin', 'SliderController@index')->name('admin.index');
Route::resource('admin/sliders', 'SliderController')->names('admin.sliders');
Route::put('admin/sliders/update/{slider}', 'SliderController@updateState')->name('slider.update-state');

// Route::post('product/store','ExtraController@store')->name('extra.store');
// Route::get('product/create', 'ExtraController@create')->name('extras.create');
// Route::get('product/{id}', 'ExtraController@show')->name('extra.show');
// Route::get('product/{id}/edit', 'ExtraController@edit')->name('extra.edit');
// Route::put('product/{id}', 'ExtraController@update')->name('extra.update');
// Route::delete('product/{id}', 'ExtraController@destroy')->name('extra.destroy');