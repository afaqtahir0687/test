<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});


Route::get('/', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('products/store', [App\Http\Controllers\ProductController::class, 'storeArray']);
Route::get('products/index', [App\Http\Controllers\ProductController::class, 'index'])->name('products/index');
Route::get('products/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('products/update/{id}', [App\Http\Controllers\ProductController::class, 'update']);
Route::get('products/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);


Route::controller(UserController::class)->prefix('users')->as('users.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{id}','show')->name('show');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::put('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy');
});