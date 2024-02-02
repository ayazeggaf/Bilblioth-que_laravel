<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\welcomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[welcomeController::class,'index']
)->name('home');
// Route::resource('/livre',LivreController::class);
Auth::routes();
Route::group(['middlware'=>['auth']],function (){
Route::resource('livre', LivreController::class);
Route::get('/livre/{id}/delete',[LivreController::class,'delete'])->name('livre.delete');
Route::resource('/auteur',AuteurController::class);
Route::resource('/emprunt',EmpruntController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about',function(){
    return view('nav.about');
})->name('about');
Route::get('/service',function(){
    return view('nav.service');
})->name('service');
});


