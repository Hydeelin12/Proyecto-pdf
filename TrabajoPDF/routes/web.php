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

Route::get('articulos/pdf', [App\Http\Controllers\ArticuloController::class, 'pdf'] )->name('articulos.pdf');

Route::resource('registros',App\Http\Controllers\ RegistroController::class)->middleware('auth');
Route::resource('articulos',App\Http\Controllers\ ArticuloController::class)->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
