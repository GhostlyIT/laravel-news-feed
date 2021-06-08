<?php
use App\Http\Controllers\ManagerController;

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
    Route::get('/news/create', [ManagerController::class, 'createNewsPage'])->name('manager.create.news');
});

