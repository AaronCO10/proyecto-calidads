<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CampaniaController;
use App\Http\Controllers\DonadoreController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\BancoSangreController;
use App\Http\Controllers\TransfusionController;
use App\Http\Controllers\CentrosDonacionController;
use App\Http\Controllers\SolicitudDonacionController;

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


Route::resource('campanias', CampaniaController::class);
Route::resource('solicitudes', SolicitudDonacionController::class);
Route::resource('bancosangre', BancoSangreController::class);
Route::resource('centrosdonacion', CentrosDonacionController::class);
Route::post('/solicitante/{id}', [UserController::class, 'updateSolicitante'])->name('solicitante.update');
Route::post('/donaciones', [DonacionesController::class, 'store'])->name('donaciones.store');
Route::resource('transfusiones', TransfusionController::class);

Route::get('/solicitudes-report', [ReportesController::class, 'solicitudesReport'])->name('solicitudes_report');


Auth::routes();

Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/home','http://localhost/donadoresperu/public/principal');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/nuevo', 'App\Http\Controllers\BannerController@nuevo')->name('banner.nuevo');
Route::get('/mapa', 'App\Http\Controllers\BannerController@mapa')->name('banner.mapa');
Route::get('/terminos', 'App\Http\Controllers\BannerController@terminos')->name('banner.terminos');
Route::get('/solicitud', 'App\Http\Controllers\SolicitudController@index')->name('solicitud.index')->middleware('auth');
Route::get('/banner', 'App\Http\Controllers\BannerController@index')->name('banner.index')->middleware('auth');
Route::get('/donadore', 'App\Http\Controllers\DonadoreController@index')->name('donadore.index')->middleware('auth');
Route::get('/actualizar-rol', 'App\Http\Controllers\UserController@index')->name('user.updateRole');


