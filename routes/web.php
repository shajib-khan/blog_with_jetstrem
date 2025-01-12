<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;





//Route::middleware([
 //   'auth:sanctum',
  //  config('jetstream.auth_session'),
  //  'verified',
//])->group(function () {
 //   Route::get('/dashboard', function () {
  //      return view('dashboard');
  //  })->name('dashboard');
//});


// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard Routes (with auth middleware)
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});
// Alias for 'dashboard'
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Category Routes
Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/',[CategoryController::class,'index'])->name('index');
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('{category:slug}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('{category:slug}', [CategoryController::class, 'update'])->name('update');
    Route::delete('{category:slug}/delete', [CategoryController::class, 'destroy'])->name('delete');
});

