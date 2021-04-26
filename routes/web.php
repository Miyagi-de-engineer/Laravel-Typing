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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/drills/new', [DrillsController::class, 'new'])->name('drills.new');
Route::post('/drills', [DrillsController::class, 'create'])->name('drills.create');
Route::get('/drills', [DrillsController::class, 'index'])->name('drills');
