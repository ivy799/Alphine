<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[MainController::class,'index'])->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Main Route
// Admin Route
Route::middleware(['auth','role:admin'])->group(function () {

    // User Management
    Route::resource('/admin/UserManagement', UserController::class)->names([
        'index'   => 'admin.UserManagement.index',
        'create'  => 'admin.UserManagement.create',
        'store'   => 'admin.UserManagement.store',
        'show'    => 'admin.UserManagement.show',
        'edit'    => 'admin.UserManagement.edit',
        'update'  => 'admin.UserManagement.update',
        'destroy' => 'admin.UserManagement.destroy',
    ]);

});



require __DIR__.'/auth.php';
