<?php

use App\Models\User;
use App\Models\Usuario;
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
// dd(Usuario::first()->toArray());
//dd(User::first()->toArray());
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Route::get('/intermediate', 'IntermediateController@showLoader')->name('intermediate');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('loginpost');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
