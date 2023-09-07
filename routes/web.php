<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolePermissionController;

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

Route::get('sendmail', [MailController::class, 'sendmail']);

// ___________________________Role Route Start__________________________________

Route::controller(RolePermissionController::class)->group(function(){
    Route::get('role', 'roleform');
    Route::get('rolelist', 'rolelist')->name('rolelist');
    Route::post('role', 'rolestore')->name('rolestore');
    Route::delete('role/delete', 'roledestroy');
});
// ___________________________Role Route End_____________________________________

// ___________________________Permission Route Start__________________________________

Route::controller(RolePermissionController::class)->group(function(){
    Route::get('permission', 'permissionform');
    Route::get('permissionlist', 'permissionlist')->name('permissionlist');
    Route::post('permission', 'permissionstore')->name('permissionstore');
    Route::delete('permission/delete', 'permissiondestroy');
});
// ___________________________Permission Route End_____________________________________

// ___________________________Assaign Role Permission Route Start__________________________________

Route::controller(RolePermissionController::class)->group(function(){
    Route::get('assign', 'assignform')->name('assign');
    Route::get('assignlist', 'assignlist')->name('assignlist');
    Route::post('assign', 'assignstore')->name('assignstore');
    Route::delete('assign/delete', 'assigndestroy');
});
// ___________________________Assign Role Permission Route End_____________________________________



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('cacheclear', function(){
    Artisan::call('cache:clear');
    return redirect()->route('dashboard');
})->name('cacheClear');

require __DIR__.'/auth.php';
