<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\NewsController;

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
    return view('Landing-page');
});

Route::get('/testing.../{id?}',function(){
    return 999;
})->name('testing');

Route::namespace('Front')->group(function(){
    Route::get('users',[UserController::class,'index']);
});

Route::group(['prefix'=>'users'],function(){
    Route::get('/testing.../{id?}',function(){return 999;});
    Route::get('/',[UserController::class,'index']);
    Route::get('/add',[UserController::class,'add']);
});

Route::resource('news',NewsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
