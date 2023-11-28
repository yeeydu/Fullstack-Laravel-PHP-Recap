<?php

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
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/admin', 'HomeController@index')->name('admin');

//**  BACKEND ROUTES  */ 
Route::group(['middleware' => 'auth'], function () {
    // Your routes here
});

Route::group([ 'middleware' => 'auth'], function () {
   
    Route::get('/admin/dashboard', 'SliderController@index')->name('admin.index');
    Route::resource('admin/sliders', 'SliderController')->names('admin.sliders');
    Route::put('admin/sliders/update/{slider}', 'SliderController@updateState')->name('slider.update-state');

    // Page
    Route::get('/admin/page','PageController@index')->name('page.index');
    Route::post('admin/page/store','PageController@store')->name('page.store');
    Route::get('admin/page/create', 'PageController@create')->name('page.create');
    Route::get('admin/page/{id}', 'PageController@show')->name('page.show');
    Route::get('admin/page/{id}/edit', 'PageController@edit')->name('page.edit');
    Route::put('admin/page/{id}', 'PageController@update')->name('page.update');
    Route::delete('admin/page/{id}', 'PageController@destroy')->name('page.destroy');

});
