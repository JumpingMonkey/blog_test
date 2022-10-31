<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeController;
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


Route::middleware('auth')->group(function (){
    Route::get('/api-doc', function () {
        return view('api');
    });

    Route::get('/admin-panel', [HomeController::class, 'home'])
        ->name('home.index');

    Route::resource('/posts', PostController::class);
});



Route::get('/', function (){
   return redirect('/login');
});



Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'showLoginForm')->name('auth.showLoginForm');
    Route::post('/login','login')->name('auth.login');
    Route::post('/logout','logout')->name('auth.logout');
});

Route::controller(RegisterController::class)->group(function (){
    Route::get('/register', 'showRegistrationForm')->name('auth.showRegistrationForm');
    Route::post('/register','register')->name('auth.register');
});



