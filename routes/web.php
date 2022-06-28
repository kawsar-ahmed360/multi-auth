<?php

use Illuminate\Support\Facades\Route;

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




//Route::middleware(['auth', 'user-access:customer'])->group(function () {
//
////    Route::get('/home', [HomeController::class, 'index'])->name('home');
//    Route::get('/home', 'HomeController@index')->name('home');
//});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access'])->group(function () {

    Route::get('home', 'HomeController@Index')->name('home');
});

Route::middleware(['auth', 'admin-access'])->group(function () {

    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
    Route::post('admin/product-store', 'admin\ProductManageController@ProductStore')->name('ProductStore');
    Route::post('admin/product-update', 'admin\ProductManageController@ProductUpdate')->name('ProductUpdate');
    Route::get('admin/product-delete/{id}', 'admin\ProductManageController@ProductDelete')->name('ProductDelete');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'manager-access'])->group(function () {

    Route::get('/manager/home', 'HomeController@managerHome')->name('manager.home');
});
