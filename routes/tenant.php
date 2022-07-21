<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    // Route::get('/', function () {
    //     // dd(\App\Models\User::all());
    //     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    // });

    Auth::routes([
        'register'=>false,
    ]);

    Route::get('/', function () {
        return redirect('/login');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class);
    Route::get('/roles/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});
