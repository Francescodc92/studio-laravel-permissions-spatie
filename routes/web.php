<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    //Home
    Route::get('/', [IndexController::class, 'index'])->name('index');
    //roles
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    //permissions
    Route::post('/permissions/{permission}/role', [PermissionController::class, 'AssignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/role/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::resource('/permissions', PermissionController::class);
    //Users
    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}',[UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users/{user}/roles',[UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('users/{user}/roles/{role}',[UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('users/{user}/permissions',[UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('users/{user}/permissions/{permission}',[UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});

require __DIR__.'/auth.php';
