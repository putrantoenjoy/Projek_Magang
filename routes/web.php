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
})->name('beranda');

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
    Route::get('/user/export', [App\Http\Controllers\UserController::class, 'export'])->name('user-export');

    // artikel
    Route::get('/artikel', [App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel');
    Route::post('/artikel', [App\Http\Controllers\ArtikelController::class, 'create'])->name('artikel-create');
    Route::get('/artikel/export', [App\Http\Controllers\ArtikelController::class, 'export'])->name('artikel-export');

    //event
    Route::get('/event', [App\Http\Controllers\EventController::class, 'index'])->name('event');
    Route::post('/event', [App\Http\Controllers\EventController::class, 'simpan'])->name('event.simpan');
    Route::put('/event/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}', [App\Http\Controllers\EventController::class, 'hapus'])->name('event.hapus');
    Route::get('/event/export', [App\Http\Controllers\EventController::class, 'export'])->name('event-export');

    //galeri
    Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri');
    Route::post('/galeri', [App\Http\Controllers\GaleriController::class, 'simpan'])->name('galeri.simpan');
    Route::put('/galeri/{id}', [App\Http\Controllers\GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [App\Http\Controllers\GaleriController::class, 'hapus'])->name('galeri.hapus');
    Route::get('/galeri/export', [App\Http\Controllers\GaleriController::class, 'export'])->name('galeri-export');
    
    //tim kerja
    Route::get('/tim', [App\Http\Controllers\TimController::class, 'index'])->name('tim');
    Route::post('/tim', [App\Http\Controllers\TimController::class, 'simpan'])->name('tim.simpan');
    Route::put('/tim/{id}', [App\Http\Controllers\TimController::class, 'update'])->name('tim.update');
    Route::delete('/tim/{id}', [App\Http\Controllers\TimController::class, 'hapus'])->name('tim.hapus');
    Route::get('/tim/export', [App\Http\Controllers\TimController::class, 'export'])->name('tim-export');

    // permission
    Route::post('/permission', [App\Http\Controllers\PermissionControler::class, 'create'])->name('permission-create');

    // role
    Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role-index');
    Route::post('/role', [App\Http\Controllers\RoleController::class, 'create'])->name('role-create');
    Route::patch('/role/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role-update');
    Route::delete('/role/delete/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('role-delete');
    Route::get('/role/export', [App\Http\Controllers\RoleController::class, 'export'])->name('role-export');
});

//layanan
Route::get('/layanan', [App\Http\Controllers\LayananController::class, 'index'])->name('layanan');

//event
Route::get('/event-kami', [App\Http\Controllers\UserEventController::class, 'index'])->name('event-kami');

//galeri
Route::get('/galeri-kami', [App\Http\Controllers\UserGaleriController::class, 'index'])->name('galeri-kami');

//tentang kami
Route::get('/tentang-kami', [App\Http\Controllers\TentangKamiController::class, 'index'])->name('tentang-kami');

//artikel
Route::get('/artikel-kami', [App\Http\Controllers\UserArtikelController::class, 'index'])->name('artikel-kami');
Route::get('/artikel-kami/{id}', [App\Http\Controllers\UserArtikelController::class, 'show'])->name('artikel-kami.show');

//tim
Route::get('/tim-kerja', [App\Http\Controllers\UserTimController::class, 'index'])->name('tim-kerja');

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