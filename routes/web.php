<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login / Auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login-proses', [AuthController::class, 'loginProses'])->name('login.proses');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard umum
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/products/print/{product}', [ProductController::class, 'print'])->name('products.print');



});

// ==============================
// Routes Admin
// ==============================
Route::prefix('admin')
    ->middleware(['auth', 'role:1'])
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // USERS MANAGEMENT
        Route::resource('users', UserController::class);
        Route::get('users-export-excel', [UserController::class, 'exportExcel'])->name('users.export-excel');
        Route::get('users-export-pdf', [UserController::class, 'exportPDF'])->name('users.export-pdf');
        Route::get('users-print', [UserController::class, 'print'])->name('users.print');

        // ROLES MANAGEMENT
        Route::resource('roles', RolesController::class);
        Route::get('roles-export-pdf', [RolesController::class, 'exportPDF'])->name('roles.export-pdf');
        Route::get('roles-print', [RolesController::class, 'print'])->name('roles.print');

       // PRODUCTS MANAGEMENT
       Route::resource('products', ProductController::class);

       // Optional: export / print
       Route::get('products-export-pdf', [ProductController::class, 'exportPDF'])->name('products.export-pdf');
       Route::get('products-print', [ProductController::class, 'print'])->name('products.print');

       // PRODUCTS MANAGEMENT
       Route::resource('stocks', StockController::class);

       // Optional: export / print
       Route::resource('stocks', StockController::class);

        // Tambahkan route untuk print
        Route::get('stocks-print', [StockController::class, 'print'])->name('stocks.print');

        // Tambahkan route untuk export PDF jika ada
        Route::get('stocks-pdf', [StockController::class, 'exportPDF'])->name('stocks.pdf');

          // PURCHASES MANAGEMENT
          Route::resource('purchases', PurchaseController::class);
          Route::get('purchases-print', [PurchaseController::class, 'print'])->name('purchases.print');
          Route::get('purchases-pdf', [PurchaseController::class, 'exportPDF'])->name('purchases.pdf');

       
     Route::resource('contact-settings', ContactSettingController::class);
      // Chatbot Admin
      // Halaman chat admin
      Route::get('chat', [ChatController::class, 'index'])->name('chat.index');

      // Route untuk mengirim pesan chat (POST)
      Route::post('chat/send', [ChatController::class, 'send'])->name('chat.send');
    });

    
// ==============================
// Routes User Biasa
// ==============================
Route::prefix('user')
    ->middleware(['auth', 'role:2'])
    ->name('user.')
    ->group(function () {
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    });

// Auth tambahan
require __DIR__ . '/auth.php';