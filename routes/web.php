<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Facades\Tenancy;

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
    return redirect('/home');
});

Auth::routes([
    'register'=>false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth']);


Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::get('/roles/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', 'PostController');
});
