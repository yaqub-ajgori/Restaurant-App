<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\CategoryController as frontEndCategoryController;
use App\Http\Controllers\Frontend\MenuController as frontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as frontendReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/categories', [frontEndCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [frontEndCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [frontendMenuController::class, 'index'])->name('menus.index');
Route::get('reservation/step-one', [frontendReservationController::class, 'stepOne'])->name('reservation.step.one');
Route::post('reservation/step-one', [frontendReservationController::class, 'stepOneStore'])->name('reservation.step.one.store');
Route::get('reservation/step-two', [frontendReservationController::class, 'stepTwo'])->name('reservation.step.two');
Route::post('reservation/step-two', [frontendReservationController::class, 'stepTwoStore'])->name('reservation.step.two.store');

Route::get('/thankyou', [HomeController::class, 'thankyou'])->name('thankyou');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    // Ctegories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Menus
    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
    Route::get('menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

    // Reservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    // Tables
    Route::get('/tables', [TableController::class, 'index'])->name('tables.index');
    Route::get('tables/create', [TableController::class, 'create'])->name('tables.create');
    Route::post('tables', [TableController::class, 'store'])->name('tables.store');
    Route::get('tables/{table}/edit', [TableController::class, 'edit'])->name('tables.edit');
    Route::put('tables/{table}', [TableController::class, 'update'])->name('tables.update');
    Route::delete('tables/{table}', [TableController::class, 'destroy'])->name('tables.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
