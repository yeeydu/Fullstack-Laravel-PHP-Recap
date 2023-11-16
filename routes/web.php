<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('product','ExtraController@index')->name('extras.index');
// Route::post('product/store','ExtraController@store')->name('extra.store');
// Route::get('product/create', 'ExtraController@create')->name('extras.create');
// Route::get('product/{id}', 'ExtraController@show')->name('extra.show');
// Route::get('product/{id}/edit', 'ExtraController@edit')->name('extra.edit');
// Route::put('product/{id}', 'ExtraController@update')->name('extra.update');
// Route::delete('product/{id}', 'ExtraController@destroy')->name('extra.destroy');