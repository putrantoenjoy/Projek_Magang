<?php

use App\Models\Blog;
use App\Models\Galeri;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use Spatie\Backup\Tasks\Backup\BackupJob;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

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
    Route::patch('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user-update');
    Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user-delete');
    
    
    // artikel
    Route::get('/artikel', [App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel');
    Route::post('/artikel', [App\Http\Controllers\ArtikelController::class, 'create'])->name('artikel-create');
    Route::put('/artikel/{id}', [App\Http\Controllers\ArtikelController::class, 'update'])->name('artikel-update');
    Route::delete('/artikel/{id}', [App\Http\Controllers\ArtikelController::class, 'delete'])->name('artikel-delete');
    Route::post('/upload-img-konten-artikel', [App\Http\Controllers\ArtikelController::class, 'uploadImg'])->name('upload-img-artikel');
   
    //event
    Route::get('/event', [App\Http\Controllers\EventController::class, 'index'])->name('event');
    Route::post('/event', [App\Http\Controllers\EventController::class, 'simpan'])->name('event.simpan');
    Route::put('/event/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}', [App\Http\Controllers\EventController::class, 'hapus'])->name('event.hapus');

    //galeri
    Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri');
    Route::post('/galeri', [App\Http\Controllers\GaleriController::class, 'simpan'])->name('galeri.simpan');
    Route::put('/galeri/{id}', [App\Http\Controllers\GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [App\Http\Controllers\GaleriController::class, 'hapus'])->name('galeri.hapus');
   
    //tim kerja
    Route::get('/tim', [App\Http\Controllers\TimController::class, 'index'])->name('tim');
    Route::post('/tim', [App\Http\Controllers\TimController::class, 'simpan'])->name('tim.simpan');
    Route::put('/tim/{id}', [App\Http\Controllers\TimController::class, 'update'])->name('tim.update');
    Route::delete('/tim/{id}', [App\Http\Controllers\TimController::class, 'hapus'])->name('tim.hapus');

    // permission
    Route::post('/permission', [App\Http\Controllers\PermissionControler::class, 'create'])->name('permission-create');

    // role
    Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role-index');
    Route::post('/role', [App\Http\Controllers\RoleController::class, 'create'])->name('role-create');
    Route::patch('/role/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role-update');
    // Route::patch('/role-update/{id}', [RoleController::class, 'update'])->name('role-update');
    Route::delete('/role/delete/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('role-delete');

    // export sql
    Route::get('/export/export-sql', [App\Http\Controllers\UserController::class, 'export'])->name('export-sql');
    // Route::get('/backup/download', function () {
    //     // Run the backup command to create a backup
    //     Artisan::call('backup:run', ['--only-db' => true]);
    
    //     // Get the path to the latest backup file
    //     $backupFiles = Storage::disk('backup')->files();
    //     $latestBackup = end($backupFiles);
    //     $backupPath = Storage::disk('backup')->path($latestBackup);
    
    //     // Return the backup file as a download response
    //     return response()->download($backupPath, 'database_backup.sql');
    // })->name('backup.download');
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
    $user = User::get();
    $artikel = Blog::get();
    $galeri = Galeri::get();
    return view('auth.verify', compact('user', 'artikel', 'galeri'));
})->name('verification.notice');