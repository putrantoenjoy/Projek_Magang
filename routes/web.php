<?php

use App\Models\Blog;
use App\Models\Galeri;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Models\Footer;
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
    $footer = Footer::find(1);
    return view('welcome', compact('footer'));
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
    
    //layanan internet
    Route::get('/layanan-internet', [App\Http\Controllers\LayananInternetController::class, 'index'])->name('layanan.index');
    Route::post('/layanan-internet', [App\Http\Controllers\LayananInternetController::class, 'simpan'])->name('layanan.simpan');
    Route::put('/layanan-internet/{id}', [App\Http\Controllers\LayananInternetController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan-internet/{id}', [App\Http\Controllers\LayananInternetController::class, 'hapus'])->name('layanan.hapus');

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
    
    //user (layanan, pembayaran, transaksi, settings)
    Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/data-diri/{id}', [App\Http\Controllers\TransaksiController::class, 'pengaturan'])->name('transaksi.pengaturan');
    Route::put('/transaksi/data-diri/{id}', [App\Http\Controllers\TransaksiController::class, 'datadiri'])->name('transaksi.datadiri');
    Route::get('/layanan-internet/checkout/{id}', [App\Http\Controllers\TransaksiController::class, 'checkout'])->name('checkout.index');
    Route::get('/layanan-internet/checkout/{id}/pembayaran', [App\Http\Controllers\TransaksiController::class, 'pembayaran'])->name('pembayaran.index');
    Route::post('/layanan-internet/checkout/{id}/bayar', [App\Http\Controllers\TransaksiController::class, 'bayar'])->name('checkout.bayar');

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
    Route::get('/pengaturan', [App\Http\Controllers\PengaturanController::class, 'index'])->name('pengaturan');
    Route::put('/user/data-diri', [App\Http\Controllers\PengaturanController::class, 'datadiri'])->name('datadiri.update');
    Route::patch('/pengaturan/update/{id}', [App\Http\Controllers\PengaturanController::class, 'update'])->name('pengaturan-update');
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

//settings

Fortify::loginView(function () {
    return view('auth.login'); // Pastikan 'auth.login' adalah jalur view yang valid
});
Fortify::registerView(function () {
    return view('auth.register');
});
Route::get('reset-password/{token}', function ($token) {
    $email = request('email'); // Get the email from the query string
    return view('auth.reset-password', ['token' => $token, 'email' => $email]);
})->middleware(['guest'])->name('password.reset');
// Fortify::verifyEmailView(function (){
//     return view('auth.verify');
// });
Route::get('/email/verify', function () {
    $user = User::get();
    $artikel = Blog::get();
    $galeri = Galeri::get();
    return view('auth.verify', compact('user', 'artikel', 'galeri'));
})->name('verification.notice');

Route::get('/storage', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return 'Application optimized successfully!';
});