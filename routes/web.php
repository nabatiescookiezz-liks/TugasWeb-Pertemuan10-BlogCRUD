
<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolePageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::middleware('auth')->group(function () {
    // CRUD Produk
    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    // Akses berdasarkan role
    Route::get('/admin', [RolePageController::class, 'admin'])
        ->middleware('role:admin')
        ->name('admin.home');

    Route::get('/editor', [RolePageController::class, 'editor'])
        ->middleware('role:admin,editor')
        ->name('editor.home');

    // Profil pengguna dari Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
