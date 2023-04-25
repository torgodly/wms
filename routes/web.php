<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

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

//    index
    Route::get('warehouses', [WarehouseController::class, 'index'])->name('warehouses.index');
//    show
    Route::get('warehouses/{warehouse}', [WarehouseController::class, 'show'])->name('warehouse.show');
//    create
    Route::get('warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
    Route::post('warehouse/store', [WarehouseController::class, 'store'])->name('warehouse.store');
//    delete
    Route::delete('warehouse/{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');
//    edit
    Route::get('warehouse/{warehouse}/edit', [WarehouseController::class, 'edit'])->name('warehouse.edit');
    Route::patch('warehouse/{warehouse}', [WarehouseController::class, 'update'])->name('warehouse.update');
    //create product
    Route::get('warehouse/{warehouse}/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('warehouse/{warehouse}/product/store', [ProductController::class, 'store'])->name('product.store');
    //show
    Route::get('warehouse/{warehouse}/product/{product:code}', [ProductController::class, 'show'])->name('product.show');
    //delete
    Route::delete('warehouse/{warehouse}/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    //edit
    Route::get('warehouse/{warehouse}/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('warehouse/{warehouse}/product/{product}', [ProductController::class, 'update'])->name('product.update');
});

require __DIR__ . '/auth.php';
