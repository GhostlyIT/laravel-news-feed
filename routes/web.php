<?php
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Manager\CategoryController as ManagerCategoryController;
use App\Http\Controllers\Manager\NewsController as ManagerNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('manager')->group(function() {
    Route::get('/', [ManagerController::class, 'index']);

    Route::prefix('news')->group(function() {
        Route::get('/', [ManagerNewsController::class, 'index'])->name('manager.list.news');
        Route::get('/create', [ManagerNewsController::class, 'createNewsPage'])->name('manager.create.news');
        Route::get('/{id}', [ManagerNewsController::class, 'edit'])->name('manager.edit.news');
    });

    Route::prefix('category')->group(function() {
        Route::get('/', [ManagerCategoryController::class, 'index'])->name('manager.list.categories');
        Route::get('/create', [ManagerCategoryController::class, 'createCategoryPage'])->name('manager.create.category');
        Route::get('/{id}', [ManagerCategoryController::class, 'edit'])->name('manager.edit.category');
    });
});

Route::prefix('news')->group(function() {
   Route::post('/', [NewsController::class, 'store'])->name('news.store');
    Route::post('/{id}/delete', [NewsController::class, 'delete'])->name('news.delete');
    Route::post('/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
});

Route::prefix('category')->group(function() {
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
});

