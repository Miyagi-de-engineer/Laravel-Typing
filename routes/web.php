<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DrillsController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', [DrillsController::class, 'index'])->name('drills');
Route::get('/drills/{id}/show', [DrillsController::class, 'show'])->name('drills.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/drills/new', [DrillsController::class, 'new'])->name('drills.new');
    Route::post('/drills', [DrillsController::class, 'create'])->name('drills.create');
    Route::get('/drills/{id}/edit', [DrillsController::class, 'edit'])->name('drills.edit');
    Route::post('/drills/{id}/edit', [DrillsController::class, 'update'])->name('drills.update');
    Route::post('/drills/{id}/delete', [DrillsController::class, 'delete'])->name('drills.delete');
    Route::get('/myPage', [DrillsController::class, 'myPage'])->name('drills.myPage');
});
