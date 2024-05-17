<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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

// Auth::routes();
// Auth::routes();
// Route::get('/verify', [App\Http\Controllers\DashboardController::class, 'verify'])->name('verification.verify');
// Route::get('/verify/notice', [App\Http\Controllers\DashboardController::class, 'notice'])->name('verification.notice');
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // user
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user-index');
    Route::post('/user', [App\Http\Controllers\UserController::class, 'create'])->name('user-create');

    // artikel
    Route::get('/artikel', [App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel');

    //galeri
    Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri');
    
    //tim kerja
    Route::get('/tim', [App\Http\Controllers\TimController::class, 'index'])->name('tim');
    Route::post('/tim', [App\Http\Controllers\TimController::class, 'simpan'])->name('tim.simpan');
    Route::put('/tim/{id}', [App\Http\Controllers\TimController::class, 'update'])->name('tim.update');
    Route::delete('/tim/{id}', [App\Http\Controllers\TimController::class, 'hapus'])->name('tim.hapus');

    // role
    Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role-index');
    Route::post('/role', [App\Http\Controllers\RoleController::class, 'create'])->name('role-create');
    Route::patch('/role/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role-update');
    Route::delete('/role/delete/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('role-delete');
});
Fortify::loginView(function () {
    return view('auth.login');
});
Fortify::registerView(function () {
    return view('auth.register');
});
// Fortify::verifyEmailView(function (){
//     return view('auth.verify');
// });
Route::get('/email/verify', function () {
    return view('auth.verify');
})->name('verification.notice');