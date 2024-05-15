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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // user
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user-index');

    // artikel
    Route::get('/artikel', [App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel');

    //galeri
    Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri');
    
    //tim kerja
    Route::get('/tim', [App\Http\Controllers\TimController::class, 'index'])->name('tim');

    // role
    Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role-index');

    Route::post('/role', [App\Http\Controllers\RoleController::class, 'create'])->name('role-create');
    Route::patch('/role/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role-update');
    Route::delete('/role/delete/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('role-delete');
});

// Route::get('routes', function () {
//     $routeCollection = Route::getRoutes();

//     echo "<table style='width:100%'>";
//     echo "<tr>";
//     echo "<td width='10%'><h4>HTTP Method</h4></td>";
//     echo "<td width='10%'><h4>Route</h4></td>";
//     echo "<td width='10%'><h4>Name</h4></td>";
//     echo "<td width='70%'><h4>Corresponding Action</h4></td>";
//     echo "</tr>";
//     foreach ($routeCollection as $value) {
//         echo "<tr>";
//         echo "<td>" . $value->methods()[0] . "</td>";
//         echo "<td>" . $value->uri() . "</td>";
//         echo "<td>" . $value->getName() . "</td>";
//         echo "<td>" . $value->getActionName() . "</td>";
//         echo "</tr>";
//     }
//     echo "</table>";
// });