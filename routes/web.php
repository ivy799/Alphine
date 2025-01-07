<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\RentalController;
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

    // Car Management
    Route::resource('/admin/CarManagement', CarsController::class)->names([
        'index'   => 'admin.CarManagement.index',
        'create'  => 'admin.CarManagement.create',
        'store'   => 'admin.CarManagement.store',
        'show'    => 'admin.CarManagement.show',
        'edit'    => 'admin.CarManagement.edit',
        'update'  => 'admin.CarManagement.update',
        'destroy' => 'admin.CarManagement.destroy',
    ]);

    // Admin Rental Management
    Route::resource('/admin/RentalManagement', RentalController::class)->names([
        'index'   => 'admin.RentalManagement.index',
        'create'  => 'admin.RentalManagement.create',
        'store'   => 'admin.RentalManagement.store',
        'show'    => 'admin.RentalManagement.show',
        'edit'    => 'admin.RentalManagement.edit',
        'update'  => 'admin.RentalManagement.update',
        'destroy' => 'admin.RentalManagement.destroy',
    ]);

    Route::get('/admin/adminIndex', [RentalController::class, 'adminIndex'])->name('admin.RentalManagement.adminIndex');

});





// User Route
Route::middleware(['auth','role:user'])->group(function () {

    // User Rental
    Route::resource('/user/Rental', RentalController::class)->names([
        'index'   => 'user.Rental.index',
        'create'  => 'user.Rental.create',
        'store'   => 'user.Rental.store',
        'show'    => 'user.Rental.show',
        'edit'    => 'user.Rental.edit',
        'update'  => 'user.Rental.update',
        'destroy' => 'user.Rental.destroy',
    ]);

    Route::post('/user/Rental/{rental}/cancel', [RentalController::class, 'cancel'])->name('user.Rental.cancel');
    Route::get('/user/myRentals', [RentalController::class, 'myRentals'])->name('user.Rental.myRentals');

    
});



require __DIR__.'/auth.php';
